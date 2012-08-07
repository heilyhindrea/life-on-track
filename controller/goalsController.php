<!DOCTYPE html>
<html>
    <head>
        <title></title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <!--<link href="css/nullify_default.css" rel="stylesheet" type="text/css"> -->
        
    </head>
    <body>
      
            
   

<?php
include_once 'C:\Program Files\BitNami WAMPStack\apache2\htdocs\testGoals\dao\goalDAO.php';
include_once 'C:\Program Files\BitNami WAMPStack\apache2\htdocs\testGoals\config\LogFile.php';

if(sizeof($_GET)===0){
    
    
    $goals = new GetAllGoals();
    $allGoals = $goals->getAllGoals(); 
    echo 'peale päringut';
    if(isset($allGoals)){
        echo 'jah sain midagi baasist';
    }
    else{
        echo 'null olin';
    }
  
    
}

class GetAllGoals{
    function getAllGoals() {
        
        $dao  =  new goalDAO();
        $goals = $dao->getAllGoals();
        
       
        return $goals;
    }
}
    
    function processRequest($request){
     
        //editGoal createGoal
        $editGoal = false;
        $createGoal = false;
        $newGoalValues = null;
        $newGoal =null;
        if(sizeof($request)>0){
        
            
            foreach ($request as $value) {

                switch (substr($value,0)) {
                   
                    case "editGoal":
                        
                       $editGoal=true;
                       $newGoalValues = new Goal();
                        break;
                    case "createGoal":
                        
                         
                        $createGoal=true;
                        $newGoal= new Goal();
                        break;
                    
                }


              }
              
              if($editGoal){
                 
                  $newGoalValues->__setHeading($request['heading']);
                  $newGoalValues->__setDesc($request['desc']);
                  $newGoalValues->__setDueDate($request['dueDate']);
                  $newGoalValues->__setId($request['id']);
                  
                  if($request['onDashboard']==="on"){
                      
                      $newGoalValues->__setOnDashboard("1");
                  }
                  
                  
                  $editGoal= false;
                  return $this->updateGoal($newGoalValues);
                  
                   
              }
              
              if($createGoal){
                  $newGoal->__setHeading($request['heading']);
                  $newGoal->__setDesc($request['desc']);
                  $newGoal->__setDueDate($request['dueDate']);
                  
                   if($request['onDashboard']==="on"){
                      
                      $newGoal->__setOnDashboard("1");
                  }
                  
                  $createGoal=false;
                  return $this->createGoal($newGoal);
              }
              
         
          }
      
        
    } 
     
    
      function getGoalById($id) {
         
        $dao  =  new goalDAO();
        $goal = $dao->getGoalById($id);
        
        return $goal;
     }
     
      function updateGoal($goal){
         
        $dao  =  new goalDAO();
        return $dao->updateGoal($goal);
        
       
         
     }
     
      function createGoal($goal){
         $dao= new goalDAO();
         return $dao->createGoal($goal);
         
     }
    


?>


    
    </body>
</html>