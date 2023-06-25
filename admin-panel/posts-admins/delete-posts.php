<?php require __DIR__ . "/../settings/databases/admin_post.php"; ?>
<?php
$del_id = $_GET["del_id"] ?? "";
$allPosts = $postsDB->delete_post($del_id);
?>