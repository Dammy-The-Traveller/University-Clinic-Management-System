<?php
use Core\App;
use Core\Database;
$db = App::resolve(Database::class);
$logged_user_type = $_SESSION['user']['UserType'];

try {
  
    $Drugs = $db->query("SELECT DISTINCT indexnumber, drugname
    FROM drugs 
    WHERE quantity > 0
    ORDER BY drugname ASC
")->get();


 
   
} catch (PDOException $e) {
    die("Error: Sorry an error occurred");
}
?>