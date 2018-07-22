<?php
    // App Root used generally for the backend includes.
    // We want just the app route, so we pass in the file path using the magic constant "__FILE__",
    // & get just the parent of the parent directory of it using "dirname" twice.
    // Then we collect this in a constant we'll name APPROOT using "define".
    define('APPROOT', dirname(dirname(__FILE__)));
    // URL Root available for links & the frontend generally. Note final / is left off, so it should be added in the views.
    define('URLROOT', 'http://localhost:8080/alexmvc');
    // Site Name
    define('SITENAME', 'AlexMVC');