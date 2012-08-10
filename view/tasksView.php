<?php 
include_once 'C:\Program Files\BitNami WAMPStack\apache2\htdocs\testGoals\controller\tasksController.php';
include_once 'C:\Program Files\BitNami WAMPStack\apache2\htdocs\testGoals\controller\goalsController.php';

?>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>VIEW TASKS</title>
    </head>
    <body>
          <a href="index.php?p=editTask&mode=create">Create new task</a>
        <?php 
        
        
        $tasksController = new tasksController();
        $goalsController = new goalsController();
        
        $goals= $goalsController->getAllGoals();
        
         foreach ($goals as $goal){
             
             echo '<h3>'.$goal->__getHeading().'</h3>';
             
             $tasks = $tasksController->getTasksByGoal($goal->__getId());
         
                          
             echo '<ul>'; 
             
             foreach ($tasks as $task){
                
             
                 echo '<li>'.$task->__getHeading().' <a href="index.php?p=editTask&mode=edit&id='.$task->__getId().'">Edit</a></li>';
                 
                 
                 
             }
             echo '</ul>';
             
             
             
             
         }
        
        
        ?>
      
        
    </body>
</html>
