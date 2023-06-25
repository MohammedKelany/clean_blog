<?php require __DIR__ . "/../settings/databases/admin_category.php"; ?>
<?php require "../layout/header.php"; ?>
<?php
if (isset($_POST["submit"])) {
    if (isset($_POST["name"])) {
        $allCategories = $categoriesDB->create_category($_POST["name"]);
    }
}
?>

<div class="container-fluid p-5 mt-5">
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title mb-5 d-inline">Create Categories</h5>
                    <form method="POST" action="" enctype="multipart/form-data">
                        <!-- Email input -->
                        <div class="form-outline mb-4 mt-4">
                            <input type="text" name="name" id="form2Example1" class="form-control" placeholder="name" />
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