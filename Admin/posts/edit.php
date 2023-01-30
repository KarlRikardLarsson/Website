<?php
require "../../posts.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="x-ua-compatible" content="ie=edge">

    <!--fontawesome .com kit-->
    <script src="https://kit.fontawesome.com/69124a6acf.js" crossorigin="anonymous"></script>


    <link rel="stylesheet" href="../../admin.css">
    <link rel="stylesheet" href="../../css.css">

    <title>Hantera inlägg</title>
</head>
<body>
<?php include('../../includes/adminHeader.php')
?>


<div class="admin-wrapper">

    <!--Bar på vänster dsida-->
    <div class="left-sidebar">
        <ul>
            <li><a href="index.php">Mina inlägg</a> </li>


        </ul>


    </div>

    <!--Innehåll för inloggad-->
    <div class="admin-content">


        <div class="content">

            <!--Skapar ett formulär som skriver ut tidigare data, och ger möjlighet till att redigera inlägg-->
            <h2 class="page-title">Hantera inlägg</h2>
            <form action="edit.php" method="post" enctype="multipart/form-data">

                <input type="hidden" name="id" value="<?php echo $id ?>" >

                <div>
                    <label>Titel på ditt inlägg</label>
                    <input type="text" name="title" value="<?php echo $title ?>" class="text-input">
                </div>

                <div>
                    <label>Text</label>
                    <textarea id="body" name="body" value="<?php echo $body ?>"class="text-input"></textarea>
                </div>
                <div>
                    <label>Bifoga</label>
                    <input type="file" name="image" class="text-input">
                </div>

                <div>

                    <label>Ämne</label>
                    <select name="topic_id" class="text-input">
                        <option value="skola">Skola</option>
                        <option value="sport">Sport</option>
                        <option value="hobby">Hobby</option>
                        <option value="hobby">Fritid</option>
                        <option value="ovrigt">Övrigt</option>
                    </select>
                </div>

                <div>
                    <button type="submit" name="update-btn" class="btn btn-big">Uppdatera inlägg</button>

                </div>
                <?php if(isset($_POST['update-btn'])){
                    felMeddelande();
                } ?>


            </form>


        </div>

    </div>
</div>



</script>

<!--JQUERY-->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.map"></script>

<!--Tagit från https://ckeditor.com/ckeditor-5/download/?undefined-addons= -->
<script src="https://cdn.ckeditor.com/ckeditor5/34.0.0/classic/ckeditor.js"></script>

<script src="../../assets/js.js"></script>

</body>


</html>

<?php
