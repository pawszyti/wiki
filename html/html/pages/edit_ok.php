<?php
session_start();
require('../config/config.php');
$ID_wiki = $_GET['id'];
$title = $_POST['title'];
$contents = $_POST['contents'];
$title = htmlentities($title, ENT_QUOTES, "UTF-8");
$contents = htmlentities($contents, ENT_QUOTES, "UTF-8");
$location = "read_more.php?id=".$line['ID_wiki'];


$query = "UPDATE list SET title='%s', contents='%s' WHERE ID_wiki='$ID_wiki'";



if ($db->query(sprintf("UPDATE list SET title='%s', contents='%s' WHERE ID_wiki='$ID_wiki'",
    mysqli_real_escape_string($db,$title),
    mysqli_real_escape_string($db,$contents))))
{
    $_SESSION['alert'] = "Edycja zakończona pomyślnie";
    header("location: read_more.php?id=".$ID_wiki);
    exit();
}
else
{

    $_SESSION['alert'] = "UPDATE edit.php Error";
    header("location: read_more.php?id=".$ID_wiki);
    exit();
}
?>