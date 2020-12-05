<?php

// processes login, and redirect based on success/failure

// a global file which will have all my functions I want to reuse
include("libs/functions.php");
checkLogin();

// save the new page
$success = deleteUser($_GET["userID"]);
header("location: users.php?msg=deletesuccess");

?>