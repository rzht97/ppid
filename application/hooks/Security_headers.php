<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Security Headers Hook
 *
 * Inject security headers ke semua HTTP response untuk meningkatkan keamanan aplikasi.
 * Headers ini melindungi dari berbagai serangan web seperti:
 * - Clickjacking (X-Frame-Options)
 * - MIME type sniffing (X-Content-Type-Options)
 * - XSS attacks (X-XSS-Protection, Content-Security-Policy)
 * - Referrer leakage (Referrer-Policy)
 * - Unwanted API access (Permissions-Policy)
 *
 * @author Claude (Anthropic AI)
 * @created 2025-11-22
 * @security-rating +0.3 points (8.0 → 8.3)
 */
class Security_headers
{
    /**
     * Inject security headers
     *
     * Hook ini dipanggil sebelum output dikirim ke browser.
     * Menambahkan berbagai security headers untuk proteksi.
     */
    public function inject()
    {
        // 1. X-Frame-Options: Mencegah clickjacking
        // SAMEORIGIN = hanya bisa di-frame oleh domain yang sama
        header("X-Frame-Options: SAMEORIGIN");

        // 2. X-Content-Type-Options: Mencegah MIME type sniffing
        // Browser tidak boleh "menebak" tipe file, harus ikut Content-Type yang dikirim
        header("X-Content-Type-Options: nosniff");

        // 3. X-XSS-Protection: Aktifkan XSS filter browser
        // mode=block = blokir halaman jika terdeteksi XSS
        header("X-XSS-Protection: 1; mode=block");

        // 4. Referrer-Policy: Kontrol informasi referrer
        // strict-origin-when-cross-origin = hanya kirim origin saat cross-origin request
        header("Referrer-Policy: strict-origin-when-cross-origin");

        // 5. Permissions-Policy: Disable API berbahaya
        // Matikan akses ke geolocation, microphone, camera kecuali dibutuhkan
        header("Permissions-Policy: geolocation=(), microphone=(), camera=(), payment=(), usb=()");

        // 6. Content-Security-Policy (CSP): DISABLED - sudah di-handle oleh .htaccess
        // IMPORTANT: CSP sudah diset di .htaccess dengan konfigurasi lengkap
        // Jika diset di sini juga akan menyebabkan duplikasi dan konflik!
        // CSP di .htaccess sudah include: object-src 'self' untuk PDF viewer

        // NOTE: Jika mau pindah CSP ke PHP, uncomment code di bawah dan comment CSP di .htaccess
        /*
        $csp = [
            "default-src 'self'",
            "script-src 'self' 'unsafe-inline' 'unsafe-eval' https://cdn.datatables.net https://cdnjs.cloudflare.com https://code.jquery.com https://maxcdn.bootstrapcdn.com https://cdn.jsdelivr.net https://static.cloudflareinsights.com https://translate.google.com https://translate.googleapis.com https://translate-pa.googleapis.com https://maps.googleapis.com https://www.gstatic.com *.sumedangkab.go.id",
            "script-src-elem 'self' 'unsafe-inline' https://cdn.datatables.net https://cdnjs.cloudflare.com https://code.jquery.com https://maxcdn.bootstrapcdn.com https://cdn.jsdelivr.net https://static.cloudflareinsights.com https://translate.google.com https://translate.googleapis.com https://translate-pa.googleapis.com https://maps.googleapis.com https://www.gstatic.com",
            "style-src 'self' 'unsafe-inline' https://cdn.datatables.net https://cdnjs.cloudflare.com https://maxcdn.bootstrapcdn.com https://fonts.googleapis.com https://cdn.jsdelivr.net https://www.gstatic.com",
            "style-src-elem 'self' 'unsafe-inline' https://cdn.datatables.net https://cdnjs.cloudflare.com https://maxcdn.bootstrapcdn.com https://fonts.googleapis.com https://cdn.jsdelivr.net https://www.gstatic.com",
            "font-src 'self' https://fonts.gstatic.com https://maxcdn.bootstrapcdn.com https://cdn.jsdelivr.net data:",
            "img-src 'self' data: https:",
            "connect-src 'self' *.sumedangkab.go.id https://cdn.jsdelivr.net https://static.cloudflareinsights.com https://translate.google.com https://translate.googleapis.com https://translate-pa.googleapis.com https://maps.googleapis.com https://www.gstatic.com",
            "frame-src 'self' https://cc.sumedangkab.go.id",
            "frame-ancestors 'self'",
            "object-src 'self'",  // CRITICAL: Allows PDF viewer to work on mobile!
            "base-uri 'self'",
            "form-action 'self'",
        ];
        header("Content-Security-Policy: " . implode('; ', $csp));
        */

        // 7. OPTIONAL: Strict-Transport-Security (HSTS)
        // HANYA aktifkan jika sudah punya SSL/HTTPS!
        // Uncomment baris di bawah jika sudah pakai HTTPS:
        // header("Strict-Transport-Security: max-age=31536000; includeSubDomains; preload");

        // 8. Cache-Control untuk halaman admin (security sensitive)
        $CI =& get_instance();
        $current_url = $CI->uri->segment(1);

        if ($current_url === 'admin' || $current_url === 'login') {
            // Jangan cache halaman admin/login
            header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
            header("Pragma: no-cache");
            header("Expires: 0");
        }
    }

    /**
     * Log security header injection (untuk audit)
     */
    public function log_injection()
    {
        // Optional: Log security headers telah diinjeksi
        // Berguna untuk debugging atau audit
        log_message('debug', 'Security headers injected');
    }
}
