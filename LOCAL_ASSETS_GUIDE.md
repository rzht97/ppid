# Panduan Menggunakan Local Assets (Tanpa CDN)

## 📚 Apa yang Berubah?

Semua asset CDN eksternal (Bootstrap, jQuery, DataTables, dll) sekarang akan di-load dari **server lokal** untuk:
- ✅ **Menghindari CSP violation errors**
- ✅ **Lebih cepat** (tidak bergantung pada CDN eksternal)
- ✅ **Lebih secure** (kontrol penuh atas file)
- ✅ **Offline-ready** (aplikasi tetap jalan meskipun CDN down)

---

## 🚀 Cara Deploy ke Server

### LANGKAH 1: Deploy Code Terbaru

```bash
# SSH ke server
cd /var/www/html/ppid

# Backup dulu (opsional)
git stash

# Pull code terbaru
git pull origin claude/add-profile-submenu-pages-01CdbeDz1hxF4BDBt1o5RhBu
```

---

### LANGKAH 2: Download CDN Assets ke Local

Jalankan script otomatis untuk download semua asset CDN:

```bash
# Pastikan berada di root folder aplikasi
cd /var/www/html/ppid

# Jalankan script download
bash download-cdn-assets.sh
```

**Script akan otomatis download:**
- Bootstrap 4.6.2 (CSS + JS)
- jQuery 3.7.1
- Popper.js 2.11.8
- DataTables 1.13.8 (CSS + JS + Buttons)
- JSZip 3.10.1
- PDFMake 0.2.7
- js-cookie 2.1.2

**Lokasi download:** `assets/vendor/`

**Waktu download:** ~30 detik - 1 menit

---

### LANGKAH 3: Set File Permissions

```bash
# Set permission agar assets bisa diakses
chmod -R 755 assets/vendor
chown -R www-data:www-data assets/vendor
```

---

### LANGKAH 4: Clear Cache & Test

```bash
# Restart Apache (opsional tapi recommended)
sudo systemctl restart apache2
```

**Test di browser:**
1. Clear browser cache (`Ctrl+Shift+Delete`)
2. Hard refresh (`Ctrl+F5`)
3. Buka developer console (`F12`)
4. Cek **tidak ada CSP error** ✅
5. Cek **semua halaman berfungsi normal** ✅

---

## 📁 Struktur Folder Assets

Setelah menjalankan script, struktur folder akan seperti ini:

```
assets/
└── vendor/
    ├── bootstrap/
    │   ├── css/
    │   │   └── bootstrap.min.css
    │   └── js/
    │       ├── bootstrap.bundle.min.js
    │       └── popper.min.js
    ├── datatables/
    │   ├── css/
    │   │   ├── jquery.dataTables.min.css
    │   │   └── buttons.dataTables.min.css
    │   └── js/
    │       ├── jquery.dataTables.min.js
    │       ├── dataTables.buttons.min.js
    │       ├── buttons.flash.min.js
    │       ├── buttons.html5.min.js
    │       └── buttons.print.min.js
    ├── jquery/
    │   └── js/
    │       └── jquery-3.7.1.min.js
    ├── pdfmake/
    │   └── js/
    │       ├── pdfmake.min.js
    │       └── vfs_fonts.js
    ├── jszip/
    │   └── js/
    │       └── jszip.min.js
    └── js-cookie/
        └── js/
            └── js.cookie.min.js
```

---

## 🔍 File yang Diubah

### Admin Area
**File:** `application/views/dev/admin/partials/head.php`
- ❌ **Before:** `https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css`
- ✅ **After:** `<?= base_url()?>assets/vendor/bootstrap/css/bootstrap.min.css`

**File:** `application/views/dev/admin/partials/js.php`
- ❌ **Before:** `https://code.jquery.com/jquery-3.7.1.min.js`
- ✅ **After:** `<?= base_url()?>assets/vendor/jquery/js/jquery-3.7.1.min.js`

### Public Area
**File:** `application/views/dev/partials/js.php`
- ❌ **Before:** `https://code.jquery.com/jquery-3.7.1.min.js`
- ✅ **After:** `<?= base_url()?>assets/vendor/jquery/js/jquery-3.7.1.min.js`

---

## ✅ Verifikasi Deployment

### 1. Cek File Exists

```bash
# Cek apakah semua file berhasil di-download
ls -lh assets/vendor/bootstrap/css/bootstrap.min.css
ls -lh assets/vendor/jquery/js/jquery-3.7.1.min.js
ls -lh assets/vendor/datatables/js/jquery.dataTables.min.js
```

Setiap file seharusnya menunjukkan ukuran file (misal: 160K, 89K, dll).

Jika size = 0 atau file tidak ada → download gagal!

### 2. Cek di Browser

**Admin Area:**
1. Buka: https://ppid.sumedangkab.go.id/admin
2. Login
3. Tekan `F12` (Developer Tools)
4. Tab **Network**
5. Refresh halaman
6. Cari file `bootstrap.min.css`, `jquery-3.7.1.min.js`
7. Status harus **200 OK** (warna hitam, bukan merah)
8. Domain harus `ppid.sumedangkab.go.id` (bukan cdn.jsdelivr.net)

**Public Area:**
1. Buka: https://ppid.sumedangkab.go.id
2. Tekan `F12`
3. Tab **Network**
4. Cek file `jquery-3.7.1.min.js` di-load dari domain sendiri

### 3. Cek Console (Tidak Ada Error)

**Tab Console:**
- ✅ **Tidak ada** CSP violation errors
- ✅ **Tidak ada** 404 errors untuk CSS/JS files
- ✅ DataTables berfungsi normal (bisa sort, search, export)
- ✅ Bootstrap dropdown/modal berfungsi

---

## 🔧 Troubleshooting

### Problem: Script download gagal (curl error)

**Solusi 1: Cek koneksi internet server**
```bash
ping -c 3 cdn.jsdelivr.net
```

**Solusi 2: Download manual satu per satu**
```bash
cd assets/vendor/bootstrap/css
curl -O "https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css"
```

**Solusi 3: Download di komputer lokal, lalu upload via FTP**
- Download file-file dari CDN di browser
- Upload ke `assets/vendor/` via FileZilla/WinSCP

---

### Problem: File di-download tapi ukuran 0 byte

**Penyebab:** Firewall/proxy memblokir curl

**Solusi:**
```bash
# Gunakan wget sebagai alternatif
wget "https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" \
     -O assets/vendor/bootstrap/css/bootstrap.min.css
```

---

### Problem: File exists tapi browser masih load dari CDN

**Penyebab:** Cache browser atau file view belum terupdate

**Solusi:**
1. Hard refresh: `Ctrl+Shift+F5`
2. Cek file view sudah terupdate:
   ```bash
   grep "assets/vendor/bootstrap" application/views/dev/admin/partials/head.php
   ```
   Jika masih ada `cdn.jsdelivr.net` → file belum terupdate!

3. Pull code terbaru lagi:
   ```bash
   git pull origin claude/add-profile-submenu-pages-01CdbeDz1hxF4BDBt1o5RhBu
   ```

---

### Problem: 404 Not Found untuk assets/vendor/...

**Penyebab:** File permission atau folder tidak ada

**Solusi:**
```bash
# Cek apakah folder exists
ls -la assets/vendor/

# Set permission yang benar
chmod -R 755 assets/vendor
chown -R www-data:www-data assets/vendor

# Restart Apache
sudo systemctl restart apache2
```

---

### Problem: DataTables tidak berfungsi (error "$(...).DataTable is not a function")

**Penyebab:** jQuery atau DataTables tidak ter-load

**Solusi:**
1. Cek di browser console (F12) apakah ada error load file
2. Cek file exists:
   ```bash
   ls -lh assets/vendor/jquery/js/jquery-3.7.1.min.js
   ls -lh assets/vendor/datatables/js/jquery.dataTables.min.js
   ```
3. Cek urutan load script (jQuery harus load SEBELUM DataTables)

---

## 🎯 Keuntungan Local Assets

| Aspek | CDN | Local Assets |
|-------|-----|--------------|
| **Speed** | Bergantung internet | ✅ Lebih cepat (same server) |
| **Reliability** | CDN bisa down | ✅ Selalu available |
| **Security** | CSP issues | ✅ No CSP violations |
| **Privacy** | Request ke third-party | ✅ No external requests |
| **Offline** | ❌ Butuh internet | ✅ Offline-ready |
| **Control** | CDN bisa ubah file | ✅ Full control |
| **Size** | ~2MB total | ~2MB total (sama) |

---

## 📊 Ukuran File

Total download: **~2.5MB**

Breakdown:
- Bootstrap CSS: ~160KB
- Bootstrap JS: ~76KB
- jQuery: ~89KB
- DataTables CSS: ~25KB
- DataTables JS + Plugins: ~700KB
- PDFMake + fonts: ~1.3MB
- JSZip: ~95KB
- js-cookie: ~1.5KB

**Catatan:** Ukuran sangat kecil, tidak akan memberatkan server.

---

## 🔄 Update Assets di Masa Depan

Jika ingin update versi (misal: Bootstrap 5, jQuery 4, dll):

1. **Update download script:**
   ```bash
   nano download-cdn-assets.sh
   # Ubah URL ke versi baru
   ```

2. **Re-download:**
   ```bash
   bash download-cdn-assets.sh
   ```

3. **Test:**
   - Clear cache
   - Test semua fitur
   - Pastikan tidak ada breaking changes

---

## 📞 Support

Jika ada masalah setelah deployment:

1. **Kirim output script:**
   ```bash
   bash download-cdn-assets.sh 2>&1 | tee download-log.txt
   ```

2. **Kirim list file:**
   ```bash
   find assets/vendor -type f -exec ls -lh {} \; > assets-list.txt
   ```

3. **Screenshot console error** (F12 → Console tab)

---

## ✅ Checklist Deployment

Ikuti checklist ini untuk deployment yang sukses:

- [ ] Pull code terbaru dari git
- [ ] Jalankan `bash download-cdn-assets.sh`
- [ ] Verifikasi semua file ter-download (cek size > 0)
- [ ] Set file permissions (chmod 755)
- [ ] Restart Apache
- [ ] Clear browser cache
- [ ] Test admin area (login, DataTables)
- [ ] Test public area (homepage, menu)
- [ ] Cek console tidak ada error
- [ ] Cek Network tab (load dari domain sendiri)
- [ ] Test export PDF/Excel (DataTables)

---

**Deployment selesai! Aplikasi sekarang 100% menggunakan local assets tanpa CDN eksternal.** ✅
