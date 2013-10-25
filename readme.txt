=== Amm. Aperta (Contributi & Concessioni PA) ===
Contributors: Milmor
Tags: amministrazione, aperta, spese, comuni, pa, amministrazioni, locali, pubblicazione, online, imprese, enti, obbligo, legge, comune, modulo, decreto, 22 giugno, 2012, sovvenzioni, pubblici, pubblico, marco, milesi, amministrazione, trasparente
Requires at least: 3.3
Tested up to: 3.6
Version: 2.2.2
Stable tag: 2.2.2
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

Soluzione completa per la pubblicazione di sovvenzioni, contributi, sussidi e vantaggi economici, anche in formato open data, come richiesto dal D.Lgs. 33/2013

== Description ==

> Si consiglia di utilizzare questo plugin insieme a [Amministrazione Trasparente Plugin per Wordpress](http://wordpress.org/plugins/amministrazione-trasparente "Amministrazione Trasparente Plugin per Wordpress"). Infatti, per una pubblicazione efficiente, è consigliabile creare una voce di Amministrazione Trasparente inserendo al suo interno il tag di Amm.Aperta

Soluzione completa per la pubblicazione degli open data richiesti dal comma 2 dell'art. 26 del D.Lgs. 14 marzo 2013 n. 33 (a seguito dell'abrogazione dell'art. 18 del D.L. n.22 giugno 2012 convertito dalla Legge 7 agosto 2012 n. 134) di sovvenzioni, contributi, sussidi e vantaggi economici.

= Premessa =
Al fine di ottemperare all’obbligo normativo per la gestione degli OPENDATA di [Amministrazione Trasparente](http://wordpress.org/plugins/amministrazione-trasparente "Amministrazione Trasparente Plugin per Wordpress"), è richiesta la pubblicazione di sovvenzioni, contributi, sussidi e vantaggi economici con le seguenti informazioni:

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
* TESTO A PIACERE
* Importo
* Beneficiario
* Dati Fiscali
* Norma
* Modalità
* Responsabile
* Determina
* Data
* Eventuali file allegati

L'utente finale potrà dunque:

* Visualizzare e navigare tutte le spese, cercare quella interessata o catalogarle per data, nome,...
* Esportare i dati in formato CSV, XLS (Excel), PDF

> **ATTENZIONE** | **"For each author’s protection [***] we want to make certain that everyone understands that there is no warranty for this free software.** In accordo con la licenza GPL v.2 con cui questo software viene fornito, **declino** ogni responsabilità per eventuali inadempimenti legislativi e/o altri problemi legali e/o tecnici derivanti, implicitamente o esplicitamente, dall'utilizzo di questo plugin Wordpress o da un'affrettata configurazione dello stesso (ivi compresi eventuali aggiornamenti). E' compito del gestore del sito assicurarsi che il modulo funzioni correttamente e adempia agli obblighi di legge e, al contempo, è obbligo degli operatori/impiegati/dipendenti/funzionari preposti alla gestione dell'Amministrazione Trasparente la pubblicazione degli opportuni dati.

== Installation ==

1. Carica il contenuto estratto nella cartella `/wp-content/plugins/`
2. Attiva il plugin dal menu 'Plugins' in WordPress
3. Inserisci `[ammap]` nella pagina/articolo in cui vuoi che venga visualizzata la tabella di Amministrazione Aperta
4. A partire dalla versione 2.2 è possibile suddividere le spese per anno (come richiesto dalla normativa) utilizzando tag del tipo [ammap anno=2013]. Utilizzando il vecchio tag [ammap] verranno invece mostrate TUTTE le voci presenti nel database!
In alternativa, aggiungi `<?php echo do_shortcode('[ammap]') ?>` o `<?php echo do_shortcode('[ammap anno=2013]') ?>` nel template in uso.

== Screenshots ==
1. Menù Laterale
2. Pagina "Nuova Spesa"
3. Tabella generata inserendo '[ammap]' nella pagina
4. Funzioni di ricerca/esportazione per l'utente finale


== Changelog ==

= Versione 2.2.2 - 25.10.2013 =
* Corretto possibile conflitto nella funzione di cambio titolo della voce nell'editor di WP

= Versione 2.2.1 - 11.10.2013 =
* Ripristinata voce di menù 'Spese'
* Aggiunte nuove "Modalità Assegnazione": Cottimo Fiduciario / Mercato Elettronico / Convenzione CONSIP / Procedura aperta / Procedura negoziata / Procedura ristretta / Procedura selettiva | Grazie a Andrea Longhi & Igor Vita

= Versione 2.2 // Nuovo Nome: Amm. Aperta (Contributi & Concessioni PA) - 6.10.2013 =
* Nuovo nome
* **Aggiunta** possibilità di dividere le spese per anno (es. tag [ammap anno="2013"]
* **Aggiunta** possibilità di inserire testo libero
* **Aggiunta** opzione per disabilitare la visualizzazione automatica degli allegati (es. se si vuole inserirli manualmente nel testo o se si usa una soluzione come WP Attachments)
* **Rimosso** metabox 'Custom Fields'
* **Aggiunto** un disclaimer promemoria di esclusione di responsabilità nel file readme.txt (in accordo con la licenza GPL v.2 con cui questo software viene fornito)

= Versione 2.1.3 - 23.07.2013 (!) =
* Aggiunte info autore in readme.txt
* BugFix - Risolto problema che causava l'apparizione dello shortcode sempre in alto
* Aggiunto avviso Amm.Trasparente una volta installato il plugin
= Versione 2.1.2 - 30.06.2013 (!) =
* Aggiunta condizione reset_query che in alcuni casi mostrava gli articoli sotto la tabella
= Versione 2.1.1 - 28.06.2013 =
* Miglioramenti CSS
* Larghezza tabella automatica
* Date in formato gg/mm/anno
= Versione 2.1 - 5.05.2013 (!) =
* Impostazione rewrite=false (link più grezzi ma sempre funzionanti senza bisogno di riscrittura)
* Ottimizzazioni minori - Pulizia codice Php
* Rinnovata pagina Informazioni - Nuove stringhe per il menù
* Risolto bug funzione per visualizzare il peso degli allegati nella visualizzazione singola
= Versione 2.0 - 02.05.2013 =
* Possibilità di caricare file come allegati alla spesa
* Possibilità di visualizzazione singola per ogni spesa
* Breve introduzione alla tabella [front-end]
* Piccole ottimizzazioni css/php
* Integrazione PressTrend (I/O)
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