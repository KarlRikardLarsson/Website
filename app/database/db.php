<?php

//Session för inloggning, många filer kommer använda denna session, därför sätts den här
session_start();

//Hämtar db connection
include_once('connect.php');


function dd($value){
    //Skriver ut resultat från funktion nedan
    echo"<pre>";
    print_r($value) ;
   echo "</pre>";
    die;

}

function executeQuery($sql, $data){
    global $conn;
    $stnt = $conn->prepare($sql);
    $values = array_values($data);
    $types = str_repeat('s', count($values));
    $stnt->bind_param($types, ...$values);
    $stnt->execute();
    return $stnt;


}

//Skapar en SQL query som kan hämta från en databas... kan byta table till vilken tabell jag vill
function selectALL($table, $conditions =[]){

    global $conn;
    $sql ="SELECT * FROM $table";

    //om värde är tomt
    if(empty($conditions)){
    $stnt =$conn->prepare($sql);
    $stnt->execute();
    $records = $stnt->get_result()->fetch_all(MYSQLI_ASSOC);
    return $records;}

    //När användaren har matat in något värde
    else{

        $i =0;
        //Säker igenom rader i databasen
        foreach ($conditions as $key=> $value){
            if ($i ===0){

            //Key varje rad i rad i table, värde är inmatat värde från användare
                //Första värdet är WHERE
            $sql = $sql . " WHERE $key=?";
            }else
            {    //Efterår är det bara AND
                $sql = $sql . " AND $key=?";
            }
            $i++;

        }

        $stnt = executeQuery($sql, $conditions);

        $records = $stnt->get_result()->fetch_all(MYSQLI_ASSOC);
        return $records;
    }

    }


    //söker efter specifika värden
function selectOne($table, $conditions)
{

    global $conn;
    $sql = "SELECT * FROM $table";


    $i = 0;
    //Säker igenom rader i databasen
    foreach ($conditions as $key => $value) {
        if ($i === 0) {

            //Key varje rad i rad i table, värde är inmatat värde från användare
            //Första värdet är WHERE
            $sql = $sql . " WHERE $key=?";
        } else {    //Efterår är det bara AND
            $sql = $sql . " AND $key=?";
        }
        $i++;

    }

        //SELECT * FROM x WHERE x = x LIMIT 1;
        $sql= $sql . " LIMIT 1";

    $stnt = executeQuery($sql, $conditions);
    //Till skillnad från andra funktionen där vi vill ha allt, tar vi nu bara ett värde
    $records = $stnt->get_result()->fetch_assoc();
    return $records;
}

function create($table, $data){

    //måste vara global när den pratar med databas
    global $conn;
    //$sql = INSERT INTO users SET username =?, admin=?, email=?, password=?;

    $sql= "INSERT INTO $table SET ";
    $i = 0;
    //Säker igenom rader i databasen
    foreach ($data as $key => $value) {
        if ($i === 0) {

            //Key varje rad i rad i table, värde är inmatat värde från användare
            //Första är det semikolon först'
            $sql = $sql . " $key=?";
        } else {    //Efterår är det inte det
            $sql = $sql . ", $key=?";
        }
        $i++;

    }

    $stnt = executeQuery($sql, $data);
        $id = $stnt->insert_id;
        return $id;

}

//Uppdatera table
function update($table,$id, $data){

    //måste vara global när den pratar med databas
    global $conn;

    //$sql = UPDATE users SET username =?, admin=?, email=?, password=? WHERE id=x;
    $sql= "UPDATE $table SET ";

    $i = 0;
    //Säker igenom rader i databasen
    foreach ($data as $key => $value) {
        if ($i === 0) {

            //Key varje rad i rad i table, värde är inmatat värde från användare
            //Första är det semikolon först'
            $sql = $sql . " $key=?";
        } else {    //Efterår är det inte det
            $sql = $sql . ", $key=?";
        }
        $i++;

    }

    //Hämtar ID från table
    $sql =$sql . " WHERE id=?";
    $data['id'] =$id;
    $stnt = executeQuery($sql, $data);
    //skriver ut vilken row som blev uppdaterad
    return $stnt->affected_rows;

}

//Delete table
function delete($table,$id){

    //måste vara global när den pratar med databas
    global $conn;

    //$sql = DELETE FROM  users WHERE id=x;
    $sql= "DELETE FROM $table WHERE id=?";


    //Hämtar ID från table
    $data['id'] =$id;
    //Hämtar ID i en array (VÅrat table
    $stnt = executeQuery($sql, ['id'=>$id]);
    //skriver ut vilken row som blev uppdaterad
    return $stnt->affected_rows;

}

function getPublishedPosts(){

    global $conn;

    //Hämtar alla inlägg som är published
    $sql ="SELECT p.*, u.username FROM post as p 
    JOIN users AS u ON p.userid=u.id 
    WHERE p.published =? ORDER BY p.created_at DESC";

    //Kör statement ovan och söker efter published inliägg. JOINAR tabel med användare.
    //Kan använda sedan för att koppla varje inlägg till specifika konton
    $stnt = executeQuery($sql, ['published' =>1]);
    $records = $stnt->get_result()->fetch_all(MYSQLI_ASSOC);
    return $records;
}

//hitta alla inlägg från en specifik användare
function inlagg(){

    $id =$_SESSION['id'];

    global $conn;

    //Söker efter inlägg
    $sql ="SELECT p.*, u.username FROM 
            post as p JOIN users AS u 
            ON p.userid=u.id WHERE p.published =?
            AND p.userid =?";

    $stnt = executeQuery($sql, ['published' =>1, 'userid' =>$id]);
    $records = $stnt->get_result()->fetch_all(MYSQLI_ASSOC);
    return $records;
}







