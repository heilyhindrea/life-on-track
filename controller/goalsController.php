<?php

include_once 'C:\Program Files\BitNami WAMPStack\apache2\htdocs\testGoals\dao\goalDAO.php';
include_once 'C:\Program Files\BitNami WAMPStack\apache2\htdocs\testGoals\config\LogFile.php';

class goalsController{

    
    
    public function getAllGoals() {
       
        $dao  =  new goalDAO();
        $goals = $dao->getAllGoals();
        
       $log= new LogFile();
       $log->write('UUS: goalsController: getAllGoals():');
       
        return $goals;
    }  


    public function processRequest($request){
     
      
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
     
    
      public function getGoalById($id) {
         
        $dao  =  new goalDAO();
        $goal = $dao->getGoalById($id);
        
        return $goal;
     }
     
      public function updateGoal($goal){
         
        $dao  =  new goalDAO();
        return $dao->updateGoal($goal);
        
       
         
     }
     
      public function createGoal($goal){
         $dao= new goalDAO();
         return $dao->createGoal($goal);
         
     }
     
   

    
}

?>