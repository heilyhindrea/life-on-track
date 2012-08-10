 <?php 

include_once 'C:\Program Files\BitNami WAMPStack\apache2\htdocs\testGoals\controller\goalsController.php';

if(isset($_GET['id'])){
    $goalId = $_GET['id'];
    $controller = new goalsController();
    $goal = $controller->getGoalById($goalId); 

}

if(isset($_POST['save'])){
                
             $_POST['from']="editGoal";
             $controller = new goalsController(); 
             $response = $controller->processRequest($_POST);
            
             header("Location: http://localhost:8080/testGoals/index.php?p=editGoal&id=".$_POST['id']."&r=".$response);
           
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
              
            Heading:   <input type="text" value="<?php echo $goal->__getHeading();?>" name="heading"/><br />
            Description: <input type ="text" value="<?php echo $goal->__getDesc();?>" name ="desc" /> <br />
            Due Date: <input type="text" value="<?php echo $goal->__getDueDate();?>" name="dueDate"/><br />
            
            <?php   if($goal->__getOnDashboard()==="1")
                    {?>
                        On Dashboard: <input  type="checkbox" name="onDashboard" checked="checked"/><br /><?php 
            
                    }else 
                    {?>
                    
                        On Dashboard: <input  type="checkbox" name="onDashboard"/><br /><?php 
                    
                    }?>
            
            <input type="hidden" name="id" value="<?php echo $goal->__getId(); ?>" />
            <a href="index.php?p=goalsView">Cancel</a>
            <input type="submit" name ="save" value="Save" />
           
           
          
        </form>
      
              
     
    </body>
</html>

