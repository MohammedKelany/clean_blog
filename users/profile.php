<?php require __DIR__ . "/../includes/header.php"; ?>
<?php require __DIR__ . "/../config/databases/users.php" ?>
<?php
if (isset($_POST["submit"])) {
    if (isset($_POST["email"]) && isset($_POST["username"]) && $_POST["email"] && $_POST["username"]) {
        $userDB->update_profile($_POST["username"], $_POST["email"], $_SESSION["user_id"]);
    }
}
?>
<!-- Page Header-->
<header class="masthead" style="background-image: url('../assets/img/home-bg.jpg')">
    <div class="container position-relative px-4 px-lg-5">
        <div class="row gx-4 gx-lg-5 justify-content-center">
            <div class="col-md-10 col-lg-8 col-xl-7">
                <div class="site-heading">
                    <h1>Clean Blog</h1>
                    <span class="subheading">A Blog Theme by Start Bootstrap</span>
                </div>
            </div>
        </div>
    </div>
</header>

<!-- Main Content-->
<div class="container px-4 px-lg-5">

    <form method="POST" action="profile.php">
        <!-- Email input -->
        <div class="form-outline mb-4">
            <input type="text" name="username" id="form2Example1" class="form-control" placeholder="Username" />

        </div>

        <!-- Password input -->
        <div class="form-outline mb-4">
            <input type="email" name="email" id="form2Example2" placeholder="Email" class="form-control" />

        </div>

        <!-- Submit button -->
        <button type="submit" name="submit" class="btn btn-primary  mb-4 text-center">Update Profile</button>

    </form>
</div>
<!-- Footer-->
<?php require __DIR__ . "/../includes/footer.php"; ?>