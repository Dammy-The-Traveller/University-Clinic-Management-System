<?php

use Core\App;
use Core\Database;
use Core\Validator;

$db = App::resolve(Database::class);
$logged_user_type = $_SESSION['user']['UserType'];
$logged_user_id = $_SESSION['user']['ID'];
$IndexNumber     = trim($_POST["IndexNumber"] ?? '');
$Drug_Name       = trim($_POST["DrugName"] ?? '');
$Drug_Category   = trim($_POST["DrugCategory"] ?? '');
$Drug_Form       = trim($_POST["DrugForm"] ?? '');
$Strength        = trim($_POST["strength"] ?? '');
$Quantity        = trim($_POST["Quantity"] ?? '');
$Bulk_Price      = trim($_POST["BulkPrice"] ?? '');
$Amount          = trim($_POST["amount"] ?? '');
$Manufacturer    = trim($_POST["manufacturer"] ?? '');
$Date            = date('Y-m-d');

if (!hash_equals($_SESSION['csrf_token'], $_POST['csrf_token'] ?? '')) {
    die("<script>alert('Invalid CSRF token'); window.history.back();</script>");
}
$required_fields = [
    'Index Number' => $IndexNumber,
    'Drug Name'    => $Drug_Name,
    'DrugCategory'    => $Drug_Category,
    'Drug Form'    => $Drug_Form,
    'Strength'     => $Strength,
    'Quantity'     => $Quantity,
    'Bulk Price'   => $Bulk_Price,
    'Amount'       => $Amount,
    'Manufacturer' => $Manufacturer,
];

foreach ($required_fields as $key => $value) {
    if (empty($value)) {
        die("<script>alert('Error: $key is required. Please fill in all required fields.'); window.history.back();</script>");
    }
}

// find the corresponding user
$user = $db->query('SELECT * from clinic_admins where id = :id', [
    'id' => $logged_user_id
])->findOrFail();

// authorize that the current user can edit the note
authorize($user['user_type'] == $logged_user_type );





$db->query('UPDATE drugs SET 
    drugname = :DrugName, 
    drugcategory = :DrugCategory, 
    drugform = :DrugForm, 
    strength = :Strength, 
    quantity = :Quantity,
    unitprice = :BulkPrice,
    amount = :Amount,
    manufacturer = :Manufacturer
WHERE indexnumber = :indexnumber AND ID= :id', [
    'indexnumber' => $IndexNumber,
    'DrugName' => $Drug_Name,
    'DrugCategory' => $Drug_Category,
    'DrugForm' => $Drug_Form,
    'Strength' => $Strength,
    'Quantity' => $Quantity,
    'BulkPrice' => $Bulk_Price,
    'Amount' => $Amount,
    'Manufacturer' => $Manufacturer,
    'id' => $_POST['id']
]);


// redirect the user
header('location: /Clinic-Management-System/Drug-List');
exit;
