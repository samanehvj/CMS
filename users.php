<?php
include("libs/functions.php");
checkLogin();
include 'snippets/header.php';
include 'snippets/simpleSidebar.php';
?>


<h2>Users</h2>
<a class="btn btn-primary " href="userForm.php">Add User</a>
<?php
$records = getUsers(); // false, or array
if ($records) {
	$i = 1;
?>
	<div class="table-responsive mt-5">
		<table class="table table-striped table-sm">
			<thead>
				<tr>
					<th>#</th>
					<th>ID</th>
					<th>Email</th>
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
						<td><?= $record['strEmail'] ?></td>
						<td><a class="btn btn-info" href="userForm.php?userID=<?= $record["id"] ?>">Edit</a> <a class="btn btn-danger" href="userDelete.php?userID=<?= $record["id"] ?>">Delete</a></td>
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
