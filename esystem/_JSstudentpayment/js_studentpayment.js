$("#_top").on("change", function (e) {
    e.preventDefault();
    var top = $("#_top").val();
    //alert(top);
    $.ajax({
        url: 'payment_getledgerdata.php',
        method: 'POST',
        data: 'top=' + top
    }).done(function (studenttop) {
        console.log(studenttop);
        studenttop = JSON.parse(studenttop);
        $('#_paymentstudentid').empty();
        studenttop.forEach(function (studenttop) {
            $('#_paymentstudentid').append('<option id=' + studenttop.student_id + '  value=' + studenttop.student_id + '>' + studenttop.lastname + ', ' + studenttop.firstname +'</option>');
      
        });
    });
});

$("#_paymentstudentid").on("change", function (e) {
    e.preventDefault();
    var studentid = $("#_paymentstudentid").val();
    //alert(studentid);
    $.ajax({
        url: 'payment_gettuitiondata.php',
        method: 'POST',
        data: 'studentid=' + studentid
    }).done(function (studenttuition) {
        console.log(studenttuition);
        studenttuition = JSON.parse(studenttuition);
        $('#_studenttuition').empty();
        studenttuition.forEach(function (studenttuition) {
            $('#_studentstrand').val(studenttuition.strand_code)
            $('#_studentgradelvl').val(studenttuition.grade_level)
            $('#_studenttuition').val(studenttuition.tuition_fee)
        });
    });
});

$("#_studentpayamount").on("change", function (e) {
    e.preventDefault();
    var tuition = $("#_studenttuition").val();
    var payamount =$("#_studentpayamount").val();
   
    tuition=tuition.replace(/\,/g,''); // 1125, but a string, so convert it to number
    tuition=parseInt(tuition,10);
    payamount=payamount.replace(/\,/g,''); // 1125, but a string, so convert it to number
    payamount=parseInt(payamount,10);

     var total = tuition - payamount;
     $('#_studentbalance').val(total);
});


function paymenttype_(){
	var top = document.getElementById("_top");
	var studidselect = document.getElementById("showstudidselect");
	var studidinput = document.getElementById("showstudidinput");


	if (top.value === "Others") {
        studidinput.style.display = "block";
    } else {
        studidinput.style.display = "none";
    }

    if (top.value === "Paying") {
        studidselect.style.display = "block";
    } else {
        studidselect.style.display = "none";
    }
}
$(function() {
    $('.payment_edit').click(function(e) {
      e.preventDefault();
      $('#edit_student_or').modal('show');
      var id = $(this).data('id');
      getRow(id)
    });

    $('.delete').click(function(e) {
      e.preventDefault();
      $('#delete').modal('show');
      var id = $(this).data('id');
      getRow(id);
    });
  });

  function getRow(id) {
    $.ajax({
      type: 'POST',
      url: 'payment_row.php',
      data: {
        id: id
      },
      dataType: 'json',
      success: function(response) {
        $('.editid').val(response.pay_id);
        $('#edit_paymentorno').val(response.or_no);
        $('#edit_top').val(response.top);
        $('#edit_paymentstudentid').val(response.student_id);
        $('#edit_studentstrand').val(response.holiday);
        $('#edit_studentgradelvl').val(response.holidaydate);
        $('#edit_studenttuition').val(response.type);
        $('#edit_studentpayamount').val(response.amount_paid);
        $('#edit_studentbalance').val(response.balance);

        $('.del_id').val(response.id);
        $('.del_holiday').html(response.holiday);



      }
    });
  }

