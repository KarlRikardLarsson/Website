<?php
include_once "../../users.php";
?>
    <header>
    <div class ="logo" >
        <h1 class="logo-type" ><a href="../../index.php" >LuleBlog</a></h1>
    </div>


    <!-- navigerings meny-->
    <ul class="nav">


        <li>
                <a href="#">

                    <!--ikon från awesome font-->
                    <i class="fa fa-user"></i>

                    <?php echo $_SESSION['username']?>
                </a>
                <ul>
                    <li><a href="../../logout.php" class="logout">logga ut</a></li>
                </ul>
            </li>
    </ul>
</header>

<?php

