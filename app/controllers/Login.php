<?php
class Login extends Controller
{
    public function __construct()
    {
        $this->loginModel = $this->model('loginModel');
        $this->profileModel = $this->model('profileModel');
    }

    public function index()
    {
        if (!isset($_POST['login'])) {
            $this->view('Login/index');
        } else {
            $user = $this->loginModel->getUser($_POST['username']);

            if ($user != null) {
                $hashed_password = $user->password_hash;
                $password = $_POST['password'];
                if (password_verify($password, $hashed_password)) {
                    //echo '<meta http-equiv="Refresh" content="2; url=/Blog/Profile">';
                    $this->createSession($user);
                    $profile = $this->profileModel->getProfile();
                    if (!empty($profile)) {
                        $data = [
                            'msg' => "Welcome, $user->username!",

                        ];
                        $this->view('Home/index', $data);
                    }
                    else {
                        header('Location: /Blog/Profile/createProfile');  // so it lands on correct page
                    }
                } else {
                    $data = [
                        'msg' => "Password incorrect for $user->username",
                    ];
                    $this->view('Login/index', $data);
                }
            } else {
                $data = [
                    'msg' => "User: " . $_POST['username'] . " does not exists",
                ];
                $this->view('Login/index', $data);
            }
        }
    }

    public function create()
    {
        if (!isset($_POST['signup'])) {
            $this->view('Login/create');
        }
        else {
            //
            $user = $this->loginModel->getUser($_POST['username']);
            if ($user == null) {
                $data = [
                    'username' => trim($_POST['username']),
                    'email' => $_POST['email'],
                    'pass' => $_POST['password'],
                    'pass_verify' => $_POST['verify_password'],
                    'pass_hash' => password_hash($_POST['password'], PASSWORD_DEFAULT),
                    'username_error' => '',
                    'password_error' => '',
                    'password_match_error' => '',
                    'password_len_error' => '',
                    'msg' => '',
                    'email_error' => ''
                ];
                if ($this->validateData($data)) {
                    if ($this->loginModel->createUser($data)) {  // put user in database
                        $user = $this->loginModel->getUser($_POST['username']); //get the new created user from the database
                        // validation of password
                        if ($user != null) {
                            $hashed_password = $user->password_hash;
                            $password = $_POST['password'];
                            if (password_verify($password, $hashed_password)) {
                                $this->createSession($user);                        //needs to have a session to be able to go to the profile page
                                $data = [
                                    'msg' => "Welcome, $user->username!",
                                ];
                                header('Location: /Blog/Profile/createProfile');
                                echo 'Please wait while creating account for ' . trim($_POST['username']);
                                $this->view('Home/index', $data);
                            }
                        }
                    }
                }
            } else {
                $data = [
                    'msg' => "User: " . $_POST['username'] . " already exists",
                ];
                $this->view('Login/create', $data);
            }
        }
    }

    public function validateData($data)
    {
        if (empty($data['username'])) {
            $data['username_error'] = 'Username can not be empty';
        }
        if (!filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
            $data['email_error'] = 'Please check your email and try again';
        }
        if (strlen($data['pass']) < 6) {
            $data['password_len_error'] = 'Password can not be less than 6 characters';
        }
        if ($data['pass'] != $data['pass_verify']) {
            $data['password_match_error'] = 'Password does not match';
        }
        if (empty($data['username_error']) && empty($data['password_error']) && empty($data['password_len_error']) && empty($data['password_match_error'])) {
            return true;
        } else {
            $this->view('Login/create', $data);
        }
    }

    public function createSession($user)
    {
        $_SESSION['user_id'] = $user->author_id;
        $_SESSION['user_username'] = $user->username;
    }

    public function logout()
    {
        unset($_SESSION['user_id']);
        session_destroy();
        echo '<meta http-equiv="Refresh" content="1; url=/Blog/Login/">';
    }
}
