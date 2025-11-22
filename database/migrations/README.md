# Database Migrations - PPID Application

## Cara Menjalankan Migration

### Opsi 1: Via phpMyAdmin / MySQL GUI
1. Login ke phpMyAdmin
2. Pilih database `ppid`
3. Buka tab "SQL"
4. Copy-paste isi file `001_create_audit_logs_table.sql`
5. Klik "Go" untuk execute

### Opsi 2: Via Command Line
```bash
mysql -u root -p ppid < database/migrations/001_create_audit_logs_table.sql
```

### Opsi 3: Via PHP
Akses file ini via browser untuk auto-install:
`http://localhost:8080/ppid/database/install_migrations.php`

## Daftar Migrations

| File | Description | Status |
|------|-------------|--------|
| `001_create_audit_logs_table.sql` | Create audit_logs table for activity tracking | ⏳ Pending |

## Verifikasi Installation

Setelah migration berhasil, jalankan query ini untuk verifikasi:

```sql
SHOW TABLES LIKE 'audit_logs';
DESCRIBE audit_logs;
```

## Rollback (Jika Diperlukan)

Untuk menghapus tabel audit_logs:

```sql
DROP TABLE IF EXISTS `audit_logs`;
```

**⚠️ WARNING**: Rollback akan menghapus semua data audit log!
