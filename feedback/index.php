<?php 
    session_start();
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
        
        $feedback = $date = '';

        if(isset($_POST['submit'])){
            $feedback = $_POST['feedback'];
            $date = $_POST['date'];

            $statement = ("INSERT INTO customer_feedbacks(feedback,fdate)VALUES('$feedback','$date')");
            $connection->exec($statement);
        }


?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="https://fonts.googleapis.com/css2?family=Raleway:wght@400&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
    <script src="https://kit.fontawesome.com/55c4673143.js" crossorigin="anonymous"></script>

	<title>Reservation</title>
</head>
<body>
    <div class="header">
        <div class="addr">
            <p> 42 Orchard St. Armadale 3143 </p>
        </div>
        <div class="social-icons">
            <a><i class="fa-brands fa-twitter" style="color: #ededed;"></i></a>
            <a><i class="fa-brands fa-facebook-f" style="color: #ededed;"></i></a>
            <a><i class="fa-brands fa-instagram" style="color: #ededed;"></i></a>
        </div>
        <div class="open-time">
            <p>Open Daily: 7am - 4pm</p>
        </div>
    </div>

        
<!-- nav -->
    <div class="nav">
        <ul>
            <li>
                <a href="../home/index.php#home">ABOUT</a>
            </li>
            
            <li>
                <a href="../home/index.php#menu">MENU</a>
            </li>

            <li>
                <a href="../home/index.php#special">SPECIAL</a>
            </li>

            <li>
                <a href="/gallery/index.html">GALLERY</a>
            </li>

            <li style="border-right: 1px solid;">
                <a href="../home/index.php#contact" style="margin-right: 1rem;">CONTACT</a>
            </li>

            <li>
                <a href="../reservation/index.php">RESERVAITON</a>
            </li>

            <li>
              <a href="../feedback/index.php">FEEDBACK</a>
            </li>
        </ul>
    </div>
<div class="mainbody">
    <div class="h1">
        <h1>Suggestion box</h1>
    </div>
    <!-- feedback form -->
       <form method="post" action="">
          <div class="feedbacks-form div">

            <div class="feedback-inputs">
                <div class="date">
                  <input type="date" name="date" required>
                </div>
                <div class="text">
                  <textarea rows="15" cols="60" name="feedback" required placeholder="Please write your suggestions here..."></textarea>
                </div>

                <div class="submit-button">
                  <button name='submit'>SUBMIT</button>
                </div>

            </div>

          </div>
       </form>
</div>
<!-- footer -->
    <div class="footer">

        <div class="section-1">
            <h3>stamford Cafe</h3>
            <!-- <p style="font-size: 1.5rem;">STAMFORD FOOD .CO</p> -->
            <p>42 Orchard St. Armadale 3143</p>
            <p>Open Daily: 7am - 4pm</p>
        </div>

        <div class="section-2">
            <h3>FOLLOW US</h3>
            <div class="social-icons">
                <a><i class="fa-brands fa-twitter" style="color: #ededed;"></i></a>
                <a><i class="fa-brands fa-facebook-f" style="color: #ededed;"></i></a>
                <a><i class="fa-brands fa-instagram" style="color: #ededed;"></i></a>
            </div>
        </div>

    </div>
</body>
</html>