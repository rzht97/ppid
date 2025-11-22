<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| Hooks
| -------------------------------------------------------------------------
| This file lets you define "hooks" to extend CI without hacking the core
| files.  Please see the user guide for info:
|
|	https://codeigniter.com/user_guide/general/hooks.html
|
*/

/*
| -------------------------------------------------------------------------
| Security Headers Hook
| -------------------------------------------------------------------------
| Inject security headers ke semua HTTP response.
| Hook ini berjalan pada 'post_controller_constructor' agar headers
| diset sebelum output dikirim ke browser.
|
| Security headers yang diinjeksi:
| - X-Frame-Options: SAMEORIGIN (anti clickjacking)
| - X-Content-Type-Options: nosniff (anti MIME sniffing)
| - X-XSS-Protection: 1; mode=block (XSS protection)
| - Referrer-Policy: strict-origin-when-cross-origin (privacy)
| - Permissions-Policy: geolocation=(), microphone=(), camera=() (API control)
| - Content-Security-Policy: default-src 'self' ... (CSP protection)
|
| @security-rating +0.3 points (8.0 → 8.3)
*/
$hook['post_controller_constructor'] = array(
    'class'    => 'Security_headers',
    'function' => 'inject',
    'filename' => 'Security_headers.php',
    'filepath' => 'hooks'
);
