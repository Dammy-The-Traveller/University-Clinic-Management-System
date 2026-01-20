<?php
header('Content-Type: application/json');


$apiKey = $_ENV['NEWS_API_KEY'] ?? null; 

if (!$apiKey) {
    echo json_encode(["error" => "API key not found"]);
    exit;
}


$apiUrl = "https://newsapi.org/v2/everything?q=WHO+health&apiKey=$apiKey";


$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $apiUrl);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($ch, CURLOPT_HTTPHEADER, [
    "User-Agent: MySchoolClinicApp/1.0", 
    "Accept: application/json"
]);

$response = curl_exec($ch);
$httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
curl_close($ch);


if ($httpCode !== 200) {
    echo json_encode([
        "error" => "Failed to fetch news",
        "status" => $httpCode,
        "api_url" => $apiUrl,
        "response" => json_decode($response, true)
    ]);
    exit;
}

// Return API response
echo $response;
exit;
?>
