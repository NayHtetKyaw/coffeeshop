<?php 
	// data base connection
	$dsn = 'mysql:dbname=stamfordcafe;host=localhost';
	$dbuser ='root';
	$dbPassword ='';

	try{
		$connection = new PDO($dsn , $dbuser, $dbPassword); 
		// echo "connection successful";

	}catch(PDOException $e){
		// die ('Connection failed!' . $exception ->getMessage());
		$_SESSION['messages'][] = 'Connection failed!' . $e->getMessage();
	}

	$name = $email = $phone = $room = $guests = $date = $package = '';

	if(isset($_POST['submit'])){
		$name = $_POST['name'];
		$email = $_POST['email'];
		$phone = $_POST['phone'];
		$room = $_POST['room'];
		$guests = $_POST['no_of_guests'];
		$date = $_POST['date'];
		$package = $_POST['package'];

		switch($guests){
			// case "1 Person": $guests = 1; break;
			case "2 Person": $guests = 2;break;
			case "3 Person"; $guests = 3; break;
			case "4 Person": $guests = 4; break;
			case "5 Person": $guests = 5; break;
			case "6 Person"; $guests = 6; break;
			default: $guests = 1;
		}

		// switch($package){
		// 	// case "Package 1": $package = 1; break;
		// 	case "Package 2": $package = 2; break;
		// 	case "Package 3": $package = 3; break;
		// 	default: $package = 1;
		// }


		// echo $name, "<br>", $email,"<br>", $phone,"<br>", $room,"<br>", $guests,"<br>", $date,"<br>", $package; 

		$statement = ("INSERT INTO reservations(reservation_date,customer_phone,customer_name,number_of_guests,customer_email,package_name,room_id)
						VALUES('$date','$phone','$name','$guests','$email','$package','$room')");
		
		$connection->exec($statement);
	}

?>


<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<title>Reservation</title>

	<!-- Google font -->
	<link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,900" rel="stylesheet">

	<!-- Bootstrap -->
	<link type="text/css" rel="stylesheet" href="css/bootstrap.min.css" />
	<script src="https://kit.fontawesome.com/55c4673143.js" crossorigin="anonymous"></script>


	<!-- Custom stlylesheet -->
	<link type="text/css" rel="stylesheet" href="css/style.css" />

	<!--[if lt IE 9]>
		  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
		  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
		<![endif]-->

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

	<div id="booking" class="section">
		<div class="section-center">
			<div class="container">
				<div class="row">
					<div class="col-md-5">
						<div class="booking-cta">
							<h1>Make your reservation</h1>
							<!-- <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Cupiditate laboriosam numquam at</p> -->
						</div>
					</div>
					<div class="col-md-6 col-md-offset-1">
						<div class="booking-form">
							<form method="post" action="">
								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<input name="name" class="form-control" type="text">
											<span class="form-label">Name</span>
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<input name="email" class="form-control" type="email">
											<span class="form-label">Email</span>
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-md-6 phone">
										<div class="form-group">
											<input name="phone" class="form-control"type="tel">
											<span class="form-label">Phone</span>
										</div>
									</div>
									<div class="col-md-3 col-sm-6">
										<div class="form-group">
											<span class="form-label">Rooms</span>
											<select name="room" class="form-control">
												
												<option>Pet Room</option>
												<option>Boardgame Room</option>
												<option>Internet Room</option>
											</select>
											<span class="select-arrow"></span>
										</div>
									</div>
									<div class="col-md-3 col-sm-6">
										<div class="form-group">
											<span class="form-label">Guests</span>
											<select class="form-control" name="no_of_guests">
												<option>1 Person</option>
												<option>2 Person</option>
												<option>3 Person</option>
												<option>4 Person</option>
												<option>5 Person</option>
												<option>6 Person</option>
											</select>
											<span class="select-arrow"></span>
										</div>
									</div>
								</div>
								<div class="row checkin">
									<div class="col-md-6">
										<div class="form-group">
											<input name="date" class="form-control" type="date" required>
											<span class="form-label">Check In</span>
										</div>
									</div>
									<div class="col-md-3 set col-sm-6">
										<div class="form-group">
											<span class="form-label">Packages</span>
											<select class="form-control" name="package">
												<option>Package 1</option>
												<option>Package 2</option>
												<option>Package 3</option>
											</select>
											<span class="select-arrow"></span>
										</div>
									</div>
								</div>
								<div class="form-btn">
									<button name="submit" class="submit-btn">Book Now</button>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
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

	<script src="js/jquery.min.js"></script>
	<script>
		$('.form-control').each(function () {
			floatedLabel($(this));
		});

		$('.form-control').on('input', function () {
			floatedLabel($(this));
		});

		function floatedLabel(input) {
			var $field = input.closest('.form-group');
			if (input.val()) {
				$field.addClass('input-not-empty');
			} else {
				$field.removeClass('input-not-empty');
			}
		}
	</script>

</body><!-- This templates was made by Colorlib (https://colorlib.com) -->

</html>