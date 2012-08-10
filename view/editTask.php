<?php
include_once 'C:\Program Files\BitNami WAMPStack\apache2\htdocs\testGoals\controller\tasksController.php';
include_once 'C:\Program Files\BitNami WAMPStack\apache2\htdocs\testGoals\controller\goalsController.php';

if (isset($_GET['id'])) {
    $taskId = $_GET['id'];
    $controller = new tasksController();
    $task = $controller->getTaskById($taskId);
}

if(isset($_POST['save'])){
                
             $_POST['from']="editTask";
             $controller = new tasksController(); 
             
                    
             $response = $controller->processRequest($_POST);
            
             header("Location: http://localhost:8080/testGoals/index.php?p=editTask&id=".$_POST['id']."&r=".$response);
             
           
         }
     
?>

<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>EDIT TASKS</title>
    </head>
    <body>
         <?php 
        
               
         if(isset($_GET['r'])){
            switch($_GET['r']){
               
               case 0:
                   echo 'Salvestamine ei õnnestunud :(.';
                   break;        
                
               case 1:
                   echo 'Salvestamine õnnestus. Jeeee :).';
                   break; 
             
            }
            
            }
        ?>
        
        <form method="post" action="">

            Heading: <input type="text" name="heading" value="<?php echo $task->__getHeading(); ?>"/><br />
            Description:<input type="text" name="description" value="<?php echo $task->__getDescription(); ?>"/><br /> 
            Due date:<input type="text" name="dueDate" value="<?php echo $task->__getDueDate(); ?>"/><br /> 
            Action date:<input type="text" name="actionDate" value="<?php echo $task->__getActionDate(); ?>"/> <br />  
            Belongs to Goal:<select name ="goalsList">
                <?php 
                
                $goalsController = new goalsController();
                $goals = $goalsController->getAllGoals();
                
                foreach($goals as $goal){
                    
                
                    if($task->__getGoal()===$goal->__getId()){
                        echo '<option selected = "selected"name ="'.$goal->__getId().'" value="'.$goal->__getId().'">'.$goal->__getHeading().'</option>';
                    }
                    else {echo '<option name ="'.$goal->__getId().'" value="'.$goal->__getId().'">'.$goal->__getHeading().'</option>';}
                }
                
                ?>
                
                
            </select>
            
            <input type="hidden" name="id" value="<?php echo $task->__getId(); ?>" /><br /> 
           
            <a href="index.php?p=tasksView">Cancel</a>
            <input type="submit" name ="save" value="Save" />

        </form>
    </body>
</html>
