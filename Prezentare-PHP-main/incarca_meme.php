<?php

$Link = $_POST['Link_meme'];
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
    $stmt = $db -> prepare("insert into meme(id_meme,link_meme) values (?, ?)");
    $query = "SELECT id_meme FROM meme";
    $result = mysqli_query($db, $query);
    $data = array();
    while($row = mysqli_fetch_assoc($result)){
        $data[] = $row['id_meme'];
    }
    $max1=-1;
    foreach($data as $nr)
        if($nr>$max1)
            $max1 = $nr;
    $max1=$max1+1;
    $stmt -> bind_param("ss",$max1,$Link);
    $stmt -> execute();
    echo("Ai reusit!");
    $stmt -> close();
    $db -> close();
}


?>