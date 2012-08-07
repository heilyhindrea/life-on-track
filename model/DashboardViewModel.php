<?php

/**
 * Description of dashboardView
 *
 * @author heilyh
 */

class Dashboard {
    
   private $errorMsgs;
   private $viewGoals;
   private $viewTasks;
   
  public function __construct() {
      $this->errorMsgs = array();
      $this->viewGoals = array();
      $this->viewTasks = array();
  }
   
  
   public function __getErrorMsgs() {
       return $this->errorMsgs;
   }
   
   public function __getViewGoals() {
       
       return $this->viewGoals;
   }
   
   public function __setViewGoals($goals){
       $this->viewGoals = $goals;
   }
   
   public function __setErrorMsgs($messages){
       $this->errorMsgs = $messages;
   }
   
   public function __setViewTasks($tasks){
    
       $this->viewTasks = $tasks;
      
       
     
   }
   
   public function __getViewTasks(){
       
       return $this->viewTasks;
         
   }
   
 /* public function addToErrorMsgs($message){
       
        array_push($this->errorMsgs,$message);
                
   }
   
  public function addToViewGoals($goal){
       array_push($this->viewGoals,$goal);
   }*/
   
}

?>
