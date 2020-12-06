<?php
include("libs/functions.php");
checkLogin();
include 'snippets/header.php';
include 'snippets/simpleSidebar.php';

$records = getPagesView();

?>
<div class="table-responsive">
    <table class="table table-striped table-sm">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>View</th>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach ($records as $record) {
            ?>
                <tr>
                    <td><?= $record['id'] ?></td>
                    <td><a target="_blank" href="index.php?pageID=<?= $record['id'] ?>"><?= $record['strName'] ?></a></td>
                    <td><?= $record['nView'] ?></td>
                </tr>
            <?php
            }
            ?>
        </tbody>
    </table>
</div>
<?php

include 'snippets/footer.php';
