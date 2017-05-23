<!DOCUMENT html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Delete Members </title>
    <script src="js/jquery.js"></script>
    <style>
        @import "css/styleMemberPage.css";
        @import "css/jquery-bootstrap.css";
        @import "css/bootstrap.min.css";
        @import "css/navigation.css";
        @import "css/image_slider.css";
        @import "css/main.css";
        @import "css/footer.css";
        @import "css/table.css";
    </style>
</head>
<body>

<!------------------------ Load Navigation Bar and Current Page -------------------------->
<!---------------------------------------------------------------------------------------->
<?php
	require_once('include/current_page.php');
	//set the current page
	$login_current = 'class = "active"';
	require_once("include/navigation_part.php");
?>

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
<script src="js/jquery.js"></script>
<script src="js/bootstrap.min.js"></script>
<div class="container" id="progressTable">
    <div class="row">
        <div class="col-md-12">
            <div class="container" id="thanksSubmit">
                <div class="row" id="formField">
                    <div class="col-md-8 col-md-offset-2">
                        <div class="jumbotron">
                            <h3>Member was successfully removed !!!</h3>
                        </div>
                    </div>
                </div>
                <br>
                <br>
                <br>
                <div class="col-md-4 col-md-offset-5"><a class="yellow" href="loginSuccess.php"><i
                            class="fa fa-home fa-4x"></i>Back to The User Menu</a>
                </div>
            </div>
        </div>
    </div>

    <?php
    	require_once("include/footer_part.php");
    ?>

</body>
</html>