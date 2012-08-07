<!DOCTYPE html>
<?php

error_reporting(E_ALL);

ini_set("display_errors", "On");
echo '<BR>';

include_once 'menu.html';
include_once 'controller/indexController.php';


  
?>

<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>DASHBOARD</title>
        <script type="text/javascript" src="js/jQuery.js"></script> 
    </head>
    <body>       
       
       <?php 

       
       $controller = new indexController();
       $controller->processRequest($_GET);
       
       ?>
        
   
       
    </body>
</html>
