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

        //view data 
        $foodid = $drinkid = '';

        // $statement = ('SELECT food_name, price From foods WHERE meal_type = "Breakfast"');
        $breakfast = ("SELECT * FROM foods WHERE meal_type ='Breakfast' AND speciality='Normal'");
        $lunch = ("SELECT * FROM foods WHERE meal_type ='Lunch' AND speciality='Normal'");
        $drink = ("SELECT * FROM drinks WHERE speciality ='Normal'");
        $special_food = ("SELECT * FROM foods WHERE speciality ='Special'");
        $special_drink = ("SELECT * FROM drinks WHERE speciality ='Special'");

        $breakfast_result = $connection->query($breakfast);
        $lunch_result = $connection->query($lunch);
        $drink_result = $connection->query($drink);
        $special_food_result = $connection->query($special_food);
        $special_drink_result = $connection->query($special_drink);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resturant</title>
    <link rel="stylesheet" href="normalize.css"/>
    <link rel="stylesheet" href="style.css"/>
    <script src="https://kit.fontawesome.com/55c4673143.js" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.3.min.js"></script>
    <script src="contact-validation.js"></script>
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

    <div class="logo">
        <header>stamford Cafe</header>
        <p>FINE COFFEE & FOOD</p>
    </div>
    
<!-- nav -->
    <div class="nav">
        <ul>
            <li>
                <a href="#about">ABOUT</a>
            </li>
            
            <li>
                <a href="#menu">MENU</a>
            </li>

            <li>
                <a href="#special">SPECIAL</a>
            </li>

            <li>
                <a href="../gallery/index.html">GALLERY</a>
            </li>


            <li style="border-right: 1px solid;">
                <a  href="#contact" style="margin-right: 1rem;">CONTACT</a>
            </li>

            <li>
                <a href="../reservation/index.php">RESERVAITON</a>
            </li>

            <li>
                <a href="../feedback/index.php">FEEDBACK</a>
            </li>
        </ul>
    </div>
<!-- main-body -->

    <div class="homepage-img">
        <img src="media/homepage-img.jpg">
    </div>

    <div class="main-body">

<!-- about us -->
        <div id="about" class="about">

            <h1>ABOUT US</h1>

<!-- texts -->
            <div class="texts">
                <p>
                    From ambitious Melbourne locals Marc Bailey and Sarah Hocking 
                    comes Padre - An adventure in meticulously crafted, locally sourced 
                    dishes coupled with artisan espresso from award-winning barista Nicholas
                    Hoppner.
                </p>
    
                <p>
                    Padre's offering is simple: uncomplicated seasonal fare presented in a
                    light-filled, contemporary space. Join the morning rush or swing by later
                    for a cheeky bite - you new local awaits.
                </p>

                <div class="quote">
                    <p class="q">
                        "INSTEAD OF TREADING THE SAME OLD SMASHED AVOCADO ROUTE, PADRE ARE FORGING
                         A BOLD NEW DIRECTION IN CAFE FARE"
                    </p>
                    
                    <p style="opacity: 0.7; font-size: 0.9rem; text-align: center;">Jon Hopkins - The Age</p>
                </div>
<!-- quotes -->
                <div class="quote">
                    <p class="q">
                        "MELBOURNE'S COMPETITIVE INNER SOUTH-EAST PROVES ITSELF YET AGAIN AS A CREATIVE 
                        HOTBED FOR THE CULINARY CURIOUS"
                    </p>
                    
                    <p style="opacity: 0.7; font-size: 0.9rem; text-align: center;">Katie Marsh - Broadsheet</p>
                </div>

                <div class="about-pics">
                    <div class="img1">
                        <img src="media/about1.jpg" />
                    </div>

                    <div class="img2">
                        <img src="media/about2.jpg" />
                    </div>
                </div>
                
            </div>
             
        </div>

<!-- menu -->
        <div class="menu" id="menu">

<!-- menu ribbon -->
            <h1>MENU</h1>

<!-- menu-nav -->
            <div class="menu-nav">
                <ul>
                    <li class='bf' onclick="myFunction()">
                        Breakfast
                    </li>
                        
                    <li>
                        Lunch
                    </li>

                    <li>
                        Drink
                    </li>
                </ul>
            </div>

<!-- menu lists -->
            <div class="menu-options">
                <div id="breakfast" class="menu-list breakfast">
                    <?php
                        foreach ($breakfast_result as $row){
                            echo "<div class='menu-item'>"; 
                            echo "<img src='media/".$row['img']."'>";
                            echo $row['food_name']."<br>"; 
                            echo "Price:฿".$row['fprice']."<br>";
                            // echo "Meal:".$row['meal_type'];
                            echo "</div>";
                        }
                    ?>
                </div>

                <div id="lunch" class="menu-list">
                    <?php
                        foreach ($lunch_result as $row){
                            echo "<div class='menu-item'>"; 
                            echo "<img src='media/".$row['img']."'>";
                            echo $row['food_name']."<br>"; 
                            echo "Price:฿".$row['fprice']."<br>";
                            // echo "Meal:".$row['meal_type'];
                            echo "</div>";
                        }
                    ?>
                </div>

                <div id="drink" class="menu-list">
                    <?php
                        foreach ($drink_result as $row){
                            echo "<div class='menu-item'>"; 
                            echo "<img src='media/".$row['img']."'>";
                            echo $row['drink_name'].",".$row['drink_type']."<br>"; 
                            echo "Price:฿".$row['dprice']."<br>";
                            // echo "Meal:".$row['meal_type'];
                            echo "</div>";
                        }
                    ?>
                </div>
            </div>
<!-- special menu -->
        <h1 id="special">Today's Special</h1>
        <div class="special-menu">
            <div class="special-menu-list">
                <?php 
                    foreach ($special_food_result as $special_food) {
                        echo "<div class='special-menu-item'>";
                        echo "<img src='media/".$special_food['img']."'>";
                        echo $special_food['food_name']."<br>";
                        echo "Price:฿".$special_food['fprice']."<br>";
                        echo "</div>";
                    }

                    foreach ($special_drink_result as $special_drink) {
                        echo "<div class='special-menu-item'>";
                        echo "<img src='media/".$special_drink['img']."'>";
                        echo $special_drink['drink_name']."<br>";
                        echo "Price:฿".$special_drink['dprice']."<br>";
                        echo "</div>";
                    }
                ?>
            </div>
        </div>
<!-- contact us -->
<div class="h1-contact">
    <h1>CONTACT</h1>
</div>

        <div class="contact" id="contact">
            
<!-- map -->
            <div class="map">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d62011.535455062185!2d100.57036294312493!3d13.735336111831693!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x311d61a813429853%3A0xf5aaaa3d466083e7!2sStamford%20International%20University!5e0!3m2!1sen!2ssg!4v1686629637585!5m2!1sen!2ssg" 
                style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>


            <!-- submitting form -->
            <div class="form-contact">
                <section class="contact-us" id="contact-section">
                    <form id="contact" action="" method="post">
                    
                    <div class="section-heading">
                        <h4>Contact us</h4>
                    </div>
                
                    <div class="inputField">
                        <input type="name" name="name" id="name" placeholder="Your name" autocomplete="on" required>
                        <span class="valid_info_name"></span>
                    </div>
                
                    <div class="inputField">
                        <input type="Email" name="email" id="email" placeholder="Your email" required="" />
                        <span class="valid_info_email"></span>
                    </div>
                
                    <div class="inputField">
                        <textarea name="message" id="message" placeholder="Your message"></textarea>
                        <span class="valid_info_message"></span>
                    </div>
                
                    <div class="inputField btn">
                        <button type="submit" id="form-submit" class="main-gradient-button" disabled>Send a message</button>
                    </div>
                
                    </form>
                </section>
            </div>

        </div>

    </div>

    <!-- <script>
         function myFunction(){
            var x = document.getElementById('breakfast');
            var y = document.getElementById('lunch');
            var z = document.getElementById('drink');

            // var display = x.style.display;

            if(x.style.display === 'none'){
                x.style.display = 'flex';
            }else x.style.display = 'none';
        }
    </script> -->

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