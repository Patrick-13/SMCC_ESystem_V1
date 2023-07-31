 <?php
    include 'includes/session.php';

    if (isset($_POST['id'])) {
        $student_id = $_POST['id'];
        $sql = "SELECT *, _regiondb.name AS region, _provincedb.name AS province, _municitydb.name AS municity, _barangaydb.name AS barangay FROM `students_information` 
    LEFT JOIN _regiondb ON students_information.region = _regiondb.code
    LEFT JOIN _provincedb ON students_information.province = _provincedb.code
    LEFT JOIN _municitydb ON students_information.municity = _municitydb.code
    LEFT JOIN _barangaydb ON students_information.barangay = _barangaydb.code
    LEFT JOIN tracks_strands ON students_information.strand = tracks_strands.id 
    LEFT JOIN schedules ON students_information.class_schedule = schedules.id
    WHERE students_information.student_id ='$student_id'";
        $query = $conn->query($sql);
        $row = $query->fetch_assoc();

        echo json_encode($row);
    }
