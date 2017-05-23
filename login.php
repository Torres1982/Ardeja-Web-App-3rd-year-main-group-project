<?php
	session_start();

	require_once("include/db_connect.php");
	$db_link = db_connect("main_project");

	if (isset($_REQUEST['email2']) && isset($_REQUEST['password'])) {
		$reg_email = '/.+@[^@]+\.[^@]{2,}$/';
		$email2 = preg_match($reg_email, $_REQUEST['email2']) ? $_REQUEST['email2'] : "";
		$password = ($_REQUEST['password']) ? $_REQUEST['password'] : "";

		$connection = new mysqli('localhost', 'artur', 'Torres1982', 'main_project');

		$query = "SELECT user_id,name,password,gender FROM member WHERE email =?";

		$stmt = $connection->prepare($query);
		$stmt->bind_param('s', $email2);
		$stmt->execute();

		$stmt->bind_result($id, $name, $hashedPass, $gender);

		//--------------------- if password and email match then log in --------------------------------
		if ($stmt->fetch() && password_verify($password, $hashedPass)) {
			$_SESSION['valid_user'] = $name;
			$_SESSION['user_id'] = $id;
			$_SESSION['gender'] = $gender;
			header("Location: loginSuccess.php");
			exit();
		} else {
			display_login_page("Invalid login");
				}
	} else {
		display_login_page("Please login");
	}
?>

<?php

function display_login_page($message)
{
    $email2 = isset($_REQUEST['email2']) ? $_REQUEST['email2'] : '';
    $password = isset($_REQUEST['password']) ? $_REQUEST['password'] : '';
?>

    <!DOCUMENT html>
    <html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title> Login Page </title>
        <script src="js/jquery.js"></script>
        <style>
            @import "css/jquery-bootstrap.css";
            @import "css/bootstrap.min.css";
            @import "css/navigation.css";
            @import "css/image_slider.css";
            @import "css/main.css";
            @import "css/footer.css";
            @import "css/timetable.css";
            @import "css/login.css";
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

    <div class="row" id="loginPanel">
        <div class="col-md-8 col-md-offset-2 ">

            <?php
				if ($message) {
					echo "<div class='row'><div class='col-md-12 text-center'><div class='alert alert-danger' role='alert'><p class='error'>$message</p></div></div></div>";
				}
            ?>

            <div class="jumbotron">
                <form role="form" method="POST">
                    <div class="row">
                        <div class="form-group col-md-4 col-md-offset-4">
                            <label class="darkFont" for="email2">Email</label>
                            <input type="text" name="email2" class="form-control" id="email2" placeholder="email" size="30" value="<?php echo $email2 ?>">
                        </div>
                        <div class="form-group col-md-4 col-md-offset-4">
                            <label class="darkFont" for="password">Password</label>
                            <input type="password" name="password" class="form-control" id="password"
                                   placeholder="Password" size="20" value="<?php echo $password ?>">
                        </div>
                        <div class="form-group col-md-4 col-md-offset-4">
                            <button type="login" name="login" class="btn btn-primary">Login</button>
                        </div>
                    </div>
                </form>
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

<?php
}
?>




