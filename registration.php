<?php
	require_once("include/db_connect.php");
	$db_link = db_connect("main_project");

	if (isset($_REQUEST['submit'])) {
		$error = validate_form();
		if ($error) {
			display_form_page($error);
		} else {
			display_member_page();
		}
	} else {
		display_form_page("");
	}
?>

<?php
	function validate_form()
	{
		$name = trim($_REQUEST['name']);
		$surname = trim($_REQUEST['surname']);
		$email2 = trim($_REQUEST['email2']);
		$gender = trim($_REQUEST['gender']);
		$dob = trim($_REQUEST['dob']);
		$password = trim($_REQUEST['password']);
		$repassword = trim($_REQUEST['repassword']);
		$fitbit_id = trim($_REQUEST['fitbit_id']);
		$fitbit_secret = trim($_REQUEST['fitbit_secret']);
		$error = '';
		$reg_exp = '/^[a-zA-Z\-\']+$/';
		$regEmail = '/.+@[^@]+\.[^@]{2,}$/';

		$queryCheck = "SELECT * FROM member WHERE name='$email2'";
		$resultDisplay = mysql_query($queryCheck);
		$numrows = mysql_num_rows($resultDisplay);

		if ($numrows > 0) {
			$error .= "Sorry this Email is already in use <br>";
		}
		if (!preg_match($reg_exp, $name)) {
			$error .= "Please complete the name correctly<br>";
		}
		if ($password != $repassword) {
			$error .= "Passwords must match<br>";
		}
		if (!preg_match($reg_exp, $surname)) {
			$error .= "Please complete the surname correctly<br>";
		}
		if (!preg_match($regEmail, $email2)) {
			$error .= "Please complete the email correctly<br>";
		}
		return $error;
	}
?>

<?php
	function display_form_page($error)
	{
		$self = $_SERVER['PHP_SELF'];
		$name = isset($_REQUEST['name']) ? $_REQUEST['name'] : '';
		$surname = isset($_REQUEST['surname']) ? $_REQUEST['surname'] : '';
		$gender = isset($_REQUEST['gender']) ? $_REQUEST['gender'] : '';
		$dob = isset($_REQUEST['dob']) ? $_REQUEST['dob'] : '';
		$password = isset($_REQUEST['password']) ? $_REQUEST['password'] : '';
		$repassword = isset($_REQUEST['repassword']) ? $_REQUEST['repassword'] : '';
		$email2 = isset($_REQUEST['email2']) ? $_REQUEST['email2'] : '';
		$phone = isset($_REQUEST['phone']) ? $_REQUEST['phone'] : '';
		$fitbit_id = isset($_REQUEST['fitbit_id']) ? $_REQUEST['fitbit_id'] : '';
		$fitbit_secret = isset($_REQUEST['fitbit_secret']) ? $_REQUEST['fitbit_secret'] : '';
?>

    <!DOCUMENT html>
    <html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title> Registration Page </title>
        <script src="js/jquery.js"></script>
        <style>
            @import "css/jquery-bootstrap.css";
            @import "css/bootstrap.min.css";
            @import "css/navigation.css";
            @import "css/image_slider.css";
            @import "css/main.css";
            @import "css/footer.css";
            @import "css/registration.css";
        </style>
    </head>
    <body>

    <?php
		require_once('include/current_page.php');
		//set the current page
		$registration_current = 'class = "active"';
		require_once("include/navigation_part.php");
    ?>

    <div class="row" id="regForm">

        <?php
			if ($error) {
				echo "<div class='row'><div class='col-md-4 col-md-offset-4 text-center'><div class='alert alert-danger' role='alert'><p class='error'>$error</p></div></div></div>";
			}
        ?>

        <div class="col-md-12">
            <form role="form" method="POST" action="<?php echo $self ?>">
                <div class="row">
                    <div class="form-group col-md-4 col-md-offset-4">
                        <label for="name">Name</label><span class="mandatory"> * </span>
                        <input type="text" name="name" class="form-control" placeholder="Name" size="10" id="name"
                               value="<?php echo $name ?>">
                    </div>
                    <div class="form-group col-md-4 col-md-offset-4">
                        <label for="surname">Surname</label><span class="mandatory"> * </span>
                        <input type="text" name="surname" class="form-control" placeholder="Surname" size="10"
                               id="surname" value="<?php echo $surname ?>">
                    </div>
                    <div class="form-group col-md-4 col-md-offset-4">
                        <label for="gender">Gender</label><span class="mandatory"> * </span>
                        <input type="text" name="gender" class="form-control" placeholder="Gender" size="10" id="gender"
                               value="<?php echo $gender ?>">
                    </div>
                    <div class="form-group col-md-4 col-md-offset-4">
                        <label for="dob">Date of Birth</label><span class="mandatory"> * </span>
                        <input type="text" name="dob" class="form-control" placeholder="Date of Birth" size="10"
                               id="dob" value="<?php echo $dob ?>">
                    </div>
                    <div class="form-group col-md-4 col-md-offset-4">
                        <label for="password">Password</label><span class="mandatory"> * </span>
                        <input type="password" name="password" class="form-control" placeholder="Password" size="10"
                               id="password" value="<?php echo $password ?>">
                    </div>
                    <div class="form-group col-md-4 col-md-offset-4">
                        <label for="repassword">Re-enter Password</label><span class="mandatory"> * </span>
                        <input type="password" name="repassword" class="form-control" placeholder="Re-enter Password"
                               size="10" id="repassword" value="<?php echo $repassword ?>">
                    </div>
                    <div class="form-group col-md-4 col-md-offset-4">
                        <label for="email">Email Address</label><span class="mandatory"> * </span>
                        <input type="email" name="email2" class="form-control" placeholder="Email Address" size="20"
                               id="email2" value="<?php echo $email2 ?>">
                    </div>
                    <div class="form-group col-md-4 col-md-offset-4">
                        <label for="fitbit_id">Fitbit Id</label>
                        <input type="text" name="fitbit_id" class="form-control" placeholder="FitBit Id" size="15"
                               id="fitbit_id" value="<?php echo $fitbit_id ?>">
                    </div>
                    <div class="form-group col-md-4 col-md-offset-4">
                        <label for="fitbit_secret">Fitbit Secret</label>
                        <input type="text" name="fitbit_secret" class="form-control" placeholder="FitBit Secret"
                               size="15" id="fitbit_secret" value="<?php echo $fitbit_secret ?>">
                    </div>
                    <div class="form-group col-md-4 col-md-offset-4">
                        <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                        <button type="reset" name="reset" class="btn btn-danger">Reset</button>
                    </div>
                    <div class="form-group col-md-4 col-md-offset-4">
                        <span class="mondatory"> * Mandatory Fields </span>
                    </div>
                </div>
            </form>
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

<?php
	function display_member_page()
	{
		$name = isset($_REQUEST['name']) ? $_REQUEST['name'] : '';
		$surname = isset($_REQUEST['surname']) ? $_REQUEST['surname'] : '';
		$gender = isset($_REQUEST['gender']) ? $_REQUEST['gender'] : '';
		$dob = isset($_REQUEST['dob']) ? $_REQUEST['dob'] : '';
		$password = isset($_REQUEST['password']) ? $_REQUEST['password'] : '';
		$repassword = isset($_REQUEST['repassword']) ? $_REQUEST['repassword'] : '';
		$email2 = isset($_REQUEST['email2']) ? $_REQUEST['email2'] : '';
		$fitbit_id = isset($_REQUEST['fitbit_id']) ? $_REQUEST['fitbit_id'] : '';
		$fitbit_secret = isset($_REQUEST['fitbit_secret']) ? $_REQUEST['fitbit_secret'] : '';

		$connection = mysqli_connect("localhost", "artur", "Torres1982", "main_project");

		if (mysqli_connect_errno()) {
			echo mysqli_connect_errno();
			exit();
		}
		$query = "INSERT INTO member(name, surname, password, dob, email, gender, fitbit_id, fitbit_secret)
			VALUES (?,?,?,?,?,?,?,?)";

		$stmt = mysqli_prepare($connection, $query);

		if ($stmt) {
			//hashing the password
			$passwordHash = password_hash($password, PASSWORD_BCRYPT);
			mysqli_stmt_bind_param($stmt, "ssssssss", $name, $surname, $passwordHash, $dob, $email2, $gender, $fitbit_id, $fitbit_secret);
			mysqli_stmt_execute($stmt);
			mysqli_stmt_fetch($stmt);
		} else {
			echo "Error creating statement object";
		}
?>

    <!DOCUMENT html>
    <html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title> Member Page </title>
        <script src="js/jquery.js"></script>
        <style>
            @import "css/styleMemberPage.css";
            @import "css/jquery-bootstrap.css";
            @import "css/bootstrap.min.css";
            @import "css/navigation.css";
            @import "css/image_slider.css";
            @import "css/main.css";
            @import "css/footer.css";
        </style>
    </head>
    <body>

	<!------------------------ Load Navigation Bar and Current Page -------------------------->
	<!---------------------------------------------------------------------------------------->
    <?php
		require_once('include/current_page.php');
		//set the current page
		$registration_current = 'class = "active"';
		require_once("include/navigation_part.php");
    ?>

    <div class="row" id="fix_error_margin">
        <div class='col-md-12 text-center'>
            <div class="alert alert-success" role="alert"><a href="#" class="alert-link">
                    <?php
                    echo " Thank you " . $name . "  " . $surname . ". Your entry has been saved.";
                    ?>
                </a>
            </div>
        </div>
        <?php
        require_once("include/footer_part.php");
        ?>
        <script src="js/jquery.js"></script>
        <script src="js/bootstrap.min.js"></script>
    </body>
    </html>

<?php
}
?>








