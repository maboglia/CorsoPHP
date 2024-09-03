Per eseguire una `UNION` di tabelle che seguono un pattern di nome simile, come le tabelle `azienda_202101`, `azienda_202102`, ecc., fino a `azienda_202312`, è possibile utilizzare un ciclo per generare dinamicamente la query SQL. Poiché SQL non supporta cicli direttamente, dovrai generare la query utilizzando uno script esterno, come PHP, Python, o un semplice editor di testo.

Ecco come puoi farlo con uno script PHP:

### Generazione della Query con PHP

```php
<?php
$queryParts = [];
for ($year = 2021; $year <= 2023; $year++) {
    for ($month = 1; $month <= 12; $month++) {
        $tableName = sprintf('azienda_%d%02d', $year, $month);
        $queryParts[] = "SELECT * FROM $tableName";
    }
}

$finalQuery = implode(" UNION ALL ", $queryParts);
echo $finalQuery;
?>
```

### Spiegazione dello Script PHP:

1. **Inizializzazione**:
   - Viene inizializzato un array `$queryParts` per contenere le singole query `SELECT`.

2. **Generazione dei Nomi delle Tabelle**:
   - Vengono utilizzati due cicli `for`: uno per gli anni (dal 2021 al 2023) e uno per i mesi (da 1 a 12).
   - La funzione `sprintf` viene utilizzata per generare il nome della tabella nel formato `azienda_YYYYMM`.

3. **Creazione delle Singole Query `SELECT`**:
   - Per ogni tabella, viene aggiunta una query `SELECT * FROM <nome_tabella>` all'array `$queryParts`.

4. **Composizione della Query Finale**:
   - La funzione `implode` viene utilizzata per unire tutte le query `SELECT` con `UNION ALL`.

5. **Output della Query**:
   - La query finale viene stampata.

### Output:

L'output di questo script sarà una query SQL che unisce tutte le tabelle dal 2021 al 2023:

```sql
SELECT * FROM azienda_202101 UNION ALL
SELECT * FROM azienda_202102 UNION ALL
SELECT * FROM azienda_202103 UNION ALL
...
SELECT * FROM azienda_202312
```

### Esecuzione della Query:

Puoi eseguire questa query direttamente nel tuo DBMS (MySQL, PostgreSQL, ecc.) utilizzando uno strumento di gestione del database come phpMyAdmin, MySQL Workbench, psql, o qualsiasi altro client SQL.

### Considerazioni Finali:

- **Performance**: L'uso di `UNION ALL` invece di `UNION` è consigliato se le tabelle non contengono record duplicati che necessitano di essere eliminati, poiché `UNION ALL` è generalmente più veloce.
- **Struttura delle Tabelle**: Assicurati che tutte le tabelle abbiano la stessa struttura (stessi nomi e tipi di colonne) per evitare errori di esecuzione.
- **Sicurezza**: Se stai generando questa query dinamicamente basandoti su input esterni, fai attenzione alle vulnerabilità di SQL injection.