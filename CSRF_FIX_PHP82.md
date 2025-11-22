# CSRF FIX untuk CodeIgniter 3 + PHP 8.2

## Root Cause
CI 3.1.10 tidak support SameSite cookie attribute yang required di PHP 7.3+.
Ini menyebabkan browser reject CSRF token cookie, dan POST request di-redirect jadi GET.

## Solusi 1: Patch Security.php (RECOMMENDED)

### File: `/system/core/Security.php`

Replace method `csrf_set_cookie()` (line 264-286) dengan:

```php
public function csrf_set_cookie()
{
    $expire = time() + $this->_csrf_expire;
    $secure_cookie = (bool) config_item('cookie_secure');

    if ($secure_cookie && ! is_https())
    {
        return FALSE;
    }

    // PHP 7.3+ support with SameSite attribute
    if (PHP_VERSION_ID >= 70300) {
        setcookie(
            $this->_csrf_cookie_name,
            $this->_csrf_hash,
            [
                'expires' => $expire,
                'path' => config_item('cookie_path'),
                'domain' => config_item('cookie_domain'),
                'secure' => $secure_cookie,
                'httponly' => config_item('cookie_httponly'),
                'samesite' => 'Lax'  // ✅ FIX: Add SameSite
            ]
        );
    } else {
        // Fallback for PHP < 7.3
        setcookie(
            $this->_csrf_cookie_name,
            $this->_csrf_hash,
            $expire,
            config_item('cookie_path'),
            config_item('cookie_domain'),
            $secure_cookie,
            config_item('cookie_httponly')
        );
    }

    log_message('info', 'CSRF cookie sent');

    return $this;
}
```

## Solusi 2: Config Workaround (FALLBACK)

Jika tidak mau modify core CI, gunakan workaround ini:

### File: `/application/config/config.php`

```php
// Line 465-470: CSRF Settings
$config['csrf_protection'] = TRUE;  // ✅ Enable CSRF
$config['csrf_token_name'] = 'ppid_csrf_token';
$config['csrf_cookie_name'] = 'ppid_csrf_cookie';
$config['csrf_expire'] = 7200;
$config['csrf_regenerate'] = FALSE;  // ✅ Set FALSE untuk avoid race condition
$config['csrf_exclude_uris'] = array();

// Cookie settings
$config['cookie_secure'] = FALSE;  // ✅ Set FALSE jika localhost (tidak HTTPS)
$config['cookie_httponly'] = TRUE;
```

⚠️ **Trade-off**: `csrf_regenerate = FALSE` berarti token tidak di-regenerate setiap request.
Ini sedikit mengurangi security, tapi masih aman karena token expire setelah 7200 detik (2 jam).

## Solusi 3: Manual CSRF Token di View

Tambahkan CSRF token manual di semua form:

```php
<form method="POST" action="<?php echo site_url('login/aksi_login'); ?>">
    <!-- Add CSRF token -->
    <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>"
           value="<?php echo $this->security->get_csrf_hash(); ?>">

    <input type="text" name="username" required>
    <input type="password" name="password" required>
    <button type="submit">Login</button>
</form>
```

## Testing

1. Enable CSRF: `$config['csrf_protection'] = TRUE;`
2. Test login form
3. Cek browser console untuk cookie errors
4. Cek application/logs untuk CSRF errors

## Recommended: Solusi 1 + Solusi 2
- Patch Security.php untuk permanent fix
- Set csrf_regenerate = FALSE untuk stability
- Set cookie_secure = FALSE untuk localhost testing
