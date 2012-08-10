<?php

include_once 'C:\Program Files\BitNami WAMPStack\apache2\htdocs\testGoals\dao\taskDao.php';
include_once 'config/LogFile.php';

class tasksController {

    public function processRequest($request){
        
        $editTask = false;
        $createTask = false;
        $newTaskValues = null;
        $newTask =null;
        
        if(sizeof($request)>0){
        
            
            foreach ($request as $value) {

                switch (substr($value,0)) {
                   
                    case "editTask":
                        
                       $editTask=true;
                       $newTaskValues = new Task();
                        break;
                    case "createTask":
                        
                         
                        $createTask=true;
                        $newTask= new Task();
                        break;
                    
                }


              }
              
               if($editTask){
                 
                  $newTaskValues->__setId($request['id']);
                  $newTaskValues->__setHeading($request['heading']);
                  $newTaskValues->__setDescription($request['description']);
                  $newTaskValues->__setDueDate($request['dueDate']);
                  $newTaskValues->__setActionDate($request['actionDate']);
                  $newTaskValues->__setGoal($request['goalsList']);
                  
                  
                  $editTask= false;
                  return $this->updateTask($newTaskValues);
                  
                   
              }
              
              if($createTask){
                  
                  $newTask->__setHeading($request['heading']);
                  $newTask->__setDescription($request['description']);
                  $newTask->__setDueDate($request['dueDate']);
                  $newTask->__setActionDate($request['actionDate']);
                  $newTask->__setGoal($request['goalsList']);
                  
                  $createTask=false;
                  return $this->createTask($newTask);
              }
        
    }
    
    }
    
    public function getTaskById($id) {

        $dao = new taskDAO();
        return $dao->getTaskById($id);
        
    }

    public function getTasksByGoal($goal_id) {
        
        $dao = new taskDAO();
        return $dao->getTasksByGoal($goal_id);
    }

    public function updateTask($newTaskValues) {
        
        $dao = new taskDAO();
        return $dao->updateTask($newTaskValues);
    }

    public function createTask($newTask) {
        
        $dao = new taskDAO();
        return $dao->createTask($newTask);
    }
    
    public function deleteTask($id){
         $dao = new taskDAO();
         return $dao->deleteTask($id);
     }

}

?>
