<?php
	session_start();
	$id = $_SESSION['user_id'];
	if (isset($_POST['button4'])) {
		header("Location: login.php");
		session_destroy();
		exit();
	}
	if (isset($_POST['button2'])) {
		header("Location: payment.php");
		exit();
	}
	if (isset($_POST['admin'])) {
		if ($id == 11) {
			header("Location: admin.php");
			exit();
		} else {
			echo "<script type='text/javascript'>alert('OOPPSS!!!!!!!!!! Sorry you dont have a permission to enter the admin page')</script>";
		}
	}
?>

<!DOCUMENT html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Member Page </title>
    <script src="js/jquery.js"></script>
    <script src="js/forms.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
    <style>
        @import "css/jquery-bootstrap.css";
        @import "css/bootstrap.min.css";
        @import "css/navigation.css";
        @import "css/image_slider.css";
        @import "css/main.css";
        @import "css/footer.css";
        @import "css/login.css";
    </style>
</head>
<body>

<?php
	$_SESSION['gender'];
	$_SESSION['user_id'];

	//------------------------ Load Navigation Bar and Current Page --------------------------
	//----------------------------------------------------------------------------------------
	require_once('include/current_page.php');
	//set the current page
	$login_current = 'class = "active"';
	require_once("include/navigation_part.php");
?>

<div class="row" id="loginAlert">
    <div class='col-md-12 text-center'>
        <div class="alert alert-success" role="alert"><a href="#" class="alert-link">

			<?php
				echo " Welcome " . $_SESSION['valid_user'] . ' your id is ' . $_SESSION['user_id'];
			?>

        </a>
        </div>
    </div>
    <div class="row" id="textColor">
        <div class="col-md-12">
            <div class="col-md-4 col-md-offset-4">
                <div class="embed-responsive embed-responsive-16by9">
                    <iframe class="embed-responsive-item" src="http://www.youtube.com/embed/Bi1IRzJIoAo"></iframe>
                </div>
            </div>
        </div>
        <div class="col-md-12" id="fix_butttons_padding">
            <div class="buttons">
                <!-------------------- Forms Button ----------------------->
                <!------------------------------------------------------------>
                <div class="letter col-md-4">
                    <form action="forms.php" method="get">
                        <input type="submit" value="Forms" class="button" id="button1">
                    </form>
                </div>

                <!------------------ Administrator Button --------------------->
                <!------------------------------------------------------------>
                <div class="letter col-md-4" id="fix_centre_indent1">
                    <form action="" method="post">
                        <input type="submit" value="Administrator" class="button" name="admin" id="admin">
                    </form>
                </div>
                <!-------------------- Fitbit Tracker Button ------------------------>
                <!------------------------------------------------------------->
                <div class="letter col-md-4" id="fix_indent_left1">
                    <form action="fitbit_synchronisation.php" method="post">
                        <input type="submit" class="button" id="button3" value="Fitbit Tracker">
                        </button>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-12">
            <div class="buttons">
                <!-------------------- PayFee Button ----------------------->
                <!------------------------------------------------------------>
                <div class="letter col-md-4">
                    <form action="loginSuccess.php" method="post">
                        <input type="submit" value="Pay Fees" class="button" name="button2" id="button2">
                    </form>
                </div>
                <!------------------ Process Check Button --------------------->
                <!------------------------------------------------------------>
                <div class="letter col-md-4">
                    <form action="displayProgress.php" method="post">
                        <input type="submit" value="Progress Check" class="button">
                    </form>
                </div>
                <!-------------------- Log out Button ------------------------>
                <!------------------------------------------------------------->
                <div class="letter col-md-4">
                    <form action="loginSuccess.php" method="post">
                        <input type="submit" value="Log Out" class="button" name="button4" id="button4">
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="js/jquery.js"></script>
<script src="js/bootstrap.min.js"></script>

<?php
	require_once("include/footer_part.php");
?>

</body>
</html>
