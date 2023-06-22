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
            header('Location:orders_list.php');
        }

        if (isset($_POST['submit'])) {
               $id = $_POST['order_id'];
               $date = $row['checkout_date'];
               $status = $row['status'];
               $final_price = $row['final_price'];

            echo $name;
            $statement = ("INSERT INTO checkout (order_id,checkout_date,status,final_price)
                VALUES('$id','$date','$status','$final_price')");
            $connection->exec($statement);
        }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout List</title>

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
                <li><a href="checkout_list.php">CHECKOUT</a></li>
                <li><a href="../stuffs/admin_list.php">ADMIN LIST</a></li>
                <li><a href="../stuffs/logs.php">LOGS</a></li>
            </ul>
        </div>

        <h1 style="margin:1rem">Create New Checkout</h1>
        
        <div class="container-box">
            <h3>Insert New Checkout</h3>
            <form method="post" action="">
                <!-- Material input -->
                <div class="md-form">
                    <input type="text" id="form1" name="order_id" class="form-control">
                    <label for="form1">Order ID</label>
                </div>

                <div class="md-form">
                    <input type="date" id="form1" name="checkout_date" class="form-control">
                    <label for="form1">Checkout Date</label>
                </div>

                <div class="md-form">
                    <input type="text" id="form1" name="status" class="form-control">
                    <label for="form1">Status</label>
                </div>

                <div class="md-form">
                    <input type="text" id="form1" name="final_price" class="form-control">
                    <label for="form1">Final Price</label>
                </div>

                <div class="buttons">
                    <button name="submit" class="btn btn-1 btn-1a">Submit</button>
                    <button name="cancel" class="btn btn-1 btn-1a">Cancel</button>
                </div>
            </form>  
        </div>
</body>
</html>