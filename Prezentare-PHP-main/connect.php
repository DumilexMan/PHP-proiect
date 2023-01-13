<?php

$Nume = $_POST['Nume'];
$Parola = $_POST['Parola'];
/*
$user = 'root';
$password = '';
*/
$db = 'proiect_v1';
$user = 'root';
$password = '';


$db = new mysqli('localhost', $user, $password, $db);

if($db ->connect_error)
{
    die('Connection failed!' .$db->connect_error);
}
else
{
    $stmt = $db -> prepare("insert into utilizator(Nume,Parola) values (?, ?)");
    $stmt -> bind_param("ss",$Nume,$Parola);
    $stmt -> execute();
    echo("Ai reusit!");
    $stmt -> close();
    $db -> close();
    header("Location : ./mail_cod.php");
}


?>