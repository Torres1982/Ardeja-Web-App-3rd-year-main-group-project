<!DOCUMENT html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="js/jquery.js"></script>
    <title> Gym Home Page </title>
    <style>
        @import "css/jquery-bootstrap.css";
        @import "css/bootstrap.min.css";
        @import "css/navigation.css";
        @import "css/image_slider.css";
        @import "css/main.css";
        @import "css/tooltip.css";
        @import "css/footer.css";
    </style>
    <script src="js/jquery.min.js"></script>
</head>
<body>
<!------------------------ Load Navigation Bar and Current Page -------------------------->
<!---------------------------------------------------------------------------------------->
<?php
	include('include/current_page.php');
	//set the current page
	$index_current = 'class = "active"';
	include("include/navigation_part.php");
?>

<br>
    <div id="move_slider_picture">
    </div>
<!--------------------------------- Loading Screen --------------------------------------->
<!---------------------------------------------------------------------------------------->
<div id="jssor_1" class="loading_start">
    <div data-u="loading" class="loading_1">
        <div class="loading_2">
        </div>
        <div class="loading_3">
        </div>
    </div>
    <!----------------------------------- Image Slides --------------------------------------->
    <!---------------------------------------------------------------------------------------->
    <div data-u="slides" class="img_slides">
        <div data-p="112.50">
            <img data-u="image" class="images_slider" src="images/02.jpg"/>
        </div>
        <div data-p="112.50">
            <img data-u="image" class="images_slider" src="images/04.jpg"/>
        </div>
        <div data-p="112.50">
            <img data-u="image" class="images_slider" src="images/05.jpg"/>
        </div>
        <div data-p="112.50">
            <img data-u="image" class="images_slider" src="images/09.jpg"/>
        </div>
    </div>
    <!------------------------------ Left and Right Arrows ----------------------------------->
    <!---------------------------------------------------------------------------------------->
    <span data-u="arrowleft" class="left_arrow" data-autocenter="2"></span>
    <span data-u="arrowright" class="right_arrow" data-autocenter="2"></span>
</div>

<!--------------------------------------- Tabs ------------------------------------------->
<!---------------------------------------------------------------------------------------->
<h2 class="demoHeaders"> Our Instructors </h2>
<div id="tabs">
    <ul>
        <li><a href="#tabs-1"> Arnold Schwarzeneger </a></li>
        <li><a href="#tabs-2"> Kelli Calabrese </a></li>
        <li><a href="#tabs-3"> Gunnar Peterson </a></li>
    </ul>
    <div id="tabs-1">
        <p>
            <img src="images/arnold.jpg" alt="Image" class="instructor" width="75">
        </p>
        <p id="tooltip">
            <strong> Arnold Schwarzenegger </strong> is the most popular bodybuilder in the world, he went on to become
            a <a href="#" id="tooltip_img" class="tooltip_color" title="">Hollywood</a> actor and Governor of
            California. Born in Austria, Arnold&#39;s interest in bodybuilding began in 1960 when he visited a local
            gym. Five years later, he won the Junior Mr. Europe contest. This contributed to his desire to achieve fame
            and notoriety beyond Europe. Soon, he traveled to London where he won his first Mr. Universe competition in
            1967.
        </p>
    </div>
    <div id="tabs-2">
        <p>
            <img src="images/kelli.jpg" alt="Image" class="instructor" width="75">
        </p>
        <p>
            <strong> Kelli Calabrese </strong> wears many hats as a business owner, author, international presenter,
            fitness expert, editor and spokesperson. Calabrese&#39;s passion for fitness was sparked at age 13 when she
            joined a fitness class. She received a fitness certification at 17. By age 22, Calabrese had three science
            degrees that gave her the academic foundation needed for a fitness career. She also has 20 certifications
            related to fitness and nutrition.
        </p>
    </div>
    <div id="tabs-3">
        <p>
            <img src="images/gunnar.jpg" alt="Image" class="instructor" width="75">
        </p>
        <p>
            As a Beverly Hills personal trainer, <strong> Gunnar Peterson </strong> is credited with training athletes,
            actors and celebrities. Peterson is known for trying innovative methods to keep his clients in shape. The
            number of trainers he has inspired is not easy to quantify. He is an editor for the Muscle and Fitness
            magazine. Gunnar is also involved in various capacities with several other magazines such as the advisory
            board for Fitness AND a Clean Eating contributor.
        </p>
    </div>
</div>
<!-------------------------------- Loading Java Script ----------------------------------->
<!---------------------------------------------------------------------------------------->
<script src="js/jquery.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/jquery-ui.js"></script>
<script src="js/enlarge.js" type="text/javascript"></script>
<script src="js/js.slider.js" type="text/javascript"></script>
<script src="js/image.slider.js" type="text/javascript"></script>
<script src="js/tabs.js" type="text/javascript"></script>
<script src="js/tooltip.js" type="text/javascript"></script>
<script src="js/jquery.min.js"></script>
<!------------------------------------- Load Footer -------------------------------------->
<!---------------------------------------------------------------------------------------->
<?php
	include("include/footer_part.php");
?>

</body>
</html>