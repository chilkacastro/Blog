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

    // haven't done
    public function search()
    {
        // echo "This is search()<br>";
        if (isset($_POST['submit'])) {
            // echo "yes clicked the search<br>";

            // get the keyword
            $keywords = trim($_POST['keywords']);

            //search based on author/title/content
            $search_param = trim($_POST['search_param']);


            //--------------------start search----------------------------------
            if ($search_param == "all") {
                // echo "This is display all()<br>";
                $this->index();
            }

            if ($search_param != "all" && $keywords == null) { // check that the keyword is not empty for searching by author/title/content
                // $this->index();

                $data = [
                    'msg' => "Please enter the keyword which you want to search!",
                ];
                $this->view('Home/index', $data);
            } else {
                switch ($search_param) {

                    case "author":
                        // echo "This is search By Author()<br>";
                        $publications = $this->publicationModel->getAllPublicationsByAuthor($keywords);
                        $data = [
                            "publications" => $publications
                        ];

                        $this->view('Home/index', $data);
                        break;
                    case "title":
                        // echo "This is search By title()<br>";
                        $publications = $this->publicationModel->getAllPublicationsByTitle($keywords);
                        $data = [
                            "publications" => $publications
                        ];

                        $this->view('Home/index', $data);
                        break;
                    case "content":
                        // echo "This is search By content()<br>";
                        $publications = $this->publicationModel->getAllPublicationsByText($keywords);
                        $data = [
                            "publications" => $publications
                        ];

                        $this->view('Home/index', $data);
                        break;
                }
            }
        }
    }

    public function details($publication_id)
    {
        // For the publication part
        $publication = $this->publicationModel->getPublication($publication_id);

        // to submit a comment
        if (isset($_POST['commentSubmit'])) {
            $data = [
                "comment" => trim($_POST['commentTextArea']),
                "pub_id" => $publication_id,
            ];
            
            $this->commentModel->createComment($data);
        }

        // show detail and comments of specific publication
        $publication_comments = $this->commentModel->getPublicationComments($publication_id);
        $data = [
            "publication" => $publication,
            "comments" => $publication_comments,
        ];
        $this->view('Home/details',  $data);
    }
}