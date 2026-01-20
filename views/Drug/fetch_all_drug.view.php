<?php
use Core\App;
use Core\Database;
$db = App::resolve(Database::class);
$logged_user_type = $_SESSION['user']['UserType'];

try {
  
    $newDrugs = $db->query("SELECT DISTINCT indexnumber, drugname, drugcategory, drugform, strength, quantity, unitprice, amount, manufacturer, date 
    FROM drugs  
    ORDER BY date DESC
")->get(); 
} catch (PDOException $e) {
    die("Error: Sorry an error occurred");
}
?>