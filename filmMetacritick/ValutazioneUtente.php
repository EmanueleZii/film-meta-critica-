 <?php
    session_start();
   ?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Valutazione Utente</title>
        <link rel="stylesheet" href="utenteValutazione.css">
    </head>
    <body>
        <h1>Valutazione Utente: </h1>

        <?php
            $nomeFilm = filter_input(INPUT_GET, 'NomeFilm', FILTER_SANITIZE_FULL_SPECIAL_CHARS) ?? '';
            $ValutazioneFilm = filter_input(INPUT_GET, 'ValutazioneFilm', FILTER_SANITIZE_NUMBER_INT) ?? '';

            if (!isset($_SESSION['counter'])) {
                $_SESSION['counter'] = 0;
            }

            $counter = $_SESSION['counter']++;

            $_SESSION['NomeFilm'][$counter] = $nomeFilm;
            $_SESSION['ValutazioneFilm'][$counter] = $ValutazioneFilm;

            echo '<p class ="film">'.'Nome Del Film: ' . htmlspecialchars($nomeFilm, ENT_QUOTES, 'UTF-8') .'</p>';
            echo "<br>";
            echo '<p class ="film">'.'Valutazione Del Film: ' . htmlspecialchars($ValutazioneFilm, ENT_QUOTES, 'UTF-8').'</p>';
            echo "<br>";
        ?>
        <button class="btn">
            <a href="index.php">Torna Al Menu</a>
        </button>
        <br>
        <button class="btn">
            <a href="ElencoValutazioneFIlm.php">Elenco Menu</a>
        </button>
   </body>
</html>