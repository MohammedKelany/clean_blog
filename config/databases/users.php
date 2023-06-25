<?php require __DIR__ . "/../database.php"; ?>
<?php
class Users extends UserDatabase
{
    public function login($email, $password)
    {
        $statement = $this->conn->prepare("SELECT COUNT(id) AS num,id,name,email,password FROM users WHERE email=:email AND password=:password ");
        $statement->bindValue("email", $email);
        $statement->bindValue("password", sha1($password));
        $statement->execute();
        $user = $statement->fetch(PDO::FETCH_OBJ);
        if ($user->num > 0) {
            $_SESSION["user_id"] = $user->id;
            $_SESSION["username"] = $user->name;
            $_SESSION["email"] = $user->email;
            header("Location: ../index.php");
        }
    }
    public function register($name, $password, $email)
    {
        //cheacking if there are any error
        $check = $this->conn->prepare("SELECT COUNT(id) AS num FROM users WHERE email=:email OR name=:name");
        $check->bindValue("email", $email);
        $check->bindValue("name", $name);
        $check->execute();
        $num = $check->fetch(PDO::FETCH_OBJ);
        if ($num->num === 0) {
            $statement = $this->conn->prepare("INSERT INTO users(name,password,email) VALUES( :name, :password, :email)");
            $statement->bindValue("name", $name);
            $statement->bindValue("password", sha1($password));
            $statement->bindValue("email", $email);
            $statement->execute();
            header("Location: login.php");
        }
    }
    public function update_profile($username, $email, $id)
    {
        $statement = $this->conn->prepare("UPDATE users SET name=:name,email=:email WHERE id=:id");
        $statement->bindValue("name", $username);
        $statement->bindValue("email", $email);
        $statement->bindValue("id", $id);
        $statement->execute();
        $_SESSION["user_id"] = $id;
        $_SESSION["username"] = $username;
        $_SESSION["email"] = $email;
        header("Location: ../index.php");
    }

    public function logout()
    {
        session_start();
        session_unset();
        session_destroy();
        header("Location: login.php");
    }
}
$userDB = new Users();