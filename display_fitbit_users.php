<!DOCUMENT html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Display Fitbit Users </title>
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

<?php
	session_start();

	//------------------------ Load Navigation Bar and Current Page --------------------------
	//----------------------------------------------------------------------------------------
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
            <h2 class="yellow">Display Fitbit Users</h2>
                <table class="table">
                    <thead>
                        <tr>
                            <th> ID</th>
                            <th> User ID</th>
                            <th> Date</th>
                            <th> Heart Beat</th>
                            <th> Zone 1 [min]</th>
                            <th> Zone 2 [min]</th>
                            <th> Zone 3 [min]</th>
                            <th> Zone 4 [min]</th>
                            <th> Total Calories</th>
                        </tr>
                    </thead>
                <tbody>

                <?php
					$conn = mysqli_connect('localhost', 'artur', 'Torres1982', 'main_project');
					if (mysqli_connect_error()) {
						echo "Error" . mysqli_connect_error();
					}

					$sql = "SELECT id, user_id, date, heart_beat_rate, zone1_minutes, zone2_minutes, zone3_minutes, zone4_minutes, total_calories_burnt FROM fitbit_tracker";
					$result = mysqli_query($conn, $sql);

					if (mysqli_num_rows($result) > 0) {

						while ($row = mysqli_fetch_array($result)) {

						echo " <tr>
								<td  class='yellow'> " . $row["id"] . " </td>
								<td  class='yellow'> " . $row["user_id"] . " </td>
								<td  class='yellow'> " . $row["date"] . " </td>
								<td class='yellow'> " . $row["heart_beat_rate"] . " </td>
								<td class='yellow'> " . $row["zone1_minutes"] . " </td>
								<td class='yellow'> " . $row["zone2_minutes"] . " </td>
								<td class='yellow'> " . $row["zone3_minutes"] . " </td>
								<td class='yellow'> " . $row["zone4_minutes"] . " </td>
								<td class='yellow'> " . $row["total_calories_burnt"] . " </td>
							</tr>";
						}
					}
					mysqli_close($conn);
                ?>

                </tbody>
            </table>
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