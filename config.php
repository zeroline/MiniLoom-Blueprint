<?php

/**
 * Configuration for: Autoloading
 * We use Composer for autoloading
 */
require_once __DIR__ . '/vendor/autoload.php';

/**
 * Configuration for: Environment variables
 * We use Dotenv to load the .env file
 */
use Dotenv\Dotenv;
$dotenv = Dotenv::createImmutable(__DIR__);
$dotenv->load();
$dotenv->required([
    'ENVIRONMENT_IS_PRODUCTION',
    'USE_DB',
    'DB_HOST',
    'DB_PORT', 
    'DB_DATABASE', 
    'DB_USERNAME', 
    'DB_PASSWORD',
    'TIMEZONE',
    'ENCODING'
])->notEmpty();
$dotenv->required('ENVIRONMENT_IS_PRODUCTION')->isBoolean();
$dotenv->required('USE_DB')->isBoolean();
$dotenv->required('DB_PORT')->isInteger();

/**
 * Configuration for: Error reporting
 * For development, we want to see all errors 
 * For production, we want to see none
 * Logging is always enabled
 */

ini_set('log_errors', '1');
if(filter_var($_ENV['ENVIRONMENT_IS_PRODUCTION'], FILTER_VALIDATE_BOOLEAN)) {
    error_reporting(0);
    ini_set('display_errors', '0');
} else {
    error_reporting(E_ALL);
    ini_set('display_errors', '1');
}

/**
 * Configuration for: Timezone
 */
date_default_timezone_set($_ENV['TIMEZONE']);

/**
 * Set right encoding
 * We normally use UTF-8 ( mb4 in MySQL )
 */
mb_internal_encoding($_ENV['ENCODING']);
mb_http_output($_ENV['ENCODING']);

/**
 * Prepare the database connection
 */
use zeroline\MiniLoom\Data\Database\SQL\ConnectionManager;
use zeroline\MiniLoom\Data\Database\SQL\Connection;
use zeroline\MiniLoom\Data\Database\SQL\DatabaseType;

 if(filter_var($_ENV['USE_DB'], FILTER_VALIDATE_BOOLEAN)) {
    $databaseConnection = new Connection(
        DatabaseType::MYSQL,
        $_ENV['DB_DATABASE'],
        $_ENV['DB_HOST'],
        intval($_ENV['DB_PORT']),        
        $_ENV['DB_USERNAME'],
        $_ENV['DB_PASSWORD'],
        null
    );
    ConnectionManager::setDefaultConnection($databaseConnection);
    $databaseConnection->connect();
 }