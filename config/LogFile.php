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
    
   
   /*public function close() {
        fclose($this->fh);;
    }*/

   public function write($msg){
       
            /*$this->fh = fopen($this->myFile, 'w') or die("can't open file");*/
            //fwrite($this->fh, $msg);
            file_put_contents($this->myFile, $msg, FILE_APPEND);
           

            

    }
    
}

?>
