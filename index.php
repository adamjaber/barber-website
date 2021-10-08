<?php
include "includes/db.php";


if (isset($_GET["state"]) and $_GET["state"] == "add" && !empty($_POST["dat"]) && !empty($_POST["phon1"]) && !empty($_POST["btn_time"])) {

	$query2 = "SELECT * FROM orders WHERE phone='"
		. $_POST["phon1"] . "' and datee>='"
		. date("Y-m-d") . "'  ";
	$result2 = mysqli_query($connection, $query2);
	$row2 = mysqli_fetch_assoc($result2);
	if (!is_array($row2)) {

		$query1  = "SELECT * FROM orders WHERE timee='"
			. $_POST["btn_time"] . "' and datee='"
			. $_POST["dat"] . "'  ";
		$result1 = mysqli_query($connection, $query1);
		$row1 = mysqli_fetch_assoc($result1);
		
		if (!is_array($row1)) {

			$query = "INSERT INTO orders (phone,datee, timee) 
					VALUES ('" . $_POST["phon1"] . "','" . $_POST["dat"] . "','" . $_POST["btn_time"] .  "')";
			// echo $query;
			$result = mysqli_query($connection, $query);
		
				echo '<form id="alert_order" class="formBox " action="./index.php" style="display:block;">
				<input type="hidden" class="hid hid4"  value="1">
				<label>הזמנה בוצעה בהצלחה </label>
				<div class="form-group">
				<input type="submit" class="btn-contact" value="סיים" />
				</div>	
				</form>'; 
			
		} else {
			echo 'order error';
		}
	}
	else {
		echo '<form id="alert_order" class="formBox " action="./index.php" style="display:block;">
		<input type="hidden" class="hid hid4"  value="1">
		<label>כבר יש לך הזמנה פעילה</label>
		<div class="form-group">
		<input type="submit" class="btn-contact" value="סיים" />
	    </div>	
		</form>';  
	}
} elseif (isset($_GET["state"]) and $_GET["state"] == "signupp" && !empty($_POST["namee"]) && !empty($_POST["phone"])) {

	$query  = "SELECT * FROM customers WHERE phone='"
		. $_POST["phone"] . "'";

	$result = mysqli_query($connection, $query);
	$row = mysqli_fetch_assoc($result);
	if (!is_array($row)) {
		$query =   "INSERT INTO customers (name,phone)
			VALUES ('" . $_POST["namee"] . "','" . $_POST["phone"] .  "')";
		$result = mysqli_query($connection, $query);
		if (!$result)
			echo 'connectiong failed';  				// change
	} else {
		echo '<form id="alert_customer" class="formBox formBox8" action="./index.php" style="display:block;">
			<input type="hidden" class="hid hid3"  value="1">
		<label>מספר הפלפון כבר קיים במערכת</label>
		<div class="form-group">
		<input type="submit" class="btn-contact" value="סיים" />
	    </div>	
		</form>';     			  // change 
	}
} else if (isset($_GET["state"]) and $_GET["state"] == "delete" && !empty($_POST["delet1"]) && !empty($_POST["delet2"]) && !empty($_POST["delet3"])) {



	// $dateTimee = date('H:i', strtotime($_POST["delet3"]));

	$query = "delete from orders where phone='" . $_POST["delet1"] . "' and timee='" . $_POST["delet3"] . "' and datee='" . $_POST["delet2"] . "'";
	$result = mysqli_query($connection, $query);
	if (!$result)
		echo 'connectiong failed';

		echo '<form id="alert_order" class="formBox " action="./index.php" style="display:block;">
				<input type="hidden" class="hid hid4"  value="1">
				<label>  התור בוטל </label>
				<div class="form-group">
				<input type="submit" class="btn-contact" value="סיים" />
				</div>	
				</form>'; 
			
}

// ----------------  login ----------------------------------------- && isset($_POST["user"]) && isset($post["pass"])

else if (isset($_GET["state"]) && $_GET["state"] == "login") {
	
	$query = "SELECT * FROM users WHERE username='"
		. $_POST["user"]
		. "' AND password ='" . $_POST["pass"] . "'";

	$result = mysqli_query($connection, $query);
	$row = mysqli_fetch_assoc($result);

	if (is_array($row)) {
		if (session_status() != PHP_SESSION_ACTIVE)
			session_start();

		$_SESSION["user"] = $row["username"];
		$_SESSION["pass"] = $row["password"];
		// header('location:https://www.zahebarber.com/admin.php?state=zaheday');
		//  echo "<script>window.location.href = 'https://www.zahebarber.com/admin.php?state=zaheday';</script>"
		echo '<script type="text/javascript">
		location.replace("https://www.zahebarber.com/admin.php?state=zaheday"); </script>';
	}
	 else{

	echo '<form id="alert_order" class="formBox " action="./index.php" style="display:block;">
	<input type="hidden" class="hid hid4"  value="1">
	<label>שם משתמש או סיסמה לא נכונים</label>
	<div class="form-group">
	<input type="submit" class="btn-contact" value="סיים" />
	</div>	
	</form>'; 
	 }

}


?>
<!DOCTYPE html>
<html lang="en">

<head>
	<!-- Meta -->
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="">
	<meta name="keywords" content="">
	<meta name="author" content="Awaiken Theme">
	<!-- Page Title -->
	<title>Zahe Daka Barber-מספרה זאהי דקה</title>
	<!-- Google Fonts css-->
	<link href="https://fonts.googleapis.com/css?family=Josefin+Sans:400,600,700%7CMontserrat:400,500,600,700,800,900" rel="stylesheet">
	<!-- Bootstrap css -->
	<link href="css/bootstrap.min.css" rel="stylesheet" media="screen">
	<!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous"> -->
	<!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script> -->
	<!-- Font Awesome & Flat icon css-->
	<link href="css/font-awesome.min.css" rel="stylesheet" media="screen">
	<link href="css/flaticon.css" rel="stylesheet" media="screen">
	<!-- Carousel css -->
	<link rel="stylesheet" href="css/owl.carousel.css">
	<!-- Slick nav css -->
	<link rel="stylesheet" href="css/slicknav.css">
	<!-- Main custom css -->
	<link href="css/custom.css" rel="stylesheet" media="screen">
	<link href="css/style.css" rel="stylesheet">

	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body data-spy="scroll" data-target="#navigation" data-offset="71" id="bodyy">
	<!-- Preloader starts -->
	<div class="preloader">
		<div class="browser-screen-loading-content">
			<div class="loading-dots dark-gray">
				<i></i>
				<i></i>
				<i></i>
				<i></i>
			</div>
			<p class="loading-text">Loading</p>
		</div>
	</div>
	<!-- Preloader Ends -->

	<!-- Header Section Starts-->
	<header>
		<nav id="main-nav" class="navbar navbar-default navbar-fixed-top">
			<div class="container">
				<div class="navbar-header">
					<!-- Logo starts -->
					<a class="navbar-brand" href="#">
						<img src="images/small-logo.png" alt="Barbershop" />
					</a>
					<!-- Logo Ends -->

					<!-- Responsive Menu button starts -->
					<div class="navbar-toggle">
					</div>
					<!-- Responsive Menu button Ends -->
				</div>

				<div id="responsive-menu"></div>

				<!-- Navigation starts -->
				<div class="navbar-collapse collapse" id="navigation">
					<ul class="nav navbar-nav navbar-right main-navigation" id="main-menu">
						<li class="active"><a href="#home">Home</a></li>
						<li><a href="#about">About</a></li>
						<li><a href="#service">Service</a></li>
						<li><a href="#gallery">Gallery</a></li>
						<li><a href="#pricing">Pricing</a></li>
						<li><a href="#" class="loginn">Login</a></li>

					</ul>
				</div>
				<!-- Navigation Ends -->
			</div>
		</nav>
	</header>
	<!-- Header Section Ends-->
	<?php

	?>
	<!-- Banner Section Starts -->

	<!-- login form  -->
	<form id="loggin" class="formBox formBox2" action="./index.php?state=login" method="POST">
		<h2 class="contact-form-title"> כניסה</h2>
		<div class="vertical-line-1"></div>


		<label>שם המשתמש</label>
		<div class="form-group">
			<input type="text" id="user" name="user" placeholder=" שם המשתמש" required>
		</div>
		<label>סיסמה</label>
		<div class="form-group flex">
			<input type="password" id="pass" class="form-control inpname" placeholder="סיסמה" name="pass" required />
		</div>
		<div class="form-group">
			<input type="submit" class="btn-contact" value="המשך" />
		</div>
	</form>
	<!-- end login form  -->

	<!-- booking form  -->
	<form id="booking" class="formBox formBox1" action="./index.php?state=day" method="post" <?php if (isset($_GET["state"]) and $_GET["state"] == "loginnorder") {
		echo 'style=" display: block;"';
	} ?>>
		<?php
		echo'<input type="hidden" class="hid hid4"  value="1">';
		if (isset($_GET["state"]) and $_GET["state"] == "signup") {
			echo ' <h2 class="contact-form-title"> הרשמה</h2> ';
			echo '<div class="vertical-line-1"></div>';

			echo '
		<label>שם</label>
		
		<div class="form-group">
			<input type="text" id="nam" name="namee" value="" required>
		</div> ';
		} else  {
			echo ' <h2 class="contact-form-title"> הזמנה חדשה</h2> ';
			echo '<div class="vertical-line-1"></div>';
		}

		?>

		<label>מספר טלפון</label>

		<div class="form-group">
			<input type="tel" id="phone" name="phone" placeholder="123-456-7890" pattern="[0-9]{3}[0-9]{3}[0-9]{4}" value="" required>
		</div>

		<!-- <label>טלפון</label> -->


		<div class="form-group">
			<input type="submit" id="order" class="btn-contact" value="המשך" />
		</div>
		<?php
		if ((isset($_GET["state"]) and $_GET["state"] != "signup") or !isset($_GET["state"])) {
			echo ' <div class="form-group">
			<a href="./index.php?state=signup">לקוח חדש לחץ כאן</a>
		</div> ';
		} else {
			echo ' <div class="form-group">
			<a href="./index.php?state=loginnorder" >כניסה</a>
		</div> ';
		}
		?>
	</form>
	<!-- end booking  -->


	<!-- day form -->
	<?php
	function getWeekday($date)
	{
		return date('w', strtotime($date));
	}
	if (isset($_GET["state"]) and $_GET["state"] == "day" && !empty($_POST["phone"])) {

		$query  = "SELECT * FROM customers WHERE phone='"
			. $_POST["phone"] . "'";

		$result = mysqli_query($connection, $query);
		$row = mysqli_fetch_assoc($result);

		if (is_array($row)) {
			$conter = 0;
			$today = date("Y-m-d");
			 date('Y-m-d', strtotime($today. ' + 8 days'));
			echo '<form id="timing" class=" formBox" action="./index.php?state=time" method="POST" style=" display: block;">
			
					<h2 class="contact-form-title"> בחר זמן</h2>
					<label>שלום ' . $row["name"] . '  </label> ';
			echo '<div class="vertical-line-1"></div>';

			echo '<input type="hidden" name="back_white" class="hid hid1"  value="1">';
			echo '<input type="hidden" class="hid" name="phon"  value="' . $_POST["phone"] . '">';
			while (++$conter != 8) {
			
				
				
					
				$today1 = getWeekday($today);
			
				switch ($today1) {
					case 0:
						echo ' 
						<div class="banner-info-single text days_click">
						
						<label class="days days_click"> יום ראשון<input type="submit" class="buton" name="btn_day" value="' . ($today) . '">
						   </label>
						</div>
						
						';
						break;
					case 1:
						echo ' 
						<div class="banner-info-single text days_click">
						
						<label class="days days_click"> יום שני<input type="submit" class="buton" name="btn_day" value="' . ($today) . '">
						   </label>
						</div>
						
						';
						break;
					case 2:
						$today;
						break;

					case 3:
						echo ' 
						<div class="banner-info-single text days_click">
						
						<label class="days days_click"> יום רביעי<input type="submit" class="buton" name="btn_day" value="' . ($today) . '">
						   </label>
						</div>
						
						';

						break;
					case 4:
						echo ' 
						<div class="banner-info-single text days_click">
						
						<label class="days days_click"> יום חמישי<input type="submit" class="buton" name="btn_day" value="' . ($today) . '">
						   </label>
						</div>
						
						';

						break;
					case 5:
						echo ' 
						<div class="banner-info-single text days_click">
						
						<label class="days days_click"> יום שישי<input type="submit" class="buton" name="btn_day" value="' . ($today) . '">
						   </label>
						</div>
						
						';

						break;
					case 6:
						echo ' 
							<div class="banner-info-single text days_click">
							
							<label class="days days_click"> יום שבת<input type="submit" class="buton" name="btn_day" value="' . ($today) . '">
						   </label>
						</div>
							
							</div>
							
							';
						break;
				}
				$today=	date('Y-m-d', strtotime($today. ' + 1 days'));
			}
			echo '</form>';
		}
		else {

	echo '<form id="alert_order" class="formBox " action="./index.php" style="display:block;">
	<input type="hidden" class="hid hid4"  value="1">
	<label> המספר לא רשום במערכת </label>
	<div class="form-group">
	<input type="submit" class="btn-contact" value="סיים" />
	</div>	
	</form>'; 

		}
		// $dayofweek = date('w', strtotime($today));

	}
	?>
	<!-- day form -->
	<!-- pick a clock -->
	<?php

	if (isset($_GET["state"]) and $_GET["state"] == "time" && !empty($_POST["btn_day"]) && !empty($_POST["phon"])) {
		// $day = date("Y-m-d", strtotime($_POST["btn_day"]));
		// date("d-", datee);
		// echo  $_POST["btn_day"];
		$query  = "SELECT * FROM orders WHERE datee='"
			. $_POST["btn_day"] . "'
			order by datee asc";

		// echo $day;	
		$result = mysqli_query($connection, $query);

		if ($row = mysqli_fetch_assoc($result)) {

			$dateTime = date('H:i', strtotime($row["timee"]));
		} else
			$dateTime = '10:00';



		$end_time = '22:00';
		$conter = 0;
		if ($_POST["btn_day"] == date("Y-m-d")) {

			$date = new DateTime("now", new DateTimeZone('Asia/Jerusalem'));
			$date1 = new DateTime("now", new DateTimeZone('Asia/Jerusalem'));
			$start_time = $date->format('i');

			while ($start_time % 15 != 0) {
				$start_time += 1;
			}

			if ($start_time == 60) {
				$start_time = 0;
				$time = $date1->format('H') + 1;
				$start_time = date('H:i', mktime($time, $start_time));
			} else {
				$time = $date1->format('H');
				$start_time = date('H:i', mktime($time, $start_time));
			}
			if ($start_time < "11:00") {
				$start_time = "11:00";
			}
		} else {
			$start_time = "11:00:00";
		}
		// echo $start_time;
		$start = strtotime($start_time);
		$end = strtotime($end_time);
		// $interval = DateInterval::createFromDateString('15 min');
		echo '<form id="back_arrow"  action="./index.php?state=day" method="post" ">';
		echo '  <input type="hidden" name="phone" value="' . $_POST["phon"] . '"> ';
		echo '</form>';
		echo  '	<form id="clock" class=" formBox formBox4" action="./index.php?state=add" method="post" style=" display: block;"> ';
		echo ' <div class="header_time" >
		<a  href="#" id="back-arrow" ></a>
		<h2 class="contact-form-title time_title"> בחר שעה</h2> 
		<div class="vertical-line-1"></div>
		</div> ';
		echo '<input type="hidden" class="hid"  value="1">';
		echo '<input type="hidden" class="hid" name="phon1"  value="' . $_POST["phon"] . '">';
		echo '<input type="hidden" class="hid" name="dat"  value="' . $_POST["btn_day"] . '">';
		for ($i = $start; $i <= $end; $i = $i + 15 * 60) {

			$tmp = date('H:i', $i);
			if ($i == $start && $tmp > $dateTime) {


				while ($row = mysqli_fetch_assoc($result)) {
					$dateTime = date('H:i', strtotime($row["timee"]));
					if ($dateTime >= $tmp) {
						break;
					}
				}
			}
			// echo $tmp;

			if ($tmp != $dateTime) {

				echo ' 
					<div class="banner-info-single text">
					
					<input type="submit" class="buton" name="btn_time" value="' .  $tmp . '">
					</div>
					';
			} else if ($row = mysqli_fetch_assoc($result)) {

				$dateTime = date('H:i', strtotime($row["timee"]));
				// echo $dateTime;
			}
		}
		echo	'</form>';
	}
	?>
	<form id="cance" class="formBox formBox5" action="./index.php?state=cancelorder" method="POST">
		<h2 class="contact-form-title"> ביטול תור</h2>
		<div class="vertical-line-1"></div>

		<label>מספר טלפון</label>

		<div class="form-group">
			<input type="tel" id="phon" name="phone1" placeholder="123-456-7890" pattern="[0-9]{3}[0-9]{3}[0-9]{4}" value="" required>
		</div>
		<div class="form-group">
			<input type="submit" class="btn-contact" value="המשך" />
		</div>
	</form>
	<?php
	if (isset($_GET["state"]) and $_GET["state"] == "cancelorder" && !empty($_POST["phone1"])) {

		$query  = "SELECT * FROM orders WHERE phone='"
			. $_POST["phone1"] . "' and datee >='"
			. date("Y-m-d") . "'";
		$result = mysqli_query($connection, $query);

		$row = mysqli_fetch_assoc($result);
		if (is_array($row)) {
			$timee = date('H:i');
			echo  '	<form id="cancel_time" class="formBox formBox6 " action="./index.php?state=delete" method="post" style=" display: block;"> ';
			echo '<input type="hidden" class="hid hid1"  value="1">';
			echo ' <div class="header_time">
		<h2 class="contact-form-title time_title"> בחר שעה לביטול</h2> 
		<div class="vertical-line-1"></div>
		</div> ';

			echo '       
		<div class="banner-info-single text">	
		<a  href="#" class="delete-button" ></a>		
		   <label class="days days_click"> יום שבת ' . $row["datee"] . '
		      ' .  $row["timee"] . '
		   </label>';
			$timee = $row["timee"];

			echo '
		   <input type="hidden" name="delet1" value="' .  $_POST["phone1"] . '">
		   <input type="hidden" name="delet2" value="' . $row["datee"] . '">
		   <input type="hidden" name="delet3" value="' . $timee . '">
		</div>
								';
			while ($row = mysqli_fetch_assoc($result)) {
				$timee = $row["timee"];
			//---------------------------מיותר??
				echo '      														
			<div class="banner-info-single text">
			
			<label class="days days_click"> יום שבת ' . $row["datee"] . '
			' .  $row["timee"] . '
					<a  href="#" class="delete-button" ></a>
							   </label>
							   <input type="hidden" name="delet1" value="' . $_POST["phone1"] . '">
							   <input type="hidden" name="delet2" value="' . $row["datee"] . '">
							   <input type="hidden" name="delet3" value="' . $timee . '">
								</div>
								';
			}
		/// ------------------------------------------------------------
			echo	'</form>';
		} else{
		echo '<form id="alert_customer" class="formBox" action="./index.php" style="display:block;">
	<input type="hidden" class="hid hid3"  value="1">
		<label> אין עבורך תרים</label>
		<div class="form-group">
		<input type="submit" class="btn-contact" value="סיים" />
	    </div>	
		</form>';   
		}  
	}



	?>
	<!-- end pick  -->
	<section class="banner" id="home">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<div class="header-banner">
						<img src="images/logo.png" alt="Logo" />
						<p>Discover Your Style & Beauty</p>
						<h3> <b>Zahe Daka</b> <br />Style & Design</h3>
					</div>
				</div>
			</div>

			<div class="row">
				<div class="col-md-4">
					<div class="banner-info-single text">
						<div class="icon-box"><i class="fa fa-clock-o"></i></div>
						<h3>שעות פתיחה</h3>
						<p>ראשון – שבת: 11:30 – 22:00</p>
						<p>שלישי סגור</p>
					</div>
				</div>

				<div class="col-md-4">
					<div class="banner-info-single text">
						<div class="icon-box"><i class="fa fa-map-marker"></i></div>
						<h3>מקום</h3>
						<p> באקה אל גרביה</p>
						<p>כביש ראשי</p>
						<p></p>
					</div>
				</div>

				<div class="col-md-4">
					<div class="banner-info-single text">
						<div class="icon-box"><i class="fa fa-phone"></i></div>
						<h3>מספר טלפון</h3>
						<p>0506655919</p>
						<p>לבירורים</p>
					</div>
				</div>
				
				
				
				<a href="#" id="boking">
					<div class="col-md-4 ">
						<div class="banner-info-single text b">

							<div class="icon-box mar-icon" ><i class="fa  fa-calendar-check-o"></i></div>
							<p class='viss '>0506655919</p>
							<h3 class='bb'> הזמנת תור</h3>

							<p class='viss '>לבירורים</p>
						</div>
					</div>
				</a>
				<a href="#" id="cancel">
					<div class="col-md-4">
						<div class="banner-info-single text c">

							<div class="icon-box mar-icon"><i class="fa  fa-calendar-times-o"></i></div>
							<p class='viss '>0506655919</p>
							<h3 class='cc'> ביטול תור</h3>

							<p class='viss'>לבירורים</p>


						</div>
					</div>
				</a>
			</div>
		</div>

		<div class="banner-icon"><i class="flaticon-hair-salon-situation"></i></div>
	</section>
	<!-- Banner Section Ends -->
	<div id="toolsBlur" class="screenBlur"></div>


	<!-- Services section starts -->
	<section class="service" id="service">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<div class="main-title">
						<h2>Services</h2>
					</div>
				</div>
			</div>

			<div class="row">
				<div class="col-md-3 col-sm-6">
					<div class="service-single">
						<div class="icon-box-outer">
							<div class="icon-box">
								<i class="flaticon-shaver"></i>
							</div>
						</div>

						<h3>עיצוב שיער</h3>
						<p>כל סוגי העיצובים המודרני </p>

					</div>
				</div>

				<div class="col-md-3 col-sm-6">
					<div class="service-single">
						<div class="icon-box-outer">
							<div class="icon-box">
								<i class="flaticon-razor"></i>
							</div>
						</div>

						<h3>עיצוב זקן</h3>
						<p>עיצוב זקן באופן מקצועי</p>

					</div>
				</div>


				<div class="col-md-3 col-sm-6">
					<div class="service-single">
						<div class="icon-box-outer">
							<div class="icon-box">
								<i class="flaticon-brush"></i>
							</div>
						</div>

						<h3>טיפול פנים</h3>
						<p>ניקוי פנים/מסכות/חומרים טבעיים</p>

					</div>
				</div>
				<div class="col-md-3 col-sm-6">
					<div class="service-single">
						<div class="icon-box-outer">
							<div class="icon-box">
								<i class="flaticon-scissors"></i>
							</div>
						</div>

						<h3>מוצרי יופי</h3>
						<p>בשמים/מוצרי פנים/מוצרי שיער</p>

					</div>
				</div>
			</div>

		</div>
	</section>
	<!-- Services section ends -->



	<!-- Photo Gallery section starts -->
	<section class="gallery" id="gallery">
		<div class="container-fluid">
			<div class="row no-pad">
				<div class="col-md-12">
					<div class="main-title">
						<h2>Our Works</h2>
					</div>
				</div>
			</div>

			<div class="row no-pad">
				<div class="col-md-3 col-sm-4 col-xs-6">
					<div class="gallery-box">
						<figure>
							<img src="images/p1.jpg" alt="" />
						</figure>

						<div class="gallery-overlay">
							<div class="gallery-info">
								<p>Hair Style 1</p>
							</div>
						</div>
					</div>
				</div>

				<div class="col-md-3 col-sm-4 col-xs-6">
					<div class="gallery-box">
						<figure>
							<img src="images/p2.jpg" alt="" />
						</figure>

						<div class="gallery-overlay">
							<div class="gallery-info">
								<p>Hair Style 2</p>
							</div>
						</div>
					</div>
				</div>

				<div class="col-md-3 col-sm-4 col-xs-6">
					<div class="gallery-box">
						<figure>
							<img src="images/p3.jpg" alt="" />
						</figure>

						<div class="gallery-overlay">
							<div class="gallery-info">
								<p>Hair Style 3</p>
							</div>
						</div>
					</div>
				</div>

				<div class="col-md-3 col-sm-4 col-xs-6">
					<div class="gallery-box">
						<figure>
							<img src="images/p4.jpg" alt="" />
						</figure>

						<div class="gallery-overlay">
							<div class="gallery-info">
								<p>Hair Style 4</p>
							</div>
						</div>
					</div>
				</div>

				<div class="col-md-3 col-sm-4 col-xs-6">
					<div class="gallery-box">
						<figure>
							<img src="images/p5.jpg" alt="" />
						</figure>

						<div class="gallery-overlay">
							<div class="gallery-info">
								<p>Hair Style 5</p>
							</div>
						</div>
					</div>
				</div>

				<div class="col-md-3 col-sm-4 col-xs-6">
					<div class="gallery-box">
						<figure>
							<img src="images/p6.jpg" alt="" />
						</figure>

						<div class="gallery-overlay">
							<div class="gallery-info">
								<p>Hair Style 6</p>
							</div>
						</div>
					</div>
				</div>

				<div class="col-md-3 col-sm-4 col-xs-6">
					<div class="gallery-box">
						<figure>
							<img src="images/p7.jpg" alt="" />
						</figure>

						<div class="gallery-overlay">
							<div class="gallery-info">
								<p>Hair Style 7</p>
							</div>
						</div>
					</div>
				</div>

				<div class="col-md-3 col-sm-4 col-xs-6">
					<div class="gallery-box">
						<figure>
							<img src="images/p8.jpg" alt="" />
						</figure>

						<div class="gallery-overlay">
							<div class="gallery-info">
								<p>Hair Style 8</p>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- Photo Gallery section ends -->
	<div id="formBlur" class="screenBlur"></div>
	<!-- Pricing Section starts -->
	<div class="pricing" id="pricing">
		<div class="container">
			<div class="row no-pad">
				<div class="col-md-6">
					<div class="store-image">
						<img src="images/store.jpg" alt="" />
					</div>
				</div>

				<div class="col-md-6">
					<div class="pricing-logo">
						<img src="images/logo.png" alt="" />
					</div>

					<div class="price-list">
						<div class="price-item">תספורת גברים</div>
						<div class="price-line"></div>
						<div class="price-amount">25₪</div>
					</div>

					<div class="price-list">
						<div class="price-item">תספורת ילדים</div>
						<div class="price-line"></div>
						<div class="price-amount">20₪</div>
					</div>


					<div class="price-list">
						<div class="price-item">טיפול פנים</div>
						<div class="price-line"></div>
						<div class="price-amount">50₪</div>
					</div>

					<div class="price-list">
						<div class="price-item">טיפול כללי</div>
						<div class="price-line"></div>
						<div class="price-amount">100₪</div>
					</div>

				</div>
			</div>
		</div>
	</div>


	<!-- Contactus section ends -->

	<footer>
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<div class="footer-social">
						<a href="https://www.facebook.com/zahe.daka.1" target="_blank">Facebook</a>
						<a href="https://www.instagram.com/zahedaka/" target="_blank">Instagram</a>
					</div>

					<div class="site-info">
						<p>Copyright &copy; Bader Daka & Adham Jaber 2021</p>
						<!-- <p>Copyright &copy; Untitled. All rights reserved. Design By <a href="https://awaikenthemes.com/" target="_blank">Awaiken Theme</a> Images <a href="https://unsplash.com/" target="_blank">Unsplash</a>, <a href="https://pixabay.com/" target="_blank">Pixabay</a>, <a href="http://www.freepik.com" target="_blank">Freepik</a>, Icon <a href="https://www.flaticon.com/" target="_blank">Flaticon</a></p> -->
					</div>

					<div class="footer-menu">
						<ul>
						<li><a href="#">Home</a></li>
						<li><a href="#about">About</a></li>
						<li><a href="#service">Service</a></li>
						<li><a href="#gallery">Gallery</a></li>
						<li><a href="#pricing">Pricing</a></li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</footer>

	<!-- Jquery Library File -->
	<script src="js/jquery-1.12.4.min.js"></script>
	<!-- SmoothScroll -->
	<script src="js/SmoothScroll.js"></script>
	<!-- Bootstrap js file -->
	<script src="js/bootstrap.min.js"></script>
	<!-- Slick Nav js file -->
	<script src="js/jquery.slicknav.js"></script>

	<!-- Owl Carousel js file -->
	<script src="js/owl.carousel.js"></script>
	<!-- Main Custom js file -->
	<script src="js/function.js"></script>

	<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

	<script src="js/scripts.js"></script>
</body>

</html>


<?php
	//close DB connection
	mysqli_close($connection);
?>