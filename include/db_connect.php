
<?php
	function db_connect($db_name){

		$db_link = mysql_connect('localhost', 'artur', 'Torres1982')
		or die("Could not connect to $host_name");
		mysql_select_db($db_name)
		or die("Could not select database $db_name");

		return $db_link;
	}
?>