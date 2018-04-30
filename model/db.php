<?php
	$conn = new PDO("mysql:host=localhost;dbname=books", 'root', '');
	$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	return $conn;
?>