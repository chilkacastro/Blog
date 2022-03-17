<?php
class Home extends Controller
{
    public function __construct()
    {
        $this->publicationModel = $this->model('publicationModel');
    }

    // WILL LIST ALL THE PUBLICATIONS
    public function index()
    {
        $publications = $this->publicationModel->getAllPublications();
        $data = [
            "publications" => $publications
        ];
     
        $this->view('Home/index', $data);

    }

}