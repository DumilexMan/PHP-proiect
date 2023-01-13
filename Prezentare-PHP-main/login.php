<?php
print_r($_POST);
$Nume = $_POST['Nume'];
$Parola = $_POST['Parola'];
/*
$user = 'qakzbsotyir5hm083mif';
$password = 'pscale_pw_Lq2Tga84JuIFbxcl9z5xOLG3B61X27cuBcKL8VzGDvR';
*/
$user = "root";
$password = "";
$db = 'proiect_v1';

$db = new mysqli('localhost', $user, $password, $db);

if($db ->connect_error)
{
    die('Connection failed!' .$db->connect_error);
}
else
{
    $stmt = $db -> prepare("select * from utilizator where Nume = ?");
    $stmt -> bind_param("s",$Nume);
    $stmt -> execute();

    $stmt_rezultat = $stmt -> get_result();
    if($stmt_rezultat ->  num_rows > 0)
    {
        $data = $stmt_rezultat -> fetch_assoc();
        if($data['Parola'] == $Parola)
        {
            echo "Login successfull";
            header("Location : ./Pagina_logat.html");
        }
        else
        {
            echo "Nume sau parola invalida";
        }
    }
    else
    {
        echo "Nume sau parola invalida";
    }


}
?>

