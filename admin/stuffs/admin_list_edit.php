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
        if (isset($_GET['stuff_id'])) {
            $id_stuff = $_GET['stuff_id'];
            echo $id_stuff;
        $statement = "SELECT * FROM stuffs WHERE stuff_id='$id_stuff'";
        $result = $connection->query($statement);

            foreach($result as $row) {
                $id = $row['stuff_id'];
                $username = $row['username'];
                $password = $row['password'];
                $phone = $row['phone'];
                $role = $row['role'];
            }

        } else {
            $id = '';
            $username = '';
            $password = '';
            $phone = '';
            $role = '';
        }        


        //update the data

        if (isset($_POST['submit'])) {
            // $id = $_POST['stuff_id'];

            if($_POST['username'] != NULL){
                $username = $_POST['username'];
            }

            if($_POST['password'] != NULL){
                $password = $_POST['password'];
            }

            if($_POST['phone'] != NULL){
                $phone = $_POST['phone'];
            }

            if($_POST['role'] != NULL){
                $role = $_POST['role'];
            }

            $statement = ("UPDATE stuffs SET username='$username', password='$password',
            phone='$phone', role='$role'
            WHERE stuff_id='$id'");

            $connection->exec($statement); 

        }

        if (isset($_POST['cancel'])){
            header('Location:admin_list.php');
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
                <li><a href="../orders/orders_list.php">ORDER</a></li>
                <li><a href="../checkout/checkout_list.php">CHECKOUT</a></li>
                <li><a href="admin_list.php">ADMIN LIST</a></li>
            </ul>
        </div>

        <h1 style="margin:3rem">STUFF LIST EDIT</h1>
        
        <div class="container-box">
            <h3>Edit Stuff List</h3>
            <form method="post" action="">
                <!-- Material input -->
                <div class="md-form">
                    <input type="text" id="form1" name="username" class="form-control">
                    <label for="form1"><?php echo $username ?></label>
                </div>

                <div class="md-form">
                    <input type="text" id="form1" name="password" class="form-control">
                    <label for="form1"><?php echo $password ?></label>
                </div>

                <div class="md-form">
                    <input type="text" id="form1" name="phone" class="form-control">
                    <label for="form1"><?php echo $phone ?></label>
                </div>

                <div class="md-form">
                    <input type="text" id="form1" name="role" class="form-control">
                    <label for="form1"><?php echo $role ?></label>
                </div>

                <div class="buttons">
                    <button name="submit" class="btn btn-1 btn-1a">Submit</button>
                    <button name="cancel" class="btn btn-1 btn-1a">Cancel</button>
                </div>
            </form>  
        </div>
</body>
</html>