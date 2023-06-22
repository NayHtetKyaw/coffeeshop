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

    $reservation_statement = ("SELECT * FROM reservations");

    $order_statement = ("SELECT * FROM ORDERS");

    $menu_statement = ("SELECT food, foods.food_name, foods.fprice,foods.meal_type, foods.speciality, drink, 
                        drinks.drink_name, drinks.dprice, drinks.drink_type, drinks.speciality
                        FROM stamfordcafe.menu 
                        INNER JOIN foods ON food = foods.food_id
                        INNER JOIN drinks ON drink = drinks.drink_id");

    $customer_feedback_statement = ("SELECT * FROM customer_feedbacks");

    $reservation = $connection->query($reservation_statement);
    $order = $connection->query($order_statement);
    $menu = $connection->query($menu_statement);
    $feedback = $connection->query($customer_feedback_statement);

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

</head>
<body>
    <div class="nav">
        <ul class="menu-bar">
            <li><a href="#">DASHBOARD</a></li>
            <li><a href="./menu/menu_list.php">MENU</a></li>
            <li><a href="./reservations/reservation_list.php">RESERVATIONS</a></li>
            <li><a href="./orders/orders_list.php">ORDER</a></li>
            <li><a href="./checkout/checkout_list.php">CHECKOUT</a></li>
            <li><a href="./stuffs/admin_list.php">ADMIN LIST</a></li>
            <li><a href="./stuffs/logs.php">LOGS</a></li>
        </ul>
    </div>

    <h1>Admin Panel</h1>

    <div class="main-body">

        
        <div class="order">
            <h2>Order</h2>

            <table class="content-table">

            <?php ?>

                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Table</th>
                        <th>Food</th>
                        <th>Food Quantity</th>
                        <th>Drink</th>
                        <th>Drink Quantity</th>
                        <th>Notes</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($order as $row) {?>
                        <tr>
                            <td><?php echo $row['order_id'] ?></td>
                            <td><?php echo $row['table_id'] ?></td>
                            <td><?php echo $row['food'] ?></td>
                            <td><?php echo $row['food_quantity'] ?></td>
                            <td><?php echo $row['drink'] ?></td>
                            <td><?php echo $row['drink_quantity'] ?></td>
                            <td><?php echo $row['notes'] ?></td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>

        </div>

        
        <div class="reservation">
            <h2>Reservation</h2>

            <table class="content-table" >
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
                    </tr>
                </thead>
                
                <tbody>
                <?php foreach ($reservation as $row) {?>
                    <tr>
                        <td><?php echo $row['reservations_id'] ?></td>
                        <td><?php echo $row['reservation_date'] ?></td>
                        <td><?php echo $row['customer_phone'] ?></td>
                        <td><?php echo $row['customer_name'] ?></td>
                        <td><?php echo $row['number_of_guests'] ?></td>
                        <td><?php echo $row['customer_email'] ?></td>
                        <td><?php echo $row['package_name'] ?></td>
                        <td><?php echo $row['room_id'] ?></td>
                    </tr>
                <?php } ?>
                </tbody>
               
            </table>

        </div>

        <div class="menu">
            <h2>Menu</h2>

            <table class="content-table" >
                <thead>
                    <tr >
                        <th>Food ID</th>
                        <th>Food Name</th>
                        <th>Price</th>
                        <th>Type</th>
                        <th>Speciality</th>
                        <th>Drink ID</th>
                        <th>Drink Name</th>
                        <th>Price</th>
                        <th>Type</th>
                        <th>Speciality</th>
                        
                    </tr>
                </thead>
                
                <tbody class="tmenu">
                <?php foreach ($menu as $row) {?>
                    <tr>
                        <td><?php echo $row['food'] ?></td>
                        <td><?php echo $row['food_name'] ?></td>
                        <td><?php echo $row['fprice'] ?></td>
                        <td><?php echo $row['meal_type'] ?></td>
                        <td><?php echo $row['speciality'] ?></td>
                        <td><?php echo $row['drink'] ?></td>
                        <td><?php echo $row['drink_name'] ?></td>
                        <td><?php echo $row['dprice'] ?></td>
                        <td><?php echo $row['drink_type'] ?></td>
                        <td><?php echo $row['speciality'] ?></td>
                    
                    </tr>
                <?php } ?>
                </tbody>
               
            </table>
        </div>

        <div class="feedback">
            <h2>Feedbacks</h2>

            <table class="content-table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Feedback</th>
                        <th>Date</th>                        
                    </tr>
                </thead>
                
                <tbody>
                <?php foreach ($feedback as $row) {?>
                    <tr>
                        <td><?php echo $row['feedback_id'] ?></td>
                        <td><?php echo $row['feedback'] ?></td>
                        <td><?php echo $row['fdate'] ?></td>                    
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