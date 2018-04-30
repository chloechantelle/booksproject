	<?php
	session_start();
	include 'db.php';
	include '../view/header.php';
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
	$getquery = '
	select * from book
	inner join author on Book.authorID = author.authorID
	inner join bookplot on Book.BookID = bookplot.BookID
	inner join bookranking on Book.BookID = bookranking.BookID
	where book.BookID = ' . $_GET['BookID'] . '   ';
	$stmt = $conn->prepare($getquery);
	$stmt->execute();
	$getresult = $stmt->fetchAll(PDO::FETCH_ASSOC);
	// $bookresult = $conn->query($contentquery);
	?>

	<?php 
	foreach($getresult as $row) {
	echo'
	<form class="add" action="../controller/update_book.php?BookID=' . $row['BookID'] . '" method="post"> 

	<label>Book Title</label>
	<input required pattern="[A-Za-z -.:/]+" value="' . $row['BookTitle'] . '" type="text" name="booktitle" placeholder="Book Title">

	<label>Author First Name</label>
	<input required pattern="[A-Za-z .-]+" value="' . $row['Name'] . '" type="text" name="firstname" placeholder="First Name">

	<label>Author Last Name</label>
	<input required pattern="[A-Za-z .-]+" value="' . $row['Surname'] . '" type="text" name="surname" placeholder="Last Name">

	<label>Original Title</label>
	<input required pattern="[A-Za-z  -.(),]+" value="' . $row['OriginalTitle'] . '" type="text" name="originaltitle" placeholder="Original Title">

	<label>Year of Publication</label>
	<input required pattern="[0-9 ]+" value="' . $row['YearofPublication'] . '" type="text" name="yearofpublication" placeholder="Year of Publication">

	<label>Genre</label>
	<input required pattern="[A-Za-z / -]+" value="' . $row['Genre'] . '" type="text" name="genre" placeholder="Genre">	

	<label>Language</label>
	<input required pattern="[A-Za-z ]+" value="' . $row['LanguageWritten'] . '" type="text" name="language" placeholder="Language">

	<label>Cover</label>
	<input required value="' . $row['Cover'] . '" type="url" name="cover" placeholder="Cover">

	<label>Ranking Score</label>
	<input required pattern="[0-10]+" value="' . $row['RankingScore'] . '" type="text" name="rankingscore" placeholder="Ranking Score (Between 1-10)">

	<label>Plot</label>
	<input required pattern="[A-Za-z /-.(),]+" value="' . $row['Plot'] . '" type="text" class="long" name="plot" placeholder="Plot">

	<label>Plot Source</label>
	<input required value="' . $row['PlotSource'] . '" type="url" name="plotsource" placeholder="Plot Source">

	<input type="submit" value="Update Book"</input>
	</form>';
	}
	include '../view/footer.php';
	?>	