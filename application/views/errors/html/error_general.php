<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Terjadi Kesalahan</title>
    <style type="text/css">
        * { margin: 0; padding: 0; box-sizing: border-box; }
        body {
            background: linear-gradient(135deg, #f093fb 0%, #f5576c 100%);
            font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, sans-serif;
            display: flex;
            align-items: center;
            justify-content: center;
            min-height: 100vh;
            padding: 20px;
        }
        .error-container {
            background: white;
            border-radius: 20px;
            box-shadow: 0 20px 60px rgba(0,0,0,0.3);
            padding: 60px 40px;
            text-align: center;
            max-width: 600px;
            width: 100%;
        }
        .error-code {
            font-size: 120px;
            font-weight: 700;
            color: #f5576c;
            line-height: 1;
            margin-bottom: 20px;
        }
        .error-title {
            font-size: 32px;
            font-weight: 600;
            color: #2d3748;
            margin-bottom: 15px;
        }
        .error-message {
            font-size: 18px;
            color: #718096;
            margin-bottom: 30px;
            line-height: 1.6;
        }
        .btn-home {
            display: inline-block;
            background: linear-gradient(135deg, #f093fb 0%, #f5576c 100%);
            color: white;
            padding: 15px 40px;
            border-radius: 50px;
            text-decoration: none;
            font-weight: 600;
            transition: transform 0.2s;
        }
        .btn-home:hover {
            transform: translateY(-2px);
        }
        @media (max-width: 768px) {
            .error-code { font-size: 80px; }
            .error-title { font-size: 24px; }
        }
    </style>
</head>
<body>
    <div class="error-container">
        <div style="font-size: 80px; margin-bottom: 20px;">⚠️</div>
        <div class="error-code">500</div>
        <h1 class="error-title">Terjadi Kesalahan</h1>
        <p class="error-message">
            Maaf, terjadi kesalahan pada server.<br>
            Tim kami telah diberitahu dan sedang memperbaikinya.
        </p>
        <a href="<?php echo base_url(); ?>" class="btn-home">Kembali ke Beranda</a>
        <p style="margin-top: 30px; color: #a0aec0; font-size: 14px;">
            Jika masalah berlanjut, silakan hubungi administrator.
        </p>
    </div>
</body>
</html>
