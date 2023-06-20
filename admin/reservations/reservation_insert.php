<?php error_reporting(E_ERROR | E_PARSE);
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

        //insert the data

        if (isset($_POST['cancel'])){
            header('Location:reservation_list.php');
        }

        if (isset($_POST['submit'])) {
            $id = $_POST['reservations_id'];
            $date = $_POST['date'];
            $phone = $_POST['customer_phone'];
            $name = $_POST['customer_name'];
            $guest = $_POST['number_of_guests'];
            $email = $_POST['customer_email'];
            $package = $_POST['package_name'];
            $room = $_POST['room_id'];

            echo $name;
            $statement = ("INSERT INTO reservations (reservation_date,customer_phone,customer_name,number_of_guests,customer_email,package_name,room_id)
                VALUES('$date','$phone','$name','$guest','$email','$package','$room')");
            $connection->exec($statement);
        }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin List</title>

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
                <li><a href="reservation_list.php">RESERVATIONS</a></li>
                <li><a href="../orders/orders_list.php">ORDER</a></li>
                <li><a href="../checkout/checkout_list.php">CHECKOUT</a></li>
                <li><a href="../stuffs/admin_list.php">ADMIN LIST</a></li>
            </ul>
        </div>

        <h1 style="margin:1rem">RESERVATION LIST</h1>
        
        <div class="container-box">
            <h3>Insert New Rervation</h3>
            <form method="post" action="">
                <!-- Material input -->
                <div class="md-form">
                    <input type="date" id="form1" name="date" class="form-control">
                    <label for="form1">Reservation Date</label>
                </div>

                <div class="md-form">
                    <input type="text" id="form1" name="customer_phone" class="form-control">
                    <label for="form1">Phone Number</label>
                </div>

                <div class="md-form">
                    <input type="text" id="form1" name="customer_name" class="form-control">
                    <label for="form1">Name</label>
                </div>

                <div class="md-form">
                    <input type="text" id="form1" name="number_of_guests" class="form-control">
                    <label for="form1">Person</label>
                </div>

                <div class="md-form">
                    <input type="text" id="form1" name="customer_email" class="form-control">
                    <label for="form1">Email</label>
                </div>

                <div class="md-form">
                    <input type="text" id="form1" name="package_name" class="form-control">
                    <label for="form1">Package</label>
                </div>

                <div class="md-form">
                    <input type="text" id="form1" name="room_id" class="form-control">
                    <label for="form1">Room</label>
                </div>

                <div class="buttons">
                    <button name="submit" class="btn btn-1 btn-1a">Submit</button>
                    <button name="cancel" class="btn btn-1 btn-1a">Cancel</button>
                </div>
            </form>  
        </div>
</body>
</html>