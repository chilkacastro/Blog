<?php
class Home extends Controller
{
    public function __construct()
    {
        $this->publicationModel = $this->model('publicationModel');
        $this->commentModel = $this->model('commentModel');
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
        if (isset($_POST['submit'])) {
            $keywords = $_POST['keywords'];
        }
        
        $publications = $this->publicationModel->getAllPublicationsByAuthor($keywords);
        $data = [
            "publications" => $publications
        ];
     
        $this->view('Home/index', $data);

    }

    public function details($publication_id) {
        $publication = $this->publicationModel->getPublication($publication_id);

        $this->view('Home/details', $publication);
    }

    public function createComment($data) {
        // comment button clicked
       if (isset($POST['commentSubmit'])) {
           $this->commentModel->createComment($data); // add comment to the database
        }
    }
}