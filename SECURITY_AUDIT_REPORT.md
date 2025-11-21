# Security Audit Report - PPID Sumedang Kab.

## Executive Summary

This is a CodeIgniter 3 PHP web application for public information request management (PPID - Pejabat Pengelola Informasi dan Dokumentasi). The application has multiple security vulnerabilities ranging from critical to medium severity.

---

## 1. PROJECT TYPE & STRUCTURE

### Framework & Technology Stack
- **Framework**: CodeIgniter 3.1.x
- **Language**: PHP
- **Database**: MySQL/MariaDB (mysqli driver)
- **Server**: Apache with mod_rewrite
- **Purpose**: Indonesian Public Information Request Management System

### Directory Structure
```
/home/user/ppid/
├── application/          # CodeIgniter application folder
├── system/              # CodeIgniter system folder
├── inverse/             # Frontend assets (deprecated/legacy)
├── newestassets/        # Current frontend assets
├── upload/              # File upload directory
├── index.php            # Main entry point
└── .htaccess            # Apache configuration
```

---

## 2. CRITICAL SECURITY VULNERABILITIES

### CRITICAL-1: SQL Injection in Admin View
**File**: `/home/user/ppid/application/views/dev/admin/permohonanv2/detail.php`
**Lines**: 2-3
**Severity**: CRITICAL

```php
<?php
$nama = $_POST['nama'];
$detail = $this->db->query("SELECT * FROM permohonan WHERE nama = '$nama'")->result();
?>
```

**Issue**: Direct unsanitized POST variable concatenated into SQL query. Allows SQL injection attacks.
**Impact**: Complete database compromise, data exfiltration, unauthorized data modification/deletion.

**Recommended Fix**: Use CodeIgniter's Query Builder with parameterized queries:
```php
$nama = $this->input->post('nama', TRUE);
$detail = $this->db->get_where('permohonan', ['nama' => $nama])->result();
```

---

### CRITICAL-2: Hardcoded Database Credentials in Commented Code
**File**: `/home/user/ppid/application/config/database.php`
**Lines**: 98-118
**Severity**: CRITICAL

```php
/*$db['db2'] = array(
    'hostname' => '103.8.238.165',
    'username' => 'sumedangkab',
    'password' => 'rAGfaL42dvq6EeP',
    ...
);*/
```

**Issue**: Database credentials exposed in source code, even though commented.
**Impact**: Exposed server IP, username, and password for database access.

**Recommended Fix**: 
- Remove commented code entirely
- Use environment variables (create .env file):
```php
$db['default'] = array(
    'hostname' => getenv('DB_HOST'),
    'username' => getenv('DB_USER'),
    'password' => getenv('DB_PASS'),
    ...
);
```

---

### CRITICAL-3: Hardcoded API Key
**File**: `/home/user/ppid/application/controllers/Berita.php`
**Lines**: 38, 87
**Severity**: CRITICAL

```php
CURLOPT_HTTPHEADER => array(
    'X-API-KEY: Sumedang#3211'
),
```

**Issue**: Hardcoded API key in source code for external API calls.
**Impact**: API key compromise if source code is exposed; unauthorized API access by attackers.

**Recommended Fix**: Move to environment variables or secure configuration file.

---

### CRITICAL-4: SSL Certificate Verification Disabled
**File**: `/home/user/ppid/application/controllers/Berita.php`
**Lines**: 40, 89
**Severity**: CRITICAL

```php
CURLOPT_SSL_VERIFYPEER => false,
```

**Issue**: SSL verification disabled for HTTPS connections. Vulnerable to Man-in-the-Middle (MITM) attacks.
**Impact**: Attackers can intercept and modify API responses.

**Recommended Fix**: Enable SSL verification in production:
```php
CURLOPT_SSL_VERIFYPEER => true,
CURLOPT_SSL_VERIFYHOST => 2,
```

---

## 3. HIGH SEVERITY VULNERABILITIES

### HIGH-1: CSRF Protection Disabled
**File**: `/home/user/ppid/application/config/config.php`
**Line**: 456
**Severity**: HIGH

```php
$config['csrf_protection'] = FALSE;  // DISABLED - CI3 + PHP 8.1 compatibility issues
```

**Issue**: CSRF protection is completely disabled. All state-changing requests are vulnerable to CSRF attacks.
**Impact**: Attackers can forge requests on behalf of authenticated users.

**Recommended Fix**:
```php
$config['csrf_protection'] = TRUE;
$config['csrf_token_name'] = 'ppid_csrf_token';
$config['csrf_cookie_name'] = 'ppid_csrf_cookie';
$config['csrf_expire'] = 7200;
```

Add CSRF tokens to all forms:
```php
<input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
```

---

### HIGH-2: Global XSS Filtering Disabled
**File**: `/home/user/ppid/application/config/config.php`
**Line**: 449
**Severity**: HIGH

```php
$config['global_xss_filtering'] = FALSE;
```

**Issue**: Global XSS filtering is disabled. Requires manual XSS prevention in all views.
**Impact**: Multiple XSS vulnerabilities possible throughout the application.

**Recommended Fix**: 
```php
$config['global_xss_filtering'] = TRUE;
```

OR use htmlspecialchars/htmlentities on all output:
```php
<?php echo htmlspecialchars($data->field, ENT_QUOTES, 'UTF-8'); ?>
```

---

### HIGH-3: Dangerous Unserialization
**File**: `/home/user/ppid/application/libraries/Format.php`
**Line**: 515
**Severity**: HIGH

```php
protected function _from_serialize($data)
{
    return unserialize(trim($data));
}
```

**Issue**: Use of unserialize() on untrusted data can lead to object injection attacks.
**Impact**: Remote code execution if attacker can control serialized data.

**Recommended Fix**: Use json_decode/json_encode instead:
```php
protected function _from_serialize($data)
{
    return json_decode(trim($data), true);
}
```

---

### HIGH-4: Missing Input Validation on File Uploads
**File**: `/home/user/ppid/application/models/Permohonan_model.php`
**Lines**: 302-319
**Severity**: HIGH

```php
private function _uploadFile()
{
    $config['upload_path']          = './upload/ktp/';
    $config['allowed_types']        = 'png|jpg|jpeg|pdf|';  // Empty string allows all types!
    $config['file_name']            = $this->mohon_id;
    $config['max_size']             = 20024; // Only ~20KB
}
```

**Issue**: 
1. Trailing pipe (|) in allowed_types allows all file types
2. Very low max_size (20KB) may cause legitimate files to be rejected
3. No MIME type verification

**Recommended Fix**:
```php
$config['allowed_types'] = 'pdf|jpg|jpeg|png';
$config['max_size'] = 5242880; // 5MB
```

---

### HIGH-5: Missing File Type Validation in Documents Upload
**File**: `/home/user/ppid/application/models/Dokumen_model.php`
**Line**: 140
**Severity**: HIGH

```php
$config['allowed_types'] = 'docx|doc|pdf|xlsx';
```

**Issue**: Incomplete validation. No verification of actual file content/MIME type, only extension-based.
**Recommended Fix**: Add MIME type verification using file_info or similar.

---

## 4. MEDIUM SEVERITY VULNERABILITIES

### MEDIUM-1: Dangerous Encryption Key Configuration
**File**: `/home/user/ppid/application/config/config.php`
**Line**: 331
**Severity**: MEDIUM

```php
$config['encryption_key'] = '';
```

**Issue**: Encryption key is empty. If CI encryption library is used, encryption provides no security.
**Recommended Fix**: Generate and set a strong encryption key:
```php
$config['encryption_key'] = bin2hex(random_bytes(32));
```

---

### MEDIUM-2: No HTTPS Redirect in Production
**File**: `/home/user/ppid/.htaccess`
**Lines**: 4-6
**Severity**: MEDIUM

```apache
# Redirect to HTTPS (optional - uncomment for production)
# RewriteCond %{HTTPS} off
# RewriteRule ^(.*)$ https://%{HTTP_HOST}%{REQUEST_URI} [L,R=301]
```

**Issue**: HTTPS redirect is commented out. Traffic may be sent over unencrypted HTTP.
**Recommended Fix**: Enable HTTPS redirect in production:
```apache
RewriteCond %{HTTPS} off
RewriteRule ^(.*)$ https://%{HTTP_HOST}%{REQUEST_URI} [L,R=301]
```

---

### MEDIUM-3: No Rate Limiting on File Downloads
**File**: `/home/user/ppid/application/models/Permohonan_model.php`
**Lines**: 415-418
**Severity**: MEDIUM

```php
public function download($id){
    $query = $this->db->get_where('dokumen',array('mohon_id'=>$mohon_id));
    return $query->row_array();
}
```

**Issue**: 
1. Undefined variable `$mohon_id` (should be `$id`)
2. No verification that user owns this file
3. No rate limiting on downloads

**Recommended Fix**: Add access control and rate limiting.

---

### MEDIUM-4: Information Disclosure - Debug Error Messages
**File**: `/home/user/ppid/index.php`
**Lines**: 69-76
**Severity**: MEDIUM

```php
case 'development':
    error_reporting(E_ALL & ~E_DEPRECATED & ~E_STRICT);
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
```

**Issue**: Error display enabled in development environment. If environment accidentally set to development in production, full error details exposed.
**Recommended Fix**: Ensure ENVIRONMENT is set to 'production' on production server and never changed.

---

### MEDIUM-5: Raw $_POST Access Without Validation
**File**: `/home/user/ppid/application/controllers/Login.php`
**Lines**: 40-43
**Severity**: MEDIUM

```php
// TEMPORARY FIX: Bypass CI input class and use raw $_POST
// CI input->post() is returning NULL, but $_POST works in pure PHP
$username = isset($_POST['username']) ? trim(strip_tags($_POST['username'])) : '';
$password = isset($_POST['password']) ? $_POST['password'] : '';
```

**Issue**: Direct $_POST access with minimal sanitization instead of using CodeIgniter's input class.
**Recommended Fix**: Use proper CodeIgniter input handling:
```php
$username = $this->input->post('username', TRUE);
$password = $this->input->post('password', TRUE);
```

---

### MEDIUM-6: Password Stored in MD5 (Legacy)
**File**: `/home/user/ppid/application/controllers/Login.php`
**Lines**: 59
**Severity**: MEDIUM

```php
// Fallback to MD5 for old passwords
elseif($user->password === md5($password)){
    $password_valid = true;
```

**Issue**: While being migrated to bcrypt, MD5 passwords are still supported and verified directly (vulnerable to rainbow tables).
**Recommended Fix**: Force password reset for all users with MD5 passwords. Remove MD5 fallback once all users migrated.

---

## 5. LOW SEVERITY VULNERABILITIES

### LOW-1: Weak Session Configuration
**File**: `/home/user/ppid/application/config/config.php`
**Severity**: LOW

**Issue**: Session timeout should be shorter for sensitive operations.
**Recommended Fix**: 
```php
$config['sess_expiration'] = 3600; // 1 hour
$config['sess_time_to_update'] = 300; // 5 minutes
```

---

### LOW-2: Missing Secure Password Policy
**Severity**: LOW

**Issue**: No password complexity requirements enforced during user creation/password change.
**Recommended Fix**: 
```php
public function validate_password($password) {
    // Minimum 12 characters, uppercase, lowercase, numbers, special chars
    if (strlen($password) < 12) return false;
    if (!preg_match('/[A-Z]/', $password)) return false;
    if (!preg_match('/[a-z]/', $password)) return false;
    if (!preg_match('/[0-9]/', $password)) return false;
    if (!preg_match('/[!@#$%^&*]/', $password)) return false;
    return true;
}
```

---

## 6. SECURITY IMPROVEMENTS IMPLEMENTED

The following security measures are already in place:

1. **Authentication & Authorization**
   - Login session check in admin controllers
   - Bcrypt password hashing (with MD5 migration support)
   - Session regeneration on login
   - Rate limiting on login attempts (5 attempts in 15 minutes)

2. **HTTPS Security Headers** (in .htaccess)
   - X-Frame-Options: SAMEORIGIN (clickjacking protection)
   - X-Content-Type-Options: nosniff (MIME sniffing prevention)
   - X-XSS-Protection: 1; mode=block
   - Referrer-Policy: strict-origin-when-cross-origin

3. **Session Security**
   - Secure cookie flag enabled
   - HTTPOnly cookie flag enabled
   - Session files in secure location

4. **Some Input Validation**
   - Form validation rules in models
   - Some use of CodeIgniter's form validation library
   - Some use of htmlspecialchars() in newer views

5. **Rate Limiting**
   - Session-based rate limiting on public forms (3 submissions per 10 minutes)
   - IP-based throttling (5 submissions per IP per hour)
   - Honeypot field detection for bots

---

## 7. RECOMMENDED FIXES PRIORITY

### Priority 1 - CRITICAL (Fix immediately)
1. Remove/fix SQL injection in detail.php
2. Remove hardcoded database credentials
3. Remove hardcoded API key
4. Enable SSL verification for API calls
5. Enable CSRF protection

### Priority 2 - HIGH (Fix within 1 week)
1. Enable global XSS filtering or implement output encoding
2. Replace unserialize() with json_decode()
3. Fix file upload validation (trailing pipe issue)
4. Enable HTTPS redirect in .htaccess
5. Set encryption key

### Priority 3 - MEDIUM (Fix within 1 month)
1. Fix raw $_POST access in Login controller
2. Implement stricter password policy
3. Remove MD5 password support after migration
4. Add access control to file downloads
5. Improve error message handling

---

## 8. SECURITY TESTING RECOMMENDATIONS

1. **Penetration Testing**: Conduct professional penetration test on login functionality and file upload features
2. **Static Code Analysis**: Use tools like SonarQube, PHPStan, or Psalm
3. **Dependency Scanning**: Audit third-party libraries for known vulnerabilities
4. **SQL Injection Testing**: Test all database queries with SQLi payloads
5. **XSS Testing**: Test all user input fields with XSS payloads
6. **Authentication Testing**: Test session fixation, brute force protection, privilege escalation

---

## 9. SECURITY CHECKLIST FOR DEPLOYMENT

Before deploying to production:

- [ ] Verify ENVIRONMENT set to 'production' in index.php
- [ ] Enable CSRF protection in config/config.php
- [ ] Enable global XSS filtering in config/config.php
- [ ] Set strong encryption key in config/config.php
- [ ] Remove all debug/commented code containing sensitive data
- [ ] Enable HTTPS redirect in .htaccess
- [ ] Verify SSL certificate is valid and not expired
- [ ] Set proper file permissions (644 for files, 755 for directories)
- [ ] Remove/backup upload directories from web root or add .htaccess to prevent execution
- [ ] Configure log rotation for application/logs/
- [ ] Set up monitoring and alerting for suspicious activities
- [ ] Implement Web Application Firewall (WAF) rules
- [ ] Regular security updates for CodeIgniter, PHP, and dependencies

---

End of Security Audit Report
