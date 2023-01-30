<?php

include ("connect.php");

$db = db_connect();
db_import($db, "blogg.sql", TRUE);
?>
