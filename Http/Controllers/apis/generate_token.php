<?php
use Core\App;
use Core\Database;
use Core\Validator;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\PHPMailer;
$db = App::resolve(Database::class);
$logged_user_type = $_SESSION['user']['UserType'];
$logged_user_id = $_SESSION['user']['ID'];

if (isset($_GET['email'])) {
                               
authorize($logged_user_type == 1 || $logged_user_type == 2);
$token =  generateToken();
$status = 'sent';
$createdAt = date('Y-m-d H:i:s');
$encodedEmail = $_GET['email'];
$email = base64_decode($encodedEmail);
$expiresAt = date('Y-m-d H:i:s', strtotime('+24 hours')); 

if (!Validator::email($email)) {
    $errors['email'] = 'Please provide a valid email address.';
    
 } 
 if (!empty($errors)) {
    return views('generate_token.view.php', [
        'errors' => $errors
    ]);
} 
$stmt = $db->query('INSERT INTO admin_verification (created_by, email, token, status, created_at, expires_at) VALUES (:created_by, :Email,:Token, :status, :Created_at, :Expires_At)', [
   'created_by' => $logged_user_id,
    'Email' => $email,
    'Token' => $token,
    'status' => $status,
    'Created_at' => $createdAt,
    'Expires_At' => $expiresAt
]);

if($stmt) {
    $verificationCode = $db->query(
        'SELECT token, expires_at FROM admin_verification 
         WHERE email = :email 
         ORDER BY created_at DESC 
         LIMIT 1', 
        ['email' => $email]
    )->find();
    
    echo json_encode(['success' => true] +  $verificationCode);
    $mail = new PHPMailer(true);
    try {
        $mail->isSMTP();
        $mail->Host = 'Your Server '; // SMTP server
        $mail->SMTPAuth = true;
        $mail->Username = $_ENV['SMTP_USERNAME'] ?? 'YOUR SMTP USERNAME'; 
        $mail->Password = $_ENV['SMTP_PASSWORD'] ?? 'YOUR SMTP PASSWORD';
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port = 587;

        $mail->setFrom('Your Email Address ', 'School Health Care');
        $mail->addAddress($email);

        $mail->isHTML(true);
        $mail->Subject = 'Your Secure Verification Token - School Health Care';
        $mail->Body = "
            <p>Dear User,</p>
        
            <p>We received a request to generate a verification token for your School Health Care account. Please use the token below to proceed:</p>
        
            <h2 style='color: #007bff; text-align: center; background: #f4f4f4; padding: 10px; border-radius: 5px;'>$token</h2>
        
            <p><strong>Expiration:</strong> This token is valid for <b>24 hours</b> and will expire on <b>$expiresAt</b>. Ensure you use it before then.</p>
        
            <p>If you did not request this token, please ignore this email. Your account security remains intact.</p>
        
            <p>For assistance, contact our support team at <a href='mailto:Your Email Address'>support@Your Server </a></p>
        
            <p>Best Regards,</p>
            <p><strong>School Health Care Team</strong></p>
        ";

        $mail->send();
        
        exit;
    } catch (Exception $e) {
        die('<script>alert("Mail Error: ' . addslashes($mail->ErrorInfo) . '"); window.history.back();</script>');
    }
   
} else {
    echo json_encode(["success" => false, "error" =>'Failed to generate token']);
    exit;
}
}else {
    echo json_encode(["success" => false, "error" =>'Email is required']);
   
    exit;
}