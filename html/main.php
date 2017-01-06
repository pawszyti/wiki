<?php
session_start();
if (isset($_SESSION['online']) && $_SESSION['online'] == "e117797422d35ce52f036963c7e9603e9955b5c7" && isset($_COOKIE['status'])) {
    //Czy istnieje zmienna sesyjna "online", czy zawartosc zmiennej sesyjnej odpowiada ciagowi znakow , czy istnieje cookie status
setcookie("status",'online', time()+900);
    //odświerzenie cookie status na 15 minut jesli juz istnieło w momencie załadowania
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
    <title>Baza Wiedzy - CSSA</title>

    <link href="css/style.css" rel="stylesheet">
    <link href="css/change_password.css" rel="stylesheet">


</head>
<body>

    <div class="menu_first">
        <div class="menu_second">

            <button class="active">
                <img src="img/home.png" width="17px" height="17px">
                    Home
            </button>

            <button class="menu_third" onclick="window.location.href='pages/add.php'">
                <img src="img/plus.png" width="17px" height="17px">
                    Dodaj
            </button>

            <button class="menu_third">
                <img src="img/minus.png" width="17px" height="17px">
                    Usuń
            </button>

            <button class="menu_third">
                <img src="img/info.png" width="17px" height="17px">
                    Sortuj
            </button>

            <button class="menu_fourth" onclick="window.location.href='logout.php'">
                <img src="img/stop.png" width="17px" height="17px">
                    Wyloguj
            </button>

            <button class="menu_fourth">
                <img src="img/pass.png" width="17px" height="17px">
                    Zmień hasło
            </button>

            <div class="menu_five">

                <span style="font-weight: bold; font-size: 14px">  <?php echo "Zalogowany: " . $name . " " . $surname ?></span>
                <!--wyświetlenie kto jest aktualnie zalogowany-->
            </div>
        </div>
    </div>

    <div class="menu_first_more">
        <div class="menu_second">
            <br />
            <form action="change_password.php" method="post">
            Stare hasło:
            <input type="text" name="old_password">
            Nowe hasło:
            <input type="text" name="new_password1">
            Powtórz nowe hasło:
            <input type="text" name="new_password2">
            <input type="submit" value="Zmień">
            </form>

        </div>
        <?php
        if (isset($_SESSION['alert_pass']))
        {
            echo $_SESSION['alert_pass'];
            unset($_SESSION['alert_pass']);
        }
        ?>
    </div>



    <div class="page">
        <header>
            Baza Wiedzy CSSA
        </header>

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
        <?php
        $query = "SELECT * FROM list"; //zapytanie SQL pod zmienną query
        $result = $db->query($query); //pobiera dane $db (bazy danych) i wykonuje zapytanie
        $rows = $result->num_rows; // liczy ile baza zwróciła wyników
        for ($i = 0; $i < $rows; $i++) { //pętla for od 0 do liczby wyników
            $line = $result->fetch_assoc(); //wpisanie wyniku do tablicy assocjacyjnej
            echo "
            <div class=\"inbox\">
            <span class=\"title\">" . $line['title'] . "</span><br /><hr>
            <span style=\"text-align: left\">" . $line['contents'] . "<br /> 
            Kto dodał: Paweł Szymczyk <br />
            Kategoria: CRM </span>
            </div>";
        }
        unset($_SESSION['error']);
        $result->free(); //zwalnienie zmiennej $wynik
        $db->close(); //zamykanie połączenia z bazą danych
        ?>
        <br/>
        <div class="number"> Strona: 1 >>
        </div>
    </div>
    <?php
    }
    else
    {
        header('location: logout.php');
        exit();
        //jesli pierwszy warunek nie został spełniony to prześlij to strony wylogowania
    }
    ?>
</body>
</html>
