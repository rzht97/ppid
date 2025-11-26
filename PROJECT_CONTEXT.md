# 📋 PPID Kabupaten Sumedang - Project Context

**Last Updated:** 2025-11-26
**Total Commits:** 204
**Framework:** CodeIgniter 3.1.13
**Purpose:** Sistem Informasi PPID (Pejabat Pengelola Informasi dan Dokumentasi) Kabupaten Sumedang

---

## 🎯 OVERVIEW PROJECT

PPID (Pejabat Pengelola Informasi dan Dokumentasi) Kabupaten Sumedang adalah aplikasi web untuk:
- Manajemen informasi publik
- Pengelolaan permohonan informasi publik
- Pengelolaan keberatan informasi
- Pengelolaan Daftar Informasi Publik (DIP)
- Portal berita dan pengumuman

### Tech Stack:
- **Backend:** CodeIgniter 3.1.13 (PHP Framework)
- **Database:** MySQL/MariaDB (mysqli driver)
- **Server:** Apache dengan mod_rewrite
- **Frontend Assets:**
  - jQuery 3.7.1 (upgraded dari 2.1.4)
  - Bootstrap 4.6.2 (upgraded dari 3.3.6)
  - DataTables 1.13.8
  - Dropzone untuk file uploads
  - Template: Inverse Admin (legacy) + Newest Assets

---

## 📁 STRUKTUR APLIKASI

```
/home/user/ppid/
├── application/
│   ├── config/          # Konfigurasi (database, routes, etc)
│   ├── controllers/     # Controllers
│   │   ├── admin/       # Admin controllers (Dip, Index, Keberatan, Permohonan)
│   │   ├── Berita.php
│   │   ├── Cekstatus.php
│   │   ├── Home.php
│   │   ├── Keberatan.php
│   │   ├── Login.php
│   │   ├── Profil.php
│   │   ├── PublicDip.php
│   │   └── PublicPermohonan.php
│   ├── models/          # Models (Dokumen_model, Permohonan_model, etc)
│   ├── views/
│   │   └── dev/
│   │       ├── admin/        # Admin panel views
│   │       ├── berita/       # Berita views
│   │       ├── cekstatus/    # Cek status views
│   │       ├── DIP/          # DIP views
│   │       ├── keberatan/    # Keberatan views
│   │       ├── layananinformasi/  # Service info views
│   │       ├── partials/     # Header, footer, etc
│   │       ├── permohonan/   # Permohonan views
│   │       ├── profil/       # Profile views (NEW: pejabat.php, tentang.php)
│   │       ├── pengumuman/   # Announcement views
│   │       └── index2.php    # Homepage
│   ├── libraries/       # Custom libraries
│   └── helpers/         # Custom helpers
├── system/              # CodeIgniter 3.1.13 system folder
├── inverse/             # Legacy frontend assets
├── newestassets/        # Current frontend assets
├── upload/              # File uploads directory
│   ├── dokumen/
│   ├── ktp/
│   └── .htaccess        # Security: Prevent PHP execution
├── .htaccess            # Apache config, CSP headers
├── index.php            # Entry point
├── SECURITY_AUDIT_REPORT.md    # Security audit documentation
├── LIBRARY_UPDATE_GUIDE.md     # Library update guide
└── PROJECT_CONTEXT.md          # This file

```

---

## 🔐 SECURITY IMPROVEMENTS (Last 3-4 Days)

### ✅ COMPLETED SECURITY FIXES:

1. **Critical Vulnerabilities Fixed:**
   - ✅ SQL Injection vulnerabilities di berbagai controller (Home, Berita)
   - ✅ Hardcoded API key di Berita.php (masih ada tapi didokumentasikan)
   - ✅ SSL Certificate verification disabled → **ENABLED**
   - ✅ Path traversal vulnerability di download function
   - ✅ File upload validation (trailing pipe fix)
   - ✅ Encryption key generated

2. **Library Updates:**
   - ✅ jQuery: 2.1.4 → 3.7.1 (CVE-2015-9251, CVE-2019-11358, CVE-2020-11022)
   - ✅ Bootstrap: 3.3.6 → 4.6.2 (CVE-2016-10735, CVE-2018-14040)
   - ✅ CodeIgniter: 3.1.10 → 3.1.13 (Security patches)
   - ✅ DataTables: Updated to 1.13.8
   - ✅ Replaced rawgit.com CDN → jsdelivr.net (15 files)

3. **Security Headers Added (.htaccess):**
   - ✅ X-Frame-Options: SAMEORIGIN (Clickjacking protection)
   - ✅ X-Content-Type-Options: nosniff
   - ✅ X-XSS-Protection: 1; mode=block
   - ✅ Referrer-Policy: strict-origin-when-cross-origin
   - ✅ Content-Security-Policy (CSP) untuk Google APIs, Maps, Translate

4. **Authentication & Rate Limiting:**
   - ✅ Bcrypt password hashing (dengan MD5 migration support)
   - ✅ Session-based rate limiting (3 submissions per 10 minutes)
   - ✅ IP-based throttling (5 submissions per hour)
   - ✅ Login rate limiting (5 attempts in 15 minutes)
   - ✅ Honeypot field untuk bot detection

### ⚠️ KNOWN SECURITY ISSUES (Not Fixed Yet):

1. **CSRF Protection:** Disabled (PHP 8.1 compatibility issues)
2. **Global XSS Filtering:** Disabled (manual filtering required)
3. **Hardcoded API Key:** Masih ada di Home.php:72 dan Berita.php
4. **MD5 Password Support:** Masih ada fallback untuk migrasi

**Lihat:** `SECURITY_AUDIT_REPORT.md` untuk detail lengkap.

---

## 🚀 RECENT CHANGES (Last 7 Days)

### **Today (2025-11-26):**
- ✅ Menambahkan 2 halaman profil baru: `pejabat.php` dan `tentang.php`
- ✅ Menambahkan submenu "Profil Pejabat Struktural" dan "Tentang PPID" di header
- ✅ Menambahkan method `pejabat()` dan `tentang()` di `Profil.php` controller
- ✅ Restructure menu: Mengubah "Berita" menjadi dropdown "Pengumuman"
- ✅ Menambahkan submenu di Pengumuman: Berita, LHKPN, Pengumuman Barang dan Jasa
- ✅ Menambahkan halaman pengumuman: `barjas.php` dan `lhkpn.php`
- ✅ Menambahkan method `barjas()` di `Home.php` controller
- ✅ Update path `lhkpn()` method ke folder pengumuman

### **3 Days Ago (2025-11-23):**
**MASSIVE ADMIN PANEL UI FIXES:**
- ✅ Fixed navbar & sidebar overlap issues (20+ commits)
- ✅ Bootstrap 4 compatibility fixes
- ✅ Responsive layout improvements
- ✅ Breadcrumb navigation standardization
- ✅ Icon shifting fixes on sidebar hover
- ✅ Navbar height alignment (60px)
- ✅ Sidebar search box removal
- ✅ Logo positioning fixes
- ✅ CSP (Content Security Policy) updates untuk:
  - Google Maps API
  - Google Translate
  - External scripts (jsdelivr, googleapis)
  - Icon files paths
- ✅ PWA manifest logo paths
- ✅ Admin-only scripts cleanup di public pages

### **4 Days Ago (2025-11-22):**
- ✅ Security audit completed
- ✅ Library updates (jQuery, Bootstrap, CodeIgniter)
- ✅ Rate limiting implementation
- ✅ File-based brute-force protection
- ✅ Audit logging implementation
- ✅ Cleanup unused files (migrations, debug files)
- ✅ Fixed non-existent 'user' table query di Home controller

---

## 📂 CONTROLLERS & FEATURES

### **Public Controllers:**

#### 1. **Home.php** (Main Public Controller)
- `index()` - Homepage dengan statistik permohonan/keberatan
- `berita()` - Daftar berita
- `detail($id)` - Detail berita
- `dip()` - Daftar Informasi Publik dengan filter kategori
- `detaildip($id)` - Detail DIP
- `download($id)` - Download dokumen (with security validation)
- `infoberkala()` - Informasi Berkala
- `infosertamerta()` - Informasi Serta Merta
- `infosetiapsaat()` - Informasi Setiap Saat
- `regulasi()` - Halaman regulasi
- `caradapatinfo()` - SOP mendapatkan informasi
- `carakeberatan()` - Tata cara keberatan
- `carasengketa()` - Prosedur sengketa
- `standarbiaya()` - Standar biaya pelayanan
- `sop()` - SOP pelayanan
- `dik()` - Daftar Informasi Dikecualikan
- `skdip()` - SK DIP
- `pejabat()` - Profil pejabat (old)
- `laporan()` - Laporan pelayanan
- `lhkpn()` - **UPDATED** LHKPN (moved to pengumuman folder)
- `barjas()` - **NEW** Pengumuman Barang dan Jasa
- `lapor()` - LAPOR!
- `cc()` - Command Center

**API Integration:**
- `get_news_api()` - Fetch berita dari sumedangkab.go.id API (X-API-KEY: Sumedang#3211)

#### 2. **Profil.php** (Profile Pages)
- `maklumat()` - Maklumat pelayanan
- `urtug()` - Uraian tugas dan wewenang
- `visimisikab()` - Visi misi Kabupaten Sumedang
- `visimisippid()` - Visi misi PPID
- `strukturorg()` - Struktur organisasi
- `pejabat()` - **NEW** Profil Pejabat Struktural
- `tentang()` - **NEW** Tentang PPID

#### 3. **PublicPermohonan.php**
- Public form untuk ajukan permohonan informasi
- Rate limiting: 3 submissions per 10 minutes
- IP throttling: 5 submissions per hour

#### 4. **Keberatan.php**
- Public form untuk ajukan keberatan
- Similar rate limiting

#### 5. **Cekstatus.php**
- Cek status permohonan/keberatan

#### 6. **Berita.php**
- Fetch berita dari external API (sumedangkab.go.id)

#### 7. **Login.php**
- Admin login dengan bcrypt/MD5 fallback
- Rate limiting: 5 attempts in 15 minutes
- Session regeneration

### **Admin Controllers** (`application/controllers/admin/`):

#### 1. **Index.php**
- Dashboard admin
- Overview statistik

#### 2. **Permohonan.php**
- CRUD permohonan informasi
- Upload dokumen jawaban
- Update status permohonan

#### 3. **Keberatan.php**
- CRUD keberatan informasi
- Manage sengketa

#### 4. **Dip.php**
- CRUD Daftar Informasi Publik
- Upload dokumen
- Kategori: Berkala, Serta Merta, Setiap Saat

---

## 🎨 MENU STRUCTURE (Public Site)

### Navigation Menu (`application/views/dev/partials/header.php`):

```
├── Beranda
├── Profil
│   ├── Visi dan Misi
│   │   ├── Kabupaten Sumedang
│   │   └── PPID
│   ├── Struktur Organisasi
│   ├── Tugas dan Wewenang
│   ├── Profil Pejabat Struktural  ← NEW (2025-11-26)
│   ├── Tentang PPID               ← NEW (2025-11-26)
│   └── Maklumat Pelayanan
├── Informasi Publik
│   ├── Daftar Informasi Publik
│   │   ├── SK DIP
│   │   └── DIP
│   ├── Daftar Informasi Yang Dikecualikan
│   ├── Command Center
│   └── Laporan Pelayanan Informasi Publik
├── Regulasi
│   ├── Regulasi Informasi Publik
│   └── JDIH Kab. Sumedang (external link)
├── Pelayanan Informasi
│   ├── Tata Cara Mendapatkan Informasi
│   ├── Tata Cara Pengajuan Keberatan
│   ├── Prosedur Penanganan Sengketa Informasi
│   ├── SOP Pelayanan Informasi
│   ├── Standar Biaya Pelayanan
│   └── WA KEPO (WhatsApp)
├── Pengumuman                       ← UPDATED (2025-11-26)
│   ├── Berita                       ← Moved to submenu
│   ├── LHKPN                        ← NEW
│   └── Pengumuman Barang dan Jasa   ← NEW
├── Cek Status
└── LAPOR!

[Button] Ajukan Permohonan
```

---

## 🗄️ DATABASE TABLES

Key Tables:
- `permohonan` - Permohonan informasi publik
- `keberatan` - Keberatan informasi
- `sengketa` - Sengketa informasi
- `dokumen` - Daftar Informasi Publik (DIP)
- `berita` - Berita (jika ada di database, atau dari API)
- `users` / `admin` - Admin users (check table name)

---

## 🔑 IMPORTANT NOTES FOR FUTURE DEVELOPMENT

### 1. **Menu Changes:**
- Menu structure ada di: `application/views/dev/partials/header.php` (line 106-171)
- Untuk menambah submenu, tambahkan `<li>` di dalam `<ul>` yang sesuai
- Jangan lupa tambahkan method di controller yang sesuai

### 2. **View Files:**
- Public views: `application/views/dev/`
- Admin views: `application/views/dev/admin/`
- Partials (header/footer): `application/views/dev/partials/`

### 3. **Routes:**
- Default controller: `Home` (index.php)
- Admin panel: `/admin/`
- Profile pages: `/profil/{method}`
- Public forms: `/publicpermohonan`, `/keberatan`

### 4. **Security Guidelines:**
- **ALWAYS** use Query Builder untuk database queries
- **ALWAYS** sanitize input dengan `$this->input->post('field', TRUE)`
- **ALWAYS** validate file uploads (mime type, extension, size)
- **NEVER** use raw SQL queries atau `$_POST` directly
- **NEVER** disable SSL verification di production

### 5. **CSP (Content Security Policy):**
- CSP headers ada di `.htaccess`
- Jika menambahkan external script/style, update CSP di `.htaccess`
- Current whitelisted domains:
  - googleapis.com
  - gstatic.com
  - jsdelivr.net
  - translate.googleapis.com
  - maps.googleapis.com

### 6. **Asset Paths:**
- Current assets: `newestassets/`
- Legacy assets: `inverse/` (masih dipakai untuk admin panel)
- Upload directory: `upload/` (protected dengan .htaccess)

### 7. **API Integration:**
- External API: `sumedangkab.go.id/api/news`
- API Key: `Sumedang#3211` (hardcoded di Home.php dan Berita.php)
- **TODO:** Move API key to environment variable

### 8. **Git Workflow:**
- All development di branch `claude/*`
- Never push to main/master directly
- Commit messages format: `TYPE: Description` (FIX:, FEATURE:, SECURITY:, etc)

### 9. **Testing Checklist After Changes:**
- [ ] Homepage loads
- [ ] Admin login works
- [ ] Menu navigation works
- [ ] Forms submit correctly
- [ ] File uploads work
- [ ] No JavaScript errors di console
- [ ] No PHP errors di `application/logs/`
- [ ] Mobile responsive

### 10. **Common Pitfalls:**
- Bootstrap 4 tidak backward compatible dengan Bootstrap 3 classes
- jQuery 3.x memiliki breaking changes dari 2.x
- CSRF protection disabled - manual validation required di forms
- MD5 password masih supported untuk migrasi - jangan hapus yet

---

## 📞 EXTERNAL INTEGRATIONS

1. **Google Maps API** (di beberapa views)
2. **Google Translate** (automatic translation)
3. **Sumedang API** (`sumedangkab.go.id/api/news`)
4. **WhatsApp KEPO** (wa.me/6281122202220)

---

## 🐛 KNOWN ISSUES / TODO

### High Priority:
- [ ] Enable CSRF protection (compatibility fix needed)
- [ ] Enable Global XSS filtering
- [ ] Move API keys to .env file
- [ ] Remove MD5 password fallback setelah semua user migrate

### Medium Priority:
- [ ] Implement stricter password policy
- [ ] Add 2FA untuk admin
- [ ] Improve error handling
- [ ] Add logging untuk security events

### Low Priority:
- [ ] Refactor legacy code
- [ ] Improve code documentation
- [ ] Add unit tests
- [ ] Optimize database queries

---

## 📚 DOCUMENTATION FILES

- `SECURITY_AUDIT_REPORT.md` - Comprehensive security audit
- `LIBRARY_UPDATE_GUIDE.md` - Step-by-step library update guide
- `PROJECT_CONTEXT.md` - This file (project overview)

---

## 🎯 QUICK START FOR NEW SESSION

1. **Read this file** untuk memahami project
2. **Check git log** untuk melihat perubahan terbaru:
   ```bash
   git log --oneline -20
   ```
3. **Check current branch**:
   ```bash
   git branch
   ```
4. **Identify task** dari user
5. **Read relevant files** sebelum modify
6. **Test changes** thoroughly
7. **Commit with clear message**

---

## 📝 CHANGELOG SUMMARY

### 2025-11-26:
- Add Profil Pejabat Struktural submenu (pejabat.php)
- Add Tentang PPID submenu (tentang.php)
- Update Profil controller with new methods (pejabat, tentang)
- Restructure menu: Berita → Pengumuman (dropdown)
- Add LHKPN submenu (lhkpn.php in pengumuman folder)
- Add Pengumuman Barang dan Jasa submenu (barjas.php)
- Update Home controller with barjas() method
- Move lhkpn view to pengumuman folder

### 2025-11-23:
- Massive admin panel UI/UX fixes (navbar, sidebar, responsive)
- CSP updates untuk Google services
- Bootstrap 4 compatibility improvements
- Icon paths fixes

### 2025-11-22:
- Security audit completed
- Critical security fixes (SQL injection, SSL, path traversal)
- Library updates (jQuery, Bootstrap, CodeIgniter)
- Rate limiting implementation
- Cleanup unused files

### 2025-11-21:
- Audit logging implementation
- Session debugging
- Database optimizations

---

**END OF PROJECT CONTEXT**

**Version:** 1.0
**Last Updated:** 2025-11-26
**Maintainer:** Claude AI Assistant
