<?php



//Ger tillgång till databasen
include_once "db.php";
include_once "validateUsers.php";

$errors =array();

//Ger inget värde, då de printar i formulär på registering.
$username ='';
$email ='';
$password ='';
$passwordConf ='';
$table ='users';

function loginUser($user){
    //logga in användaren med hjälp av session
    $_SESSION['id']= $user['id'];
    $_SESSION['username']= $user['username'];
    $_SESSION['admin']= $user['admin'];
    header('location: index.php');
    //Här slutar koden - kör ingen kod under
    exit();

}

//Man man klickar på registera
if (isset($_POST['register-btn'])){

    $errors =validateUser($_POST);

    if(count($errors) ===0) {


        //Tar bort värden som vi inte lagrar i våran databas.
        unset($_POST['register-btn'], $_POST['passwordConf']);

        //Lägger till admin värde
        $_POST['admin'] = 0;

        //krypterar lsenord
        $_POST['password'] = password_hash($_POST['password'], PASSWORD_DEFAULT);

        //skapar i databasen
        $user_id = create($table, $_POST);
        $user = selectOne($table, ['id' => $user_id]);
        //Skickar data till databasen

     loginUser($user);
        
        
    } else{
        //Sparar data som användaren matat in för att formuläret inte ska nollställas
        $username =$_POST['username'];
        $email =$_POST['email'];
        $password =$_POST['password'];
        $passwordConf =$_POST['passwordConf'];
    }

}

//Validering av loggin
if(isset($_POST['login-btn'])) {
    //Tar inmatat värde
    $errors = validateLogin($_POST);

    //Om de inte finns några error (Inget inatat data)
    if (count($errors) === 0) {
        $user = selectOne($table, ['username' => $_POST['username']]);

        //Verifierar inmatat lösenord med hash
        if($user && password_verify($_POST['password'], $user['password'])){
           loginUser($user);
        }
        else{
            array_push($errors, 'Fel inloggningsuppgifter');
        }

    }

    $username=$_POST['username'];
    $password=$_POST['password'];
}



