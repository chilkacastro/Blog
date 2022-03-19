<?php
class Home extends Controller
{
    public function __construct()
    {
        $this->publicationModel = $this->model('publicationModel');
        $this->commentModel = $this->model('commentModel');
    }

    /*
        List all public publications
    */
    public function index()
    {
        $publications = $this->publicationModel->getAllPublications();
        $data = [
            "publications" => $publications
        ];

        $this->view('Home/index', $data);
    }


    /*

    */
    public function searchByAuthor()
    {
        $publications = $this->publicationModel->getAllPublicationsByAuthor();
    }
    // // haven't done
    // public function searchByAuthor(){
    //     if (isset($_POST['submit'])) {
    //         $keywords = $_POST['keywords'];
    //     }
        
    //     $publications = $this->publicationModel->getAllPublicationsByAuthor($keywords);

    //     $data = [
    //         "publications" => $publications
    //     ];

    //     $this->view('Home/index', $data);
    // }

    /*

    */
    public function details($publication_id)
    {
        $publication = $this->publicationModel->getPublication($publication_id);
        $this->view('Home/details', $publication);

        if (isset($_POST['commentSubmit'])) {
            $data = [
                "comment" => trim($_POST['commentTextArea']),
                "pub_id" => $publication_id,
            ];
            $this->commentModel->createComment($data); // add comment to the database
        }
        
        $publication_comments = $this->commentModel->getPublicationComments($publication_id);
        // to see the comments list for a specific publication
        
        print_r($publication_comments);   //shows the array for debugging purpose use only
        if (!empty($publication_comments)) {
            $data = [
                "comments" => $publication_comments,
            ];
            $this->view('Home/details', $data);
        }
    }

}
