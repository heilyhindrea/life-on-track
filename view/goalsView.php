<!DOCTYPE html>
<?php 

include_once 'C:\Program Files\BitNami WAMPStack\apache2\htdocs\testGoals\controller\goalsController.php';
include_once 'C:\Program Files\BitNami WAMPStack\apache2\htdocs\testGoals\config\LogFile.php';

?>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>VIEW GOALS</title>
    </head>
    <body>     
        
    <a href="index.php?p=createGoal">Create new goal</a>    
    
    <?php 
    
    $controller = new goalsController();
    $goals = $controller->getAllGoals();
    
     
       foreach ($goals as $goal) { 
           
           
          echo '<h3>'.$goal->__getHeading().'</h3><a href="index.php?p=editGoal&id='.$goal->__getId().'">Edit</a> <br />';
            
          
            echo '<ul>';
                echo '<li>Heading: '.$goal->__getHeading().'</li>';
                echo '<li>Description: '.$goal->__getDesc().'</li>';
                echo '<li>Due date: '.$goal->__getDueDate().'</li>';
                echo '<li>On dashboard: '.$goal->__getOnDashboard().'</li>';
            echo '</ul>';
            
          
       
       }
       
    
    ?>
    
   
    </body>
</html>