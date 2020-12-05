<?php
include("libs/functions.php");
checkLogin();
include 'snippets/header.php';
include 'snippets/simpleSidebar.php';
?>

<h2>Navigation Areas</h2>
<a class="btn btn-primary " href="navgroupForm.php">Add Nav Group</a>
<?php
$records = getNavigationAreas(); // false, or array
if ($records) {
	$i = 1;
?>
	<div class="table-responsive">
		<table class="table table-striped table-sm">
			<thead>
				<tr>
					<th>#</th>
					<th>ID</th>
					<th>Name</th>
					<th>Action</th>
				</tr>
			</thead>
			<tbody>
				<?php
				foreach ($records as $record) {
				?>
					<tr>
						<td><?= $i++ ?></td>
						<td><?= $record['id'] ?></td>
						<td><?= $record['strName'] ?></td>
						<td><a class="btn btn-warning" href="navgroupForm.php?navgroupID=<?= $record["id"] ?>">Manage</a> <a class="btn btn-info" href="navgroupLinkForm.php?recordID=<?= $record["id"] ?>">Edit</a> </td>
					</tr>
				<?php
				}
				?>
			</tbody>
		</table>
	</div>
<?php
}
?>



<?php
include 'snippets/footer.php';
