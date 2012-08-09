 <?php 

include_once 'C:\Program Files\BitNami WAMPStack\apache2\htdocs\testGoals\controller\goalsController.php';

if(isset($_GET['id'])&&$_GET['mode']==="edit"){
    $goalId = $_GET['id'];
    $controller = new goalsController();
    $goal = $controller->getGoalById($goalId); 

}

if(isset($_POST['save'])&&$_POST['mode']==="edit"){
                
             $_POST['from']="editGoal";
             $controller = new goalsController(); 
             
                    
             $response = $controller->processRequest($_POST);
            
             header("Location: http://localhost:8080/testGoals/index.php?p=editGoal&mode=edit&id=".$_POST['id']."&r=".$response);
             
           
         }
         
         else if (isset($_POST['save'])&& $_POST['mode']==="create"){
             
            $_POST['from']="createGoal";  
            $controller = new goalsController(); 
            
            $createdGoalId = $controller->processRequest($_POST);
            if (isset($createdGoalId)){
            
            header("Location: http://localhost:8080/testGoals/index.php?p=editGoal&mode=edit&id=".$createdGoalId."&r=1");
            
            }
            else {
               header("Location: http://localhost:8080/testGoals/index.php?p=editGoal&mode=create&r=0"); 
            }
             
         }
  
        


?>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>EDIT GOALS</title>
        
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
              
            Heading:   <input type="text" value="<?php if($_GET['mode']==="edit"){echo $goal->__getHeading();}?>" name="heading"/><br />
            Description: <input type ="text" value="<?php if($_GET['mode']==="edit"){echo $goal->__getDesc();}?>" name ="desc" /> <br />
            Due Date: <input type="text" value="<?php if($_GET['mode']==="edit"){echo $goal->__getDueDate();}?>" name="dueDate"/><br />
            
            <?php   if($_GET['mode']==="edit" && $goal->__getOnDashboard()==="1"){?>
            On Dashboard: <input  type="checkbox" name="onDashboard" checked="checked"/><?php }else {?>
            On Dashboard: <input  type="checkbox" name="onDashboard"/><?php }?>
            <?php if($_GET['mode']==="edit"){?>
            <input type="hidden" name="id" value="<?php echo $goal->__getId(); ?>" />
            <?php }?>
            <?php if($_GET['mode']==="edit"){?>
            <input type="hidden" name="mode" value="edit" /><br />
            <?php } else if($_GET['mode']==="create"){
                ?>
              <input type="hidden" name="mode" value="create" /><br />
                    <?php
            }?>
            <a href="index.php?p=goalsView">Cancel</a>
            <input type="submit" name ="save" value="Save" />
           
           
          
        </form>
      
              
     
    </body>
</html>

