<?php
// Router script for PHP built-in server
// If the requested resource exists as a file, let the server serve it directly.
$uri = urldecode(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH));
$file = __DIR__ . $uri;
if ($uri !== '/' && file_exists($file) && !is_dir($file)) {
    return false; // serve the requested resource as-is
}

// Convert path into GET parameter used by the app's router
$path = ltrim($uri, '/');
$_GET['url'] = $path === '' ? '/' : $path;

require __DIR__ . '/index.php';
