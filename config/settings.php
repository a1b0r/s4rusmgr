<?php

// Error reporting for development
// error_reporting(E_ALL);
// ini_set('display_errors', '1');

// Error reporting for production
error_reporting(0);
ini_set('display_errors', '0');

// Timezone
date_default_timezone_set('Europe/Berlin');

// Settings
$settings = [];

// Path settings
$settings['root'] = dirname(__DIR__);

// Error Handling Middleware settings
$settings['error'] = [
    // Should be set to false in production
    'display_error_details' => true,

    // Parameter is passed to the default ErrorHandler
    // View in rendered output by enabling the "displayErrorDetails" setting.
    // For the console and unit tests we also disable it
    'log_errors' => true,

    // Display error details in error log
    'log_error_details' => true,
];

// Database settings
$settings['db'] = [
    'driver' => 'sqlsrv',
    'host' => 'msql',
    'database' => 'exp',
    'username' => 'sa',
    'password' => 'p@Ssw0Rd',
    'charset' => 'utf8mb4',
];

return $settings;