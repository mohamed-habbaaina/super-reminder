<?php
session_start();
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script defer src="./js/connect.js"></script>
    <title>Super Reminder | Connection</title>
</head>
<body>
<main>
<?php require_once('./include/header.php'); ?>
    <div class="alert"></div>

    <form action="" method="post" id="formConnect">
        
        <h1>Connection</h1>
        
        <label for="email">Email</label>
        <input type="email" name="email" 
        <?php
                if(isset($_SESSION['email'])){ ?>
                value="<?= $_SESSION['email'];?>"
                <?php } else { ?>
                    
                    placeholder="Your Email ...">
                    <?php }; ?>
                    
                    <label for="password">Password</label>
                    <input type="password" name="password" placeholder="Your  Password ...">
                    
                    <button class="btn">Connection</button>
    </form>
                
    <?php require_once('./include/footer.php'); ?>
       
</main>

</body>
</html>