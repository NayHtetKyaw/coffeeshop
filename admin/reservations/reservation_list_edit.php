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

        //query admins
        if (isset($_GET['reservations_id'])) {
            $id_reservation = $_GET['reservations_id'];

        $statement = "SELECT * FROM reservations WHERE reservations_id='$id_reservation'";
        $result = $connection->query($statement);

            foreach($result as $row) {
                $id = $row['reservations_id'];
                $date = $row['reservation_date'];
                $phone = $row['customer_phone'];
                $name = $row['customer_name'];
                $guest = $row['number_of_guests'];
                $email = $row['customer_email'];
                $package = $row['package_name'];
                $room = $row['room_id'];
            }

        } else {
            $id = '';
            $date = '';
            $phone = '';
            $name = '';
            $guest = '';
            $email = '';
            $package = '';
            $room = '';
        }        


        //update the data

        if (isset($_POST['submit'])) {
            // $id = $_POST['stuff_id'];

            if($_POST['reservation_date'] != NULL){
                $date = $_POST['reservation_date'];
            }

            if($_POST['customer_phone'] != NULL){
                $phone = $_POST['customer_phone'];
            }

            if($_POST['customer_name'] != NULL){
                $name = $_POST['customer_name'];
            }

            if($_POST['number_of_guests'] != NULL){
                $guest = $_POST['number_of_guests'];
            }

            if($_POST['customer_email'] != NULL){
                $email = $_POST['customer_email'];
            }

            if($_POST['package_name'] != NULL){
                $package = $_POST['package_name'];
            }

            if($_POST['room_id'] != NULL){
                $room = $_POST['room_id'];
            }

            $statement = ("UPDATE reservations SET reservation_date='$date', customer_phone='$phone', 
            customer_name='$name', number_of_guests='$guest', customer_email='$email', package_name='$package',
            room_id='$room' WHERE reservations_id='$id'");

            echo "<script>alert('The Update Completed');</script>";
            $connection->exec($statement); 
           

        }

        if (isset($_POST['cancel'])){
            header('Location:reservation_list.php');
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

        <h1 style="margin:3rem">Reservation List</h1>
        
        <div class="container-box">
            <h3>Edit Reservation List</h3>
            <form method="post" action="">
                <!-- Material input -->
                <div class="md-form">
                    <input type="date" id="form1" name="reservation_date" class="form-control">
                    <label for="form1"><?php echo $date ?></label>
                </div>

                <div class="md-form">
                    <input type="text" id="form1" name="customer_phone" class="form-control">
                    <label for="form1"><?php echo $phone ?></label>
                </div>

                <div class="md-form">
                    <input type="text" id="form1" name="customer_name" class="form-control">
                    <label for="form1"><?php echo $name ?></label>
                </div>

                <div class="md-form">
                    <input type="text" id="form1" name="number_of_guests" class="form-control">
                    <label for="form1"><?php echo $guest ?></label>
                </div>

                <div class="md-form">
                    <input type="text" id="form1" name="customer_email" class="form-control">
                    <label for="form1"><?php echo $email ?></label>
                </div>

                <div class="md-form">
                    <input type="text" id="form1" name="package_name" class="form-control">
                    <label for="form1"><?php echo $package ?></label>
                </div>

                <div class="md-form">
                    <input type="text" id="form1" name="room_id" class="form-control">
                    <label for="form1"><?php echo $room ?></label>
                </div>

                <div class="buttons">
                    <button name="submit" class="btn btn-1 btn-1a">Submit</button>
                    <button name="cancel" class="btn btn-1 btn-1a">Cancel</button>
                </div>
            </form>  
        </div>
</body>
</html>