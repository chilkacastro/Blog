<?php
class Profile extends Controller
{
    public function __construct()
    {
        $this->profileModel = $this->model('profileModel');
        $this->commentModel = $this->model('commentModel');

        if (!isLoggedIn()) {
            header('Location: /Blog/Login');
        }
    }

    public function index()
    {
        $publications = $this->profileModel->getAuthorPublications();
        $data = [
            "publications" => $publications
        ];

        $this->view('Profile/index', $data);
    }

    public function createProfile()
    {
        if (!isset($_POST['register'])) {
            $this->view('Profile/createProfile');
        } else {
            $data = [
                'fname' => trim($_POST['fname']),
                'mname' => trim($_POST['mname']),
                'lname' => trim($_POST['lname']),
            ];

            if ($this->profileModel->createProfile($data)) {
                echo 'Please wait we are creating a profile for you!';
                // header('Location: /Blog/Profile')
                echo '<meta http-equiv="Refresh" content="2; url=Blog/Profile">';
            }
        }
    }

    public function createPublication()
    {
        if (!isset($_POST['upload'])) {
            $this->view('Profile/createPublication');
        } else {
            // $filename= $this->imageUpload();
            $data = [
                'title' => trim($_POST['title']),
                'text' => trim($_POST['text']),
                'status' => trim($_POST['status']),
            ];

            if ($this->profileModel->createPublication($data)) {
                echo 'Please wait we are uploading the publication for you!';
                header('Location: /Blog/Profile/index');
            }
        }
    }

    public function editPublication($publication_id)
    {
        $publication = $this->profileModel->getAuthorPublication($publication_id);
        if (!isset($_POST['uploadPub'])) {
            $this->view('Profile/editPublication', $publication);
        } else {
            $data = [
                'title' => trim($_POST['title']),
                'text' => trim($_POST['text']),
                'status' => trim($_POST['status']),
                'publication_id' => $publication_id
            ];

            if ($this->profileModel->editPublication($data)) {
                echo 'Please wait we are uploading your publication!';
                header('Location: /Blog/Profile/index');
            }
        }
    }

    public function details($publication_id)
    {
        $publication = $this->profileModel->getAuthorPublication($publication_id);

        // to submit a comment
        if (isset($_POST['commentSubmit'])) {
            $data = [
                "comment" => trim($_POST['commentTextArea']),
                "pub_id" => $publication_id,
            ];
            $this->commentModel->createComment($data); // add comment to the database
        }

        // show detail and comments of specific publication
        $publication_comments = $this->commentModel->getPublicationComments($publication_id);
        $data = [
            "publication" => $publication,
            "comments" => $publication_comments,
        ];
        $this->view('Profile/details',  $data);
    }


    public function delete($publication_id)
    {
        $data = [
            'publication_id' => $publication_id
        ];
        if ($this->profileModel->delete($data)) {
            echo 'Please wait we are deleting the user for you!';
            echo '<meta http-equiv="Refresh" content=".2; url=/Blog/Profile">';
        }
    }

    public function editProfile($author_id)
    {
        $profile = $this->profileModel->getProfile($author_id);

        if (!isset($_POST['editProfile'])) {
            $this->view('Profile/editProfile', $profile);
        } else {
            $data  = [
                "fname" => trim($_POST['fname']),
                "mname" => trim($_POST['mname']),
                "lname" => trim($_POST['lname']),
                "profile_id" => $profile->profile_id
            ];
            if ($this->profileModel->editProfile($data)) {
                echo "Please wait we are updating your profile";
                echo '<meta http-equiv="Refresh" content="2; url=/Blog/Profile">';
            }
        }
    }
}
