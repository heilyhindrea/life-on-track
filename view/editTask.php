<?php
include_once 'C:\Program Files\BitNami WAMPStack\apache2\htdocs\testGoals\controller\tasksController.php';
include_once 'C:\Program Files\BitNami WAMPStack\apache2\htdocs\testGoals\controller\goalsController.php';

if (isset($_GET['id'])&&$_GET['mode']==="edit") {
    $taskId = $_GET['id'];
    $controller = new tasksController();
    $task = $controller->getTaskById($taskId);
}

if(isset($_POST['save'])&&$_POST['mode']==="edit"){
                
             $_POST['from']="editTask";
             $controller = new tasksController(); 
             
                    
             $response = $controller->processRequest($_POST);
            
             header("Location: http://localhost:8080/testGoals/index.php?p=editTask&id=".$_POST['id']."&r=".$response);
             
           
         }
         
         else if (isset($_POST['save'])&& $_POST['mode']==="create"){
             
            $_POST['from']="createTask";  
            $controller = new tasksController(); 
            
            $createdTaskId = $controller->processRequest($_POST);
            
                       
            if (isset($createdTaskId)){
            
            header("Location: http://localhost:8080/testGoals/index.php?p=editTask&mode=create&id=".$createdTaskId."&r=1");
            
            }
            else {
               header("Location: http://localhost:8080/testGoals/index.php?p=editTask&mode=create&r=0"); 
            }
             
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

            Heading: <input type="text" name="heading" value="<?php if($_GET['mode']==="edit"){echo $task->__getHeading();} ?>"/><br />
            Description:<input type="text" name="description" value="<?php if($_GET['mode']==="edit"){echo $task->__getDescription(); }?>"/><br /> 
            Due date:<input type="text" name="dueDate" value="<?php if($_GET['mode']==="edit"){echo $task->__getDueDate();} ?>"/><br /> 
            Action date:<input type="text" name="actionDate" value="<?php if($_GET['mode']==="edit"){echo $task->__getActionDate();} ?>"/> <br />  
            Belongs to Goal:<select>
                <?php 
                
                $goalsController = new goalsController();
                $goals = $goalsController->getAllGoals();
                
                foreach($goals as $goal){
                    
                    /*PPS! see oht  on siin alles muutmata*/
                    echo '<option value="'.$goal->__getId().'">Volvo</option>';
                }
                
                ?>
                
                
            </select>
            
            <input type="hidden" name="goalId" value="1" />
            
            <?php 
            
             
            if($_GET['mode']==="edit"){?>
            <input type="hidden" name="id" value="<?php echo $task->__getId(); ?>" />
            <?php }?>
            <?php if($_GET['mode']==="edit"){?>
            <input type="hidden" name="mode" value="edit" /><br />
            <?php } else if($_GET['mode']==="create"){
                ?>
              <input type="hidden" name="mode" value="create" />
                    <?php
            }?>
            <a href="index.php?p=tasksView">Cancel</a>
            <input type="submit" name ="save" value="Save" />

        </form>
    </body>
</html>
