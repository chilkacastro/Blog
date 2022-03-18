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

    // haven't done
    public function searchByAuthor(){
        $publications = $this->publicationModel->getAllPublicationsByAuthor();
        $data = [
            "publications" => $publications
        ];
     
        $this->view('Home/index', $data);

    }

    public function details($publication_id) {
        $publication = $this->publicationModel->getPublication($publication_id);

        $this->view('Home/details', $publication);
    }
}