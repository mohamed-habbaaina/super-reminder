<?php
session_start();
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
    <header>
        <?php
            if(isset($_SESSION['autoris']) && $_SESSION['autoris'] === 'ok'){
        ?>
        <nav>
            <ul>
                <li><a href="./../src/Controller/ControllerDeconnect.php">deconnetion</a></li>
            </ul>
        </nav>
    </header>
    <h1>Super Reminder</h1>

    <input type="text" id="newList" placeholder="New Task ...">
    <button id="addList">Add</button>


    <div id="root"></div>

            <?php } else{ ;?>
                <header>
                    <nav>
                        <ul>
                            <li><a href="./connection.php">connection</a></li>
                            <li><a href="./register.html">register</a></li>
                        </ul>
                    </nav>
                </header>
                <h1>Super Reminder</h1>
                <p>Please <a href="./connection.php">log in</a> ...</p>
            <?php }?>

<?php require_once('./include/footer.php'); ?>

</body>
</html>