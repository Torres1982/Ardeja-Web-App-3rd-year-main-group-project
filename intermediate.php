<!DOCUMENT html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title> Intermediate Level </title>
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
    $login_current = 'class = "active"';
    require_once("include/navigation_part.php");
?>

<script src="js/jquery.js"></script>
<script src="js/bootstrap.min.js"></script>

<?php
	require_once("include/footer_part.php");
?>

</body>
</html>