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

    if (isset($_GET['order_id'])) {
        $id = $_GET['order_id'];
        $delete = ("DELETE FROM checkout WHERE order_id = '$id' ");
        $connection->exec($delete);
        header('Location:orders_list.php');
     }
   
?>