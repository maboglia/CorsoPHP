# PHPUnit: Testing in PHP

**PHPUnit** è uno degli strumenti più popolari per eseguire **test unitari** in PHP. È un framework che permette di testare singoli moduli del codice (funzioni o metodi) in isolamento, verificando che producano risultati attesi in vari scenari. PHPUnit consente di scrivere test automatici che rendono il codice più robusto, affidabile e facilmente mantenibile.

### **Cos'è un Test Unitario?**

Un **test unitario** è un test automatico che verifica il corretto funzionamento di una singola "unità" di codice (generalmente una funzione o un metodo). Ogni test si concentra su un piccolo pezzo di codice, isolato dagli altri, per garantire che questo funzioni come previsto.

#### **Vantaggi dell'uso di PHPUnit:**

- **Automazione dei test**: Facilita l'esecuzione automatica dei test dopo ogni modifica del codice.
- **Facile identificazione dei bug**: Ogni test è isolato, quindi è facile individuare l'esatta causa di un eventuale malfunzionamento.
- **Manutenzione semplificata**: I test fungono da documentazione vivente, spiegando il comportamento atteso del codice.
- **Sviluppo orientato al test**: Permette di adottare il metodo **TDD** (Test Driven Development), dove i test vengono scritti prima del codice.

---

### **Installazione di PHPUnit**

Prima di utilizzare PHPUnit, è necessario installarlo. Il metodo più comune è tramite **Composer**, un gestore di pacchetti PHP. Per installare PHPUnit in un progetto, esegui il seguente comando:

```bash
composer require --dev phpunit/phpunit
```

Questo comando installerà PHPUnit come dipendenza di sviluppo, rendendolo disponibile per eseguire test locali.

---

### **Struttura di base di un test con PHPUnit**

Un test in PHPUnit si basa su una **classe di test** che estende `TestCase`. Ogni metodo che rappresenta un test deve avere un nome che inizia con "test". PHPUnit fornisce vari metodi per fare asserzioni, che verificano se i risultati del codice testato corrispondono alle aspettative.

#### **Esempio di test unitario di base:**

```php
<?php
use PHPUnit\Framework\TestCase;

class CalcolatriceTest extends TestCase {
    
    // Test semplice della funzione somma
    public function testSomma() {
        $this->assertEquals(4, somma(2, 2));  // Verifica che somma(2, 2) restituisca 4
    }

    // Test di divisione che prevede un'eccezione per divisione per zero
    public function testDivisionePerZero() {
        $this->expectException(DivisionByZeroError::class);
        divisione(10, 0);  // Verifica che venga sollevata un'eccezione DivisionByZeroError
    }
}
```

#### **Spiegazione:**

- **`use PHPUnit\Framework\TestCase;`**: Importa la classe `TestCase`, che fornisce le funzionalità di PHPUnit.
- **`assertEquals()`**: Una delle asserzioni più comuni che confronta il valore atteso con il valore reale. Se i valori non corrispondono, il test fallisce.
- **`expectException()`**: Indica che ci si aspetta un'eccezione durante l'esecuzione del codice. In questo caso, si prevede che `divisione(10, 0)` generi un'eccezione di tipo `DivisionByZeroError`.

---

### **Esecuzione dei Test**

Per eseguire i test, dopo aver installato PHPUnit, basta eseguire il seguente comando nella directory principale del progetto:

```bash
vendor/bin/phpunit tests
```

Questo comando eseguirà tutti i test presenti nella cartella `tests`. È anche possibile eseguire singoli file di test o gruppi di test specifici.

---

### **Le Asserzioni di PHPUnit**

Le **asserzioni** sono il cuore di PHPUnit. Verificano che i valori reali prodotti dal codice corrispondano a quelli attesi. Alcune delle asserzioni più comuni sono:

1. **assertEquals($expected, $actual)**  
   Verifica che il valore reale sia uguale al valore atteso.

   ```php
   $this->assertEquals(10, somma(5, 5));
   ```

2. **assertTrue($condition)**  
   Verifica che una condizione sia vera.

   ```php
   $this->assertTrue($utente->isLogged());
   ```

3. **assertFalse($condition)**  
   Verifica che una condizione sia falsa.

   ```php
   $this->assertFalse($utente->isAdmin());
   ```

4. **assertNull($actual)**  
   Verifica che il valore sia `null`.

   ```php
   $this->assertNull($variabileNonDefinita);
   ```

5. **assertCount($count, $array)**  
   Verifica che l'array contenga esattamente un certo numero di elementi.

   ```php
   $this->assertCount(3, $arrayDiUtenti);
   ```

6. **assertInstanceOf($expected, $actual)**  
   Verifica che l'oggetto `$actual` sia un'istanza della classe `$expected`.

   ```php
   $this->assertInstanceOf(Automobile::class, $auto);
   ```

---

### **Test Driven Development (TDD) con PHPUnit**

Il **Test Driven Development (TDD)** è una metodologia di sviluppo in cui i test vengono scritti **prima** del codice che devono verificare. Si segue un ciclo di sviluppo a tre fasi:

1. **Scrivi un test che fallisce**: Crea un test che descrive il comportamento desiderato, ma che fallirà poiché il codice non è ancora implementato.

   ```php
   public function testSaluta() {
       $this->assertEquals("Ciao, Mario!", saluta("Mario"));
   }
   ```

2. **Scrivi il codice minimo per far passare il test**: Implementa la funzione `saluta` in modo che il test passi.

   ```php
   function saluta($nome) {
       return "Ciao, $nome!";
   }
   ```

3. **Refactoring**: Dopo che il test passa, migliora il codice (ad es. rendendolo più efficiente) senza rompere il test.

Il ciclo si ripete, consentendo di sviluppare il software in modo iterativo e sicuro, sapendo che ogni nuova funzione o modifica non rompe il codice esistente.

---

### **Mocking e Test di Dipendenze**

In molti casi, una singola unità di codice dipende da altre componenti, come un database o un servizio esterno. In questi casi, è utile utilizzare **mock** per simulare questi oggetti o servizi senza eseguire effettivamente operazioni esterne.

PHPUnit offre un sistema per creare **mock** e verificare il comportamento di codice dipendente da altre risorse.

#### **Esempio di Mocking:**

```php
<?php
use PHPUnit\Framework\TestCase;

class ServizioTest extends TestCase {
    
    public function testSalvaDati() {
        // Crea un mock dell'oggetto database
        $dbMock = $this->createMock(Database::class);
        
        // Definisci che il metodo "inserisci" deve essere chiamato una volta
        $dbMock->expects($this->once())
               ->method('inserisci')
               ->with($this->equalTo(['nome' => 'Mario']))
               ->willReturn(true);
        
        // Crea l'istanza del servizio con il mock del database
        $servizio = new Servizio($dbMock);
        
        // Verifica che il metodo salvaDati usi correttamente il mock
        $this->assertTrue($servizio->salvaDati(['nome' => 'Mario']));
    }
}
?>
```

In questo esempio, simuliamo un database con un mock e testiamo il comportamento di un metodo `salvaDati` che dovrebbe interagire con il database. PHPUnit verifica che il metodo `inserisci` del mock venga chiamato con i parametri corretti.

---

### **Conclusione**

PHPUnit è uno strumento potente e flessibile per garantire che il codice PHP funzioni correttamente, anche quando il progetto diventa complesso. Sia che tu stia lavorando su un piccolo progetto o su un'applicazione di grandi dimensioni, scrivere test unitari con PHPUnit ti aiuterà a migliorare la qualità e la manutenibilità del tuo codice, riducendo il rischio di bug e regressioni.
