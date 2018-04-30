	<?php
	// start session
	session_start();
	// connect to DB
	include 'db.php';
	// load external scripts
	include '../view/header.php';
	// show navbar
	include '../view/navigation.php';
	?>

	<!-- if user isn't logged in, redirect to login -->
	<?php
	if (isset($_SESSION['LoggedIn'])) {
	}
	else {
		header("Location: ../index.php");
	}
	?>

	<!-- load CSS -->
	<style><?php include '../view/style.css';?></style>
	<!-- load JS -->
	<script src="../view/javascript.js"></script>

	<?php	
	// $log = "select * from `update`";
	$log = "select * from `update` inner join book on Book.BookID = `update`.BookID";
	$stmt = $conn->prepare($log);
	$stmt->execute();
	$logresult = $stmt->fetchAll(PDO::FETCH_ASSOC);
	// $bookresult = $conn->query($contentquery);
	?>
	
	<div class="note">

	<?php 
	foreach($logresult as $logrow) {
	echo'
	
	<h1>   Book Updated:  ' . $logrow['BookTitle'] . '  </h1>
	
	<h2>  User Who Updated:   ' . $logrow['Username'] . '    				  </h2>	
	<h3> Last Updated: ' . $logrow['LastUpdated'] . ' </h3><hr>
	';
	}
	?>	
	</div>
	<a href="../view/add.php" title="Add New Book" class="floater">+</a>	
	<?php
	include '../view/footer.php';
	?>