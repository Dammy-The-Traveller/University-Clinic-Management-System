<?php 
namespace Core\middleware;
class AdminStudent{
    public function handle(){
        
        if($_SESSION['user']['UserType'] == 2  ?? false){
            abort(403);
            exit();
        }
    }
}