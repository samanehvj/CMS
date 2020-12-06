<?php

// processes login, and redirect based on success/failure

// a global file which will have all my functions I want to reuse
include("libs/functions.php");
checkLogin();

if($_POST["pageID"])
{
	$success = updatePage($_POST["pageID"], $_POST["strName"],$_POST["strBody"]);
} else {
	// save the new page
	$success = saveNewPage($_POST["strName"],$_POST["strBody"]);
}

// redirect...
if ($success)
{
	header("location: pages.php?msg=success");
} else {
	header("location: pages.php?msg=pageerror");
}

?>