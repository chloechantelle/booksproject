<?php
	session_start();
	include '../model/db.php';
	include '../view/header.php';
	// include 'navigation.php';
?>


<?php

// search users
// $select_sql = "select Username from users where Username = '" . $_POST['Username'] . "';";

// hash password
$password = $_POST['Password'];
$hashed_password = password_hash($password, PASSWORD_DEFAULT);

// insert user
$register = "INSERT INTO users(Username, Password) 
VALUES (
'" . $_POST['Username'] . "', 
'$hashed_password'
)";

$stmt = $conn->prepare($register);
$stmt->execute();
$_SESSION['LoggedIn'] = true;
$_SESSION['CurrentUser'] = $email;
header('Location: ../model/view_books.php');

?>