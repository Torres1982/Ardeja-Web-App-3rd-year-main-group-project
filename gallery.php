<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="js/jquery.js"></script>
    <title> Home Page </title>
    <style>
        @import "css/jquery-bootstrap.css";
        @import "css/bootstrap.min.css";
        @import "css/navigation.css";
        @import "css/gallery.css";
        @import "css/style_switcher.css";
        @import "css/draggable.css";
        @import "css/zoomer.css";
        @import "css/footer.css";
    </style>
</head>
<!------------- Load Random Tip on window load -------------->
<!----------------------------------------------------------->
<body onload="chosen_tip();">

<!------------------------ Load Navigation Bar and Current Page -------------------------->
<!---------------------------------------------------------------------------------------->
<?php
	include('include/current_page.php');
	//set the current page
	$gallery_current = 'class = "active"';
	include("include/navigation_part.php");
?>

<br>

<!--------------------------- Load Style Switcher Container ------------------------------>
<!---------------------------------------------------------------------------------------->
<div id="wrap_switcher">
    <div id="switcher">
        <h3> Style Switcher </h3>
        <div class="button selected" id="switcher-default">
            Default
        </div>
        <div class="button" id="switcher-large">
            Style 1
        </div>
    </div>

    <!--------------------- Load Draggable Widget (Tip of the day) --------------------------->
    <!---------------------------------------------------------------------------------------->
    <div id="draggable" class="ui-widget-content">
        <p>
            Tip of the day&#58;
        </p>
        <div id="tipbox">
        </div>
        <h4>
            &lt;Drag me&gt;
        </h4>
    </div>
</div>
<br>

<!------------------------------- Gallery Container -------------------------------------->
<!---------------------------------------------------------------------------------------->
<div class="col-md-8 center-block page_content">
    <div id="gallery_container">

        <!-- ********************************* Section 1 ************************************** -->
        <section class="pic">
            <img src="images/gym_1.jpg" id="rollover_pic1" alt="Picture of Gym"
                 onmouseover="swap_out_1();" onmouseout="swap_back_1();">
            <p>
                Our "Fitness Club" Gym conforms to the best quality standards in design and equipment. We've been
                constantly improving our services to exceed our customers' expectations, therefore we are well-respected
                and reputable.
            </p>
        </section>
        <br>

        <!-- ********************************* Section 2 ************************************** -->
        <section class="pic">
            <img src="images/swimming_pool.jpg" id="rollover_pic2" alt="Picture of Swimming Pool"
                 onmouseover="swap_out_2();" onmouseout="swap_back_2();">
            <p>
                We are providing our customers with a high quality olimpic-size swimming pool. We have been awarded with
                many prestiguous prizes including the "5-star Swimming Pool Award".
            </p>
        </section>
        <br>

        <!-- ********************************* Section 3 ************************************** -->
        <section class="pic">
            <img src="images/yoga_classes.jpg" id="rollover_pic3" alt="Picture of Yoga"
                 onmouseover="swap_out_3();" onmouseout="swap_back_3();">
            <p>
                5 week term yoga classes available. You can choose a class level that suits your skills and needs. Our
                qualified instructors will inspire your soul. It is all in your mind.
            </p>
        </section>
        <br>

        <!-- ********************************* Section 4 ************************************** -->
        <section class="picture_fixer">
            <img src="images/sports_hall.jpg" id="rollover_pic4" alt="Picture of Sports Hall"
                 onmouseover="swap_out_4();" onmouseout="swap_back_4();">
            <p>
                Whenever you feel like playing any sport (football, basketball, tennis, table tennis, volleyball, and
                many more) feel free to contact any of our customer service staff members to book your session.
            </p>
        </section>
        <br>

        <!-- ********************************* Section 5 ************************************** -->
        <section class="picture_fixer">
            <img src="images/nutrition_shop.jpg" id="rollover_pic5" alt="Picture of Shop"
                 onmouseover="swap_out_5();" onmouseout="swap_back_5();">
            <p>
                We are co-operating with highly advanced professional nutritionists who run our nutrition shop and
                clinic, and can serve you with appropriate advice.
            </p>
        </section>
        <br>
        <!-- ******************************** Image Zoomer ************************************ -->
        <div class="zoom" id="run_zoomer"> Back in History...
            <img src="images/vintage_image.png" alt="Vintage Picture" id="img_zoom" class="zoom_img"/>
        </div>
    </div>
</div>
<!-------------------------------- Loading Java Script ----------------------------------->
<!---------------------------------------------------------------------------------------->
<script src="js/jquery.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/jquery-ui.js"></script>
<script src="js/gallery.rollover.js"></script>
<script src="js/style.switcher.js" type="text/javascript"></script>
<script src="js/random.tip.js" type="text/javascript"></script>
<script src="js/draggable.js" type="text/javascript"></script>
<script src="js/jquery.zoom.js"></script>
<script src="js/zoomer.js" type="text/javascript"></script>

<!------------------------------------- Load Footer -------------------------------------->
<!---------------------------------------------------------------------------------------->
<?php
	include("include/footer_part.php");
?>

</body>
</html>