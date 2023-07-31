
//Search data
$("#search").on("click", function (e) {
  let datefrom = $('#datefrom').val();
  let dateto = $('#dateto').val();
  $.ajax({
    url: 'monthly_collectexpenses.php',
    method: 'POST',
    data: {
        datefrom:datefrom,
        dateto:dateto
     }
}).done(function (collectexpenses) {
    //console.log(collectexpenses);
    collectexpenses = JSON.parse(collectexpenses);
    collectexpenses.forEach(function (collectexpenses) {
       
        $('#collectexpensetable').append('<tr>' + '<td style="text-align:center;"> ' + collectexpenses.or_no + '</td>'+
                                                  '<td style="text-align:center;"> ' + collectexpenses.date_payment + '</td>'+
                                                  '<td style="text-align:center;"> ' + collectexpenses.student_id +'</td>'+
                                                  '<td style="text-align:center;"> ' + collectexpenses.lastname + ', '+ collectexpenses.firstname +'</td>'+
                                                  '<td style="text-align:center;"> ' + collectexpenses.amount_paid +'</td>' + '</tr>'
                                                 );                                                                         
    });
});
    });

