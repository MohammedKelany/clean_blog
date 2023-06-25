<?php require "../includes/header.php"; ?>
<?php require "../config/databases/posts.php"; ?>
<?php
if (isset($_GET["cat_id"])) {
    $allPostsOfACategory = $postsDB->get_posts_by_category($_GET["cat_id"]);
}
?>
<?php if (!isset($_SESSION["username"])) {
    header("Location: http://localhost/CMS/auth/login.php");
} ?>
<!-- Page Header-->
<header class="masthead" style="background-image: url('assets/img/home-bg.jpg')">
    <div class="container position-relative px-4 px-lg-5">
        <div class="row gx-4 gx-lg-5 justify-content-center">
            <div class="col-md-10 col-lg-8 col-xl-7">
                <div class="site-heading">
                    <h1>Clean Blog </h1>
                    <span class="subheading">A Blog Theme by Start Bootstrap</span>
                </div>
            </div>
        </div>
    </div>
</header>
<!-- Main Content-->
<div class="container px-4 px-lg-5">
    <div class="row gx-4 gx-lg-5 justify-content-center">
        <div class="col-md-10 col-lg-8 col-xl-7">
            <!-- Post preview-->
            <?php foreach ($allPostsOfACategory as $post) : ?>
                <div class="post-preview">
                    <a href="../posts/post.php?post_id=<?php echo $post->id ?>">
                        <h2 class="post-title">
                            <?php echo $post->title ?>
                        </h2>
                        <h3 class="post-subtitle">
                            <?php echo $post->sub_title ?>
                        </h3>
                    </a>
                    <p class="post-meta">
                        Posted by
                        <a href="#!"> <?php echo $post->username ?>
                        </a>
                        on <?php echo date("M d , Y", strtotime($post->created_at)) ?>
                    </p>
                </div>
                <!-- Divider-->
                <hr class="my-4" />
            <?php endforeach; ?>
            <!-- Pager-->
        </div>
    </div>
</div>
<!-- Footer-->
<?php require "../includes/footer.php"; ?>