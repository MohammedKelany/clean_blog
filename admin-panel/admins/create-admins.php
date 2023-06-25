<?php require __DIR__ . "/../settings/databases/admins_auth.php"; ?>
<?php require "../layout/header.php"; ?>

<?php
if (isset($_POST["submit"])) {
  if (isset($_POST["admin_name"]) && isset($_POST["email"]) && isset($_POST["password"])) {
    $adminDB->register($_POST["admin_name"], $_POST["password"], $_POST["email"]);
  }
}
?>

<div class="container-fluid mt-5 p-5">
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title mb-5 d-inline">Create Admins</h5>
                    <form method="POST" action="create-admins.php" enctype="multipart/form-data">
                        <!-- Email input -->
                        <div class="form-outline mb-4 mt-4">
                            <input type="email" name="email" id="form2Example1" class="form-control"
                                placeholder="email" />

                        </div>

                        <div class="form-outline mb-4">
                            <input type="text" name="admin_name" id="form2Example1" class="form-control"
                                placeholder="username" />
                        </div>
                        <div class="form-outline mb-4">
                            <input type="password" name="password" id="form2Example1" class="form-control"
                                placeholder="password" />
                        </div>

                        <!-- Submit button -->
                        <button type="submit" name="submit" class="btn btn-primary  mb-4 text-center">create</button>


                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">

</script>
</body>

</html>