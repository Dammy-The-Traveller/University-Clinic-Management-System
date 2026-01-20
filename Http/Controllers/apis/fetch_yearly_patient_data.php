<?php 
use Core\App;
use Core\Database;

$db = App::resolve(Database::class);
header('Content-Type: application/json');

// Get the current and last year
$currentYear = date("Y");
$lastYear = $currentYear - 1;


$currentYearQuery = $db->query("SELECT COUNT(*) AS total 
    FROM patients 
    WHERE YEAR(date) = $currentYear
");
$currentYearData = $currentYearQuery->get();
$totalCurrentYear = $currentYearData['total'] ?? 0;


$currentYearReturningQuery = $db->query("SELECT COUNT(DISTINCT student_id) AS total 
    FROM old_prescriptions 
    WHERE YEAR(date) = $currentYear
");
$currentYearReturningData = $currentYearReturningQuery->get();
$totalCurrentYearReturning = $currentYearReturningData['total'] ?? 0;


$totalCurrentYear += $totalCurrentYearReturning;


$lastYearQuery = $db->query(" SELECT COUNT(*) AS total 
    FROM patients 
    WHERE YEAR(date) = $lastYear
");
$lastYearData = $lastYearQuery->get();
$totalLastYear = $lastYearData['total'] ?? 0;


$lastYearReturningQuery = $db->query("SELECT COUNT(DISTINCT student_id) AS total 
    FROM old_prescriptions 
    WHERE YEAR(date) = $lastYear
");
$lastYearReturningData = $lastYearReturningQuery->get();
$totalLastYearReturning = $lastYearReturningData['total'] ?? 0;


$totalLastYear += $totalLastYearReturning;


if ($totalLastYear > 0) {
    $percentageIncrease = (($totalCurrentYear - $totalLastYear) / $totalLastYear) * 100;
    $percentageIncrease = round($percentageIncrease, 1); 
} else {
    $percentageIncrease = "0% data from last year"; 
}

// Send JSON response
echo json_encode([
    "percentageIncrease" => $percentageIncrease
]);

exit;