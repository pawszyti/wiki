<?php
session_start();
if (isset($_SESSION['online']) && $_SESSION['online'] == sha1(lock) && isset($_COOKIE['status'])) {
setcookie("status",'online', time()+900);
require_once ('../config/config.php');

$add_title=$_POST['add_title'];
//$add_category=$_POST['add_cetegory'];
$add_category=1;

$add_contents=$_POST['add_contents'];
$date = date("Y-m-d");

$ID_user = 1;
$wiki =1;
$ID_wiki = $_GET['id'];
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

        <a href="../index.php"> <button class="menu_third">
                <img src="../img/home.png"  width="17px" height="17px">
                Home
            </button></a>

        <a href="add.php"><button class="menu_third">
                <img src="../img/plus.png"  width="17px" height="17px">
                Dodaj
            </button></a>

        <button class="menu_third">
            <img src="../img/minus.png" width="17px" height="17px">
            Usuń
        </button>

        <button class="menu_third">
            <img src="../img/info.png"  width="17px" height="17px">
            Sortuj
        </button>

        <button class="menu_fourth">
            <img src="../img/stop.png"  width="17px" height="17px">Wyloguj
        </button>

        <button class="menu_fourth">
            <img src="../img/pass.png"  width="17px" height="17px">Zmień hasło
        </button>

        <div class="menu_five">
            <span style="font-weight: bold; font-size: 14px">  Zalogowany: Paweł Szymczyk </span>
        </div>
    </div>
</div>


<div class="menu_first_more">
    <div class="menu_second">
        <div class="menu_center">
            <?php echo"<a href='del.php?id=".$ID_wiki."'>"?> <button class="menu_third_more">
                <img src="../img/minus.png" width="17px" height="17px">
                Usuń
            </button></a>

            <?php echo"<a href='edit.php?id=".$ID_wiki."'>"?> <button class="menu_third_more">
                <img src="../img/info.png"  width="17px" height="17px">
                Edytuj
            </button></a>

        </div>
    </div>
</div>

<div class="page">
    <div class="message">
        <?php
        if (isset($_SESSION['alert']))
        {
            echo $_SESSION['alert'];
            unset($_SESSION['alert']);
        }
        ?>
    </div>
    <header>
        <?php echo $line_logo['text_setting']; ?>
    </header>

    <div class="page_slave_more">
        <?php
        $query = "SELECT * FROM list, users, categories WHERE list.ID_user = users.ID_user AND list.category_ID = categories.category_ID AND ID_wiki LIKE $ID_wiki"; //zapytanie SQL pod zmienną zapytanie
        $result = $db->query($query); //pobiera dane $db (bazy danych) i wykonuje zapytanie
        $rows = $result->num_rows; // liczy ile baza zwróciła wyników

        for ($i=0; $i<$rows; $i++){ //pętla for od 0 do liczby wyników
            $line = $result->fetch_assoc(); //wpisanie wyniku do tablicy assocjacyjnej
            echo "
            <div class=\"inbox_more\">
            <div class='inbox_more_top'><span class=\"title\">".$line['title']."</span><br /><hr>
            <span style=\"text-align: left\">".nl2br($line['contents'])."</div>
           
            <div class=\"inbox_more_bottom\"><hr>
            Data dodania: ".$line['add_date']."</div>
            <div class=\"inbox_more_bottom\">
            Kto dodał: ".$line['name']." ".$line['surname']."</div>
            <div class=\"inbox_more_bottom\">
            Kategoria: ".$line['categories_name']."</span></div></div>
            ";
        }
        ?>

        </form>
    </div>
</div>
</div>
<?php
$db->close();}
else
{
    header('location: ../logout.php');
    exit();
}
?>
</body>
</html>
