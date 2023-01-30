<?php require "../../posts.php";

$vem = inlagg();
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

    <title>Admin - Hantera inlägg</title>
</head>
<body>

<?php include('../../includes/adminHeader.php');
?>

<div class="admin-wrapper">

    <!--Bar på vänster dsida-->
    <div class="left-sidebar">
        <ul>
            <li><a href="#">Mina inlägg</a> </li>


        </ul>


    </div>

    <!--Innehåll för inloggad-->
    <div class="admin-content">
        <div class="button-group">
            <a href="create.php" class="btn btn-big">Skapa inlägg</a>
        </div>

        <div class="content">

            <!--Skapar en lista med inlägg och funktioner-->
            <h2 class="page-title">Mina inlägg</h2>
            <table>
                <thead>
                <th>SN</th>
                <th>Titel</th>
                <th>Författare</th>
                <th colspan="3">action</th>
                </thead>
                <tbody>

                <!--Loop som hämtar alla inlägg från databasen-->
                    <?php foreach ($vem as $key => $post): ?>
                    <tr>

                        <td> <?php echo $key +1;?></td>
                        <td> <?php echo $post['title'];?></td>
                        <td><?php echo $post['username'];?></td>
                        <td><a href="edit.php? id= <?php echo $post['id'];?> class="edit">Ändra</a> </td>
                        <td><a href="edit.php? delete_id= <?php echo $post['id'];?> class="delete">Radera</a> </td>


                    </tr>
                    <?php  endforeach; ?>

                </tbody>
            </table>
        </div>

    </div>
</div>



</script>
<!--JS script-->
<script src="../../assets/js.js"></script>

<!--JQUERY-->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.map"></script>



</body>


</html><?php
