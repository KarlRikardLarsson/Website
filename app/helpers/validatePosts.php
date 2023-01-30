<?php


//validerar att inlägget har är korrekt
function validatePost($post){


//Verfierar att korrekt data är imatat
    $errors = array();

    if (empty($post['title'])){
        array_push($errors, 'Du måste skriva en titel');

    }
    if (empty($post['body'])){
        array_push($errors, 'Du måste skriva en text');

    }

    //Hämtar  från databas
    $existingPost =selectOne('post', ['title'=>$post['title']]);

    //Kollar om den redan finns
    if ($existingPost){

        //om man uppdaterar ett inlägg
        if (isset($post['update-btn']) && $existingPost['id'] !=$post['id']){
            array_push($errors,'Ett inlägg med den titeln finns redan');
        }
        //Om man skapar en inlägg
        if (isset($post['add-post'])){
            array_push($errors,'Ett inlägg med den titeln finns redan');

        }
    }

    return $errors;
}

