<?php

include_once 'config/DatabaseConnection.php';
include_once 'model/Task.php';
include_once 'config/LogFile.php';
/**
 * Description of taskDAO
 *
 * @author heilyh
 */
class taskDAO {
    
     var $dbLink; 
      function __construct() {
          
          $dbCon = new DatabaseConnection();
          $this->dbLink = $dbCon->getConnectionMySql();
      }
      
      function __destruct() {
          
          mysql_close($this->dbLink);
      }
    
      
      public function getTaskById($id){
          
          $task=null;
          $query="SELECT * FROM task WHERE id = ".(int)$id.";";
          $result = mysql_query($query);
        ;
        if($result){

                while ($row = mysql_fetch_assoc($result)) {
                    
                     $task = new Task($row["id"],$row["heading"],$row["description"],$row["due_date"], $row["action_date"], $row["goal_id"]);
                     
                  
                    
                      
                    }
                
            }
            else {
              echo "Problem with connection in taskDAO: getTaskById";
            }
                return $task;
        
               
      }
      
      public function getTasksByGoal($goal_id){
        
        
        
        $tasks = array();
        
        $query="SELECT * FROM task WHERE goal_id = ".$goal_id.";";
        $result = mysql_query($query);
        
        
            if($result){


                while ($row = mysql_fetch_assoc($result)) {
                    
                  /*$log = new LogFile();
                  $log->write("taskDao: getTaskByGoal: ".$row["due_date"]);*/
                    
                    $task = new Task($row["id"],$row["heading"],$row["description"],$row["due_date"],$row["action_date"],$row["goal_id"]);
                    array_push($tasks, $task);
                      
                    }

            }
            else{
                echo "Problem with connection in taskDAO: getTasksByGoal";
            }
                
           
            
                return $tasks;
      
    }
    
    public function updateTask($newTaskValues){
        
        $query="UPDATE task SET heading = '".$newTaskValues->__getHeading()."', description ='".$newTaskValues->__getDescription()."', due_date='".$newTaskValues->__getDueDate()."', action_date='".$newTaskValues->__getActionDate()."', goal_id='".$newTaskValues->__getGoal()."' WHERE id =".$newTaskValues->__getId();
            
            
            $result = mysql_query($query);
            
            if($result){
                return true;
            }
            else {
               return false;
            }
    }
    
    public function createTask($newTask){
        
        
        
          $query="INSERT INTO task(heading, description, due_date, action_date,goal_id) VALUES ('".$newTask->__getHeading()."','".$newTask->__getDescription()."','".$newTask->__getDueDate()."','".$newTask->__getActionDate()."','".$newTask->__getGoal()."')";
          $result = mysql_query($query);
            
           /*$log=new LogFile();
           $log->write($query);*/
            
            if($result){
            
                 
           return mysql_insert_id();
            }
            else {
              echo "Problem with connection in taskDAO: createTask";
            }
        
    }
    
      public function deleteTask($id){
            
            $query ="DELETE FROM task WHERE id=".$id;
            $result = mysql_query($query);
            
            if($result){
                return true;
            }
            else {
                return false;
            }
            
        }
}

?>
