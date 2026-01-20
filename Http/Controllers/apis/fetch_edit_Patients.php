<?php
use Core\App;
use Core\Database;
$db = App::resolve(Database::class);
$logged_user_type = $_SESSION['user']['UserType'];
$logged_user_id = $_SESSION['user']['ID'];
if (isset($_GET['studentID'])) {
    if ($_GET['studentID'] == '') {
        echo json_encode(['success' => false, 'message' => 'Student ID is required']);
        exit;
    }
    $studentID = $_GET['studentID'];
    try {
        $user = $db->query('SELECT * from clinic_admins where id = :id', [
            'id' => $logged_user_id
        ])->findOrFail();
        
        authorize($user['user_type'] == $logged_user_type );
        
        $patients =$db->query(
            "SELECT *
             FROM patients 
             WHERE student_id = :studentID",
            ['studentID' => $studentID]
        )->find(); 

        if(!$patients) {
           // echo json_encode(['error' => 'No matching patient found']);
            echo json_encode(['success' => false, 'message' => 'No matching patient found']);
            exit;
        }
     
       echo  json_encode(['success' => true] + $patients);
    } catch (PDOException $e) {
        die("Error: Sorry an error occurred");
    }
} else if((isset($_POST['studentID']))) {
    $studentID = $_POST['studentID'];
    try {
        // authorize($patient['user_type'] == 1 );
        $patients =$db->query(
            "SELECT *
             FROM patients 
             WHERE student_id = :studentID",
            ['studentID' => $studentID]
        )->find(); 
       echo  json_encode(['success' => true] + $patients);
    } catch (PDOException $e) {
        die("Error: Sorry an error occurred");
    }
}

?>