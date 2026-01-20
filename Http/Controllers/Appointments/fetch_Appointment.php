<?php 
use Core\App;
use Core\Database;
header('Content-Type: application/json');

$db = App::resolve(Database::class);

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['studentID']) ) {
    if ($_GET['studentID'] == '') {
        echo json_encode(['success' => false, 'message' => 'Student ID is required']);
        exit;
    }
    $studentID = $_GET['studentID'];


    try {
    
        
        $appointmentQuery = $db->query(
            "SELECT id, fullname, email, student_id, program, gender, age, phone_number, date, time, problem 
             FROM appointment 
             WHERE student_id = :studentID AND status =:status",
            [
                'studentID' => $studentID,
                'status' => 'pending'
            
            ]
        )->find();
    
            if (!$appointmentQuery) {
                echo json_encode(['success' => false, 'message' => 'Appointment not found']);
                exit;
            }
    
            // Send the data as JSON
            echo json_encode(['success' => true] + $appointmentQuery);
      exit;

    

    } catch (Exception $e) {
        echo json_encode(['success' => false, 'message' => 'Error processing data']);
    }
} else {
    echo json_encode(["success" => false, "error" => "Invalid request"]);
}
