<?php
session_start();

require_once('./../Model/ModelHandleTasks.php');
$modelHandleTask = new \Model\ModelHandleTasks\ModelHandleTasks();

if(isset($_SESSION['email']))
{
    $id_user = $modelHandleTask->getIdUser($_SESSION['email']);
    $titles = $modelHandleTask->getListes($id_user);
    // $titles2 = $modelHandleTask->getTitlesDone($id_user);
}

if(isset($_GET['listText']))
{
    $modelHandleTask->insertTitle($id_user, $_GET['listText']);
    // $titles = $modelHandleTask->getTitlesUser($id_user);
    echo json_encode($titles);
}

if(isset($_GET['status']))
{
    $modelHandleTask->doneList($_GET['status']);
    // todo add doneTasks
    echo json_encode($titles);
}

if(isset($_GET['delete']))
{
    $modelHandleTask->deleteList($_GET['delete']);
    // todo add doneTasks
    echo json_encode($titles);
}

if(isset($titles))
{
   echo json_encode($titles); 
}
