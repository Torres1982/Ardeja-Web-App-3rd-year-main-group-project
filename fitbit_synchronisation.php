<!DOCUMENT html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Fitbit Activities </title>
    <style>
        @import "css/jquery-bootstrap.css";
        @import "css/bootstrap.min.css";
        @import "css/navigation.css";
        @import "css/image_slider.css";
        @import "css/main.css";
        @import "css/footer.css";
        @import "css/forms.css";
        @import "css/login.css";
    </style>
</head>
<body>
<script src="js/jquery.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/forms.js"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">

<?php
	session_start();

	//------------------------ Load Navigation Bar and Current Page --------------------------
	//----------------------------------------------------------------------------------------
	require_once('include/current_page.php');
	//set the current page
	$login_current = 'class = "active"';
	require_once("include/navigation_part.php");
?>

<div class="row" id="formField">
    <div class="col-md-12">
        <?php
			$email2 = $_SESSION['valid_user'];
			$user_id = $_SESSION['user_id'];

			$conn = mysqli_connect('localhost', 'artur', 'Torres1982', 'main_project');

			$query = "SELECT fitbit_id,fitbit_secret FROM member WHERE user_id =?";

			$stmt = $connection->prepare($query);
			$stmt->bind_param('i', $user_id);
			$stmt->execute();
			$stmt->bind_result($fitbit_id, $fitbit_secret);

			if ($stmt->fetch()) {
				$_SESSION['fitbit_user_id'] = $fitbit_id;
				$_SESSION['fitbit_user_secret'] = $fitbit_secret;

				//------------------if in database is fitbit id and secret then give an access
				if ($fitbit_id != '' && $fitbit_secret != '') {
					display_fitbit_menu();
				} else {
					display_fitbit_no_details_found();
				}
			}
        ?>

        <script src="js/jquery.js"></script>
        <script src="js/bootstrap.min.js"></script>
    </div>
</div>

<?php
	require_once("include/footer_part.php");
?>

</body>
</html>

<?php
//--------------------- if user has fitbit password and id, then display action page---------------------------

function display_fitbit_menu()
{
    ?>
    <div class="col-md-10 col-md-offset-1">
        <form action="fitbit_progress_display.php" method="get">
            <input type="submit" value="Display Fitbit Table" class="button">
        </form>
    </div>
    <div class="col-md-10 col-md-offset-1">
        <form action="fitbit_date_picking.php" method="get">
            <input type="submit" value="Fitbit Synchronisation" class="button">
        </form>
    </div>
    <div class="col-md-3 col-md-offset-5"><a class="yellow" href="loginSuccess.php"><i class="fa fa-home fa-4x"></i>Back
            to The User Menu</a></div>
    <?php
	}
		function display_fitbit_no_details_found()
		{
			?>
				<div class="alert alert-success text-center" role="alert"><a href="#" class="alert-link">Unfortunately you didn't
						provide any Fitbit details</a></div>
				<div class="col-md-3 col-md-offset-5"><a class="yellow" href="loginSuccess.php"><i class="fa fa-home fa-4x"></i>Back
						to The User Menu</a></div>
			<?php
		}
	?>


