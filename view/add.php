	<?php
	// start session
	session_start();
	// connect to DB
	include '../model/db.php';
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

	<form class="add" action="../controller/add_book.php" method="post">
	<h4>Author Information</h4>	

		<label>First Name</label>
		<input required pattern="[A-Za-z]+" type="text" name="name" placeholder="First Name">

		<label>Last Name</label>
		<input required pattern="[A-Za-z]+" type="text" name="surname" placeholder="Surname">

		<label>Nationality</label>
		<input required pattern="[A-Za-z]+" type="text" name="nationality" placeholder="Nationality">

		<label>Year of Birth</label>
		<input required pattern="[0-9]+" type="text" name="birth" placeholder="Year of Birth">

		<label>Year of Death</label>
		<input required pattern="[0-9]+" type="text" name="death" placeholder="Year of Death">
		<hr>
	<h4>Book Information</h4>	

		<label>Book Title</label>	
		<input required pattern="[A-Za-z ]+" type="text" name="booktitle" placeholder="Book Title">

		<label>Original Title</label>
		<input required pattern="[A-Za-z ]+" type="text" name="originaltitle" placeholder="Original Title">
		
		<label>Year of Publication</label>
		<input required pattern="[0-9]+" type="text" name="year" placeholder="Year of Publication">

		<label>Genre</label>
		<input required pattern="[A-Za-z]+" type="text" name="genre" placeholder="Genre">

		<label>Millions Sold</label>
		<input required pattern="[0-9]+" type="text" name="sold" placeholder="Millions Sold">		

		<label>Language Written</label>
		<input required pattern="[A-Za-z]+" type="text" name="language" placeholder="Language Written">	

		<label>Cover</label>
		<input required type="url" name="cover" placeholder="Book Cover" value="http://localhost/books/bookcovers/default.png">

		<label>Ranking Score</label>
		<input required pattern="[0-9]" type="text" name="rankingscore" placeholder="Between 1-10">
		
		<label>Plot</label>
		<input required pattern="[A-Za-z ,.()]+" type="text" name="plot" placeholder="Short plot blob">

		<label>Plot Source</label>
		<input required type="url" name="plotsource" placeholder="Web address preferably">

		<input type="submit" name="submit" value="Add New Book">
	</form>