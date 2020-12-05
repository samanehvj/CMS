<?php
include("libs/functions.php");
checkLogin();
include 'snippets/header.php';
include 'snippets/simpleSidebar.php';
?>



<h2 class="text-center">Pages</h2>
<a class="btn btn-primary " href="pageForm.php">Add Page</a>
<?php
$records = getPages(); // false, or array
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
					<th>View</th>
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
						<td><?= $record['nView'] ?></td>
						<td>
							<a target="_blank" class="btn btn-success" href="index.php?pageID=<?= $record["id"] ?>">View</a>
							<a class="btn btn-info" href="pageForm.php?pageID=<?= $record["id"] ?>">Edit</a>
							<a class="btn btn-danger" href="pagesDelete.php?pageID=<?= $record["id"] ?>">Delete</a>
						</td>
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
