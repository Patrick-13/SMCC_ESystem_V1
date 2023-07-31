<?php
include 'includes/session.php';

if (isset($_POST['add'])) {

    // Basic Information
    $employee_id = htmlspecialchars($_POST['employee_id']);
    $firstname = htmlspecialchars($_POST['firstname']);
    $middlename = htmlspecialchars($_POST['middlename']);
    $lastname = htmlspecialchars($_POST['lastname']);
    $suffix = htmlspecialchars($_POST['suffix']);
    $nickname = htmlspecialchars($_POST['nickname']);
    $date_of_birth = htmlspecialchars($_POST['date_of_birth']);
    $birth_place = htmlspecialchars($_POST['birth_place']);
    $gender = htmlspecialchars($_POST['gender']);
    $nationality = htmlspecialchars($_POST['nationality']);
    $religion = htmlspecialchars($_POST['religion']);
    $civil_status = htmlspecialchars($_POST['civil_status']);

    //Statutory Information
    $sss = htmlspecialchars($_POST['sss']);
    $pag_ibig = htmlspecialchars($_POST['pag_ibig']);
    $phic = htmlspecialchars($_POST['phic']);
    $tin = htmlspecialchars($_POST['tin']);

    //Home Address Information
    $region = htmlspecialchars($_POST['region']);
    $province = htmlspecialchars($_POST['province']);
    $municity = htmlspecialchars($_POST['municity']);
    $barangay = htmlspecialchars($_POST['barangay']);
    $address = htmlspecialchars($_POST['address']);
    $zipcode = htmlspecialchars($_POST['zipcode']);

    //Contact Details
    $telephone_number = htmlspecialchars($_POST['telephone_number']);
    $cellphone_number = htmlspecialchars($_POST['cellphone_number']);
    $primary_email = htmlspecialchars($_POST['primary_email']);
    $secondary_email = htmlspecialchars($_POST['secondary_email']);
    $emerg_name = htmlspecialchars($_POST['emerg_name']);
    $emerg_contact = htmlspecialchars($_POST['emerg_contact']);
    $emerg_relationship = htmlspecialchars($_POST['emerg_relationship']);
    $emerg_address = htmlspecialchars($_POST['emerg_address']);

    $sql = "SELECT * FROM `employees` WHERE `employee_id` = '$employee_id' OR `firstname`='$firstname' AND `lastname`='$lastname'";
    $query = $conn->query($sql);

    if ($query->num_rows > 1) {
        $_SESSION['error'] = 'Sorry for the inconvenience, employee already existed in the database.';
    } else {
        $sql = "INSERT INTO `employees`(`employee_id`, `firstname`, `middlename`, `lastname`, `suffix`, `nickname`, `gender`, `date_of_birth`, `birth_place`, `religion`, `nationality`, `civil_status`, `sss`, `pag_ibig`, `phic`, `tin`, `hired_date`, `region`, `province`, `municity`, `barangay`, `address`, `zipcode`, `telephone_number`, `cellphone_number`, `primary_email`, `secondary_email`, `emerg_name`, `emerg_contact`, `emerg_relationship`, `emerg_address`,`active`) 
        VALUES ('$employee_id','$firstname','$middlename','$lastname','$suffix', '$nickname', '$gender','$date_of_birth','$birth_place','$religion','$nationality','$civil_status','$sss','$pag_ibig','$phic','$tin','$hired_date','$region','$province','$municity','$barangay','$address','$zipcode','$telephone_number','$cellphone_number','$primary_email','$secondary_email','$emerg_name','$emerg_contact','$emerg_relationship','$emerg_address',1)";

        if ($conn->query($sql)) {
            $_SESSION['success'] = 'Thank you for your patience, employee added successfully';
        } else {
            $_SESSION['error'] = $conn->error . " Sorry for the inconvenience, please contact your System Administrator, Thank you";
        }
    }
}

header('location: employees.php');
