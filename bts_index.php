<?php session_start(); ?>
<!DOCTYPE html>

<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title></title>
    <!-- Latest compiled and minified CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Latest compiled JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="bts_style.css">
    

<!-- alert -->

<script>
        // Sprawdź, czy istnieje zmienna sesyjna z informacją o błędzie
        <?php if (isset($_SESSION['login_error'])) : ?>
            // Wyświetl alert z informacją o błędzie
            alert('<?php echo $_SESSION['login_error']; ?>');

            // Usuń zmienną sesyjną
            <?php unset($_SESSION['login_error']); ?>
        <?php endif; ?>
    </script>

    <!-- rozwijanie -->
    <script>
        function toggleContent(id) {
            var content = document.getElementById("content-" + id);
            if (content.style.display === "none") {
                content.style.display = "block";
            } else {
                content.style.display = "none";
            }
        }
    </script>
    <!-- data i godzina -->
    <script>
        function updateDateTime() {
            const now = new Date();
            const formattedDateTime = now.toLocaleDateString('pl-PL', {
                year: 'numeric',
                month: 'long',
                day: 'numeric',
                hour: '2-digit',
                minute: '2-digit',
                second: '2-digit'
            });

            document.getElementById('date-time').innerText = formattedDateTime;
        }

        setInterval(updateDateTime, 1000);
    </script>
<!-- alert -->
<script>
    function validateForm() {
        var login = document.getElementById('login').value;
        var haslo = document.getElementById('haslo').value;

        if (login === '' || haslo === '') {
            alert('Proszę wprowadzić login i hasło');
            return false; 
        }
        

        return true; 
    }
</script>


</head>

<body>
    <div class="container">

        <header class="row mt-4 p-5 bg-primary text-white">

            <div class="col-sm-2 ">
                <img id="header-logo" class="mx-auto d-block" src="logo.png">

            </div>
            <div class="col-sm-8">

                <h1>
                    <?php

                    if (isset($_SESSION['login'])) {
                        echo "Witaj " . $_SESSION['login'];
                    } else {
                        echo "Witaj Niezalgowany";
                    }
                    ?>
                </h1>
                <!-- -->

                <div id="carouselExampleSlidesOnly" class="carousel slide carousel-frame" data-bs-ride="carousel">
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img src="https://picsum.photos/id/10/850/100" alt="first">
                        </div>
                        <div class="carousel-item">
                            <img src="https://picsum.photos/id/11/850/100" alt="second">
                        </div>
                        <div class="carousel-item">
                            <img src="https://picsum.photos/id/13/850/100" alt="third">
                        </div>
                    </div>
                </div>



            </div>
            <div class="col-sm-2">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-clock-fill" viewBox="0 0 16 16">
                    <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM8 3.5a.5.5 0 0 0-1 0V9a.5.5 0 0 0 .252.434l3.5 2a.5.5 0 0 0 .496-.868L8 8.71V3.5z" />
                </svg>
                <p>
                </p>
                <p id="date-time"> </p>
            </div>

        </header>

        <div class="row">
            <div class="col-sm-12 bg-dark">
                <nav class="navbar navbar-expand-sm bg-dark navbar-dark sticky-top">
                    <div class="container-fluid">
                        <a class="navbar-brand" href="logout.php">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-box-arrow-right" viewBox="0 0 16 16">
                                <path fill-rule="evenodd" d="M10 12.5a.5.5 0 0 1-.5.5h-8a.5.5 0 0 1-.5-.5v-9a.5.5 0 0 1 .5-.5h8a.5.5 0 0 1 .5.5v2a.5.5 0 0 0 1 0v-2A1.5 1.5 0 0 0 9.5 2h-8A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h8a1.5 1.5 0 0 0 1.5-1.5v-2a.5.5 0 0 0-1 0v2z" />
                                <path fill-rule="evenodd" d="M15.854 8.354a.5.5 0 0 0 0-.708l-3-3a.5.5 0 0 0-.708.708L14.293 7.5H5.5a.5.5 0 0 0 0 1h8.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3z" />
                            </svg>
                        </a>
                        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#collapsibleNavbar">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse" id="collapsibleNavbar">
                            <ul class="navbar-nav">
                                <?php if (isset($_SESSION['login']) && $_SESSION['login'] !== null) { ?>
                                    <li class="nav-item">
                                        <a class="nav-link" href="dodaj_art.html">Dodaj artytkul</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="usun_art.php">Usuń artykul</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="edytuj_menu.php">Edytuj artykul</a>
                                    <?php } ?>
                                    </li>
                            </ul>
                        </div>
                    </div>
                </nav>
            </div>
        </div>
        <br>

        <main class="row">
            <div class="col-sm-9">

                <article class="image-text-container img-fluid">

                    <div class="row">
                        <div class="col-md-4">
                            


                        </div>
<!-- 
                        <div class="col-md-8">
                            <h1>Tytul</h1>
                            <h2>Autor
                            </h2>

                            <p class="intro" style="width: 90%; max-width: 100%; height: auto;">
                                Tekst artykulu Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris a sodales
                                turpis, quis elementum velit. Etiam a felis tempor, efficitur ipsum et, dictum velit.
                                Etiam et felis dignissim, semper arcu in, semper ante. Donec metus massa, porta sed leo
                                vitae, rutrum molestie est. Cras laoreet cursus risus, at sagittis est vestibulum eget.
                                Suspendisse justo ante, consequat vel vestibulum vel, eleifend sit
                                sollicitudin tellus suscipit in. Nulla finibus sit amet augue vel posuere. Suspendisse
                                euismod velit sed massa convallis pulvinar. Fusce id neque congue, tincidunt tortor
                                semper, gravida leo. Sed fringilla condimentum nisi eget posuere. Morbi malesuada
                                pellentesque dolor, vel feugiat ipsum posuere a. Curabitur vestibulum sem in egestas
                                rhoncus.
                            </p>
                        </div>
                        -->
                    </div>
                </article>

                <?php
                include 'server.php';

                $conn = mysqli_connect($host, $username, $password, $dbname);

                if (!$conn) {
                    die("Błąd połączenia z bazą danych: " . mysqli_connect_error());
                }

                $sql = "SELECT * FROM Artykul";
                $result = mysqli_query($conn, $sql);

                if (mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo '<article class="image-text-container img-fluid">';
                        echo '<div class="row">';
                        echo '<div class="col-md-4">';
                        echo '<img src="' . $row['obrazek'] . '" style="width: 90%; max-width: 100%; height: auto;" />';
                        echo '</div>';
                        echo '<div class="col-md-8">';
                        echo '<h1>' . $row['tytul'] . '</h1>';
                        echo '<h2>' . $row['autor'] . '</h2>';
                        echo '<p class="intro" style="width: 90%; max-width: 100%; height: auto;">' . $row['wstep'] . '</p>';

                        echo '<div id="content-' . $row['id_artykul'] . '" style="display: none;">';
                        echo '<p>' . $row['tresc'] . '</p>';
                        echo '</div>';

                        echo '<button onclick="toggleContent(' . $row['id_artykul'] . ')" class="btn btn-primary">Rozwiń</button>';
                        echo '</div>';
                        echo '</div>';
                        echo '</article>';
                    }
                } else {
                    echo "Brak artykułów do wyświetlenia";
                }

                mysqli_close($conn);
                ?>


            </div>
            <div class="col-sm-3 bg-light">
                <div class="login-form">
                    <form action="logowanie.php" method="post" onsubmit="return validateForm()">
                        <div>
                            <label for="login">Login:</label>
                            <input type="text" id="login" name="login" required>
                        </div>

                        <div>
                            <label for="password">Hasło:</label>
                            <input type="password" id="haslo" name="haslo" required>
                        </div>
                        <div class="button-log">
                            <button type="submit" class="animated-button">
                                Zaloguj
                            </button>
                        </div>
                    </form>
                </div>
            </div>
    </div>


    </main>
    <footer class="bg-dark text-white mt-4 p-5" id="footer">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <h3 class="footer-heading mb-4">Lokalizacja</h3>
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2563.9572552725517!2d22.67097491571557!3d50.01215637941724!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x473c9bd00702269d%3A0x34c3e02f77a47069!2sPa%C5%84stwowa%20Wy%C5%BCsza%20Szko%C5%82a%20Techniczno-Ekonomiczna!5e0!3m2!1spl!2spl!4v1679254456739!5m2!1spl!2spl" width="100%" height="300" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
                <div class="col-lg-6">
                    <h3 class="footer-heading mb-4">Kontakt</h3>
                    <ul class="list-unstyled">
                        <li><strong>Adres:</strong> Twoja ulica, Twój kod pocztowy, Twoje miasto</li>
                        <li><strong>Telefon:</strong> Twój numer telefonu</li>
                        <li><strong>Email:</strong> Twój adres email</li>
                    </ul>
                </div>
            </div>
        </div>
    </footer>





</body>




</html>