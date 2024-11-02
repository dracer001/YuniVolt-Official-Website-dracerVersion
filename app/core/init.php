<?php
// ini_set('memory_limit', '1024M');


spl_autoload_register(function($class_name)
{
    // Define the possible directories where the class file could be
    $directories = [
        "../app/models/",
        "../app/middleware/"
    ];

    // Loop through each directory and check if the class file exists
    foreach ($directories as $directory) {
        $file = $directory . $class_name . ".php";
        if (file_exists($file)) {
            require $file;
            break;  // Exit the loop after finding the file
        }
    }
});


require "config.php";
require "functions.php";
require "database.php";
require "model.php";
require "controller.php";
require "app.php";
require_once '../vendor/autoload.php';