<?php require __DIR__ . "/../settings/databases/admins_auth.php"; ?>
<?php require "../layout/header.php"; ?>
<?php
if (isset($_SESSION["admin_name"])) {
    header("Location: http://localhost/CMS/admin-panel/index.php");
} else if (isset($_POST["submit"])) {
    if (isset($_POST["email"]) && isset($_POST["password"])) {
        $adminDB->login($_POST["email"], $_POST["password"]);
    }
}
?>
<div class="container-fluid mt-5 p-5">
    <div class="row ">
        <div class="col">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title mt-5">Login</h5>
                    <form method="POST" class="p-auto" action="login-admins.php">
                        <!-- Email input -->
                        <div class="form-outline mb-4">
                            <input type="email" name="email" id="form2Example1" class="form-control" placeholder="Email" />

                        </div>


                        <!-- Password input -->
                        <div class="form-outline mb-4">
                            <input type="password" name="password" id="form2Example2" placeholder="Password" class="form-control" />

                        </div>



                        <!-- Submit button -->
                        <button type="submit" name="submit" class="btn btn-primary  mb-4 text-center">Login</button>


                    </form>

                </div>
            </div>
        </div>
    </div>
</div>