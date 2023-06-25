<?php require __DIR__ . "/database.php"; ?>
<?php
class AdminCategories extends AdminDatabase
{
    public function get_categries()
    {
        $statement = $this->conn->prepare("SELECT * FROM categories");
        $statement->execute();
        $allCategories = $statement->fetchAll(PDO::FETCH_OBJ);
        return $allCategories;
    }
    public function delete_categries($id)
    {
        $statement = $this->conn->prepare("DELETE FROM categories WHERE id=:id");
        $statement->bindValue("id", $id);
        $statement->execute();
        header("Location: http://localhost/CMS/admin-panel/categories-admins/show-categories.php");
    }
    public function update_categries($id, $name)
    {
        $check = $this->conn->prepare("SELECT COUNT(id) AS num FROM categories WHERE name=:name");
        $check->bindValue("name", $name);
        $check->execute();
        $num = $check->fetch(PDO::FETCH_OBJ);
        if ($num->num === 0) {
            $statement = $this->conn->prepare("UPDATE categories SET name=:name WHERE id=:id");
            $statement->bindValue("name", $name);
            $statement->bindValue("id", $id);
            $statement->execute();
            header("Location: http://localhost/CMS/admin-panel/categories-admins/show-categories.php");
        }
    }
    public function create_category($name)
    {
        $check = $this->conn->prepare("SELECT COUNT(id) AS num FROM categories WHERE name=:name");
        $check->bindValue("name", $name);
        $check->execute();
        $num = $check->fetch(PDO::FETCH_OBJ);
        if ($num->num === 0) {
            $statement = $this->conn->prepare("INSERT INTO categories(name) VALUES(:name)");
            $statement->bindValue("name", $name);
            $statement->execute();
            header("Location: http://localhost/CMS/admin-panel/categories-admins/show-categories.php");
        }
    }
}

$categoriesDB = new AdminCategories();
