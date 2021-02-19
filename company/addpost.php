<?php
session_start();
require_once("../db.php");

if(isset($_POST)) {

	$jobtitle = mysqli_real_escape_string($conn, $_POST['jobtitle']);
	$description = mysqli_real_escape_string($conn, $_POST['description']);
	$minimumsalary = mysqli_real_escape_string($conn, $_POST['minimumsalary']);
	$maximumsalary = mysqli_real_escape_string($conn, $_POST['maximumsalary']);
	$experience = mysqli_real_escape_string($conn, $_POST['experience']);
	$qualification = mysqli_real_escape_string($conn, $_POST['qualification']);
	$sql = "INSERT INTO job_post(id_company, jobtitle, description, minimumsalary, maximumsalary, experience, qualification) VALUES ('$_SESSION[id_user]','$jobtitle', '$description', '$minimumsalary', '$maximumsalary', '$experience', '$qualification')";
	if($conn->query($sql)===TRUE) {
		$_SESSION['jobPostSuccess'] = true;
		header("Location: dashboard.php");
		exit();
	} else {
		echo "Error " . $sql . "<br>" . $conn->error;
	}
	$conn->close();
} else {
	header("Location: dashboard.php");
	exit();
}