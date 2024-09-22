
# REST API con PHP e Mysqli

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

Questo file contiene la configurazione per connettersi al database usando `mysqli`.

```php
<?php
class Database {
    private $host = "localhost";
    private $db_name = "your_database_name";
    private $username = "your_username";
    private $password = "your_password";
    public $conn;

    public function getConnection() {
        $this->conn = null;

        $this->conn = new mysqli($this->host, $this->username, $this->password, $this->db_name);

        if ($this->conn->connect_error) {
            die("Connection failed: " . $this->conn->connect_error);
        }

        return $this->conn;
    }
}
?>
```

### 4. Modello di Prodotto (`product.php`)

Questo file contiene la classe `Product` con i metodi CRUD usando `mysqli`.

```php
<?php
class Product {
    private $conn;
    private $table_name = "products";

    public $id;
    public $name;
    public $description;
    public $price;
    public $category_id;
    public $created;

    public function __construct($db) {
        $this->conn = $db;
    }

    public function read() {
        $query = "SELECT id, name, description, price, category_id, created FROM " . $this->table_name . " ORDER BY created DESC";
        $result = $this->conn->query($query);

        return $result;
    }

    public function create() {
        $query = "INSERT INTO " . $this->table_name . " SET name=?, description=?, price=?, category_id=?, created=?";

        $stmt = $this->conn->prepare($query);

        $this->name = htmlspecialchars(strip_tags($this->name));
        $this->description = htmlspecialchars(strip_tags($this->description));
        $this->price = htmlspecialchars(strip_tags($this->price));
        $this->category_id = htmlspecialchars(strip_tags($this->category_id));
        $this->created = htmlspecialchars(strip_tags($this->created));

        $stmt->bind_param("ssdss", $this->name, $this->description, $this->price, $this->category_id, $this->created);

        if($stmt->execute()) {
            return true;
        }

        return false;
    }

    public function update() {
        $query = "UPDATE " . $this->table_name . " SET name = ?, description = ?, price = ?, category_id = ? WHERE id = ?";

        $stmt = $this->conn->prepare($query);

        $this->name = htmlspecialchars(strip_tags($this->name));
        $this->description = htmlspecialchars(strip_tags($this->description));
        $this->price = htmlspecialchars(strip_tags($this->price));
        $this->category_id = htmlspecialchars(strip_tags($this->category_id));
        $this->id = htmlspecialchars(strip_tags($this->id));

        $stmt->bind_param("ssdsi", $this->name, $this->description, $this->price, $this->category_id, $this->id);

        if($stmt->execute()) {
            return true;
        }

        return false;
    }

    public function delete() {
        $query = "DELETE FROM " . $this->table_name . " WHERE id = ?";

        $stmt = $this->conn->prepare($query);

        $this->id = htmlspecialchars(strip_tags($this->id));

        $stmt->bind_param("i", $this->id);

        if($stmt->execute()) {
            return true;
        }

        return false;
    }
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

include_once '../includes/database.php';
include_once '../includes/product.php';

$database = new Database();
$db = $database->getConnection();

$product = new Product($db);

$data = json_decode(file_get_contents("php://input"));

if(
    !empty($data->name) &&
    !empty($data->description) &&
    !empty($data->price) &&
    !empty($data->category_id)
){
    $product->name = $data->name;
    $product->description = $data->description;
    $product->price = $data->price;
    $product->category_id = $data->category_id;
    $product->created = date('Y-m-d H:i:s');

    if($product->create()){
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
?>
```

Similmente, puoi creare gli altri file per leggere (`read.php`), aggiornare (`update.php`) e cancellare (`delete.php`) i prodotti. Ecco un esempio di `read.php`:

```php
<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

include_once '../includes/database.php';
include_once '../includes/product.php';

$database = new Database();
$db = $database->getConnection();

$product = new Product($db);

$result = $product->read();
$num = $result->num_rows;

if($num > 0){
    $products_arr = array();
    $products_arr["records"] = array();

    while ($row = $result->fetch_assoc()){
        extract($row);

        $product_item = array(
            "id" => $id,
            "name" => $name,
            "description" => html_entity_decode($description),
            "price" => $price,
            "category_id" => $category_id,
            "created" => $created
        );

        array_push($products_arr["records"], $product_item);
    }

    http_response_code(200);
    echo json_encode($products_arr);
} else {
    http_response_code(404);
    echo json_encode(array("message" => "No products found."));
}
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
