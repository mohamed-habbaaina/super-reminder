<?php


?>
<!DOCTYPE html>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link rel="stylesheet" href="./src/Views/css/style.css">
    <title>Register</title>
</head>
<body>

<section class="section">
                <aside class="left-aside">
                        <div class="paraf-4">
                               <div class="word-4">whath</div>
                               <div>to</div>
                               <div>do ?</div>
                        </div>
                        <div class="paraf-5">
                                <div>sign up</div>
                        </div>
                        <form action="" method="post" id="formRegister" class="form">
                            <div><?=$repons?></div>
                            <div class="form-container">
                                    <input type="text" name="firstname" placeholder="Enter your FirstName ..." class="form-box">
                                    
                                    <input type="text" name="lastname" placeholder="Enter your lastName ..." class="form-box">
                                    
                                    <input type="email" name="email" placeholder="Enter your Email ..." class="form-box">
                                        
                                    <input type="password" name="password" placeholder="Enter your  Password ..." class="form-box">
                                    
                                    <input type="password" name="rePass" placeholder="Confirm the Password ..." class="form-box">
                            </div>
                            <div class="paraf-7">
                                    <input type="submit" name="submit" value="Register" class="btn">
                            </div>
                        </form>


                </aside>
                <aside class="right-aside-register">
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

</body>
</html>