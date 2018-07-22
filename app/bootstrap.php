<?php
// Load Config
require_once 'config/config.php';
// Load libraries
// Autoload Core Libraries so we don't have to write out so many individual require statements
// Note: the file name has to match the class name.
spl_autoload_register(function($className) {
    require_once 'libraries/' . $className . '.php';
});