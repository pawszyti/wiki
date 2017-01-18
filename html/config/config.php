<?php
$db_host = 'localhost';
$db_name = 'knowledge_base';
$db_user = 'root';
$db_pass = 'pawel098';

@ $db = new mysqli($db_host,$db_user,$db_pass,$db_name);
if (mysqli_connect_errno())
{
   echo "Error: ".$db->connect_errno;
   exit;
}
$db-> query("SET NAMES 'utf8' COLLATE 'utf8_general_ci'"); //dodanie kodowania utf-8
                //SETTINGS

//logo
$query_logo = "SELECT * FROM settings WHERE name_setting LIKE 'logo'";
if ($result_logo = $db->query($query_logo))
{
    $line_logo = $result_logo->fetch_assoc();
}
else
{
    echo "SQL error (logo)";
}
?>