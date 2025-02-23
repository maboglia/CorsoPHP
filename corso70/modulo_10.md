# **📌 MODULO 10 – PHP e Frameworks: Introduzione a Laravel**  
✅ **Obiettivo:** Apprendere le basi di Laravel, il framework PHP più popolare, per sviluppare applicazioni web moderne e scalabili.  
✅ **Durata:** ~10 ore  

---

## **🔷 BLOCCO 10.1 – Introduzione a Laravel**  
📌 **Obiettivi:** Capire cosa è Laravel e perché usarlo.  

### **📖 Teoria**  
✅ **Cos’è Laravel?**  
Laravel è un framework PHP open-source basato sul pattern MVC (Model-View-Controller) che semplifica lo sviluppo web grazie a una sintassi pulita e strumenti potenti.  

✅ **Perché usare Laravel?**  
- Routing semplice e veloce.  
- ORM Eloquent per interagire con il database in modo intuitivo.  
- Middleware per la gestione della sicurezza.  
- Sistema di migrazioni per versionare il database.  
- Blade, un motore di template potente.  

✅ **Installazione di Laravel (con Composer)**  
```sh
composer create-project laravel/laravel biblioteca
cd biblioteca
php artisan serve
```
Visita `http://127.0.0.1:8000` per vedere l’app in esecuzione.  

### **💡 Esercizio**  
1. Installa Laravel sul tuo computer e avvia il server locale.  

---

## **🔷 BLOCCO 10.2 – Struttura di un Progetto Laravel**  
📌 **Obiettivi:** Capire la struttura di Laravel.  

### **📖 Teoria**  
✅ **Principali cartelle di Laravel:**  
- `app/` → Contiene i modelli e la logica di business.  
- `routes/` → Definisce le rotte dell’applicazione.  
- `resources/views/` → Contiene i file Blade per l’interfaccia utente.  
- `database/migrations/` → Gestisce la struttura del database.  

✅ **Esempio di creazione di una rotta:**  
Modifica il file `routes/web.php`:  
```php
Route::get('/hello', function () {
    return "Ciao da Laravel!";
});
```
Visita `http://127.0.0.1:8000/hello` per vedere il risultato.  

### **💡 Esercizio**  
1. Crea una rotta personalizzata che restituisca un messaggio a scelta.  

---

## **🔷 BLOCCO 10.3 – Controllers e Routing**  
📌 **Obiettivi:** Creare controller per gestire la logica dell’app.  

### **📖 Teoria**  
✅ **Creare un controller con Artisan:**  
```sh
php artisan make:controller LibroController
```

✅ **Esempio di metodo nel controller:**  
```php
namespace App\Http\Controllers;
use Illuminate\Http\Request;

class LibroController extends Controller {
    public function index() {
        return "Elenco libri";
    }
}
```

✅ **Associare il controller a una rotta:**  
```php
Route::get('/libri', [LibroController::class, 'index']);
```

### **💡 Esercizio**  
1. Crea un controller `UtenteController` con un metodo `profilo()` che restituisce un messaggio di benvenuto.  

---

## **🔷 BLOCCO 10.4 – Database e ORM Eloquent**  
📌 **Obiettivi:** Creare e gestire database con Laravel.  

### **📖 Teoria**  
✅ **Configurare il database nel file `.env`**  
```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=biblioteca
DB_USERNAME=root
DB_PASSWORD=
```

✅ **Creare una migrazione per la tabella `libri`:**  
```sh
php artisan make:migration create_libri_table
```
Modifica il file generato in `database/migrations/`:  
```php
Schema::create('libri', function (Blueprint $table) {
    $table->id();
    $table->string('titolo');
    $table->string('autore');
    $table->year('anno_pubblicazione');
    $table->timestamps();
});
```
Esegui la migrazione:  
```sh
php artisan migrate
```

✅ **Creare il modello Eloquent per `Libro`:**  
```sh
php artisan make:model Libro
```
Modifica `app/Models/Libro.php`:  
```php
namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Libro extends Model {
    use HasFactory;
    protected $fillable = ['titolo', 'autore', 'anno_pubblicazione'];
}
```

### **💡 Esercizio**  
1. Crea un modello `Utente` e una tabella `utenti` con i campi `nome`, `email` e `password`.  

---

## **🔷 BLOCCO 10.5 – CRUD con Laravel (Create, Read, Update, Delete)**  
📌 **Obiettivi:** Creare un sistema per gestire libri con CRUD.  

### **📖 Teoria**  
✅ **Aggiungere un libro:**  
```php
Libro::create([
    'titolo' => 'Il Signore degli Anelli',
    'autore' => 'J.R.R. Tolkien',
    'anno_pubblicazione' => 1954
]);
```

✅ **Visualizzare tutti i libri:**  
```php
$libri = Libro::all();
foreach ($libri as $libro) {
    echo $libro->titolo;
}
```

✅ **Modificare un libro:**  
```php
$libro = Libro::find(1);
$libro->titolo = "Il Hobbit";
$libro->save();
```

✅ **Eliminare un libro:**  
```php
Libro::destroy(1);
```

### **💡 Esercizio**  
1. Crea un controller per gestire il CRUD degli utenti.  

---

## **🔷 BLOCCO 10.6 – Blade Templates e Layout**  
📌 **Obiettivi:** Creare interfacce utente dinamiche con Blade.  

### **📖 Teoria**  
✅ **Creare un layout principale:**  
`resources/views/layout.blade.php`  
```blade
<!DOCTYPE html>
<html>
<head>
    <title>@yield('title')</title>
</head>
<body>
    <header>
        <h1>Biblioteca Online</h1>
    </header>
    <main>
        @yield('content')
    </main>
</body>
</html>
```

✅ **Utilizzare il layout in una pagina:**  
`resources/views/home.blade.php`  
```blade
@extends('layout')

@section('title', 'Home')

@section('content')
    <p>Benvenuto nella Biblioteca Online!</p>
@endsection
```

✅ **Definire una rotta per mostrare la pagina:**  
```php
Route::get('/', function () {
    return view('home');
});
```

### **💡 Esercizio**  
1. Crea una pagina Blade `profilo.blade.php` con il layout principale.  

---

## **🔷 BLOCCO 10.7 – Autenticazione con Laravel Breeze**  
📌 **Obiettivi:** Implementare login e registrazione in Laravel.  

### **📖 Teoria**  
✅ **Installare Laravel Breeze:**  
```sh
composer require laravel/breeze --dev
php artisan breeze:install
npm install && npm run dev
php artisan migrate
```
✅ **Gestione autenticazione:**  
Ora è disponibile un sistema completo di login e registrazione in `http://127.0.0.1:8000/login`.  

### **💡 Esercizio**  
1. Personalizza il sistema di autenticazione con nuovi campi nel form di registrazione.  

---

## **🎯 RIEPILOGO E TEST PRATICO**  
📌 **Test finale:**  
1. **Obiettivo:** Creare una versione migliorata della **Biblioteca Online** con Laravel.  
   - Implementare il CRUD con Eloquent.  
   - Utilizzare Blade per i template.  
   - Aggiungere login e autenticazione.  

🚀 **Hai completato l'introduzione a Laravel! Sei pronto per il Modulo 11?** 😃