### I Model in Laravel: Interazione con il Database

I **model** in Laravel rappresentano l'elemento che gestisce i dati e l'interazione con il database, seguendo il pattern MVC (Model-View-Controller). In Laravel, i modelli sono direttamente legati all'ORM **Eloquent**, che permette una gestione semplificata delle operazioni CRUD (Create, Read, Update, Delete) sul database, senza dover scrivere query SQL manualmente.

---

### 1. **Creazione di un Model**

Per creare un model in Laravel, utilizzi **Artisan**, il comando CLI di Laravel. Un semplice model può essere creato con:

```bash
php artisan make:model Product
```

Questo comando genera un file nella directory `app/Models` chiamato `Product.php`.

#### Model con una Migration

Se vuoi creare un model e contemporaneamente generare una migration associata (una tabella nel database), puoi eseguire il seguente comando:

```bash
php artisan make:model Product --migration
```

Questo comando creerà sia il model che la migration. Le migration vengono utilizzate per definire la struttura delle tabelle nel database e possono essere eseguite con il comando:

```bash
php artisan migrate
```

---

### 2. **Struttura di un Model**

Un modello di base in Laravel è piuttosto semplice. Ecco come potrebbe apparire un model chiamato `Product`:

```php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    // Proprietà opzionale per specificare la tabella associata
    protected $table = 'products';

    // Proprietà opzionale per i campi mass-assignable
    protected $fillable = ['name', 'description', 'price'];
}
```

### 3. **Interagire con il Database**

Dopo aver creato il modello, puoi iniziare a eseguire operazioni sul database senza scrivere una singola query SQL. Eloquent si occupa di generare e gestire le query per te.

#### Inserimento di un record:

```php
$product = new Product;
$product->name = 'Laptop';
$product->description = 'Un laptop potente';
$product->price = 999.99;
$product->save();
```

#### Recupero di tutti i record:

```php
$products = Product::all();
```

#### Recupero di un singolo record per ID:

```php
$product = Product::find(1);
```

#### Aggiornamento di un record:

```php
$product = Product::find(1);
$product->price = 899.99;
$product->save();
```

#### Eliminazione di un record:

```php
$product = Product::find(1);
$product->delete();
```

---

### 4. **Mass Assignment**

In Laravel, per proteggere l'applicazione da attacchi di **mass assignment**, bisogna dichiarare quali campi del modello possono essere assegnati in modo massivo tramite il metodo `fillable`.

Esempio:

```php
protected $fillable = ['name', 'description', 'price'];
```

Con questa dichiarazione, puoi creare un nuovo record utilizzando l'array associativo:

```php
Product::create([
    'name' => 'Tablet',
    'description' => 'Un tablet leggero',
    'price' => 499.99
]);
```

Se provi a passare dati non inclusi nella proprietà `fillable`, Laravel li ignorerà automaticamente.

---

### 5. **Relationships nei Model**

Uno degli aspetti più potenti di Eloquent è la gestione delle **relazioni** tra le tabelle. Laravel semplifica la definizione di relazioni come uno-a-uno, uno-a-molti, molti-a-molti, e polimorfiche.

#### Relazione One-to-Many

Supponiamo che un utente (`User`) possa avere più post (`Post`). La relazione **one-to-many** viene definita così:

Nel modello `User`:

```php
public function posts()
{
    return $this->hasMany(Post::class);
}
```

Nel modello `Post`:

```php
public function user()
{
    return $this->belongsTo(User::class);
}
```

#### Relazione Many-to-Many

Supponiamo che un prodotto (`Product`) possa avere molte categorie (`Category`) e viceversa. Definiamo una relazione **many-to-many**.

Nel modello `Product`:

```php
public function categories()
{
    return $this->belongsToMany(Category::class);
}
```

Nel modello `Category`:

```php
public function products()
{
    return $this->belongsToMany(Product::class);
}
```

Per creare questa relazione, dovrai creare una tabella pivot (es. `category_product`) che conterrà i riferimenti alle chiavi esterne di entrambe le tabelle.

---

### 6. **Accessor e Mutator**

Gli **Accessor** ti permettono di formattare i dati prima che vengano restituiti dal database. I **Mutator** ti consentono di modificare i dati prima che vengano salvati nel database.

#### Accessor

Supponiamo che tu voglia restituire il nome del prodotto sempre in maiuscolo:

```php
public function getNameAttribute($value)
{
    return strtoupper($value);
}
```

#### Mutator

Se vuoi formattare un prezzo prima di salvarlo, ad esempio per convertire il formato decimale, puoi utilizzare un mutator:

```php
public function setPriceAttribute($value)
{
    $this->attributes['price'] = number_format($value, 2);
}
```

---

### 7. **Query Scope**

I **query scope** permettono di definire query riutilizzabili che puoi applicare ai tuoi model. Ad esempio, se vuoi recuperare solo i prodotti attivi, puoi definire uno **scope** nel tuo model `Product`:

```php
public function scopeActive($query)
{
    return $query->where('status', 'active');
}
```

E quindi utilizzarlo nelle tue query così:

```php
$activeProducts = Product::active()->get();
```

---

### 8. **Eventi del Model**

Laravel supporta diversi **eventi** sui model, come `creating`, `updating`, `deleting`, ecc. Questi eventi ti permettono di eseguire del codice in corrispondenza di azioni specifiche sui tuoi dati.

#### Esempio di evento `creating`:

Nel tuo model:

```php
protected static function booted()
{
    static::creating(function ($product) {
        // Codice da eseguire prima della creazione
        $product->slug = Str::slug($product->name);
    });
}
```

---

### 9. **Soft Deletes (Eliminazioni Logiche)**

Laravel supporta le **soft deletes**, che permettono di "eliminare" un record senza rimuoverlo effettivamente dal database. Il record viene contrassegnato come eliminato tramite un timestamp, ma rimane disponibile nel database.

Per abilitare le soft deletes, aggiungi il trait `SoftDeletes` nel tuo modello:

```php
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use SoftDeletes;
}
```

Dovrai anche aggiungere una colonna `deleted_at` nella tua tabella tramite una migration:

```php
$table->softDeletes();
```

Ora, quando elimini un record con `delete()`, Laravel non lo rimuoverà, ma imposterà un timestamp nel campo `deleted_at`.

Per recuperare i record "eliminati", puoi utilizzare il metodo `withTrashed()`:

```php
$allProducts = Product::withTrashed()->get();
```

---

### Conclusione

I modelli in Laravel, grazie a Eloquent, forniscono un modo molto semplice e potente per interagire con il database. La struttura e la flessibilità di Eloquent ti permettono di definire relazioni complesse, query riutilizzabili e persino di manipolare i dati con eventi e accessors/mutators. Con queste funzionalità, puoi costruire applicazioni robuste e scalabili mantenendo il codice pulito e leggibile.