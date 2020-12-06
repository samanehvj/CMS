<?php
include("libs/functions.php");
checkLogin();
include 'snippets/header.php';
include 'snippets/simpleSidebar.php';
?>

<?php
$title = "New Nav Group";
$btnMessage = "Save Nav Group";

// set the default values for the array when id not provided
$arrPage['strName'] = "";
$arrPage['id'] = "";

if (isset($_GET["navgroupID"])) {
	$title = "Edit a Page";
	$btnMessage = "Update Page";

	// get the page data from the db
	$arrPage = getNavGroup($_GET["navgroupID"]);
}

?>

<h1><?= $title ?></h1>
<a class="btn btn-warning " href="navigation.php">Back to navigation</a>
<!-- ------------------------- -->
<form method="post" action="saveNavgroup.php">
	<input type="hidden" name="navgroupID" value="<?= $arrPage['id'] ?>" />

	<div class="form-group">
		<label for="name">Navigation group Name</label>
		<input name="strName" type="text" class="form-control" id="name" placeholder="Page name" value="<?= $arrPage['strName'] ?>">
	</div>

	<button type="submit" class="btn btn-primary"><?= $btnMessage ?></button>
</form>

<?php
include 'snippets/footer.php';
