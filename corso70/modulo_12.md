# **📌 MODULO 12 – Deployment di un'Applicazione Laravel**  
✅ **Obiettivo:** Imparare a pubblicare un progetto Laravel su un server di produzione.  
✅ **Durata:** ~8 ore  

---

## **🔷 BLOCCO 12.1 – Preparazione per il Deployment**  
📌 **Obiettivi:** Preparare l’applicazione Laravel per la produzione.  

### **📖 Teoria**  
✅ **1. Impostare il file `.env` per la produzione**  
- Cambia le variabili del database con i dati del server.  
- Imposta `APP_ENV=production` e `APP_DEBUG=false`.  
- Genera una nuova chiave di applicazione:  
  ```sh
  php artisan key:generate
  ```

✅ **2. Ottimizzare il codice per la produzione**  
```sh
php artisan config:cache
php artisan route:cache
php artisan view:cache
```

✅ **3. Installare Composer senza pacchetti di sviluppo**  
```sh
composer install --optimize-autoloader --no-dev
```

### **💡 Esercizio**  
1. Configura il file `.env` per simulare un ambiente di produzione in locale.  

---

## **🔷 BLOCCO 12.2 – Configurare un Server con Laravel**  
📌 **Obiettivi:** Configurare un server Linux per ospitare Laravel.  

### **📖 Teoria**  
✅ **1. Configurare un server con Ubuntu e Nginx/Apache**  
- Installa PHP, MySQL, Composer e Git:  
  ```sh
  sudo apt update
  sudo apt install php-cli php-mbstring unzip curl php-xml php-bcmath php-curl php-tokenizer php-zip
  sudo apt install nginx mysql-server
  sudo systemctl start nginx
  ```

✅ **2. Creare un database MySQL per Laravel**  
```sh
mysql -u root -p
CREATE DATABASE biblioteca;
GRANT ALL ON biblioteca.* TO 'laravel_user'@'localhost' IDENTIFIED BY 'password';
FLUSH PRIVILEGES;
EXIT;
```

✅ **3. Configurare Nginx per Laravel**  
Apri il file di configurazione di Nginx:  
```sh
sudo nano /etc/nginx/sites-available/laravel
```
Aggiungi:  
```nginx
server {
    listen 80;
    server_name tuo-dominio.com;
    root /var/www/laravel/public;
    index index.php index.html index.htm;

    location / {
        try_files $uri $uri/ /index.php?$query_string;
    }

    location ~ \.php$ {
        include snippets/fastcgi-php.conf;
        fastcgi_pass unix:/run/php/php8.1-fpm.sock;
        fastcgi_param SCRIPT_FILENAME $document_root$fastcgi_script_name;
        include fastcgi_params;
    }

    location ~ /\.ht {
        deny all;
    }
}
```
Salva e riavvia Nginx:  
```sh
sudo ln -s /etc/nginx/sites-available/laravel /etc/nginx/sites-enabled/
sudo systemctl restart nginx
```

### **💡 Esercizio**  
1. Configura un server web locale con Laravel e Nginx.  

---

## **🔷 BLOCCO 12.3 – Deployment con Git e SSH**  
📌 **Obiettivi:** Usare Git e SSH per pubblicare il codice Laravel.  

### **📖 Teoria**  
✅ **1. Configurare Git nel server**  
```sh
sudo apt install git
cd /var/www/
git clone https://github.com/tuo-user/tuo-repository.git laravel
cd laravel
```

✅ **2. Creare chiavi SSH per accesso a GitHub**  
```sh
ssh-keygen -t rsa -b 4096 -C "tuo@email.com"
cat ~/.ssh/id_rsa.pub
```
Aggiungi la chiave su GitHub in **Settings > SSH and GPG keys**.  

✅ **3. Automatizzare il deployment con `git pull`**  
```sh
git pull origin main
composer install --no-dev --optimize-autoloader
php artisan migrate --force
php artisan config:cache
```

### **💡 Esercizio**  
1. Configura un repository Git per la tua applicazione e fai un push del codice.  

---

## **🔷 BLOCCO 12.4 – Setup di Supervisor per Code e Jobs**  
📌 **Obiettivi:** Automatizzare processi come notifiche ed email.  

### **📖 Teoria**  
✅ **1. Installare Supervisor**  
```sh
sudo apt install supervisor
```

✅ **2. Creare un worker per le code Laravel**  
```sh
sudo nano /etc/supervisor/conf.d/laravel-worker.conf
```
Aggiungi:  
```ini
[program:laravel-worker]
process_name=%(program_name)s_%(process_num)02d
command=php /var/www/laravel/artisan queue:work --tries=3
autostart=true
autorestart=true
numprocs=1
user=www-data
redirect_stderr=true
stdout_logfile=/var/www/laravel/storage/logs/worker.log
```
Salva e riavvia Supervisor:  
```sh
sudo supervisorctl reread
sudo supervisorctl update
sudo supervisorctl start laravel-worker:*
```

### **💡 Esercizio**  
1. Crea una job queue che invia email di conferma dopo una registrazione.  

---

## **🔷 BLOCCO 12.5 – Certificati SSL e Sicurezza in Laravel**  
📌 **Obiettivi:** Proteggere il sito con HTTPS e configurare sicurezza.  

### **📖 Teoria**  
✅ **1. Installare un certificato SSL con Let’s Encrypt**  
```sh
sudo apt install certbot python3-certbot-nginx
sudo certbot --nginx -d tuo-dominio.com
```

✅ **2. Abilitare Firewall e Sicurezza**  
```sh
sudo ufw allow OpenSSH
sudo ufw allow 'Nginx Full'
sudo ufw enable
```

✅ **3. Proteggere Laravel**  
- Disabilita `APP_DEBUG` in produzione.  
- Usa `https://` nel file `.env`:  
  ```env
  APP_URL=https://tuo-dominio.com
  ```

### **💡 Esercizio**  
1. Configura HTTPS su un dominio locale o di test con Let’s Encrypt.  

---

## **🎯 RIEPILOGO E TEST PRATICO**  
📌 **Test finale:**  
1. **Obiettivo:** Pubblicare un’app Laravel in produzione con queste caratteristiche:  
   - Hosting su un server con Nginx e MySQL.  
   - Deployment automatico con Git.  
   - Ottimizzazione per la produzione (`config:cache`, `route:cache`).  
   - Code di background con Supervisor.  
   - Certificato SSL attivo.  

🚀 **Hai completato il deployment di un’app Laravel! Ora sei pronto per gestire progetti in produzione.** 