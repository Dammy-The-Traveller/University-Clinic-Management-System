<?php
use Core\App;
use Core\Database;
$db = App::resolve(Database::class);
$logged_user_type = $_SESSION['user']['UserType'];

try {
  
    $DrugsCategories = $db->query("SELECT DISTINCT category
    FROM drug_categories 
    WHERE category IS NOT NULL AND category != ''
    ORDER BY category ASC
")->get();


 
   
} catch (PDOException $e) {
    die("Error: Sorry an error occurred");
}
?>