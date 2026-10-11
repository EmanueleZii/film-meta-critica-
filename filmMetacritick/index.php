<?php 
session_start();
//session_destroy();
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>MetaCritic Film</title>
        <link rel="stylesheet" href="MainMenu.css">
    </head>
    <body>
        <h1>Film Valutation</h1>
        
        <form action="ValutazioneUtente.php" method="get">
            <label>Titolo Del Film: </label>
            <br>
            <input type="text" name="NomeFilm" placeholder="NomeDelFilm" required="required"/>
            <br>
            <label>Valutazione Film: </label>
            <br>
            <input type="number" name="ValutazioneFilm" placeholder="ValutazioneFilm" min = "1" max = "5" required="required"/>
            <br>
            <button class="submit" type="submit" name="submit">Submit</button>
        </form>
        <br>
        <button class="btn"> 
            <a class="elenco" href="ElencoValutazioneFIlm.php">Elenco Menu</a>
        </button>
         <br>
          <button class="btn"> 
              <a class="Valutazione" href="ValutazioneUtente.php">Valutazione Utente</a>
          </button>
    </body>
</html>
