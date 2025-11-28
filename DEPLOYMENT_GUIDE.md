# 🚀 Panduan Deployment PPID Kabupaten Sumedang

**Last Updated:** 2025-11-26
**Version:** 1.0
**Target:** Production Server (Linux/Ubuntu/CentOS)

---

## 📋 **Daftar Isi**

1. [Prerequisites](#prerequisites)
2. [Server Requirements](#server-requirements)
3. [Persiapan File](#persiapan-file)
4. [Upload ke Server](#upload-ke-server)
5. [Konfigurasi Server](#konfigurasi-server)
6. [Konfigurasi Aplikasi](#konfigurasi-aplikasi)
7. [Database Setup](#database-setup)
8. [File Permissions](#file-permissions)
9. [SSL Certificate](#ssl-certificate)
10. [Security Checklist](#security-checklist)
11. [Testing](#testing)
12. [Troubleshooting](#troubleshooting)
13. [Maintenance](#maintenance)

---

## 1. Prerequisites

### Yang Harus Anda Siapkan:

- ✅ Akses ke server (SSH/FTP/cPanel)
- ✅ Domain/subdomain (contoh: ppid.sumedangkab.go.id)
- ✅ Database MySQL/MariaDB (username, password, database name)
- ✅ Backup file project lengkap
- ✅ Software FTP Client (FileZilla, WinSCP) atau Git
- ✅ Text editor (Notepad++, VS Code)

---

## 2. Server Requirements

### Minimum Server Specifications:

```
Operating System : Linux (Ubuntu 20.04+ / CentOS 7+)
Web Server       : Apache 2.4+ atau Nginx 1.18+
PHP Version      : PHP 7.4+ (Recommended: PHP 8.0+)
Database         : MySQL 5.7+ atau MariaDB 10.3+
RAM              : Minimum 2GB (Recommended: 4GB+)
Storage          : Minimum 10GB free space
```

### Required PHP Extensions:

```bash
php-cli
php-common
php-curl
php-gd
php-json
php-mbstring
php-mysql (atau php-mysqli)
php-xml
php-zip
php-intl
php-fileinfo
```

### Apache Modules Required:

```bash
mod_rewrite  (IMPORTANT!)
mod_headers
mod_ssl
```

---

## 3. Persiapan File

### A. Backup & Clean Up

```bash
# 1. Buat backup lengkap
cd /path/to/local/ppid
tar -czf ppid-backup-$(date +%Y%m%d).tar.gz .

# 2. Remove development files (jangan di-upload)
rm -rf .git/
rm -rf node_modules/
rm -f .env.example
rm -f composer.lock
rm -f package-lock.json
```

### B. Files yang HARUS ada:

```
ppid/
├── application/
├── system/
├── inverse/
├── newestassets/
├── upload/
├── .htaccess          ← PENTING!
├── index.php
└── README.md (optional)
```

### C. Create .env File (Recommended)

Buat file `.env` untuk environment variables:

```bash
# .env
DB_HOST=localhost
DB_NAME=ppid_database
DB_USER=ppid_user
DB_PASS=your_secure_password

# API Keys
NEWS_API_URL=https://sumedangkab.go.id/api/news
NEWS_API_KEY=Sumedang#3211

# Environment
CI_ENVIRONMENT=production
```

---

## 4. Upload ke Server

### Option A: Via FTP/SFTP (FileZilla)

```
1. Buka FileZilla
2. Connect ke server:
   Host: ftp.yourdomain.com atau IP server
   Username: your_ftp_username
   Password: your_ftp_password
   Port: 21 (FTP) atau 22 (SFTP)

3. Upload semua file ke:
   /home/username/public_html/
   atau
   /var/www/html/ppid/

4. Pastikan struktur folder tetap sama!
```

### Option B: Via Git (Recommended)

```bash
# Di server, clone repository
cd /var/www/html/
git clone https://github.com/yourusername/ppid.git
cd ppid

# Checkout ke branch production
git checkout main

# Set permissions
sudo chown -R www-data:www-data .
```

### Option C: Via SCP (Linux/Mac)

```bash
# From local machine
scp -r ppid/ username@server_ip:/var/www/html/

# Atau dengan rsync (lebih baik)
rsync -avz --progress ppid/ username@server_ip:/var/www/html/ppid/
```

---

## 5. Konfigurasi Server

### A. Apache Configuration

#### 1. Create Virtual Host

```bash
sudo nano /etc/apache2/sites-available/ppid.conf
```

```apache
<VirtualHost *:80>
    ServerName ppid.sumedangkab.go.id
    ServerAlias www.ppid.sumedangkab.go.id

    DocumentRoot /var/www/html/ppid

    <Directory /var/www/html/ppid>
        Options -Indexes +FollowSymLinks
        AllowOverride All
        Require all granted
    </Directory>

    # Logging
    ErrorLog ${APACHE_LOG_DIR}/ppid-error.log
    CustomLog ${APACHE_LOG_DIR}/ppid-access.log combined

    # Security Headers
    Header always set X-Frame-Options "SAMEORIGIN"
    Header always set X-Content-Type-Options "nosniff"
    Header always set X-XSS-Protection "1; mode=block"
    Header always set Referrer-Policy "strict-origin-when-cross-origin"
</VirtualHost>
```

#### 2. Enable Site & Modules

```bash
# Enable required modules
sudo a2enmod rewrite
sudo a2enmod headers
sudo a2enmod ssl

# Enable site
sudo a2ensite ppid.conf

# Test configuration
sudo apache2ctl configtest

# Restart Apache
sudo systemctl restart apache2
```

### B. Nginx Configuration (Alternative)

```nginx
server {
    listen 80;
    server_name ppid.sumedangkab.go.id www.ppid.sumedangkab.go.id;

    root /var/www/html/ppid;
    index index.php index.html;

    # Logs
    access_log /var/log/nginx/ppid-access.log;
    error_log /var/log/nginx/ppid-error.log;

    # Security Headers
    add_header X-Frame-Options "SAMEORIGIN" always;
    add_header X-Content-Type-Options "nosniff" always;
    add_header X-XSS-Protection "1; mode=block" always;

    location / {
        try_files $uri $uri/ /index.php?$query_string;
    }

    location ~ \.php$ {
        fastcgi_pass unix:/var/run/php/php8.0-fpm.sock;
        fastcgi_index index.php;
        fastcgi_param SCRIPT_FILENAME $document_root$fastcgi_script_name;
        include fastcgi_params;
    }

    # Deny access to sensitive files
    location ~ /\. {
        deny all;
    }

    location ~ ^/(application|system)/ {
        deny all;
    }
}
```

---

## 6. Konfigurasi Aplikasi

### A. Database Configuration

Edit: `application/config/database.php`

```php
$db['default'] = array(
    'dsn'      => '',
    'hostname' => 'localhost',              // atau IP database server
    'username' => 'ppid_user',              // ← GANTI
    'password' => 'your_secure_password',   // ← GANTI
    'database' => 'ppid_production',        // ← GANTI
    'dbdriver' => 'mysqli',
    'dbprefix' => '',
    'pconnect' => FALSE,
    'db_debug' => FALSE,                    // ← SET FALSE di production!
    'cache_on' => FALSE,
    'cachedir' => '',
    'char_set' => 'utf8mb4',
    'dbcollat' => 'utf8mb4_unicode_ci',
    'swap_pre' => '',
    'encrypt'  => FALSE,
    'compress' => FALSE,
    'stricton' => FALSE,
    'failover' => array(),
    'save_queries' => FALSE
);

// HAPUS konfigurasi db2 atau database lain yang tidak dipakai!
```

### B. Base URL Configuration

Edit: `application/config/config.php`

```php
// Line 26
$config['base_url'] = 'https://ppid.sumedangkab.go.id/';  // ← GANTI dengan domain production!

// Line 69 - Set environment to PRODUCTION
// Edit di index.php:
define('ENVIRONMENT', 'production');  // bukan 'development'!

// Line 331 - Encryption Key (PENTING!)
$config['encryption_key'] = 'your-32-character-encryption-key-here';  // ← GENERATE KEY BARU!

// Line 449 - XSS Filtering
$config['global_xss_filtering'] = TRUE;  // ← Enable untuk security

// Line 456 - CSRF Protection
$config['csrf_protection'] = TRUE;  // ← Enable jika sudah fix compatibility issue
$config['csrf_token_name'] = 'ppid_csrf_token';
$config['csrf_cookie_name'] = 'ppid_csrf_cookie';
$config['csrf_expire'] = 7200;

// Line 381 - Cookie settings
$config['cookie_secure'] = TRUE;    // ← Jika sudah pakai HTTPS
$config['cookie_httponly'] = TRUE;
```

### C. Generate Encryption Key

```bash
# Generate random 32-character key
php -r "echo bin2hex(random_bytes(16));"
```

Atau online: https://randomkeygen.com/

### D. .htaccess Configuration

Pastikan file `.htaccess` ada di root folder:

```apache
# .htaccess
RewriteEngine On

# HTTPS Redirect (UNCOMMENT setelah SSL aktif)
RewriteCond %{HTTPS} off
RewriteRule ^(.*)$ https://%{HTTP_HOST}%{REQUEST_URI} [L,R=301]

# Remove index.php from URL
RewriteCond %{REQUEST_FILENAME} !-f
RewriteCond %{REQUEST_FILENAME} !-d
RewriteRule ^(.*)$ index.php/$1 [L]

# Security Headers
<IfModule mod_headers.c>
    Header set X-Frame-Options "SAMEORIGIN"
    Header set X-Content-Type-Options "nosniff"
    Header set X-XSS-Protection "1; mode=block"
    Header set Referrer-Policy "strict-origin-when-cross-origin"
</IfModule>

# Protect sensitive directories
<IfModule mod_rewrite.c>
    RewriteRule ^(application|system|upload) - [F,L]
</IfModule>

# Prevent directory browsing
Options -Indexes

# Disable server signature
ServerSignature Off
```

---

## 7. Database Setup

### A. Create Database

```sql
-- Login to MySQL
mysql -u root -p

-- Create database
CREATE DATABASE ppid_production CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;

-- Create user
CREATE USER 'ppid_user'@'localhost' IDENTIFIED BY 'your_secure_password';

-- Grant privileges
GRANT ALL PRIVILEGES ON ppid_production.* TO 'ppid_user'@'localhost';
FLUSH PRIVILEGES;

-- Exit
EXIT;
```

### B. Import Database

```bash
# Import SQL dump
mysql -u ppid_user -p ppid_production < database_backup.sql

# Atau via phpMyAdmin:
# 1. Login ke phpMyAdmin
# 2. Pilih database ppid_production
# 3. Tab "Import"
# 4. Upload file SQL
# 5. Click "Go"
```

### C. Verify Tables

```sql
-- Login
mysql -u ppid_user -p ppid_production

-- Show tables
SHOW TABLES;

-- Check important tables
SELECT COUNT(*) FROM permohonan;
SELECT COUNT(*) FROM keberatan;
SELECT COUNT(*) FROM dokumen;

-- Exit
EXIT;
```

---

## 8. File Permissions

### Set Correct Permissions

```bash
# Navigate to project directory
cd /var/www/html/ppid

# Set ownership to web server user
sudo chown -R www-data:www-data .

# Set directory permissions
sudo find . -type d -exec chmod 755 {} \;

# Set file permissions
sudo find . -type f -exec chmod 644 {} \;

# Make writable directories
sudo chmod -R 775 application/logs/
sudo chmod -R 775 application/cache/
sudo chmod -R 775 application/sessions/
sudo chmod -R 775 upload/

# Protect sensitive files
sudo chmod 640 application/config/database.php
sudo chmod 640 application/config/config.php
```

### Create .htaccess for upload folder

```bash
# Protect upload directory
sudo nano upload/.htaccess
```

```apache
# upload/.htaccess
# Prevent PHP execution in upload directory
<FilesMatch "\.php$">
    Order allow,deny
    Deny from all
</FilesMatch>

# Allow only specific file types
<FilesMatch "\.(jpg|jpeg|png|gif|pdf|doc|docx|xls|xlsx)$">
    Order allow,deny
    Allow from all
</FilesMatch>
```

---

## 9. SSL Certificate

### Option A: Let's Encrypt (FREE - Recommended)

```bash
# Install Certbot
sudo apt update
sudo apt install certbot python3-certbot-apache

# Generate SSL Certificate
sudo certbot --apache -d ppid.sumedangkab.go.id -d www.ppid.sumedangkab.go.id

# Follow prompts:
# - Enter email address
# - Agree to terms
# - Choose to redirect HTTP to HTTPS (Yes)

# Test auto-renewal
sudo certbot renew --dry-run

# Certificates will auto-renew every 90 days
```

### Option B: Manual SSL Certificate

Jika Anda sudah punya SSL certificate (.crt, .key, .ca-bundle):

```bash
# Copy certificate files
sudo cp certificate.crt /etc/ssl/certs/ppid.crt
sudo cp private.key /etc/ssl/private/ppid.key
sudo cp ca-bundle.crt /etc/ssl/certs/ppid-ca.crt

# Edit Apache SSL config
sudo nano /etc/apache2/sites-available/ppid-ssl.conf
```

```apache
<VirtualHost *:443>
    ServerName ppid.sumedangkab.go.id

    DocumentRoot /var/www/html/ppid

    SSLEngine on
    SSLCertificateFile /etc/ssl/certs/ppid.crt
    SSLCertificateKeyFile /etc/ssl/private/ppid.key
    SSLCertificateChainFile /etc/ssl/certs/ppid-ca.crt

    # ... rest of config same as HTTP
</VirtualHost>
```

```bash
# Enable SSL site
sudo a2ensite ppid-ssl.conf
sudo systemctl reload apache2
```

---

## 10. Security Checklist

### Before Going Live:

- [ ] **Set ENVIRONMENT to 'production'** in `index.php`
- [ ] **Disable error display** (`display_errors = Off` in php.ini)
- [ ] **Set db_debug to FALSE** in `database.php`
- [ ] **Enable HTTPS** redirect in `.htaccess`
- [ ] **Generate new encryption key** in `config.php`
- [ ] **Remove default database credentials** from code
- [ ] **Delete .git folder** (if deployed via git)
- [ ] **Remove unnecessary files** (README, docs, test files)
- [ ] **Set correct file permissions** (755 for dirs, 644 for files)
- [ ] **Protect upload directories** with .htaccess
- [ ] **Enable CSRF protection** in `config.php`
- [ ] **Enable XSS filtering** in `config.php`
- [ ] **Verify SSL certificate** is valid
- [ ] **Test all forms** for CSRF tokens
- [ ] **Review Security Audit Report** (`SECURITY_AUDIT_REPORT.md`)
- [ ] **Change default admin passwords**
- [ ] **Setup regular backups** (database & files)
- [ ] **Configure firewall** (allow only 80, 443, 22)
- [ ] **Disable directory listing** (Options -Indexes)
- [ ] **Hide PHP version** (expose_php = Off)
- [ ] **Limit upload file size** (upload_max_filesize, post_max_size)

### Additional Security Measures:

```bash
# 1. Disable dangerous PHP functions
# Edit /etc/php/8.0/apache2/php.ini
disable_functions = exec,passthru,shell_exec,system,proc_open,popen

# 2. Limit PHP memory
memory_limit = 256M
post_max_size = 20M
upload_max_filesize = 10M

# 3. Enable ModSecurity (Web Application Firewall)
sudo apt install libapache2-mod-security2
sudo systemctl restart apache2

# 4. Install fail2ban (Brute-force protection)
sudo apt install fail2ban
sudo systemctl enable fail2ban
sudo systemctl start fail2ban
```

---

## 11. Testing

### A. Basic Functionality Test

```
✅ Homepage loads correctly
✅ Navigation menu works
✅ All submenu links work (Profil, Pengumuman, dll)
✅ Forms submit correctly:
   - Permohonan Informasi
   - Keberatan
   - Cek Status
✅ File uploads work
✅ Database queries execute
✅ Session management works
✅ Login/logout for admin works
```

### B. URL Testing

Test these URLs:

```
https://ppid.sumedangkab.go.id/
https://ppid.sumedangkab.go.id/profil/pejabat
https://ppid.sumedangkab.go.id/profil/tentang
https://ppid.sumedangkab.go.id/lhkpn
https://ppid.sumedangkab.go.id/barjas
https://ppid.sumedangkab.go.id/berita
https://ppid.sumedangkab.go.id/publicpermohonan
https://ppid.sumedangkab.go.id/admin (login page)
```

### C. Performance Testing

```bash
# Test page load speed
curl -w "@curl-format.txt" -o /dev/null -s https://ppid.sumedangkab.go.id/

# Check SSL certificate
openssl s_client -connect ppid.sumedangkab.go.id:443 -servername ppid.sumedangkab.go.id

# Test with tools:
# - Google PageSpeed Insights
# - GTmetrix
# - Pingdom
```

### D. Security Testing

```bash
# Check SSL rating
# Visit: https://www.ssllabs.com/ssltest/

# Check security headers
# Visit: https://securityheaders.com/

# Scan for vulnerabilities
# Visit: https://observatory.mozilla.org/
```

---

## 12. Troubleshooting

### Problem: White Screen / 500 Error

**Solution:**
```bash
# Check PHP error log
sudo tail -f /var/log/apache2/ppid-error.log

# Enable error display temporarily
# Edit index.php:
ini_set('display_errors', 1);
error_reporting(E_ALL);

# Common causes:
# - Wrong file permissions
# - Missing .htaccess
# - PHP version incompatibility
# - Syntax errors in config files
```

### Problem: 404 on all pages except homepage

**Solution:**
```bash
# mod_rewrite not enabled
sudo a2enmod rewrite
sudo systemctl restart apache2

# .htaccess not working
# Check Apache config: AllowOverride All
sudo nano /etc/apache2/sites-available/ppid.conf

# Verify .htaccess exists
ls -la /var/www/html/ppid/.htaccess
```

### Problem: Database connection failed

**Solution:**
```php
// Verify credentials in database.php
// Test connection manually:
mysql -u ppid_user -p -h localhost ppid_production

// Check if user has access:
SHOW GRANTS FOR 'ppid_user'@'localhost';

// Common issues:
// - Wrong password
// - User doesn't have privileges
// - Database doesn't exist
// - Firewall blocking MySQL port
```

### Problem: Upload folder not writable

**Solution:**
```bash
# Fix permissions
sudo chmod -R 775 upload/
sudo chown -R www-data:www-data upload/

# Check SELinux (if CentOS/RHEL)
sudo chcon -R -t httpd_sys_rw_content_t upload/
```

### Problem: Session errors

**Solution:**
```bash
# Create sessions directory
mkdir -p application/sessions

# Set permissions
sudo chmod 775 application/sessions/
sudo chown www-data:www-data application/sessions/

# Verify session path in config.php
$config['sess_save_path'] = APPPATH . 'sessions/';
```

### Problem: Berita API not working

**Solution:**
```bash
# Test API manually
curl -H "X-API-KEY: Sumedang#3211" https://sumedangkab.go.id/api/news

# Check if curl is installed
php -m | grep curl

# Check firewall/outbound connections
# Contact server admin if API calls are blocked
```

---

## 13. Maintenance

### A. Regular Backups

#### Database Backup (Daily)

```bash
#!/bin/bash
# /root/scripts/backup-db.sh

DATE=$(date +%Y%m%d)
BACKUP_DIR="/backup/ppid/database"
DB_NAME="ppid_production"
DB_USER="ppid_user"
DB_PASS="your_password"

# Create backup directory
mkdir -p $BACKUP_DIR

# Backup database
mysqldump -u$DB_USER -p$DB_PASS $DB_NAME | gzip > $BACKUP_DIR/ppid-db-$DATE.sql.gz

# Delete backups older than 30 days
find $BACKUP_DIR -name "ppid-db-*.sql.gz" -mtime +30 -delete

echo "Database backup completed: ppid-db-$DATE.sql.gz"
```

#### File Backup (Weekly)

```bash
#!/bin/bash
# /root/scripts/backup-files.sh

DATE=$(date +%Y%m%d)
BACKUP_DIR="/backup/ppid/files"
SOURCE_DIR="/var/www/html/ppid"

# Create backup directory
mkdir -p $BACKUP_DIR

# Backup files (exclude cache)
tar -czf $BACKUP_DIR/ppid-files-$DATE.tar.gz \
    --exclude='application/cache/*' \
    --exclude='application/logs/*' \
    -C /var/www/html ppid/

# Delete backups older than 60 days
find $BACKUP_DIR -name "ppid-files-*.tar.gz" -mtime +60 -delete

echo "File backup completed: ppid-files-$DATE.tar.gz"
```

#### Setup Cron Jobs

```bash
# Edit crontab
sudo crontab -e

# Add these lines:

# Database backup daily at 2 AM
0 2 * * * /root/scripts/backup-db.sh >> /var/log/ppid-backup-db.log 2>&1

# File backup weekly on Sunday at 3 AM
0 3 * * 0 /root/scripts/backup-files.sh >> /var/log/ppid-backup-files.log 2>&1

# Clear cache daily at 4 AM
0 4 * * * rm -rf /var/www/html/ppid/application/cache/* >> /var/log/ppid-cache-clear.log 2>&1

# Clear old logs (older than 30 days)
0 5 * * * find /var/www/html/ppid/application/logs/ -name "*.php" -mtime +30 -delete
```

### B. Monitoring

#### Setup Log Rotation

```bash
# Create logrotate config
sudo nano /etc/logrotate.d/ppid
```

```
/var/log/apache2/ppid-*.log {
    daily
    missingok
    rotate 30
    compress
    delaycompress
    notifempty
    create 640 root adm
    sharedscripts
    postrotate
        systemctl reload apache2 > /dev/null
    endscript
}
```

#### Monitor Disk Space

```bash
# Check disk usage
df -h

# Check largest files in upload directory
du -h --max-depth=1 upload/ | sort -hr

# Setup disk space monitoring alert
# Add to crontab:
0 6 * * * /root/scripts/check-disk-space.sh
```

### C. Updates

```bash
# Update PHP packages
sudo apt update
sudo apt upgrade php*

# Update CodeIgniter (if needed)
# 1. Backup current system folder
# 2. Download latest CI 3.x
# 3. Replace system folder
# 4. Test thoroughly

# Update Dependencies
# - Check for security updates regularly
# - Review SECURITY_AUDIT_REPORT.md
# - Update jQuery, Bootstrap, etc. as needed
```

### D. Performance Optimization

```bash
# Enable PHP OPcache
sudo nano /etc/php/8.0/apache2/php.ini

# Add:
opcache.enable=1
opcache.memory_consumption=256
opcache.max_accelerated_files=10000
opcache.validate_timestamps=0

# Enable Apache compression
sudo a2enmod deflate
sudo systemctl restart apache2

# Enable browser caching
# Add to .htaccess:
<IfModule mod_expires.c>
    ExpiresActive On
    ExpiresByType image/jpg "access plus 1 year"
    ExpiresByType image/jpeg "access plus 1 year"
    ExpiresByType image/gif "access plus 1 year"
    ExpiresByType image/png "access plus 1 year"
    ExpiresByType text/css "access plus 1 month"
    ExpiresByType application/javascript "access plus 1 month"
</IfModule>
```

---

## 📞 Support & Contact

### Jika Mengalami Masalah:

1. **Check Logs:**
   - Apache: `/var/log/apache2/ppid-error.log`
   - PHP: `/var/log/php/error.log`
   - Application: `application/logs/log-YYYY-MM-DD.php`

2. **Review Documentation:**
   - `SECURITY_AUDIT_REPORT.md`
   - `LIBRARY_UPDATE_GUIDE.md`
   - `PROJECT_CONTEXT.md`

3. **Common Resources:**
   - CodeIgniter Docs: https://codeigniter.com/userguide3/
   - Stack Overflow: https://stackoverflow.com/questions/tagged/codeigniter
   - PHP Manual: https://www.php.net/manual/

---

## ✅ Post-Deployment Checklist

Setelah deployment selesai, pastikan:

- [ ] Website dapat diakses via HTTPS
- [ ] SSL certificate valid dan secure
- [ ] Semua halaman load dengan baik
- [ ] Database connection berfungsi
- [ ] Upload file berfungsi
- [ ] Form submission berfungsi
- [ ] Admin panel dapat diakses
- [ ] Email notifications berfungsi (jika ada)
- [ ] Backup script berjalan
- [ ] Monitoring aktif
- [ ] Error logging berfungsi
- [ ] Security headers terpasang
- [ ] Performance acceptable (< 3s load time)

---

## 🎉 Deployment Complete!

Selamat! Aplikasi PPID Kabupaten Sumedang sekarang sudah live di production server.

**Next Steps:**
1. Monitor error logs selama 24-48 jam pertama
2. Test semua fitur secara menyeluruh
3. Setup monitoring dan alerting
4. Dokumentasikan access credentials secara aman
5. Train staff untuk menggunakan sistem

**Good Luck!** 🚀

---

**Document Version:** 1.0
**Last Updated:** 2025-11-26
**Maintained by:** IT Team PPID Kabupaten Sumedang
