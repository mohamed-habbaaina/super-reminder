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
                                <input type="text"  id="newList" placeholder="new List" class="list-box"></input>
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
                                            <h2 id="root">Title of List</h2>
                                            <p id="date">date of the list creation</p>
                                            <div id="task">task</div>
                                            <input type="text" name="task" placeholder="new task">
                                            <button id="addtask" class="btn">add task</button>
                                    </li>
                                   
                               </ul>
                               
                            </div>
                        </aside>
                        
                                                    
     </section>
</body>
</html>












































































































































































































