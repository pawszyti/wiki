<?php
session_start();
require_once ('../config/config.php');
if (isset ($_POST['add_contents']) || isset ($_POST['add_title'])) {
    $add_title = $_POST['add_title'];
    $add_contents = $_POST['add_contents'];
    $add_category = $_POST['add_category'] ;
    $date = date("Y-m-d");
    $ID_user = $_SESSION['ID_user'];
    $wiki =1;
    $query = "INSERT INTO `list` (`ID_wiki`, `title`, `contents`, `ID_user`, `category_ID`, `add_date`) VALUES (NULL, '$add_title', '$add_contents' , '$ID_user', '$add_category', '$date')";
//Dodawanie ticketa do bazdy danych (tabela: list)
    $result = $db->query($query);
    if ($result) {
        $_SESSION['alert'] = "Poprawnie dodano wpis";
        header('location: ../main.php');
    }
    else
    {
        echo "<br /> Błąd, zapisywanie nie powiodło sie";
    }
    $db->close();
}


?>