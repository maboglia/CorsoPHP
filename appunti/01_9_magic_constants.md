# Costanti magiche

Ci sono nove costanti magiche che cambiano valore a seconda di dove vengono utilizzate. Ad esempio, il valore di __LINE__ dipende dalla riga su cui viene utilizzato nello script. Tutte queste costanti "magiche" vengono risolte in fase di compilazione, a differenza delle costanti regolari, che vengono risolte in fase di esecuzione. Queste costanti speciali non fanno distinzione tra maiuscole e minuscole e sono le seguenti:

---

## Costanti magiche di PHP Nome Descrizione

costante|descrizione
---|---
`__LINE__`|Il numero di riga corrente del file.
`__FILE__`|Il percorso completo e il nome file del file con collegamenti simbolici risolti. Se utilizzato all'interno di un include, viene restituito il nome del file incluso.
`__DIR__`|La directory del file. Se utilizzato all'interno di un include, viene restituita la directory del file incluso. Questo equivale a dirname(__FILE__). Questo nome di directory non ha una barra finale a meno che non sia la directory principale.
`__FUNCTION__`|Il nome della funzione, o {closure} per le funzioni anonime.
`__CLASS__`|Il nome della classe. Il nome della classe include lo spazio dei nomi in cui è stato dichiarato (ad es. Foo\Bar). Quando viene utilizzato in un metodo `trait`, __CLASS__ è il nome della classe in cui viene utilizzato il `trait`.
`__TRAIT__`|Il nome del `trait`. Il nome del `trait` include lo spazio dei nomi in cui è stato dichiarato (ad es. Foo\Bar).
`__METHOD__`|Il nome del metodo della classe.
`__NAMESPACE__`|Il nome dello spazio dei nomi corrente.
ClassName::class Il nome completo della classe.