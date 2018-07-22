<?php
class Pages extends Controller {
    public function __construct() {

    }

    public function index() {
        // Don't add .php because we concatenate the file extension in Controller.
        $data = [
            'title' => 'Welcome'
        ];

        $this->view('pages/index', $data);
    }

    public function about() {
        $this->view('pages/about');
    }
}