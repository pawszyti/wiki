<?php
$db_host = 'localhost';
$db_name = 'knowledge_base';
$db_user = 'root';
$db_pass = 'pawel098';

@ $db = new mysqli($db_host,$db_user,$db_pass,$db_name);


if (mysqli_connect_errno()) {
    echo 'Błąd: Połączenie z bazą danych nie powiodło się';
    exit;

}

$db-> query("SET NAMES 'utf8' COLLATE 'utf8_general_ci'"); //dodanie kodowania utf-8

?>

<?php

//$zapytanie = "SELECT * FROM list"; //zapytanie SQL pod zmienną zapytanie
//$wynik = $db->query($zapytanie); //pobiera dane $db (bazy danych) i wykonuje zapytanie
//$ile = $wynik->num_rows; // liczy ile baza zwróciła wyników


//for ($i=0; $i<$ile; $i++){ //pętla for od 0 do liczby wyników
//    $wiersz = $wynik->fetch_assoc(); //wpisanie wyniku do tablicy assocjacyjnej
//    echo $wiersz['title']; //wypisanie konkretnego pola z tablicy
//    echo "<br />";
//}
//$wynik->free(); //zwalnienie zmiennej $wynik
//$db->close(); //zamykanie połączenia z bazą danych

?>


