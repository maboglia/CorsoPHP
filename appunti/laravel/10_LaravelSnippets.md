## 🔧 Configurazione iniziale

```bash
composer create-project laravel/laravel nome-progetto
```

> Crea un nuovo progetto Laravel.

```bash
php artisan serve
```

> Avvia il server locale di sviluppo (default: [http://localhost:8000](http://localhost:8000)).

---

## 📁 Struttura dei file principali

| Cartella/file          | Descrizione                                                |
| ---------------------- | ---------------------------------------------------------- |
| `routes/web.php`       | Definisce le rotte web (visibili da browser, con sessioni) |
| `routes/api.php`       | Definisce le rotte per API (stateless, senza sessioni)     |
| `app/Http/Controllers` | Contiene i controller (logica per le rotte)                |
| `app/Models`           | Contiene i modelli Eloquent (rappresentano le tabelle DB)  |
| `resources/views`      | File Blade (template HTML)                                 |
| `.env`                 | Variabili di ambiente (configurazioni, es. DB, mail)       |
| `config/`              | Configurazioni dell'app (cache, mail, database, ecc.)      |

---

## 🧭 Routing

```php
Route::get('/home', [HomeController::class, 'index']);
```

> Rotta GET verso `/home`, gestita dal metodo `index()` di `HomeController`.

```php
Route::post('/user', [UserController::class, 'store']);
```

> Rotta POST per creare dati.

```php
Route::put('/user/{id}', [UserController::class, 'update']);
```

> Rotta PUT per aggiornare dati esistenti.

```php
Route::delete('/user/{id}', [UserController::class, 'destroy']);
```

> Rotta DELETE per eliminare dati.

```php
Route::resource('users', UserController::class);
```

> Crea automaticamente tutte le rotte CRUD (index, create, store, show, edit, update, destroy).

---

## 🧩 Middleware

```php
Route::middleware('auth')->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    });
});
```

> Gruppo di rotte protette dal middleware `auth`.

---

## ✉️ Controller

```bash
php artisan make:controller NomeController
```

> Crea un nuovo controller.

```php
return view('nomeview', ['dati' => $valore]);
```

> Ritorna una view con variabili passate.

---

## 📄 View (Blade)

```blade
{{-- Commento Blade --}}
<h1>{{ $titolo }}</h1>
```

> Sintassi Blade per mostrare variabili.

```blade
@if ($condizione)
    <p>Condizione vera</p>
@else
    <p>Condizione falsa</p>
@endif
```

> Strutture di controllo Blade.

```blade
@foreach ($lista as $elemento)
    <li>{{ $elemento }}</li>
@endforeach
```

> Ciclo foreach in Blade.

```blade
@include('partials.header')
```

> Include una view parziale.

```blade
@extends('layouts.app')
@section('content')
  <p>Contenuto</p>
@endsection
```

> Estende un layout e definisce una sezione.

---

## 🧬 Model & Eloquent ORM

```bash
php artisan make:model NomeModello
```

> Crea un nuovo modello Eloquent.

```bash
php artisan make:model Post -m
```

> Crea anche la **migration** (file per creare la tabella).

```php
Post::all();          // tutti i post
Post::find($id);      // trova per ID
Post::where('campo', 'valore')->get(); // filtra
Post::create([...]);  // crea un nuovo record
$post->update([...]); // aggiorna
$post->delete();      // elimina
```

```php
// Relazioni
public function posts() {
    return $this->hasMany(Post::class);
}
```

> Relazione "utente ha molti post".

```php
public function user() {
    return $this->belongsTo(User::class);
}
```

> Relazione "post appartiene a un utente".

---

## 🛠️ Migration

```bash
php artisan make:migration create_posts_table
```

> Crea un file di migrazione.

```php
Schema::create('posts', function (Blueprint $table) {
    $table->id();
    $table->string('titolo');
    $table->text('contenuto');
    $table->timestamps();
});
```

> Esempio di schema di tabella.

```bash
php artisan migrate
```

> Applica tutte le migrazioni.

```bash
php artisan migrate:rollback
```

> Annulla l'ultima migrazione.

---

## 🧪 Validazione

```php
$request->validate([
    'nome' => 'required|string|max:255',
    'email' => 'required|email|unique:users',
]);
```

> Validazione dei dati in un controller.

---

## 🔐 Autenticazione

```bash
composer require laravel/breeze --dev
php artisan breeze:install
npm install && npm run dev
php artisan migrate
```

> Installa Breeze (autenticazione semplice) con scaffolding.

---

## 🧾 Seeder & Faker

```bash
php artisan make:seeder UserSeeder
```

> Crea un seeder per generare dati fake.

```php
use Faker\Factory as Faker;

DB::table('users')->insert([
    'name' => $faker->name,
    'email' => $faker->email,
    ...
]);
```

```bash
php artisan db:seed
```

> Esegue i seeder.

---

## 🐞 Debug e utilità

```bash
php artisan route:list
```

> Elenca tutte le rotte registrate.

```bash
php artisan tinker
```

> Shell interattiva per testare codice Laravel.

---

## 📦 Altri comandi Artisan utili

```bash
php artisan make:model Nome -mcr
```

> Crea **Model + Migration + Controller + Resource** insieme.

```bash
php artisan migrate:fresh --seed
```

> Rimuove tutte le tabelle, ricrea e lancia i seeder.

---

## 💡 Suggerimento per struttura CRUD

```
Model ➜ Controller ➜ View
          ▲
      Request + Validazione
```

---

## 📤 Upload di File

```html
<form action="/upload" method="POST" enctype="multipart/form-data">
    @csrf
    <input type="file" name="documento">
    <button type="submit">Carica</button>
</form>
```

```php
public function upload(Request $request) {
    $request->validate([
        'documento' => 'required|file|mimes:pdf,doc,docx|max:2048'
    ]);

    $path = $request->file('documento')->store('documenti');
    return back()->with('success', 'File caricato: ' . $path);
}
```

> Upload semplice in `storage/app/documenti`.

---

## 🔁 Eloquent Avanzato

### 🔎 Scope

```php
// Model: Post.php
public function scopePubblicati($query) {
    return $query->where('published', true);
}

// Uso:
Post::pubblicati()->get();
```

> Scope personalizzati riutilizzabili.

### 🧮 Accessor e Mutator

```php
// Accessor: aggiunge maiuscola al titolo
public function getTitoloAttribute($value) {
    return ucfirst($value);
}

// Mutator: salva lowercase
public function setTitoloAttribute($value) {
    $this->attributes['titolo'] = strtolower($value);
}
```

---

## 🌐 RESTful API con Laravel

```bash
php artisan make:controller API/PostController --api
```

### API Route

```php
// routes/api.php
Route::apiResource('posts', App\Http\Controllers\API\PostController::class);
```

### Controller RESTful

```php
public function index() {
    return Post::all();
}

public function store(Request $request) {
    $request->validate(['titolo' => 'required']);
    return Post::create($request->all());
}
```

---

## 📦 API Resource (trasformazione JSON pulita)

```bash
php artisan make:resource PostResource
```

```php
// PostResource.php
public function toArray($request) {
    return [
        'id' => $this->id,
        'titolo' => strtoupper($this->titolo),
        'autore' => new UserResource($this->user),
    ];
}
```

```php
return new PostResource($post);           // singolo
return PostResource::collection($posts);  // lista
```

---

## 💡 Custom Request per validazione

```bash
php artisan make:request StorePostRequest
```

```php
// StorePostRequest.php
public function rules() {
    return [
        'titolo' => 'required|max:255',
        'testo' => 'required',
    ];
}
```

Nel controller:

```php
public function store(StorePostRequest $request) {
    return Post::create($request->validated());
}
```

---

## 🧠 Cache

```php
Cache::put('chiave', 'valore', 60); // 60 minuti
Cache::get('chiave');               // restituisce 'valore'
Cache::forget('chiave');           // elimina cache
```

Con file `.env`:

```
CACHE_DRIVER=file
```

---

## 📬 Invio Mail

```bash
php artisan make:mail BenvenutoUtente
```

```php
// BenvenutoUtente.php
public function build() {
    return $this->view('emails.benvenuto')
                ->with(['nome' => $this->nome]);
}
```

```php
// Controller
Mail::to('utente@example.com')->send(new BenvenutoUtente($nome));
```

---

## 🧹 Soft Delete

```bash
php artisan make:model Post -m
```

Nel modello:

```php
use Illuminate\Database\Eloquent\SoftDeletes;
class Post extends Model {
    use SoftDeletes;
}
```

Nella migration:

```php
$table->softDeletes();
```

Uso:

```php
Post::find($id)->delete();    // soft delete
Post::withTrashed()->get();   // include eliminati
Post::onlyTrashed()->get();   // solo eliminati
Post::find($id)->restore();   // ripristina
```

---

## 🔥 Esecuzione Raw SQL

```php
DB::select('SELECT * FROM users WHERE id = ?', [$id]);
DB::insert('INSERT INTO ...');
DB::update('UPDATE ...');
DB::delete('DELETE FROM ...');
```

Oppure:

```php
User::whereRaw('YEAR(created_at) = 2025')->get();
```

---

## 🔗 Join in Eloquent

```php
$posts = DB::table('posts')
    ->join('users', 'posts.user_id', '=', 'users.id')
    ->select('posts.*', 'users.name')
    ->get();
```

Con Eloquent:

```php
Post::with('user')->get();
```

