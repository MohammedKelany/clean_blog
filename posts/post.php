<?php require __DIR__ . "/../includes/header.php"; ?>
<?php require __DIR__ . "/../config/databases/posts.php" ?>
<?php
if (isset($_GET["post_id"])) {
    $post = $postsDB->get_post_by_id($_GET["post_id"]);
    if (isset($_GET["c_comment_id"])) {
        $postsDB->create_comment($_POST["comment"], $_GET["c_comment_id"], $post->title);
    }
    $comments = $postsDB->get_comments($_GET["post_id"]);
}
?>

<!-- Page Header-->
<header class="masthead" style="background-image: url('http://localhost/CMS/posts/images/<?php echo $post->img ?>')">
    <div class="container position-relative px-4 px-lg-5">
        <div class="row gx-4 gx-lg-5 justify-content-center">
            <div class="col-md-10 col-lg-8 col-xl-7">
                <div class="post-heading">
                    <h1><?php echo isset($_GET["post_id"])  ? $post->title : "Man must explore, and this is exploration
                        at its greatest" ?></h1>
                    <h2 class="subheading">
                        <?php echo isset($_GET["post_id"])  ? $post->sub_title : "Problems look mighty small from 150 miles up" ?>
                    </h2>
                    <span class="meta">
                        Posted by
                        <a href="#!">
                            <?php echo isset($_GET["post_id"])  ? $post->username : "Problems look mighty small from 150 miles up" ?></a>
                        on
                        <?php echo isset($_GET["post_id"])  ? date("M d, Y", strtotime($post->created_at)) : "August 24, 2022" ?>
                    </span>
                </div>
            </div>
        </div>
    </div>
</header>
<!-- Post Content-->
<article class="mb-4">
    <div class="container px-4 px-lg-5">
        <div class="row gx-4 gx-lg-5 justify-content-center">
            <div class="col-md-10 col-lg-8 col-xl-7">
                <p><?php echo isset($_GET['post_id']) ? $post->body : "Never in all their history have men been able truly to conceive of the world as one: a single
                    sphere, a globe, having the qualities of a globe, a round earth in which all the directions
                    eventually meet, in which there is no center because every point, or none, is center — an equal
                    earth which all men occupy as equals. The airman's earth, if free men make it, will be truly
                    round: a globe in practice, not in theory." ?></p>
            </div>
        </div>
    </div>
</article>
<?php if ($_SESSION["username"] == $post->username && $_SESSION["user_id"] == $post->user_id) : ?>
    <div class="container d-flex justify-content-evenly my-3">
        <a class="btn btn-warning rounded-3" href="update.php?post_id=<?php echo $post->id ?>&img=<?php echo $post->img ?>">Update</a>
        <a class="btn btn-danger rounded-3" href="delete.php?post_id=<?php echo $post->id ?>&img=<?php echo $post->img ?>">Delete</a>
    </div>
<?php endif; ?>
<section>
    <div class="container my-5 py-5">
        <div class="row d-flex justify-content-center">
            <div class="col-md-12 col-lg-10 col-xl-8">
                <h3 class="mb-5">Comments</h3>

                <div class="card">
                    <div class="card-body">

                        <?php foreach ($comments as $comment) : ?>
                            <div class="d-flex flex-start align-items-center">

                                <div>
                                    <h6 class="fw-bold text-primary"><?php echo $comment->username ?><h8 class="p-3 text-black">
                                            (<?php echo date("M Y", strtotime($comment->created_at)) ?>)
                                        </h8>
                                    </h6>

                                </div>
                            </div>

                            <p class="mt-3 mb-4 pb-2">
                                <?php echo $comment->comment ?>
                            </p>
                            <hr class="my-4" />
                        <?php endforeach; ?>

                    </div>
                    <form method="post" action="post.php?post_id=<?php echo $_GET["post_id"] ?>&c_comment_id=<?php echo $_GET["post_id"] ?>">

                        <div class="card-footer py-3 border-0" style="background-color: #f8f9fa;">

                            <div class="d-flex flex-start w-100">

                                <div class="form-outline w-100">
                                    <textarea class="form-control" id="" placeholder="write message" rows="4" name="comment"></textarea>

                                </div>
                            </div>
                            <div class="float-end mt-2 pt-1">
                                <button type="submit" name="submit" class="btn btn-primary btn-sm mb-3">Post
                                    comment</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Footer-->
<?php require __DIR__ . "/../includes/footer.php"; ?>