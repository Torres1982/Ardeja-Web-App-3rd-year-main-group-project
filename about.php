<!DOCUMENT html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="js/jquery.js"></script>
    <title> View All Products </title>
    <style>
        @import "css/jquery-bootstrap.css";
        @import "css/bootstrap.min.css";
        @import "css/navigation.css";
        @import "css/timetable.css";
        @import "css/main.css";
        @import "css/resizable.css";
        @import "css/bmi.css";
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
	$about_current = 'class = "active"';
	include("include/navigation_part.php");
?>

<br>

<div class="container" id="bmi">
    <div class="row">
        <div class="col-md-4 col-md-offset-4">

            <h2 class="demoHeaders" id="margin_header">
                BMI Calculator
            </h2>
            <div id="bmi_calculator">
                <div id="mssg_height">
                    <span class="info"> Enter your height [m]: </span>
                    <input type="number" id="height" step="0.01" min="0.00" max="2.50" onchange="calculate_bmi()">
                    <div>
                        <div id="mssg_weight">
                            <span class="info"> Enter your weight [kg]: </span>
                            <input type="number" id="weight" step="0.1" min="0.00" max="300" onchange="calculate_bmi()">
                        </div>
                        <div id="mssg_bmi">
                            <span class="info"> Your BMI is: </span>
                            <input type="text" id="result" onchange="calculate_bmi()" readonly>
                        </div>
                        <div id="bmi_description">
                            <span class="info"> BMI evaluation: </span>
                            <div id="clear_bmi_evaluation_box">
                                <textarea id="bmi_evaluation" wrap="hard" readonly> </textarea>
                            </div>
                        </div>
                        <div id="bmi_button1">
                            <input type="button" id="button" value="GET BMI EVALUATION">
                        </div>
                        <div id="bmi_button2">
                            <input type="reset" id="reset" value="RESET">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<br>
<!------------------------------------ Timetable ----------------------------------------->
<!---------------------------------------------------------------------------------------->
<h2 class="demoHeaders" id="timetable">
    Timetable
</h2>
<h4 id="demo">
    Click the Button
</h4>

<div class="buttons">

    <!------------------ Monday - Friday Button ------------------>
    <!------------------------------------------------------------>
    <div class="letter" id="monday">
        <input type="button" value="Monday - Friday" class="button" id="button1" onclick="displayDay1()">
    </div>

    <!---------------------- Saturday Button --------------------->
    <!------------------------------------------------------------>
    <div class="letter" id="saturday">
        <input type="button" value="Saturday" class="button" id="button2" onclick="displayDay2()">
    </div>

    <!---------------------- Sunday Button ------------------------>
    <!------------------------------------------------------------->
    <div class="letter" id="sunday">
        <input type="button" value="Sunday" class="button" id="button3" onclick="displayDay3()">
    </div>

</div>
	<div id="displayInfo"></div>
</div>

<!------------------------------------ Accordion ----------------------------------------->
<!---------------------------------------------------------------------------------------->
<h2 class="demoHeaders"> Most Popular Classes </h2>
<div id="accordion">
    <h3> Fit Combat </h3>
    <div>
        If you are looking for a butt kicking workout then this class is for you. Fit Combat is a high-intensity
        activity that combines martial arts and boxing. This class will undoubtedly improve your endurance and
        cardiovascular fitness, tone muscles and shred your abs if you practice consistently with power and precision.
    </div>
    <h3> Express Spin </h3>
    <div>
        An intense cardio workout on a stationary bike, based on cycling principles. Classes emphasise technique with a
        focus on climbs and sprints that are fun, challenging and designed to leave you drenched with sweat.
    </div>
    <h3> Flat Abs </h3>
    <div>
        Flat Abs is designed to target your torso working all aspect of the abs and back, sculpting your abs into shape
        and strengthening your core. You will be taught different variations of each exercise which you can choose
        according to your own ability.
    </div>
    <h3> Functional Training </h3>
    <div>
        Functional training helps provide you with the strength, stability, power, mobility, endurance and flexibility
        that you need to thrive as you move through your life and sports. You use basic functional movement patterns
        like pushing, pulling, squatting, carrying and gait patterns &#40;walking and running&#41; every day. Functional
        training utilises exercises that improve these primary movements.
    </div>
</div>

<!-------------------------------- Loading Java Script ----------------------------------->
<!---------------------------------------------------------------------------------------->
<script src="js/jquery.js"></script>
<script src="js/jquery-ui.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/timetable.js" type="text/javascript"></script>
<script src="js/button.color.js" type="text/javascript"></script>
<script src="js/accordion.js" type="text/javascript"></script>
<script src="js/bmi_calculator.js" type="text/javascript"></script>

<!------------------------------------- Load Footer -------------------------------------->
<!---------------------------------------------------------------------------------------->
<?php
	include("include/footer_part.php");
?>
</body>
</html>