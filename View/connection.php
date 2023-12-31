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
    <link rel="stylesheet" href="css/connect.css">
    <script defer src="./js/connect.js"></script>

    <title>Login</title>
</head>
<body>
<?php require_once('./include/header.php'); ?>

<section class="section">
                <aside class="left-aside">
                        <div class="paraf-4">
                               <div class="word-4">whath</div>
                               <div>to</div>
                               <div>do ?</div>
                        </div>
                        <div class="paraf-5">
                                <div>sign in</div>
                        </div>
                        <form action="" method="post" id="formConnect" class="form">
                            
                            <div class="form-container-login">
                                    <input type="email" name="email"  class="form-box-login"

                                    <?php
                                        if(isset($_SESSION['email'])){ ?>
                                        value=" <?= $_SESSION['email'];?>"
                                        <?php } else { ?>
                                            placeholder = "Enter your Email ..."
                                        <?php }; ?>>
                                        
                                    <input type="password" name="password" placeholder="Enter your  Password ..." class="form-box-login">
                            </div>
                            <div class="paraf-7">
                                    <button id="addList">Connection</button>
                            </div>
                        </form>

                        <div class="alert"></div>


                </aside>
                <aside class="right-aside-login">
                            <div class="paraf-1">create tasks</div>
                            <div class="paraf-2">
                                <p class="word-1">withe</p>
                                <p class="word-2">to </p>
                                <p class="word-3">do </p>
                                <p class="word-4">list</p>
                            </div>
                                <div class="paraf-3">
                                the new app creator of <br>
                                sheet  task to remind at <br>
                                time to do all your works <br>
                                </div>
                </aside>
     </section>

     <?php require_once('./include/footer.php'); ?>

</body>
</html>





