<?php require __DIR__ . "/database.php"; ?>
<?php
class AdminDashbourd extends AdminDatabase
{
    public function get_dashbourd_data()
    {
        $admins = $this->conn->prepare("SELECT COUNT(id) AS admins_num FROM admins");
        $posts = $this->conn->prepare("SELECT COUNT(id) AS posts_num FROM posts");
        $categories = $this->conn->prepare("SELECT COUNT(id) AS categories_num FROM categories");
        $admins->execute();
        $data = [];
        $data["admins_num"] = $admins->fetch(PDO::FETCH_ASSOC)["admins_num"];
        $posts->execute();
        $data["posts_num"] = $posts->fetch(PDO::FETCH_ASSOC)["posts_num"];
        $categories->execute();
        $data["categories_num"] = $categories->fetch(PDO::FETCH_ASSOC)["categories_num"];
        return $data;
    }
}

$dashbourdDB = new AdminDashbourd();
