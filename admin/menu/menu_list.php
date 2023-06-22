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

        $menu_statement = ("SELECT food, foods.food_name, foods.fprice,foods.meal_type, foods.speciality, drink, drinks.drink_name, drinks.dprice, drinks.drink_type, drinks.speciality
        FROM stamfordcafe.menu 
        INNER JOIN foods ON food = foods.food_id
        INNER JOIN drinks ON drink = drinks.drink_id");

        $menu = $connection->query($menu_statement);
       
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MENU LIST</title>

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
                <li><a href="menu_list.php">MENU</a></li>
                <li><a href="../reservations/reservation_list.php">RESERVATIONS</a></li>
                <li><a href="../orders/orders_list.php">ORDER</a></li>
                <li><a href="../checkout/checkout_list.php">CHECKOUT</a></li>
                <li><a href="../stuffs/admin_list.php">ADMIN LIST</a></li>
            </ul>
        </div>

        <h1 style="margin:3rem">MENU LIST</h1>

        
        <div class="stuff-list">
            <form method="GET" action="">
                <div class="button">
                        <a href="menu_insert.php" class="btn btn-white btn-animate">
                            ADD
                            <i class="fa-solid fa-plus fa-l"></i>
                        </a>
                </div>
            <table class="content-table">
                <thead>
                    <tr>
                        <th>Food ID</th>
                        <th>Food Name</th>
                        <th>Price</th>
                        <th>Type</th>
                        <th>Speciality</th>
                        <th style="border-left: 1px solid;">Edit</th>
                        <th style="border-left: 1px solid; border-right: 1px solid #fff;">Delete</th>
                        <th>Drink ID</th>
                        <th>Drink Name</th>
                        <th>Price</th>
                        <th>Type</th>
                        <th>Speciality</th>
                        <th style="border-left: 1px solid; border-right: 1px solid #fff;">Edit</th>
                        <th style="border-left: 1px solid; ">Delete</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($menu as $row)  {  $idf = $row['food']; $idd = $row['drink']?>
                       
                        <tr>
                            <td><?php echo $row['food'] ?></td>
                            <td><?php echo $row['food_name'] ?></td>
                            <td><?php echo $row['fprice'] ?></td>
                            <td><?php echo $row['meal_type'] ?></td>
                            <td style="border-right: 1px solid;"><?php echo $row['speciality'] ?></td>
                            <td style="border-right: 1px solid;"><a href='menu_list_edit.php?food=<?php echo $idf ?>'><i class="fa-solid fa-pen-to-square"></i></a></td>
                            <td style="border-right: 1px solid;"><a href="deleted.php?food=<?php echo $idf ?>"><i class="fa-sharp fa-solid fa-trash" style="margin-left:12px;"></i></a></td>
                            <td><?php echo $row['drink'] ?></td>
                            <td><?php echo $row['drink_name'] ?></td>
                            <td><?php echo $row['dprice'] ?></td>
                            <td><?php echo $row['drink_type'] ?></td>
                            <td><?php echo $row['speciality'] ?></td>
                            <td style="border-right: 1px solid; border-left: 1px solid;"><a href='menu_list_edit.php?drink=<?php echo $idd ?>'><i class="fa-solid fa-pen-to-square"></i></a></td>
                            <td><a href="deleted.php?drink=<?php echo $idd ?>"><i class="fa-sharp fa-solid fa-trash" style="margin-left:12px;"></i></a></td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
            </form>
        </div>
        
    </body>
</html>