### Esercizio: Implementare un Carrello della Spesa con le Sessioni in PHP

In questo esempio, creeremo un semplice carrello della spesa utilizzando le sessioni in PHP. L'utente potrà aggiungere, visualizzare e rimuovere prodotti dal carrello.

### Struttura dei File

Avremo tre file principali:

1. `index.php` – La pagina principale dove visualizzare e aggiungere i prodotti al carrello.
2. `cart.php` – La pagina per visualizzare e gestire il contenuto del carrello.
3. `remove.php` – Un file per rimuovere un prodotto dal carrello.

### 1. `index.php`

Questo file mostrerà una lista di prodotti e permetterà all'utente di aggiungerli al carrello.

```php
<?php
session_start();

// Prodotti disponibili (in un'applicazione reale, questi verrebbero estratti da un database)
$products = [
    1 => ['name' => 'Apple', 'price' => 0.99],
    2 => ['name' => 'Banana', 'price' => 0.69],
    3 => ['name' => 'Orange', 'price' => 1.29],
];

// Aggiungi prodotto al carrello
if (isset($_POST['product_id'])) {
    $product_id = $_POST['product_id'];

    // Verifica se il prodotto esiste
    if (isset($products[$product_id])) {
        if (!isset($_SESSION['cart'])) {
            $_SESSION['cart'] = [];
        }

        // Aggiungi il prodotto al carrello (o incrementa la quantità)
        if (isset($_SESSION['cart'][$product_id])) {
            $_SESSION['cart'][$product_id]['quantity']++;
        } else {
            $_SESSION['cart'][$product_id] = [
                'name' => $products[$product_id]['name'],
                'price' => $products[$product_id]['price'],
                'quantity' => 1,
            ];
        }
    }
}
?>

<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <title>Carrello della Spesa</title>
</head>
<body>
    <h1>Prodotti Disponibili</h1>
    <ul>
        <?php foreach ($products as $id => $product): ?>
            <li>
                <?php echo $product['name']; ?> - €<?php echo number_format($product['price'], 2); ?>
                <form method="POST" action="">
                    <input type="hidden" name="product_id" value="<?php echo $id; ?>">
                    <button type="submit">Aggiungi al Carrello</button>
                </form>
            </li>
        <?php endforeach; ?>
    </ul>
    <br>
    <a href="cart.php">Vai al Carrello</a>
</body>
</html>
```

### 2. `cart.php`

Questo file mostrerà il contenuto del carrello e permetterà di rimuovere i prodotti.

```php
<?php
session_start();

// Verifica se il carrello esiste e non è vuoto
$cart = isset($_SESSION['cart']) ? $_SESSION['cart'] : [];
?>

<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <title>Il Mio Carrello</title>
</head>
<body>
    <h1>Il Mio Carrello</h1>

    <?php if (!empty($cart)): ?>
        <table border="1" cellpadding="10">
            <tr>
                <th>Prodotto</th>
                <th>Prezzo</th>
                <th>Quantità</th>
                <th>Totale</th>
                <th>Azioni</th>
            </tr>
            <?php
            $total = 0;
            foreach ($cart as $id => $item): 
                $item_total = $item['price'] * $item['quantity'];
                $total += $item_total;
            ?>
                <tr>
                    <td><?php echo $item['name']; ?></td>
                    <td>€<?php echo number_format($item['price'], 2); ?></td>
                    <td><?php echo $item['quantity']; ?></td>
                    <td>€<?php echo number_format($item_total, 2); ?></td>
                    <td>
                        <form method="POST" action="remove.php">
                            <input type="hidden" name="product_id" value="<?php echo $id; ?>">
                            <button type="submit">Rimuovi</button>
                        </form>
                    </td>
                </tr>
            <?php endforeach; ?>
            <tr>
                <td colspan="3">Totale</td>
                <td colspan="2">€<?php echo number_format($total, 2); ?></td>
            </tr>
        </table>
    <?php else: ?>
        <p>Il carrello è vuoto.</p>
    <?php endif; ?>

    <br>
    <a href="index.php">Torna ai Prodotti</a>
</body>
</html>
```

### 3. `remove.php`

Questo file gestirà la rimozione di un prodotto dal carrello.

```php
<?php
session_start();

if (isset($_POST['product_id'])) {
    $product_id = $_POST['product_id'];

    // Verifica se il prodotto esiste nel carrello
    if (isset($_SESSION['cart'][$product_id])) {
        // Rimuovi il prodotto dal carrello
        unset($_SESSION['cart'][$product_id]);
    }
}

header('Location: cart.php');
exit();
```

### Spiegazione dell'Implementazione

1. **Aggiungere Prodotti al Carrello (`index.php`)**:
    - L'utente può vedere una lista di prodotti disponibili.
    - Quando clicca su "Aggiungi al Carrello", il prodotto viene aggiunto alla sessione `$_SESSION['cart']` con il relativo ID, nome, prezzo e quantità.

2. **Visualizzare il Carrello (`cart.php`)**:
    - Il carrello mostra tutti i prodotti aggiunti dall'utente con la quantità e il totale per ogni articolo.
    - Il totale generale del carrello è calcolato sommando i totali parziali.

3. **Rimuovere Prodotti dal Carrello (`remove.php`)**:
    - L'utente può rimuovere un prodotto specifico dal carrello. Il prodotto viene eliminato dall'array di sessione e l'utente viene reindirizzato di nuovo alla pagina del carrello.

### Conclusione

Questo esercizio mostra un esempio base di come utilizzare le sessioni in PHP per creare un carrello della spesa. Questa implementazione può essere estesa per includere funzionalità aggiuntive, come la persistenza dei dati nel database, la gestione delle scorte, e molto altro ancora.