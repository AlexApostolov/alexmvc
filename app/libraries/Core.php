<?php
/*
 * App Core Class
 * Creates URL & loads core controller
 * URL FORMAT - /controller/method/params
 */
class Core {
    // Initialize default controller, method, and parameters
    protected $currentController = 'Pages';
    protected $currentMethod = 'index';
    protected $params = [];

    public function __construct() {
        // print_r($this->getUrl());

        // Get an array of values of the URL
        $url = $this->getUrl();

        // The URL structure used for the site is [$currentController, $currentMethod, "param1", "param2"]
        // Look in controllers for first value. NOTE: file path is as if from index.php start location
        // Since the file names are saved with a first letter in uppercase, we use ucwords
        if (file_exists('../app/controllers/' . ucwords($url[0]) . '.php')) {
            // If the respective filename exists, set as the controller overwriting the default of "Pages".
            $this->currentController = ucwords($url[0]);
            // Append just the parameters minus the previously set controller on the 0 Index.
            unset($url[0]);
        }

        // Require the controller
        require_once '../app/controllers/' . $this->currentController . '.php';

        // Instantiate controller class
        $this->currentController = new $this->currentController;

        // Check for second part of URL
        if (isset($url[1])) {
            // Check to see if method exists in controller
            if (method_exists($this->currentController, $url[1])) {
                $this->currentMethod = $url[1];
                unset($url[1]);
            }
        }
        // echo $this->currentMethod;

        // Get params
        $this->params = $url ? array_values($url) : [];
        // Call a callback with array of params
        call_user_func_array([$this->currentController, $this->currentMethod], $this->params);
    }

    // Fetch the URL parameters
    public function getUrl() {
        if (isset($_GET['url'])) {
            // Remove the trailing slash from the URL,
            $url = rtrim($_GET['url'], '/');
            // then sanitize it.
            $url = filter_var($url, FILTER_SANITIZE_URL);
            // Return the individual URL values broken up into an array.
            $url = explode('/', $url);
            return $url;
        }
    }
}