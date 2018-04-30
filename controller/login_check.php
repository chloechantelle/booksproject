<?php
session_start();
// search emails
$select_sql = "select Username from users where Username = '" . $_POST['Username'] . "';";

// insert user
//$login_sql = "INSERT INTO `users`(`Username`, `Password`) VALUES ('" . $_POST['Username'] . "','" . $_POST['Password'] . "')";	

// connection
$conn = new PDO("mysql:host=localhost;dbname=books", 'root', '');
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$stmt = $conn->prepare($select_sql);
$stmt->execute();

// debug
$result = $stmt->fetchAll();

// grab role for session variable
$getquery = "   SELECT * FROM `users` where Username = '" . $_POST['Username'] . "' ";
$stmt = $conn->prepare($getquery);
$stmt->execute();
$getresult = $stmt->fetch(PDO::FETCH_ASSOC);

// set variables
$email = ($_POST['Username']);
// $role = ($getresult['Role']);

// if it exists
if (count($result) ) {
	// echo "Email exists!";
	$_SESSION['LoggedIn'] = true;
	$_SESSION['CurrentUser'] = $email;
	// $_SESSION['Role'] = $role;
	echo "Correct login!";
	header('Location: ../model/view_books.php');
}

// if it doesn't exist
else {		
	?><script>

	window.alert("Incorrect username or password, try again!");
	window.location.href = "../index.php";

	</script>
	<?php
	// run function to show JS pop up for below message
	// echo "Incorrect username or password!";
	// header('Location: ../index.php');
}

?>
