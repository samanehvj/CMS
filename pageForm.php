<?php
include("libs/functions.php");
checkLogin();
include 'snippets/header.php';
include 'snippets/simpleSidebar.php';
?>


<?php
$title = "New Page";
$btnMessage = "Save Page";

// set the default values for the array when id not provided
$arrPage['strName'] = "";
$arrPage['strBody'] = "";
$arrPage['id'] = "";

if (isset($_GET["pageID"])) {
	$title = "Edit a Page";
	$btnMessage = "Update Page";

	// get the page data from the db
	$arrPage = getPage($_GET["pageID"]);
}

?>

<h1><?= $title ?></h1>
<a class="btn btn-warning" href="pages.php">Back to pages</a>
<!-- ------------------------- -->
<form method="post" action="savePage.php">
	<input type="hidden" name="pageID" value="<?= $arrPage['id'] ?>" />

	<div class="form-group">
		<label for="name">Page Name</label>
		<input name="strName" type="text" class="form-control" id="name" placeholder="Page name" value="<?= $arrPage['strName'] ?>">
	</div>
	<div class="form-group">
		<label for="body">Page Body</label>
		<textarea name="strBody" class="form-control" id="body" rows="3"><?= $arrPage['strBody'] ?></textarea>
	</div>

	<button type="submit" class="btn btn-primary"><?= $btnMessage ?></button>
</form>


<?php
include 'snippets/footer.php';
