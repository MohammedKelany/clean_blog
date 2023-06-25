<?php require __DIR__ . "/database.php"; ?>
<?php
class AdminComments extends AdminDatabase
{
    public function get_comments()
    {
        $statement = $this->conn->prepare("SELECT * FROM comments");
        $statement->execute();
        $allComments = $statement->fetchAll(PDO::FETCH_OBJ);
        return $allComments;
    }
    public function update_status($id, $status)
    {
        $statement = $this->conn->prepare("UPDATE comments SET status=:status WHERE id=:id");
        $statement->bindValue("status", $status);
        $statement->bindValue("id", $id);
        $statement->execute();
        header("Location: http://localhost/CMS/admin-panel/comments-admins/show-comments.php");
    }
    public function delete_comment($id)
    {
        $statement = $this->conn->prepare("DELETE FROM comments WHERE id=:id");
        $statement->bindValue("id", $id);
        $statement->execute();
        header("Location: http://localhost/CMS/admin-panel/comments-admins/show-comments.php");
    }
}

$commentDB = new AdminComments();
