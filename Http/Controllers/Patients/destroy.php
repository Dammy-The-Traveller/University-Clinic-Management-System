<?php
use Core\App;
use Core\Database;

$db = App::resolve(Database::class);
$logged_user_type = $_SESSION['user']['UserType'];
$logged_user_id =  $_SESSION['user']['ID'];
// ✅ Get patient ID & student ID from request (sanitize input)
$PatientId = (int) trim($_POST['ID']);
$studentID = trim($_POST['student_ID']);

try {
    
    $user = $db->query('SELECT * FROM clinic_admins WHERE id=:id', [
        'id' => $logged_user_id
    ])->findOrFail();

   
    
    authorize($logged_user_type == 1);
    
    if (!hash_equals($_SESSION['csrf_token'], $_POST['csrf_token'] ?? '')) {
        echo json_encode(['error' => 'Invalid CSRF token']);
        exit;
    }
   
    $result = $db->query('DELETE FROM patients WHERE id = :id AND student_id = :idnumber', [
        'id' => $PatientId,
        'idnumber' => $studentID,
    ]);

   
    if ($result) {
        echo json_encode(['success' => true, 'message' => 'Patient successfully deleted']);
    } else {
        echo json_encode(['error' => 'No matching Patient found']);
    }
} catch (PDOException $e) {
    echo json_encode(['error' => 'Database error: Sorry an error occurred']);
}
?>
