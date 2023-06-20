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

    if (isset($_GET['reservations_id'])) {
        $id = $_GET['reservations_id'];
        $delete = ("DELETE FROM reservations WHERE reservations_id = '$id' ");
        $connection->exec($delete);
        header('Location:reservation_list.php');
     }
   
?>