<?php
namespace ModelHandleTasks;
use Model\DbConnection\DbConnection;
require_once ('DbConnection.php');

class ModelHandleTasks{
    public function __construct()
    {

    }

    public function getIdUser(string $email) : int
    {
        $reqIdUser = 'SELECT ';
    }

    public function getTitleTasks(string $idUser) : array | bool
    {

    }

    public function getAllTasks(int $idUser, int $idTitle) : array | bool
    {

    }

    public function insertTitleTask(int $idUser) : void
    {

    }
    public function insertTask(int $idTitle) : void
    {

    }

    public function updateTitleTask(int $idUser) : void
    {

    }
    public function updateTask(int $idTitle) : void
    {

    }
}