<?php

session_start();
$id = $_SESSION['u_id'];

if (isset($_POST['submit'])) 
{
	include_once 'dbh_inc.php';
	$recipe_name = mysqli_real_escape_string($conn, $_POST['recipe_name']);
	$recipe_ingredients= mysqli_real_escape_string($conn, $_POST['recipe_ingredients']);
	$recipe_category = mysqli_real_escape_string($conn, $_POST['recipe_category']);
	$recipe_description = mysqli_real_escape_string($conn, $_POST['recipe_description']);
	

	//empty field check
	if ( empty($recipe_description) || empty($recipe_name) || empty($recipe_category) || empty($recipe_ingredients))
	{
		header("Location: ../MyAccount/Upload.php?uploadrecipe=empty");
		exit();
	} 
	else 
	{
		//valid input check
		if (!preg_match("/^[a-z A-Z]*$/", $recipe_name)) 
		{
			header("Location: ../MyAccount/Upload.php?uploadrecipe=invalidname");
			exit();
		} 
		else
		{
			//unique user check
			$sql = "SELECT * FROM recipes WHERE recipe_name = '$recipe_name';";
			$result = mysqli_query($conn, $sql);
			$resultCheck = mysqli_num_rows($result);
			if ($resultCheck>0) 
			{
				header("Location: ../MyAccount/Upload.php?uploadrecipe=nametaken");
				exit();
			}
			else 
			{
				if (strlen($recipe_name)>30) 
				{
					header("Location: ../MyAccount/Upload.php?uploadrecipe=nametoolong");
					exit();
				}
				else
				{
					//insert new recipe into database
					$ins = "INSERT INTO recipes (recipe_name, recipe_ingredients, recipe_category, recipe_description, user_id) VALUES ('$recipe_name', '$recipe_ingredients', '$recipe_category', '$recipe_description', '$id');";
					mysqli_query($conn, $ins);

					$selectUser = "SELECT * FROM recipes WHERE user_id = '$id';";
					$result = mysqli_query($conn, $sql);
					if (mysqli_num_rows($result) > 0) 
					{
						while ($row = mysqli_fetch_assoc($result)) 
						{
							$recipeid = $row['recipe_id'];
							$ins = "INSERT INTO recipe_image (recipeid, picstatus) VALUES ('$recipeid', 1);";
							$result = mysqli_query($conn, $ins);
							header("Location: ../MyAccount/Upload.php?uploadrecipe=success");
							exit();
						}
					}		
				}
				
			}
		}
	}
} 
else 
{
	header("Location: ../SignUp.php");
	exit();
}