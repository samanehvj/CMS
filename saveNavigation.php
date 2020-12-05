<?php

// processes login, and redirect based on success/failure

// a global file which will have all my functions I want to reuse
include("libs/functions.php");
checkLogin();

updateNavGroup($_POST["whichGroupID"], $_POST["whichPages"]);

header("location: navigation.php");
?>