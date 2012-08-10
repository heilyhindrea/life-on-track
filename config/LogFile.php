<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of writeToFile
 *
 * @author Heily
 */
class LogFile {
    
   var $myFile, $fh; 
   
   public function __construct() {
       
            $this->myFile = "log.txt";
            
   }
    
   
   

   public function write($msg){
       
           
            file_put_contents($this->myFile, $msg."\n", FILE_APPEND);
           

            

    }
    
}

?>
