<?php
	session_start();

	$name = isset($_REQUEST['name']) ? $_REQUEST['name'] : '';
	$cardType = isset($_REQUEST['cardType']) ? $_REQUEST['cardType'] : '';
	$cardNumber = isset($_REQUEST['cardNumber']) ? $_REQUEST['cardNumber'] : '';
	$cardCvv = isset($_REQUEST['cardCvv']) ? $_REQUEST['cardCvv'] : '';
	$expiryMonth = isset($_REQUEST['expiryMonth']) ? $_REQUEST['expiryMonth'] : '';
	$expiryYear = isset($_REQUEST['expiryYear']) ? $_REQUEST['expiryYear'] : '';

	if (isset($_REQUEST['payment'])) {
		echo "<script type='text/javascript'>alert('Payment has been successfully made!')</script>";

		$name = isset($_REQUEST['name']) ? $_REQUEST['name'] : '';
		$cardType = isset($_REQUEST['cardType']) ? $_REQUEST['cardType'] : '';
		$cardNumber = isset($_REQUEST['cardNumber']) ? $_REQUEST['cardNumber'] : '';
		$cardCvv = isset($_REQUEST['cardCvv']) ? $_REQUEST['cardCvv'] : '';
		$expiryMonth = isset($_REQUEST['expiryMonth']) ? $_REQUEST['expiryMonth'] : '';
		$expiryYear = isset($_REQUEST['expiryYear']) ? $_REQUEST['expiryYear'] : '';
		$useId = $_SESSION['user_id'];

		$key = 'pass';
		$card= $cardNumber;

		$iv = mcrypt_create_iv(mcrypt_get_iv_size(MCRYPT_RIJNDAEL_128, MCRYPT_MODE_CBC), MCRYPT_DEV_URANDOM);
		$encrypted = base64_encode($iv . mcrypt_encrypt(MCRYPT_RIJNDAEL_128, hash('sha256', $key, true), $card, MCRYPT_MODE_CBC, $iv));

		$connection = mysqli_connect("localhost", "artur", "Torres1982", "main_project");

		if (mysqli_connect_errno()) {
			echo mysqli_connect_errno();
			exit();
		}

		$query = "INSERT INTO payment(user_id, name, card_type, card_number, expiry_month, expiry_year, card_cvv)
					VALUES (?,?,?,?,?,?,?)";

		$stmt = mysqli_prepare($connection, $query);

		if ($stmt) {
			mysqli_stmt_bind_param($stmt, "issssss", $useId, $name, $cardType, $encrypted, $expiryMonth, $expiryYear, $cardCvv);
			mysqli_stmt_execute($stmt);
			mysqli_stmt_fetch($stmt);
		} else {
			echo "Error creating statement object";
		}
	}
?>

<!DOCUMENT html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Payment Page </title>
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

<!------------------------ Load Navigation Bar and Current Page -------------------------->
<!---------------------------------------------------------------------------------------->
<?php
	require_once('include/current_page.php');
	$login_current = 'class = "active"';
	require_once("include/navigation_part.php");
?>

<div class="container" id="paymentForm">
    <form action="payment.php" method="POST" class="form-horizontal" role="form">
        <fieldset>
            <legend>Payment</legend>
            <div class="form-group">
                <label class="col-sm-3 control-label" for="name">Name on Card</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" name="name" id="name" placeholder="Card Holder's Name"
                           value="<?php echo $name ?>">
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-3 control-label" for="cardType">Card Type</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" name="cardType" id="cardType"
                           placeholder="Debit/Credit Card Type" value="<?php echo $cardType ?>">
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-3 control-label" for="cardNumber">Card Number</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" name="cardNumber" id="cardNumber"
                           placeholder="Debit/Credit Card Number" value="<?php echo $cardNumber ?>">
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-3 control-label" for="expiry-month">Expiry Date</label>
                <div class="col-sm-9">
                    <div class="row">
                        <div class="col-xs-3">
                            <select class="form-control col-sm-2" name="expiryMonth" id="expiryMonth">
                                <option>Month</option>
                                <option value="January">Jan (01)</option>
                                <option value="February">Feb (02)</option>
                                <option value="March">Mar (03)</option>
                                <option value="April">Apr (04)</option>
                                <option value="May">May (05)</option>
                                <option value="June">June (06)</option>
                                <option value="July">July (07)</option>
                                <option value="August">Aug (08)</option>
                                <option value="September">Sep (09)</option>
                                <option value="October">Oct (10)</option>
                                <option value="November">Nov (11)</option>
                                <option value="December">Dec (12)</option>
                            </select>
                        </div>
                        <div class="col-xs-3">
                            <select class="form-control" name="expiryYear">
                                <option value="2016">2016</option>
                                <option value="2017">2017</option>
                                <option value="2018">2018</option>
                                <option value="2019">2019</option>
                                <option value="2020">2020</option>
                                <option value="2021">2021</option>
                                <option value="2022">2022</option>
                                <option value="2023">2023</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-3 control-label" for="cardCvv">Card CVV</label>
                <div class="col-sm-3">
                    <input type="text" class="form-control" name="cardCvv" id="cardCvv" placeholder="Security Code"
                           value="<?php echo $cardCvv ?>">
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-offset-3 col-sm-9">
                    <input type="submit" value="Pay Now" name="payment" id="payment" class="btn btn-danger">
                </div>
            </div>
        </fieldset>
    </form>
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