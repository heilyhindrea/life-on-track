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
            $this->fh = fopen($this->myFile, 'w') or die("can't open file");
   }
    
   
   public function close() {
        fclose($this->fh);;
    }

   public function write($msg){
       
            fwrite($this->fh, $msg);

            

    }
    
}

?>
