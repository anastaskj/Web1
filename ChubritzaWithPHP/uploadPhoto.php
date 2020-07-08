<?php
session_start();
include_once 'includes/dbh_inc.php';
$id = $_SESSION['u_id'];



if (isset($_POST['submit'])) {
	$file = $_FILES['file'];

	$fileName = $_FILES['file']['name'];
	$fileTmpName = $_FILES['file']['tmp_name'];
	$fileSize = $_FILES['file']['size'];
	$fileError = $_FILES['file']['error'];
	$fileType = $_FILES['file']['type'];

	$fileExtention = explode('.', $fileName);
	$realFileExtention = strtolower(end($fileExtention));

	if ($realFileExtention == 'jpg') 
	{
		if ($fileError === 0) 
		{
			if ($fileSize < 500000) 
			{
				$fileNameNew = "profile".$id.".".$realFileExtention;
				$fileDestination = 'uploads/'.$fileNameNew;

				//uploading file
				move_uploaded_file($fileTmpName, $fileDestination);

				$sql = "UPDATE profile_image SET picstatus = 0 WHERE userid = '$id';";
				$result = mysqli_query($conn, $sql);
				header("Location: MyAccount.php?uploadsuccess");
			}
			else
			{
				echo "The file is too big.";
			}
		}
		else
		{
			echo "Error uploading file.";
		}
	}
	else
	{
		echo "Files need to be jpg";
	}
}