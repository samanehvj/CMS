<?php

// processes login, and redirect based on success/failure

// a global file which will have all my functions I want to reuse
include("libs/functions.php");
checkLogin();

// save the new page
$success = deletePage($_GET["pageID"]);
header("location: pages.php?msg=deletesuccess");

?>