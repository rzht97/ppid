<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
|--------------------------------------------------------------------------
| External API Configuration
|--------------------------------------------------------------------------
|
| Configuration for external API integrations
|
| SECURITY NOTE:
| - This file should be added to .gitignore in production
| - Use environment variables for production deployment
| - Never commit API keys to version control
|
*/

// News API Configuration
$config['news_api'] = array(
    'url' => 'https://sumedangkab.go.id/api/news',
    'key' => 'Sumedang#3211',
    'timeout' => 30,
    'verify_ssl' => true  // IMPORTANT: Keep SSL verification enabled
);

// Future API configurations can be added here
// Example:
// $config['other_api'] = array(
//     'url' => 'https://example.com/api',
//     'key' => 'your-api-key',
// );
