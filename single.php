




<?php include_once "posts.php";
include_once "db.php";


if (isset($_GET['id'])){

    //Hämtar vädet för inlägget som man är inne på
    $post = selectOne('post', ['id'=>$_GET['id']]);
}

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
    <title><?php echo $post['title'];?> | Luleblog</title>
</head>
<body>
<!--Lägger till en header-->
<?php include ("includes/header.php");
?>

<!--karusell-->
<div class="page-wrapper">



    <!--innehåll på bloggen-->
    <div class="content clearfix">

        <!--Skriver ut titel-->
        <div class="main-content single">
            <h1 class="post-title"><?php echo $post['title'];?></h1>

            <!--Skriver ut inlägget-->
            <div class="post-content">
                <?php echo html_entity_decode($post['body']);?>
            </div>
        </div>
        <!--sidebar-->
        <div class="sidebar single">

            <div class="section popular">

                <!--Skriver ut inlägg från databasen-->
                <h2 class="section-title">Populära inlägg</h2>

                <?php foreach ($posts as $key => $p):?>
                    <tr>
                <div class="post">

                    <img src="<?php echo '../blog/assets/bilder' . $p['image']; ?>" alt="Kunde inte hämta bild">
                    <td><?php echo $p['username'];?></td>


                    <td> <h4><a href="single.php?id=<?php echo $p['id']?>"><?php echo $p['title'];?></a> </h4></td>
                        <i class="far fa-calendar"> <?php echo date('F j, Y', strtotime($post['created_at']) );?></i>


                    </tr>
                    <?php  endforeach; ?>

            </div>



        </div>
    </div>

</div>



<!-- jquery-->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.map"></script>


<!--JS script-->
<script src="assets/js.js"></script>

</body>

</html>

<?php
