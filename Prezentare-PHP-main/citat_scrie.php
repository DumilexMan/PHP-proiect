<?php

$Citat = $_POST['Citat'];
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
    $stmt = $db -> prepare("insert into citate(id_citat,citat) values (?, ?)");
    $query = "SELECT id_citat FROM citate";
    $result = mysqli_query($db, $query);
    $data = array();
    while($row = mysqli_fetch_assoc($result)){
        $data[] = $row['id_citat'];
    }
    $max1=-1;
    foreach($data as $nr)
        if($nr>$max1)
            $max1 = $nr;
    $max1=$max1+1;
    $stmt -> bind_param("ss",$max1,$Citat);
    $stmt -> execute();
    echo("Ai reusit!");
    $stmt -> close();
    $db -> close();
}


?>