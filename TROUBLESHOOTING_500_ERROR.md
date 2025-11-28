# Troubleshooting Internal Server Error (HTTP 500)

## Daftar Masalah Umum dan Solusi

### 1. **Apache mod_rewrite Tidak Aktif**

**Gejala:** Internal Server Error saat mengklik menu

**Penyebab:** Module mod_rewrite Apache belum diaktifkan

**Solusi:**
```bash
# Aktifkan mod_rewrite
sudo a2enmod rewrite

# Restart Apache
sudo systemctl restart apache2
# atau
sudo service apache2 restart
```

**Verifikasi:**
```bash
# Cek apakah mod_rewrite sudah aktif
apache2ctl -M | grep rewrite
# Seharusnya muncul: rewrite_module (shared)
```

---

### 2. **AllowOverride Tidak Diset (htaccess Tidak Dibaca)**

**Gejala:** Internal Server Error, .htaccess diabaikan

**Penyebab:** Apache tidak mengizinkan .htaccess untuk override konfigurasi

**Solusi:**

**Untuk Apache 2.4:**

Edit file konfigurasi virtual host atau Apache config:
```bash
sudo nano /etc/apache2/sites-available/ppid.conf
# atau
sudo nano /etc/apache2/sites-available/000-default.conf
```

Pastikan ada konfigurasi ini:
```apache
<VirtualHost *:80>
    ServerName ppid.sumedangkab.go.id
    DocumentRoot /var/www/html/ppid

    <Directory /var/www/html/ppid>
        Options Indexes FollowSymLinks
        AllowOverride All        # ← PENTING: Harus "All"
        Require all granted
    </Directory>

    ErrorLog ${APACHE_LOG_DIR}/ppid_error.log
    CustomLog ${APACHE_LOG_DIR}/ppid_access.log combined
</VirtualHost>
```

**Jika aplikasi di subdirektori /ppid/:**
```apache
<Directory /var/www/html/ppid>
    Options Indexes FollowSymLinks
    AllowOverride All
    Require all granted
</Directory>
```

Setelah edit, restart Apache:
```bash
sudo systemctl restart apache2
```

---

### 3. **RewriteBase Salah di .htaccess**

**Gejala:** Internal Server Error pada menu tertentu

**Penyebab:** RewriteBase di .htaccess tidak sesuai dengan struktur direktori server

**Cek lokasi instalasi aplikasi:**

**Jika aplikasi di root domain** (misal: `http://ppid.sumedangkab.go.id/`):
```apache
# .htaccess line 2
RewriteBase /
```

**Jika aplikasi di subdirektori** (misal: `http://sumedangkab.go.id/ppid/`):
```apache
# .htaccess line 2
RewriteBase /ppid/
```

**Cara cek:**
- Jika URL homepage adalah `http://ppid.sumedangkab.go.id/` → gunakan `/`
- Jika URL homepage adalah `http://domain.com/ppid/` → gunakan `/ppid/`

**Edit .htaccess:**
```bash
nano /var/www/html/ppid/.htaccess
```

Ubah line 2:
```apache
RewriteBase /     # Sesuaikan dengan struktur direktori Anda
```

---

### 4. **File Permissions Salah**

**Gejala:** Internal Server Error, terutama saat session atau logging

**Penyebab:** Folder `application/sessions/` dan `application/logs/` tidak writable

**Solusi:**
```bash
# Pindah ke direktori aplikasi
cd /var/www/html/ppid

# Set permission untuk folder sessions dan logs
sudo chmod 775 application/sessions
sudo chmod 775 application/logs
sudo chmod 664 application/logs/*.php
sudo chmod 664 application/logs/*.log

# Set owner ke user web server (Apache: www-data, Nginx: nginx/www-data)
sudo chown -R www-data:www-data application/sessions
sudo chown -R www-data:www-data application/logs

# Jika menggunakan Nginx dengan user nginx:
# sudo chown -R nginx:nginx application/sessions
# sudo chown -R nginx:nginx application/logs
```

**Verifikasi:**
```bash
ls -la application/ | grep -E 'sessions|logs'
# Seharusnya:
# drwxrwxr-x  www-data www-data  sessions
# drwxrwxr-x  www-data www-data  logs
```

---

### 5. **Cek Error Log untuk Detail Error**

**Lokasi error log:**

**Apache error log:**
```bash
# Cek error log Apache
sudo tail -f /var/log/apache2/error.log

# Atau jika ada virtual host terpisah:
sudo tail -f /var/log/apache2/ppid_error.log
```

**PHP error log aplikasi:**
```bash
# Cek error log PHP dari aplikasi
tail -f /var/www/html/ppid/application/logs/php_errors.log

# Atau cek CodeIgniter log
tail -f /var/www/html/ppid/application/logs/log-*.php
```

**Cara membaca error:**
- **"Premature end of script headers"** → PHP error atau permission issue
- **"File does not exist"** → Controller/view file tidak ditemukan
- **"Failed opening required"** → File path salah atau permission error
- **"Call to undefined method"** → Controller method tidak ada
- **".htaccess: Invalid command"** → Apache module belum aktif

---

### 6. **Environment Setting**

**Cek environment saat ini:**

Edit `index.php` line 55:
```php
define('ENVIRONMENT', isset($_SERVER['CI_ENV']) ? $_SERVER['CI_ENV'] : 'production');
```

**Untuk debugging di server:**
Sementara ubah ke `'development'` untuk melihat error detail:
```php
define('ENVIRONMENT', 'development');
```

**PENTING:** Setelah masalah teratasi, kembalikan ke `'production'`:
```php
define('ENVIRONMENT', 'production');
```

---

### 7. **Cek Controller Method Ada**

Pastikan controller method untuk menu sudah ada:

**File: `application/controllers/Profil.php`**
```php
public function pejabat()
{
    $this->load->view("dev/profil/pejabat");
}

public function tentang()
{
    $this->load->view("dev/profil/tentang");
}
```

**File: `application/controllers/Home.php`**
```php
public function lhkpn()
{
    $this->load->view("dev/pengumuman/lhkpn");
}

public function barjas()
{
    $this->load->view("dev/pengumuman/barjas");
}
```

---

### 8. **Cek Routes Configuration**

**File: `application/config/routes.php`**

Pastikan ada routing:
```php
$route['profil/pejabat'] = 'profil/pejabat';
$route['profil/tentang'] = 'profil/tentang';
$route['lhkpn'] = 'home/lhkpn';
$route['barjas'] = 'home/barjas';
```

---

### 9. **Cek View Files Exist**

Pastikan file view ada di lokasi yang benar:
```bash
ls -la application/views/dev/profil/
# Harus ada: pejabat.php, tentang.php

ls -la application/views/dev/pengumuman/
# Harus ada: lhkpn.php, barjas.php
```

---

### 10. **PHP Version Compatibility**

Cek PHP version:
```bash
php -v
```

Aplikasi ini membutuhkan **PHP 7.4 atau lebih tinggi**.

Jika PHP < 7.4:
```bash
# Ubuntu/Debian
sudo apt install php8.1 libapache2-mod-php8.1
sudo a2dismod php7.x
sudo a2enmod php8.1
sudo systemctl restart apache2
```

---

## Langkah-langkah Troubleshooting Sistematis

### Step 1: Cek Apache Modules
```bash
sudo a2enmod rewrite
sudo systemctl restart apache2
apache2ctl -M | grep rewrite
```

### Step 2: Cek AllowOverride
```bash
sudo nano /etc/apache2/sites-available/000-default.conf
# Pastikan AllowOverride All
sudo systemctl restart apache2
```

### Step 3: Set File Permissions
```bash
cd /var/www/html/ppid
sudo chmod 775 application/sessions
sudo chmod 775 application/logs
sudo chown -R www-data:www-data application/sessions
sudo chown -R www-data:www-data application/logs
```

### Step 4: Cek RewriteBase
```bash
nano .htaccess
# Line 2: RewriteBase /ppid/  atau  RewriteBase /
```

### Step 5: Enable Development Mode (Temporary)
```bash
nano index.php
# Line 55: define('ENVIRONMENT', 'development');
```

### Step 6: Cek Error Log
```bash
tail -f /var/log/apache2/error.log
tail -f application/logs/php_errors.log
```

### Step 7: Test URL
Buka browser dan akses:
- http://yourdomain.com/ppid/
- http://yourdomain.com/ppid/profil/pejabat
- http://yourdomain.com/ppid/lhkpn

### Step 8: Kembalikan ke Production Mode
```bash
nano index.php
# Line 55: define('ENVIRONMENT', 'production');
```

---

## Quick Fix Command (Run semua sekaligus)

```bash
#!/bin/bash
# Quick fix script untuk Internal Server Error

cd /var/www/html/ppid

# Enable mod_rewrite
sudo a2enmod rewrite

# Set file permissions
sudo chmod 775 application/sessions
sudo chmod 775 application/logs
sudo chown -R www-data:www-data application/sessions
sudo chown -R www-data:www-data application/logs

# Restart Apache
sudo systemctl restart apache2

echo "✅ Quick fix completed!"
echo "Silakan cek error log jika masih error:"
echo "sudo tail -f /var/log/apache2/error.log"
```

Save sebagai `fix-500.sh` dan jalankan:
```bash
chmod +x fix-500.sh
sudo ./fix-500.sh
```

---

## FAQ

**Q: Sudah enable mod_rewrite tapi masih error?**
A: Cek AllowOverride di Apache config, harus diset ke "All"

**Q: Homepage bisa dibuka, tapi menu error?**
A: Kemungkinan RewriteBase salah atau controller method belum ada

**Q: Error "Call to undefined method"?**
A: Controller method belum ditambahkan, cek file controller

**Q: Error "Failed to open stream"?**
A: File permission issue atau file tidak ada, cek dengan ls -la

**Q: Blank page tanpa error?**
A: Set ENVIRONMENT ke 'development' untuk melihat error detail

---

## Kontak Support

Jika masih mengalami masalah setelah troubleshooting di atas:

1. **Kirim error log lengkap:**
```bash
sudo tail -100 /var/log/apache2/error.log > error_output.txt
tail -100 application/logs/php_errors.log >> error_output.txt
```

2. **Kirim konfigurasi Apache:**
```bash
cat /etc/apache2/sites-available/ppid.conf > config_output.txt
# atau
cat /etc/apache2/sites-available/000-default.conf > config_output.txt
```

3. **Kirim info sistem:**
```bash
php -v > system_info.txt
apache2 -v >> system_info.txt
cat /etc/os-release >> system_info.txt
```

Kirim 3 file tersebut untuk analisis lebih lanjut.
