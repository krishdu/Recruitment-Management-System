<?php

session_start();

require_once("db.php");

if(isset($_POST)) {

	$firstname = mysqli_real_escape_string($conn, $_POST['fname']);
	$lastname = mysqli_real_escape_string($conn, $_POST['lname']);
	$address = mysqli_real_escape_string($conn, $_POST['address']);
	$city = mysqli_real_escape_string($conn, $_POST['city']);
	$state = mysqli_real_escape_string($conn, $_POST['state']);
	$contactno = mysqli_real_escape_string($conn, $_POST['contactno']);
	$qualification = mysqli_real_escape_string($conn, $_POST['qualification']);
	$stream = mysqli_real_escape_string($conn, $_POST['stream']);
	$passingyear = mysqli_real_escape_string($conn, $_POST['passingyear']);
	$dob = mysqli_real_escape_string($conn, $_POST['dob']);
	$age = mysqli_real_escape_string($conn, $_POST['age']);
	$designation = mysqli_real_escape_string($conn, $_POST['designation']);
	$email = mysqli_real_escape_string($conn, $_POST['email']);
	$password = mysqli_real_escape_string($conn, $_POST['password']);

	$password = base64_encode(strrev(md5($password)));

	$sql = "SELECT email FROM users WHERE email='$email'";
	$result = $conn->query($sql);

	if($result->num_rows == 0) {

	$uploadOk = true;

	$folder_dir = "uploads/resume/";

	$base = basename($_FILES['resume']['name']); 

	$resumeFileType = pathinfo($base, PATHINFO_EXTENSION); 

	$file = uniqid() . "." . $resumeFileType;   

	$filename = $folder_dir .$file;  

	if(file_exists($_FILES['resume']['tmp_name'])) { 

		if($resumeFileType == "pdf" || $resumeFileType == "doc" || $resumeFileType == "docx")  {

			if($_FILES['resume']['size'] < 5000000) { 

				move_uploaded_file($_FILES["resume"]["tmp_name"], $filename);
			} else {
				
				$_SESSION['uploadError'] = "Wrong Size. Max Size Allowed : 5MB";
				$uploadOk = false;
			}
		} else {
			
			$_SESSION['uploadError'] = "Wrong Format. Only PDF Allowed";
			$uploadOk = false;
		}
	} else {
			
			$_SESSION['uploadError'] = "Something Went Wrong. File Not Uploaded. Try Again.";
			$uploadOk = false;
		}
	
	if($uploadOk == false) {
		header("Location: register.php");
		exit();
	}
		$hash = md5(uniqid());
	
		$sql = "INSERT INTO users(firstname, lastname, email, password, address, city, state, contactno, qualification, stream, passingyear, dob, age, designation, resume) VALUES ('$firstname', '$lastname', '$email', '$password', '$address', '$city', '$state', '$contactno', '$qualification', '$stream', '$passingyear', '$dob', '$age', '$designation', '$file')";
		if($conn->query($sql)===TRUE) {
	
			$_SESSION['registerCompleted'] = true;
			header("Location: login.php");
			exit();
		} else {
	
			echo "Error " . $sql . "<br>" . $conn->error;
		}
	} else {
	
		$_SESSION['registerError'] = true;
		header("Location: register.php");
		exit();
	}
	
	$conn->close();
} else {
	
	header("Location: register.php");
	exit();
}