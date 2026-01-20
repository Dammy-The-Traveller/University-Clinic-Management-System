<?php
use Core\App;
use Core\Database;

$db = App::resolve(Database::class);
$logged_user_type = $_SESSION['user']['UserType'];
$logged_user_id = $_SESSION['user']['ID'];
// ✅ Get patient ID & student ID from request (sanitize input)
$PatientId = (int) trim($_POST['ID']);
$studentID = trim($_POST['student_ID']);

try {
    if (!hash_equals($_SESSION['csrf_token'], $_POST['csrf_token'] ?? '')) {
        die("<script>alert('Invalid CSRF token'); window.history.back();</script>");
    }
    $user = $db->query('SELECT * FROM clinic_admins WHERE id=:id', [
        'id' => $logged_user_id
    ])->findOrFail();

    
    authorize($user['user_type'] == $logged_user_type );

   
    $result = $db->query('DELETE FROM appointment WHERE id = :id AND student_id = :idnumber', [
        'id' => $PatientId,
        'idnumber' => $studentID,
    ]);

   
    if ($result) {
        echo json_encode(['success' => true, 'message' => 'Appointment successfully deleted']);
    } else {
        echo json_encode(['error' => 'No matching appointment found']);
    }
} catch (PDOException $e) {
    echo json_encode(['error' => 'Database error: Sorry an error occurred']);
}
?>
