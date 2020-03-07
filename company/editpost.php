<?php

//To Handle Session Variables on This Page
session_start();

if (empty($_SESSION['id_company'])) {
	header("Location: ../index.php");
	exit();
}

//Including Database Connection From db.php file to avoid rewriting in all files
require_once("../db.php");

//if user Actually clicked EDIT Post Button
if (isset($_POST)) {

	$id_jobpost = mysqli_real_escape_string($conn, $_POST['id_jobpost']);
	$id_company = mysqli_real_escape_string($conn, $_SESSION['id_company']);
	$jobtitle = mysqli_real_escape_string($conn, $_POST['jobtitle']);
	$jobtype = mysqli_real_escape_string($conn, $_POST['jobtype']);
	$description = mysqli_real_escape_string($conn, $_POST['description']);
	$requirements = mysqli_real_escape_string($conn, $_POST['requirements']);
	$minimumsalary = mysqli_real_escape_string($conn, $_POST['minimumsalary']);
	$maximumsalary = mysqli_real_escape_string($conn, $_POST['maximumsalary']);
	$experience = mysqli_real_escape_string($conn, $_POST['experience']);
	$position = mysqli_real_escape_string($conn, $_POST['position']);
	$applyBy = mysqli_real_escape_string($conn, $_POST['applyBy']);

	//THIS IS NOT SAFE FROM SQL INJECTION BUT OK TO USE WITH SMALL TO MEDIUM SIZE AUDIENCE

	//Update User Details Query
	$sql = "UPDATE job_post SET id_company='$id_company', jobtitle='$jobtitle', jobtype='$jobtype', description='$description', requirements='$requirements', minimumsalary='$minimumsalary', maximumsalary='$maximumsalary', experience='$experience', position='$position', applyBy='$applyBy'";

	$sql .= " WHERE id_jobpost='$id_jobpost'";

	if ($conn->query($sql) === TRUE) {
		//If data Inserted successfully then redirect to dashboard
		$_SESSION['jobPostEditSuccess'] = true;
		header("Location: my-job-post.php");
		exit();
	} else {
		//If data failed to insert then show that error. Note: This condition should not come unless we as a developer make mistake or someone tries to hack their way in and mess up :D
		echo "Error " . $sql . "<br>" . $conn->error;
	}

	//Close database connection. Not compulsory but good practice.
	$conn->close();
} else {
	//redirect them back to dashboard page if they didn't click Add Post button
	header("Location: edit-job-post.php");
	exit();
}
