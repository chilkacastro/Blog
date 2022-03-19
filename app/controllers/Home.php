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
    public function search()
    {
        echo "This is search()<br>";
        if (isset($_POST['submit'])) {
            echo "yes clicked the search<br>";

            // get the keyword
            $keywords = trim($_POST['keywords']);

            //search based on author/title/content
            $search_param = trim($_POST['search_param']);



            //--------------------start search----------------------------------
            if ($search_param != "all" && $keywords == null) { // check that the keyword is not empty for searching by author/title/content
                echo "Please enter the keyword which you want to search!";
            } else {
                switch ($search_param) {
                    
                    case "author":
                        echo "This is search By Author()<br>";
                        $publications = $this->publicationModel->getAllPublicationsByAuthor($keywords);
                        $data = [
                            "publications" => $publications
                        ];

                        $this->view('Home/index', $data);
                        break;
                    case "title":
                        echo "This is search By title()<br>";
                        break;
                    case "content":
                        echo "This is search By content()<br>";
                        break;
                }
            }


            // if ($search_param == "author" && $keywords != null) {
            //     echo "This is search By Author()<br>";
            //     $publications = $this->publicationModel->getAllPublicationsByAuthor($keywords);
            //     $data = [
            //         "publications" => $publications
            //     ];

            //     $this->view('Home/index', $data);
            // } else if ($search_param == "all" && $keywords == null) {
            //     echo "This is display all()<br>";
            //     $this->index();
            // }
        } else {
            echo "not clicked search";
        }
    }

    public function details($publication_id)
    {
        $publication = $this->publicationModel->getPublication($publication_id);

        $this->view('Home/details', $publication);
    }

    public function createComment($data)
    {
        // comment button clicked
        if (isset($POST['commentSubmit'])) {
            $this->commentModel->createComment($data); // add comment to the database
        }
    }
}
