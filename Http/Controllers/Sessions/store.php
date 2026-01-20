<?php 

use Core\Authenticator;
use Http\Forms\LoginForm;
 

if (!hash_equals($_SESSION['csrf_token'], $_POST['csrf_token'] ?? '')) {
    die("<script>alert('Invalid CSRF token'); window.history.back();</script>");
}

$form = LoginForm::validate($attributes =[
    "email"=>  trim($_POST["email"],),
    "password"=> trim($_POST["password"]),
  
]);


$signedIn = (new Authenticator)->attempt(
    $attributes['email'], $attributes['password']
);


if ($signedIn === 'blocked') {
 
    $form->error(
        'email', 'Your account has been blocked. Please contact support.'
    )->throw();
}


if (!$signedIn) {
   $form->error(
    'email', 'No matching account found for that email and password.',
    
)->throw();

exit;
}


redirect('/Clinic-Management-System/dashboard');
exit;