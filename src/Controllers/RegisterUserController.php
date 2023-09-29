<?php
namespace App\Controllers;
session_start();
use App\Models\UserModel;

class RegisterUserController{

    private UserModel $userModel ;

    public  $respons = [];



    public function __construct(){
        $this->userModel = new UserModel();
    }
    
    
    public function registerUser($firstname,$lastname,$email,$password,$rePass){
        
        if(isset($email)){
            
            // var_dump($_POST);
            
            if(isset($firstname) && isset($lastname) && isset($password) && isset($rePass)){
                
                $this->userModel = new UserModel();
                
                $firstname = $this->userModel->isValid($firstname);
                $lastname = $this->userModel->isValid($lastname);
                $email = $this->userModel->isValid($email);
                $password = $this->userModel->isValid($password);
                $rePass = $this->userModel->isValid($rePass);
                
                //****** */ validation inputs regExp.
                // **********************************
                
                // regExp valid first & last name: strlen > 2, accept only [A-Za-z0-9].
                
                $regExpName = '/^[A-Za-z][A-Za-z0-9]{1,15}$/';
                
                if(!preg_match($regExpName,$firstname) || !preg_match($regExpName,$lastname))
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
                    
                    if(!$this->userModel->check_Bd($email))
                    {
                        $password = password_hash($password, PASSWORD_DEFAULT, ['cost' => 12]);
                        $this->userModel->register($firstname, $lastname, $email, $password);
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
