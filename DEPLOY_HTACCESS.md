# Panduan Deploy File .htaccess ke Server

## ⚠️ MASALAH SAAT INI

Error console menunjukkan bahwa **file `.htaccess` di server masih menggunakan CSP lama** yang tidak mengandung:
- ❌ `https://cdn.jsdelivr.net` di `style-src`
- ❌ `https://static.cloudflareinsights.com` di `script-src`

**Ini berarti file `.htaccess` di server BELUM diupdate!**

---

## 🚀 SOLUSI: Deploy File .htaccess yang Baru

Pilih salah satu metode di bawah ini:

---

### **METODE 1: Git Pull (RECOMMENDED - Paling Mudah)**

Jalankan perintah ini di server via SSH:

```bash
# 1. Masuk ke folder aplikasi
cd /var/www/html/ppid
# Sesuaikan path jika berbeda

# 2. Backup file lama (opsional tapi recommended)
cp .htaccess .htaccess.backup.$(date +%Y%m%d_%H%M%S)

# 3. Pull perubahan terbaru dari git
git pull origin claude/add-profile-submenu-pages-01CdbeDz1hxF4BDBt1o5RhBu

# 4. Verifikasi file sudah terupdate
bash verify-htaccess.sh
```

**Jika git pull error "local changes":**
```bash
# Stash perubahan local
git stash

# Pull lagi
git pull origin claude/add-profile-submenu-pages-01CdbeDz1hxF4BDBt1o5RhBu

# Verifikasi
bash verify-htaccess.sh
```

---

### **METODE 2: Copy-Paste Langsung (Tercepat)**

Jika tidak bisa git pull, edit langsung file `.htaccess` di server:

```bash
# 1. Backup file lama
cp /var/www/html/ppid/.htaccess /var/www/html/ppid/.htaccess.backup

# 2. Edit file
nano /var/www/html/ppid/.htaccess
```

**Cari line 67** (yang dimulai dengan `Header set Content-Security-Policy`), lalu **hapus seluruh line tersebut** dan ganti dengan line berikut:

```apache
    Header set Content-Security-Policy "default-src 'self'; script-src 'self' 'unsafe-inline' 'unsafe-eval' https://cdn.datatables.net https://cdnjs.cloudflare.com https://code.jquery.com https://maxcdn.bootstrapcdn.com https://cdn.jsdelivr.net https://static.cloudflareinsights.com https://translate.google.com https://translate.googleapis.com https://translate-pa.googleapis.com https://maps.googleapis.com *.sumedangkab.go.id; style-src 'self' 'unsafe-inline' https://cdn.datatables.net https://cdnjs.cloudflare.com https://maxcdn.bootstrapcdn.com https://fonts.googleapis.com https://cdn.jsdelivr.net https://www.gstatic.com; font-src 'self' https://fonts.gstatic.com https://maxcdn.bootstrapcdn.com https://cdn.jsdelivr.net data:; img-src 'self' data: https:; connect-src 'self' *.sumedangkab.go.id https://cdn.jsdelivr.net https://static.cloudflareinsights.com https://translate.google.com https://translate.googleapis.com https://translate-pa.googleapis.com https://maps.googleapis.com; frame-src 'self'; object-src 'none'; base-uri 'self'; form-action 'self';"
```

**Simpan file:**
- Tekan `Ctrl + X`
- Tekan `Y`
- Tekan `Enter`

**Verifikasi:**
```bash
grep "static.cloudflareinsights.com" /var/www/html/ppid/.htaccess
# Jika muncul output berarti sudah benar ✅
```

---

### **METODE 3: Upload via FTP/SFTP**

1. **Download file `.htaccess` dari GitHub:**
   - Buka: https://github.com/rzht97/ppid
   - Navigasi ke branch: `claude/add-profile-submenu-pages-01CdbeDz1hxF4BDBt1o5RhBu`
   - Download file `.htaccess`

2. **Upload ke server:**
   - Gunakan FileZilla, WinSCP, atau FTP client lainnya
   - Connect ke server
   - Backup file `.htaccess` yang lama (rename jadi `.htaccess.old`)
   - Upload file `.htaccess` yang baru
   - Set permission: `644`

3. **Verifikasi via SSH:**
```bash
grep "static.cloudflareinsights.com" /var/www/html/ppid/.htaccess
```

---

## ✅ VERIFIKASI DEPLOYMENT

Setelah deploy dengan salah satu metode di atas, jalankan verifikasi:

### 1. Verifikasi di Server

```bash
# Jalankan script verifikasi
cd /var/www/html/ppid
bash verify-htaccess.sh
```

**Output yang BENAR:**
```
✅ File .htaccess ditemukan
✅ cdn.jsdelivr.net ditemukan di style-src
✅ static.cloudflareinsights.com ditemukan
✅ Semua CDN menggunakan https://prefix
✅ File .htaccess SUDAH BENAR!
```

**Jika ada ❌:**
File belum terupdate! Ulangi proses deploy.

### 2. Verifikasi di Browser

**a) Purge Cache Cloudflare (WAJIB jika pakai Cloudflare):**
- Login ke dashboard Cloudflare
- Pilih domain `sumedangkab.go.id`
- Caching → Configuration → **Purge Everything**
- Tunggu 30 detik

**b) Clear Browser Cache:**
- Tekan `Ctrl + Shift + Delete`
- Pilih "Cached images and files"
- Clear

**c) Hard Refresh:**
- `Ctrl + F5` (Windows/Linux)
- `Cmd + Shift + R` (Mac)

**d) Cek Console:**
- Buka website: https://ppid.sumedangkab.go.id
- Tekan `F12` untuk buka Developer Tools
- Tab **Console**
- Refresh halaman

**Hasil yang BENAR:**
- ✅ Tidak ada error CSP violation
- ✅ Bootstrap CSS ter-load dengan baik
- ✅ Cloudflare script ter-load tanpa error

---

## 🔍 Troubleshooting

### Problem: "git pull" gagal dengan error "local changes"

**Solusi:**
```bash
git stash
git pull origin claude/add-profile-submenu-pages-01CdbeDz1hxF4BDBt1o5RhBu
```

---

### Problem: Masih ada CSP error setelah deploy

**Cek 1: Apakah file benar-benar terupdate?**
```bash
cat /var/www/html/ppid/.htaccess | grep "static.cloudflareinsights.com"
```
Jika TIDAK muncul output → file belum terupdate!

**Cek 2: Apakah ada CSP header lain yang override?**
```bash
# Cek CSP header dari server
curl -I https://ppid.sumedangkab.go.id | grep -i "content-security"
```

**Cek 3: Apakah Cloudflare cache sudah di-purge?**
- Login Cloudflare → Purge Everything
- Tunggu 30 detik
- Test lagi

**Cek 4: Restart Apache**
```bash
sudo systemctl restart apache2
# atau
sudo service apache2 restart
```

---

### Problem: Script verify-htaccess.sh tidak ada

**Solusi:**
```bash
cd /var/www/html/ppid
git pull origin claude/add-profile-submenu-pages-01CdbeDz1hxF4BDBt1o5RhBu
chmod +x verify-htaccess.sh
bash verify-htaccess.sh
```

---

## 📋 Checklist Deploy

Ikuti checklist ini step-by-step:

- [ ] **Deploy file .htaccess:**
  - [ ] Metode 1: Git pull ATAU
  - [ ] Metode 2: Edit langsung ATAU
  - [ ] Metode 3: Upload FTP

- [ ] **Verifikasi di server:**
  - [ ] Jalankan `bash verify-htaccess.sh`
  - [ ] Pastikan semua ✅

- [ ] **Purge cache:**
  - [ ] Purge Cloudflare cache (jika pakai)
  - [ ] Clear browser cache
  - [ ] Hard refresh (`Ctrl+F5`)

- [ ] **Test di browser:**
  - [ ] Buka website
  - [ ] Tekan F12
  - [ ] Cek console tidak ada CSP error
  - [ ] Bootstrap CSS ter-load
  - [ ] Halaman tampil normal

---

## 💡 Tips

1. **Selalu backup file lama** sebelum overwrite:
   ```bash
   cp .htaccess .htaccess.backup.$(date +%Y%m%d)
   ```

2. **Gunakan git pull** jika memungkinkan (lebih aman dan trackable)

3. **Purge Cloudflare cache** adalah WAJIB jika menggunakan Cloudflare

4. **Restart Apache** jika perubahan tidak muncul:
   ```bash
   sudo systemctl restart apache2
   ```

5. **Test di browser incognito** untuk memastikan tidak ada cache local

---

## 📞 Bantuan Lebih Lanjut

Jika setelah mengikuti semua langkah di atas masih error, kirimkan:

1. **Output dari script verifikasi:**
   ```bash
   bash verify-htaccess.sh > verify-output.txt 2>&1
   cat verify-output.txt
   ```

2. **Output CSP header dari server:**
   ```bash
   curl -I https://ppid.sumedangkab.go.id | grep -i "content-security" > csp-header.txt
   cat csp-header.txt
   ```

3. **Screenshot console error** dari browser (F12 → Console tab)
