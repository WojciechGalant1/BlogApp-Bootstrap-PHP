<?php
session_start();



if (isset($_POST['login']) && isset($_POST['haslo'])) {
    $login = $_POST['login'];
    $haslo = $_POST['haslo'];

    include 'server.php';
$conn = new mysqli($host, $username, $password, $dbname);

    // Sprawdzenie poprawności danych logowania w bazie danych
    $sql = "SELECT * FROM Users WHERE login = '$login' AND haslo = '$haslo'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) == 1) {
        // Poprawne dane logowania
        $row = mysqli_fetch_assoc($result);
        $_SESSION['login'] = $login;
        $_SESSION['user_type'] = $row['user_type'];
        $_SESSION['id_user'] = $row['id_user'];

        echo "Witaj $login";
        header('Location: ' . $_SERVER['HTTP_REFERER']);
        exit();
    } else {
        // Błędne dane logowania
        $_SESSION['login_error'] = "Błędny login lub hasło";
        header('Location: bts_index.php');
         exit();
    }

    mysqli_close($conn);
}
?>
