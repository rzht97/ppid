# Clean URL Setup Guide
## Menghilangkan index.php dari URL

Panduan ini untuk mengaktifkan clean URL (tanpa `index.php`) di CodeIgniter.

**Hasil yang Diharapkan:**
```
❌ SEBELUM: http://localhost:8080/ppidC/index.php/pub/cekstatus
✅ SESUDAH: http://localhost:8080/ppidC/pub/cekstatus
```

---

## ✅ Konfigurasi yang Sudah Dilakukan

### 1. File `.htaccess` (Root Directory)
File `.htaccess` sudah dibuat dengan konfigurasi mod_rewrite:

```apache
RewriteEngine On

# Remove index.php from URL
RewriteCond %{REQUEST_FILENAME} !-f
RewriteCond %{REQUEST_FILENAME} !-d
RewriteRule ^(.*)$ index.php/$1 [L]
```

**Penjelasan:**
- Jika file tidak ada (`!-f`) dan direktori tidak ada (`!-d`)
- Redirect semua request ke `index.php/...`
- CodeIgniter akan handle routing sisanya

### 2. CodeIgniter Config (`application/config/config.php`)
Setting `index_page` sudah dikosongkan:

```php
$config['index_page'] = '';
```

### 3. Base URL (`config_local.php`)
BASE_URL sudah dikonfigurasi tanpa `index.php`:

```php
define('BASE_URL', 'http://localhost:8080/ppidC/');
```

---

## 🔧 Langkah Konfigurasi Apache XAMPP

### Langkah 1: Enable mod_rewrite

1. **Buka file konfigurasi Apache:**
   ```
   C:\xampp\apache\conf\httpd.conf
   ```

2. **Cari baris berikut** (gunakan Ctrl+F):
   ```apache
   #LoadModule rewrite_module modules/mod_rewrite.so
   ```

3. **Hilangkan tanda `#`** untuk enable module:
   ```apache
   LoadModule rewrite_module modules/mod_rewrite.so
   ```

### Langkah 2: Set AllowOverride All

Masih di file `httpd.conf`, cari section `<Directory>` untuk direktori htdocs:

**CARI BAGIAN INI:**
```apache
<Directory "C:/xampp/htdocs">
    Options Indexes FollowSymLinks Includes ExecCGI
    AllowOverride None
    Require all granted
</Directory>
```

**UBAH MENJADI:**
```apache
<Directory "C:/xampp/htdocs">
    Options Indexes FollowSymLinks Includes ExecCGI
    AllowOverride All
    Require all granted
</Directory>
```

**PENTING:** Ubah `AllowOverride None` menjadi `AllowOverride All`

### Langkah 3: Restart Apache

1. Buka **XAMPP Control Panel**
2. Klik **Stop** pada Apache
3. Tunggu beberapa detik
4. Klik **Start** pada Apache
5. Pastikan status Apache **hijau**

---

## ✅ Testing Clean URL

### 1. Test URL Lama (Harus Tetap Bekerja)
```
http://localhost:8080/ppidC/index.php/pub/cekstatus
```

### 2. Test Clean URL (Tanpa index.php)
```
http://localhost:8080/ppidC/pub/cekstatus
```

### 3. Test URL Lainnya
```bash
# Homepage
http://localhost:8080/ppidC/

# Cek Status
http://localhost:8080/ppidC/pub/cekstatus

# Permohonan
http://localhost:8080/ppidC/pub/permohonan

# Keberatan Detail
http://localhost:8080/ppidC/keberatan/detail/K191125001

# Admin
http://localhost:8080/ppidC/admin
```

---

## 🔍 Troubleshooting

### Error: 404 Not Found (Setelah Remove index.php)

**Penyebab:**
- mod_rewrite tidak enabled
- AllowOverride masih None
- .htaccess tidak terbaca

**Solusi:**

1. **Cek mod_rewrite enabled:**
   ```
   C:\xampp\apache\conf\httpd.conf
   ```
   Pastikan ada:
   ```apache
   LoadModule rewrite_module modules/mod_rewrite.so
   ```
   (tanpa tanda #)

2. **Cek AllowOverride:**
   ```apache
   <Directory "C:/xampp/htdocs">
       AllowOverride All
   </Directory>
   ```

3. **Restart Apache** setelah perubahan

4. **Cek .htaccess ada di root:**
   ```
   C:\xampp\htdocs\ppidC\.htaccess
   ```

### Error: 403 Forbidden

**Penyebab:**
- Folder permissions issue
- .htaccess rules terlalu strict

**Solusi:**

1. Cek file `.htaccess` di root
2. Comment sementara security rules
3. Test URL
4. Uncomment kembali satu per satu

### URL Rewrite Bekerja Tapi CSS/JS Hilang

**Penyebab:**
- Relative path issue pada assets

**Solusi:**

Gunakan `base_url()` helper di semua asset:
```php
<!-- ❌ SALAH -->
<link href="assets/css/style.css" rel="stylesheet">

<!-- ✅ BENAR -->
<link href="<?= base_url('assets/css/style.css') ?>" rel="stylesheet">
```

### Clean URL Tidak Bekerja di Port Lain (8080)

**Solusi:**

Cek konfigurasi virtual host untuk port 8080:
```
C:\xampp\apache\conf\extra\httpd-vhosts.conf
```

Atau edit `httpd.conf` dan tambahkan:
```apache
Listen 8080

<VirtualHost *:8080>
    DocumentRoot "C:/xampp/htdocs"
    <Directory "C:/xampp/htdocs">
        AllowOverride All
        Require all granted
    </Directory>
</VirtualHost>
```

---

## 📝 Verification Checklist

Pastikan semua poin ini sudah benar:

- [ ] File `.htaccess` ada di `/home/user/ppid/.htaccess`
- [ ] `mod_rewrite` enabled di `httpd.conf`
- [ ] `AllowOverride All` diset di `httpd.conf`
- [ ] `$config['index_page'] = '';` di `config.php`
- [ ] BASE_URL tidak include `index.php`
- [ ] Apache sudah di-restart
- [ ] Test URL tanpa `index.php` berhasil

---

## 🎯 Clean URL Benefits

✅ **SEO Friendly**
- URL lebih clean dan mudah dibaca
- Better untuk search engine indexing

✅ **User Experience**
- URL lebih professional
- Mudah diingat dan dishare

✅ **Security**
- Menyembunyikan teknologi backend
- Lebih sulit untuk fingerprinting

✅ **Consistency**
- Konsisten dengan modern web standards
- Sama seperti Laravel, WordPress, dll

---

## 📚 Referensi

- [CodeIgniter URL Documentation](https://codeigniter.com/user_guide/general/urls.html)
- [Apache mod_rewrite](https://httpd.apache.org/docs/current/mod/mod_rewrite.html)
- [XAMPP Documentation](https://www.apachefriends.org/docs/)

---

**Last Updated:** 2025-11-19
**Created by:** Claude Assistant
**PPID System Clean URL Configuration**
