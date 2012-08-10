<?php 
include_once 'C:\Program Files\BitNami WAMPStack\apache2\htdocs\testGoals\controller\tasksController.php';
include_once 'C:\Program Files\BitNami WAMPStack\apache2\htdocs\testGoals\controller\goalsController.php';


$tasksController = new tasksController();

if(isset($_GET['d'])&&$_GET['d']==='true'){
    
    $response = $tasksController->deleteTask($_GET['id']);
    if($response){
        echo 'Õnnelikult kustutatud!<br />';
    }
    else{
        echo 'Kustutamine ei õnnestunud';
    }
}
?>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>VIEW TASKS</title>
    </head>
    <body>
          <a href="index.php?p=createTask">Create new task</a>
        <?php 
        
        
       
        $goalsController = new goalsController();
        
        $goals= $goalsController->getAllGoals();
        
         foreach ($goals as $goal){
             
             echo '<h3>'.$goal->__getHeading().'</h3>';
             
             $tasks = $tasksController->getTasksByGoal($goal->__getId());
         
                          
             echo '<ul>'; 
             
             foreach ($tasks as $task){
                
             
                 echo '<li>'.$task->__getHeading().' <a href="index.php?p=editTask&id='.$task->__getId().'">Edit</a>';
                 echo '   <a href="index.php?p=tasksView&d=true&id='.$task->__getId().'">Delete</a></li>';
                 
                 
             }
             echo '</ul>';
             
             
             
             
         }
        
        
        ?>
      
        
    </body>
</html>
