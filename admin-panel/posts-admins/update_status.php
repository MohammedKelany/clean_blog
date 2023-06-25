<?php require __DIR__ . "/../settings/databases/admin_post.php"; ?>
<?php
$upd_id = $_GET["upd_id"] ?? "";
if ($upd_id && isset($_GET["status"])) {
    if ($_GET["status"] === "0") {
        $allPosts = $postsDB->update_status($upd_id, 1);
    } else if ($_GET["status"] === "1") {
        $allPosts = $postsDB->update_status($upd_id, 0);
    }
}
?>