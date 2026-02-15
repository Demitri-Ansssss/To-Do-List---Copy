<?php

// Add debug headers
header('X-Debug-Entry-Point: api/index.php');
header('X-Debug-Request-URI: ' . ($_SERVER['REQUEST_URI'] ?? 'not-set'));
header('X-Debug-Script-Name: ' . ($_SERVER['SCRIPT_NAME'] ?? 'not-set'));

// Forward Vercel requests to normal index.php
require __DIR__ . '/../public/index.php';
