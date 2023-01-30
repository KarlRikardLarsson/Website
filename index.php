<?php include_once ("db.php");
include_once ("posts.php");


$posts =array();



    //Hämtar alla inlägg
    $posts = getPublishedPosts();



?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="x-ua-compatible" content="ie=edge">

    <!--fontawesome .com kit-->
    <script src="https://kit.fontawesome.com/69124a6acf.js" crossorigin="anonymous"></script>


    <link rel="stylesheet" href="css.css">
    <title>Blog</title>
</head>


<body>

<!--Lägger till en header-->
<?php include ("includes/header.php");
?>


<!--karusell-->
<div class="page-wrapper">

    <!--Slider-->
    <div class="post-slider">
        <h1 class="slider-title">Hett just nu</h1>
        <i class="fas fa-chevron-left prev"></i>
        <i class="fas fa-chevron-right next"></i>
        <div class="post-wrapper">

            <!--skriver ut alla inlägg från data basen-->
            <?php foreach ($posts as $post):?>
                <div class="post">
                    <img src="<?php echo '../blog/assets/bilder' . $post['image']; ?>" alt="Kunde inte hämta bild" class="slider-image">
                    <div class="post-info">
                        <h4><a href="single.php?id=<?php echo $post['id']?>"><?php echo $post['title'];?></a> </h4>
                        <i class="far fa-user"><?php echo $post['username'];?></i>
                        &nbsp;
                        <i class="far fa-calendar"> <?php echo date('F j, Y', strtotime($post['created_at']) );?></i>
                    </div>
                </div>
            <?php endforeach;?>


        </div>
    </div>


    <!--innehåll på bloggen-->
    <div class="content clearfix">

        <!--main content-->
        <div class="main-content">

            <h1 class="recent-post-title">Senaste inläggen</h1>
<?php foreach ($posts as $post):?>

    <!--Senaste inlägg-->
    <div class="post clearfix">
        <img src="<?php echo '../blog/assets/bilder' . $post['image']; ?>" alt="Kunde inte hämta bild" class="post-image">
        <div class="post-review">
            <h2><a href="single.php?id=<?php echo $post['id']?>"><?php echo $post['title'];?> </a></h2>
            <i class="far fa-user"><?php echo $post['username'];?></i>
            &nbsp;
            <i class="far calendar"> <?php echo date('F j, Y', strtotime($post['created_at']) );?></i>
            <p class="preview-text">
                <!--Visar 150 bokstäver, sen ... på senaste inlägg-->
                <?php echo html_entity_decode(substr($post['body'], 0, 150) . '...');?>

            </p>
            <a href="single.php?id=<?php echo $post['id']?>"class="btn read-more">läs mer</a>

        </div>
    </div>

<?php endforeach; ?>


        </div>
        </div>
        </div>






<!-- jquery-->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.map"></script>


<!--slick karusell taget från https://kenwheeler.github.io/slick/-->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.3/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.6.0/slick.min.js"></script>

</script>
<!--JS script-->
<script src="assets/js.js"></script>


</body>


</html>
