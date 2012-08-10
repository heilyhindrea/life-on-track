<!DOCTYPE html>
<?php 

include_once 'C:\Program Files\BitNami WAMPStack\apache2\htdocs\testGoals\controller\goalsController.php';
include_once 'C:\Program Files\BitNami WAMPStack\apache2\htdocs\testGoals\config\LogFile.php';

$controller = new goalsController();

if(isset($_GET['d'])&&$_GET['d']==='true'){
    
    $response = $controller->deleteGoal($_GET['id']);
    if($response){
        echo 'Õnnelikult kustutatud!<br />';
    }
    else{
        echo 'Kustutamine ei õnnestunud';
    }
}
?>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>VIEW GOALS</title>
    </head>
    <body>     
        
    <a href="index.php?p=createGoal">Create new goal</a>    
    
    <?php 
    
   
    $goals = $controller->getAllGoals();
    
     
       foreach ($goals as $goal) { 
           
           
          echo '<h3>'.$goal->__getHeading().'</h3><a href="index.php?p=editGoal&id='.$goal->__getId().'">Edit</a>';
          echo '   <a href="index.php?p=goalsView&d=true&id='.$goal->__getId().'">Delete</a> <br />';
            
          
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