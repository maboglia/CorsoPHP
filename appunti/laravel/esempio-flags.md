
# Flags

### 1. Creazione del Progetto Laravel

Inizia creando un nuovo progetto Laravel:

```bash
composer create-project --prefer-dist laravel/laravel bandiere
cd bandiere
```

### 2. Avvia il Server

Esegui il server locale:

```bash
php artisan serve
```

Visita `http://127.0.0.1:8000` nel tuo browser.

### 3. Visualizza i Comandi Artisan

Puoi visualizzare tutti i comandi disponibili in Laravel con:

```bash
php artisan list
```

### 4. Creazione del Modello Flag

Crea il modello `Flag`:

```bash
php artisan make:model Flag
```

Questo comando crea un modello nella directory `app/Models`.

### 5. Creazione della Migrazione

Genera una migrazione per la tabella `flags`:

```bash
php artisan make:migration create_flags_table
```

### 6. Modifica la Migrazione

Apri il file di migrazione in `database/migrations` e definisci la struttura della tabella:

```php
public function up()
{
    Schema::create('flags', function (Blueprint $table) {
        $table->id();
        $table->string('name'); // Nome del paese
        $table->string('image'); // URL dell'immagine della bandiera
        $table->timestamps();
    });
}
```

### 7. Esegui la Migrazione

Esegui la migrazione per creare la tabella nel database:

```bash
php artisan migrate
```

Se vuoi ricominciare da capo (cancellando tutte le tabelle e ricreandole), usa:

```bash
php artisan migrate:fresh
```

### 8. Creazione del Seeder

Genera un seeder per popolare la tabella `flags`:

```bash
php artisan make:seeder FlagsTableSeeder
```

### 9. Popola il Seeder

Apri il file `FlagsTableSeeder` in `database/seeders` e aggiungi dei dati di esempio:

```php
public function run()
{
    DB::table('flags')->insert([
        ['name' => 'Italia', 'image' => 'url_della_bandiera_italiana.png'],
        ['name' => 'Francia', 'image' => 'url_della_bandiera_francese.png'],
        // Aggiungi altre bandiere qui
    ]);
}
```

### 10. Esegui il Seeder

Esegui il seeder per popolare il database:

```bash
php artisan db:seed --class=FlagsTableSeeder
```

### 11. Creazione del Controller

Crea un controller per gestire le operazioni CRUD:

```bash
php artisan make:controller FlagsController --resource
```

### 12. Aggiungi la Logica nel Controller

Apri il controller `FlagsController` in `app/Http/Controllers` e implementa i metodi necessari:

```php
use App\Models\Flag;

public function index()
{
    $flags = Flag::all();
    return view('flags.index', compact('flags'));
}
```

### 13. Definisci le Route

Apri il file `routes/web.php` e definisci le route per il tuo controller:

```php
use App\Http\Controllers\FlagsController;

Route::resource('flags', FlagsController::class);
```

### 14. Creazione della Vista Blade

Crea una vista per mostrare le bandiere. Crea un file in `resources/views/flags/index.blade.php`:

```blade
<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bandiere degli Stati</title>
</head>
<body>
    <h1>Bandiere degli Stati</h1>
    <ul>
        @foreach($flags as $flag)
            <li>
                <img src="{{ $flag->image }}" alt="{{ $flag->name }}" style="width:100px;height:auto;">
                {{ $flag->name }}
            </li>
        @endforeach
    </ul>
</body>
</html>
```

### 15. Testa l’Applicazione

Visita `http://127.0.0.1:8000/flags` nel tuo browser. Dovresti vedere l’elenco delle bandiere che hai inserito nel seeder.


## Controller

```php
<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Flag;
use Illuminate\Http\Request;

class FlagController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Flags = Flag::all();
        
        $data = [
            "Flags" => $Flags
        ];
        
        return view('flags.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('flags.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|max:100',
            'url' => 'required|max:100'
        ]);

        $Flag = new Flag();

        $Flag->title = $request->input('title');
        $Flag->url = $request->input('url');

        $Flag->save();

        return redirect()->route('flags.index')->with('success', 'Flag added successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Flag  $Flag
     * @return \Illuminate\Http\Response
     */
    public function show(Flag $Flag)
    {
        $data = [
            "Flag" => $Flag
        ];

        return view('flags.show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Flag  $Flag
     * @return \Illuminate\Http\Response
     */
    public function edit(Flag $Flag)
    {
        $data = [
            "Flag" => $Flag
        ];
  
        return view('flags.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Flag  $Flag
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Flag $Flag)
    {
        $request->validate([
            'title' => 'required|max:100',
            'url' => 'required|max:100'
        ]);
                
        $Flag->title = $request->input('title');
        $Flag->url = $request->input('url');

        $Flag->save();

        return redirect()->route('flags.index')->with('success', 'Flag saved successfully'); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Flag  $Flag
     * @return \Illuminate\Http\Response
     */
    public function destroy(Flag $Flag)
    {
        $Flag->delete();

        return redirect()->route('flags.index')->with('success', 'Flag removed successfully'); 
    }
}

```