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

<!--All PHP kod i nedan-->
<?php include("users.php");
?>



<div class="auth-content">
    <div>
    <form action="register.php" method="post">
        <h2 class="form-title">Registrering</h2>

        <!--Inne i den mapp finns en loop som validerar att infon är korrekt-->
<?php include ("formErrors.php")?>
        </div>
        <div>
            <label>Användarnamn</label>
            <input type="text" name="username" value="<?php echo $username; ?>" class="text-input">
        </div>
        <div>
            <label>Email</label>
            <input type="email" name="email"value="<?php echo $email; ?>"  class="text-input">
        </div>
        <div>
            <label>Lösenord</label>
            <input type="password" name="password" value="<?php echo $password; ?>" class="text-input">
        </div>
        <div>
            <label>Bekräfta lösenord</label>
            <input type="password" name="passwordConf" value="<?php echo $passwordConf; ?>"  class="text-input">
        </div>
        <div>
            <button type="submit" name="register-btn" class="btn btn-big">Registrera dig!</button>
        </div>

        <p> Eller <a href="login.php" style="text-decoration: underline;">Logga in</a></p>
    </div>
    </form>





<!-- jquery-->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.map"></script>



<!--JS script-->
<script src="assets/js.js"></script>


</body>


</html>
