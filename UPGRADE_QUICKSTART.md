# 🚀 Quick Start: Upgrade CodeIgniter ke 3.1.13

## Pilih Metode Upgrade:

### ⚡ Metode 1: Otomatis (PALING MUDAH!)

1. **Double-click file:** `upgrade_ci.bat`
2. **Tunggu** proses selesai (2-3 menit)
3. **Restart Apache** di XAMPP Control Panel
4. **Test aplikasi**: http://localhost:8080/ppidC/
5. ✅ **Selesai!**

---

### 📝 Metode 2: Manual (Jika script error)

#### Step 1: Backup
```
Copy folder: C:\xampp81\htdocs\ppidC\system
Paste sebagai: C:\xampp81\htdocs\ppidC\system_backup
```

#### Step 2: Download
Klik link ini untuk download:
https://github.com/bcit-ci/CodeIgniter/archive/refs/tags/3.1.13.zip

#### Step 3: Extract
1. Extract file ZIP
2. Buka folder `CodeIgniter-3.1.13`
3. Copy folder `system`

#### Step 4: Replace
1. Hapus folder `C:\xampp81\htdocs\ppidC\system`
2. Paste folder `system` yang baru

#### Step 5: Test
1. Restart Apache
2. Akses: http://localhost:8080/ppidC/
3. Test login, permohonan, keberatan

---

### 💻 Metode 3: Via Composer (Advanced)

```bash
cd C:\xampp81\htdocs\ppidC
composer update
```

**Note**: File `composer.json` sudah dikonfigurasi untuk CI 3.1.13

---

## ✅ Verifikasi Upgrade Berhasil

Buat file `version_check.php` di folder ppidC:

```php
<?php
define('BASEPATH', TRUE);
require_once 'system/core/CodeIgniter.php';
echo "CodeIgniter Version: " . CI_VERSION;
?>
```

Akses: http://localhost:8080/ppidC/version_check.php

**Expected**: `CodeIgniter Version: 3.1.13`

**⚠️ HAPUS file ini setelah cek!**

---

## 🔧 Troubleshooting

### Error: "Script tidak jalan"
**Solusi**: Klik kanan `upgrade_ci.bat` → "Run as Administrator"

### Error: "Download gagal"
**Solusi**: Download manual dari link di Metode 2

### Error: "Aplikasi blank page"
**Solusi**:
1. Cek Apache error log
2. Pastikan PHP 8.1.25 sudah terinstall
3. Restart Apache

### Rollback ke versi lama
```
1. Hapus folder 'system'
2. Rename 'system_backup' jadi 'system'
3. Restart Apache
```

---

## 📚 Dokumentasi Lengkap

Baca file **CODEIGNITER_UPGRADE_GUIDE.md** untuk:
- Penjelasan detail setiap step
- Changelog lengkap
- Troubleshooting advanced
- Performance optimization
- Security improvements

---

## ⏱️ Total Waktu

- Metode 1 (Otomatis): **5 menit**
- Metode 2 (Manual): **10 menit**
- Metode 3 (Composer): **3 menit**

---

## ❓ Need Help?

Jika ada error:
1. Screenshot error message
2. Cek file: `CODEIGNITER_UPGRADE_GUIDE.md`
3. Cek error log: `C:\xampp81\apache\logs\error.log`

---

**Good luck! 🎉**
