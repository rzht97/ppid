# ✅ DEPLOYMENT CHECKLIST - QUICK REFERENCE
## PPID Production Deployment

**Print checklist ini dan centang satu per satu!**

---

## 🔴 CRITICAL - SEBELUM DEPLOYMENT

```
[ ] Backup database production
    └─ mysqldump -u root -p ppid > backup_$(date +%Y%m%d).sql

[ ] Backup files production
    └─ tar -czf backup_files_$(date +%Y%m%d).tar.gz /path/to/ppid

[ ] Test backup bisa di-restore
    └─ mysql -u root -p ppid_test < backup_*.sql
```

---

## 🟠 HIGH PRIORITY - CONFIGURATION

```
[ ] index.php - ENVIRONMENT = 'production'

[ ] config.php - Update base_url
    └─ https://ppid.sumedangkab.go.id/

[ ] database.php - Update credentials
    ├─ hostname: localhost (production DB server)
    ├─ username: ppid_user (BUKAN root!)
    ├─ password: StrongPassword123!@#
    ├─ database: ppid_production
    ├─ db_debug: FALSE
    └─ save_queries: FALSE

[ ] config.php - Generate encryption_key baru
    └─ openssl rand -hex 16

[ ] config.php - Set cookie_secure
    └─ TRUE jika HTTPS, FALSE jika HTTP

[ ] Run database migration
    └─ mysql -u root -p ppid < database/migrations/001_create_audit_logs_table.sql

[ ] Delete installer after migration
    └─ rm database/install_migrations.php
```

---

## 🟡 MEDIUM PRIORITY - SECURITY

```
[ ] File permissions
    ├─ chmod 700 application/sessions/
    ├─ chmod 755 upload/
    ├─ chmod 640 application/config/database.php
    └─ chown -R www-data:www-data /path/to/ppid

[ ] Remove development files
    ├─ rm -rf .git
    ├─ rm .gitignore
    ├─ rm SECURITY_AUDIT_*.md
    └─ rm database/install_migrations.php

[ ] Verify .htaccess protection
    ├─ application/logs/.htaccess
    ├─ application/sessions/.htaccess
    ├─ upload/ktp/.htaccess
    └─ upload/dokumen/.htaccess

[ ] Create database user with minimal privileges
    └─ GRANT SELECT, INSERT, UPDATE, DELETE ON ppid.*

[ ] Update admin passwords (bcrypt, min 12 char)
```

---

## 🔵 OPTIONAL - HTTPS/SSL

```
[ ] Install SSL certificate
    └─ sudo certbot --apache -d ppid.sumedangkab.go.id

[ ] Force HTTPS redirect (.htaccess)

[ ] Enable HSTS header (Security_headers.php line 68)

[ ] Set cookie_secure = TRUE
```

---

## 🟢 TESTING - VERIFICATION

```
[ ] Homepage loads
[ ] Login admin works
[ ] Submit permohonan works
[ ] Submit keberatan works
[ ] Upload KTP works (test 5MB limit)
[ ] Upload dokumen works (test 10MB limit)
[ ] Rate limiting works (submit 4x cepat → error)
[ ] 404 error page works
[ ] 500 error page works
[ ] Security headers present (check DevTools)
[ ] Audit logs recording (check database)
[ ] Delete operations use POST method
```

---

## 🎯 POST-DEPLOYMENT VERIFICATION

```bash
# 1. Check environment
grep "ENVIRONMENT" index.php
# Expected: define('ENVIRONMENT', 'production');

# 2. Check base_url
grep "base_url" application/config/config.php
# Expected: https://your-domain.com/ppid/

# 3. Check log threshold
grep "log_threshold" application/config/config.php
# Expected: production ? 1 : 4

# 4. Check audit logs table
mysql -u root -p ppid -e "SHOW TABLES LIKE 'audit_logs';"
# Expected: 1 row

# 5. Check security headers
curl -I https://your-domain.com/ppid/
# Expected: X-Frame-Options, CSP, etc.

# 6. Check logs protection
curl https://your-domain.com/ppid/application/logs/
# Expected: 403 Forbidden

# 7. Check file permissions
ls -la application/sessions/
# Expected: drwx------ (700)

# 8. Test error page
curl https://your-domain.com/ppid/halaman-tidak-ada
# Expected: Beautiful 404 page (no stack trace)
```

---

## 🔥 EMERGENCY ROLLBACK

```bash
# If critical issue after deployment:

# 1. Restore database
mysql -u root -p ppid < backup_YYYYMMDD.sql

# 2. Restore files
cd /var/www/html/
rm -rf ppid
tar -xzf backup_files_YYYYMMDD.tar.gz

# 3. Restart services
sudo systemctl restart apache2

# 4. Check logs
tail -f application/logs/log-$(date +%Y-%m-%d).php
```

---

## 📊 MONITORING (Daily)

```bash
# Check application logs
tail -50 application/logs/log-$(date +%Y-%m-%d).php

# Check audit logs
mysql -u ppid_user -p ppid -e "
SELECT action, COUNT(*)
FROM audit_logs
WHERE DATE(created_at) = CURDATE()
GROUP BY action;"

# Check disk space
df -h

# Check upload directory size
du -sh upload/*
```

---

## ✅ DEPLOYMENT COMPLETE CHECKLIST

```
=== CRITICAL ===
[ ] Backup completed
[ ] ENVIRONMENT = production
[ ] base_url updated
[ ] Database credentials updated
[ ] Encryption key generated

=== SECURITY ===
[ ] File permissions correct
[ ] Development files removed
[ ] .htaccess protection verified
[ ] Admin passwords updated
[ ] Database user privileges minimal

=== DATABASE ===
[ ] Migration executed
[ ] Audit logs table created
[ ] Installer deleted

=== TESTING ===
[ ] All features tested
[ ] Security headers verified
[ ] Error pages work
[ ] Audit logging works
[ ] Rate limiting works

=== OPTIONAL ===
[ ] SSL certificate installed (if available)
[ ] HTTPS redirect enabled
[ ] Log rotation configured
[ ] Monitoring setup
```

---

## 📞 TROUBLESHOOTING

| Issue | Quick Fix |
|-------|-----------|
| CSRF error | Check `cookie_secure` setting (TRUE for HTTPS, FALSE for HTTP) |
| Session logout | `chmod 700 application/sessions/` |
| Upload fail | `chmod 755 upload/` + check PHP limits |
| DB error | Check credentials & privileges |
| 500 error | Check `application/logs/log-*.php` |

---

**Security Rating After Deployment:**
```
Expected: 8.5/10 (Excellent-)
With HTTPS: 8.7/10
Full optimization: 9.0/10
```

**Prepared:** 2025-11-22
**Version:** 1.0
