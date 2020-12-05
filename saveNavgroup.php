<?php

// processes login, and redirect based on success/failure

// a global file which will have all my functions I want to reuse
include("libs/functions.php");
checkLogin();

if ($_POST["navgroupID"]) {
	$success = updateNav($_POST["navgroupID"], $_POST["strName"]);
} else {
	// save the new page
	$success = saveNewNav($_POST["strName"]);
}

// redirect...
if ($success) {
	header("location: navigation.php?msg=success");
} else {
	header("location: navigation.php?msg=pageerror");
}
