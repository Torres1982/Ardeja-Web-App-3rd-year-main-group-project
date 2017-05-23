<!DOCUMENT html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Beginner Level </title>
    <style>
        @import "css/jquery-bootstrap.css";
        @import "css/bootstrap.min.css";
        @import "css/navigation.css";
        @import "css/image_slider.css";
        @import "css/main.css";
        @import "css/footer.css";
        @import "css/forms.css";
    </style>
</head>
<body>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
<script src="js/jquery.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/forms.js"></script>

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
			$id = $_SESSION['user_id'];
			$gender = $_SESSION['gender'];
        ?>

        <div class="col-md-4 col-md-offset-5">
            <input type="hidden" value="<?php echo $gender ?>" id="gender">
            <label class="radio-inline">
                <input type="radio" name="level" id="beginner" value="beginner" checked="select">Beginner
            </label>
            <label class="radio-inline">
                <input type="radio" name="level" id="inter" value="inter">Intermediate
            </label>
            <label class="radio-inline">
                <input type="radio" name="level" id="advanced" value="advanced">Advanced
            </label>
        </div>
        <div class="col-md-3 col-md-offset-5">
            <label class="radio-inline">
                <input type="radio" name="type" id="cardio" value="cardio" checked="select">Cardio
            </label>
            <label class="radio-inline">
                <input type="radio" name="type" id="spin" value="spin">Express Spin
            </label>
        </div>
        <div class="col-md-2 col-md-offset-5">
            <br>
            <input type="submit" class="btn btn-inverse " value="Form" id="buttonForm"></input>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-3 col-md-offset-5"><a class="yellow" href="loginSuccess.php"><i class="fa fa-home fa-4x"></i>Back
            to The User Menu</a></div>
</div>

<?php
	require_once("include/footer_part.php");
?>

</body>
</html>