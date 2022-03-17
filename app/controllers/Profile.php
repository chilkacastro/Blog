<?php

class Profile extends Controller{
    public function __construct(){
        $this->profileModel = $this->model('profileModel');
        if(!isLoggedIn()){
            header('Location: /Blog/Login');
        }
    }

    public function index(){
        $publications = $this->profileModel->getAuthorPublications();
        $data = [
            "publications" => $publications
        ];
     
        $this->view('Profile/index', $data);
    }


    public function createProfile() {
        if(!isset($_POST['register'])){
            $this->view('Profile/createProfile');
        }
        else {
            $data=[
                'fname' => trim($_POST['fname']),
                'mname' => trim($_POST['mname']),
                'lname' => trim($_POST['lname']),
            ];

            if($this->profileModel->createProfile($data)){
            echo 'Please wait we are creating a profile for you!';
            // header('Location: /Blog/Profile')
            echo '<meta http-equiv="Refresh" content="2; url=Blog/Profile/createProfile">';
            }
        }
    }

    public function createPublication(){
        if(!isset($_POST['upload'])){
            $this->view('Profile/createPublication');
        }
        else{
            // $filename= $this->imageUpload();
            $data=[
                'title' => trim($_POST['title']),
                'text' => trim($_POST['text']),
                'status' => trim($_POST['status']),
                // 'picture' => $filename
            ];
            
            if($this->profileModel->createPublication($data)){
                echo 'Please wait we are uploading the publication for you!';
                header('Location: /Blog/Profile/index');
                //echo '<meta http-equiv="Refresh" content="2; url=/MVC/User/getUsers">';
            }
        }
    }

    // public function imageUpload(){
    //     //default value for the picture
    //     $filename=false;
        
    //     //save the file that gets sent as a picture
    //     $file = $_FILES['picture'];
        
    //     $acceptedTypes = ['image/jpeg'=>'jpg',
    //         'image/gif'=>'gif',
    //         'image/png'=>'png'];
    //     //validate the file
        
    //     if(empty($file['tmp_name']))
    //         return false;

    //     $fileData = getimagesize($file['tmp_name']);

    //     if($fileData!=false && 
    //         in_array($fileData['mime'],array_keys($acceptedTypes))){

    //         //save the file to its permanent location
                
    //         $folder = dirname(APPROOT).'/public/img';
    //         $filename = uniqid() . '.' . $acceptedTypes[$fileData['mime']];
    //         move_uploaded_file($file['tmp_name'], "$folder/$filename");
    //     }
    //     return $filename;
    // }

    // public function details($user_id){
    //     $user = $this->loginModel->getUser($user_id);

        
    //         $this->view('User/details',$user);
        
    // }

    // public function update($user_id){
    //     $user = $this->loginModel->getUser($user_id);
    //     if(!isset($_POST['update'])){
    //         $this->view('User/updateUser',$user);
    //     }
    //     else{
    //         $filename= $this->imageUpload();
    //         $data=[
    //             'name' => trim($_POST['name']),
    //             'city' => trim($_POST['city']),
    //             'phone' => trim($_POST['phone']),
    //             'picture' => $filename,
    //             'ID' => $user_id
    //         ];
    //         if($this->loginModel->updateUser($data)){
    //             echo 'Please wait we are upating the user for you!';
    //             //header('Location: /MVC/User/getUsers');
    //             echo '<meta http-equiv="Refresh" content="2; url=/MVC/User/getUsers">';
    //         }
            
    //     }
    // }

    // public function delete($user_id){
    //     $data=[
    //         'ID' => $user_id
    //     ];
    //     if($this->loginModel->delete($data)){
    //         echo 'Please wait we are deleting the user for you!';
    //         //header('Location: /MVC/User/getUsers');
    //         echo '<meta http-equiv="Refresh" content=".2; url=/MVC/User/getUsers">';
    //     }

    // }

}

?>