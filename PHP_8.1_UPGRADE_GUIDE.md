# Panduan Upgrade PHP 8.1.33 untuk PPID Sumedang

## Daftar Isi
1. [Persyaratan Sistem](#persyaratan-sistem)
2. [Persiapan Sebelum Upgrade](#persiapan-sebelum-upgrade)
3. [Proses Upgrade](#proses-upgrade)
4. [Verifikasi](#verifikasi)
5. [Troubleshooting](#troubleshooting)

---

## Persyaratan Sistem

### Minimum Requirements
- **PHP**: 8.1.33 atau lebih tinggi
- **MySQL**: 5.7+ atau MariaDB 10.3+
- **Apache**: 2.4+ dengan mod_rewrite enabled
- **RAM**: Minimum 512MB (Recommended 1GB+)
- **Disk Space**: Minimum 100MB free space

### PHP Extensions Yang Dibutuhkan
```
- mbstring
- mysqli
- openssl
- curl
- gd
- xml
- zip
- json
- fileinfo
- intl (optional, tapi direkomendasikan)
```

---

## Persiapan Sebelum Upgrade

### 1. Backup Lengkap

#### Backup Database
```bash
mysqldump -u root -p ppid_database > backup_ppid_database_$(date +%Y%m%d_%H%M%S).sql
```

#### Backup Files
```bash
tar -czf backup_ppid_files_$(date +%Y%m%d_%H%M%S).tar.gz /path/to/ppid
```

### 2. Catat Versi Saat Ini
```bash
php -v
mysql --version
apache2 -v
```

### 3. Test di Development Environment Dulu
**JANGAN langsung upgrade di production!** Test dulu di environment development/staging.

---

## Proses Upgrade

### A. Ubuntu/Debian

#### 1. Install Repository PHP 8.1
```bash
sudo apt update
sudo apt install -y software-properties-common
sudo add-apt-repository ppa:ondrej/php
sudo apt update
```

#### 2. Install PHP 8.1.33
```bash
# Install PHP 8.1 dan extensions
sudo apt install -y php8.1 \
    php8.1-cli \
    php8.1-fpm \
    php8.1-mysql \
    php8.1-mbstring \
    php8.1-xml \
    php8.1-curl \
    php8.1-gd \
    php8.1-zip \
    php8.1-intl \
    php8.1-opcache
```

#### 3. Update Apache Configuration (jika menggunakan Apache)
```bash
# Disable PHP lama
sudo a2dismod php7.4  # sesuaikan dengan versi lama Anda

# Enable PHP 8.1
sudo a2enmod php8.1

# Restart Apache
sudo systemctl restart apache2
```

#### 4. Update PHP-FPM Configuration (jika menggunakan Nginx)
```bash
# Edit konfigurasi Nginx
sudo nano /etc/nginx/sites-available/ppid

# Ubah baris berikut:
# fastcgi_pass unix:/var/run/php/php7.4-fpm.sock;
# Menjadi:
# fastcgi_pass unix:/var/run/php/php8.1-fpm.sock;

# Restart services
sudo systemctl restart php8.1-fpm
sudo systemctl restart nginx
```

### B. CentOS/RHEL

#### 1. Install Remi Repository
```bash
sudo yum install -y epel-release
sudo yum install -y https://rpms.remirepo.net/enterprise/remi-release-$(rpm -E %rhel).rpm
```

#### 2. Enable PHP 8.1 Module
```bash
sudo yum module reset php
sudo yum module enable php:remi-8.1
```

#### 3. Install PHP 8.1
```bash
sudo yum install -y php \
    php-cli \
    php-fpm \
    php-mysqlnd \
    php-mbstring \
    php-xml \
    php-gd \
    php-curl \
    php-zip \
    php-intl \
    php-opcache
```

#### 4. Restart Services
```bash
sudo systemctl restart httpd
# atau
sudo systemctl restart nginx php-fpm
```

### C. Windows (XAMPP/Laragon)

#### XAMPP
1. Download PHP 8.1.33 dari https://windows.php.net/download/
2. Extract ke folder XAMPP: `C:\xampp\php`
3. Backup `php.ini` lama
4. Copy `php.ini-production` menjadi `php.ini`
5. Enable extensions yang dibutuhkan di `php.ini`
6. Restart Apache dari XAMPP Control Panel

#### Laragon
1. Download PHP 8.1.33 dari https://windows.php.net/download/
2. Extract ke `C:\laragon\bin\php\php-8.1.33`
3. Buka Laragon → Menu → PHP → Version → Pilih php-8.1.33
4. Restart All Services

---

## Konfigurasi PHP 8.1

### 1. Edit php.ini

Lokasi php.ini:
- **Ubuntu/Debian**: `/etc/php/8.1/apache2/php.ini` atau `/etc/php/8.1/fpm/php.ini`
- **CentOS/RHEL**: `/etc/php.ini`
- **Windows**: `C:\xampp\php\php.ini` atau `C:\laragon\bin\php\php-8.1.33\php.ini`

#### Pengaturan Yang Direkomendasikan
```ini
; Memory Limit
memory_limit = 256M

; Upload Limits
upload_max_filesize = 50M
post_max_size = 50M
max_execution_time = 300
max_input_time = 300

; Error Reporting (Production)
display_errors = Off
display_startup_errors = Off
error_reporting = E_ALL & ~E_DEPRECATED & ~E_STRICT
log_errors = On
error_log = /var/log/php/error.log

; Session
session.save_handler = files
session.save_path = "/tmp"
session.gc_maxlifetime = 1440

; Timezone
date.timezone = Asia/Jakarta

; OPcache (untuk performance)
opcache.enable=1
opcache.memory_consumption=128
opcache.interned_strings_buffer=8
opcache.max_accelerated_files=10000
opcache.revalidate_freq=2
opcache.fast_shutdown=1
```

### 2. Enable Extensions
Uncomment (hapus `;` di awal baris) untuk extensions berikut:
```ini
extension=mbstring
extension=mysqli
extension=openssl
extension=curl
extension=gd
extension=fileinfo
extension=zip
extension=intl
```

---

## Verifikasi

### 1. Cek Versi PHP
```bash
php -v
```
Output yang diharapkan:
```
PHP 8.1.33 (cli) (built: ...)
```

### 2. Cek Extensions Terinstall
```bash
php -m
```

### 3. Buat File Test
Buat file `phpinfo.php` di root directory:
```php
<?php
phpinfo();
?>
```

Akses via browser: `http://localhost/ppid/phpinfo.php`

**PENTING**: Hapus file ini setelah selesai testing!

### 4. Test Aplikasi PPID
1. **Halaman Utama**: http://localhost/ppid/
2. **Login Admin**: http://localhost/ppid/index.php/login
3. **Permohonan**: http://localhost/ppid/index.php/permohonan
4. **Keberatan**: http://localhost/ppid/index.php/keberatan

### 5. Cek Error Log
```bash
# Linux
tail -f /var/log/php/error.log
tail -f /var/log/apache2/error.log

# Windows (XAMPP)
C:\xampp\apache\logs\error.log
C:\xampp\php\logs\php_error_log
```

---

## Troubleshooting

### Error: "Call to undefined function mysql_connect()"
**Solusi**: Fungsi `mysql_*` sudah deprecated. CodeIgniter 3.1.10 sudah menggunakan `mysqli`, pastikan extension mysqli enabled.

```bash
# Cek mysqli
php -m | grep mysqli

# Jika belum ada, install:
sudo apt install php8.1-mysql  # Ubuntu/Debian
sudo yum install php-mysqlnd   # CentOS/RHEL
```

### Error: "Deprecated: Creation of dynamic property"
**Solusi**: PHP 8.2+ melarang dynamic properties. Untuk PHP 8.1, ini hanya warning. Tambahkan di class:

```php
#[AllowDynamicProperties]
class YourClass {
    // ...
}
```

Atau set error reporting untuk ignore:
```php
error_reporting(E_ALL & ~E_DEPRECATED & ~E_WARNING);
```

### Error: "mb_convert_encoding() expects parameter 3 to be valid"
**Solusi**: Install mbstring extension:
```bash
sudo apt install php8.1-mbstring  # Ubuntu/Debian
sudo yum install php-mbstring     # CentOS/RHEL
```

### Error: Database Connection Failed
**Solusi**: Periksa konfigurasi database di `application/config/database.php`:

```php
$db['default'] = array(
    'dsn'	=> '',
    'hostname' => 'localhost',
    'username' => 'your_username',
    'password' => 'your_password',
    'database' => 'ppid_database',
    'dbdriver' => 'mysqli',  // Harus mysqli, BUKAN mysql
    'dbprefix' => '',
    'pconnect' => FALSE,
    'db_debug' => (ENVIRONMENT !== 'production'),
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

### Performance Lambat Setelah Upgrade
**Solusi**:
1. Enable OPcache (lihat konfigurasi di atas)
2. Clear cache aplikasi:
```bash
rm -rf application/cache/*
```
3. Optimize autoloader di composer.json (sudah dilakukan)

### Session Tidak Berfungsi
**Solusi**:
1. Pastikan folder session writable:
```bash
sudo chmod -R 775 application/cache
sudo chown -R www-data:www-data application/cache  # Ubuntu/Debian
sudo chown -R apache:apache application/cache      # CentOS/RHEL
```

2. Periksa `application/config/config.php`:
```php
$config['sess_driver'] = 'files';
$config['sess_cookie_name'] = 'ci_session';
$config['sess_expiration'] = 7200;
$config['sess_save_path'] = APPPATH . 'cache';
```

---

## Fitur PHP 8.1 Yang Bisa Dimanfaatkan

### 1. Named Arguments
```php
// Sebelum
$this->db->where('status', 'active', TRUE);

// PHP 8.1
$this->db->where(column: 'status', value: 'active', escape: TRUE);
```

### 2. Nullsafe Operator
```php
// Sebelum
$email = isset($user) && isset($user->email) ? $user->email : null;

// PHP 8.1
$email = $user?->email;
```

### 3. Match Expression
```php
// Sebelum
switch ($status) {
    case 'pending':
        $label = 'warning';
        break;
    case 'approved':
        $label = 'success';
        break;
    default:
        $label = 'default';
}

// PHP 8.1
$label = match($status) {
    'pending' => 'warning',
    'approved' => 'success',
    default => 'default'
};
```

### 4. Readonly Properties (PHP 8.1+)
```php
class User {
    public readonly string $id;

    public function __construct(string $id) {
        $this->id = $id;
    }
}
```

---

## Performa Improvement di PHP 8.1

Dibandingkan dengan PHP 7.4:
- **25-30% lebih cepat** untuk operasi umum
- **Memory usage turun ~15%**
- **Startup time lebih cepat** dengan JIT compiler
- **OPcache lebih efisien**

---

## Checklist Post-Upgrade

- [ ] PHP versi 8.1.33 terinstall
- [ ] Semua extensions terinstall dan enabled
- [ ] Apache/Nginx restart sukses
- [ ] Halaman utama bisa diakses
- [ ] Login admin berfungsi
- [ ] Database connection OK
- [ ] Permohonan bisa dibuat
- [ ] Keberatan bisa diajukan
- [ ] Upload file berfungsi
- [ ] Session berfungsi
- [ ] Email notification berfungsi (jika ada)
- [ ] Error log tidak ada critical error
- [ ] Performance monitoring OK
- [ ] Backup restore tested

---

## Kontak & Dukungan

Jika menemukan masalah selama upgrade:

1. **Dokumentasi CodeIgniter**: https://codeigniter.com/userguide3/
2. **PHP 8.1 Migration Guide**: https://www.php.net/manual/en/migration81.php
3. **Forum**: http://forum.codeigniter.com/

---

## Changelog

### 2025-01-19
- Initial documentation untuk upgrade PHP 8.1.33
- Update composer.json requirements
- Tambah konfigurasi OPcache
- Tambah troubleshooting common issues

---

**PENTING**:
- Selalu test di development environment dulu sebelum production!
- Buat backup lengkap sebelum upgrade!
- Monitor error log selama 24-48 jam pertama setelah upgrade!
