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

    if (isset($_GET['food'])) {
        $id = $_GET['food'];
        echo $delete = ("DELETE FROM foods WHERE food_id = '$id' ");
        $connection->exec($delete);
        header('Location:menu_list.php');
        // echo "ok";

        $deleted = ("DELETE FROM drinks WHERE drink_id = '$id' ");
        $connection->exec($deleted);
        // header('Location:menu_list.php');
     }
   
?>