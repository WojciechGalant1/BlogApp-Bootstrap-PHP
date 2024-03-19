<?php
include 'server.php';
session_start();

$conn = new mysqli($servername, $username, $password, $dbname);

if (isset($_GET['id']) && isset($_SESSION['login']) && isset($_SESSION['user_type'])) {
    $user_type = $_SESSION['user_type'];
    $current_user = $_SESSION['login'];
    $article_id = $_GET['id'];

    if ($user_type == 'admin') {
        // Admin can delete any article
        $sql = "DELETE FROM Artykul WHERE id_artykul=" . $article_id;
    } else if ($user_type == 'czytelnik') {
        // Reader can only delete their own articles
        $sql = "DELETE FROM Artykul WHERE id_artykul=" . $article_id . " AND autor = '" . $current_user . "'";
    }

    if (mysqli_query($conn, $sql)) {
        header("Location: bts_index.php");
    } else {
        echo "Error deleting record: " . mysqli_error($conn);
    }
}

$sql = "SELECT * FROM Artykul";
$result = $conn->query($sql);
?>
<!DOCTYPE html>
<html lang="pl">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Usuwanie artykułu</title>
    <link rel="stylesheet" href="log_style.css">
</head>

<body>
    <div class="container">
        <h1>Usuwanie artykułu</h1>

        <?php
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo '<div class="article">';
                echo '<p>' . $row["tytul"] . " - ";
                echo $row["autor"] . '</p>';
                if ($_SESSION['user_type'] == 'admin' || ($_SESSION['user_type'] == 'czytelnik' && $_SESSION['login'] == $row["autor"])) {
                    echo '<a class="delete-button" href="usun_art.php?id=' . $row["id_artykul"] . '">Usuń</a>';
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