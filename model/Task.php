<?php

/**
 * Description of Goal
 *
 * @author heilyh
 */
class Task {

    private $id,
            $heading,
            $description,
            $goal,
            $dueDate,
            $actionDate;

    public function __construct($id, $heading, $description,$dueDate,$actionDate, $goal) {

        $this->__setId($id);
        $this->__setHeading($heading);
        $this->__setDescription($description);
        $this->__setGoal($goal);
        $this->__setDueDate($dueDate);
        $this->__setActionDate($actionDate);
        
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

    public function __setDescription($description) {

        $this->description = $description;
    }

    public function __getDescription() {

        return $this->description;
    }

    public function __setGoal($goal) {

        $this->goal = $goal;
    }

    public function __getGoal() {

        return $this->goal;
    }
    
    public function __setDueDate($dueDate){
          $this->dueDate = $dueDate;
    }
    
    public function __getDueDate(){
        return $this->dueDate;
    }


    public function __setActionDate($actionDate){
          $this->actionDate = $actionDate;
    }
     public function __getActionDate(){
        return $this->actionDate;
    }

}

?>
