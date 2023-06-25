<?php require __DIR__ . "/../config/databases/posts.php" ?>
<?php
session_start();
if (isset($_GET['post_id']) && isset($_GET['img'])) {
    $post = $postsDB->get_post_by_id($_GET['post_id']);
    if ($_SESSION["username"] == $post->username && $_SESSION["user_id"] == $post->user_id) {
        echo unlink("images/" . $_GET['img']) ? "Done" : "false";
        $postsDB->delete_post_by_id($_GET['post_id']);
    }
} else {
    header("Location: ../index.php");
}
?>