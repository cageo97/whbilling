<?php
    define('APP_SESSION', true);
    define('APP_DEBUG', true);
    define('PHP_REPORTING', true);

    define('APP_TWIG', [
        "templates" => "../template_data",
        //"cache" =>  "../template_cache",
        "cache" => false
    ]);

    define('CONFIG_MYSQL', [
        "driver" => "mysql",
        "host" => "localhost",
        "database" => "whbilling",
        "username" => "newuser",
        "password" => "password",
        "charset" => "utf8",
        "collation" => "utf8_unicode_ci"
    ]);
?>