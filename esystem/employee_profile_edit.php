<?php
include 'includes/session.php';

if (isset($_POST['edit_basic_information'])) {
    // Basic Information
    $employee_id = htmlspecialchars($_POST['employee_id']);
    $active = htmlspecialchars($_POST['active']);
    $hired_date = htmlspecialchars($_POST['hired_date']);
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

    $sql = "SELECT * FROM `employees` WHERE `firstname`='$firstname' AND `lastname`='$lastname'";
    $query = $conn->query($sql);

    if ($query->num_rows > 1) {
        $_SESSION['error'] = 'Sorry for the inconvenience, duplication of first name and last name in the database.';
    } else {
        $sql = "UPDATE `employees` SET 
        `hired_date`='$hired_date',
        `firstname`= '$firstname',
        `middlename`= '$middlename',
        `lastname`= '$lastname',
        `suffix`= '$suffix',
        `nickname`= '$nickname',
        `gender`= '$gender',
        `date_of_birth`= '$date_of_birth',
        `birth_place`= '$birth_place',
        `religion`= '$religion',
        `nationality`= '$nationality',
        `civil_status`= '$civil_status' WHERE employee_id='$employee_id'";

        if ($conn->query($sql)) {
            $_SESSION['success'] = 'Thank you for your patience, basic information updated successfully';
        } else {
            $_SESSION['error'] = $conn->error . " Sorry for the inconvenience, please contact your System Administrator, Thank you";
        }
    }
}
if (isset($_POST['edit_statutory_information'])) {
    //Statutory Information
    $employee_id = htmlspecialchars($_POST['employee_id']);
    $sss = htmlspecialchars($_POST['sss']);
    $pag_ibig = htmlspecialchars($_POST['pag_ibig']);
    $phic = htmlspecialchars($_POST['phic']);
    $tin = htmlspecialchars($_POST['tin']);

    $sql = "UPDATE `employees` SET 
    `sss`= '$sss',
    `pag_ibig`= '$pag_ibig',
    `phic`= '$phic',
    `tin`= '$tin'
     WHERE employee_id='$employee_id'";

    if ($conn->query($sql)) {
        $_SESSION['success'] = 'Thank you for your patience, statutory information updated successfully';
    } else {
        $_SESSION['error'] = $conn->error . " Sorry for the inconvenience, please contact your System Administrator, Thank you";
    }
}
if (isset($_POST['edit_home_address'])) {
    //Home Address Information
    $employee_id = htmlspecialchars($_POST['employee_id']);
    $region = htmlspecialchars($_POST['region']);
    $province = htmlspecialchars($_POST['province']);
    $municity = htmlspecialchars($_POST['municity']);
    $barangay = htmlspecialchars($_POST['barangay']);
    $address = htmlspecialchars($_POST['address']);
    $zipcode = htmlspecialchars($_POST['zipcode']);

    $sql = "UPDATE `employees` SET 
    `region`= '$region',
    `province`= '$province',
    `municity`= '$municity',
    `barangay`= '$barangay',
    `address`= '$address',
    `zipcode`= '$zipcode'
     WHERE employee_id='$employee_id'";

    if ($conn->query($sql)) {
        $_SESSION['success'] = 'Thank you for your patience, home address updated successfully';
    } else {
        $_SESSION['error'] = $conn->error . " Sorry for the inconvenience, please contact your System Administrator, Thank you";
    }
}
if (isset($_POST['edit_contact_details'])) {
    //Contact Details
    $employee_id = htmlspecialchars($_POST['employee_id']);
    $telephone_number = htmlspecialchars($_POST['telephone_number']);
    $cellphone_number = htmlspecialchars($_POST['cellphone_number']);
    $primary_email = htmlspecialchars($_POST['primary_email']);
    $secondary_email = htmlspecialchars($_POST['secondary_email']);
    $emerg_name = htmlspecialchars($_POST['emerg_name']);
    $emerg_contact = htmlspecialchars($_POST['emerg_contact']);
    $emerg_relationship = htmlspecialchars($_POST['emerg_relationship']);
    $emerg_address = htmlspecialchars($_POST['emerg_address']);

    $sql = "UPDATE `employees` SET 
    `telephone_number`= '$telephone_number',
    `cellphone_number`= '$cellphone_number',
    `primary_email`= '$primary_email',
    `secondary_email`= '$secondary_email',
    `emerg_name`= '$emerg_name',
    `emerg_contact`= '$emerg_contact',
    `emerg_relationship`= '$emerg_relationship',
    `emerg_address`= '$emerg_address'
     WHERE employee_id='$employee_id'";

    if ($conn->query($sql)) {
        $_SESSION['success'] = 'Thank you for your patience, contact details updated successfully';
    } else {
        $_SESSION['error'] = $conn->error . " Sorry for the inconvenience, please contact your System Administrator, Thank you";
    }
}

header('location: employee_profile.php?employee_id=' . $employee_id . '&active=' . $active . '');
