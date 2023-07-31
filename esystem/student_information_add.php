<?php
include 'includes/session.php';

if (isset($_POST['add'])) {

    // Basic Information
    $firstname = htmlspecialchars($_POST['firstname']);
    $middlename = htmlspecialchars($_POST['middlename']);
    $lastname = htmlspecialchars($_POST['lastname']);
    $suffix = htmlspecialchars($_POST['suffix']);
    //$nickname = htmlspecialchars($_POST['nickname']);
    $date_of_birth = htmlspecialchars($_POST['date_of_birth']);
    $birth_place = htmlspecialchars($_POST['birth_place']);
    $gender = htmlspecialchars($_POST['gender']);
    $nationality = htmlspecialchars($_POST['nationality']);
    $religion = htmlspecialchars($_POST['religion']);
    $civil_status = htmlspecialchars($_POST['civil_status']);

    //Family Information
    $father_name = htmlspecialchars($_POST['father_name']);
    $father_occupation = htmlspecialchars($_POST['father_occupation']);
    $father_mi = htmlspecialchars($_POST['father_mi']);
    $father_cellphone_no = htmlspecialchars($_POST['father_cellphone_no']);

    $mother_name = htmlspecialchars($_POST['mother_name']);
    $mother_occupation = htmlspecialchars($_POST['mother_occupation']);
    $mother_mi = htmlspecialchars($_POST['mother_mi']);
    $mother_cellphone_no = htmlspecialchars($_POST['mother_cellphone_no']);

    $psw = htmlspecialchars($_POST['psw']);
    $psw_address = htmlspecialchars($_POST['psw_address']);

    //Home Address Information
    $region = htmlspecialchars($_POST['region']);
    $province = htmlspecialchars($_POST['province']);
    $municity = htmlspecialchars($_POST['municity']);
    $barangay = htmlspecialchars($_POST['barangay']);
    $address = htmlspecialchars($_POST['address']);
    $zip_code = htmlspecialchars($_POST['zip_code']);

    //Contact Details
    $telephone_number = htmlspecialchars($_POST['telephone_number']);
    $cellphone_number = htmlspecialchars($_POST['cellphone_number']);
    $primary_email = htmlspecialchars($_POST['primary_email']);
    $secondary_email = htmlspecialchars($_POST['secondary_email']);
    $emerg_name = htmlspecialchars($_POST['emerg_name']);
    $emerg_cellphone_no = htmlspecialchars($_POST['emerg_cellphone_no']);
    $emerg_relationship = htmlspecialchars($_POST['emerg_relationship']);
    $emerg_address = htmlspecialchars($_POST['emerg_address']);

    //Educational Background
    $elem_name = htmlspecialchars($_POST['elem_name']);
    $elem_address = htmlspecialchars($_POST['elem_address']);
    $elem_yg = htmlspecialchars($_POST['elem_yg']);
    $elem_honors = htmlspecialchars($_POST['elem_honors']);

    $junior_name = htmlspecialchars($_POST['junior_name']);
    $junior_address = htmlspecialchars($_POST['junior_address']);
    $junior_yg = htmlspecialchars($_POST['junior_yg']);
    $junior_honors = htmlspecialchars($_POST['junior_honors']);

    //Requirements
    if (htmlspecialchars($_POST['f138']) == true) {
        $f138 = 1;
    } else {
        $f138 = 0;
    }

    if (htmlspecialchars($_POST['f137']) == true) {
        $f137 = 1;
    } else {
        $f137 = 0;
    }

    if (htmlspecialchars($_POST['good_moral']) == true) {
        $good_moral = 1;
    } else {
        $good_moral = 0;
    }

    if (htmlspecialchars($_POST['psa']) == true) {
        $psa = 1;
    } else {
        $psa = 0;
    }

    if (htmlspecialchars($_POST['coc']) == true) {
        $coc = 1;
    } else {
        $coc = 0;
    }

    if (htmlspecialchars($_POST['idpic']) == true) {
        $idpic = 1;
    } else {
        $idpic = 0;
    }

    if (htmlspecialchars($_POST['sf10']) == true) {
        $sf10 = 1;
    } else {
        $sf10 = 0;
    }

    if (htmlspecialchars($_POST['sf9']) == true) {
        $sf9 = 1;
    } else {
        $sf9 = 0;
    }

    //Aplication for Admission
    $date_application = htmlspecialchars($_POST['date_application']);
    $student_id = htmlspecialchars($_POST['student_id']);

    $scholarship = htmlspecialchars($_POST['scholarship']);
    $scholarship_name = htmlspecialchars($_POST['scholarship_name']);
    $idvoucher_number = htmlspecialchars($_POST['idvoucher_number']);
    $encoded_by = htmlspecialchars($_POST['encoded_by']);

    //Comment and Remarks
    $comment = htmlspecialchars($_POST['comment']);

    if (htmlspecialchars($_POST['terms']) == true) {
        $terms = 1;
    } else {
        $terms = 0;
    }



    $sql1 = "SELECT * FROM `students_information` WHERE `firstname`='$firstname' AND `lastname`='$lastname'";
    $query1 = $conn->query($sql1);

    $sql2 = "SELECT * FROM `students_information` WHERE `student_id` = '$student_id' OR `idvoucher_number`='$idvoucher_number'";
    $query2 = $conn->query($sql2);

    if ($query1->num_rows > 1) {
        $_SESSION['error'] = 'Sorry for the inconvenience, student name already existed in the database.';
    } else if ($query2->num_rows > 1) {
        $_SESSION['error'] = 'Sorry for the inconvenience, studenr ID or ID/Voucher Number already existed in the database.';
    } else {
        $sql = "INSERT INTO `students_information`(`student_id`, `firstname`, `middlename`, `lastname`, `suffix`, `gender`, `date_of_birth`, `birth_place`, `religion`, `nationality`, `civil_status`, `father_name`, `father_occupation`, `father_mi`, `father_cellphone_no`, `mother_name`, `mother_occupation`, `mother_mi`, `mother_cellphone_no`, `psw`, `psw_address`, `region`, `province`, `municity`, `barangay`, `address`, `zip_code`, `telephone_number`, `cellphone_number`, `primary_email`, `secondary_email`, `emerg_name`, `emerg_cellphone_no`, `emerg_relationship`, `emerg_address`, `elem_name`, `elem_address`, `elem_yg`, `elem_honors`, `junior_name`, `junior_address`, `junior_yg`, `junior_honors`, `f138`, `f137`, `good_moral`, `psa`, `coc`, `idpic`, `sf10`, `sf9`, `date_application`, `scholarship`, `scholarship_name`, `idvoucher_number`,`comment`, `terms`, `encoded_by`, `delstatus`) 
        VALUES ('$student_id','$firstname','$middlename','$lastname', '$suffix', '$gender','$date_of_birth','$birth_place','$religion','$nationality','$civil_status','$father_name','$father_occupation','$father_mi','$father_cellphone_no','$mother_name','$mother_occupation','$mother_mi','$mother_cellphone_no','$psw','$psw_address','$region','$province','$municity','$barangay','$address','$zip_code','$telephone_number','$cellphone_number','$primary_email','$secondary_email','$emerg_name','$emerg_cellphone_no','$emerg_relationship','$emerg_address','$elem_name','$elem_address','$elem_yg','$elem_honors','$junior_name','$junior_address','$junior_yg','$junior_honors','$f138','$f137','$good_moral','$psa','$coc','$idpic','$sf10','$sf9','$date_application','$scholarship','$scholarship_name','$idvoucher_number','$comment','$terms','$encoded_by',1)";

        if ($conn->query($sql)) {
            $_SESSION['success'] = 'Thank you for your patience, student information added successfully';
        } else {
            $_SESSION['error'] = $conn->error . " Sorry for the inconvenience, please contact your System Administrator, Thank you";
        }
    }
}

header('location: students_information.php');
