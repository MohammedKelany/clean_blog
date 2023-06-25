<?php require __DIR__ . "/database.php"; ?>
<?php
class Admins extends AdminDatabase
{
    public function login($email, $password)
    {
        $statement = $this->conn->prepare("SELECT COUNT(id) AS num,id,name,email,password FROM admins WHERE email=:email AND password=:password ");
        $statement->bindValue("email", $email);
        $statement->bindValue("password", sha1($password));
        $statement->execute();
        $user = $statement->fetch(PDO::FETCH_OBJ);
        if ($user->num > 0) {
            $_SESSION["admin_id"] = $user->id;
            $_SESSION["admin_name"] = $user->name;
            $_SESSION["admin_email"] = $user->email;
            header("Location: http://localhost/CMS/admin-panel/index.php");
        }
    }
    public function register($name, $password, $email)
    {
        //cheacking if there are any error
        $check = $this->conn->prepare("SELECT COUNT(id) AS num FROM admins WHERE email=:email OR name=:name");
        $check->bindValue("email", $email);
        $check->bindValue("name", $name);
        $check->execute();
        $num = $check->fetch(PDO::FETCH_OBJ);
        if ($num->num === 0) {
            $statement = $this->conn->prepare("INSERT INTO admins(name,password,email) VALUES( :name, :password, :email)");
            $statement->bindValue("name", $name);
            $statement->bindValue("password", sha1($password));
            $statement->bindValue("email", $email);
            $statement->execute();
            session_start();
            session_unset();
            session_destroy();
            header("Location: login-admins.php");
        }
    }
    public function update_profile($username, $email, $id)
    {
        $statement = $this->conn->prepare("UPDATE admins SET name=:name,email=:email WHERE id=:id");
        $statement->bindValue("name", $username);
        $statement->bindValue("email", $email);
        $statement->bindValue("id", $id);
        $statement->execute();
        $_SESSION["user_id"] = $id;
        $_SESSION["username"] = $username;
        $_SESSION["email"] = $email;
        header("Location: http://localhost/CMS/admin-panel/index.php");
    }

    public function logout()
    {
        session_start();
        session_unset();
        session_destroy();
        header("Location: login-admins.php");
    }
    public function get_admins()
    {
        $statement = $this->conn->prepare("SELECT * FROM admins");
        $statement->execute();
        return $statement->fetchAll(PDO::FETCH_OBJ);
    }
}

$adminDB = new Admins();
