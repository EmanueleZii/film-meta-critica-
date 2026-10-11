# Film Metacritick
Esercizio di programmazione risalenti a esperienze di studio e formazione precedenti, recuperato da un vecchio disco rigido e riorganizzato in questo repository a scopo di conservazione e consultazione,
potrebbero esserci funzioni deprecate. 

Progetto PHP semplice per la valutazione di film in stile "Metacritic": l'utente inserisce il titolo di un film e una valutazione da 1 a 5 stelle, e le valutazioni inserite vengono mantenute in sessione e visualizzate in un elenco.

## Struttura del progetto

```
filmMetacritick/
├── index.php                  # Menu principale + form di valutazione
├── ValutazioneUtente.php      # Riceve i dati del form e li salva in sessione
├── ElencoValutazioneFIlm.php  # Mostra l'elenco delle valutazioni inserite
├── MainMenu.css               # Stile del menu principale
└── utenteValutazione.css      # Stile della pagina di valutazione
```

## Requisiti

- PHP 8.1 o superiore (il codice usa funzioni non deprecato come `FILTER_SANITIZE_FULL_SPECIAL_CHARS`)
- Un server web locale (es. Laragon, XAMPP) oppure il server di sviluppo integrato: `php -S localhost:8000`

## Come funziona

1. **index.php** (menu principale)
   - Mostra un form con due campi:
     - `NomeFilm` (testo, obbligatorio): titolo del film
     - `ValutazioneFilm` (numero 1–5, obbligatorio): voto assegnato
   - Invia i dati a `ValutazioneUtente.php` con il metodo GET.

2. **ValutazioneUtente.php**
   - Legge i parametri `NomeFilm` e `ValutazioneFilm` dalla query string.
   - Sanitizza i valori con `filter_input` (`FILTER_SANITIZE_FULL_SPECIAL_CHARS` per il nome, `FILTER_SANITIZE_NUMBER_INT` per il voto) ed effettua l'escaping in output con `htmlspecialchars` per prevenire XSS.
   - Incrementa un contatore di sessione (`$_SESSION['counter']`) e salva ogni coppia (nome film, valutazione) in `$_SESSION['NomeFilm']` e `$_SESSION['ValutazioneFilm']`.
   - Mostra la conferma e due pulsanti: "Torna Al Menu" e "Elenco Menu".

3. **ElencoValutazioneFIlm.php**
   - Itera sulle valutazioni salvate in sessione e le mostra in una tabella con due colonne: Film e Valutazione.
   - Link per tornare al menu principale.

## Flusso

```
index.php (form GET)
      │
      ▼
ValutazioneUtente.php ──► salva in $_SESSION['NomeFilm'][$counter]
      │                   salva in $_SESSION['ValutazioneFilm'][$counter]
      ▼
ElencoValutazioneFIlm.php ──► tabella con tutte le valutazioni
```

## Note

- I dati sono salvati **solo in sessione** (`$_SESSION`): al termine della sessione del browser o alla chiusura del server le valutazioni vengono perse. Non è presente un database.
- Il link "Valutazione Utente" in `index.php` porta a `ValutazioneUtente.php` senza parametri: in quel caso la pagina mostra campi vuoti (gestito con `?? ''`).
- La tabella di `ElencoValutazioneFIlm.php` parte dal secondo record (il ciclo inizia da `$i = 1`, dato che il contatore di sessione parte da 0, il primo inserimento potrebbe non essere visualizzato).
- Per resettare le valutazioni è sufficiente cancellare i cookie di sessione o decommentare `session_destroy()` in `index.php`.
