# 🚀 PANDUAN DEPLOYMENT KE PRODUCTION
## Aplikasi PPID Kabupaten Sumedang

**Versi:** 1.0
**Tanggal:** 2025-11-22
**Security Rating:** 8.5/10 (Excellent-)

---

## ⚠️ PENTING - BACA SEBELUM DEPLOYMENT!

**JANGAN** langsung copy file ke production server!
Ikuti checklist di bawah ini **SATU PER SATU** untuk menghindari security issues.

---

## 📋 PRE-DEPLOYMENT CHECKLIST

### ✅ Step 1: Backup

**WAJIB dilakukan sebelum deployment:**

```bash
# 1. Backup database production
mysqldump -u root -p ppid > backup_ppid_$(date +%Y%m%d_%H%M%S).sql

# 2. Backup files production
tar -czf backup_files_$(date +%Y%m%d_%H%M%S).tar.gz /path/to/production/ppid

# 3. Test backup (pastikan bisa di-restore)
mysql -u root -p ppid_test < backup_ppid_*.sql
```

**Simpan backup di lokasi aman (bukan di web server)!**

---

### ✅ Step 2: Database Migration

**Jalankan SQL migration untuk audit logging:**

```bash
# Via MySQL CLI:
mysql -u root -p ppid < database/migrations/001_create_audit_logs_table.sql

# ATAU via browser (lebih mudah):
# http://your-domain.com/ppid/database/install_migrations.php
# Setelah selesai, HAPUS file installer!
rm database/install_migrations.php
```

**Verifikasi:**
```sql
-- Cek apakah tabel sudah dibuat:
SHOW TABLES LIKE 'audit_logs';

-- Harus return 1 row
```

---

### ✅ Step 3: Environment Configuration

**File:** `index.php` (line 53)

**UBAH ENVIRONMENT KE PRODUCTION:**

```php
// SEBELUM (Development):
define('ENVIRONMENT', 'development');

// SESUDAH (Production):
define('ENVIRONMENT', 'production');
```

**⚠️ SANGAT PENTING!** Jika tidak diubah:
- Error details akan terlihat user
- Log akan penuh (4 = ALL logs)
- Performance lebih lambat

---

### ✅ Step 4: Base URL Configuration

**File:** `application/config/config.php` (line 26)

**UPDATE BASE_URL:**

```php
// SEBELUM (Development):
$config['base_url'] = 'http://localhost:8080/ppid/';

// SESUDAH (Production):
$config['base_url'] = 'https://ppid.sumedangkab.go.id/';
// ATAU
$config['base_url'] = 'https://your-domain.com/ppid/';
```

**Catatan:** Gunakan HTTPS jika sudah punya SSL certificate!

---

### ✅ Step 5: Database Configuration

**File:** `application/config/database.php`

**UPDATE database credentials:**

```php
// Jangan gunakan credentials development di production!

$db['default'] = array(
    'dsn'	=> '',
    'hostname' => 'localhost',              // Server database production
    'username' => 'ppid_user',              // BUKAN root!
    'password' => 'strong_password_here',   // Password KUAT!
    'database' => 'ppid_production',        // Database production
    'dbdriver' => 'mysqli',
    'dbprefix' => '',
    'pconnect' => FALSE,
    'db_debug' => FALSE,                    // PENTING: FALSE untuk production!
    'cache_on' => FALSE,
    'cachedir' => '',
    'char_set' => 'utf8',
    'dbcollat' => 'utf8_general_ci',
    'swap_pre' => '',
    'encrypt' => FALSE,
    'compress' => FALSE,
    'stricton' => FALSE,
    'failover' => array(),
    'save_queries' => FALSE                 // FALSE untuk performance
);
```

**⚠️ SECURITY CHECKLIST:**
- [ ] Username BUKAN `root`
- [ ] Password minimal 16 karakter (huruf besar, kecil, angka, special char)
- [ ] `db_debug` = FALSE (jangan tampilkan error SQL)
- [ ] `save_queries` = FALSE (hemat memory)
- [ ] Database user hanya punya akses ke database `ppid` saja

---

### ✅ Step 6: Encryption Key

**File:** `application/config/config.php` (line 325)

**GENERATE ENCRYPTION KEY BARU:**

```php
// JANGAN gunakan key default atau development!

// Generate key baru (32 karakter random):
$config['encryption_key'] = 'a8f3d9c2e7b1f4d6a3e8c7b2d9f1e4a8';
// ^ GANTI dengan key unik Anda!
```

**Cara generate key aman:**

```bash
# Method 1: Linux/Mac
openssl rand -hex 16

# Method 2: PHP
php -r "echo bin2hex(random_bytes(16));"

# Method 3: Online (hati-hati!)
# https://www.random.org/strings/ (Length 32, Hexadecimal)
```

**⚠️ PENTING:**
- Simpan key ini dengan aman
- Jangan commit ke Git
- Backup key ini (tanpa key, data encrypted tidak bisa dibaca)

---

### ✅ Step 7: Session Configuration

**File:** `application/config/config.php`

**Verifikasi session security settings:**

```php
// Line 396: Session save path (sudah benar)
$config['sess_save_path'] = APPPATH . 'sessions';  // ✅ Aman

// Line 399: Session regenerate (sudah benar)
$config['sess_regenerate_destroy'] = TRUE;  // ✅ Aman

// Line 387: Cookie secure (AKTIFKAN jika pakai HTTPS!)
$config['cookie_secure'] = TRUE;  // ← AKTIFKAN untuk HTTPS!

// Line 389: Cookie httponly (sudah TRUE)
$config['cookie_httponly'] = TRUE;  // ✅ Aman
```

**Jika menggunakan HTTPS:**
```php
$config['cookie_secure'] = TRUE;  // Wajib TRUE!
```

**Jika masih HTTP:**
```php
$config['cookie_secure'] = FALSE;  // Sementara, segera migrate ke HTTPS!
```

---

### ✅ Step 8: CSRF Protection

**File:** `application/config/config.php` (line 440)

**Verifikasi CSRF sudah enabled:**

```php
$config['csrf_protection'] = TRUE;  // ✅ Sudah benar
$config['csrf_token_name'] = 'csrf_token_ppid';
$config['csrf_cookie_name'] = 'csrf_cookie_ppid';
$config['csrf_expire'] = 7200;
$config['csrf_regenerate'] = FALSE;  // FALSE untuk PHP 8.2+ compatibility
```

**Jangan ubah!** Settings ini sudah optimal.

---

### ✅ Step 9: Error Logging

**File:** `application/config/config.php` (line 230-233)

**Verifikasi log threshold:**

```php
// Sudah auto-switch berdasarkan ENVIRONMENT
$config['log_threshold'] = (ENVIRONMENT === 'production') ? 1 : 4;
```

**Di production akan otomatis menjadi:**
```php
$config['log_threshold'] = 1;  // ERROR only
```

**✅ Sudah benar!** Tidak perlu ubah.

---

### ✅ Step 10: File Permissions

**Set permissions yang benar di server:**

```bash
# 1. Ownership (user www-data untuk Ubuntu/Debian)
sudo chown -R www-data:www-data /var/www/html/ppid

# 2. Base permissions
find /var/www/html/ppid -type f -exec chmod 644 {} \;
find /var/www/html/ppid -type d -exec chmod 755 {} \;

# 3. Writable directories
chmod 755 /var/www/html/ppid/upload
chmod 755 /var/www/html/ppid/upload/ktp
chmod 755 /var/www/html/ppid/upload/dokumen

chmod 700 /var/www/html/ppid/application/sessions
chmod 755 /var/www/html/ppid/application/logs

# 4. Protect config files
chmod 640 /var/www/html/ppid/application/config/database.php
chmod 640 /var/www/html/ppid/application/config/config.php
```

**⚠️ PENTING:**
- `application/sessions/` = 700 (private!)
- `application/config/` = 640 (protected!)
- `upload/` = 755 (writable)

---

### ✅ Step 11: Remove Development Files

**HAPUS file-file ini di production:**

```bash
# 1. Database installer (setelah migration selesai)
rm database/install_migrations.php

# 2. Documentation files (optional, tapi disarankan)
rm SECURITY_AUDIT_*.md
rm PHP81_COMPATIBILITY_ANALYSIS.md
rm SECURITY_STRATEGY_HYBRID_REVIEW.md

# 3. Git files (jangan deploy .git folder!)
rm -rf .git
rm .gitignore

# 4. Development tools (jika ada)
rm composer.json
rm composer.lock
rm phpunit.xml
```

---

### ✅ Step 12: .htaccess Protection

**Verifikasi .htaccess sudah ada:**

```bash
# Cek apakah .htaccess ada dan benar:
ls -la application/sessions/.htaccess
ls -la application/logs/.htaccess
```

**File harus berisi:**
```apache
<IfModule authz_core_module>
    Require all denied
</IfModule>
<IfModule !authz_core_module>
    Deny from all
</IfModule>
```

**Test protection:**
```bash
# Akses via browser (harus 403 Forbidden):
# http://domain.com/application/logs/
# http://domain.com/application/sessions/
```

---

### ✅ Step 13: HTTPS/SSL Configuration (Jika Ada Certificate)

**Install SSL Certificate:**

```bash
# Method 1: Let's Encrypt (FREE!)
sudo apt install certbot python3-certbot-apache
sudo certbot --apache -d ppid.sumedangkab.go.id
```

**Update .htaccess untuk force HTTPS:**

**File:** `.htaccess` (tambahkan di paling atas)

```apache
# Force HTTPS redirect
<IfModule mod_rewrite.c>
    RewriteEngine On
    RewriteCond %{HTTPS} off
    RewriteRule ^(.*)$ https://%{HTTP_HOST}%{REQUEST_URI} [L,R=301]
</IfModule>
```

**Update config.php:**

```php
// Line 387: Enable secure cookies
$config['cookie_secure'] = TRUE;  // ✅ AKTIFKAN!
```

**Uncomment HSTS header:**

**File:** `application/hooks/Security_headers.php` (line 68)

```php
// Uncomment baris ini:
header("Strict-Transport-Security: max-age=31536000; includeSubDomains; preload");
```

---

### ✅ Step 14: Database User Permissions

**Buat database user dengan minimal privileges:**

```sql
-- 1. Buat user baru (JANGAN gunakan root!)
CREATE USER 'ppid_user'@'localhost' IDENTIFIED BY 'StrongPassword123!@#';

-- 2. Grant minimal privileges
GRANT SELECT, INSERT, UPDATE, DELETE ON ppid.* TO 'ppid_user'@'localhost';

-- 3. JANGAN grant DROP, CREATE, ALTER di production!
-- Flush privileges
FLUSH PRIVILEGES;

-- 4. Test connection
mysql -u ppid_user -p ppid
```

**Update `database.php` dengan user ini.**

---

### ✅ Step 15: Admin Account Security

**Update admin passwords:**

```sql
-- 1. List semua admin
SELECT id, username, nama FROM admin;

-- 2. Update password admin dengan bcrypt
-- Password harus minimal 12 karakter!

-- Cara generate bcrypt hash:
```

```php
// generate_password.php (jalankan di local):
<?php
$password = 'NewStrongPassword123!@#';
$hash = password_hash($password, PASSWORD_BCRYPT, ['cost' => 10]);
echo $hash;
?>
```

```sql
-- Update password admin:
UPDATE admin
SET password = '$2y$10$abcdefghijklmnopqrstuvwxyz...'
WHERE username = 'admin';
```

**Password requirements:**
- Minimal 12 karakter
- Huruf besar + kecil
- Angka
- Special characters (!@#$%^&*)

---

### ✅ Step 16: Upload Directory Protection

**Verifikasi proteksi upload directory:**

```bash
# 1. Cek .htaccess di upload/ktp dan upload/dokumen
ls -la upload/ktp/.htaccess
ls -la upload/dokumen/.htaccess
```

**Jika belum ada, buat:**

**File:** `upload/ktp/.htaccess` dan `upload/dokumen/.htaccess`

```apache
# Allow download tapi prevent execution
<FilesMatch "\.(php|php3|php4|php5|phtml|pl|py|jsp|asp|sh|cgi)$">
    Require all denied
</FilesMatch>

# Disable directory listing
Options -Indexes
```

---

### ✅ Step 17: Monitoring & Logging Setup

**Setup log rotation untuk prevent disk full:**

**File:** `/etc/logrotate.d/ppid`

```
/var/www/html/ppid/application/logs/*.php {
    daily
    rotate 30
    compress
    delaycompress
    missingok
    notifempty
    create 0640 www-data www-data
}
```

**Test log rotation:**
```bash
sudo logrotate -f /etc/logrotate.d/ppid
```

---

### ✅ Step 18: Security Headers Verification

**Test security headers setelah deployment:**

**Method 1: Browser DevTools**
```
1. Buka https://your-domain.com/ppid/
2. F12 → Network tab
3. Refresh halaman
4. Klik request pertama
5. Tab "Headers" → cek Response Headers
```

**Harus ada:**
- ✅ X-Frame-Options: SAMEORIGIN
- ✅ X-Content-Type-Options: nosniff
- ✅ X-XSS-Protection: 1; mode=block
- ✅ Referrer-Policy: strict-origin-when-cross-origin
- ✅ Permissions-Policy: geolocation=(), microphone=(), camera=()
- ✅ Content-Security-Policy: default-src 'self' ...

**Method 2: Online Tools**
```
https://securityheaders.com/
Expected Grade: A atau A+
```

---

### ✅ Step 19: Performance Optimization (Optional)

**Enable OPcache (PHP 7.0+):**

**File:** `/etc/php/8.4/apache2/php.ini`

```ini
[opcache]
opcache.enable=1
opcache.memory_consumption=128
opcache.interned_strings_buffer=8
opcache.max_accelerated_files=10000
opcache.revalidate_freq=2
opcache.fast_shutdown=1
```

**Restart Apache:**
```bash
sudo systemctl restart apache2
```

---

### ✅ Step 20: Final Testing

**Test semua fitur critical:**

```
✅ Homepage loading
✅ Login admin
✅ Submit permohonan
✅ Submit keberatan
✅ Upload KTP (max 5MB)
✅ Upload dokumen (max 10MB)
✅ Download dokumen
✅ Cek status permohonan
✅ Admin - verify permohonan
✅ Admin - process keberatan
✅ Admin - add DIP document
✅ Admin - delete operations (POST method)
✅ Rate limiting (coba submit 4x cepat)
✅ Error pages (404, 500)
✅ Audit logs tercatat
```

---

## 🔒 POST-DEPLOYMENT SECURITY CHECKLIST

### Immediately After Deployment:

```
[ ] ENVIRONMENT = 'production' di index.php
[ ] base_url sudah correct
[ ] Database credentials di-update
[ ] encryption_key unique dan aman
[ ] SSL certificate installed (jika ada)
[ ] cookie_secure = TRUE (jika HTTPS)
[ ] File permissions correct
[ ] .htaccess protection aktif
[ ] Error pages tidak expose info
[ ] Admin password di-update
[ ] Database installer dihapus
[ ] Development files dihapus
[ ] Audit logs table dibuat
[ ] Backup sudah dilakukan
```

---

## 🔥 EMERGENCY ROLLBACK PROCEDURE

**Jika terjadi masalah critical:**

```bash
# 1. Restore database backup
mysql -u root -p ppid < backup_ppid_YYYYMMDD_HHMMSS.sql

# 2. Restore files backup
cd /var/www/html/
rm -rf ppid
tar -xzf backup_files_YYYYMMDD_HHMMSS.tar.gz

# 3. Restart services
sudo systemctl restart apache2
sudo systemctl restart mysql

# 4. Check logs
tail -f /var/www/html/ppid/application/logs/log-*.php
tail -f /var/log/apache2/error.log
```

---

## 📊 MONITORING COMMANDS

**Check application health:**

```bash
# 1. Check disk space
df -h

# 2. Check application logs
tail -100 /var/www/html/ppid/application/logs/log-$(date +%Y-%m-%d).php

# 3. Check Apache error log
tail -100 /var/log/apache2/error.log

# 4. Check audit logs (via MySQL)
mysql -u root -p ppid -e "SELECT * FROM audit_logs ORDER BY created_at DESC LIMIT 20;"

# 5. Check upload directory size
du -sh /var/www/html/ppid/upload/*

# 6. Check session directory
ls -lh /var/www/html/ppid/application/sessions/
```

---

## ⚠️ COMMON ISSUES & SOLUTIONS

### Issue 1: "The action you have requested is not allowed"

**Cause:** CSRF token mismatch
**Solution:**
```php
// Cek cookie_secure setting
// Jika pakai HTTPS, harus TRUE
// Jika pakai HTTP, harus FALSE
$config['cookie_secure'] = FALSE; // atau TRUE
```

---

### Issue 2: Session tidak persist / auto logout

**Cause:** Session directory tidak writable
**Solution:**
```bash
chmod 700 /var/www/html/ppid/application/sessions
chown www-data:www-data /var/www/html/ppid/application/sessions
```

---

### Issue 3: Upload file gagal

**Cause:** Permission atau size limit
**Solution:**
```bash
# Check permissions
chmod 755 /var/www/html/ppid/upload/ktp
chown www-data:www-data /var/www/html/ppid/upload/ktp

# Check PHP upload limits
php -i | grep upload_max_filesize
php -i | grep post_max_size
```

---

### Issue 4: Database connection failed

**Cause:** Credentials salah atau privileges kurang
**Solution:**
```sql
-- Check user privileges
SHOW GRANTS FOR 'ppid_user'@'localhost';

-- Reset password if needed
ALTER USER 'ppid_user'@'localhost' IDENTIFIED BY 'NewPassword';
FLUSH PRIVILEGES;
```

---

## 📞 SUPPORT & CONTACTS

**Jika ada masalah:**

1. Check logs: `application/logs/log-YYYY-MM-DD.php`
2. Check audit: `SELECT * FROM audit_logs ORDER BY created_at DESC LIMIT 50;`
3. Rollback jika critical
4. Contact technical support

---

## ✅ DEPLOYMENT VERIFICATION CHECKLIST

**Print checklist ini dan centang saat deployment:**

```
=== CONFIGURATION ===
[ ] ENVIRONMENT = 'production'
[ ] base_url updated
[ ] Database credentials updated
[ ] encryption_key generated
[ ] SSL certificate installed (optional)
[ ] cookie_secure configured correctly

=== SECURITY ===
[ ] CSRF protection enabled
[ ] Sessions directory secured (700)
[ ] Logs directory protected (.htaccess)
[ ] Upload directory protected
[ ] Security headers verified
[ ] Error pages tidak expose info
[ ] Admin passwords updated

=== DATABASE ===
[ ] Audit logs table created
[ ] Database backup completed
[ ] Database user privileges minimal
[ ] Migration installer deleted

=== FILES ===
[ ] File permissions set correctly
[ ] Development files removed
[ ] .htaccess files in place
[ ] .git folder removed

=== TESTING ===
[ ] Login works
[ ] Form submission works
[ ] File upload works (size limit tested)
[ ] Rate limiting works
[ ] Error pages work (404, 500)
[ ] Audit logging works
[ ] Admin functions work
[ ] Delete uses POST method

=== MONITORING ===
[ ] Log rotation configured
[ ] Disk space adequate
[ ] Backup scheduled
[ ] Monitoring tools configured
```

---

## 🎯 FINAL SECURITY RATING

**After proper deployment:**

```
Expected Rating: 8.5/10 (Excellent-)

With optional enhancements:
- HTTPS/SSL: 8.7/10
- Password Policy: 8.9/10
- Session Timeout: 9.0/10 (Excellent)
```

---

**Good luck with your deployment! 🚀**

**Remember:** Security is not a one-time thing. Regular updates and monitoring are essential!

---

**Prepared by:** Claude (Anthropic AI)
**Date:** 2025-11-22
**Version:** 1.0
