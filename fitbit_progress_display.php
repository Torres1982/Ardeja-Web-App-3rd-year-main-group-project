<!DOCUMENT html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title> Fitbit Progress Display </title>
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
            @import "css/fitbit_progress_display.css";
            @import "css/table.css";
        </style>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
    </head>
<body>

<?php
	session_start();
	$id = $_SESSION['user_id'];

	//------------------------ Load Navigation Bar and Current Page --------------------------
	//----------------------------------------------------------------------------------------
	require_once('include/current_page.php');
	$login_current = 'class = "active"';
	require_once("include/navigation_part.php");

	echo '<div class="row"><div class="col-md-9 col-md-offset-1">	<br><br><br><br> <table class="table"><thead><tr>';
	echo '<th> Date </th>';
	echo '<th> Heart beat rate </th><th> Zone1 minutes </th><th> Zone2 minutes </th><th> Zone3 minutes </th>';
	echo '<th> Zone4 minutes </th><th>Total calories burnt </th></tr> </thead><tbody>';

	$conn = mysqli_connect('localhost', 'artur', 'Torres1982', 'main_project');

	if (mysqli_connect_error()) {
		echo "Error" . mysqli_connect_error();
	}

	$sql = "SELECT id, user_id, date, heart_beat_rate, zone1_minutes, zone2_minutes, zone3_minutes, zone4_minutes, total_calories_burnt FROM fitbit_tracker WHERE user_id =$id";
	$result = mysqli_query($conn, $sql);

		if (mysqli_num_rows($result) > 0) {
			while ($row = mysqli_fetch_array($result)) {
				echo " <tr><td  class='yellow'> " . $row["date"] . " </td><td  class='yellow'> " . $row["heart_beat_rate"] . " </td><td class='yellow'> " . $row["zone1_minutes"] . " </td><td class='yellow'> " . $row["zone2_minutes"] . " </td><td class='yellow'> " . $row["zone3_minutes"] . " </td><td class='yellow'> " . $row["zone4_minutes"] . "</td><td class='yellow'> " . $row["total_calories_burnt"] . " </tr> ";
			}
		}
	mysqli_close($conn);
?>

</tbody>
</table>
</div>
</div>

<div class="row" id="formField">
    <div class="col-md-8 col-md-offset-2">
        <div class="col-md-4 col-md-offset-5"><a class="yellow" href="loginSuccess.php"><i class="fa fa-home fa-4x"></i>Back
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