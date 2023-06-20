<?php error_reporting(E_ERROR | E_PARSE);
     // data base connection
        $dsn = 'mysql:dbname=stamfordcafe;host=localhost';
        $dbuser ='root';
        $dbPassword ='security';

        try{
            $connection = new PDO($dsn , $dbuser, $dbPassword); 
            // echo "connection successful";

        }catch(PDOException $e){
            // die ('Connection failed!' . $exception ->getMessage());
            $_SESSION['messages'][] = 'Connection failed!' . $e->getMessage();
        }

        $statement = "SELECT * FROM reservations";
        $result = $connection->query($statement);

        // if (isset($_GET['reservations_id'])) {
        //     $id = $_GET['reservations_id'];
        //     $delete = ("DELETE FROM reservations WHERE reservations_id = '$id' ");
        //     $connection->exec($delete);
        //  }
       
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reservation List</title>

    <script src="/admin/admin_list.js"></script>
    <link rel="stylesheet" href="nav.css">
    <link rel="stylesheet" href="tables.css">
    <link rel="stylesheet" href="style.css">

    <script src="https://kit.fontawesome.com/55c4673143.js" crossorigin="anonymous"></script>

</head>
    <body>
        <div class="nav">
            <ul class="menu-bar">
                <li><a href="../index.php">DASHBOARD</a></li>
                <li><a href="../menu/menu_list.php">MENU</a></li>
                <li><a href="reservation_list.php">RESERVATIONS</a></li>
                <li><a href="../orders/orders_list.php">ORDER</a></li>
                <li><a href="../checkout/checkout_list.php">CHECKOUT</a></li>
                <li><a href="../stuffs/admin_list.php">ADMIN LIST</a></li>
            </ul>
        </div>

        <h1 style="margin:3rem">RESERVATION LIST</h1>

        
        <div class="stuff-list">
            <form method="GET" action="">
                <div class="button">
                        <a href="reservation_insert.php" class="btn btn-white btn-animate">
                            ADD
                            <i class="fa-solid fa-plus fa-l"></i>
                        </a>
                </div>
            <table class="content-table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Date</th>
                        <th>Phone</th>
                        <th>Name</th>
                        <th>Guests</th>
                        <th>Email</th>
                        <th>Package</th>
                        <th>Room</th>
                        <th style="border-left: 1px solid;">Edit</th>
                        <th style="border-left: 1px solid;">Delete</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($result as $row) {  $id = $row['reservations_id'];?>
                       
                        <tr>
                            <td><?php echo $row['reservations_id'] ?></td>
                            <td><?php echo $row['reservation_date'] ?></td>
                            <td><?php echo $row['customer_phone'] ?></td>
                            <td><?php echo $row['customer_name'] ?></td>
                            <td><?php echo $row['number_of_guests'] ?></td>
                            <td><?php echo $row['customer_email'] ?></td>
                            <td><?php echo $row['package_name'] ?></td>
                            <td><?php echo $row['room_id'] ?></td>
                            <td><a href='reservation_list_edit.php?reservations_id=<?php echo $id ?>'><i class="fa-solid fa-pen-to-square"></i></a></td>
                            <td><a href="deleted.php?reservations_id=<?php echo $id ?>"><i class="fa-sharp fa-solid fa-trash" style="margin-left:12px;"></i></a></td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
            </form>
        </div>
        
    </body>
</html>