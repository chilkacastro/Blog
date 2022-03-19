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
        echo "This is search()<br>";
        if (isset($_POST['submit'])) {
            echo "yes clicked the search<br>";

            // get the keyword
            $keywords = trim($_POST['keywords']);

            //search based on author/title/content
            $search_param = trim($_POST['search_param']);


            //--------------------start search----------------------------------
            if ($search_param == "all") {
                echo "This is display all()<br>";
                $this->index();
            }

            if ($search_param != "all" && $keywords == null) { // check that the keyword is not empty for searching by author/title/content
                // $this->index();

                $data = [
                    'msg' => "Please enter the keyword which you want to search!",
                ];
                $this->view('Home/index', $data);
                // echo '<p style="font-size:24pt;color:red;text-align:center">'.$_FILES['myfile']['name']."上传成功".'<p>';
                // echo '<p style="font-size:18pt;color:red;text-align:center">' . "Please enter the keyword which you want to search!" . '</p>';
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


    /*
	    Jiahui: I'm not sure which one is the leastest version,
	    so I keep both of them 
	    I think this one is the old version
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
