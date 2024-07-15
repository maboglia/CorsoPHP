
# REST API con PHP e mysqli con approccio procedurale


### 1. Configurazione dell'Ambiente

Assicurati di avere un server web (come Apache o Nginx) con PHP e MySQL installato. Puoi utilizzare un ambiente come XAMPP, WAMP, MAMP, o un server web su un hosting provider.

### 2. Struttura delle Directory

Organizza il tuo progetto in una struttura di directory simile a questa:

```
/my-api
    /includes
        database.php
        product.php
    /api
        product
            create.php
            read.php
            update.php
            delete.php
    .htaccess
    index.php
```

### 3. File di Configurazione del Database (`database.php`)

Questo file contiene la configurazione per connettersi al database usando `mysqli` in modalità procedurale.

```php
<?php
function getConnection() {
    $host = "localhost";
    $db_name = "your_database_name";
    $username = "your_username";
    $password = "your_password";

    $conn = mysqli_connect($host, $username, $password, $db_name);

    if (mysqli_connect_errno()) {
        die("Connection failed: " . mysqli_connect_error());
    }

    return $conn;
}
?>
```

### 4. Modello di Prodotto (`product.php`)

Questo file contiene le funzioni per gestire i prodotti con `mysqli` in modalità procedurale.

```php
<?php
function readProducts($conn) {
    $query = "SELECT id, name, description, price, category_id, created FROM products ORDER BY created DESC";
    return mysqli_query($conn, $query);
}

function createProduct($conn, $name, $description, $price, $category_id, $created) {
    $query = "INSERT INTO products SET name=?, description=?, price=?, category_id=?, created=?";
    $stmt = mysqli_prepare($conn, $query);
    mysqli_stmt_bind_param($stmt, "ssdss", $name, $description, $price, $category_id, $created);
    return mysqli_stmt_execute($stmt);
}

function updateProduct($conn, $id, $name, $description, $price, $category_id) {
    $query = "UPDATE products SET name = ?, description = ?, price = ?, category_id = ? WHERE id = ?";
    $stmt = mysqli_prepare($conn, $query);
    mysqli_stmt_bind_param($stmt, "ssdsi", $name, $description, $price, $category_id, $id);
    return mysqli_stmt_execute($stmt);
}

function deleteProduct($conn, $id) {
    $query = "DELETE FROM products WHERE id = ?";
    $stmt = mysqli_prepare($conn, $query);
    mysqli_stmt_bind_param($stmt, "i", $id);
    return mysqli_stmt_execute($stmt);
}
?>
```

### 5. File di API (`create.php`, `read.php`, `update.php`, `delete.php`)

Ecco un esempio per creare un prodotto (`create.php`):

```php
<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

include_once '../../includes/database.php';
include_once '../../includes/product.php';

$conn = getConnection();
$data = json_decode(file_get_contents("php://input"));

if(
    !empty($data->name) &&
    !empty($data->description) &&
    !empty($data->price) &&
    !empty($data->category_id)
){
    $name = htmlspecialchars(strip_tags($data->name));
    $description = htmlspecialchars(strip_tags($data->description));
    $price = htmlspecialchars(strip_tags($data->price));
    $category_id = htmlspecialchars(strip_tags($data->category_id));
    $created = date('Y-m-d H:i:s');

    if(createProduct($conn, $name, $description, $price, $category_id, $created)){
        http_response_code(201);
        echo json_encode(array("message" => "Product was created."));
    } else {
        http_response_code(503);
        echo json_encode(array("message" => "Unable to create product."));
    }
} else {
    http_response_code(400);
    echo json_encode(array("message" => "Unable to create product. Data is incomplete."));
}

mysqli_close($conn);
?>
```

Similmente, puoi creare gli altri file per leggere (`read.php`), aggiornare (`update.php`) e cancellare (`delete.php`) i prodotti. Ecco un esempio di `read.php`:

```php
<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

include_once '../../includes/database.php';
include_once '../../includes/product.php';

$conn = getConnection();
$result = readProducts($conn);

$num = mysqli_num_rows($result);

if($num > 0){
    $products_arr = array();
    $products_arr["records"] = array();

    while ($row = mysqli_fetch_assoc($result)){
        $product_item = array(
            "id" => $row["id"],
            "name" => $row["name"],
            "description" => html_entity_decode($row["description"]),
            "price" => $row["price"],
            "category_id" => $row["category_id"],
            "created" => $row["created"]
        );

        array_push($products_arr["records"], $product_item);
    }

    http_response_code(200);
    echo json_encode($products_arr);
} else {
    http_response_code(404);
    echo json_encode(array("message" => "No products found."));
}

mysqli_close($conn);
?>
```

### 6. Configurazione di Apache (.htaccess)

Utilizza un file `.htaccess` per gestire il rewriting delle URL, se necessario:

```htaccess
RewriteEngine On
RewriteCond %{REQUEST_FILENAME} !-f
RewriteRule ^ api/product/read.php [L,QSA]
```

### 7. Testing dell'API

Puoi testare l'API utilizzando strumenti come Postman, Curl o direttamente tramite il tuo frontend. Ad esempio, per testare l'endpoint `create.php`, invia una richiesta POST con il seguente payload JSON:

```json
{
    "name": "New Product",
    "description": "This is a new product",
    "price": 19.99,
    "category_id": 1
}
```
