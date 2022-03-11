<?php
class Home extends Controller
{
    public function __construct()
    {
    }

    // WILL LIST ALL THE PUBLICATIONS
    public function index()
    {
        // $publications = $this->publicationModel->getPublications();
        // $data = [
        //     "publicationsKey" => $publications
        // ];
     
        // $this->view('Home/index', $data);
        $this->view('Home/index');

    }

}
