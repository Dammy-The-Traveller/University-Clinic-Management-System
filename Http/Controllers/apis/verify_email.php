<?php
use Core\App;
use Core\Database;
header('Content-Type: application/json');

$email = $_GET['email'] ?? '';

if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    echo json_encode(['valid' => false, 'error' => 'Invalid email format']);
    exit;
}


$domain = substr(strrchr($email, "@"), 1);
if (checkdnsrr($domain, "MX")) {
    echo json_encode(['valid' => true]);
} else {
    echo json_encode(['valid' => false, 'error' => 'Email domain not reachable']);
}
