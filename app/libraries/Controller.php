<?php
// Base controller: Load Models & Views from other controllers that extend this class
class Controller {
    // Load model
    public function model($model) {
        // Require model file
        require_once '../app/models/' . $model . '.php';

        // Instantiate model, e.g. if Post model is passed we'll return "new Post();"
        return new $model();
    }

    // Load view & pass data into the view
    public function view($view, $data = []) {
        // Check for view file
        if (file_exists('../app/views/' . $view . '.php')) {
            require_once '../app/views/' . $view . '.php';
        } else {
            // View does not exist
            die('View does not exist');
        }
    }
}