<?php
namespace Model\ModelHandleTasks;
use Model\DbConnection\DbConnection;
require_once ('DbConnection.php');

class ModelHandleTasks{
    public function __construct()
    {

    }

    public function getIdUser(string $email) : int|bool
    {
        $reqIdUser = 'SELECT `user`.`id_user` FROM `user` WHERE `email` = :email';
        $data = DbConnection::getDb()->prepare($reqIdUser);
        $data->bindParam(':email', $email);
        $data->execute();
        $dataUser = $data->fetch(\PDO::FETCH_ASSOC);
        return $dataUser['id_user'] ?? false;
    }

    public function getListes(string $idUser) : array | bool
    {
        $reqTitles = "SELECT * FROM `list` WHERE id_user=:idUser";
        $data = DbConnection::getDb()->prepare($reqTitles);
        $data->bindParam(':idUser', $idUser);
        $data->execute();
        return $data->fetchAll(\PDO::FETCH_ASSOC) ?? false;
    }

    // public function getTitlesDone(string $idUser) : array | bool
    // {
    //     $reqTitles = "SELECT * FROM `list` WHERE id_user=:idUser AND status='fait'";
    //     $data = DbConnection::getDb()->prepare($reqTitles);
    //     $data->bindParam(':idUser', $idUser);
    //     $data->execute();
    //     return $data->fetchAll(\PDO::FETCH_ASSOC) ?? false;
    // }

    public function getAllTasks(int $idTitle) : array | bool
    {
        $reqTasks = 'SELECT * FROM `task` WHERE id_list=:idTitle';
        $data = DbConnection::getDb()->prepare($reqTasks);
        $data->bindParam(':idTitle', $idTitle);
        $data->execute();
        return $data->fetchAll(\PDO::FETCH_ASSOC) ?? false;
    }

    public function insertTitle(int $idUser, string $title) : void
    {
        $reqInsrtTitle = "INSERT INTO `list` (`id_user`, `title`, `status`) VALUES (:idUser, :title, 'en cours')";
        $data = DbConnection::getDb()->prepare($reqInsrtTitle);
        $data->bindParam(':idUser', $idUser);
        $data->bindParam(':title', $title);
        $data->execute();
    }

    public function insertTask(int $idTitle, string $title, string $description) : void
    {
        $reqInsertTask = "INSERT INTO `task`(`id_list`, `title`, `description`, `status`, `date`) VALUES (:idTitle, :title, :description, 'en cours', NOW())";
        $data = DbConnection::getDb()->prepare($reqInsertTask);
        $data->bindParam(':idTitle', $idTitle);
        $data->bindParam(':title', $title);
        $data->bindParam(':description', $description);
        $data->execute();

    }

    public function updateTitleTask(int $idUser) : void
    {

    }
    public function updateTask(int $idTitle) : void
    {

    }

    // changer le status en cours => done
    public function doneList($id_list) : void
    {
        $updatStatus = "UPDATE `list` SET `status`='fait' WHERE id_list=:id_list";
        $data = DbConnection::getDb()->prepare($updatStatus);
        $data->bindParam(':id_list', $id_list);
        $data->execute();
    }

    public function doneTask() : void
    {
        
    }

    // delete list
    public function deleteList($id_list) : void
    {
        $delete = "DELETE FROM `list` WHERE id_list=:id_list";
        $data = DbConnection::getDb()->prepare($delete);
        $data->bindParam(':id_list', $id_list);
        $data->execute();
    }
}