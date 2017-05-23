<?php
	//initiate the session
	session_start();

	//creating local variables and setting value to them from session variables
	$user_login_id = $_SESSION['user_id'];
	$user_id = $_SESSION['fitbit_user_id'];
	$user_secret = $_SESSION['fitbit_user_secret'];
	$date_picked = $_SESSION['fitbit_date'];

	//setting user id
	define('CONSUMER_KEY', $user_id);
	//setting user Fitbit secret
	define('CONSUMER_SECRET', $user_secret);
	//setting call back url
	define('CALLBACK_URL', 'http://localhost/ArdejaProject/callback.php');
	//setting oAuth2 authentication link for token
	define('TOKEN_URL', 'https://api.fitbit.com/oauth2/token');

	//passing our details for authentication
	$params = array(
		'client_id' => CONSUMER_KEY,
		'grant_type' => 'authorization_code',
		'redirect_uri' => CALLBACK_URL,
		'code' => $_GET['code'],
	);

	//encoding Fitbit key and secret
	$header = [
		'Authorization: Basic ' . base64_encode(CONSUMER_KEY . ':' . CONSUMER_SECRET),
		'Content-Type: application/x-www-form-urlencoded',
	];

	//passing details through array
	$options = array(
		'http' => array(
			'method' => 'POST',
			'header' => implode(PHP_EOL, $header),
			'content' => http_build_query($params),
			'ignore_errors' => true
		)
	);

	//receiving token from fitbit
	$context = stream_context_create($options);
	$res = file_get_contents(TOKEN_URL, false, $context);
	$token = json_decode($res, true);

	//if no token found - display error
	if (isset($token['error'])) {
		echo 'token error';
		exit;
	}

	//assigning token to variable from received session array
	$access_token = $token['access_token'];
	$user_id = $token['user_id'];

	//setting token to session
	$params = array('access_token' => $access_token);

	//setting json callBack,providing user id and date that user picked
	$api_url = 'https://api.fitbit.com/1/user/' . $user_id . '/activities/heart/date/' . $date_picked . '/1d.json';

	//connecting to the stream
	$header = 'Authorization: Bearer ' . $access_token;
	$options = array(
		'http' => array(
			'method' => 'GET',
			'header' => $header,
			'ignore_errors' => true
		)
	);

	$context = stream_context_create($options);

	//receiving array back of heart rate Data
	$res = file_get_contents($api_url, false, $context);
	$heartrate = json_decode($res, true);

	//retriving the data from received array
	$activeHeart = $heartrate['activities-heart'];
	$dateTime = $activeHeart[0];
	$dateTimePrint = $dateTime['dateTime'];

	$value = $dateTime['value'];

	$customHeartRateZone = $value['customHeartRateZones'];

	print_r(debug_backtrace());

	if (empty($value["restingHeartRate"])) {
		display_fitbit_storingDataNull();
		exit();
	} else {
		$restingHeartRate = $value["restingHeartRate"];
		$_SESSION["restingHeartRate"] = $restingHeartRate;
		$heartRateZone = $value["heartRateZones"];

		$heartRateZone1Print = $heartRateZone[0];
		print_r($heartRateZone1Print);
		$minutesZone1 = $heartRateZone1Print['minutes'];
		$_SESSION["minutesZone1"] = $minutesZone1;
		$caloriesZone1 = $heartRateZone1Print['caloriesOut'];

		$heartRateZone2Print = $heartRateZone[1];
		$minutesZone2 = $heartRateZone2Print['minutes'];
		$_SESSION["minutesZone2"] = $minutesZone2;
		$caloriesZone2 = $heartRateZone2Print['caloriesOut'];

		$heartRateZone3Print = $heartRateZone[2];
		$minutesZone3 = $heartRateZone3Print['minutes'];
		$_SESSION["minutesZone3"] = $minutesZone3;
		$caloriesZone3 = $heartRateZone3Print['caloriesOut'];

		$heartRateZone4Print = $heartRateZone[3];
		$minutesZone4 = $heartRateZone4Print['minutes'];
		$_SESSION["minutesZone4"] = $minutesZone4;
		$caloriesZone4 = $heartRateZone4Print['caloriesOut'];

		$totalCalories = ($caloriesZone1 + $caloriesZone2 + $caloriesZone3 + $caloriesZone4) / 4;
		$_SESSION["totalCalories"] = $totalCalories;

		$user_login_id = $_SESSION['user_id'];
		$date_picked = $_SESSION['fitbit_date'];

		$connection = new mysqli('localhost', 'root', '', 'mainproject');
		$query = "SELECT id FROM fitbit_tracker WHERE date =? AND user_id=?";
		$stmt = $connection->prepare($query);
		$stmt->bind_param('si', $date_picked, $user_login_id);
		$stmt->execute();
		$stmt->bind_result($id);

		//--------------- if there is no data stored for this date then store it ----------------
		if ($stmt->fetch()) {
			display_fitbit_storingDataPageUnsucess();
			exit();

		}
		//--------------- check if there is data stored for this date (just give notice)
		else {
			display_fitbit_storingDataPageSuccess();
			exit();
		}
	}

	function display_fitbit_storingDataPageSuccess()
	{
?>
    <!DOCUMENT html>
    <html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title> Call Back Success Page </title>
        <script src="js/jquery.js"></script>
        <style>
            @import "css/styleMemberPage.css";
            @import "css/jquery-bootstrap.css";
            @import "css/bootstrap.min.css";
            @import "css/navigation.css";
            @import "css/image_slider.css";
            @import "css/main.css";
            @import "css/footer.css";
            @import "css/payment.css";
        </style>
    </head>
    <body>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">

   	<?php
   		//------------------------ Load Navigation Bar and Current Page --------------------------
		//----------------------------------------------------------------------------------------
		require_once('include/current_page.php');
		//set the current page
		$login_current = 'class = "active"';
		require_once("include/navigation_part.php");

		//connection to database
		require_once("include/db_connect.php");
		$db_link = db_connect("main_project");

		$user_login_id = $_SESSION['user_id'];
		$date_picked = $_SESSION['fitbit_date'];
		$restingHeartRate = $_SESSION['restingHeartRate'];
		$minutesZone1 = $_SESSION["minutesZone1"];
		$minutesZone2 = $_SESSION["minutesZone2"];
		$minutesZone3 = $_SESSION["minutesZone3"];
		$minutesZone4 = $_SESSION["minutesZone4"];
		$totalCalories = $_SESSION["totalCalories"];

		$query = "INSERT INTO fitbit_tracker(id, user_id, date, heart_beat_rate, zone1_minutes, zone2_minutes, zone3_minutes, zone4_minutes, total_calories_burnt)VALUES ('', '$user_login_id','$date_picked', '$restingHeartRate', '$minutesZone1', '$minutesZone2', '$minutesZone3', '$minutesZone4', '$totalCalories')";

		$result = mysql_query($query) or die(mysql_error());
    ?>

    <div class="container" id="thanksSubmit">
        <div class="row" id="formField">
            <div class="col-md-8 col-md-offset-2">
                <div class="jumbotron">
                    <h3>Your data for <?php echo $date_picked; ?> has been successfully stored !!!</h3>
                </div>
            </div>
        </div>
        <br>
        <br>
        <br>
        <div class="col-md-3 col-md-offset-5"><a class="yellow" href="loginSuccess.php"><i class="fa fa-home fa-4x"></i>Back
                to The User Menu</a></div>
    </div>

    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>

    <?php
    	require_once("include/footer_part.php");
    ?>

    </body>
    </html>

    <?php
	}
		function display_fitbit_storingDataPageUnsucess()
	{
    ?>

    <!DOCUMENT html>
    <html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title> Call Back Unsuccess Page </title>
        <script src="js/jquery.js"></script>
        <style>
            @import "css/styleMemberPage.css";
            @import "css/jquery-bootstrap.css";
            @import "css/bootstrap.min.css";
            @import "css/navigation.css";
            @import "css/image_slider.css";
            @import "css/main.css";
            @import "css/footer.css";
            @import "css/payment.css";
        </style>
    </head>
    <body>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">

    <?php
    	<!------------------------ Load Navigation Bar and Current Page -------------------------->
		<!---------------------------------------------------------------------------------------->
		require_once('include/current_page.php');
		//set the current page
		$login_current = 'class = "active"';
		require_once("include/navigation_part.php");

		$date_picked = $_SESSION['fitbit_date'];
    ?>

    <div class="container" id="thanksSubmit">
        <div class="row" id="formField">
            <div class="col-md-8 col-md-offset-2">
                <div class="jumbotron">
                    <h3>The data for <?php echo $date_picked; ?> already exist !!!</h3>
                </div>
            </div>
        </div>
        <br>
        <br>
        <br>
        <div class="col-md-3 col-md-offset-5"><a class="yellow" href="loginSuccess.php"><i class="fa fa-home fa-4x"></i>Back
                to The User Menu</a></div>
    </div>

    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>

    <?php
    	require_once("include/footer_part.php");
    ?>

    </body>
    </html>

    <?php
	}
		function display_fitbit_storingDataNull()
	{
    ?>

    <!DOCUMENT html>
    <html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title> Call Back Null Data Page </title>
        <script src="js/jquery.js"></script>
        <style>
            @import "css/styleMemberPage.css";
            @import "css/jquery-bootstrap.css";
            @import "css/bootstrap.min.css";
            @import "css/navigation.css";
            @import "css/image_slider.css";
            @import "css/main.css";
            @import "css/footer.css";
            @import "css/payment.css";
        </style>
    </head>
    <body>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">

    <?php
		require_once('include/current_page.php');
		//set the current page
		$login_current = 'class = "active"';
		require_once("include/navigation_part.php");
		$date_picked = $_SESSION['fitbit_date'];
    ?>

    <div class="container" id="thanksSubmit">
        <div class="row" id="formField">
            <div class="col-md-8 col-md-offset-2">
                <div class="jumbotron">
                    <h3>There is no any activity for <?php echo $date_picked; ?> !!!</h3>
                </div>
            </div>
        </div>
        <br>
        <br>
        <br>
        <div class="col-md-3 col-md-offset-5"><a class="yellow" href="loginSuccess.php"><i class="fa fa-home fa-4x"></i>Back
                to The User Menu</a></div>
    </div>

    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>

    <?php
    	require_once("include/footer_part.php");
    ?>

    </body>
    </html>

<?php
}
?>


