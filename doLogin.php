<?php

// processes login, and redirect based on success/failure

// a global file which will have all my functions I want to reuse
include("libs/functions.php");

// true, or false
$success = processLogin($_POST["strEmail"], $_POST["strPassword"]);


if ($success) {
	header("location: dashboard.php");
} else {
	header("location: admin.php?error=1");
}
