<?php require __DIR__ . "/database.php"; ?>
<?php
class AdminPosts extends AdminDatabase
{
    public function get_posts()
    {
        $statement = $this->conn->prepare("SELECT * FROM posts");
        $statement->execute();
        $allPosts = $statement->fetchAll(PDO::FETCH_OBJ);
        return $allPosts;
    }
    public function get_post_by_id($id)
    {
        $statement = $this->conn->prepare("SELECT * FROM posts WHERE id=:id");
        $statement->bindValue("id", $id);
        $statement->execute();
        $post = $statement->fetch(PDO::FETCH_OBJ);
        return $post;
    }
    public function update_status($id, $status)
    {
        $statement = $this->conn->prepare("UPDATE posts SET status=:status WHERE id=:id");
        $statement->bindValue("status", $status);
        $statement->bindValue("id", $id);
        $statement->execute();
        header("Location: http://localhost/CMS/admin-panel/posts-admins/show-posts.php");
    }
    public function delete_post($id)
    {
        $statement = $this->conn->prepare("DELETE FROM posts WHERE id=:id");
        $statement->bindValue("id", $id);
        $statement->execute();
        header("Location: http://localhost/CMS/admin-panel/posts-admins/show-posts.php");
    }
}

$postsDB = new AdminPosts();
