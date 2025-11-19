# Panduan Setup Database PPID - XAMPP

## Quick Setup (3 Menit)

### Metode 1: Via phpMyAdmin (RECOMMENDED - Paling Mudah!)

1. **Buka phpMyAdmin**
   ```
   http://localhost:8080/phpmyadmin
   ```

2. **Klik Tab "SQL"** di menu atas

3. **Copy & Paste Script SQL**
   - Buka file: `database_migrations/01_create_database.sql`
   - Copy SEMUA isi file
   - Paste di phpMyAdmin SQL tab
   - Klik tombol **"Go"** atau **"Kirim"**

4. **Selesai!** Database `ppid` sudah siap digunakan

### Metode 2: Via Command Line

1. **Buka Command Prompt**
   ```bash
   # Windows
   cmd
   ```

2. **Masuk ke MySQL bin directory**
   ```bash
   cd C:\xampp81\mysql\bin
   ```

3. **Login ke MySQL**
   ```bash
   mysql -u root -p
   ```
   Tekan ENTER (password default XAMPP kosong)

4. **Import SQL File**
   ```sql
   source C:\xampp81\htdocs\ppidC\database_migrations\01_create_database.sql
   ```

5. **Verifikasi**
   ```sql
   SHOW DATABASES;
   USE ppid;
   SHOW TABLES;
   ```

---

## Verifikasi Database

### Test Database Connection

Akses file test yang sudah Anda buat:
```
http://localhost:8080/ppidC/testdb.php
```

**Expected Result**: "Database connected successfully!"

**Jika masih error**: Periksa langkah berikut

---

## Struktur Database

Setelah setup, database `ppid` akan memiliki tabel:

### 1. `permohonan` - Tabel Permohonan Informasi
| Field | Type | Description |
|-------|------|-------------|
| mohon_id | VARCHAR(20) | Primary Key (P191125001) |
| nama | VARCHAR(255) | Nama pemohon |
| alamat | TEXT | Alamat lengkap |
| nohp | VARCHAR(20) | Nomor HP |
| email | VARCHAR(255) | Email |
| pekerjaan | VARCHAR(100) | Pekerjaan |
| rincian | TEXT | Rincian informasi |
| tujuan | TEXT | Tujuan penggunaan |
| caraperoleh | VARCHAR(100) | Cara memperoleh |
| caramendapat | VARCHAR(100) | Cara mendapat salinan |
| tanggal | DATETIME | Tanggal permohonan |
| status | VARCHAR(50) | Status permohonan |
| jawab | TEXT | Jawaban PPID |
| tanggaljawab | DATETIME | Tanggal jawaban |
| created_at | TIMESTAMP | Waktu dibuat |
| updated_at | TIMESTAMP | Waktu diupdate |

### 2. `keberatan` - Tabel Keberatan
| Field | Type | Description |
|-------|------|-------------|
| id_keberatan | VARCHAR(20) | Primary Key (K191125001) |
| mohon_id | VARCHAR(20) | Foreign Key ke permohonan |
| alasan | VARCHAR(255) | Alasan keberatan |
| kronologi | TEXT | Kronologi detail |
| tanggal | DATETIME | Tanggal keberatan |
| tanggapan | TEXT | Tanggapan PPID |
| putusan | TEXT | Putusan |
| status | VARCHAR(50) | Status keberatan |
| created_at | TIMESTAMP | Waktu dibuat |
| updated_at | TIMESTAMP | Waktu diupdate |

### 3. `user` - Tabel Admin User
| Field | Type | Description |
|-------|------|-------------|
| id_user | INT(11) | Primary Key Auto Increment |
| username | VARCHAR(100) | Username login |
| password | VARCHAR(255) | Password (hashed) |
| nama | VARCHAR(255) | Nama lengkap |
| email | VARCHAR(255) | Email |
| level | ENUM | admin/operator/viewer |
| status | ENUM | active/inactive |
| last_login | DATETIME | Login terakhir |
| created_at | TIMESTAMP | Waktu dibuat |
| updated_at | TIMESTAMP | Waktu diupdate |

### 4. `ci_sessions` - Tabel Session
| Field | Type | Description |
|-------|------|-------------|
| id | VARCHAR(128) | Session ID |
| ip_address | VARCHAR(45) | IP Address |
| timestamp | INT(10) | Timestamp |
| data | BLOB | Session data |

---

## Default Admin User

Setelah setup, Anda bisa login dengan:

```
Username: admin
Password: admin123
```

**⚠️ PENTING**:
- Segera ganti password setelah login pertama!
- Jangan gunakan password default di production!
- Akses admin: http://localhost:8080/ppidC/index.php/login

---

## Troubleshooting

### Error: "Access denied for user 'root'@'localhost'"

**Penyebab**: Password MySQL tidak kosong

**Solusi 1**: Cek password di XAMPP
```bash
# Buka phpMyAdmin, klik "User accounts"
# Cek user 'root' apakah ada password
```

**Solusi 2**: Update `application/config/database.php`
```php
'password' => 'your_mysql_password',  // Isi password MySQL
```

### Error: "Table 'ppid.permohonan' doesn't exist"

**Penyebab**: Database belum di-import dengan benar

**Solusi**: Ulangi import via phpMyAdmin
1. Pilih database `ppid` di sidebar kiri
2. Klik tab "SQL"
3. Copy paste isi `01_create_database.sql`
4. Klik "Go"

### Error: "Can't connect to MySQL server"

**Penyebab**: MySQL belum berjalan

**Solusi**:
1. Buka XAMPP Control Panel
2. Start MySQL
3. Pastikan status hijau

### Error: "Unknown database 'ppid'"

**Penyebab**: Database belum dibuat

**Solusi**: Buat database dulu
```sql
CREATE DATABASE ppid CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
```
Atau jalankan `01_create_database.sql`

---

## Migration Files

Setelah database utama dibuat, Anda bisa jalankan migration files (OPTIONAL):

1. `01_create_database.sql` ✅ **WAJIB** - Setup awal
2. `migrate_permohonan_table.sql` - Update struktur permohonan (jika diperlukan)
3. `migrate_keberatan_table.sql` - Update struktur keberatan (jika diperlukan)
4. `update_existing_ids_with_prefix.sql` - Update ID lama ke format baru (jika ada data lama)

**Cara jalankan migration**:
```sql
-- Via phpMyAdmin SQL tab
source C:\xampp81\htdocs\ppidC\database_migrations\nama_file.sql;
```

---

## Backup & Restore

### Backup Database

**Via phpMyAdmin**:
1. Pilih database `ppid`
2. Klik tab "Export"
3. Pilih "Quick" method
4. Format: SQL
5. Klik "Go"
6. File akan di-download

**Via Command Line**:
```bash
cd C:\xampp81\mysql\bin
mysqldump -u root -p ppid > backup_ppid_%date:~-4,4%%date:~-10,2%%date:~-7,2%.sql
```

### Restore Database

**Via phpMyAdmin**:
1. Pilih database `ppid`
2. Klik tab "Import"
3. Choose file (pilih file backup)
4. Klik "Go"

**Via Command Line**:
```bash
cd C:\xampp81\mysql\bin
mysql -u root -p ppid < backup_ppid_20250119.sql
```

---

## Database Configuration

### File: `application/config/database.php`

Pastikan konfigurasi ini benar:

```php
$active_group = 'default';
$query_builder = TRUE;

$db['default'] = array(
    'dsn'	=> '',
    'hostname' => 'localhost',    // atau 127.0.0.1
    'username' => 'root',         // default XAMPP
    'password' => '',             // default XAMPP kosong
    'database' => 'ppid',         // nama database
    'dbdriver' => 'mysqli',       // HARUS mysqli, bukan mysql
    'dbprefix' => '',
    'pconnect' => FALSE,
    'db_debug' => TRUE,           // Set FALSE di production
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

---

## SQL Queries Berguna

### Cek Status Database
```sql
-- Pilih database
USE ppid;

-- Lihat semua tabel
SHOW TABLES;

-- Lihat jumlah data
SELECT
    'permohonan' as tabel, COUNT(*) as jumlah FROM permohonan
UNION ALL
SELECT 'keberatan', COUNT(*) FROM keberatan
UNION ALL
SELECT 'user', COUNT(*) FROM user;

-- Lihat data terbaru
SELECT * FROM permohonan ORDER BY created_at DESC LIMIT 5;
SELECT * FROM keberatan ORDER BY created_at DESC LIMIT 5;
```

### Reset Database (Hapus Semua Data)
```sql
-- HATI-HATI: Ini akan menghapus SEMUA data!
TRUNCATE TABLE keberatan;
TRUNCATE TABLE permohonan;

-- User jangan di-truncate, cukup reset ke admin default
DELETE FROM user WHERE username != 'admin';
```

### Cek Foreign Key Constraints
```sql
SELECT
    TABLE_NAME,
    COLUMN_NAME,
    CONSTRAINT_NAME,
    REFERENCED_TABLE_NAME,
    REFERENCED_COLUMN_NAME
FROM
    INFORMATION_SCHEMA.KEY_COLUMN_USAGE
WHERE
    TABLE_SCHEMA = 'ppid'
    AND REFERENCED_TABLE_NAME IS NOT NULL;
```

---

## Performance Optimization

### Add Indexes (Jika diperlukan)
```sql
-- Index untuk search
ALTER TABLE permohonan ADD FULLTEXT INDEX idx_search (nama, rincian);

-- Index untuk filter status
ALTER TABLE permohonan ADD INDEX idx_status_date (status, tanggal);
ALTER TABLE keberatan ADD INDEX idx_status_date (status, tanggal);
```

### Optimize Tables
```sql
OPTIMIZE TABLE permohonan;
OPTIMIZE TABLE keberatan;
OPTIMIZE TABLE user;
```

### Analyze Tables
```sql
ANALYZE TABLE permohonan;
ANALYZE TABLE keberatan;
```

---

## Security Best Practices

### 1. Ganti Password Admin
```sql
-- Login sebagai admin, lalu ganti password via aplikasi
-- Atau manual via SQL (password: newpassword123)
UPDATE user
SET password = '$2y$10$abcd1234efgh5678ijkl9012mnop3456qrst7890uvwx1234yz567890'
WHERE username = 'admin';
```

### 2. Disable root Remote Access
```sql
-- Pastikan root hanya bisa akses dari localhost
DELETE FROM mysql.user WHERE User='root' AND Host NOT IN ('localhost', '127.0.0.1', '::1');
FLUSH PRIVILEGES;
```

### 3. Create Dedicated Database User (Recommended untuk Production)
```sql
-- Buat user khusus untuk aplikasi
CREATE USER 'ppid_user'@'localhost' IDENTIFIED BY 'strong_password_here';

-- Berikan akses hanya ke database ppid
GRANT SELECT, INSERT, UPDATE, DELETE ON ppid.* TO 'ppid_user'@'localhost';

-- Apply changes
FLUSH PRIVILEGES;

-- Update database.php
-- 'username' => 'ppid_user',
-- 'password' => 'strong_password_here',
```

---

## Checklist Setup Database

- [ ] MySQL berjalan di XAMPP
- [ ] Database `ppid` sudah dibuat
- [ ] Tabel `permohonan`, `keberatan`, `user`, `ci_sessions` ada
- [ ] Default admin user ada (username: admin)
- [ ] Test connection berhasil (testdb.php)
- [ ] File database.php sudah dikonfigurasi
- [ ] Login admin berhasil
- [ ] Hapus file testdb.php dan test.php setelah selesai

---

## Common MySQL Commands

```sql
-- Lihat database
SHOW DATABASES;

-- Gunakan database
USE ppid;

-- Lihat tabel
SHOW TABLES;

-- Lihat struktur tabel
DESCRIBE permohonan;

-- Lihat data
SELECT * FROM permohonan LIMIT 10;

-- Cek charset database
SELECT
    DEFAULT_CHARACTER_SET_NAME,
    DEFAULT_COLLATION_NAME
FROM
    information_schema.SCHEMATA
WHERE
    SCHEMA_NAME = 'ppid';

-- Cek size database
SELECT
    table_schema AS 'Database',
    ROUND(SUM(data_length + index_length) / 1024 / 1024, 2) AS 'Size (MB)'
FROM
    information_schema.tables
WHERE
    table_schema = 'ppid'
GROUP BY
    table_schema;
```

---

## Kontak & Support

Jika mengalami masalah:
1. Cek error log MySQL: `C:\xampp81\mysql\data\mysql_error.log`
2. Cek error log PHP: `C:\xampp81\php\logs\php_error_log`
3. Cek phpMyAdmin untuk verifikasi database

---

**Last Updated**: 2025-01-19
**Database Version**: MySQL 5.7+ / MariaDB 10.3+
**Character Set**: utf8mb4
**Collation**: utf8mb4_unicode_ci
