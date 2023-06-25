<?php require __DIR__ . "/../settings/databases/admin_comments.php"; ?>
<?php
$del_id = $_GET["del_id"] ?? "";
$commentDB->delete_comment($del_id);
?>