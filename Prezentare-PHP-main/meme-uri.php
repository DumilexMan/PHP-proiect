<?php
$host = "localhost";
$user = "root";
$password = "";
$database = "proiect_v1";
$conn = mysqli_connect($host, $user, $password, $database);
$query = "SELECT link_meme FROM meme";
$result = mysqli_query($conn, $query);
$data = array();
while($row = mysqli_fetch_assoc($result)){
    $data[] = $row['link_meme'];
}
mysqli_close($conn);
/*
for $i in $data.count()
  print($data[$i]);
*/
foreach ($data as $gluma)
    {
        print($gluma);
        echo "\n<br>";
    }
?>