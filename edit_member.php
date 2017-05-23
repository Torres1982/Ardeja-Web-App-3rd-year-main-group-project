<?php
session_start();
if (isset($_REQUEST['edit'])) {

    $userId = $_SESSION['pickedId'];
    $name = $_POST['name'];
    $surname = $_POST['surname'];
    $password = $_POST['password2'];
    $email = $_POST['email2'];
    $dob = $_POST['dob'];
    $gender = $_POST['gender'];
    $fitbitId = $_POST['fitbitId'];
    $fitbitSecret = $_POST['fitbitSecret'];
    $passwordHash = password_hash($password, PASSWORD_BCRYPT);

    $connection = new mysqli('localhost', 'artur', 'Torres1982', 'main_project');
    $sql = "UPDATE member SET user_id=?, name=?, surname=?, password=?, dob=?, email=?, gender=?, fitbit_id=?, fitbit_secret=? WHERE user_id=?";

    $stmt = $connection->prepare($sql);

    $stmt->bind_param('issssssssi', $userId, $name, $surname, $passwordHash, $dob, $email, $gender, $fitbitId, $fitbitSecret, $userId);
    $stmt->execute();

    if ($stmt->errno) {
        echo "Something not entered correct!!! " . $stmt->error;
    } else echo "Updated {$stmt->affected_rows} rows";

    $stmt->close();

    header("Location: edit_success.php");
    exit();
}
?>

<!DOCUMENT html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Edit Member Details </title>
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

            <?php
            	$pickedId = $_SESSION['pickedId'];
            ?>
            <?php

            $conn = mysqli_connect('localhost', 'artur', 'Torres1982', 'main_project');
            if (mysqli_connect_error()) {
                echo "Error" . mysqli_connect_error();
            }

            $sql = "SELECT user_id, name, surname, password, dob, email, gender, fitbit_id, fitbit_secret FROM member WHERE user_id = $pickedId ";
            $result = mysqli_query($conn, $sql);

            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_array($result)) {
                    ?>
                    <form action='' method='POST'>
                        <fieldset>
                            <legend class="yellow">Members Details</legend>
                            <div class="form-group">
                                <label class="col-sm-3 control-label yellow" for="name">Name</label>
                                <div class="col-sm-7">
                                    <input type="text" class="form-control" name="name" id="name" placeholder="Name"
                                           value="<?php echo $row["name"] ?>">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label yellow" for="surname">Surname</label>
                                <div class="col-sm-7">
                                    <input type="text" class="form-control" name="surname" id="surname"
                                           placeholder="Surname" value="<?php echo $row["surname"] ?>">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label yellow" for="password2">Password</label>
                                <div class="col-sm-7">
                                    <input type="text" class="form-control" name="password2" id="password2"
                                           placeholder="Password" value="<?php echo $row["password"] ?>">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label yellow" for="email2">Email Address</label>
                                <div class="col-sm-7">
                                    <input type="text" class="form-control" name="email2" id="email2"
                                           placeholder="Email" value="<?php echo $row["email"] ?>">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label yellow" for="dob">Date Of Birth</label>
                                <div class="col-sm-7">
                                    <input type="text" class="form-control" name="dob" id="dob"
                                           placeholder="Date Of Birth" value="<?php echo $row["dob"] ?>">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-3 control-label yellow" for="gender">Gender</label>
                                <div class="col-sm-7">
                                    <input type="text" class="form-control" name="gender" id="gender"
                                           placeholder="Gender" value="<?php echo $row["gender"] ?>">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label yellow" for="fitbitId">FitBit Id</label>
                                <div class="col-sm-7">
                                    <input type="text" class="form-control" name="fitbitId" id="fitbitId"
                                           placeholder="FitBit Id" value="<?php echo $row["fitbit_id"] ?>">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label yellow" for="fitbitSecret">FitBit Secret</label>
                                <div class="col-sm-7">
                                    <input type="text" class="form-control" name="fitbitSecret" id="fitbitSecret"
                                           placeholder="FitBit Secret" value="<?php echo $row["fitbit_secret"] ?>">
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-sm-offset-3 col-sm-9">
                                    <br>
                                    <input type="submit" value="edit" name="edit" id="edit" class="btn btn-danger">
                                </div>
                            </div>
                        </fieldset>
                    </form>

                <?php
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