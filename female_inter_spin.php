<?php
	session_start();
	$id = $_SESSION['user_id'];

	$date = date("Y-m-d");
	$total = 0;
	$level = 'intermediate';
	$type = 'spin';

	//------------------ if button is pressed - check how many check boxes are checked ---------------------
	if (isset($_POST['submit'])) {
		if (isset($_POST['checkbox1'])) {
			$total++;
		}
		if (isset($_POST['checkbox2'])) {
			$total++;
		}
		if (isset($_POST['checkbox3'])) {
			$total++;
		}
		if (isset($_POST['checkbox4'])) {
			$total++;
		}
		if (isset($_POST['checkbox5'])) {
			$total++;
		}
		if (isset($_POST['checkbox6'])) {
			$total++;
		}
		if (isset($_POST['checkbox7'])) {
			$total++;
		}
		if ($total > 0) {
			$total = ($total * 100) / 7;
		}

		//------------------------- inserting into database ---------------------------
		$connection = mysqli_connect("localhost", "artur", "Torres1982", "main_project");

		if (mysqli_connect_errno()) {
			echo mysqli_connect_errno();
			exit();
		}

		$query = "INSERT INTO exercise_list(user_id, level, type, date, complete)
				VALUES (?,?,?,?,?)";

		$stmt = mysqli_prepare($connection, $query);

		if ($stmt) {
			mysqli_stmt_bind_param($stmt, "isssi", $id, $level, $type, $date, $total);
			mysqli_stmt_execute($stmt);
			mysqli_stmt_fetch($stmt);
		} else {
			echo "Error creating statement object";
		}

		header("Location: thanks_message.php");
		exit();
	}
?>

<!DOCUMENT html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Female Intermediate Level Spin </title>
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
        <div class="col-md-12">
            <form role="form" method="POST" action="female_inter_spin.php">
                <div class="row">
                    <div class="form-group col-md-4 col-md-offset-4">
                        <div class="checkbox">
                            <label><input type="checkbox" name="checkbox1" value="">Reverse Crunch [5 x 7]</label>
                        </div>
                    </div>
                    <div class="form-group col-md-4 col-md-offset-4">
                        <div class="checkbox">
                            <label><input type="checkbox" name="checkbox2" value="">Leg Pull-In [5 x 8]</label>
                        </div>
                    </div>
                    <div class="form-group col-md-4 col-md-offset-4">
                        <div class="checkbox">
                            <label><input type="checkbox" name="checkbox3" value="">Tread Mill [9 min</label>
                        </div>
                    </div>
                    <div class="form-group col-md-4 col-md-offset-4">
                        <div class="checkbox">
                            <label><input type="checkbox" name="checkbox4" value="">Spinning [10 min]</label>
                        </div>
                    </div>
                    <div class="form-group col-md-4 col-md-offset-4">
                        <div class="checkbox">
                            <label><input type="checkbox" name="checkbox5" value="">Rowing [5 min]</label>
                        </div>
                    </div>
                    <div class="form-group col-md-4 col-md-offset-4">
                        <div class="checkbox">
                            <label><input type="checkbox" name="checkbox6" value="">Cable Crossovers [3 x 8]</label>
                        </div>
                    </div>
                    <div class="form-group col-md-4 col-md-offset-4">
                        <div class="checkbox">
                            <label><input type="checkbox" name="checkbox7" value="">Shoulder Press [3 x 8]</label>
                        </div>
                    </div>
                    <div class="col-md-4 col-md-offset-4">
                        <br>
                        <input type="submit" class="btn btn-inverse" value="Form" name="submit" id="submit">
                    </div>
                </div>
            </form>
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



