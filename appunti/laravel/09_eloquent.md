# **Eloquent ORM e Relazioni in Laravel**

**Eloquent ORM** (Object-Relational Mapping) è una delle funzionalità più potenti di Laravel. Consente agli sviluppatori di interagire con il database attraverso una sintassi fluente e intuitiva.

Uno dei punti di forza principali di Eloquent è la **gestione delle relazioni** tra tabelle, che rende semplice modellare anche associazioni complesse tra dati.

---

### **Indice dei contenuti**

1. Introduzione alle relazioni Eloquent
2. Tipi di relazioni:

   * One-to-One (Uno a Uno)
   * One-to-Many (Uno a Molti)
   * Many-to-Many (Molti a Molti)
   * Has-One-Through (Uno a Uno indiretto)
   * Has-Many-Through (Uno a Molti indiretto)
   * Relazioni polimorfiche
   * Relazioni polimorfiche molti-a-molti
3. Definizione delle relazioni
4. Query sulle relazioni
5. Eager Loading
6. Inserimento di modelli correlati
7. Conclusioni

---

## **1. Introduzione**

Le **relazioni nel database** definiscono come le tabelle sono collegate tra loro. In Laravel, Eloquent semplifica la definizione di queste relazioni nei **model**.

Le relazioni servono a:

* Recuperare dati correlati in modo efficiente.
* Mantenere l’integrità dei dati.
* Semplificare le query complesse.

---

## **2. Tipi di relazioni**

### 🔹 **One-to-One (Uno a Uno)**

Un record è collegato **a uno e un solo** record in un'altra tabella.
**Esempio:** un utente ha un solo profilo.

```php
// Migrazione
Schema::create('profiles', function (Blueprint $table) {
    $table->id();
    $table->foreignId('user_id')->constrained();
    $table->string('bio');
    $table->timestamps();
});
```

```php
// Model User
public function profile() {
    return $this->hasOne(Profile::class);
}

// Model Profile
public function user() {
    return $this->belongsTo(User::class);
}

// Uso
$profile = User::find(1)->profile;
```

---

### 🔹 **One-to-Many (Uno a Molti)**

Un record è collegato a **più** record in un'altra tabella.
**Esempio:** un post ha molti commenti.

```php
// Model Post
public function comments() {
    return $this->hasMany(Comment::class);
}

// Model Comment
public function post() {
    return $this->belongsTo(Post::class);
}

// Uso
$comments = Post::find(1)->comments;
```

---

### 🔹 **Many-to-Many (Molti a Molti)**

Entrambe le entità possono avere molte relazioni tra loro. Serve una **tabella pivot**.

**Esempio:** un utente può avere molti ruoli, e un ruolo può appartenere a più utenti.

```php
// Migrazione tabella pivot
Schema::create('role_user', function (Blueprint $table) {
    $table->foreignId('user_id')->constrained();
    $table->foreignId('role_id')->constrained();
    $table->primary(['user_id', 'role_id']);
});
```

```php
// User
public function roles() {
    return $this->belongsToMany(Role::class);
}

// Role
public function users() {
    return $this->belongsToMany(User::class);
}

// Uso
$roles = User::find(1)->roles;
```

---

### 🔹 **Has-One-Through (Uno a Uno attraverso)**

Accesso a una relazione distante **via modello intermedio**.
**Esempio:** un fornitore ha una cronologia tramite l’utente.

```php
// Supplier
public function history() {
    return $this->hasOneThrough(History::class, User::class);
}

// Uso
$history = Supplier::find(1)->history;
```

---

### 🔹 **Has-Many-Through (Uno a Molti attraverso)**

Come sopra, ma restituisce **più risultati**.
**Esempio:** un paese ha molti post tramite gli utenti.

```php
// Country
public function posts() {
    return $this->hasManyThrough(Post::class, User::class);
}

// Uso
$posts = Country::find(1)->posts;
```

---

### 🔹 **Relazioni Polimorfiche**

Un modello può appartenere a più **altri modelli di tipo diverso**.

**Esempio:** un commento può appartenere a un post *o* a un video.

```php
// Comment
public function commentable() {
    return $this->morphTo();
}

// Post e Video
public function comments() {
    return $this->morphMany(Comment::class, 'commentable');
}

// Uso
$comments = Post::find(1)->comments;
```

---

### 🔹 **Relazioni Polimorfiche Molti-a-Molti**

Modelli diversi possono avere molte relazioni con un altro modello (es. Tag).

**Esempio:** post e video possono avere molti tag.

```php
// Tag
public function posts() {
    return $this->morphedByMany(Post::class, 'taggable');
}
public function videos() {
    return $this->morphedByMany(Video::class, 'taggable');
}

// Post e Video
public function tags() {
    return $this->morphToMany(Tag::class, 'taggable');
}

// Uso
$tags = Post::find(1)->tags;
```

---

## **3. Definire le relazioni**

Si definiscono come **metodi nei model**, con nomi descrittivi: `posts()`, `comments()`, `roles()`.

---

## **4. Query sulle relazioni**

Eloquent permette di **filtrare e cercare** relazioni:

```php
// Post con almeno un commento
$posts = Post::has('comments')->get();

// Post con più di 5 commenti
$posts = Post::has('comments', '>', 5)->get();

// Commenti che contengono "awesome"
$posts = Post::whereHas('comments', function ($q) {
    $q->where('content', 'like', '%awesome%');
})->get();
```

---

## **5. Eager Loading**

Per evitare il **problema N+1** (troppe query), si può caricare le relazioni in anticipo.

```php
// Senza Eager Loading
$posts = Post::all();
foreach ($posts as $post) {
    echo $post->comments->count(); // Query per ogni post
}

// Con Eager Loading
$posts = Post::with('comments')->get();
foreach ($posts as $post) {
    echo $post->comments->count(); // Solo 2 query
}
```

---

## **6. Inserire modelli correlati**

È possibile creare o associare dati correlati:

```php
// One-to-Many
$comment = Post::find(1)->comments()->create(['content' => 'Ottimo post!']);

// Many-to-Many
$user = User::find(1);
$user->roles()->attach([1, 2]); // Assegna i ruoli con ID 1 e 2
```

---

## **7. Conclusioni**

Le relazioni Eloquent di Laravel forniscono un modo **pulito, leggibile ed efficiente** per gestire associazioni tra tabelle.

Con una comprensione solida di queste relazioni, si possono **costruire interazioni complesse** nei database, mantenendo il codice semplice e manutenibile.

