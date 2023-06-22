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

        //query food
        if (isset($_GET['food'])) {
            $id_food = $_GET['food'];

        $statement = "SELECT * FROM foods WHERE food_id='$id_food'";
        $result = $connection->query($statement);

            foreach($result as $row) {
                $idf = $row['food_id'];
                $food_name = $row['food_name'];
                $meal_type= $row['meal_type'];
                $specialityf = $row['speciality'];
                $food_type = $row['food_type'];
                $fprice = $row['fprice'];
                $image = $row['img'];
            }

        } else {
            $idf = '';
            $food_name = '';
            $meal_type = '';
            $speciality= '';
            $food_type = '';
            $fprice = '';
            $image = '';
        } 

        // drink query
        
        if (isset($_GET['drink'])) {
            $id_drink = $_GET['drink'];

        $statementd = "SELECT * FROM drinks WHERE drink_id='$id_drink'";
        $result = $connection->query($statementd);

            foreach($result as $row) {
                $idd = $row['drink_id'];
                $drink_name = $row['drink_name'];
                $specialityd = $row['speciality'];
                $drink_type = $row['drink_type'];
                $dprice = $row['dprice'];
                $image = $row['img'];
            }

        } else {
            $idd = '';
            $drink_name = '';
            $speciality= '';
            $drink_type = '';
            $dprice = '';
            $image = '';
        }  


        //update the data food

        if (isset($_POST['submit'])) {
            // $id = $_POST['stuff_id'];

            if($_POST['food_name'] != NULL){
                $food_name = $_POST['food_name'];
            }

            if($_POST['meal_type'] != NULL){
                $mealType = $_POST['meal_type'];
            }

            if($_POST['speciality'] != NULL){
                $specialityf = $_POST['speciality'];
            }

            if($_POST['food_type'] != NULL){
                $food_type = $_POST['food_type'];
            }

            if($_POST['fprice'] != NULL){
                $fprice = $_POST['fprice'];
            }

            if($_POST['img'] != NULL){
                $image = $_POST['img'];
            }

            $statement = ("UPDATE foods SET food_name='$food_name', meal_type='$meal_type', 
            speciality='$specialityf', food_type='$food_type', fprice='$fprice', img='$final_image'
            WHERE food_id='$id'");

            echo "<script>alert('The Update Completed');</script>";
            $connection->exec($statement); 
           
        }



         
        //update the data drink

        if (isset($_POST['submitd'])) {
            // $id = $_POST['stuff_id'];

            if($_POST['drink_name'] != NULL){
                $drink_name = $_POST['drink_name'];
            }

            if($_POST['speciality'] != NULL){
                $specialityd = $_POST['speciality'];
            }

            if($_POST['drink_type'] != NULL){
                $drink_type = $_POST['drink_type'];
            }

            if($_POST['dprice'] != NULL){
                $dprice = $_POST['dprice'];
            }

            if($_POST['img'] != NULL){
                $image = $_POST['img'];
            }

            $statement_drink = ("UPDATE drinks SET drink_name='$drink_name', meal_type='$meal_type', 
            speciality='$specialityd', drink_type='$drink_type', fprice='$dprice', img='$final_image'
            WHERE drink_id='$id'");

            echo "<script>alert('The Update Completed');</script>";
            $connection->exec($statement_drink); 
           

        }

        if (isset($_POST['cancel'])){
            header('Location:menu_list.php');
        }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menu List</title>
    <script src="admin_list.js"></script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.2/css/all.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap">
    <link rel="stylesheet" href="node_modules/mdbootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="node_modules/mdbootstrap/css/mdb.min.css">
    <link rel="stylesheet" href="node_modules/mdbootstrap/css/style.css">
    <link rel="stylesheet" href="nav.css">
    <link rel="stylesheet" href="tables.css">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="menu.css">

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

        <h1 style="margin:3rem">Menu List</h1>
        
        <div class="container-box">
            <h3>Edit Menu List</h3>
            <form method="post" action="">
                <div class="container-1">
                    <h2>Foods</h2>
                     <!-- Material input -->
                    <div class="md-form">
                        <input type="text" id="form1" name="food_name" class="form-control">
                        <label for="form1"><?php echo $food_name ?></label>
                    </div>

                    <div class="md-form">
                        <input type="text" id="form1" name="meal_type" class="form-control">
                        <label for="form1"><?php echo $meal_type ?></label>
                    </div>

                    <div class="md-form">
                        <input type="text" id="form1" name="speciality" class="form-control">
                        <label for="form1"><?php echo $specialityf?></label>
                    </div>

                    <div class="md-form">
                        <input type="text" id="form1" name="food_type" class="form-control">
                        <label for="form1"><?php echo $food_type?></label>
                    </div>

                    <div class="md-form">
                        <input type="text" id="form1" name="fprice" class="form-control">
                        <label for="form1"><?php echo $fprice?></label>
                    </div>

                    <div class="buttons">
                        <button name="submit" class="btn btn-1 btn-1a">Submit</button>
                        <button name="cancel" class="btn btn-1 btn-1a">Cancel</button>
                    </div>
                </div>

                <div class="container-2">
                <h2>Drinks</h2>
                        <!-- Material input -->
                    <div class="md-form">
                        <input type="text" id="form1" name="drink_name" class="form-control">
                        <label for="form1"><?php echo $drink_name ?></label>
                    </div>

                    <div class="md-form">
                        <input type="text" id="form1" name="speciality" class="form-control">
                        <label for="form1"><?php echo $specialityd?></label>
                    </div>

                    <div class="md-form">
                        <input type="text" id="form1" name="drink_type" class="form-control">
                        <label for="form1"><?php echo $drink_type?></label>
                    </div>

                    <div class="md-form">
                        <input type="text" id="form1" name="dprice" class="form-control">
                        <label for="form1"><?php echo $dprice?></label>
                    </div>

                    <div class="buttons">
                        <button name="submitd" class="btn btn-1 btn-1a">Submit</button>
                        <button name="cancel" class="btn btn-1 btn-1a">Cancel</button>
                    </div>
                </div>
                </div>
               
            </form>  
        </div>
</body>
</html>