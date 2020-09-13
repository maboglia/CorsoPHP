# heredoc

## Sintassi heredoc

La sintassi heredoc internamente funziona nello stesso modo delle virgolette, ma è adatta per la creazione di stringhe multi-linea senza la necessità di concatenamento.

    <?php
    $a = 'variabili';
    
    $str = <<<EOD               // inizializzata da <<<
    Esempio di stringa
    che occupa più linee
    utilizzando la sintassi heredoc.
    Le $a sono interpretate.
    EOD;                        // la chiusura di 'EOD' dev'essere su una linea a parte, e senza indentazione
    
    /**
     * Output:
     *
     * Esempio di stringa
     * che occupa più linee
     * utilizzando la sintassi heredoc.
     * Le variabili sono interpretate.
     */

*   [Sintassi heredoc](http://php.net/language.types.string#language.types.string.syntax.heredoc)

---

## Sintassi nowdoc

La sintassi nowdoc è stata introdotta in PHP 5.3 e internamente funziona nello stesso modo degli apici singoli, ma è adatta per creare stringhe multi-linea senza dover usare il concatenamento.

    <?php
    $str = <<<'EOD'             // inizializzata da <<<
    Esempio di stringa
    che occupa più linee
    utilizzando la sintassi nowdoc.
    $a non viene interpretato.
    EOD;                        // la chiusura di 'EOD' dev'essere su una linea a parte, e senza indentazione
    
    /**
     * Output:
     *
     * Esempio di stringa
     * che occupa più linee
     * utilizzando la sintassi Nowdoc.
     * $a non viene interpretato.
     */

*   [Sintassi nowdoc](http://php.net/language.types.string#language.types.string.syntax.nowdoc)
