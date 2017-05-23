<!------------------------------------- Navigation Bar ------------------------------------------>
<!----------------------------------------------------------------------------------------------->
<div class = "navbar-wrapper">
	<nav class = "navbar navbar-inverse" role = "navigation">
		<div class = "container-fluid">
			<div class = "navbar-header">
				<button type = "button" class = "navbar-toggle collapsed" data-toggle = "collapse" data-target = "#navbar" aria-expanded = "false" aria-controls = "navbar">
					<span class = "sr-only"> Toggle navigation </span>
					<span class = "icon-bar"></span>
					<span class = "icon-bar"></span>
					<span class = "icon-bar"></span>
				</button>
				<img src = "images/ardeja_logo.png" id = "logo" alt = "Fitness Logo" width = "110" height = "36">
				<a href = "#" class = "navbar-brand"> </a>
			</div>
			<div id = "navbar" class = "navbar-collapse collapse">
				<ul class = "nav navbar-nav">
					<li <?php echo $index_current; ?>><a href = "index.php"> Home </a></li>
					<li <?php echo $about_current; ?>><a href = "about.php"> About </a></li>
					<li <?php echo $contact_current; ?>><a href = "contact.php"> Contact </a></li>
					<li <?php echo $gallery_current; ?>><a href = "gallery.php"> Gallery </a></li>
					<li <?php echo $background_current; ?>><a href = "background.php"> Background </a></li>
					<li <?php echo $registration_current; ?>><a href = "registration.php"> Registration </a></li>
					<li <?php echo $login_current; ?>><a href = "login.php"> Login</a></li>
				</ul>
			</div>
		</div>
	</nav>
</div>
<br>
    <br>
