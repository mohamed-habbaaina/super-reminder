<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link rel="stylesheet" href="css/style.css">
    <script defer src="./js/handleTasks.js"></script>
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
     <section class="section">

                <aside class="left-aside">
                        <div class="paraf-4">
                               <div class="word-4">whath</div>
                               <div>to</div>
                               <div>do ?</div>

                        </div>
                        <div class="startline">
                                <div>start to creat tasks</div>
                        </div>
                      
                        <div class="arrea">
                                <input type="text"  id="newList" placeholder="new Task ..." class="list-box"></input>
                                <button id="addList" class="adding">Add</button>
                        </div>
                       
                </aside>
                <aside class="right-aside">
                            <div class="paraf-8">
                                <p class="word-2">to </p>
                                <p class="word-3">do </p>
                                <p class="word-4">list</p>
                            </div>
                             <div class="list-container">
                               <ul>
                                    <li>
                                            <h2 id="root">Tasks :</h2>
                                    </li>
                                   
                               </ul>
                               
                            </div>
                        </aside>
    </section>
    <?php } else{ ;?>
                <header>
                    <nav>
                        <ul>
                            <li><a href="./connection.php">connection</a></li>
                            <li><a href="./register.php">register</a></li>
                        </ul>
                    </nav>
                </header>

                <div id="div_H_connect">
                    <h1>Super Reminder</h1>
                    <p>Please <a href="./connection.php">log in</a> ...</p>
                </div>
            <?php }?>

<?php require_once('./include/footer.php'); ?>


</body>
</html>

<!-- <header>
        <?php
            //if(isset($_SESSION['autoris']) && $_SESSION['autoris'] === 'ok'){
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

            <?php //} else{ ;?>
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
            <?php //}?>

<?php //require_once('./include/footer.php'); ?> -->












































































































































































































