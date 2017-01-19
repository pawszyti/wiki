<?php
session_start();
if (isset($_SESSION['online']) && $_SESSION['online'] == sha1(lock) && isset($_COOKIE['status'])) {
setcookie("status",'online', time()+900);
require_once ('../config/config.php');
?>
<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="utf-8">
    <meta name="author" content="Paweł Szymczyk" />
    <title>Baza Wiedzy - CSSA</title>
    <link href="../css/style.css" rel="stylesheet">
    <link href="../css/read_more.css" rel="stylesheet">
</head>
<body>
<div class="menu_first">
    <div class="menu_second">

        <a href="../main.php"><button class="menu_third">
            <img src="../img/home.png"  width="17px" height="17px">
            Home
        </button></a>

        <button class="active">
            <img src="../img/plus.png"  width="17px" height="17px">
            Dodaj
        </button>

        <button class="menu_third">
            <img src="../img/minus.png" width="17px" height="17px">
            Usuń
        </button>

        <button class="menu_third">
            <img src="../img/info.png"  width="17px" height="17px">
            Sortuj
        </button>

        <a href="../logout.php"><button class="menu_fourth">
            <img src="../img/stop.png"  width="17px" height="17px">Wyloguj
        </button></a>

        <button class="menu_fourth">
            <img src="../img/pass.png"  width="17px" height="17px">Zmień hasło
        </button>

        <div class="menu_five">
            <span style="font-weight: bold; font-size: 14px"> <?php echo "Zalogowany: ".$_SESSION['name']." ". $_SESSION['surname'];?></span>
        </div>
    </div>
</div>
<form action="add_ok.php" method="post">

<div class="menu_first_more">
    <div class="menu_second">
        <div class="menu_center">
            <?php echo"<a href='edit_ok.php?id=".$ID_wiki."'>"?> <button class="menu_third_more" type="submit">
                <img src="../img/ok.png" width="17px" height="17px">
                Dodaj
            </button></a>
        </div>
    </div>
</div>



<div class="page">
    <header>
        <?php echo $line_logo['text_setting']; ?>
    </header>

    <div class="page_slave">
        <div class="add">
        Tytuł: <input type="text " name="add_title" size="60px"style="margin-top: 30px" maxlength="50"><br />


<div class="select">
 <?php
//tworzenie pola select
    $query_select = "SELECT * FROM categories"; //pobieranie kategori z bazy
    $result_select = $db->query($query_select);
    $rows_select = $result_select->num_rows;
    echo "Kategoria: <select name=\"add_category\">       
            <option value=\"0\">--</option>";
 for ($i = 0; $i < $rows_select; $i++) // pętla która na podstawie ilości wyników z bazy, przechodzi tyle razy by zapełnić <option>
    {
        $line_select = $result_select->fetch_assoc();
        echo "
        <option value=\"".$line_select['category_ID']."\">".$line_select['categories_name']."</option>   
        ";
    }
 echo "</select>";
 ?>
</div>


        <textarea name="add_contents" class="add_contents" maxlength="2000"></textarea>
<br />

</form>
        </div>
    </div>
    </div>
<?php
}
else
{
    header('location: ../logout.php');
    exit();
}
?>
</body>
</html>