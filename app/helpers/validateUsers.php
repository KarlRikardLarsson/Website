<?php

function validateUser($user){


//Verfierar att korrekt data är imatat
    $errors = array();

    if (empty($user['username'])){
        array_push($errors, 'Du måste skriva ett användarnamn');

    }
    if (empty($user['email'])){
        array_push($errors, 'Du måste skriva en email');

    }
    if (empty($user['password'])){
        array_push($errors, 'Du måste skriva ett lösenord');

    }

    if ($user['passwordConf']!== $_POST['password']){
        array_push($errors, 'Dina två lösenord matchar inte');

    }
    //Hämtar email från databas
    $existingUser =selectOne('users', ['email'=>$user['email']]);

    //Kollar om den redan finns
    if ($existingUser){
        array_push($errors,'emejlen finns redan registrerad hos oss');
    }

    return $errors;
}

function validateLogin($user){


//Verfierar att korrekt data är imatat
    $errors = array();

    if (empty($user['username'])){
        array_push($errors, 'Du måste skriva ett användarnamn');

    }

    if (empty($user['password'])){
        array_push($errors, 'Du måste skriva ett lösenord');

    }


    return $errors;
}