<?php
session_start();
include 'server.php';

$conn = mysqli_connect($host, $username, $password, $dbname);

if (!$conn) {
    die("Błąd połączenia z bazą danych: " . mysqli_connect_error());
}

$autor = $_POST['autor'];
$tytul = $_POST['tytul'];
$wstep = $_POST['wstep'];
$tresc = $_POST['tresc'];
$obrazek = $_POST['obrazek'];
$fk_user = $_SESSION['id_user']; 

$sql = "INSERT INTO Artykul (tytul, autor, wstep, tresc, obrazek, fk_user) VALUES ('$tytul', '$autor', '$wstep', '$tresc', '$obrazek', '$fk_user')";

if (mysqli_query($conn, $sql)) {
    header('Location: bts_index.php');
    exit();
} else {
    echo "Błąd: " . mysqli_error($conn);
}

mysqli_close($conn);
?>
