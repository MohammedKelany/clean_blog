<?php require __DIR__ . "/../settings/databases/admin_category.php"; ?>
<?php require "../layout/header.php"; ?>
<?php
$allCategories = $categoriesDB->get_categries();
?>
<div class="container-fluid p-5 mt-5">

    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title mb-4 d-inline">Categories</h5>
                    <a href="create-category.php" class="btn btn-primary mb-4 text-center float-right">Create
                        Categories</a>
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">name</th>
                                <th scope="col">update</th>
                                <th scope="col">delete</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($allCategories as $category) : ?>
                                <tr>
                                    <th scope="row"><?php echo $category->id ?></th>
                                    <td><?php echo $category->name ?> </td>
                                    <td><a href="update-category.php?upd_id=<?php echo $category->id ?>" class="btn btn-warning text-white text-center ">Update
                                            Categories</a></td>
                                    <td><a href="delete-category.php?del_id=<?php echo $category->id ?>" class="btn btn-danger  text-center ">Delete
                                            Categories</a></td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>



</div>
<script type="text/javascript">

</script>
</body>

</html>