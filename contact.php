<!DOCUMENT html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="js/jquery.js"></script>
    <title> Timetable <code> setPanel() </code></title>
    <style>
        @import "css/jquery-bootstrap.css";
        @import "css/bootstrap.min.css";
        @import "css/navigation.css";
        @import "css/map.css";
        @import "css/main.css";
        @import "css/table.css";
        @import "css/footer.css";
    </style>
    <script src="js/jquery.min.js"></script>
</head>
<body>

<!------------------------- Load Navigation Bar and Current Page ----------------------------->
<!-------------------------------------------------------------------------------------------->
<?php
	include('include/current_page.php');
	//set the current page
	$contact_current = 'class = "active"';
	include("include/navigation_part.php");
?>

<!------------------------------------------- Google Map ------------------------------------->
<!-------------------------------------------------------------------------------------------->
<div id="floating-panel">
    <strong class="map_location"> Your Location: </strong>
    <input type="text" id="start_point">
    <input type="button" value="Route" id="button">
</div>

<div id="right-panel"></div>
<div id="map"></div>

<!----------- API Key ------------>
<!-------------------------------->
<script async defer
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAhVVbuvs9S_TEpdPfGqO6HmuPq8C2ndOM&signed_in=true&callback=initMap">
</script>

<!------------------------------------ Opening Hours Table ----------------------------------->
<!-------------------------------------------------------------------------------------------->
<div class="container">
    <h2 class="demoHeaders"> Opening Hours </h2>
    <table class="table table-hover">
        <thead>
        <tr>
            <th> Day</th>
            <th> Fitness Club</th>
            <th> Admissions Office</th>
        </tr>
        </thead>
        <tbody>
        <tr class="odd">
            <td class="day"> MONDAY</td>
            <td> 09:00 - 20:30</td>
            <td> 10:00 - 16:00</td>
        </tr>
        <tr class="even">
            <td class="day"> TUESDAY</td>
            <td> 09:00 - 21:00</td>
            <td> 10:00 - 16:00</td>
        </tr>
        <tr class="odd">
            <td class="day"> WEDNESDAY</td>
            <td> 09:00 - 21:00</td>
            <td> 10:00 - 16:00</td>
        </tr>
        <tr class="even">
            <td class="day"> THURSDAY</td>
            <td> 09:00 - 21:00</td>
            <td> 10:00 - 17:00</td>
        </tr>
        <tr class="odd">
            <td class="day"> FRIDAY</td>
            <td> 09:00 - 21:00</td>
            <td> 10:00 - 17:00</td>
        </tr>
        <tr class="even">
            <td class="day"> SATURDAY</td>
            <td> 09:00 - 22:00</td>
            <td> Closed</td>
        </tr>
        <tr class="odd">
            <td class="day"> SUNDAY</td>
            <td> 10:00 - 19:00</td>
            <td> Closed</td>
        </tr>
        </tbody>
    </table>
</div>

<!------------------------------------ Loading Java Script ----------------------------------->
<!-------------------------------------------------------------------------------------------->
<script src="js/jquery.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/google.map.js"></script>

<!------------------------------------- Loading Footer --------------------------------------->
<!-------------------------------------------------------------------------------------------->
<?php
	include("include/footer_part.php");
?>
</body>
</html>