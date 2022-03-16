<?php 
class Publication extends Controller {
    public function __construct()
    {
        $this->publicationModel = $this->model('publicationModel');
    }

    public function index() {
        $this->view('Home/index');
    }
}