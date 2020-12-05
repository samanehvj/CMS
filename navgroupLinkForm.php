<?php
include("libs/functions.php");
checkLogin();
include 'snippets/header.php';
include 'snippets/simpleSidebar.php';
?>

<?php

$groupData = getNavGroup($_GET["recordID"]);
$pages = getPages();
$whichPagesCheckedOff = getPagesInGroup($_GET["recordID"]);

?>

<h1>Link Pages to The Navigation Group</h1>
<h2><?= $groupData["strName"] ?></h2>

<a class="btn btn-warning" href="navigation.php">Back to navgroup listing</a>

<!-- --------------- -->

<form method="post" action="saveNavigation.php">
	<input type="hidden" name="whichGroupID" value="<?= $_GET['recordID'] ?>" />

	<?php
	if ($pages) {
		foreach ($pages as $page) {

			$checked = (isset($whichPagesCheckedOff[$page["id"]])) ? "checked" : "";
	?>
			<div class="custom-control custom-checkbox">
				<input type="checkbox" class="custom-control-input" id="page-<?= $page["id"] ?>" name="whichPages[]" value="<?= $page["id"] ?>" <?= $checked ?>>
				<label class="custom-control-label" for="page-<?= $page["id"] ?>"><?= $page["strName"] ?></label>
			</div>
	<?php
		}
	} ?>


	<button type="submit" class="btn btn-primary">Submit</button>
</form>



<?php
include 'snippets/footer.php';
