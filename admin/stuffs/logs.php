<?php 
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


    //queries

    $order_statement = ("SELECT * FROM order_update_log");
    $checkout_statement = ("SELECT * FROM after_checkout_update_log");

    $order = $connection->query($order_statement);
    $checkout = $connection->query($checkout_statement);   

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel</title>


    <!-- links -->
    <link rel="stylesheet" href="./stuffs/nav.css">
    <link rel="stylesheet" href="./stuffs/tables.css">
    <link rel="stylesheet" href="./stuffs/style.css">


    <script src="admin_list.js"></script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.2/css/all.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap">
    <link rel="stylesheet" href="node_modules/mdbootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="node_modules/mdbootstrap/css/mdb.min.css">
    <link rel="stylesheet" href="node_modules/mdbootstrap/css/style.css">
    <link rel="stylesheet" href="nav.css">
    <link rel="stylesheet" href="tables.css">
    <link rel="stylesheet" href="style.css">

    <script type="text/javascript" src="node_modules/mdbootstrap/js/jquery.min.js"></script>
    <script type="text/javascript" src="node_modules/mdbootstrap/js/popper.min.js"></script>
    <script type="text/javascript" src="node_modules/mdbootstrap/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="node_modules/mdbootstrap/js/mdb.min.js"></script>
    <script src="https://kit.fontawesome.com/55c4673143.js" crossorigin="anonymous"></script>

</head>
<body>
    <div class="nav">
        <ul class="menu-bar">
            <li><a href="../index.php">DASHBOARD</a></li>
            <li><a href="../menu/menu_list.php">MENU</a></li>
            <li><a href="../reservations/reservation_list.php">RESERVATIONS</a></li>
            <li><a href="../orders/orders_list.php">ORDER</a></li>
            <li><a href="../checkout/checkout_list.php">CHECKOUT</a></li>
            <li><a href="../checkout/checkout_list.php">ADMIN LIST</a></li>
            <li><a href="logs.php">LOGS</a></li>
        </ul>
    </div>

    <h1>Admin Panel</h1>

    <div class="main-body">

        
        <div class="order">
            <h2 style="border-bottom: none;">Order Updates</h2>

            <table class="content-table">

            <?php ?>

                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Old Food</th>
                        <th>New Food</th>
                        <th>Old Food Quantity</th>
                        <th>New Food Quantity</th>
                        <th>Old Drink</th>
                        <th>New Drink</th>
                        <th>Old Drink Quantity</th>
                        <th>New Drink Quantity</th>
                        <th>Old Notes</th>
                        <th>New Notes</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($order as $row) {?>
                        <tr>
                            <td><?php echo $row['order_id'] ?></td>
                            <td><?php echo $row['old_food'] ?></td>
                            <td><?php echo $row['new_food'] ?></td>
                            <td><?php echo $row['old_food_quantity'] ?></td>
                            <td><?php echo $row['new_food_quantity'] ?></td>
                            <td><?php echo $row['old_drink'] ?></td>
                            <td><?php echo $row['new_drink'] ?></td>
                            <td><?php echo $row['old_drink_quantity'] ?></td>
                            <td><?php echo $row['new_drink_quantity'] ?></td>
                            <td><?php echo $row['old_note'] ?></td>
                            <td><?php echo $row['new_note'] ?></td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>

        </div>

        
        <div class="reservation">
            <h2 style="border-bottom: none;">Checkout Updates</h2>

            <table class="content-table" >
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Old Final Price</th>
                        <th>New Final Price</th>
                        <th>Old Checkout Date</th>
                        <th>New Checkout Date</th>
                    </tr>
                </thead>
                
                <tbody>
                <?php foreach ($checkout as $row) {?>
                    <tr>
                        <td><?php echo $row['order_id'] ?></td>
                        <td><?php echo $row['final_price_old'] ?></td>
                        <td><?php echo $row['final_price_new'] ?></td>
                        <td><?php echo $row['checkout_date_old'] ?></td>
                        <td><?php echo $row['checkout_date_new'] ?></td>
                    </tr>
                <?php } ?>
                </tbody>
               
            </table>

        </div>

    </div>

    <script>
        $(document).ready(function () {
            $('#dtDynamicVerticalScrollExample').DataTable({
                "scrollY": "50vh",
                "scrollCollapse": true,
            });
            $('.dataTables_length').addClass('bs-select');
        });
    </script>
</body>
</html>