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
               $table_id = $_POST['table_id'];
               $food = $_POST['food'];
               $food_quantity = $_POST['food_quantity'];
               $drink = $_POST['drink'];
               $drink_quantity = $_POST['drink_quantity'];
               $notes = $_POST['notes'];

            echo $name;
            $statement = ("INSERT INTO orders (table_id,food,food_quantity,drink,drink_quantity,notes)
                VALUES('$table_id','$food','$food_quantity','$drink','$drink_quantity','$notes')");
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
                <li><a href="../reservations/reservation_list.php">RESERVATIONS</a></li>
                <li><a href="orders_list.php">ORDER</a></li>
                <li><a href="../checkout/checkout_list.php">CHECKOUT</a></li>
                <li><a href="../stuffs/admin_list.php">ADMIN LIST</a></li>
            </ul>
        </div>

        <h1 style="margin:1rem">Insert Order List</h1>
        
        <div class="container-box">
            <h3>Insert New Orders</h3>
            <form method="post" action="">
                <!-- Material input -->
                <div class="md-form">
                    <input type="text" id="form1" name="table_id" class="form-control">
                    <label for="form1">Table ID</label>
                </div>

                <div class="md-form">
                    <input type="text" id="form1" name="food" class="form-control">
                    <label for="form1">Food Name</label>
                </div>

                <div class="md-form">
                    <input type="number" id="form1" name="food_quantity" class="form-control">
                    <label for="form1">Food Quantity</label>
                </div>

                <div class="md-form">
                    <input type="text" id="form1" name="drink" class="form-control">
                    <label for="form1">Drink</label>
                </div>

                <div class="md-form">
                    <input type="number" id="form1" name="drink_quantity" class="form-control">
                    <label for="form1">Drink Quantity</label>
                </div>

                <div class="md-form">
                    <input type="text" id="form1" name="notes" class="form-control">
                    <label for="form1">Notes</label>
                </div>

                <div class="buttons">
                    <button name="submit" class="btn btn-1 btn-1a">Submit</button>
                    <button name="cancel" class="btn btn-1 btn-1a">Cancel</button>
                </div>
            </form>  
        </div>
</body>
</html>