<header>
        <?php
            if(isset($_SESSION['autoris']) && $_SESSION['autoris'] === 'ok'){
        ?>
        <nav>
            <ul>
                <li><a href="./../src/Controller/ControllerDeconnect.php">deconnetion</a></li>
                <li><a href="./todoList.php">Remider</a></li>
            </ul>
        </nav>
    </header>

       <?php } else{ ;?>
           <header>
               <nav>
                   <ul>
                       <li><a href="./todoList.php">Remider</a></li>
                       <li><a href="./connection.php">Connection</a></li>
                       <li><a href="./register.html">Register</a></li>
                   </ul>
               </nav>
           </header>
       <?php }?>