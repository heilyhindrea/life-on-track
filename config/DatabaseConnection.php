 <?php 
 class DatabaseConnection {
 var $host = "localhost";
 var $username="root";
 var $password="s0mersby";
 var $database="life";
 
 function getConnectionMySql(){

     //true et iga päärdumisega antaks uus lingi id ja ei kasutataks vana!
 $link = mysql_connect($this->host,$this->username , $this->password, true) or die(mysql_error());

  
 if (!$link) {
    die('Could not connect: ' . mysql_error());
    
    return null;
}

 @mysql_select_db($this->database) or die(mysql_error()); 
 
 return $link;
 } 
 
 function getConnectionMySqlImproved(){
   
     $mysqli = new mysqli($this->host,$this->username , $this->password, $this->database);
     
     if ($mysqli->connect_errno) {
     echo "Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
}
     
 }
 
 }
 ?> 
