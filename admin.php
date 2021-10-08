<!DOCTYPE html>
<html lang="en">
<?php
	include "includes/db.php";
// 	session_start();
// if (!isset($_SESSION["user"]))
//   header("Location: index.php?error");
?>
<head>
<!-- 					auto refresh  					 -->
<meta http-equiv="Refresh" content="60">					 
	<!-- Meta -->
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="">
	<meta name="keywords" content="">
	<meta name="author" content="Awaiken Theme">
	<!-- Page Title -->
	<title>Barbershop and Hair Salon HTML Template</title>
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


<body >



<?php

//   echo $_POST["user"];
//   echo $_POST["pass"];

// $_POST["user"]='zahe';
// $_POST["pass"]='zahe123';
if(isset($_GET["state"]) and $_GET["state"] == "zaheday" && isset($_GET["id"]))				//after deleting
{

	$id1=$_GET["id"];
	$query  = "Delete FROM orders  where order_id=" .$id1;
	$result = mysqli_query($connection, $query);
	if(!$result)
		echo ' Connection problem';

}
	// $query1  = "SELECT * FROM users WHERE username='"
	// . $_POST["user"] . "' and password='"
	// . $_POST["pass"] . "'  ";

if (isset($_GET["state"]) and $_GET["state"] == "zaheday" ) {

	function getWeekday($date)
	{
		return date('w', strtotime($date));
	}

	$query1  = 'SELECT * FROM users WHERE username="zahe" and password="zahe123"';
	$result = mysqli_query($connection, $query1);
	$row1 = mysqli_fetch_assoc($result);
	if(!is_array($row1)){
		echo 'eror admin user and pass';
	}
	if (is_array($row1)) {
		
		$conter = 0;
		$today = date("Y-m-d");
		echo'<section class="testimonial " id="testimonial">
		<div class="container">';
		
		echo '<form id="zahe_day"  action="./admin.php?state=zahetime" method="POST" style=" display: block;">
		<div class="row no-pad">
			<div class="col-md-12">
				<div class="main-title">
				<h2>  שלום זאהי דקה</h2>
				<h2> בחר יום</h2>
			
				</div>
			</div>
		</div>';
		
		echo '<div class="vertical-line-1"></div>';
	
			
		while (++$conter != 8) {
			$today1 = getWeekday($today);
			switch ($today1) {
				case 0:
					echo ' 
					
					
		<div class="banner-info-single text days_click">
		<label class="days days_click colo"> יום ראשון<input type="submit" class="buton" name="zahe_day" value="' . ($today++) . '">
		   </label>


		</div>
		
		';
					break;
				case 1:
					echo ' 
		<div class="banner-info-single text days_click">
		
		<label class="days days_click colo"> יום שני<input type="submit" class="buton" name="zahe_day" value="' . ($today++) . '">
		   </label>

		   
		

		</div>
		
		';
					break;
				case 2:
					$today++;
					break;

				case 3:
					echo ' 
		<div class="banner-info-single text days_click">
		
		<label class="days days_click colo"> יום רביעי<input type="submit" class="buton" name="zahe_day" value="' . ($today++) . '">
		   </label>


		</div>
		
		';

					break;
				case 4:
					echo ' 
		<div class="banner-info-single text days_click">
		
		<label class="days days_click colo"> יום חמישי<input type="submit" class="buton" name="zahe_day" value="' . ($today++) . '">
		   </label>


		</div>
		
		';

					break;
				case 5:
					echo ' 
		<div class="banner-info-single text days_click">
		
		<label class="days days_click colo"> יום שישי<input type="submit" class="buton" name="zahe_day" value="' . ($today++) . '">
		   </label>


		</div>
		
		';

					break;
				case 6:
					echo ' 
			<div class="banner-info-single text days_click">
			
			<label class="days days_click colo"> יום שבת<input type="submit" class="buton" name="zahe_day" value="' . ($today++) . '">
		   </label>


		</div>
			
			
			
			';
					break;
			}
		}
		echo '</form>';	
		echo '</div>
		</section>';
	}
}


if (isset($_GET["state"]) && $_GET["state"] == "zahetime"&&!empty($_POST["zahe_day"])) {


if (!empty($_POST["deletephone"])&&!empty($_POST["deletetime"])&&!empty($_POST["deletedate"])) {
	$query = "delete from orders where phone='" . $_POST["deletephone"] . "' and timee='" . $_POST["deletetime"] . "' and datee='" . $_POST["deletedate"] . "'";
	$result = mysqli_query($connection, $query);
	if (!$result)
		echo 'connectiong failed';
}

	$newDate = date("d-m-Y", strtotime($_POST["zahe_day"]));
	echo '<form id="back_arroww"  action="./admin.php?state=zaheday" method="post" ">
				</form>';

				echo'<section class="testimonial zom" id="testimonial">
				<div class="container">';
	echo'<div class="row no-pad">
	<div class="col-md-12">
	<div class="main-title">
	<h2>  שלום זאהי דקה</h2>
	<h2> '.$newDate.' </h2>
	<a  href="#" id="back-arroww" ></a>
	
		</div>
	</div>
 </div>';
 echo '<form id="admin-delete"  action="./admin.php?state=zahetime" method="post" ">';
 echo' <input type="hidden"  name="zahe_day" value="' . $_POST["zahe_day"] . '">';
	echo '<div class="vertical-line-1"></div>';
	$counter=0;
	$counter1=0;
	$query  = "SELECT * FROM orders  where datee='"
		. $_POST["zahe_day"] . "'  ";
	$result = mysqli_query($connection, $query);

	while ($row = mysqli_fetch_assoc($result)) {
		$counter++;
		$query1  = "SELECT * FROM customers  where phone='"
			. $row["phone"] . "'  ";
		$result1 = mysqli_query($connection, $query1);
		$row1 = mysqli_fetch_assoc($result1);
		$dateTime = date('H:i', strtotime($row["timee"]));
		// echo $row["order_id"];
		$id=$row["order_id"];
		$Day=$_POST["zahe_day"];
		
					// finish the button

					echo '
					<div class="banner-info-single text days_click">
					
			 <a href="#" class="delete-admin"> </a>
			 <label class="colo"> ' . $row1["phone"] . ': טלפון       </label>
			 <label class="colo"> ' . $dateTime . '      :שעה  </label>
			 <label class="colo">  שם: ' . $row1["name"] . ' </label> ';

			 echo' <input type="hidden"  name="deletephone" value="' . $row1["phone"] . '">';
			 echo' <input type="hidden"  name="deletetime" value="' . $dateTime . '">';
			 echo' <input type="hidden"  name="deletedate" value="' . $_POST["zahe_day"] . '">';

						
		echo ' </div>';
			
			
	}

	echo '</form>';
	echo '</div>
	</section>';
	
	
}

?>





	
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