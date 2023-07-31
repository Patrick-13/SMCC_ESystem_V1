
<?php
include 'includes/conn.php';

if (isset($_POST['region_code'])) {

    $sql = "SELECT * FROM `_provincedb` WHERE `national`=" . $_POST['region_code'];
    $query = $conn->query($sql);
    $province = array();
    while ($row = $query->fetch_assoc()) {
        $temp = array(
            "id" => $row['id'],
            "code" => $row['code'],
            "name" => $row['name'],
            "national" => $row['national']

        );
        array_push($province, $temp);
    }
    echo json_encode($province);
}

if (isset($_POST['province_code'])) {
    $sql = "SELECT * FROM `_municitydb` WHERE `province`=" . $_POST['province_code'];
    $query = $conn->query($sql);
    $citymun = array();
    while ($row = $query->fetch_assoc()) {
        $temp = array(
            "id" => $row['id'],
            "code" => $row['code'],
            "name" => $row['name'],
            "province" => $row['province']
        );
        array_push($citymun, $temp);
    }
    echo json_encode($citymun);
}

if (isset($_POST['municity_code'])) {
    $sql = "SELECT * FROM `_barangaydb` WHERE `municity`=" . $_POST['municity_code'];
    $query = $conn->query($sql);
    $barangay = array();
    while ($row = $query->fetch_assoc()) {
        $temp = array(
            "id" => $row['id'],
            "code" => $row['code'],
            "name" => $row['name'],
            "municity" => $row['municity']
        );
        array_push($barangay, $temp);
    }
    echo json_encode($barangay);
}

function loadRegion()
{

    include 'includes/conn.php';

    $sql = "SELECT `id`,`name`,`code` FROM `addnational`";
    $query = $conn->query($sql);
    $region = array();
    while ($row = $query->fetch_assoc()) {
        $temp = array(
            "id" => $row['id'],
            "code" => $row['code'],
            "name" => $row['name']
        );
        array_push($region, $temp);
    }
    return $region;
    //echo json_encode($region);
}
?>