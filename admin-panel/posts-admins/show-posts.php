<?php require __DIR__ . "/../settings/databases/admin_post.php"; ?>
<?php require "../layout/header.php"; ?>
<?php
$allPosts = $postsDB->get_posts();
?>
<div class="container-fluid p-5 mt-5">
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title mb-4 d-inline">Posts</h5>

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
                            <?php foreach ($allPosts as $post) : ?>
                            <tr>
                                <th scope="row"><?php echo $post->id ?></th>
                                <td><?php echo $post->title ?></td>
                                <td><?php echo $post->category_name ?></td>
                                <td><?php echo $post->username ?></td>
                                <td><a href="update_status.php?upd_id=<?php echo $post->id ?>&status=<?php echo $post->status ?>"
                                        class="btn <?php echo $post->status ? "btn-primary" : "btn-danger" ?>   text-center "><?php echo $post->status ? "activated" : "deactivates" ?></a>
                                </td>
                                <td><a href="delete-posts.php?del_id=<?php echo $post->id ?>"
                                        class="btn btn-danger  text-center ">delete</a></td>
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