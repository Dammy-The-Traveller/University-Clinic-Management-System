<?php
use Core\App;
use Core\Database;

$db = App::resolve(Database::class);
header('Content-Type: application/json');

$today = date('Y-m-d');
// Find the start of the week (Sunday)
$startOfWeek = date('Y-m-d', strtotime('sunday last week', strtotime($today)));
// Find the end of the week (Saturday)
$endOfWeek = date('Y-m-d', strtotime('saturday this week', strtotime($today)));


$startOfLastWeek = date('Y-m-d', strtotime('sunday -1 week', strtotime($today)));

// Find the end of last week (Saturday)
$endOfLastWeek = date('Y-m-d', strtotime('saturday -1 week', strtotime($today)));


// Fetch patient count for this week
$patientsPerDay = $db->query(
    "SELECT DATE(date) as day, COUNT(*) as count 
     FROM patients 
     WHERE DATE(date) BETWEEN :start AND :end
     GROUP BY day
     ORDER BY day ASC",
    ['start' => $startOfWeek, 'end' => $endOfWeek]
)->get();

// Fetch patient count for last week
$lastWeekPatientsPerDay = $db->query(
    "SELECT DATE(date) as day, COUNT(*) as count 
     FROM patients 
     WHERE DATE(date) BETWEEN :start AND :end
     GROUP BY day
     ORDER BY day ASC",
    ['start' => $startOfLastWeek, 'end' => $endOfLastWeek]
)->get();

// var_dump($patientsPerDay);
$daysOfWeek = ['Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday'];
$patientCounts = array_fill(0, 7, 0);
$lastWeekPatientCounts = array_fill(0, 7, 0);

// Loop through each day and get the patient count
foreach ($patientsPerDay as $data) {
    $dayIndex = date('w', strtotime($data['day'])); // Get index (0 = Sunday, ..., 6 = Saturday)
    $patientCounts[$dayIndex] = (int) $data['count'];
}

foreach ($lastWeekPatientsPerDay as $data) {
    $dayIndex = date('w', strtotime($data['day']));
    $lastWeekPatientCounts[$dayIndex] = (int) $data['count'];
}


$totalThisWeek = array_sum($patientCounts);
$totalLastWeek = array_sum($lastWeekPatientCounts);

$percentageIncrease = 0;
if ($totalLastWeek > 0) {
    $percentageIncrease = (($totalThisWeek - $totalLastWeek) / $totalLastWeek) * 100;
}

$percentageIncrease = round($percentageIncrease);



// Return the data in JSON format
echo json_encode([
    'data' => $patientCounts,
    'days' => $daysOfWeek,
    'percentageIncrease' => $percentageIncrease
]);
exit;