<?php
include("libs/functions.php");
checkLogin();
include 'snippets/header.php';
include 'snippets/simpleSidebar.php';
?>

<?php

$title = "New User";
$btnMessage = "Save User";

// set the default values for the array when id not provided
$arrUser['strEmail'] = "";
$arrUser['strPassword'] = "";
$arrUser['id'] = "";

if (isset($_GET["userID"])) {
	$title = "Edit a User";
	$btnMessage = "Update User";

	// get the page data from the db
	$arrUser = getUser($_GET["userID"]);
}

?>

<h1><?= $title ?></h1>
<a class="btn btn-warning " href="users.php">Back to users</a>
<!-- ------------------- -->
<form method="post" action="saveUser.php">
	<input type="hidden" name="userID" value="<?= $arrUser['id'] ?>" />

	<div class="form-group">
		<label for="email">Email</label>
		<input name="strEmail" type="email" class="form-control" id="email" placeholder="Email" value="<?= $arrUser['strEmail'] ?>">
	</div>
	<div class="form-group">
		<label for="password">Password</label>
		<input name="strPassword" type="text" class="form-control" id="password" placeholder="Password" value="<?= $arrUser['strPassword'] ?>">
	</div>


	<button type="submit" class="btn btn-primary"><?= $btnMessage ?></button>
</form>



<?php
include 'snippets/footer.php';
