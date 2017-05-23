<!DOCUMENT html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Administrator Page</title>
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

<!------------------------ Load Navigation Bar and Current Page -------------------------->
<!---------------------------------------------------------------------------------------->
<?php
	require_once('include/current_page.php');
	//set the current page
	$login_current = 'class = "active"';
	require_once("include/navigation_part.php");
?>

<div class="row" id="formField">
    <div class="col-md-12">
        <div class="col-md-10 col-md-offset-1">
            <form action="display_members.php" method="post">
                <input type="submit" value="Display Members" class="button">
            </form>
        </div>
        <div class="col-md-10 col-md-offset-1">
            <form action="display_payments.php" method="post">
                <input type="submit" value="Display Payments" class="button">
            </form>
        </div>
        <div class="col-md-10 col-md-offset-1">
            <form action="display_fitbit_users.php" method="post">
                <input type="submit" value="Display Fitbit Users" class="button">
            </form>
        </div>
        <div class="col-md-10 col-md-offset-1">
            <form action="display_users_activity.php" method="post">
                <input type="submit" value="Display Users Activity" class="button">
            </form>
        </div>
        <div class="col-md-10 col-md-offset-1">
            <form action="edit_delete_member.php" method="post">
                <input type="submit" value="Edit and Delete Member" class="button">
            </form>
        </div>
        <div class="col-md-3 col-md-offset-5"><a class="yellow" href="loginSuccess.php"><i class="fa fa-home fa-4x"></i>Back
                to The User Menu</a></div>
        <script src="js/jquery.js"></script>
        <script src="js/bootstrap.min.js"></script>
    </div>
</div>

<?php
	require_once("include/footer_part.php");
?>

</body>
</html>







