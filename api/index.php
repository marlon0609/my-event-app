<?php
// Vercel serverless entrypoint for Laravel
// Boot the Laravel HTTP kernel via the framework's public front controller.

// Ensure working directory is the project root for relative paths used by Laravel
chdir(dirname(__DIR__));

// Delegate to the standard Laravel front controller
require __DIR__ . '/../public/index.php';

