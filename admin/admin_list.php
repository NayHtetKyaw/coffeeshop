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

        $statement = "SELECT * FROM stuffs";
        $result = $connection->query($statement);

        if (isset($_GET['stuff_id'])) {
            $id = $_GET['stuff_id'];
            $delete = ("DELETE FROM stuffs WHERE stuff_id = '$id' ");
            $connection->exec($delete);
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
                <li><a href="index.php">DASHBOARD</a></li>
                <li><a href="menu.php">MENU</a></li>
                <li><a href="reservation.php">RESERVATIONS</a></li>
                <li><a href="order.php">ORDER</a></li>
                <li><a href="checkout.php">CHECKOUT</a></li>
                <li><a href="#">ADMIN LIST</a></li>
            </ul>
        </div>

        <h1 style="margin:3rem">STUFF LIST</h1>

        
        <div class="stuff-list">
            <form method="GET" action="">
                <div class="button">
                        <a href="admin_insert.php" class="btn btn-white btn-animate">
                            ADD
                            <i class="fa-solid fa-plus fa-l"></i>
                        </a>
                </div>
            <table class="content-table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Username</th>
                        <th>Password</th>
                        <th>Phone</th>
                        <th>Role</th>
                        <th style="border-left: 1px solid;">Edit</th>
                        <th style="border-left: 1px solid;">Delete</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($result as $row) {  $id = $row['stuff_id'];?>
                       
                        <tr>
                            <td><?php echo $row['stuff_id'] ?></td>
                            <td><?php echo $row['username'] ?></td>
                            <td><?php echo $row['password'] ?></td>
                            <td><?php echo $row['phone'] ?></td>
                            <td><?php echo $row['role'] ?></td>
                            <td><a href='admin_list_edit.php?stuff_id=<?php echo $id ?>'><i class="fa-solid fa-pen-to-square"></i></a></td>
                            <td><a href="deleted.php?stuff_id=<?php echo $id ?>"><i class="fa-sharp fa-solid fa-trash" style="margin-left:12px;"></i></a></td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
            </form>
        </div>
        
    </body>
</html>