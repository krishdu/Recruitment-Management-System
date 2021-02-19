<?php

session_start();

require_once("db.php");

if(isset($_POST)) {

	$email = mysqli_real_escape_string($conn, $_POST['email']);
	$newpassword = mysqli_real_escape_string($conn, $_POST['newpassword']);
	

	$sql = "SELECT email FROM company WHERE email='$email'";
	$result = $conn->query($sql);
	if($result->num_rows > 0) {
		$newPass = $newpassword;

		$password = base64_encode(strrev(md5($newPass)));

		$sql = "UPDATE company SET password='$password' WHERE email='$email'";
		if($conn->query($sql)===TRUE) {

			$_SESSION['passwordChanged'] = $newPass;
			header("Location: company-login.php");
			exit();
		} else {
			echo "Error " . $sql . "<br>" . $conn->error;
		}
	} else {

		$_SESSION['emailNotFoundError'] = true;
		header("Location: companyforgot-password.php");
		exit();
	}

	$conn->close();
} else {

	header("Location: companyforgot-password.php");
	exit();
}