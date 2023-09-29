<?php
namespace App\Controllers;
namespace App\Models;
session_start();
use App\Models\UserModel;
class RegisterUserController{

    private UserModel $userModel ;

    public  $respons = [];



    public function __construct(){
        $this->userModel = new UserModel();
    }
    
    
    public function RegisterUser(){
        
        if(isset($_POST['email'])){
            
            // var_dump($_POST);
            
            if(isset($_POST['firstName']) && isset($_POST['lastName']) && isset($_POST['password']) && isset($_POST['rePass'])){
                
                $modelUser = new \Model\ModelUser\ModelUser();
                
                $firstName = $modelUser->isValid($_POST['firstName']);
                $lastName = $modelUser->isValid($_POST['lastName']);
                $email = $modelUser->isValid($_POST['email']);
                $password = $modelUser->isValid($_POST['password']);
                $rePass = $modelUser->isValid($_POST['rePass']);
                
                //****** */ validation inputs regExp.
                // **********************************
                
                // regExp valid first & last name: strlen > 2, accept only [A-Za-z0-9].
                
                $regExpName = '/^[A-Za-z][A-Za-z0-9]{1,15}$/';
                
                if(!preg_match($regExpName,$firstName) || !preg_match($regExpName,$lastName))
                {
                    $respons['Name'] = 'Note valide, minimum 2 character !';
                }
        
                // regExp valid Email.
        
                $regExpEmail = '/^[_a-zA-Z0-9-]+(\.[_a-zA-Z0-9-]+)*@[a-zA-Z0-9-]+(\.[a-zA-Z0-9-]+)*(\.[a-z]{2,5})$/'; 
        
                if(!preg_match($regExpEmail, $email))
                {
                    $respons['Email'] = 'Note valide !';
                }
        
                
                // regExp valid Password: strlen >7, accept only [A-Za-z0-9] && minimum 1 lower case 1 upper case 1 number.
                
                $regExpPass = '/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[a-zA-Z\d]{8,}$/';
                
                if(!preg_match($regExpPass,$password)){
                    $respons['Password'] = 'Note valid, Minimum 8 characters, 1 Upper case, 1 Lower case, 1 number !';
                }
                
                if($password !== $rePass){
                    
                    $respons['Repeat password'] = 'Password not match !';
                }
                
                if(empty($respons)){
                    
                    if(!$modelUser->check_DB($email))
                    {
                        $password = password_hash($password, PASSWORD_DEFAULT, ['cost' => 12]);
                        $modelUser->register($firstName, $lastName, $email, $password);
                        $respons['ok'] = 'Register succes !';
                        
                        $_SESSION['email'] = $email;
                        
                    } else {
                        $respons['email'] = 'email exist in database !';
                    }
                }
            } else {
                $respons[] = 'Messing informations !';
            }
        }
        
        echo json_encode($respons);


    }
    



}
