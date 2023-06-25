<?php require __DIR__ . "/../settings/databases/admin_comments.php"; ?>
<?php require "../layout/header.php"; ?>
<?php
$allComments = $commentDB->get_comments();
?>
<div class="container-fluid p-5 mt-5">
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title mb-4 d-inline">Comments</h5>

                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">title</th>
                                <th scope="col">category</th>
                                <th scope="col">user</th>
                                <th scope="col">status</th>
                                <th scope="col">delete</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($allComments as $comment) : ?>
                                <tr>
                                    <th scope="row"><?php echo $comment->comment ?></th>
                                    <td><?php echo $comment->post_title ?></td>
                                    <td><?php echo $comment->comment ?></td>
                                    <td><?php echo $comment->username ?></td>
                                    <td><a href="update_status.php?upd_id=<?php echo $comment->id ?>&status=<?php echo $comment->status ?>" class="btn <?php echo $comment->status ? "btn-primary" : "btn-danger" ?>   text-center "><?php echo $comment->status ? "activated" : "deactivates" ?></a>
                                    </td>
                                    <td><a href="delete-comments.php?del_id=<?php echo $comment->id ?>" class="btn btn-danger  text-center ">delete</a></td>
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