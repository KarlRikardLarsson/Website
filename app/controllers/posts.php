


<?php
include_once "db.php";
include_once "validatePosts.php";




$table ='post';

$posts= selectALL($table);

$errors =array();
$title="";
$body="";
$topic_id="";
$id ="";

//När användaren trycker på ändra
if(isset($_GET['id'])){

    //När användaren trycker på "ändra knappen" -- för att kunna koppla till rätt inlägg
    $post = selectOne($table, ['id'=> $_GET['id']]);

    $id = $post['id'];
    $title= $post['title'];
    $body=$post['body'];

}

//När användaren trycker på radera
if(isset($_GET['delete_id'])){

    //Raderar de inlägg som anävndaren väljer
 $count = delete($table,$_GET['delete_id']);
    header('location: index.php');


}

function felMeddelande(){
    $errors =validatePost($_POST);

    if (count($errors) >0):?>
        <div class="msg error">
        <?php foreach ($errors as $error):?>

            <li><?php echo $error;?></li>

        <?php endforeach;?>
    <?php endif;
}
if (isset($_POST['add-post'])){


    //sparar filen och ger tid för att göra filer unika
    if(!empty($_FILES['image']['name'])){
            $image_name = time(). '_'. $_FILES['image']['name'];
            $destination = "../../assets/bilder" . $image_name;

           $result = move_uploaded_file($_FILES['image']['tmp_name'], $destination);

           if($result){

               $_POST['image'] =$image_name;
           }else{
               array_push($errors,'Misslyckades att lada upp fil');

           }
    }
    else{
        array_push($errors, "Man måste ladda upp en bild");

    }
    //Validerar inmatat värde
    $errors =validatePost($_POST);

    if (count($errors)== 0){
        //tar bort info vi inte behöver
        unset($_POST['add-post'], $_POST['topic_id']);
        $_POST['userid'] =$_SESSION['id'];
        $_POST['published'] =1;

        //Skapar rad i databas och går till start sidan
        $post_id =create($table, $_POST);
        header('location: index.php');

    }else {
    //Så användare inte behöver inmata värden igen.
    $title= $_POST['title'];
    $body= $_POST['body'];
    $topic_id= $_POST['topic_id'];
    }


}


if (isset($_POST['update-btn'])){

    $errors = validatePost($_POST);

        $image_name = time(). '_'. $_FILES['image']['name'];
        $destination = "../../assets/bilder" . $image_name;

        $result = move_uploaded_file($_FILES['image']['tmp_name'], $destination);

            $_POST['image'] =$image_name;


        if (count($errors)== 0){

        $id =$_POST['id'];
        //tar bort info vi inte behöver
        unset($_POST['update-btn'], $_POST['id'],$_POST['topic_id'] );
        $_POST['userid'] =$_SESSION['id'];
        $_POST['published'] =1;
        $_POST['body'] =htmlentities($_POST['body']);

        //uppdatera nytt värde
        $post_id =update($table, $id, $_POST);
        header('location: index.php');

    }else {
        //Så användare inte behöver inmata värden igen.
        $title= $_POST['title'];
        $body= $_POST['body'];
    }
}