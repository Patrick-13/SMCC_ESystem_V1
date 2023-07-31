<?php
include 'includes/session.php';

if (isset($_POST['edit_basic_information'])) {
    // Basic Information
    $student_id = htmlspecialchars($_POST['student_id']);
    $firstname = htmlspecialchars($_POST['firstname']);
    $middlename = htmlspecialchars($_POST['middlename']);
    $lastname = htmlspecialchars($_POST['lastname']);
    $suffix = htmlspecialchars($_POST['suffix']);
    $date_of_birth = htmlspecialchars($_POST['date_of_birth']);
    $birth_place = htmlspecialchars($_POST['birth_place']);
    $gender = htmlspecialchars($_POST['gender']);
    $nationality = htmlspecialchars($_POST['nationality']);
    $religion = htmlspecialchars($_POST['religion']);
    $civil_status = htmlspecialchars($_POST['civil_status']);

    $sql = "SELECT * FROM `students_information` WHERE `firstname`='$firstname' AND `lastname`='$lastname'";
    $query = $conn->query($sql);

    if ($query->num_rows > 1) {
        $_SESSION['error'] = 'Sorry for the inconvenience, duplication of first name and last name in the database.';
    } else {
        $sql = "UPDATE `students_information` SET 
        `firstname`= '$firstname',
        `middlename`= '$middlename',
        `lastname`= '$lastname',
        `suffix`= '$suffix',
        `gender`= '$gender',
        `date_of_birth`= '$date_of_birth',
        `birth_place`= '$birth_place',
        `religion`= '$religion',
        `nationality`= '$nationality',
        `civil_status`= '$civil_status' WHERE `student_id`='$student_id'";

        if ($conn->query($sql)) {
            $_SESSION['success'] = 'Thank you for your patience, basic information updated successfully';
        } else {
            $_SESSION['error'] = $conn->error . " Sorry for the inconvenience, please contact your System Administrator, Thank you";
        }
    }
}

if (isset($_POST['edit_family_information'])) {
    // Family Information
    $student_id = htmlspecialchars($_POST['student_id']);
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

    $sql = "UPDATE `students_information` SET 
        `father_name`= '$father_name',
        `father_occupation`= '$father_occupation',
        `father_mi`= '$father_mi',
        `father_cellphone_no`= '$father_cellphone_no',
        `mother_name`= '$mother_name',
        `mother_occupation`= '$mother_occupation',
        `mother_mi`= '$mother_mi',
        `mother_cellphone_no`= '$mother_cellphone_no',
        `psw`= '$psw',
        `psw_address`= '$psw_address' WHERE `student_id`='$student_id'";

    if ($conn->query($sql)) {
        $_SESSION['success'] = 'Thank you for your patience, family information updated successfully';
    } else {
        $_SESSION['error'] = $conn->error . " Sorry for the inconvenience, please contact your System Administrator, Thank you";
    }
}

if (isset($_POST['edit_home_address'])) {
    // Home Address
    $student_id = htmlspecialchars($_POST['student_id']);
    $region = htmlspecialchars($_POST['region']);
    $province = htmlspecialchars($_POST['province']);
    $municity = htmlspecialchars($_POST['municity']);
    $barangay = htmlspecialchars($_POST['barangay']);
    $address = htmlspecialchars($_POST['address']);
    $zip_code = htmlspecialchars($_POST['zip_code']);


    $sql = "UPDATE `students_information` SET 
        `region`= '$region',
        `province`= '$province',
        `municity`= '$municity',
        `barangay`= '$barangay',
        `address`= '$address',
        `zip_code`= '$zip_code' WHERE `student_id`='$student_id'";

    if ($conn->query($sql)) {
        $_SESSION['success'] = 'Thank you for your patience, home address updated successfully';
    } else {
        $_SESSION['error'] = $conn->error . " Sorry for the inconvenience, please contact your System Administrator, Thank you";
    }
}

if (isset($_POST['edit_contact_details'])) {
    // Contact Details
    $student_id = htmlspecialchars($_POST['student_id']);
    $telephone_number = htmlspecialchars($_POST['telephone_number']);
    $cellphone_number = htmlspecialchars($_POST['cellphone_number']);
    $primary_email = htmlspecialchars($_POST['primary_email']);
    $secondary_email = htmlspecialchars($_POST['secondary_email']);
    $emerg_name = htmlspecialchars($_POST['emerg_name']);
    $emerg_cellphone_no = htmlspecialchars($_POST['emerg_cellphone_no']);
    $emerg_relationship = htmlspecialchars($_POST['emerg_relationship']);
    $emerg_address = htmlspecialchars($_POST['emerg_address']);

    $sql = "UPDATE `students_information` SET 
        `telephone_number`= '$telephone_number',
        `cellphone_number`= '$cellphone_number',
        `primary_email`= '$primary_email',
        `secondary_email`= '$secondary_email',
        `emerg_name`= '$emerg_name',
        `emerg_cellphone_no`= '$emerg_cellphone_no',
        `emerg_relationship`= '$emerg_relationship',
        `emerg_address`= '$emerg_address' WHERE `student_id`='$student_id'";

    if ($conn->query($sql)) {
        $_SESSION['success'] = 'Thank you for your patience, contact details updated successfully';
    } else {
        $_SESSION['error'] = $conn->error . " Sorry for the inconvenience, please contact your System Administrator, Thank you";
    }
}

if (isset($_POST['edit_educational_background'])) {
    // Educational Background
    $student_id = htmlspecialchars($_POST['student_id']);
    $elem_name = htmlspecialchars($_POST['elem_name']);
    $elem_address = htmlspecialchars($_POST['elem_address']);
    $elem_yg = htmlspecialchars($_POST['elem_yg']);
    $elem_honors = htmlspecialchars($_POST['elem_honors']);
    $junior_name = htmlspecialchars($_POST['junior_name']);
    $junior_address = htmlspecialchars($_POST['junior_address']);
    $junior_yg = htmlspecialchars($_POST['junior_yg']);
    $junior_honors = htmlspecialchars($_POST['junior_honors']);

    $sql = "UPDATE `students_information` SET 
        `elem_name`= '$elem_name',
        `elem_address`= '$elem_address',
        `elem_yg`= '$elem_yg',
        `elem_honors`= '$elem_honors',
        `junior_name`= '$junior_name',
        `junior_address`= '$junior_address',
        `junior_yg`= '$junior_yg',
        `junior_honors`= '$junior_honors' WHERE `student_id`='$student_id'";

    if ($conn->query($sql)) {
        $_SESSION['success'] = 'Thank you for your patience, educational background updated successfully';
    } else {
        $_SESSION['error'] = $conn->error . " Sorry for the inconvenience, please contact your System Administrator, Thank you";
    }
}

if (isset($_POST['edit_requirements'])) {
    // Requirements
    $student_id = htmlspecialchars($_POST['student_id']);
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

    $sql = "UPDATE `students_information` SET 
        `f138`= '$f138',
        `f137`= '$f137',
        `good_moral`= '$good_moral',
        `psa`= '$psa',
        `coc`= '$coc',
        `idpic`= '$idpic',
        `sf10`= '$sf10',
        `sf9`= '$sf9' WHERE `student_id`='$student_id'";

    if ($conn->query($sql)) {
        $_SESSION['success'] = 'Thank you for your patience, requirements updated successfully';
    } else {
        $_SESSION['error'] = $conn->error . " Sorry for the inconvenience, please contact your System Administrator, Thank you";
    }
}


if (isset($_POST['edit_application_admission'])) {
    // Educational Background
    $student_id = htmlspecialchars($_POST['student_id']);
    $date_application = htmlspecialchars($_POST['date_application']);
    $school_year = htmlspecialchars($_POST['school_year']);
    $scholarship = htmlspecialchars($_POST['scholarship']);
    $scholarship_name = htmlspecialchars($_POST['scholarship_name']);
    $idvoucher_number = htmlspecialchars($_POST['idvoucher_number']);
    $track = htmlspecialchars($_POST['track']);
    $strand = htmlspecialchars($_POST['strand']);
    $class_schedule = htmlspecialchars($_POST['class_schedule']);

    $sql = "UPDATE `students_information` SET 
        `date_application`= '$date_application',
        `school_year`= '$school_year',
        `scholarship`= '$scholarship',
        `scholarship_name`= '$scholarship_name',
        `idvoucher_number`= '$idvoucher_number',
        `track`= '$track',
        `strand`= '$strand',
        `class_schedule`= '$class_schedule' WHERE `student_id`='$student_id'";

    if ($conn->query($sql)) {
        $_SESSION['success'] = 'Thank you for your patience, application admission updated successfully';
    } else {
        $_SESSION['error'] = $conn->error . " Sorry for the inconvenience, please contact your System Administrator, Thank you";
    }
}

if (isset($_POST['edit_comment_remarks'])) {
    // Educational Background
    $student_id = htmlspecialchars($_POST['student_id']);
    $remarks = htmlspecialchars($_POST['remarks']);
    $comment = htmlspecialchars($_POST['comment']);

    if (htmlspecialchars($_POST['terms']) == true) {
        $terms = 1;
    } else {
        $terms = 0;
    }

    $sql = "UPDATE `students_information` SET 
        `remarks`= '$remarks',
        `comment`= '$comment',
        `terms`= '$terms' WHERE `student_id`='$student_id'";

    if ($conn->query($sql)) {
        $_SESSION['success'] = 'Thank you for your patience, comment and remarks updated successfully';
    } else {
        $_SESSION['error'] = $conn->error . " Sorry for the inconvenience, please contact your System Administrator, Thank you";
    }
}


header('location: student_information_profile.php?student_id=' . $student_id . '');
