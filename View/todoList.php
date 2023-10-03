<?php
// session_start();
// require_once('./../src/Model/ModelHandleTasks.php');
// $test = new Model\ModelHandleTasks\ModelHandleTasks();
// var_dump($test->getIdUser($_SESSION['email']));
// var_dump($_SESSION);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script defer src="./js/handleTasks.js"></script>
    <link rel="stylesheet" href="./css/style.css">
    <title>Super Reminder | Tasks</title>
</head>
<body>
    <h1>Super Reminder</h1>

    <input type="text" id="newList" placeholder="New Task ...">
    <button id="addList">Add</button>


    <div id="root"></div>
</body>
</html>