<?php require __DIR__ . "/../includes/header.php"; ?>
<?php require __DIR__ . "/../config/databases/posts.php" ?>
<?php
if (isset($_GET['post_id']) && isset($_GET['img'])) {
    $post = $postsDB->get_post_by_id($_GET['post_id']);
    if ($_SESSION["username"] == $post->username && $_SESSION["user_id"] == $post->user_id) {
        if (isset($_POST["submit"])) {
            if (isset($_POST["title"]) && isset($_POST["sub_title"]) && isset($_POST["body"]) && isset($_FILES["image"]["name"]) && isset($_POST["category_id"]) && !empty($_POST["title"]) && !empty($_POST["sub_title"]) && !empty($_POST["body"]) && !empty($_FILES["image"]["name"]) && !empty($_POST["category_id"])) {
                $title = $_POST["title"];
                $sub_title = $_POST["sub_title"];
                $body = $_POST["body"];
                $category_id = $_POST["category_id"];
                $img = $_FILES["image"]["name"];
                $dir = "images/" . basename($img);
                unlink("images/" . $_GET['img']);
                if (move_uploaded_file($_FILES["image"]["tmp_name"], $dir)) {
                    $postsDB->update_post($_GET["post_id"], $title, $sub_title, $body, $img, $category_id);
                };
            }
        }
    } else {
        header("Location: ../index.php");
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

    <form method="POST" action="update.php?post_id=<?php echo $post->id ?>&img=<?php echo $post->img ?>"
        enctype="multipart/form-data">
        <!-- Email input -->
        <div class="form-outline mb-4">
            <input type="text" name="title" id="form2Example1" class="form-control" placeholder="title"
                value="<?php echo $post->title ?>" />

        </div>

        <div class="form-outline mb-4">
            <input type="text" name="sub_title" id="form2Example1" class="form-control" placeholder="subtitle"
                value="<?php echo $post->sub_title ?>" />
        </div>

        <div class=" form-outline mb-4">
            <input type="text" name="body" id="form2Example1" class="form-control" placeholder="body"
                value="<?php echo $post->body ?>" />
        </div>


        <div class="form-outline mb-4">
            <input type="file" name="image" id="form2Example1" class="form-control" placeholder="image"
                value="images/<?php echo $post->img ?> " />
        </div>

        <select class="form-select my-5" name="category_id" aria-label="Default select example">
            <option selected>Choose The Post Category</option>
            <option value="1">TV</option>
            <option value="2">SPORTS</option>
            <option value="3">GAMING</option>
            <option value="3">DESIGN</option>
        </select>


        <!-- Submit button -->
        <button type=" submit" name="submit" class="btn btn-primary  mb-4 text-center">Update</button>


    </form>



</div>
<!-- Footer-->
<?php require __DIR__ . "/../includes/footer.php"; ?>