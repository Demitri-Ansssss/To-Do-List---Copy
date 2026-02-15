<?php

// Add debug headers
header('X-Debug-Entry-Point: api/index.php');
header('X-Debug-Request-URI: ' . ($_SERVER['REQUEST_URI'] ?? 'not-set'));
header('X-Debug-Script-Name: ' . ($_SERVER['SCRIPT_NAME'] ?? 'not-set'));

// Clear route cache on Vercel to ensure routes are loaded fresh
if (isset($_ENV['VERCEL']) || getenv('VERCEL')) {
    $routeCachePath = '/tmp/routes.php';
    if (file_exists($routeCachePath)) {
        unlink($routeCachePath);
        header('X-Debug-Route-Cache: cleared');
    } else {
        header('X-Debug-Route-Cache: not-found');
    }
}

// Forward Vercel requests to normal index.php
require __DIR__ . '/../public/index.php';
