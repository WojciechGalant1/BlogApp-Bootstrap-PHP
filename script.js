// Sprawdź, czy istnieje zmienna sesyjna z informacją o błędzie
if (<?php echo isset($_SESSION['login_error']) ? 'true' : 'false'; ?>) {
    // Wyświetl alert z informacją o błędzie
    alert('<?php echo isset($_SESSION['login_error']) ? $_SESSION['login_error'] : ''; ?>');

    // Usuń zmienną sesyjną
    <?php unset($_SESSION['login_error']); ?>
}

// Funkcja do rozwijania zawartości
function toggleContent(id) {
    var content = document.getElementById("content-" + id);
    if (content.style.display === "none") {
        content.style.display = "block";
    } else {
        content.style.display = "none";
    }
}

// Funkcja do aktualizacji daty i godziny
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

// Aktualizacja daty i godziny co sekundę
setInterval(updateDateTime, 1000);

// Funkcja do walidacji formularza
function validateForm() {
    var login = document.getElementById('login').value;
    var haslo = document.getElementById('haslo').value;

    if (login === '' || haslo === '') {
        alert('Proszę wprowadzić login i hasło');
        return false; 
    }

    return true; 
}
