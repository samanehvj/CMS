<?php

// processes login, and redirect based on success/failure

// a global file which will have all my functions I want to reuse
include("libs/functions.php");
checkLogin();

if($_POST["userID"])
{
	$success = updateUser($_POST["userID"], $_POST["strEmail"],$_POST["strPassword"]);
} else {
	// save the new page
	$success = saveNewUser($_POST["strEmail"],$_POST["strPassword"]);
}



// redirect...
if ($success)
{
	header("location: users.php?msg=success");
} else {
	header("location: users.php?msg=error");
}

?>