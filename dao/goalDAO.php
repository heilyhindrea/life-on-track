<?php

include_once 'config/DatabaseConnection.php';
include_once 'model/Goal.php';
include_once 'config/LogFile.php';


/**
 * Description of goalDAO
 *
 * @author heilyh
 */
class goalDAO {
     
      var $dbLink; 
      function __construct() {
          
          $dbCon = new DatabaseConnection();
          $this->dbLink = $dbCon->getConnectionMySql();
          
          
      }
      
      function __destruct() {
          
          mysql_close($this->dbLink);
      }
      
      function getAllGoals(){
          
      /* $log= new LogFile();
       $log->write('goalsDao: getAllGoals():');*/
         
        $goals = array();
      
       
        $query="SELECT * FROM goal;";
        
        $result = mysql_query($query);
        
        
            if($result){

                while ($row = mysql_fetch_assoc($result)) {
                    
                    $goal = new Goal($row["id"],$row["heading"],$row["due_date"],$row["description"], $row["on_dashboard"]);
                    array_push($goals, $goal);
                      
                    }

            }
            else {
              echo "Problem with connection in goalDAO: getallGoals";
            }
                
        
                return $goals;
      }
      
      
        function getGoalById($id){
            
           $goal = null;
           
            $query="SELECT * FROM goal WHERE id =".$id.";";
        
            $result = mysql_query($query);
            
            if($result){

                while ($row = mysql_fetch_assoc($result)) {
                    
                     $goal = new Goal($row["id"],$row["heading"],$row["due_date"],$row["description"], $row["on_dashboard"]);
                    
                      
                    }

            }
            else {
              echo "Problem with connection in goalDAO: getGoalByID";
            }
                
        
                return $goal;
            
        } 
        
        function updateGoal($goal){
            
             
            
            $query="UPDATE goal SET heading = '".$goal->__getHeading()."', description ='".$goal->__getDesc()."', due_date='".$goal->__getDueDate()."', on_dashboard='".(int)$goal->__getOnDashboard()."' WHERE id =".$goal->__getId();
            
            
            $result = mysql_query($query);
            
            if($result){
                return true;
            }
            else {
               return false;
            }
            
        }
        
        public function createGoal($goal){
            
            $query="INSERT INTO goal(heading, description,due_date,on_dashboard) VALUES ('".$goal->__getHeading()."','".$goal->__getDesc()."','".$goal->__getDueDate()."','".$goal->__getOnDashboard()."')";
            $result = mysql_query($query);
            
            if($result){
            
           return mysql_insert_id();
            }
            else {
              echo "Problem with connection in goalDAO: createGoal";
            }
        }
        
        public function deleteGoal($id){
            
            $query ="DELETE FROM goal WHERE id=".$id;
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
