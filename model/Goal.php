<?php

/**
 * Description of Goal
 *
 * @author heilyh
 */
class Goal {
    
    private $id,
            $heading, 
            $dueDate,
            $desc,
            $onDashboard;
    
    public function __construct($id, $heading, $dueDate, $desc, $onDashboard) {
        
        $this->__setId($id);
        $this->__setHeading($heading);
        $this->__setDueDate($dueDate);
        $this->__setdesc($desc);
        $this->__setOnDashboard($onDashboard);
       
      
    }
   
    public function __setId($id) {
         
        $this->id = $id;
    }
    
    public function __getId() {
        return $this->id;
    }
    
    public function __setHeading($heading) {
         
        $this->heading = $heading;
    }
    
    public function __getHeading() {
        return $this->heading;
    }
    
    public function __setDueDate($dueDate) {
        
        $this->dueDate = $dueDate;
    }
    
    public function __getDueDate() {
       
        return $this->dueDate;
    }
     public function __setDesc($desc) {
        
        $this->desc = $desc;
    }
    
    public function __getDesc() {
       
        return $this->desc;
    }
  
    public function __setOnDashboard($onDashboard){
      $this->onDashboard = $onDashboard;  
    }
    
    public function __getOnDashboard() {
        return $this->onDashboard;
    }
}

?>
