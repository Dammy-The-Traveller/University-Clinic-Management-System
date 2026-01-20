<?php 
use Core\Response;
function ddd($value){
    echo '<pre>';
    var_dump($value);
    echo '</pre>';
   
}

function uRLIs($value){
    return $_SERVER['REQUEST_URI'] === $value;
}

function abort($code = 404){
    http_response_code($code);

    require base_path("views/{$code}.php");
    exit;
}

function authorize($condition, $status = Response::FORBIDDEN){
  
    if(!$condition){
     abort($status);
    }
}


function base_path($path){
   return BASE_PATH . $path;
   
}

function views($path, $attribute=[]){
    extract($attribute);
    require base_path('views/'. $path);
}


function redirect($path){
    header("location: {$path}");
    exit();
}

function old($key, $default){
    return Core\Session::get('old')[ $key ] ?? $default;
}

function generateToken() {
    return intval(rand(100001,999999));  
}
function generateDrugIndex() {
    return intval(rand(00001,99999));  
}
function generateStaffIndex() {
    $number = rand(1, 99999); // generate a number between 1 and 99999
    $padded = str_pad($number, 5, '0', STR_PAD_LEFT); // pad it with zeros to 5 digits
    return "STF_" . $padded;
}

if (empty($_SESSION['csrf_token'])) {
    $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
}