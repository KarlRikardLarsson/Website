<header>
    <div class ="logo" >
        <h1 class="logo-type" ><a href="index.php" >LuleBlog</a></h1>
    </div>

    <!-- navigerings meny-->
    <ul class="nav">
        <li><a href="../blog/index.php">Hem</a></li>



        <?php if (isset($_SESSION['id'])):?>
            <li>
                <a href="#">

                    <!--ikon från awesome font-->
                    <i class="fa fa-user"></i>

                    <?php echo $_SESSION['username']?>
                </a>
                <ul>
                    <!-- Skapar rullgarins meny-->
                    <li><a href="../blog/Admin/posts">Mina sidor</a></li>
                    <li><a href="../blog/logout.php" class="logout">logga ut</a></li>
                </ul>
            </li>
        <?php else: ?>
        <!--Om man inte är inloggad, visa detta istälet-->
            <li><a href="../blog/login.php">Logga in</a></li>
            <li><a href="../blog/register.php">Skapa konto</a></li>
        <?php endif;?>



    </ul>
</header>

<?php
