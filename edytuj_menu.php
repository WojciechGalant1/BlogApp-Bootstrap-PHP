<?php
include 'server.php';
session_start();

$conn = new mysqli($host, $username, $password, $dbname);

$sql = "SELECT * FROM Artykul";
$result = $conn->query($sql);
?>
<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Edycja</title>
    <link rel="stylesheet" href="log_style.css">
</head>
<body>
    <div class="container">
        <h1>Wybór artykułu do edycji</h1>

        <?php
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo '<div class="article">';
                echo '<p>' . $row["tytul"] . " - ";
                echo $row["autor"] . '</p>';
                if ($_SESSION['user_type'] == 'admin' || ($_SESSION['user_type'] == 'czytelnik' && $_SESSION['login'] == $row["autor"])) {
                    echo '<a class="edit-button" href="edytuj.php?id=' . $row["id_artykul"] . '">Edytuj</a>';

                    $_SESSION['id_artykul'] = $row["id_artykul"]; // Zapisz id artykułu do sesji
                }
                echo '</div>';
            }
        } else {
            echo "Brak artykułów w bazie.";
        }

        $conn->close();
        ?>
    </div>

<div class="cancel-button-container">
        <button class="cancel-button" type="button" onclick="location.href='bts_index.php'">Anuluj</button>
    </div>

</body>
</html>
