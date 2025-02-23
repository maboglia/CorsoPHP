# **📌 MODULO 11 – API REST con Laravel e Integrazione con Frontend**  
✅ **Obiettivo:** Creare API RESTful con Laravel per comunicare con applicazioni frontend (React, Vue, Angular) o mobile.  
✅ **Durata:** ~10 ore  

---

## **🔷 BLOCCO 11.1 – Introduzione alle API REST con Laravel**  
📌 **Obiettivi:** Comprendere il concetto di API REST e la sua implementazione in Laravel.  

### **📖 Teoria**  
✅ **Cos’è un’API REST?**  
Un’API REST permette a client (browser, mobile app) di comunicare con il server usando richieste HTTP.  

✅ **Principali metodi HTTP:**  
- `GET` → Recupera dati  
- `POST` → Crea un nuovo dato  
- `PUT/PATCH` → Aggiorna un dato  
- `DELETE` → Cancella un dato  

✅ **Configurare Laravel come API:**  
Aprire `config/cors.php` e abilitare CORS per permettere richieste da altri domini.  

```php
'paths' => ['api/*'],
'allowed_methods' => ['*'],
'allowed_origins' => ['*'],
'allowed_origins_patterns' => [],
'allowed_headers' => ['*'],
```

✅ **Creare un controller API con Artisan:**  
```sh
php artisan make:controller LibroController --api
```

### **💡 Esercizio**  
1. Configura Laravel come API-ready modificando le impostazioni CORS.  

---

## **🔷 BLOCCO 11.2 – Creazione di un'API per la Biblioteca**  
📌 **Obiettivi:** Creare un’API per gestire libri.  

### **📖 Teoria**  
✅ **Definire le rotte API in `routes/api.php`:**  
```php
use App\Http\Controllers\LibroController;

Route::get('/libri', [LibroController::class, 'index']); // Lista libri
Route::post('/libri', [LibroController::class, 'store']); // Aggiungi libro
Route::get('/libri/{id}', [LibroController::class, 'show']); // Dettaglio libro
Route::put('/libri/{id}', [LibroController::class, 'update']); // Modifica libro
Route::delete('/libri/{id}', [LibroController::class, 'destroy']); // Cancella libro
```

✅ **Implementare il controller API `LibroController.php`:**  
```php
namespace App\Http\Controllers;

use App\Models\Libro;
use Illuminate\Http\Request;

class LibroController extends Controller {
    public function index() {
        return response()->json(Libro::all());
    }

    public function store(Request $request) {
        $libro = Libro::create($request->all());
        return response()->json($libro, 201);
    }

    public function show($id) {
        return response()->json(Libro::findOrFail($id));
    }

    public function update(Request $request, $id) {
        $libro = Libro::findOrFail($id);
        $libro->update($request->all());
        return response()->json($libro);
    }

    public function destroy($id) {
        Libro::destroy($id);
        return response()->json(null, 204);
    }
}
```

### **💡 Esercizio**  
1. Crea un controller API per gli utenti (`UtenteController`) con CRUD.  

---

## **🔷 BLOCCO 11.3 – Middleware di Autenticazione API con Laravel Sanctum**  
📌 **Obiettivi:** Proteggere le API con autenticazione tramite token.  

### **📖 Teoria**  
✅ **Installare Laravel Sanctum:**  
```sh
composer require laravel/sanctum
php artisan vendor:publish --provider="Laravel\Sanctum\SanctumServiceProvider"
php artisan migrate
```

✅ **Configurare Sanctum in `app/Http/Kernel.php`:**  
```php
'api' => [
    \Laravel\Sanctum\Http\Middleware\EnsureFrontendRequestsAreStateful::class,
    'throttle:api',
    \Illuminate\Routing\Middleware\SubstituteBindings::class,
],
```

✅ **Abilitare il sistema di autenticazione API:**  
Nel modello `User.php` aggiungere:  
```php
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable {
    use HasApiTokens, Notifiable;
}
```

✅ **Creare le rotte per autenticazione API in `routes/api.php`:**  
```php
use App\Http\Controllers\AuthController;

Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

Route::middleware('auth:sanctum')->group(function () {
    Route::get('/utente', [AuthController::class, 'utente']);
    Route::post('/logout', [AuthController::class, 'logout']);
});
```

✅ **Implementare il controller `AuthController.php`:**  
```php
namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller {
    public function register(Request $request) {
        $request->validate([
            'name' => 'required|string',
            'email' => 'required|string|email|unique:users',
            'password' => 'required|string|min:6'
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ]);

        return response()->json(['token' => $user->createToken('API Token')->plainTextToken]);
    }

    public function login(Request $request) {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        $user = User::where('email', $request->email)->first();

        if (!$user || !Hash::check($request->password, $user->password)) {
            throw ValidationException::withMessages([
                'email' => ['Le credenziali non sono corrette.']
            ]);
        }

        return response()->json(['token' => $user->createToken('API Token')->plainTextToken]);
    }

    public function utente(Request $request) {
        return response()->json($request->user());
    }

    public function logout(Request $request) {
        $request->user()->tokens()->delete();
        return response()->json(['message' => 'Logout effettuato']);
    }
}
```

### **💡 Esercizio**  
1. Registra un nuovo utente tramite API e autenticalo con un token.  

---

## **🔷 BLOCCO 11.4 – Consumo dell’API con Postman e Frontend**  
📌 **Obiettivi:** Testare l’API e integrarla con un frontend.  

### **📖 Teoria**  
✅ **Testare l’API con Postman:**  
1. Invia una richiesta `POST /api/register` con JSON:  
   ```json
   {
       "name": "Mario Rossi",
       "email": "mario@rossi.com",
       "password": "password123"
   }
   ```
2. Copia il token ricevuto e usalo nel `Authorization: Bearer <token>` per accedere ai dati.  

✅ **Chiamare l’API con JavaScript (Fetch API):**  
```javascript
fetch('http://127.0.0.1:8000/api/libri', {
    headers: { 'Authorization': 'Bearer <token>' }
})
.then(response => response.json())
.then(data => console.log(data));
```

### **💡 Esercizio**  
1. Crea un’interfaccia web che mostri i libri recuperati dall’API.  

---

## **🎯 RIEPILOGO E TEST PRATICO**  
📌 **Test finale:**  
1. **Obiettivo:** Implementare un sistema completo di API REST per la Biblioteca Online.  
   - Creare API per gestire libri e utenti.  
   - Proteggere l’API con Laravel Sanctum.  
   - Testare le API con Postman.  
   - Consumare i dati con un’app frontend.  

🚀 **Hai completato lo sviluppo di un’API REST con Laravel! Pronto per il Modulo 12?** 😃