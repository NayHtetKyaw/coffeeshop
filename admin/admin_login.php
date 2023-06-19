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



        if(isset($_POST['submit'])){
            $username = $_POST['username'];
            $password = $_POST['password'];

             // query condition
            $statement=$connection->prepare
            ('SELECT * FROM stuffs WHERE username=:username');

            $statement->execute([':username'=>$username]);
            $result = $statement->fetchAll(PDO::FETCH_ASSOC);
            $user = array_shift($result);

            if($user['username'] == $username && $user['password'] == $password){

                // echo "<script>alert('Welcome To Admin Panel')</script>";
                header('Location:index.php');

            }else{
                // header('Location:admin_login.php');
                echo "<script>alert('Incorrect Username or Password. Please Try Again!')</script>";
                // exit;
            }
        }
       

      
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>

    <link rel="stylesheet" href="admin_login.css">

</head>
<body id="particles-js">

    <h1>ADMIN LOGIN</h1>
    <div class="animated bounceInDown">
    <div class="container">
        <span class="error animated tada" id="msg"></span>
        <form name="login" class="box" onsubmit="return checkStuff()" method="post" action="">
        <h4>Admin<span>Dashboard</span></h4>
        <h5>Sign in to your account.</h5>
            <input type="text" name="username" placeholder="Username" autocomplete="off" required>
            <i class="typcn typcn-eye" id="eye"></i>
            <input type="password" name="password" placeholder="Passsword" id="pwd" autocomplete="off" required> 
            <label>
            <input type="checkbox">
            <span></span>
            <small class="rmb">Remember me</small>
            </label>
            <a href="#" class="forgetpass">Forget Password?</a>
            <input type="submit" name="submit" value="Sign in" class="btn1">
        </form>
            <!-- <a href="#" class="dnthave">Don’t have an account? Sign up</a> -->
    </div> 
    </div>
</body>
</html>