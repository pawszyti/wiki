<?php
session_start();
require('../config/config.php');
$ID_wiki = $_GET['id'];
$query = "DELETE FROM list WHERE ID_wiki=$ID_wiki";
if ($db->query($query))
{
    $_SESSION['alert'] = "Wpis został usunięty";
    header('location: ../main.php');
    exit();
}
else
{
    $_SESSION['alert'] = "SQL DELETE del.php ERROR";
    header('location: ../main.php');
    exit();
}
?>