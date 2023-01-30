<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="x-ua-compatible" content="ie=edge">

    <!--fontawesome .com kit-->
    <script src="https://kit.fontawesome.com/69124a6acf.js" crossorigin="anonymous"></script>


    <link rel="stylesheet" href="css.css">
    <title>Logga in</title>
</head>
<body>
<!--Lägger till en header-->
<?php include ("includes/header.php");
?>
<?php include("users.php");
?>

<div class="auth-content">
    <div>
    <form action="login.php" method="post">
        <h2 class="form-title">Logga in</h2>

<?php include ("formErrors.php")?>
    </div>


        <div>
            <label>Användarnamn</label>
            <input type="text" name="username" value="<?php echo $username; ?>" class="text-input">
        </div>

        <div>
            <label>Lösenord</label>
            <input type="password" name="password" value="<?php echo $password; ?>"class="text-input">
        </div>
        <div>
            <button type="submit" name="login-btn" class="btn btn-big">Logga in</button>
        </div>
        <p> Inget konto? <a href="register.php">Registrera dig</a></p>
</div>
    </form>

</body>

</html>

<?php


