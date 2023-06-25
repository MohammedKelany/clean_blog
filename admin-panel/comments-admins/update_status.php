<?php require __DIR__ . "/../settings/databases/admin_comments.php"; ?>
<?php
$upd_id = $_GET["upd_id"] ?? "";
if ($upd_id && isset($_GET["status"])) {
    if ($_GET["status"] === "0") {
        $commentDB->update_status($upd_id, 1);
    } else if ($_GET["status"] === "1") {
        $commentDB->update_status($upd_id, 0);
    }
}
?>