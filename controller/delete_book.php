	<?php
	session_start();	
	include '../model/db.php';
	include '../view/header.php';
	include '../view/navigation.php';

	// connect to session
	// $_session["loggedin"] = true;
	?>
	<!-- load CSS -->
	<style><?php include '../view/style.css';?></style>

	<?php

$deletequery = "DELETE FROM book
WHERE BookID = ' " . $_GET['BookID'] . " ' ";	

$stmt = $conn->prepare($deletequery);
$stmt->execute();
?>

<div class="note"><h1>Successfully deleted!</h1>
</div>

