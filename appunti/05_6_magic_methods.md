# metodi magici

I **metodi magici** sono metodi speciali che sovrascrivono l'azione predefinita di PHP quando determinate azioni vengono eseguite su un oggetto.
Attenzione

Tutti i nomi dei metodi che iniziano con `__` sono riservati da PHP. Pertanto, **non è consigliabile utilizzare tali nomi di metodi** a meno che non si sovrascriva il comportamento di PHP.

I seguenti nomi di metodi sono considerati **magici**: 
* `__construct()`, 
* `__destruct()`, 
* `__call()`, 
* `__callStatic()`, 
* `__get()`, 
* `__set()`, 
* `__isset()`, 
* `__unset()`, 
* `__sleep()`, 
* `__wakeup()`, 
* `__serialize`( ), 
* `__unserialize()`, 
* `__toString()`, 
* `__invoke()`, 
* `__set_state()`, 
* `__clone(`) e 
* `__debugInfo()`.

---

## Metodi `public`

Tutti i **metodi magici**, ad eccezione di `__construct()`, `__destruct()` e `__clone()`, devono essere dichiarati come pubblici, altrimenti viene emesso un E_WARNING. Prima di PHP 8.0.0, non veniva emessa alcuna diagnostica per i **metodi magici** `__sleep()`, `__wakeup()`, `__serialize()`, `__unserialize()` e `__set_state()`.


Se le dichiarazioni di tipo sono utilizzate nella definizione di un metodo magico, devono essere identiche alla firma descritta in questo documento. In caso contrario, viene emesso un errore irreversibile. Prima di PHP 8.0.0, non veniva emessa alcuna diagnostica. Tuttavia, `__construct()` e `__destruct()` non devono dichiarare un tipo restituito; in caso contrario viene emesso un errore fatale.
