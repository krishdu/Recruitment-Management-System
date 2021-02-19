<?php

session_start();

require_once("db.php");

if(isset($_POST)) {

	$email = mysqli_real_escape_string($conn, $_POST['email']);
	$newpassword = mysqli_real_escape_string($conn, $_POST['newpassword']);
	

	$sql = "SELECT email FROM users WHERE email='$email'";
	$result = $conn->query($sql);
	if($result->num_rows > 0) {
		$newPass = $newpassword;

		$password = base64_encode(strrev(md5($newPass)));

		$sql = "UPDATE users SET password='$password' WHERE email='$email'";
		if($conn->query($sql)===TRUE) {

			$_SESSION['passwordChanged'] = $newPass;
			header("Location: login.php");
			exit();
		} else {
			echo "Error " . $sql . "<br>" . $conn->error;
		}
	} else {

		$_SESSION['emailNotFoundError'] = true;
		header("Location: forgot-password.php");
		exit();
	}

	$conn->close();
} else {

	header("Location: forgot-password.php");
	exit();
}