<?php
 // data base connection
 $dsn = 'mysql:dbname=stamfordcafe;host=localhost';
 $dbuser ='root';
 $dbPassword ='security';

 try{
     $connection = new PDO($dsn , $dbuser, $dbPassword); 
     echo "connection successful";

 }catch(PDOException $e){
     // die ('Connection failed!' . $exception ->getMessage());
     $_SESSION['messages'][] = 'Connection failed!' . $e->getMessage();
 }

        $s1 = "SELECT * FROM foods WHERE food_id = 1";
        $r = $connection->query($s1);

        foreach ($r as $row){
           echo "<img src='media/".$row['img']."'>";
            echo $row['food_name'];
        }

?>