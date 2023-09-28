<?php
session_start();

require_once('./../Model/ModelUser.php');

$respons = [];

if(isset($_POST['email']) && isset($_POST['password'])){
    
    
        
        $modelUser = new \Model\ModelUser\ModelUser();
        
        $email = $modelUser->isValid($_POST['email']);
        $password = $modelUser->isValid($_POST['password']);
        
        
            
            if($modelUser->connection($email, $password)){

                $_SESSION['autoris'] = 'ok';
                $_SESSION['email'] = $email;

                $respons['response'] = 200;
                
                
            } else {
                $respons[] = 'Incorect email or password !';
            }
}

echo json_encode($respons);