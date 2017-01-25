<?php
session_start();
//LOGOWANIE - SPRAWDZENIE - START
if (isset($_SESSION['online']) && $_SESSION['online'] == sha1(lock) && isset($_COOKIE['status'])) {
    setcookie("status",'online', time()+900);
//odświerzenie cookie status na 15 minut jesli juz istnieło w momencie załadowania
//LOGOWANIE - SPRAWDZENIE - STOP
require_once ('config/config.php');
$username = $_SESSION['username'];
$name = $_SESSION['name'];
$surname = $_SESSION['surname'];
?>

<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="utf-8">
    <meta name="author" content="Paweł Szymczyk" />
    <title>Baza Wiedzy</title>
    <link href="css/style.css" rel="stylesheet">
    <link href="css/change_password.css" rel="stylesheet">
    <script src="js/script.js"></script>
    <link href="css/bootstrap.css" rel="stylesheet">
    <link href="css/bootstrap-theme.css" rel="stylesheet">
    <script src="js/bootstrap.js"></script>
    <script src="js/npm.js"></script>
    <script src="js/jquery-3.1.1.js"></script>



</head>
<body>

<div class="container">
<div class="row">
    <nav class="navbar navbar-default btn-variants navbar-fixed" role="navigation">
        <a class=" navbar-brand hidden-xs col-lg-2 col-sm-2 text-center" href="#"><span class="user"> - Zalogowany -<br /><?php echo $_SESSION['name']." ". $_SESSION['surname'];?> </span></a> <! -- 2 -->
        <div class="navbar-header col-lg-5 col-lg-offset-0 col-xs-12 col-sm-5 col-sm-offset-1"> <! -- 4 / off 0 -->
            <a class=" navi btn btn-primary navbar-btn col-lg-3 col-xs-5 btn-lg " role="button"><h5>Home</h5></a>
            <a class=" navi btn btn-success navbar-btn  col-lg-2 col-xs-5 btn-lg" href="pages/add.php" role="button"><h5>Dodaj</h5></a>
            <a class=" navi btn btn-danger navbar-btn col-lg-2 col-xs-5 btn-lg" href="#" role="button"><h5>Usuń</h5></a>
            <a class=" navi btn btn-warning navbar-btn col-lg-2 col-xs-5 btn-lg" href="#" role="button"><h5>Sortuj</h5></a>
        </div>

        <div class="navbar-header col-lg-3 col-lg-offset-2 col-xs-12 col-sm-4"> <! -- 2 / off 3 -->
        <a class=" navi btn btn-default navbar-btn btn-sm col-lg-5 col-xs-5 " href="#" role="button" onclick="show()"><span class="change_pass_button"> Zmień hasło</span></a>
        <a class=" btn btn-default navbar-btn btn-sm col-lg-5 col-xs-5" href="logout.php" role="button">Wyloguj</a>
        </div>

    </nav>






<div class="menu_first_pass" id="pass_block">
    <div class="menu_second">
        <br /><span style="font-size: 12px; text-align:center">
            <form action="change_password.php" method="post">
            Stare hasło:
            <input type="password" name="old_password" size="10">
            Nowe hasło:
            <input type="password" name="new_password1" size="10">
            Powtórz nowe hasło:
            <input type="password" name="new_password2" size="10">
            <input type="submit" value="Zmień hasło">
                </span>
        </form>
    </div>
</div>

<div class="message">
    <?php
    if (isset($_SESSION['alert']))
    {
        echo $_SESSION['alert'];
        unset($_SESSION['alert']);
    }
    //alerty dotyczące zmiany hasłą (puste pule, hasła nowe różne... z [change_password.php])
    ?>
</div>

    <header>
        <?php echo $line_logo['text_setting']; ?>
    </header>




  <!--  <div class="page">

    <div class="page_slave">

        <div class="search">
            <span style="font-size: 20px">Wyszukaj:</span><br/><br/>
            Tytuł: <input type="text" name="title" size="20px">
            W treści: <input type="text" name="contents" size="20px">
            Dodał: <select name="user">
                <option value="0">--</option>
                <option value="1">Paweł Szymczyk</option>
                <option value="2">Kamil Szpond</option>
                <option value="3">Mateusz Pianka</option>
                <option value="4">Piotr Jakacki</option>
            </select>
            Kategoria: <select name="category">
                <option value="0">--</option>
                <option value="1">CRM</option>
                <option value="2">Internet</option>
                <option value="3">Komputer</option>
                <option value="4">Inne</option>
            </select>
        </div>

-->
        <?php
        $query2 = "SELECT * FROM list "; //zapytanie SQL pod zmienną query
        $result2 = $db->query($query2); //pobiera dane $db (bazy danych) i wykonuje zapytanie
        $rows2 = $result2->num_rows; // liczy ile baza zwróciła wyników
        $page = isset ($_GET['page']) ? intval ($_GET['page'] -1): 0;
        $limit = 6;
        $from = $page * $limit;
        $all_page = ceil($rows2/$limit);
        //$query = "SELECT * FROM list LIMIT $from,$limit"; //zapytanie SQL pod zmienną query
        $query = "SELECT * FROM list, users, categories WHERE list.ID_user = users.ID_user AND list.category_ID = categories.category_ID ORDER BY ID_wiki DESC LIMIT $from, $limit"; //zapytanie SQL pod zmienną query
        $result = $db->query($query);
        //pobiera dane $db (bazy danych) i wykonuje zapytanie
        $rows = $result->num_rows; // liczy ile baza zwróciła wyników
        for ($i = 0; $i < $rows; $i++)
        { //pętla for od 0 do liczby wyników
            $line = $result->fetch_assoc(); //wpisanie wyniku do tablicy assocjacyjnej
            echo "
                    <div class=\"row col-lg-10 col-lg-offset-1\">
                        <div class=\"panel panel-primary\" >
                            <div class=\"panel-heading\"><a class='title'href='/pages/read_more.php?id=".$line['ID_wiki']."'> ".$line['title']."</a></div>
                                  <div class=\"panel-body hidden-xs\">"
                                . substr($line['contents'],0,340) .
                            "</div>
                            <div class=\"panel-footer\">Kto dodał: ".$line['name']." ".$line['surname']."<br />
                              Kategoria: ".$line['categories_name']."</span></div>
                        </div>
                    </div>";



        }



        echo "<div class=\"col-lg-12 page_num\">";
        for ($i = 1; $i <=$all_page; $i++)
        {
            $bold = ($i == ($page+1) ) ? 'style="font-size: 30px;':'';
            echo '<a '.$bold.' href="main.php?page='.$i.'">'.$i.'</a> | ';
        }
        echo "</div>";
        //LOGOWANIE 2 - SPRAWDZENIE - START
        unset($_SESSION['error']);
        $db->close(); //zamykanie połączenia z bazą danych
        }
        else
        {
            header('location: logout.php');
            exit();
            //jesli pierwszy warunek nie został spełniony to prześlij to strony wylogowania
        }
        //LOGOWANIE - SPRAWDZENIE - STOP
        ?>




    </div>
</body>
</html>