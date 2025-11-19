<?php
/**
 * Local Configuration Override
 *
 * File ini TIDAK di-commit ke Git (ditambahkan ke .gitignore)
 * Gunakan untuk override konfigurasi lokal development
 *
 * Untuk production, hapus atau rename file ini
 */

// ==================================================
// KONFIGURASI LOKAL DEVELOPMENT
// ==================================================

/**
 * Base URL Configuration
 *
 * Uncomment dan sesuaikan dengan environment lokal Anda:
 */

// XAMPP Windows (folder ppidC)
// define('BASE_URL', 'http://localhost/ppidC/');

// XAMPP Windows (folder ppid)
// define('BASE_URL', 'http://localhost/ppid/');

// Laragon
// define('BASE_URL', 'http://ppid.test/');

// MAMP Mac
// define('BASE_URL', 'http://localhost:8888/ppid/');

// PHP Built-in Server
// define('BASE_URL', 'http://localhost:8000/');

// Custom Domain (production)
// define('BASE_URL', 'https://ppid.example.com/');

/**
 * AUTO-DETECT BASE URL (Default - Recommended)
 * Jika BASE_URL tidak di-define di atas, akan otomatis detect
 */
if (!defined('BASE_URL')) {
    $base_url = ((isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] == "on") ? "https" : "http");
    $base_url .= "://" . $_SERVER['HTTP_HOST'];
    $base_url .= str_replace(basename($_SERVER['SCRIPT_NAME']), "", $_SERVER['SCRIPT_NAME']);
    define('BASE_URL', $base_url);
}

/**
 * Database Configuration Override (Optional)
 * Uncomment untuk override database settings
 */

/*
define('DB_HOSTNAME', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
define('DB_DATABASE', 'ppid_database');
define('DB_DRIVER', 'mysqli');
*/

/**
 * Environment Configuration
 */

// Development environment
define('ENVIRONMENT_LOCAL', 'development'); // development, testing, production

/**
 * Debug Mode
 */
if (ENVIRONMENT_LOCAL === 'development') {
    error_reporting(E_ALL);
    ini_set('display_errors', 1);
} else {
    error_reporting(0);
    ini_set('display_errors', 0);
}

/**
 * CSRF Protection Override (untuk testing)
 * PERINGATAN: Jangan disable di production!
 */
// define('CSRF_PROTECTION', FALSE); // Set TRUE untuk production

?>
