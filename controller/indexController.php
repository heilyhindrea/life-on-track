<?php

include 'dao/goalDAO.php';
include 'dao/taskDAO.php';
/**
 * Description of indexController
 *
 * @author Heily
 */
class indexController {
    
    
    public function processRequest($request) {
        

     if(sizeof($request)>0){
         
       foreach ($request as $key => $value) {
          
           if(substr($key,0)==="p"){
              include 'view/'.$value.'.php';
           }
           
          
      }
           
          }
      
      }


}

?>
