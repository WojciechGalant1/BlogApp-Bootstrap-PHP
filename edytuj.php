<?php
include 'server.php';
session_start();

$conn = new mysqli($host, $username, $password, $dbname);

$id = $_SESSION['id_artykul'];



$sql = "SELECT * FROM Artykul WHERE id_artykul='$id'";

$result = $conn->query($sql);



if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
} else {
    die("Artykuł nie został znaleziony.");
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Obsługa aktualizacji artykułu
    $autor = $_POST['autor'];
    $tytul = $_POST['tytul'];
    $wstep = $_POST['wstep'];
    $tresc = $_POST['tresc'];
    $obrazek = $_POST['obrazek'];

    $updateSql = "UPDATE Artykul SET autor='$autor', tytul='$tytul', wstep='$wstep', tresc='$tresc', obrazek='$obrazek' WHERE id_artykul='$id'";
    if ($conn->query($updateSql) === TRUE) {
        header('Location: bts_index.php');
        exit();
    } else {
        echo "Błąd podczas aktualizacji artykułu: " . $conn->error;
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="pl">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Edycja artykułu</title>
    <link rel="stylesheet" href="log_style.css">
</head>

<body>
    <div class="container">
        <h1>Edycja artykułu</h1>

        <form method="POST" action="edytuj.php">
            <input type="hidden" id="id" name="id" value="<?php echo $id; ?>" required>

            <div class="form-group">
                <label for="autor">Autor:</label>
                <input type="text" id="autor" name="autor" value="<?php echo $row['autor']; ?>" required>
            </div>

            <div class="form-group">
                <label for="tytul">Tytuł:</label>
                <input type="text" id="tytul" name="tytul" value="<?php echo $row['tytul']; ?>" required>
            </div>

            <div class="form-group">
                <label for="wstep">Wstęp:</label>
                <textarea id="wstep" name="wstep" rows="4" cols="50" required><?php echo $row['wstep']; ?></textarea>
            </div>

            <div class="form-group">
                <label for="tresc">Treść:</label>
                <textarea id="tresc" name="tresc" rows="8" cols="50" required><?php echo $row['tresc']; ?></textarea>
            </div>

            <div class="form-group">
                <label for="obrazek">Obrazek:</label>
                <input type="text" id="obrazek" name="obrazek" value="<?php echo $row['obrazek']; ?>">
            </div>

            <div class="button-group">
                <input class="submit-button" type="submit" value="Zaktualizuj artykuł">
                <button class="cancel-button" type="button" onclick="location.href='bts_index.php'">Anuluj</button>
            </div>
        </form>
    </div>
</body>

</html>