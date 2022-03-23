<?php
class Home extends Controller
{
    /*
     * Default constructor
     */
    public function __construct()
    {
        $this->publicationModel = $this->model('publicationModel');
        $this->commentModel = $this->model('commentModel');
    }

    /*
     *   List all public publications in the home/main page
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
     * Search depending on the category chosen: All, Title, Author, Content
     */
    public function search()
    {

        if (isset($_POST['submit'])) {

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

                $data = [
                    'msg' => "Please enter the keyword which you want to search!",
                ];
                $this->view('Home/index', $data);
            } else {
                switch ($search_param) {

                    case "author":
                        $publications = $this->publicationModel->getAllPublicationsByAuthor($keywords);
                        $data = [
                            "publications" => $publications
                        ];

                        $this->view('Home/index', $data);
                        break;
                    case "title":
                        $publications = $this->publicationModel->getAllPublicationsByTitle($keywords);
                        $data = [
                            "publications" => $publications
                        ];

                        $this->view('Home/index', $data);
                        break;
                    case "content":
                        $keywords = $_POST['keywords'];
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

    /*
    *  Shows the details of the chosen publication
    */
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
        $profile = $this->commentModel->getCommentProfile();
        $data = [
            "publication" => $publication,
            "comments" => $publication_comments,
            "currentUser" => $profile
        ];
        $this->view('Home/details',  $data);
    }

    public function deleteComment($publication_comment_id, $publication_id)
    {
        if ($this->commentModel->deletePublicationComment($publication_comment_id)) {
            echo 'Please wait we are deleting the comment for you!';
            header("Location:/Blog/Home/details/$publication_id");
        }
    }
}
