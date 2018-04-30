	<?php
	session_start();
	// connect to DB
	include '../model/db.php';
	// load external scripts
	include '../view/header.php';
	// show navbar
	include '../view/navigation.php';
	// connect to session
	$_session["loggedin"] = true;
	?>
	<!-- load CSS -->
	<style><?php include '../view/style.css';?></style>
	
<?php


// sanitize author variables
$namesan = $_POST['name'];
$lastname = $_POST['surname'];
$nat = $_POST['nationality'];
$birth = $_POST['birth'];
$death = $_POST['death'];

// sanitize author
$aftersan = filter_var($namesan, FILTER_SANITIZE_STRING);
$lastsan = filter_var($lastname, FILTER_SANITIZE_STRING);
$natsan = filter_var($nat, FILTER_SANITIZE_STRING);
$birthsan = filter_var($birth, FILTER_SANITIZE_STRING);
$deathsan = filter_var($death, FILTER_SANITIZE_STRING);

// testing
// echo $aftersan;
// echo $lastsan;
// echo $natsan;
// echo $birthsan;
// echo $deathsan;

// insert author
$insert_sql2 = "INSERT INTO 
author (AuthorID, Name, Surname, Nationality, BirthYear, DeathYear)
VALUES (
'',
'" . $aftersan . "', 
'" . $lastsan . "', 
'" . $natsan . "', 
'" . $birthsan . "', 
'" . $deathsan . "'
)";	

// execute insert author
$stmtt = $conn->prepare($insert_sql2);
$stmtt->execute();

// grab author id
$last_id = $conn->lastInsertId();
// echo "Author ID is: " . $last_id;

// sanitize book variables
$beforetitle = $_POST['booktitle'];
$beforeoriginal = $_POST['originaltitle'];
$beforeyear = $_POST['year'];
$beforegenre = $_POST['genre'];
$beforesold = $_POST['sold'];
$beforelan = $_POST['language'];
$beforecover = $_POST['cover'];

// sanitize book
$aftertitle = filter_var($beforetitle, FILTER_SANITIZE_STRING);
$afteroriginal = filter_var($beforeoriginal, FILTER_SANITIZE_STRING);
$afteryear = filter_var($beforeyear, FILTER_SANITIZE_STRING);
$aftergenre = filter_var($beforegenre, FILTER_SANITIZE_STRING);
$aftersold = filter_var($beforesold, FILTER_SANITIZE_STRING);
$afterlan = filter_var($beforelan, FILTER_SANITIZE_STRING);
$aftercover = filter_var($beforecover, FILTER_SANITIZE_STRING);

// insert book
$insert_sql = "INSERT INTO 
book (BookID, BookTitle, OriginalTitle, YearofPublication, Genre, MillionsSold, LanguageWritten, AuthorID, Cover)
VALUES (
'',
'" . $aftertitle . "', 
'" . $afteroriginal . "', 
'" . $afteryear . "', 
'" . $aftergenre . "', 
'" . $aftersold . "', 
'" . $afterlan . "', 
'" . $last_id . "', 
'" . $aftercover . "'
)";		

// execute insert book
$stmt = $conn->prepare($insert_sql);
$stmt->execute();

// grab book id
$booklast_id = $conn->lastInsertId();
// echo "Book ID is: " . $booklast_id;

// sanitize rank and plot variables
$beforerank = $_POST['rankingscore'];
$beforeplot = $_POST['plot'];
$beforesource = $_POST['plotsource'];

// sanitize rank and plot
$afterrank = filter_var($beforerank, FILTER_SANITIZE_STRING);
$afterplot = filter_var($beforeplot, FILTER_SANITIZE_STRING);
$aftersource = filter_var($beforesource, FILTER_SANITIZE_STRING);

// insert ranking score
$insertrank = "INSERT INTO 
bookranking (RankingID, RankingScore, BookID)
VALUES (
'', 
'" . $afterrank . "',
'" . $booklast_id . "'
)";	

// execute insert ranking
$stmt = $conn->prepare($insertrank);
$stmt->execute();

// insert plot
$insertplot = "INSERT INTO 
bookplot (BookPlotID, Plot, PlotSource, BookID)
VALUES (
'', 
'" . $afterplot . "',
'" . $aftersource . "',
'" . $booklast_id . "'
)";	

// execute insert plot
$stmt = $conn->prepare($insertplot);
$stmt->execute();

echo "<div class='note'><p>";
echo "Added new book!";
echo "<br><a href='../model/view_books.php'>Return to view all books.</a>";
echo "</p></div>";

// $result = $stmt->fetchAll();

// echo $result;

// debug

// if it exists
// if (count($result) ) {
// 	echo "Book already in database!";
// }

// if it doesn't exist
// else {		
	// echo "Added new book!";
// 	$stmt = $conn->prepare($insert_sql);
// }

	// $insert_sql = "INSERT INTO `book`(`BookTitle`, `LanguageWritten`) VALUES ('" . $_POST['booktitle'] . "','" . $_POST['language'] . "')";	

	// $stmt = $conn->prepare($insert_sql);
	// $stmt->execute();

	// $result = $stmt->fetchAll();
	// $stmt = $conn->prepare($insert_sql);
	?>

