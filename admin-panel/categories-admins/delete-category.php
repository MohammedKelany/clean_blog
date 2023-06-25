<?php require __DIR__ . "/../settings/databases/admin_category.php"; ?>
<?php require "../layout/header.php"; ?>
<?php
$del_id = $_GET["del_id"] ?? "";
if ($del_id) {
    $allCategories = $categoriesDB->delete_categries($del_id);
}
?>