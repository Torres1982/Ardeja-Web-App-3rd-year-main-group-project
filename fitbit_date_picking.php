<?php
	session_start();

	if (isset($_REQUEST['date'])) {
		display_fitbit_page();
	}
	else {
		display_pick_date_page();
	}

	function display_pick_date_page()
	{
?>
    <!DOCUMENT html>
    <html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title> Fitbit Date Picking </title>
        <style>
            @import "css/jquery-bootstrap.css";
            @import "css/bootstrap.min.css";
            @import "css/navigation.css";
            @import "css/image_slider.css";
            @import "css/main.css";
            @import "css/footer.css";
            @import "css/forms.css";
            @import "css/login.css";
            @import "css/fitbit_date.css";
        </style>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
    </head>
    <body>

    <?php
    	//------------------------ Load Navigation Bar and Current Page --------------------------
		//----------------------------------------------------------------------------------------
		require_once('include/current_page.php');
		$login_current = 'class = "active"';
		require_once("include/navigation_part.php");

		$self = $_SERVER['PHP_SELF'];
		$date = isset($_REQUEST['date']) ? $_REQUEST['date'] : '';
    ?>

    <div class="row" id="formField">
        <div class="col-md-8 col-md-offset-2">
            <div class="jumbotron">
                <form role="form" method="POST" action="<?php echo $self ?>">
                    <div class="row">
                        <div class="form-group col-md-6 col-md-offset-3">
                            <label class="darkFont" for="date">Please enter the date you want to store data for
                                !!!</label>
                            <input type="text" name="date" class="form-control" id="date" placeholder="YYYY-MM-DD"
                                   size="30" value="<?php echo $date ?>" required>
                        </div>
                        <div class="form-group col-md-6 col-md-offset-3">
                            <button type="submit" name="submit" id="submit" class="btn btn-warning">Submit</button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-md-4 col-md-offset-5"><a class="yellow" href="loginSuccess.php"><i
                        class="fa fa-home fa-4x"></i>Back to The User Menu</a></div>
            <script src="js/jquery.js"></script>
            <script src="js/bootstrap.min.js"></script>
        </div>
    </div>

    <?php
		$date = isset($_REQUEST['date']) ? $_REQUEST['date'] : '';
		$_SESSION['fitbit_date'] = $date;
		require_once("include/footer_part.php");
    ?>

    </body>
    </html>

<?php
}
	function display_fitbit_page()
	{
		session_start();

		$user_id = $_SESSION['fitbit_user_id'];
		$date = isset($_REQUEST['date']) ? $_REQUEST['date'] : '';
		$_SESSION['fitbit_date'] = $date;

		//setting user Fitbit id
		define('CONSUMER_KEY', $user_id);
		//setting callback url
		define('CALLBACK_URL', 'http://localhost/ArdejaProject/callback.php');
		//setting authentication link with Fitbit through Oauth2
		define('AUTH_URL', 'https://www.fitbit.com/oauth2/authorize');

		//setting values to array
		$params = array(
			'client_id' => CONSUMER_KEY,
			'redirect_uri' => CALLBACK_URL,
			'scope' => 'heartrate',
			'response_type' => 'code',
		);

		//redirecting to Fitbit page and making query by passing array with all our details
		header("Location: " . AUTH_URL . '?' . http_build_query($params));
	}
?>




