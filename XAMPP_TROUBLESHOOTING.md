# Troubleshooting XAMPP - PPID Sumedang

## Quick Fix untuk Port 8080

Jika Anda menggunakan XAMPP di port 8080 dan mendapat error, ikuti langkah berikut:

### 1. Pastikan File config_local.php Sudah Benar

File `config_local.php` sudah dikonfigurasi untuk port 8080:
```php
define('BASE_URL', 'http://localhost:8080/ppidC/');
```

**PENTING**: File ini harus di root directory aplikasi (`C:\xampp\htdocs\ppidC\config_local.php`)

### 2. Cek Apache Configuration

Pastikan Apache berjalan di port 8080:

**File**: `C:\xampp\apache\conf\httpd.conf`
```apache
Listen 8080
ServerName localhost:8080
```

### 3. Enable mod_rewrite di XAMPP

**File**: `C:\xampp\apache\conf\httpd.conf`

Cari dan uncomment (hapus `#` di depan):
```apache
LoadModule rewrite_module modules/mod_rewrite.so
```

Cari section `<Directory>` dan ubah:
```apache
<Directory "C:/xampp/htdocs">
    Options Indexes FollowSymLinks Includes ExecCGI
    AllowOverride All  # <-- Pastikan ini "All", bukan "None"
    Require all granted
</Directory>
```

### 4. Restart Apache

Dari XAMPP Control Panel:
1. Stop Apache
2. Start Apache
3. Cek log jika ada error

---

## Error Yang Sering Terjadi & Solusinya

### Error 1: "Blank Page" atau "White Screen"

**Penyebab**: Error PHP tidak ditampilkan

**Solusi**:
1. Enable error display di `index.php`:
```php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
```

2. Cek PHP error log:
```
C:\xampp\php\logs\php_error_log
C:\xampp\apache\logs\error.log
```

### Error 2: "404 Page Not Found"

**Penyebab**: mod_rewrite tidak aktif atau .htaccess tidak berfungsi

**Solusi**:
1. Pastikan mod_rewrite enabled (lihat langkah 3 di atas)
2. Cek file `.htaccess` ada di root directory
3. Test dengan URL: `http://localhost:8080/ppidC/index.php`
4. Jika berfungsi, berarti masalah di .htaccess

**Alternative .htaccess untuk XAMPP**:
```apache
RewriteEngine On
RewriteBase /ppidC/

# Redirect to index.php
RewriteCond %{REQUEST_FILENAME} !-f
RewriteCond %{REQUEST_FILENAME} !-d
RewriteRule ^(.*)$ index.php?/$1 [L,QSA]

# Disable directory browsing
Options -Indexes

# Prevent direct access
<FilesMatch "^(\.htaccess|\.gitignore|composer\.json|\.env)$">
    Order Allow,Deny
    Deny from all
</FilesMatch>
```

### Error 3: "Database connection failed"

**Penyebab**: MySQL belum berjalan atau konfigurasi salah

**Solusi**:
1. Start MySQL dari XAMPP Control Panel
2. Cek `application/config/database.php`:
```php
$db['default'] = array(
    'dsn'	=> '',
    'hostname' => 'localhost',  // atau '127.0.0.1'
    'username' => 'root',       // default XAMPP
    'password' => '',           // default XAMPP kosong
    'database' => 'ppid',       // sesuaikan nama database
    'dbdriver' => 'mysqli',
    'dbprefix' => '',
    'pconnect' => FALSE,
    'db_debug' => TRUE,         // Set TRUE untuk development
    'cache_on' => FALSE,
    'cachedir' => '',
    'char_set' => 'utf8mb4',
    'dbcollat' => 'utf8mb4_unicode_ci',
    'swap_pre' => '',
    'encrypt' => FALSE,
    'compress' => FALSE,
    'stricton' => FALSE,
    'failover' => array(),
    'save_queries' => TRUE
);
```

3. Import database:
```bash
# Dari command line
cd C:\xampp\mysql\bin
mysql -u root -p ppid < path\to\database.sql

# Atau gunakan phpMyAdmin
http://localhost:8080/phpmyadmin
```

### Error 4: "Call to undefined function mysqli_connect()"

**Penyebab**: Extension mysqli belum enabled

**Solusi**:
1. Edit `C:\xampp\php\php.ini`
2. Uncomment (hapus `;` di depan):
```ini
extension=mysqli
```
3. Restart Apache

### Error 5: "Session tidak berfungsi"

**Penyebab**: Permission folder atau konfigurasi session

**Solusi**:
1. Cek folder `application/cache` ada dan writable
2. Di `application/config/config.php`:
```php
$config['sess_driver'] = 'files';
$config['sess_cookie_name'] = 'ci_session';
$config['sess_expiration'] = 7200;
$config['sess_save_path'] = APPPATH . 'cache';
$config['sess_match_ip'] = FALSE;
$config['sess_time_to_update'] = 300;
$config['sess_regenerate_destroy'] = FALSE;
```

### Error 6: "Cannot modify header information"

**Penyebab**: Output sebelum header() dipanggil

**Solusi**:
1. Pastikan tidak ada spasi/newline sebelum `<?php`
2. Cek encoding file (harus UTF-8 without BOM)
3. Cek error di view yang di-load sebelum redirect

### Error 7: "Deprecated: ... in PHP 8.1"

**Penyebab**: Kode lama yang tidak compatible dengan PHP 8.1

**Solusi**:
1. Untuk development, bisa disable warning:
```php
// Di index.php, case 'development'
error_reporting(E_ALL & ~E_DEPRECATED & ~E_WARNING);
```

2. Untuk production, sudah di-handle di konfigurasi

### Error 8: "Upload file tidak berfungsi"

**Penyebab**: PHP configuration atau permission

**Solusi**:
1. Edit `C:\xampp\php\php.ini`:
```ini
file_uploads = On
upload_max_filesize = 50M
post_max_size = 50M
max_execution_time = 300
memory_limit = 256M
```

2. Pastikan folder upload writable:
```
C:\xampp\htdocs\ppidC\upload
```

3. Restart Apache

---

## PHP 8.1.25 Configuration untuk XAMPP

### File: `C:\xampp\php\php.ini`

```ini
[PHP]
; Error Handling
error_reporting = E_ALL
display_errors = On          ; Set Off untuk production
display_startup_errors = On  ; Set Off untuk production
log_errors = On
error_log = "C:\xampp\php\logs\php_error_log"

; Resource Limits
max_execution_time = 300
max_input_time = 300
memory_limit = 256M

; File Uploads
file_uploads = On
upload_max_filesize = 50M
post_max_size = 50M
max_file_uploads = 20

; Paths and Directories
doc_root = ""
extension_dir = "C:\xampp\php\ext"

; Extensions (uncomment yang dibutuhkan)
extension=curl
extension=fileinfo
extension=gd
extension=intl
extension=mbstring
extension=mysqli
extension=openssl
extension=pdo_mysql
extension=zip

; Session
session.save_handler = files
session.save_path = "C:\xampp\tmp"
session.use_cookies = 1
session.use_only_cookies = 1
session.name = PHPSESSID
session.auto_start = 0
session.cookie_lifetime = 0
session.cookie_path = /
session.cookie_httponly = 1
session.gc_maxlifetime = 1440

; Timezone
date.timezone = Asia/Jakarta

; OPcache (untuk performance)
[opcache]
opcache.enable=1
opcache.memory_consumption=128
opcache.interned_strings_buffer=8
opcache.max_accelerated_files=10000
opcache.revalidate_freq=2
opcache.fast_shutdown=1
opcache.enable_cli=0
```

---

## Checklist Setup XAMPP

- [ ] PHP versi 8.1.25 terinstall
- [ ] Apache berjalan di port 8080
- [ ] MySQL berjalan
- [ ] mod_rewrite enabled di httpd.conf
- [ ] AllowOverride set ke "All"
- [ ] File .htaccess ada di root directory
- [ ] File config_local.php sudah dikonfigurasi
- [ ] Extension mysqli, mbstring, gd enabled
- [ ] Folder application/cache writable
- [ ] Folder upload writable
- [ ] Database sudah dibuat dan di-import
- [ ] phpinfo() menunjukkan PHP 8.1.25

---

## Testing Step-by-Step

### 1. Test PHP Info
Buat file `test_php.php` di `C:\xampp\htdocs\ppidC\`:
```php
<?php
phpinfo();
?>
```

Akses: `http://localhost:8080/ppidC/test_php.php`

**Cek**:
- PHP Version: 8.1.25
- Loaded Configuration File: C:\xampp\php\php.ini
- mysqli, mbstring, gd, curl muncul di list

**HAPUS file ini setelah testing!**

### 2. Test Base URL
Akses: `http://localhost:8080/ppidC/`

**Expected**: Halaman utama PPID muncul

**Jika error**: Cek Apache error log

### 3. Test Database Connection
Buat file `test_db.php`:
```php
<?php
$conn = new mysqli('localhost', 'root', '', 'ppid');

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
echo "Database connected successfully!";
$conn->close();
?>
```

Akses: `http://localhost:8080/ppidC/test_db.php`

**HAPUS file ini setelah testing!**

### 4. Test Rewrite
Akses: `http://localhost:8080/ppidC/permohonan`

**Expected**: Halaman permohonan muncul (tanpa index.php di URL)

**Jika 404**: mod_rewrite belum berfungsi

### 5. Test Admin Login
Akses: `http://localhost:8080/ppidC/index.php/login`

**Expected**: Halaman login admin muncul

---

## Error Logs Location

### Apache Error Log
```
C:\xampp\apache\logs\error.log
```

View dengan Notepad atau:
```bash
tail -f C:\xampp\apache\logs\error.log
```

### PHP Error Log
```
C:\xampp\php\logs\php_error_log
```

### MySQL Error Log
```
C:\xampp\mysql\data\mysql_error.log
```

---

## Virtual Host Configuration (Optional)

Untuk menggunakan domain custom seperti `ppid.local`:

### 1. Edit hosts file
**File**: `C:\Windows\System32\drivers\etc\hosts`
```
127.0.0.1    ppid.local
```

### 2. Edit httpd-vhosts.conf
**File**: `C:\xampp\apache\conf\extra\httpd-vhosts.conf`
```apache
<VirtualHost *:8080>
    DocumentRoot "C:/xampp/htdocs/ppidC"
    ServerName ppid.local

    <Directory "C:/xampp/htdocs/ppidC">
        Options Indexes FollowSymLinks
        AllowOverride All
        Require all granted
    </Directory>

    ErrorLog "C:/xampp/apache/logs/ppid-error.log"
    CustomLog "C:/xampp/apache/logs/ppid-access.log" common
</VirtualHost>
```

### 3. Enable vhosts di httpd.conf
**File**: `C:\xampp\apache\conf\httpd.conf`

Uncomment:
```apache
Include conf/extra/httpd-vhosts.conf
```

### 4. Update config_local.php
```php
define('BASE_URL', 'http://ppid.local:8080/');
```

### 5. Restart Apache

Akses: `http://ppid.local:8080/`

---

## Performance Optimization

### 1. Enable OPcache
Di `php.ini`, pastikan:
```ini
opcache.enable=1
```

### 2. Disable Xdebug di Production
Jika tidak debugging, disable Xdebug:
```ini
; zend_extension = "C:\xampp\php\ext\php_xdebug.dll"
```

### 3. Apache MPM Configuration
Edit `httpd-mpm.conf` untuk better performance

---

## Uninstall/Reset

Jika ingin reset XAMPP:

1. Stop semua services
2. Backup data penting:
   - Database: Export via phpMyAdmin
   - Files: Copy folder htdocs
3. Uninstall XAMPP
4. Delete folder `C:\xampp`
5. Install XAMPP baru
6. Restore data

---

## Support & Resources

- **XAMPP Forum**: https://community.apachefriends.org/
- **CodeIgniter Docs**: https://codeigniter.com/userguide3/
- **PHP 8.1 Docs**: https://www.php.net/manual/en/migration81.php

---

## Common Commands

### Start/Stop Services via Command Line
```bash
# Start Apache
C:\xampp\apache_start.bat

# Stop Apache
C:\xampp\apache_stop.bat

# Start MySQL
C:\xampp\mysql_start.bat

# Stop MySQL
C:\xampp\mysql_stop.bat
```

### MySQL Commands
```bash
# Login to MySQL
C:\xampp\mysql\bin\mysql -u root -p

# Create database
CREATE DATABASE ppid CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;

# Import database
C:\xampp\mysql\bin\mysql -u root -p ppid < database.sql

# Export database
C:\xampp\mysql\bin\mysqldump -u root -p ppid > backup.sql
```

---

## Quick Reference

| URL | Function |
|-----|----------|
| `http://localhost:8080/ppidC/` | Homepage |
| `http://localhost:8080/ppidC/index.php/login` | Admin Login |
| `http://localhost:8080/ppidC/index.php/permohonan` | Permohonan |
| `http://localhost:8080/phpmyadmin` | phpMyAdmin |
| `http://localhost:8080/dashboard` | XAMPP Dashboard |

---

**Last Updated**: 2025-01-19
**XAMPP Version**: 8.1.25
**PHP Version**: 8.1.25
**Application**: PPID Kabupaten Sumedang
