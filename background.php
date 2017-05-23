<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="js/jquery.js"></script>
    <title> Background </title>
    <style>
        @import "css/jquery-bootstrap.css";
        @import "css/bootstrap.min.css";
        @import "css/navigation.css";
        @import "css/main.css";
        @import "css/background.css";
        @import "css/footer.css";
    </style>
</head>
<body>

<!------------------------ Load Navigation Bar and Current Page -------------------------->
<!---------------------------------------------------------------------------------------->
<?php
	include('include/current_page.php');
	//set the current page
	$background_current = 'class = "active"';
	include("include/navigation_part.php");
?>

<!--------------------------------- History Info ----------------------------------------->
<!---------------------------------------------------------------------------------------->
<div class="col-md-8 center-block page_content">
    <h2 class="demoHeaders">
        A Bit of History
    </h2>
    <div id="background">
        <h3>
            Background
        </h3>
        <p>
            To enjoy a long and healthy life, everyone should make lifestyle choices that include a healthy diet,
            regular exercise, and maintaining normal weight. Being active helps your blood circulate through your body
            and carry fresh oxygen to your muscles and organs. Fresh oxygen improves alertness and helps you feel
            better.
        </p>
        <h4>
            What is Fitness?
        </h4>
        <p>
            Being fit does not mean being thin or muscular. Fitness is the combination of qualities that enable us to
            perform vigorous physical activities. Read this section to know more about Fitness.
        </p>
        <h4>
            Fitness History
        </h4>
        <p>
            The idea of fitness can be traced back to pre-history. Starting from ancient civilizations in China and in
            India, it has evolved into a dynamic activity that it is today.
        </p>
        <h4>
            Why do Fitness?
        </h4>
        <p>
            Fitness exercises provide many benefits such as improvement of self-being and alleviation of health
            problems, among others. Discover the most common driving factors why people pursue physical fitness.
        </p>
    </div>
</div>

<!---------------------------------- Resizer - Toolbar ----------------------------------->
<!---------------------------------------------------------------------------------------->
<div class="font_resizer">
    <ul class="list-inline">
        <li>
            Resize
        </li>
        <li>
            <button class="make_larger"> + </button>
        </li>
        <li>
            <button class="make_smaller"> - </button>
        </li>
    </ul>
</div>

<!-------------------------------- Horizontal Subshading --------------------------------->
<!---------------------------------------------------------------------------------------->
<h2 class="demoHeaders"> Downloads </h2>
<div id="subshading">

    <div class="subshading_left">
        <li>
            <div class="fix">
                Ancient Times
            </div>
            <ul class="bullet_style">
                <div class="list_top_margin">
                    <li><span class="tab_right1"> Ancient Greek </span>
                        <a href="docs/ancient_greek.pdf" target="tab">
                            <img src="images/pdf_icon.png" alt="pdf icon">
                        </a>
                    </li>
                </div>
                <div class="list_top">
                    <li><span class="tab_right2"> Ancient Chinese </span>
                        <a href="docs/ancient_chinese.pdf" target="tab">
                            <img src="images/pdf_icon.png" alt="pdf icon">
                        </a>
                    </li>
                </div>
                <div class="list_top">
                    <li><span class="tab_right3"> Ancient India </span>
                        <a href="docs/ancient_india.pdf" target="tab">
                            <img src="images/pdf_icon.png" alt="pdf icon">
                        </a>
                    </li>
                </div>
            </ul>
        </li>
    </div>

    <div class="subshading_right">
        <li>
            <div class="fix">
                20<sup>th</sup> Century
            </div>
            <ul class="bullet_style">
                <div class="list_top_margin">
                    <li><span class="tab_right1"> World War I </span>
                        <a href="docs/war1.pdf" target="tab">
                            <img src="images/pdf_icon.png" alt="pdf icon">
                        </a>
                    </li>
                </div>
                <div class="list_top">
                    <li><span class="tab_right4"> World War II </span>
                        <a href="docs/war2.pdf" target="tab">
                            <img src="images/pdf_icon.png" alt="pdf icon">
                        </a>
                    </li>
                </div>
                <div class="list_top">
                    <li><span class="tab_right5"> After War </span>
                        <a href="docs/after_war2.pdf" target="tab">
                            <img src="images/pdf_icon.png" alt="pdf icon">
                        </a>
                    </li>
                </div>
            </ul>
        </li>
    </div>

</div>

<!-------------------------------- Loading Java Script ----------------------------------->
<!---------------------------------------------------------------------------------------->
<script src="js/jquery.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/jquery.min.js"></script>
<script src="js/jquery-ui.js"></script>
<script src="js/horizontal.subshading.js"></script>
<script src="js/font.resizer.js"></script>

<!------------------------------------- Load Footer -------------------------------------->
<!---------------------------------------------------------------------------------------->
<?php
	include("include/footer_part.php");
?>

</body>
</html>