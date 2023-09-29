<?php
namespace App\Models;

use PDO;

class UserModel extends DbConnexion{


public function __construct(){
    $this->getDb();
}



//cross-site scripting (XSS)
public function isValid(string  $input) : string {
    $input = trim($input);
    $input = htmlspecialchars($input);
    $input = strip_tags($input);

    return $input;

}

//check if email exist in database

public function check_Bd(string $email): array|bool{
        $requestCheck = "SELECT* FROM `user` WHERE `email` = :email";
        $data = $this->getDb()->prepare($requestCheck);
        $data->execute([
            ':email' => $email,
        ]);
        return $data->fetch(\PDO::FETCH_ASSOC) ?? false;
}


public function register(string $firstname, string $lastname, string $email, string $password):void {

        $requestInsert = "INSERT INTO `user`(firstname, lastname, email, password) values(:firstname, :lastname, :email, :password)";
        $request = $this->getDb()->prepare($requestInsert);
        $request->execute([
            ':firstname' => $firstname,
            ':lastname' => $lastname,
            ':email' => $email,
            ':password' => $password,
        ]);

}



public function connection(string $email, string $password): bool
{

    $data = $this->check_Bd($email);

    if(!empty($data)){

        $password_db = $data['password'];
        

            // check password Haché.
            if (password_verify($password, $password_db)){
              
                return true;

            }else{

                return false;
            }
    }else{
        return false;
    }
}














}

// namespace Model\ModelUser;
// use Model\DbConnection\DbConnection;
// require_once ('DbConnection.php');
// class ModelUser {
//     public function __construct()
//     {

//     }

    // Cross-site scripting (XSS)
    // public function isValid(string $input): string
    // {
    //     $input = trim($input);
    //     $input = htmlspecialchars($input);
    //     $input = strip_tags($input);

    //     return $input;
    // }

    // Check if email exists in the database
    // public function check_DB(string $email): array|bool
    // {
    //     $requestCheck = "SELECT * FROM `user` WHERE `email`=:email";
    //     $data = DbConnection::getDb()->prepare($requestCheck);
    //     $data->bindParam($email,':email');
    //     $data->execute();
    //     return $data->fetch(\PDO::FETCH_ASSOC) ?? false;
    // }

    /**
     * Register the user in the database.
     */
    // public function register(string $firstname, string $lastname, string $email,  string $password): void
    // {
    //         $requestInsert = "INSERT INTO `user` (`firstname`, `lastname`, `email`, `password`) 
    //                             VALUE (:firstname, :lastname, :email, :password)";
    //         $request = DbConnection::getDb()->prepare($requestInsert);
    //         $request->bindParam(':firstname', $firstname);
    //         $request->bindParam(':lastname', $lastname);
    //         $request->bindParam(':email', $email);
    //         $request->bindParam(':password', $password);
    //         $request->execute();
    // }

    // public function connection(string $email, string $password): bool
    // {

    //     $data = $this->check_DB($email);

    //     if(!empty($data)){

    //         $password_db = $data['password'];
            

    //             // check password Haché.
    //             if (password_verify($password, $password_db)){
                  
    //                 return true;

    //             }else{

    //                 return false;
    //             }
    //     }else{
    //         return false;
    //     }
    // }
// }