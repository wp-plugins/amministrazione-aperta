=== Amministrazione Aperta ===
Contributors: Milmor
Tags: amministrazione, aperta, spese, comuni, pa, amministrazioni, locali, pubblicazione, online, imprese, enti, obbligo, legge, comune, modulo
Requires at least: 3.3
Tested up to: 3.5.1
Version: 1.2.2
Stable tag: 1.2.2
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

Soluzione completa per la  pubblicazione online ai sensi del D.L. n.22 giugno 2012 n. 83 di spese e sovvenzioni concessi alle imprese da enti pubblici.

== Description ==
= Premessa =
Al fine di ottemperare all’obbligo normativo, per ogni spesa superiore a € 1.000 documentata dall’ente è richiesta la pubblicazione di informazioni relative a:

* ragione sociale e dati fiscali dell’impresa beneficiaria;
* importo di spesa;
* norma o titolo a base dell’attribuzione;
* ufficio, funzionario o responsabile del procedimento amministrativo;
* metodo e modalità per la scelta del beneficiario;
* informazioni su: progetto, curriculum del soggetto incaricato, contratto e capitolato della prestazione, fornitura o servizio.

La normativa richiede dunque la soddisfazione di diversi parametri di accessibilità:

* consultazione più agevole possibile;
* indicizzazione nei motori di ricerca;
* visualizzazioni con funzioni di esportazione, il trattamento e il riutilizzo dei dati.

= Funzioni del Plugin =
Tramite questa estensione è possibile gestire in maniera semplice e veloce tutte le informazioni richieste per assolvere all'obbligo di legge.
In particolare, è possibile inserire direttamente dal pannello di amministrazione di Wordpress tutti i dati necessari:

* Titolo
* Importo
* Beneficiario
* Dati Fiscali
* Norma
* Modalità
* Responsabile
* Determina
* Data

L'utente finale potrà dunque:

* Visualizzare e navigare tutte le spese, cercare quella interessata o catalogarle per data, nome,...
* Esportare i dati in formato CSV, XLS (Excel), PDF

Maggiori info su [amministrazioneaperta.wordpress.com](http://amministrazioneaperta.wordpress.com/ "Wordpress Plugin Gratuito – Pubblicazione delle Spese di enti locali ai sensi del D.L. n.22 giugno 2012 n. 83")

= Funzioni in corso di Sviluppo =
* Possibilità di caricare file come allegati alla spesa
* Possibilità di visualizzazione singola per ogni spesa
* Possibilità di caricamento massivo delle spese (back-end)

== Installation ==

1. Carica il contenuto estratto nella cartella `/wp-content/plugins/`
2. Attiva il plugin dal menu 'Plugins' in WordPress
3. Inserisci `[ammap]` nella pagina/articolo in cui vuoi che venga visualizzata la tabella di Amministrazione Aperta
In alternativa, aggiungi <?php echo do_shortcode('[ammap]') ?> nel template in uso.

== Screenshots ==
1. Menù Laterale
2. Pagina "Nuova Spesa"
3. Tabella generata inserendo '[ammap]' nella pagina
4. Funzioni di ricerca/esportazione per l'utente finale


== Changelog ==
= Versione 1.2.2 - 16.04.2013 =
* Modifiche Css Minori - Ottimizzazione CSS
* Modifica grafica minore (nuova img background)
= Versione 1.2.1 - 3.04.2013 =
* Aggiunta variabile "bSort": true nella tabella per il riordino alfabetico dei dati
* Validazione XHTML
= Versione 1.2 - 3.04.2013 =
* BugFix - Tutte le spese sono ora visibili
* E' ora possibile per l'utente finale esportare i dati della tabella (PDF, CSV, EXCEL)
* Correzioni CSS (anche per la funzione di esportazione dati)
* Aggiunta barra di scorrimento orizzontale per avere una larghezza e leggibilità ottimale
* Corretti problemi di adattamento larghezza
= Versione 1.1.1 - 3.04.2013 =
* Bugfix - Riferimenti a file .js e .css corretti
* Bugfix - Altri fix minori
= Versione 1.1 - 2.04.2013 (!) =
* Bugfix - Errore fatale che impediva l'attivazione del plugin su alcuni server
= Versione 1.0 - 2.04.2013 =
* Pubblicazione su Wordpress.org
= Versione 0.2 14/12/2012 =
* Aggiunta Pagina "Credits"
* Aggiunte descrizioni metabox e normativa in pagina "Credits"
= Versione 0.1 10/12/2012 =
* Lancio del Progetto
(!) = Aggiornamento Importante (Sicurezza/Stabilità)