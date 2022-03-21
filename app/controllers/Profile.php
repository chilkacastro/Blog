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

        $profile = $this->profileModel->getProfile();
        $publications = $this->profileModel->getAuthorPublications();
        $publication_comments = $this->commentModel->getAuthorPublicationComments();
        if (!empty($profile)) {
                
            $data = [
                "publications" => $publications,
                "authorComments" => $publication_comments,
                "profile" => $profile
            ];

            $this->view('Profile/index', $data);
        }
        else {
            $this->view('Profile/createProfile');
        }
    }

    public function createProfile()
    {
        if (!isset($_POST['register'])) {
            $this->view('Profile/createProfile');
        } 
        else {
            $data = [
                'fname' => trim($_POST['fname']),
                'mname' => trim($_POST['mname']),
                'lname' => trim($_POST['lname']),
            ];

            if ($this->profileModel->createProfile($data)) {
                echo 'Please wait we are creating a profile for you!';
                echo '<meta http-equiv="Refresh" content="2; url=Blog/Profile/index">';
            }
        }
    }

    public function createPublication()
    {
        if (!isset($_POST['upload'])) {
            $this->view('Profile/createPublication');
        } else {
            // $filename= $this->imageUpload();
            // $status = ['status' => trim($_POST['status'])];
            if (isset($title) | isset($text) | isset($status)) {
                $data = [
                    'title' => trim($_POST['title']),
                    'text' => trim($_POST['text']),
                    // 'status' => $status->'status',
                    'status' => trim($_POST['status']),
                    'empty_title' => '',
                    'empty_text' => '',
                    'empty_status' => ''
                ];

                if ($this->validateData($data)) {
                    if ($this->profileModel->createPublication($data)) {
                        echo 'Please wait we are uploading the publication for you!';
                        header('Location: /Blog/Profile/index');
                        $this->view('Profile/index', $data);

                    }
                }  
            }
            // $data = [
            //     'title' => trim($_POST['title']),
            //     'text' => trim($_POST['text']),
            //     // 'status' => $status->'status',
            //     'status' => trim($_POST['status']),
            //     'empty_title' => '',
            //     'empty_text' => '',
            //     'empty_status' => ''
            // ];
        // if ($this->validateData($data)) {
        //     if ($this->profileModel->createPublication($data)) {
        //         echo 'Please wait we are uploading the publication for you!';
        //         header('Location: /Blog/Profile/index');
        //     }
        //     }            
        }
    }

    public function validateData($data)
    {
        if (empty($data['title'])) {
            $data['empty_title'] = 'Title can not be empty';
        }
        if (empty($data['text'])) {
            $data['empty_content'] = 'Content can not be empty';
        }
        if (empty($data['status'])) {
            $data['empty_status'] = 'Please choose a status for your post';
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
                "pub_id" => $publication_id
            ];
            $this->commentModel->createComment($data); // add comment to the database
        }

        // show detail and comments of specific publication
        $publication_comments = $this->commentModel->getPublicationComments($publication_id);
        $data = [
            "publication" => $publication,
            "comments" => $publication_comments
        ];
        $this->view('Profile/details',  $data);
    }


    public function delete($publication_id)
    {
        $data = [
            'publication_id' => $publication_id
        ];
        if ($this->profileModel->delete($data)) {
            echo 'Please wait we are deleting the publication for you!';
            echo '<meta http-equiv="Refresh" content=".2; url=/Blog/Profile">';
        }
    }

    public function editProfile($author_id)
    {
        $profile = $this->profileModel->getProfile();

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

    public function editComment($publication_comment_id) {
        $existing_comment = $this->commentModel->getAuthorPublicationComment($publication_comment_id);

        if (!isset($_POST['editComment'])) {
            $this->view('Profile/editComment', $existing_comment);

        } else {
            $data = [
                "comment_text" => trim($_POST['commentText']),
                "comment_id" => $publication_comment_id
            ];
            if ($this->commentModel->editComment($data)) {
                echo "Please wait we are editing your comment";
                echo '<meta http-equiv="Refresh" content="2; url=/Blog/Profile">';
            }
        }

    }

    public function deleteComment($publication_comment_id)
    {
        if ($this->commentModel->deletePublicationComment($publication_comment_id)) {
            echo 'Please wait we are deleting the comment for you!';
            echo '<meta http-equiv="Refresh" content=".2; url=/Blog/Profile">';
        }
    }
}