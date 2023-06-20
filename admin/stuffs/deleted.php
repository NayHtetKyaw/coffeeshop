<?php 
    // data base connection
    $dsn = 'mysql:dbname=stamfordcafe;host=localhost';
    $dbuser ='root';
    $dbPassword ='security';

    try {
        $connection = new PDO($dsn , $dbuser, $dbPassword); 
        // echo "connection successful";

    } catch(PDOException $e) {
        // die ('Connection failed!' . $exception ->getMessage());
        $_SESSION['messages'][] = 'Connection failed!' . $e->getMessage();
    }


    if (isset($_GET['stuff_id'])) {
        $id = $_GET['stuff_id'];
        $delete = ("DELETE FROM stuffs WHERE stuff_id = '$id' ");
        $connection->exec($delete);
        header('Location:admin_list.php');
     }
   
?>