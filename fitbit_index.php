<?php
	session_start();

	$user_id = $_SESSION['fitbit_user_id'];

	define('CONSUMER_KEY', $user_id);
	define('CALLBACK_URL', 'http://localhost/ArdejaProject/callback.php');

	define('AUTH_URL', 'https://www.fitbit.com/oauth2/authorize');

	$params = array(
		'client_id' => CONSUMER_KEY,
		'redirect_uri' => CALLBACK_URL,
		'scope' => 'heartrate',
		'response_type' => 'code',
	);

	header("Location: " . AUTH_URL . '?' . http_build_query($params));
?>