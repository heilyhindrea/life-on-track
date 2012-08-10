<?php
include_once 'C:\Program Files\BitNami WAMPStack\apache2\htdocs\testGoals\controller\tasksController.php';
include_once 'C:\Program Files\BitNami WAMPStack\apache2\htdocs\testGoals\controller\goalsController.php';
include_once 'C:\Program Files\BitNami WAMPStack\apache2\htdocs\testGoals\config\LogFile.php';


         
         if (isset($_POST['save'])){
             
            $_POST['from']="createTask";  
            $controller = new tasksController(); 
            
            $createdTaskId = $controller->processRequest($_POST);
            
           $log = new LogFile();
           $log->write("createTask: ".createdTaskId);
            
                       
            if (isset($createdTaskId)){
            
            header("Location: http://localhost:8080/testGoals/index.php?p=editTask&id=".$createdTaskId."&r=1");
            
            }
            else {
               header("Location: http://localhost:8080/testGoals/index.php?p=createTask&r=0"); 
            }
             
         }
?>

<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>CREATE TASK</title>
    </head>
    <body>
         <?php 
        if(isset($_GET['r'])&&$_GET['r']===0){
            
            echo 'Salvestamine ei õnnestunud :(.';
        
        }
               
         
        ?>
        
        <form method="post" action="">

            Heading: <input type="text" name="heading" /><br />
            Description:<input type="text" name="description" /><br /> 
            Due date:<input type="text" name="dueDate" /><br /> 
            Action date:<input type="text" name="actionDate" /> <br />  
            
            Belongs to Goal:<select name ="goalsList">
                <?php 
                
                $goalsController = new goalsController();
                $goals = $goalsController->getAllGoals();
                
                foreach($goals as $goal){
                    
                    
                   echo '<option name ="'.$goal->__getId().'" value="'.$goal->__getId().'">'.$goal->__getHeading().'</option>';
                }
                
                ?>
                
                
            </select><br />
           
            <a href="index.php?p=tasksView">Cancel</a>
            <input type="submit" name ="save" value="Save" />

        </form>
    </body>
</html>
