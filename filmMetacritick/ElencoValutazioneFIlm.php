<?php
session_start();
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <table border="1">
            <thead>
                <tr>
                    <td>Film</td>
                    <td>Valutazione</td>
                </tr>
            </thead>
            <tbody>                
                <tr>
                    <?php
                    for ($i=1;$i<count($_SESSION['NomeFilm']);$i++)
                    {
                        echo "<td>". $_SESSION['NomeFilm'][$i]."</td>";
                        echo "<td>". $_SESSION['ValutazioneFilm'][$i]."</td>";
                    }
                    echo  "</tr>";
                    ?>
            </tbody>
        </table>
        <a href="index.php">Torna Al Menu</a>
        <br>
        <a href="ValutazioneUtente.php"></a>
    </body>
</html>
