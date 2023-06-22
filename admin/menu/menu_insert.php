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

        if(isset($_POST['submitd'])) {
                // drinks
            $drink_name = $_POST['drink_name'];
            $drink_type = $_POST['drink_type'];
            $speciality_d = $_POST['speciality'];
            $dprice = $_POST['dprice']; 
             // file processing
         
             $image = rand(10000,1000000)."-".$_FILES['img']['name'];
             $file_loc = $_FILES['img']['tmp_name'];
             $file_size = $_FILES['img']['size'];
             $file_type = $_FILES['img']['type'];
             $new_size = $file_size/1024;  
             $folder="../../home/media/";
             $new_file_name = strtolower($image);
             $final_image=str_replace(' ','-',$new_file_name);
           //   $final_image_drink=str_replace(' ','-',$new_file_name);
 
             move_uploaded_file($file_loc,$folder.$final_image);
             $data = $final_image;

             
           $statement_drink = ("INSERT INTO drinks (drink_name,speciality,drink_type,dprice,img)
           VALUES('$drink_name','$speciality_d','$drink_type','$dprice','$final_image')");

           $connection->exec($statement_drink);
        }

        // food insert

        if (isset($_POST['submit'])) {
            $image = '';
            // foods
            $food_name = $_POST['food_name'];
            $meal_type = $_POST['meal_type'];
            $speciality = $_POST['speciality'];
            $food_type = $_POST['food_type'];
            $fprice = $_POST['fprice'];
            // $image = $_POST['image'];
           
            // file processing
           
            $image = rand(10000,1000000)."-".$_FILES['image']['name'];
            $file_loc = $_FILES['image']['tmp_name'];
            $file_size = $_FILES['image']['size'];
            $file_type = $_FILES['image']['type'];
            $new_size = $file_size/1024;  
            $folder="../../home/media/";
            $new_file_name = strtolower($image);
            $final_image=str_replace(' ','-',$new_file_name);

            

            $fp = move_uploaded_file($file_loc,$folder.$final_image);
    
            $statement_food = ("INSERT INTO foods (food_name,meal_type,speciality,food_type,fprice,img)
            VALUES('$food_name','$meal_type','$speciality','$food_type','$fprice','$final_image')");;
           
            $connection->exec($statement_food);
        }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menu</title>

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
                <li><a href="menu_list.php">MENU</a></li>
                <li><a href="../reservations/reservation_list.php">RESERVATIONS</a></li>
                <li><a href="../orders/orders_list.php">ORDER</a></li>
                <li><a href="../checkout/checkout_list.php">CHECKOUT</a></li>
                <li><a href="../stuffs/admin_list.php">ADMIN LIST</a></li>
            </ul>
        </div>

        <h1 style="margin:1rem">MENU LIST</h1>
        
        <div class="container-box">
            <h3>Insert New Menu</h3>
            <form method="post" action="" enctype="multipart/form-data">
                <!-- Material input -->
                <div class="container-1">
                    <h2>ADD FOOD</h2>
                    <div class="md-form">
                        <input type="text" id="form1" name="food_name" class="form-control">
                        <label for="form1">Food Name</label>
                    </div>

                    <div class="md-form">
                        <input type="text" id="form1" name="meal_type" class="form-control">
                        <label for="form1">Meal Type</label>
                    </div>

                    <div class="md-form">
                        <input type="text" id="form1" name="speciality" class="form-control">
                        <label for="form1">Speciality</label>
                    </div>

                    <div class="md-form">
                        <input type="text" id="form1" name="food_type" class="form-control">
                        <label for="form1">Food Type</label>
                    </div>

                    <div class="md-form">
                        <input type="number" id="form1" name="fprice" class="form-control">
                        <label for="form1">Price</label>
                    </div>

                    <div class="md-form">
                        <input type="file" id="form1" name="image" class="form-control">
                        <!-- <label for="form1">IMAGE</label> -->
                    </div>

                    <div class="buttons">
                        <button name="submit" class="btn btn-1 btn-1a">Submit</button>
                        <button name="cancel" class="btn btn-1 btn-1a">Cancel</button>
                    </div>
                </div>

                <div class="container-2">
                <h2>ADD Drink</h2>
                <div class="md-form">
                        <input type="text" id="form1" name="drink_name" class="form-control">
                        <label for="form1">Drink Name</label>
                    </div>

                    <div class="md-form">
                        <input type="text" id="form1" name="speciality_d" class="form-control">
                        <label for="form1">Speciality</label>
                    </div>

                    <div class="md-form">
                        <input type="text" id="form1" name="drink_type" class="form-control">
                        <label for="form1">Drink Type</label>
                    </div>

                    <div class="md-form">
                        <input type="text" id="form1" name="dprice" class="form-control">
                        <label for="form1">Price</label>
                    </div>

                    <div class="md-form">
                        <input type="file" id="form1" name="img" class="form-control">
                        <!-- <label for="form1">IMAGE</label> -->
                    </div>

                    <div class="buttons">
                        <button name="submitd" class="btn btn-1 btn-1a">Submit</button>
                        <button name="canceld" class="btn btn-1 btn-1a">Cancel</button>
                    </div>
                </div>
                </div>
             
            </form>  
        </div>
</body>
</html>