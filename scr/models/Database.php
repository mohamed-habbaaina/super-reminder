<?php
namespace App\Models;
use PDO;
use PDOException;

abstract class Database{

    //connecxion à la base de données 

    protected $pdo;

    protected function setBdd(){
        try{
            $this->pdo = new PDO('mysql:host=localhost;dbname=superReminder','root','');
        }catch(PDOException $e){
            echo 'connection to fail:', $e->getMessage();
        }
    }
}