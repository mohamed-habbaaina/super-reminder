<?php
session_start();

require_once('./../Model/ModelUser.php');

$respons = [];

if(isset($_POST['login'])){
    
    
    if(isset($_POST['firstName']) && isset($_POST['lastName']) && isset($_POST['password']) && isset($_POST['rePass'])){
        
        $modelUser = new \Model\ModelUser\ModelUser();
        
        $login = $modelUser->isValid($_POST['login']);
        $firstName = $modelUser->isValid($_POST['firstName']);
        $lastName = $modelUser->isValid($_POST['lastName']);
        $password = $modelUser->isValid($_POST['password']);
        $rePass = $modelUser->isValid($_POST['rePass']);
        
        //****** */ validation inputs regExp.
        // **********************************
        
        // regExp valid first & last name: strlen > 2, accept only [A-Za-z0-9].
        
        $regExpName = '/^[A-Za-z][A-Za-z0-9]{1,15}$/';
        
        if(!preg_match($regExpName,$firstName) || !preg_match($regExpName,$lastName)){
            $respons['Name'] = 'Note valide, minimum 2 character !';
        }
        
        // regExp valid Password: strlen >7, accept only [A-Za-z0-9] && minimum 1 lower case 1 upper case 1 number.
        
        $regExpPass = '/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[a-zA-Z\d]{8,}$/';
        
        if(!preg_match($regExpPass,$password)){
            $respons['Password'] = 'Note valid, Minimum 8 characters, 1 Upper case, 1 Lower case, 1 number !';
        }
        
        if($password !== $rePass){
            
            $respons['RePassword'] = 'Password not match !';
        }
        
        if(empty($respons)){
            
            if(!$modelUser->check_DB($login)){
                
                $password = password_hash($password, PASSWORD_DEFAULT, ['cost' => 12]);
                $modelUser->register($login, $firstName, $lastName, $password);
                $respons['ok'] = 'Register succes !';
                
                $_SESSION['login'] = $login;
                
            } else {
                $respons['login'] = 'Login exist in database !';
            }
        }
    } else {
        $respons[] = 'Messing informations !';
    }
}

echo json_encode($respons);