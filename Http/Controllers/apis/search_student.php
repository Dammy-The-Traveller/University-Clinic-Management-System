<?php 
use Core\App;
use Core\Database;
header('Content-Type: application/json');

$db = App::resolve(Database::class);

if ($_GET['idnumber'] == '') {
    echo json_encode(['success' => false, 'message' => 'Student ID is required']);
    exit;
}
if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['idnumber'])) {
   
    $idnumber = $_GET['idnumber'];


    try {
       
        // Query for student details
        $patientQuery = $db->query(
            "SELECT *
             FROM patients 
             WHERE student_id = :studentID",
            ['studentID' => $idnumber]
        )->find(); 
        if (!$patientQuery) {
            $studentQuery = $db->query(
                "SELECT firstname, lastname, birthdate, idnumber, program, country, email, phone1, phone2
                 FROM r_student 
                 WHERE idnumber = :studentID",
                ['studentID' => $idnumber]
            )->find(); 
    
            if (!$studentQuery) {
                echo json_encode(['success' => false, 'message' => 'Student not found']);
                exit;
            }
    
            // $appointment = $db->query('SELECT student_id FROM appointment WHERE student_id = :ID AND status = :status', [
            //     'ID' => $idnumber,
            //     'status'=> 'approved'
            // ])->find();
            // if (!$appointment) {
            //      echo json_encode(['success' => false, 'message' => 'Please Book an appointment for patient and Approved it so you can be allowed to add or search for patient']);
            //      exit;
            // }
            // Send the data as JSON
            echo json_encode(['success' => true] + $studentQuery);
            exit;
        }else{
            echo json_encode(['success' => false, 'message' => 'Student has been added before, please check patient list']);
            exit;
        }

    

    } catch (Exception $e) {
        echo json_encode(['success' => false, 'message' => 'Error processing data']);
    }
} else {
    echo json_encode(["success" => false, "error" => "Invalid request"]);
}
