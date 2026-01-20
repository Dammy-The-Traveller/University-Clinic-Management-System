<?php
use Core\App;
use Core\Database;
$db = App::resolve(Database::class);
$logged_user_type = $_SESSION['user']['UserType'];
$logged_user_id = $_SESSION['user']['ID'];


// find the corresponding user
$user = $db->query('SELECT * from clinic_admins where id = :id', [
    'id' => $logged_user_id
])->findOrFail();

// authorize that the current user can edit the note
authorize($user['user_type'] == $logged_user_type );


$Category = trim($_POST['category'] ?? ''); 
$Date     = date('Y-m-d');

$required_fields = [
    'category' => $Category
];

foreach ($required_fields as $key => $value) {
    if (empty($value)) {
        die("<script>alert('Error: $key is required. Please fill in all required fields.'); window.history.back();</script>");
    }
}

if (!$Category) {
    echo json_encode(["success" => false, "error" => "Invalid request data."]);
    exit;
}

try {
    $result = $db->query('INSERT INTO drug_categories 
    (category, created_date) 
    VALUES 
    (:DrugCategory, :Date)', [
        'DrugCategory'  => $Category,
        'Date'          => $Date,
    ]);

    if ($result) {
        echo json_encode(['success' => true, 'message' => 'Drug Category Added successfully.']);

     
    } else {
        echo json_encode(['error' => 'Sorry an error occurred.']);
    }

} catch (PDOException $e) {
    echo json_encode(['error' => 'Sorry an error occurred']);
}
?>
