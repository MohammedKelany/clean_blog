<?php require __DIR__ . "/../settings/databases/admins_auth.php"; ?>
<?php require "../layout/header.php"; ?>
<?php
$allAdmins = $adminDB->get_admins();
?>
<div class="container-fluid mt-5 p-5">

    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title mb-4 d-inline">Admins</h5>
                    <a href="create-admins.php" class="btn btn-primary mb-4 text-center float-right">Create Admins</a>
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">username</th>
                                <th scope="col">email</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($allAdmins as $admin) : ?>
                            <tr>
                                <th scope="row"><?php echo $admin->id ?></th>
                                <td><?php echo $admin->name ?></td>
                                <td><?php echo $admin->email ?></td>
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