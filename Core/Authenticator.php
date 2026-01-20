<?php 

namespace Core;
use Core\Database;
class Authenticator{
  public function attempt($email, $password)
    {
        $user = App::resolve(Database::class)
            ->query('SELECT * FROM clinic_admins WHERE email = :email', [
            'email' => $email
        ])->find();

        if ($user) {
          if ($user['block'] === 'Y') {
            return 'blocked';     
        }
  
            if (password_verify($password, $user['password'])) {
                $this->login([
                    'id' => $user['id'],
                    'firstname' => $user['firstname'],
                    'lastname' => $user['lastname'],
                    'email' => $user['email'],
                    'user_type' => $user['user_type'],
                ]);
             
                return true;
            }
        }
       
        return false;
    }

 public function login($user){
     // register user in session
     
     $oldSessionData = [
      'user' => [
        'ID' => (int) $user['id'],
        'firstname' => $user['firstname'],
        'lastname' => $user['lastname'],
           'email' => $user['email'],
           'UserType' => (int) $user['user_type'],
      ]
  ];

  

    // $oldSessionData = $_SESSION['user'];
     session_regenerate_id(true);
     $_SESSION = $oldSessionData;
    
}

public function logout(){
    Session::destroy();
  
}

}