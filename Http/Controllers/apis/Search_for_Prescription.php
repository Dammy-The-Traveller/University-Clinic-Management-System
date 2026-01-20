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
      
       
            $studentQuery = $db->query(
                "SELECT id, firstname, lastname, birthdate, gender, student_id, program, country, email, treatment, drug_name, drug_index, quantity, dosage, notes
                 FROM patients 
                 WHERE student_id = :studentID",
                ['studentID' => $idnumber]
            )->find(); 
    
            if (!$studentQuery) {
                echo json_encode(['success' => false, 'message' => 'Student not found']);
                exit;
            }
    
            // Send the data as JSON
            echo json_encode(['success' => true] + $studentQuery);
     
exit;
    

    } catch (Exception $e) {
        echo json_encode(['success' => false, 'message' => 'Error processing data']);
    }
} else {
    echo json_encode(["success" => false, "error" => "Invalid request"]);
}
