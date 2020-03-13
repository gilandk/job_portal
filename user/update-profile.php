<?php

//To Handle Session Variables on This Page
session_start();

if (empty($_SESSION['id_user'])) {
	header("Location: ../index.php");
	exit();
}

//Including Database Connection From db.php file to avoid rewriting in all files
require_once("../db.php");

//if user Actually clicked update profile button
if (isset($_POST)) {

	//Escape Special Characters
	$sno = mysqli_real_escape_string($conn, $_POST['sno']);
	$fname = mysqli_real_escape_string($conn, $_POST['fname']);
	$address = mysqli_real_escape_string($conn, $_POST['address']);
	$contactno = mysqli_real_escape_string($conn, $_POST['contactno']);
	$state = mysqli_real_escape_string($conn, $_POST['state']);
	$city = mysqli_real_escape_string($conn, $_POST['city']);
	$dob = mysqli_real_escape_string($conn, $_POST['dob']);
	$age = mysqli_real_escape_string($conn, $_POST['age']);
	$gender = mysqli_real_escape_string($conn, $_POST['gender']);
	$civilstatus = mysqli_real_escape_string($conn, $_POST['civilstatus']);
	$nationality = mysqli_real_escape_string($conn, $_POST['nationality']);

	//Educational Background
	$fos = mysqli_real_escape_string($conn, $_POST['fos']);
	$course = mysqli_real_escape_string($conn, $_POST['course']);
	$yearAt = mysqli_real_escape_string($conn, $_POST['yearAt']);
	$cbpassingyear = mysqli_real_escape_string($conn, $_POST['cbpassingyear']);
	$passingyear = mysqli_real_escape_string($conn, $_POST['passingyear']);
	$qualification = mysqli_real_escape_string($conn, $_POST['qualification']);

	//employment
	$company_name = mysqli_real_escape_string($conn, $_POST['company_name']);
	$company_add = mysqli_real_escape_string($conn, $_POST['company_add']);
	$position = mysqli_real_escape_string($conn, $_POST['position']);
	$emp_type = mysqli_real_escape_string($conn, $_POST['emp_type']);
	$datejoined = mysqli_real_escape_string($conn, $_POST['datejoined']);
	$dateleft = mysqli_real_escape_string($conn, $_POST['dateleft']);
	$cbdateleft = mysqli_real_escape_string($conn, $_POST['cbdateleft']);

	$company_name1 = mysqli_real_escape_string($conn, $_POST['company_name1']);
	$company_add1 = mysqli_real_escape_string($conn, $_POST['company_add1']);
	$position1 = mysqli_real_escape_string($conn, $_POST['position1']);
	$emp_type1 = mysqli_real_escape_string($conn, $_POST['emp_type1']);
	$datejoined1 = mysqli_real_escape_string($conn, $_POST['datejoined1']);
	$dateleft1 = mysqli_real_escape_string($conn, $_POST['dateleft1']);
	$cbdateleft1 = mysqli_real_escape_string($conn, $_POST['cbdateleft1']);

	$company_name2 = mysqli_real_escape_string($conn, $_POST['company_name2']);
	$company_add2 = mysqli_real_escape_string($conn, $_POST['company_add2']);
	$position2 = mysqli_real_escape_string($conn, $_POST['position2']);
	$emp_type2 = mysqli_real_escape_string($conn, $_POST['emp_type2']);
	$datejoined2 = mysqli_real_escape_string($conn, $_POST['datejoined2']);
	$dateleft2 = mysqli_real_escape_string($conn, $_POST['dateleft2']);
	$cbdateleft2 = mysqli_real_escape_string($conn, $_POST['cbdateleft2']);

	$skills = mysqli_real_escape_string($conn, $_POST['skills']);
	$aboutme = mysqli_real_escape_string($conn, $_POST['aboutme']);

	if($cbpassingyear == "checked"){
		$passingyear = "Up to Present";
	}
	else{
		$passingyear = $passingyear;
	}


	if($cbdateleft == "checked"){
		$dateleft = "Up to Present";
	}
	else{
		$dateleft = $dateleft;
	}

	if($cbdateleft1 == "checked"){
		$dateleft1 = "Up to Present";
	}
	else{
		$dateleft1 = $dateleft1;
	}

	
	if($cbdateleft2 == "checked"){
		$dateleft2 = "Up to Present";
	}
	else{
		$dateleft2 = $dateleft2;
	}


	//profile picture
	$profileOk = true;

	if (is_uploaded_file($_FILES['image']['tmp_name'])) {

		$folder_dir = "../uploads/profile/";

		$base = basename($_FILES['image']['name']);

		$imageFileType = pathinfo($base, PATHINFO_EXTENSION);

		$profile = uniqid() . "." . $imageFileType;

		$filename = $folder_dir . $profile;

		if (file_exists($_FILES['image']['tmp_name'])) {

			if ($imageFileType == "jpg" || $imageFileType == "png") {

				if ($_FILES['image']['size'] < 500000) { // File size is less than 5MB

					//If all above condition are met then copy file from server temp location to uploads folder.
					move_uploaded_file($_FILES["image"]["tmp_name"], $filename);
				} else {
					$_SESSION['uploadError'] = "Wrong Size. Max Size Allowed : 5MB";
					header("Location: edit-profile.php");
					exit();
				}
			} else {
				$_SESSION['uploadError'] = "Wrong Format. Only jpg & png Allowed";
				header("Location: edit-profile.php");
				exit();
			}
		}
	} else {
		$profileOk = false;
	}
	
	//RESUME
	$uploadOk = true;

	if (isset($_FILES)) {

		$folder_dir = "../uploads/resume/";

		$base = basename($_FILES['resume']['name']);

		$resumeFileType = pathinfo($base, PATHINFO_EXTENSION);

		$file = uniqid() . "." . $resumeFileType;

		$filename = $folder_dir . $file;

		if (file_exists($_FILES['resume']['tmp_name'])) {

			if ($resumeFileType == "pdf") {

				if ($_FILES['resume']['size'] < 500000) { // File size is less than 5MB

					move_uploaded_file($_FILES["resume"]["tmp_name"], $filename);
				} else {
					$_SESSION['uploadError'] = "Wrong Size. Max Size Allowed : 5MB";
					header("Location: edit-profile.php");
					exit();
				}
			} else {
				$_SESSION['uploadError'] = "Wrong Format. Only PDF Allowed";
				header("Location: edit-profile.php");
				exit();
			}
		}
	} else {
		$uploadOk = false;
	}

	//Update User Details Query
	$sql = "UPDATE users SET sno='$sno', fname='$fname', address='$address', contactno='$contactno', city='$city', state='$state', dob='$dob', age='$age', gender='$gender', civilstatus='$civilstatus', nationality='$nationality',
	fos='$fos', course='$course', yearAt='$yearAt', cbpassingyear='$cbpassingyear' ,passingyear='$passingyear', qualification='$qualification',
	company_name='$company_name', company_add='$company_add', position='$position', emp_type='$emp_type', datejoined='$datejoined', dateleft='$dateleft', cbdateleft='$cbdateleft',
	company_name1='$company_name1', company_add1='$company_add1', position1='$position1', emp_type1='$emp_type1', datejoined1='$datejoined1', dateleft1='$dateleft1', cbdateleft1='$cbdateleft1',
	company_name2='$company_name2', company_add2='$company_add2', position2='$position2', emp_type2='$emp_type2', datejoined2='$datejoined2', dateleft2='$dateleft2', cbdateleft2='$cbdateleft2',
	skills='$skills' ,aboutme='$aboutme'";

	if ($uploadOk == true) {
		$sql .= ", resume='$file'";
	}

	if ($profileOk == true) {
		$sql = $sql . ", profile='$profile'";
	}

	$sql .= " WHERE id_user='$_SESSION[id_user]'";

	if ($conn->query($sql) === TRUE) {
		$_SESSION['name'] = $fname;
		//If data Updated successfully then redirect to dashboard
		header("Location: edit-profile.php");
		exit();
	} else {
		echo "Error " . $sql . "<br>" . $conn->error;
	}
	//Close database connection. Not compulsory but good practice.
	$conn->close();
} else {
	//redirect them back to dashboard page if they didn't click update button
	header("Location: edit-profile.php");
	exit();
}
