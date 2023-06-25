<?php require __DIR__ . "/../database.php"; ?>
<?php
class Posts extends UserDatabase
{
    public function create_post($title, $sub_title, $body, $img, $category_id, $category_name)
    {
        $statement = $this->conn->prepare("INSERT INTO posts(user_id,username, title, sub_title, body, img,category_id,category_name) VALUES(:user_id ,:username ,:title , :sub_title , :body , :img,:category_id,:category_name)");
        $statement->bindValue("user_id", $_SESSION["user_id"]);
        $statement->bindValue("username", $_SESSION["username"]);
        $statement->bindValue("title", $title);
        $statement->bindValue("sub_title", $sub_title);
        $statement->bindValue("body", $body);
        $statement->bindValue("img", $img);
        $statement->bindValue("category_id", $category_id);
        $statement->bindValue("category_name", $category_name);
        $statement->execute();
        header("Location: http://localhost/CMS/index.php");
    }
    public function get_posts()
    {
        $statement = $this->conn->prepare("SELECT * FROM posts WHERE status = 1 ");
        $statement->execute();
        $allPosts = $statement->fetchAll(PDO::FETCH_OBJ);
        return $allPosts;
    }
    public function delete_post_by_id($id)
    {
        $statement = $this->conn->prepare("DELETE FROM posts WHERE id=:id");
        $statement->bindValue("id", $id);
        $statement->execute();
        header("Location: http://localhost/CMS/index.php");
    }
    public function get_post_by_id($id)
    {
        $statement = $this->conn->prepare("SELECT * FROM posts WHERE id=:id");
        $statement->bindValue("id", $id);
        $statement->execute();
        $post = $statement->fetch(PDO::FETCH_OBJ);
        return $post;
    }
    public function update_post($id, $title, $sub_title, $body, $img, $category_id)
    {
        $statement = $this->conn->prepare("UPDATE posts SET title=:title ,sub_title=:sub_title,body=:body,img=:img,category_id=:category_id WHERE id=:id ");
        $statement->bindValue("id", $id);
        $statement->bindValue("category_id", $category_id);
        $statement->bindValue("title", $title);
        $statement->bindValue("sub_title", $sub_title);
        $statement->bindValue("body", $body);
        $statement->bindValue("img", $img);
        $statement->execute();
        header("Location: http://localhost/CMS/index.php");
    }
    public function get_categries()
    {
        $statement = $this->conn->prepare("SELECT * FROM categories");
        $statement->execute();
        $allCategories = $statement->fetchAll(PDO::FETCH_OBJ);
        return $allCategories;
    }
    public function get_posts_by_category($category_id)
    {
        $statement = $this->conn->prepare("SELECT * FROM posts WHERE category_id=:category_id");
        $statement->bindValue("category_id", $category_id);
        $statement->execute();
        $post = $statement->fetchAll(PDO::FETCH_OBJ);
        return $post;
    }
    public function create_comment($comment, $post_id, $post_title)
    {
        $statement = $this->conn->prepare("INSERT INTO comments(user_id,username,comment,post_id,post_title) VALUES(:user_id ,:username ,:comment , :post_id,:post_title)");
        $statement->bindValue("user_id", $_SESSION["user_id"]);
        $statement->bindValue("username", $_SESSION["username"]);
        $statement->bindValue("comment", $comment);
        $statement->bindValue("post_id", $post_id);
        $statement->bindValue("post_title", $post_title);
        $statement->execute();
        header("Location: http://localhost/CMS/index.php");
    }
    public function get_comments($post_id)
    {
        $statement = $this->conn->prepare("SELECT * FROM comments WHERE status = 1 AND post_id=:post_id ");
        $statement->bindValue("post_id", $post_id);
        $statement->execute();
        $allComments = $statement->fetchAll(PDO::FETCH_OBJ);
        return $allComments;
    }
    public function delete_comment_by_id($id)
    {
        $statement = $this->conn->prepare("DELETE FROM comments WHERE id=:id");
        $statement->bindValue("id", $id);
        $statement->execute();
        header("Location: http://localhost/CMS/index.php");
    }
}
$postsDB = new Posts();
?>