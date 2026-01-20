<?php 
use Core\App;
use Core\Database;
header('Content-Type: application/json');

$db = App::resolve(Database::class);


if ($_GET['ID'] == '') {
    echo json_encode(['success' => false, 'message' => 'Student ID is required']);
    exit;
}
if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['ID'])) {
   
    $idnumber = $_GET['ID'];


    try {
       
        // Query for drug details
      
       
            $DrugQuery = $db->query(
                "SELECT *
                 FROM drugs
                 WHERE indexnumber = :ID  AND quantity > 0
    AND indexnumber IS NOT NULL AND drugname IS NOT NULL AND drugcategory IS NOT NULL AND drugform IS NOT NULL AND strength IS NOT NULL
    AND quantity IS NOT NULL AND unitprice IS NOT NULL AND manufacturer IS NOT NULL AND date IS NOT NULL",
                ['ID' => $idnumber]
            )->find(); 
    
            if (!$DrugQuery) {
                echo json_encode(['success' => false, 'message' => 'Drug not found or out of stock']);
                exit;
            }
    
        
            // Send the data as JSON
            echo json_encode(['success' => true] + $DrugQuery);
            exit;
        

    

    } catch (Exception $e) {
        echo json_encode(['success' => false, 'message' => 'Error processing data']);
    }
} else {
    echo json_encode(["success" => false, "error" => "Invalid request"]);
}
