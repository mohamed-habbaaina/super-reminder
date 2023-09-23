<?php
namespace Model\ModelUser;
use Model\DbConnection\DbConnection;
require_once ('DbConnection.php');
class ModelUser {
    public function __construct()
    {

    }

    // Cross-site scripting (XSS)
    public function isValid(string $input): string
    {
        $input = trim($input);
        $input = htmlspecialchars($input);
        $input = strip_tags($input);

        return $input;
    }

    // Check if login exists in the database
    public function check_DB(string $login): array|bool
    {
        $requestCheck = "SELECT * FROM `user` WHERE `login`=:login";
        $data = DbConnection::getDb()->prepare($requestCheck);
        $data->bindParam(':login', $login);
        $data->execute();
        return $data->fetch(\PDO::FETCH_ASSOC) ?? false;
    }

    /**
     * Register the user in the database.
     */
    public function register(string $login, string $firstname, string $lastname, string $password): void
    {
            $requestInsert = "INSERT INTO `user` (`login`, `firstname`, `lastname`, `password`) 
                                VALUE (:login, :firstname, :lastname, :password)";
            $request = DbConnection::getDb()->prepare($requestInsert);
            $request->bindParam(':login', $login);
            $request->bindParam(':firstname', $firstname);
            $request->bindParam(':lastname', $lastname);
            $request->bindParam(':password', $password);
            $request->execute();
    }
}