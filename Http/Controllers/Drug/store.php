<?php
use Core\App;
use Core\Database;

$db = App::resolve(Database::class);

// Get form inputs
$IndexNumber     = trim($_POST["IndexNumber"] ?? '');
$Drug_Name       = trim($_POST["DrugName"] ?? '');
$Drug_Category   = trim($_POST["DrugCategory"] ?? '');
$Drug_Form       = trim($_POST["DrugForm"] ?? '');
$Strength        = trim($_POST["strength"] ?? '');
$Quantity        = trim($_POST["Quantity"] ?? '');
$Bulk_Price      = trim($_POST["BulkPrice"] ?? '');
$Amount        = trim($_POST["amount"] ?? '');
$Manufacturer    = trim($_POST["manufacturer"] ?? '');
$Date            = date('Y-m-d');

// CSRF token check
if (!hash_equals($_SESSION['csrf_token'], $_POST['csrf_token'] ?? '')) {
    die("<script>alert('Invalid CSRF token'); window.history.back();</script>");
}


// Required field check
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

// Check if drug already exists
$existingDrug = $db->query('SELECT * FROM drugs 
                            WHERE indexnumber = :IndexNumber 
                              AND drugname = :DrugName 
                              AND drugcategory = :DrugCategory 
                              AND drugform = :DrugForm 
                              AND strength = :Strength', [
    'IndexNumber' => $IndexNumber,
    'DrugName'    => $Drug_Name,
    'DrugCategory'    => $Drug_Category,
    'DrugForm'    => $Drug_Form,
    'Strength'    => $Strength
])->find();

if ($existingDrug) {
    die('<script>alert("This drug has already been added before."); window.history.back();</script>');
}

// Insert drug
$db->query('INSERT INTO drugs 
(indexnumber, drugname,  drugcategory, drugform, strength, quantity, unitprice, amount, manufacturer, date) 
VALUES 
(:IndexNumber, :DrugName, :DrugCategory, :DrugForm, :Strength, :Quantity, :UnitPrice, :Amount, :Manufacturer, :Date)', [
    'IndexNumber'   => $IndexNumber,
    'DrugName'      => $Drug_Name,
    'DrugCategory'  => $Drug_Category,
    'DrugForm'      => $Drug_Form,
    'Strength'      => $Strength,
    'Quantity'      => $Quantity,
    'UnitPrice'     => $Bulk_Price,
    'Amount'        => $Amount,
    'Manufacturer'  => $Manufacturer,
    'Date'          => $Date,
]);

// Redirect on success
header('Location: /Clinic-Management-System/Drug-List');
exit();
