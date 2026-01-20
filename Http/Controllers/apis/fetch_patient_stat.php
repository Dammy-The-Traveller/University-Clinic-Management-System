<?php 
use Core\App;
use Core\Database;

$db = App::resolve(Database::class);
header('Content-Type: application/json');


$newPatientCounts = array_fill(0, 12, 0);
$returningPatientCounts = array_fill(0, 12, 0);


$newPatients = $db->query("SELECT MONTH(date) AS month, COUNT(*) AS count
    FROM patients
    GROUP BY month
    ORDER BY month
")->get();


$returningPatients = $db->query("SELECT MONTH(op.date) AS month, COUNT(DISTINCT op.student_id) AS count
    FROM old_prescriptions op
    INNER JOIN patients p ON op.student_id = p.student_id
    GROUP BY month
    ORDER BY month
")->get();


foreach ($newPatients as $data) {
    $newPatientCounts[$data['month'] - 1] = (int) $data['count']; // Adjust month index to start at 0
}


foreach ($returningPatients as $data) {
    $returningPatientCounts[$data['month'] - 1] = (int) $data['count']; // Adjust month index to start at 0
}


echo json_encode([
    'newPatients' => $newPatientCounts,
    'returningPatients' => $returningPatientCounts,
    'months' => ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"]
]);

exit;
