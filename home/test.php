<?php
    // data base connection
        $dsn = 'mysql:dbname=stamfordcafe;host=localhost';
        $dbuser ='root';
        $dbPassword ='security';
    
        try{
            $connection = new PDO($dsn , $dbuser, $dbPassword); 
            echo "connection successful";
    
        }catch(PDOException $e){
            // die ('Connection failed!' . $exception ->getMessage());
            $_SESSION['messages'][] = 'Connection failed!' . $e->getMessage();
        }

        if(isset($_POST['submit'])){

            $food_id = $food_name = $price = $meal_type = $speciality =
            $food_type = $price = $image ='';

            $image = rand(10000,1000000)."-".$_FILES['img']['name'];
            $file_loc = $_FILES['img']['tmp_name'];
            $file_size = $_FILES['img']['size'];
            $file_type = $_FILES['img']['type'];
            $new_size = $file_size/1024;  
            $folder="media/";
            $new_file_name = strtolower($image);
            $final_image=str_replace(' ','-',$new_file_name);

            

            $fp = move_uploaded_file($file_loc,$folder.$final_image);
            $data = $final_image;
            echo $data; 
            echo "<br>";
            echo $fp;
            // $statement = ("INSERT INTO foods(food_id,food_name,meal_type,speciality,food_type,price,img)
            //                 VALUES('1','Bagel','Breakfast','Normal','Bread','110','$final_image')");
           $statement = "UPDATE drinks SET img = '$final_image' WHERE drink_id = 9";
                            $connection->exec($statement);
        }

?>

<form enctype="multipart/form-data" method="post" action="">
        <input type="file" name="img" required>
        <button name="submit">submit</button>
</form>


