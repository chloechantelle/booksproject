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
	//$contentquery = "SELECT DISTINCT * FROM book";
	$contentquery = "select * from book inner join author on Book.authorID = author.authorID ";
	$stmt = $conn->prepare($contentquery);
	$stmt->execute();
	$staticresult = $stmt->fetchAll(PDO::FETCH_ASSOC);
	// $bookresult = $conn->query($contentquery);
	?>
	
	<div class="bookcon">

	<?php 
	foreach($staticresult as $row) {
	echo'
	<div class="book"> 
	<img class="cover" src=' . $row['Cover'] . '>
	<div class="bookinfo"><h1>     ' . $row['Name'] . ' ' . $row['Surname'] . ' </h1>
	<h2>     ' . $row['BookTitle'] . '    				  </h2>	
	<h3> ' . $row['YearofPublication'] . ' | ' . $row['MillionsSold'] . ' Million </h3>

	<a class="actionbuttons" href="../model/update.php?BookID=' . $row['BookID'] . '"><i class="fas fa-pencil-alt"></i> Edit</a>
	 <a class="actionbuttons" href="../controller/delete_book.php?BookID=' . $row['BookID'] . '"><i class="fas fa-trash"></i> Delete</a> 

	
	</div></div>';
	}
	?>	
	</div>
	<a href="../view/add.php" title="Add New Book" class="floater">+</a>	
	<?php
	include '../view/footer.php';
	?>