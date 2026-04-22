# 🐘 Corso: Modern PHP 8.x - Zero to Hero

**Focus:** Architettura Clean Code, Performance e Sicurezza.

---

## Modulo 1: Le Basi Moderne (Sintassi e Fondamenta)

Non perdiamo tempo con le vecchie versioni. Partiamo subito dal cuore di PHP 8.

* **Installazione e Ambiente:** Setup con Docker (DDEV o Lando) – basta XAMPP!
* **Tipi di Dato Rigidi:** Dichiarazioni di tipo, Union Types e Mixed Types.
* **Operatori Moderni:** Nullsafe operator (`?->`), Match expression (addio `switch`).
* **Funzioni e Closure:** Arrow functions e Named arguments.

## Modulo 2: Programmazione Orientata agli Oggetti (OOP) Avanzata

Il PHP moderno è 100% OOP.

* **Classi e Interfacce:** Constructor Property Promotion (sintassi breve).
* **Readonly Properties & Classes:** Gestire l'immutabilità dei dati.
* **Ereditarietà e Tratti:** Quando usarli e perché preferire la composizione.
* **Dependency Injection:** Il segreto per scrivere codice testabile.

## Modulo 3: Gestione Dati e Database

Smettiamola di scrivere query SQL "nude" nelle stringhe.

* **PDO (PHP Data Objects):** Prepared statements e sicurezza contro SQL Injection.
* **Data Mapper vs Active Record:** Introduzione concettuale a Eloquent e Doctrine.
* **Migrations:** Gestire le versioni del database come se fosse codice.
* **Redis per il Caching:** Come velocizzare le applicazioni moderne.

## Modulo 4: L'Ecosistema e gli Standard

Saper scrivere PHP non basta; bisogna saper vivere nella comunità PHP.

* **Composer:** Gestione delle dipendenze e Autoloading (PSR-4).
* **Standard PSR:** Seguire le regole della PHP-FIG (PSR-1, PSR-12, PSR-7).
* **Middleware:** Come gestire il flusso Request-Response.

## Modulo 5: Sicurezza e Test

Un buon programmatore si riconosce da come protegge e testa il codice.

* **Sicurezza:** Hashing delle password (Argon2id), XSS prevention, CSRF.
* **Unit Testing con PHPUnit o Pest:** Scrivere test che abbiano senso.
* **Static Analysis:** Usare PHPStan o Psalm per trovare bug prima ancora di eseguire il codice.

## Modulo 6: Architettura Professionale (Verso i Framework)

Prepariamo il terreno per Laravel o Symfony.

* **Pattern MVC (Model-View-Controller):** Organizzare i file in modo logico.
* **API RESTful:** Costruire endpoint JSON moderni.
* **Autenticazione:** Sessioni vs JWT (JSON Web Tokens).

---

## 🛠 Progetto Finale: "The Micro-Service Lab"

Invece del solito blog, gli studenti costruiranno un **Sistema di Monitoraggio API**:

1. Un worker che controlla lo stato di vari siti web.
2. Un database che salva i tempi di risposta.
3. Una dashboard che mostra i grafici (usando un micro-framework come Slim o le basi di Laravel).

---

## Tabella di marcia settimanale (Esempio 12 Settimane)

| Settimana | Argomento                 | Obiettivo Pratico                                   |
| --------- | ------------------------- | --------------------------------------------------- |
| **1-2**   | Fondamenta & Sintassi 8.x | Script CLI per manipolazione dati                   |
| **3-4**   | OOP Deep Dive             | Creare una libreria di calcolo geometrico testabile |
| **5-6**   | Database & Composer       | Gestore di contatti con salvataggio su DB           |
| **7-8**   | Security & API            | Creare un sistema di Login sicuro                   |
| **9-10**  | Testing & Patterns        | Scrivere test automatici per il proprio codice      |
| **11-12** | Project Work              | Consegna del sistema di monitoraggio                |
