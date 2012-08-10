 <?php 

include_once 'C:\Program Files\BitNami WAMPStack\apache2\htdocs\testGoals\controller\goalsController.php';

if (isset($_POST['save'])){
             
            $_POST['from']="createGoal";  
            $controller = new goalsController(); 
            $createdGoalId = $controller->processRequest($_POST);
            
            if (isset($createdGoalId)){
            
            header("Location: http://localhost:8080/testGoals/index.php?p=editGoal&id=".$createdGoalId."&r=1");
            
            }
            else {
               header("Location: http://localhost:8080/testGoals/index.php?p=createGoal&r=0"); 
            }
             
         }
 
?>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>CREATE GOALS</title>
        
    </head>
    <body>
        <?php 
        if(isset($_GET['r'])&&$_GET['r']===0){
            echo 'Salvestamine ei õnnestunud :(!';
        }
        ?>
        <form method="post" action="">
              
            Heading:   <input type="text" name="heading"/><br />
            Description: <input type ="text" name ="desc" /> <br />
            Due Date: <input type="text" name="dueDate"/><br />
            On Dashboard: <input  type="checkbox" name="onDashboard"/><br />
            <a href="index.php?p=goalsView">Cancel</a>
            <input type="hidden" name="mode" value="create" /> 
            <input type="submit" name ="save" value="Save" />
            
         
        </form>
    
    </body>
</html>

