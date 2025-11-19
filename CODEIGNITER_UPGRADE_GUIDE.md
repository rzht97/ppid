# Panduan Upgrade CodeIgniter 3.1.10 → 3.1.13

## Mengapa Upgrade ke 3.1.13?

CodeIgniter 3.1.13 adalah versi **terbaru dan paling stabil** dari CI3 dengan:
- ✅ **Full support PHP 8.0, 8.1, 8.2**
- ✅ **Bug fixes** dari versi sebelumnya
- ✅ **Security patches** terbaru
- ✅ **Backward compatible** dengan 3.1.10
- ✅ **Zero breaking changes** untuk aplikasi Anda

---

## Quick Upgrade (15 Menit)

### Metode 1: Manual Download & Replace (RECOMMENDED untuk XAMPP)

#### Step 1: Backup System Folder

**PENTING: BACKUP DULU!**

```batch
:: Windows (Command Prompt)
cd C:\xampp81\htdocs\ppidC
xcopy /E /I system system_backup_3.1.10
```

Atau manual:
1. Copy folder `C:\xampp81\htdocs\ppidC\system`
2. Paste dengan nama `system_backup_3.1.10`

#### Step 2: Download CodeIgniter 3.1.13

**Download dari:**
```
https://github.com/bcit-ci/CodeIgniter/archive/3.1.13.zip
```

Atau gunakan link direct:
```
https://github.com/bcit-ci/CodeIgniter/archive/refs/tags/3.1.13.zip
```

#### Step 3: Extract & Replace

1. **Extract** file `CodeIgniter-3.1.13.zip`
2. **Buka folder** `CodeIgniter-3.1.13`
3. **Copy folder `system`** dari hasil extract
4. **Replace** folder `system` di `C:\xampp81\htdocs\ppidC\system`

**Konfirmasi**: Klik "Yes" untuk replace all files

#### Step 4: Verifikasi Upgrade

Buat file `version_check.php` di root:
```php
<?php
define('BASEPATH', TRUE);
require_once 'system/core/CodeIgniter.php';

echo "CodeIgniter Version: " . CI_VERSION;
// Expected: 3.1.13
?>
```

Akses: `http://localhost:8080/ppidC/version_check.php`

**Expected Output**: `CodeIgniter Version: 3.1.13`

**HAPUS file ini setelah verifikasi!**

#### Step 5: Test Aplikasi

Test semua fitur utama:
- [ ] Homepage: `http://localhost:8080/ppidC/`
- [ ] Login Admin: `http://localhost:8080/ppidC/index.php/login`
- [ ] Permohonan: `http://localhost:8080/ppidC/index.php/permohonan`
- [ ] Keberatan: `http://localhost:8080/ppidC/index.php/keberatan`
- [ ] Database connection
- [ ] Session management
- [ ] Upload files

#### Step 6: Check Error Logs

Cek tidak ada error:
```
C:\xampp81\apache\logs\error.log
C:\xampp81\php\logs\php_error_log
```

---

### Metode 2: Via Composer (untuk Advanced User)

#### Step 1: Update composer.json

Edit `composer.json`:
```json
{
    "require": {
        "php": "^8.1.33",
        "codeigniter/framework": "3.1.13"
    }
}
```

#### Step 2: Install via Composer

```bash
cd C:\xampp81\htdocs\ppidC
composer update
```

#### Step 3: Update Paths (jika diperlukan)

Jika menggunakan composer, CI akan di folder `vendor/codeigniter/framework/system`.

Update `index.php`:
```php
$system_path = 'vendor/codeigniter/framework/system';
```

---

## Changelog: 3.1.10 → 3.1.13

### Version 3.1.13 (January 2023)
- **PHP 8.1/8.2 Compatibility**: Fixed deprecation warnings
- **Security**: Updated dependencies
- **Bug Fixes**: Various minor bug fixes

### Version 3.1.12 (December 2022)
- **PHP 8.1 Support**: Full compatibility
- **Session**: Improved session handling
- **Database**: Better mysqli error handling

### Version 3.1.11 (February 2019)
- **Security**: Fixed session vulnerability
- **Database**: Improved query builder

---

## File Yang Berubah

Saat upgrade, file yang di-replace:

```
system/
├── core/
│   ├── CodeIgniter.php       (CI_VERSION updated)
│   ├── Common.php             (PHP 8 fixes)
│   ├── Input.php              (Security updates)
│   ├── Output.php             (PHP 8 compatibility)
│   ├── Router.php
│   └── Security.php
├── database/
│   ├── DB_driver.php          (PHP 8 fixes)
│   ├── DB_query_builder.php
│   └── drivers/
│       └── mysqli/            (Improved error handling)
├── libraries/
│   ├── Session/               (PHP 8 compatibility)
│   ├── Email.php
│   ├── Upload.php
│   └── Form_validation.php
└── helpers/
    └── url_helper.php
```

**File Anda TIDAK terpengaruh:**
- `application/` (semua kode Anda)
- `assets/`
- `.htaccess`
- `index.php` (hanya jika Anda custom)
- `config_local.php`

---

## Troubleshooting

### Error: "Cannot redeclare is_php()"

**Penyebab**: Conflict dengan file lama

**Solusi**:
1. Pastikan folder `system_backup_3.1.10` sudah di-rename
2. Hapus cache browser (Ctrl+Shift+Del)
3. Restart Apache

### Error: "Deprecated: ... in PHP 8.1"

**Penyebab**: Kode lama yang tidak compatible

**Solusi**: CI 3.1.13 sudah fix ini. Jika masih muncul:
```php
// Di index.php
error_reporting(E_ALL & ~E_DEPRECATED & ~E_WARNING);
```

### Error: "Call to undefined function mysql_connect()"

**Penyebab**: Masih ada kode legacy

**Solusi**: CI 3.1.13 sudah menggunakan mysqli. Pastikan:
```php
// database.php
'dbdriver' => 'mysqli',  // Bukan 'mysql'
```

### Error: "Session: Configured save path is not writable"

**Penyebab**: Permission folder

**Solusi**:
```batch
:: Pastikan folder writable
cd C:\xampp81\htdocs\ppidC
attrib -R application\cache /S /D
```

Atau set permission di `config.php`:
```php
$config['sess_save_path'] = sys_get_temp_dir();
```

---

## Rollback (Jika Ada Masalah)

Jika upgrade bermasalah, rollback mudah:

### Cara 1: Restore Backup
```batch
:: Hapus folder system
rmdir /S /Q system

:: Rename backup
ren system_backup_3.1.10 system
```

### Cara 2: Copy Manual
1. Hapus folder `system`
2. Rename `system_backup_3.1.10` menjadi `system`
3. Restart Apache

---

## PHP 8.1 Specific Fixes

CI 3.1.13 sudah fix issues ini:

### 1. Deprecated: Return type
```php
// Sebelum (error di PHP 8.1)
public function count() {
    return count($this->items);
}

// Setelah (fixed di CI 3.1.13)
public function count(): int {
    return count($this->items);
}
```

### 2. Deprecated: Passing null to non-nullable
```php
// Sebelum (error di PHP 8.1)
htmlspecialchars($var); // jika $var = null

// Setelah (fixed di CI 3.1.13)
htmlspecialchars($var ?? '');
```

### 3. Deprecated: Dynamic properties
```php
// CI 3.1.13 sudah suppress warning ini
#[AllowDynamicProperties]
class CI_Controller {
    // ...
}
```

---

## Performance Optimization

Setelah upgrade, optimize:

### 1. Enable OPcache
`php.ini`:
```ini
opcache.enable=1
opcache.memory_consumption=128
opcache.max_accelerated_files=10000
```

### 2. Update Config
`application/config/config.php`:
```php
// Compress output
$config['compress_output'] = TRUE;

// Cache database queries (optional)
$config['cache_query_string'] = FALSE;
```

### 3. Database Optimization
`application/config/database.php`:
```php
$db['default']['save_queries'] = FALSE; // Production
$db['default']['cache_on'] = FALSE;
$db['default']['pconnect'] = FALSE;
```

---

## Testing Checklist

Setelah upgrade, test:

### Basic Functionality
- [ ] Homepage loads
- [ ] CSS/JS loaded correctly
- [ ] Database connection works
- [ ] Login/logout works
- [ ] Session persists

### PPID Specific
- [ ] Create permohonan
- [ ] View permohonan detail
- [ ] Create keberatan
- [ ] View keberatan detail
- [ ] Admin dashboard
- [ ] Upload files
- [ ] Email notifications (if any)

### Error Testing
- [ ] 404 pages work
- [ ] Form validation works
- [ ] CSRF protection works
- [ ] XSS protection works

### Performance Testing
- [ ] Page load < 2 seconds
- [ ] No memory leaks
- [ ] No excessive queries

---

## Verification Commands

### Check CI Version
```php
<?php
echo CI_VERSION; // Should show: 3.1.13
?>
```

### Check PHP Version
```bash
php -v
# Should show: PHP 8.1.25 or higher
```

### Check Extensions
```bash
php -m | grep -E "mysqli|mbstring|curl|gd"
```

### Check Logs
```bash
# No errors should appear
tail -f C:\xampp81\apache\logs\error.log
tail -f C:\xampp81\php\logs\php_error_log
```

---

## Security Improvements di 3.1.13

1. **Session Security**
   - Improved session regeneration
   - Better cookie handling
   - Protection against session fixation

2. **Input Validation**
   - Better XSS filtering
   - Improved SQL injection prevention
   - Enhanced CSRF protection

3. **File Upload**
   - Stricter MIME type checking
   - Better file extension validation
   - Protection against directory traversal

---

## Migration Notes

### What You DON'T Need to Change

✅ All your `application/` code
✅ All your `assets/`
✅ Database structure
✅ `.htaccess` rules
✅ Custom configurations
✅ Custom libraries/helpers

### What MIGHT Need Adjustment

⚠️ Custom `index.php` (if heavily modified)
⚠️ Custom `system/` modifications (if any)
⚠️ Third-party libraries (check compatibility)

---

## Post-Upgrade Recommendations

### 1. Update Documentation
Document that you're now on CI 3.1.13

### 2. Monitor Logs
Monitor for 24-48 hours after upgrade

### 3. User Testing
Get feedback from users

### 4. Performance Baseline
Compare performance before/after

### 5. Backup Strategy
Regular backups (daily/weekly)

---

## FAQ

### Q: Will upgrade break my application?
**A**: No. CI 3.1.13 is backward compatible with 3.1.10.

### Q: Do I need to modify my code?
**A**: No. Your application code remains unchanged.

### Q: How long does upgrade take?
**A**: 10-15 minutes including testing.

### Q: Can I rollback?
**A**: Yes, easily. Just restore the backup folder.

### Q: Will it fix PHP 8.1 errors?
**A**: Yes. CI 3.1.13 is fully compatible with PHP 8.1/8.2.

---

## Support & Resources

- **Official Docs**: https://codeigniter.com/userguide3/
- **Upgrade Guide**: https://codeigniter.com/userguide3/installation/upgrading.html
- **Forum**: http://forum.codeigniter.com/
- **GitHub**: https://github.com/bcit-ci/CodeIgniter

---

## Summary

| Item | Before | After |
|------|--------|-------|
| CI Version | 3.1.10 | 3.1.13 |
| PHP Support | 5.3 - 7.4 | 5.6 - 8.2 |
| PHP 8.1 Compatible | ❌ No | ✅ Yes |
| Security Patches | Older | Latest |
| Bug Fixes | Older | Latest |
| Performance | Good | Better |

---

**IMPORTANT REMINDERS:**

1. ✅ **BACKUP** system folder before upgrade
2. ✅ **TEST** on development first
3. ✅ **MONITOR** logs after upgrade
4. ✅ **KEEP** backup for 1 week
5. ✅ **DELETE** test files after verification

---

**Last Updated**: 2025-01-19
**CI Version**: 3.1.10 → 3.1.13
**PHP Version**: 8.1.25+
**Application**: PPID Kabupaten Sumedang

---

## Ready to Upgrade?

Follow the steps above and you'll be running CI 3.1.13 in 15 minutes!

**Need help?** Check the Troubleshooting section or contact support.
