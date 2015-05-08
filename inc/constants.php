<?php
    define('APP_ENV', 'DEV');
    if (APP_ENV == "DEV") {
        define('DB_HOST', 'localhost');
        define('DB_USER', 'root');
        define('DB_PASS', '');
        define('DB_NAME', 'ghs');
        define('BASE_URL', 'http://localhost/ghs');
    } else {
        
    }
?>
