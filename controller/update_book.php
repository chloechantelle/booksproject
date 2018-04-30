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

// sanitize variables
$beforetitle = $_POST['booktitle'];

$namesan = $_POST['firstname'];
$lastname = $_POST['surname'];

$beforeoriginal = $_POST['originaltitle'];
$beforeyear = $_POST['yearofpublication'];
$beforegenre = $_POST['genre'];
$beforelan = $_POST['language'];
$beforecover = $_POST['cover'];

$beforerank = $_POST['rankingscore'];
$beforeplot = $_POST['plot'];
$beforesource = $_POST['plotsource'];

// sanitize

$aftertitle = filter_var($beforetitle, FILTER_SANITIZE_STRING);

$aftersan = filter_var($namesan, FILTER_SANITIZE_STRING);
$lastsan = filter_var($lastname, FILTER_SANITIZE_STRING);

$afteroriginal = filter_var($beforeoriginal, FILTER_SANITIZE_STRING);
$afteryear = filter_var($beforeyear, FILTER_SANITIZE_STRING);
$aftergenre = filter_var($beforegenre, FILTER_SANITIZE_STRING);
$afterlan = filter_var($beforelan, FILTER_SANITIZE_STRING);
$aftercover = filter_var($beforecover, FILTER_SANITIZE_STRING);

$afterrank = filter_var($beforerank, FILTER_SANITIZE_STRING);
$afterplot = filter_var($beforeplot, FILTER_SANITIZE_STRING);
$aftersource = filter_var($beforesource, FILTER_SANITIZE_STRING);

// update query

$updatequery = "UPDATE book, author, bookranking, bookplot SET 

BookTitle =  '" . $aftertitle . "', 

Name =  '" . $namesan . "', 
Surname =  '" . $lastname . "', 

OriginalTitle =  '" . $afteroriginal . "', 
YearofPublication =  '" . $afteryear . "', 
Genre =  '" . $aftergenre . "', 
LanguageWritten =  '" . $afterlan . "', 
Cover =  '" . $aftercover . "', 

RankingScore = '" . $afterrank . "', 
Plot =  '" . $afterplot . "', 
PlotSource =  '" . $aftersource . "'

WHERE book.BookID = ' " . $_GET['BookID'] . " ' 
AND author.AuthorID = " . $_GET['BookID'] . " 
AND bookplot.BookID = ' " . $_GET['BookID'] . " ' 
AND bookranking.BookID = ' " . $_GET['BookID'] . " ' 

";
$stmt = $conn->prepare($updatequery);
$stmt->execute();

// INSERT INTO 
// update(UpdateID, BookID, UserID, LastUpdated)
// VALUES (
// '', '" . $_POST['BookID'] . "',
// '" . $_POST['originaltitle'] . "',
// '" . $_POST['year'] . "', CURRENT_TIMESTAMP


// INSERT INTO `update` (`UpdateID`, `BookID`, `UserID`, `LastUpdated`) VALUES ('', '2', '1', CURRENT_TIMESTAMP);

$user = $_SESSION['CurrentUser'];

$logsql = "INSERT INTO `update` (`UpdateID`, `BookID`, `Username`, `LastUpdated`) VALUES ('', '" . $_GET['BookID'] . "', '$user', CURRENT_TIMESTAMP

)";	
$stmt = $conn->prepare($logsql);
$stmt->execute();

echo "<div class='note'><p>";
echo "Succesfully updated!";
echo "<br><a href='../model/view_books.php'>Return to view all books.</a>";
echo "</p></div>";

// replace w/ php file w/ styling

//$insert_sql = "UPDATE book SET BookTitle =    ' . $_POST['booktitle'] . '      WHERE BookID =      ' . $_GET['BookID'] . '     ;"

//$insert_sql = "UPDATE book SET BookTitle =  'Don Quixoteeee'  WHERE BookID = '1' "


//$insert_sql = "UPDATE book SET LanguageWritten =   ' " . $_POST['language'] . " '      WHERE BookID =      ' " . $_GET['BookID'] . " '     ;"

// echo $sqlupdate1 = "UPDATE table SET commodity_quantity=$qty WHERE user= ' " .$rows['user']. " '  " ;

// $stmt = $conn->prepare($insert_sql);
// $stmt->execute();

	include '../view/footer.php';

	?>

