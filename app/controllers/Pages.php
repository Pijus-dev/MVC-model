<?php

    class Pages extends Controller
    {
        public function __construct()
        {
            $this->userModel = $this->model('User');
        }

        public function index()
        {
            // Check for POST
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                // Process form

                // Sanitize POST data
                $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

                // Init data
                $data = [
                    'name' => trim($_POST['name']),
                    'email' => trim($_POST['email']),
                    'password' => trim($_POST['password']),
                    'confirm_password' => trim($_POST['confirm_password']),
                    'name_err' => '',
                    'email_err' => '',
                    'password_err' => '',
                    'confirm_password_err' => '',
                ];

                // Validate Email
                if (empty($data['email'])) {
                    $data['email_err'] = 'Please enter email';
                }else{
                    // Check email
                    if ($this->userModel->findUserByEmail($data['email'])){
                        $data['email_err'] = 'Email is already taken';
                    }
                }

                // Validate Name
                if (empty($data['name'])) {
                    $data['name_err'] = 'Please enter name';
                }

                // Validate Password
                if (empty($data['password'])) {
                    $data['password_err'] = 'Please enter password';
                } elseif (strlen($data['password']) < 6) {
                    $data['password_err'] = 'Password must be at least 6 characters';
                }

                // Validate Confirm Password
                // Validate Password
                if (empty($data['confirm_password'])) {
                    $data['confirm_password_err'] = 'Please enter password';
                } else {
                    if ($data['password'] != $data['confirm_password']) {
                        $data['confirm_password_err'] = 'Password do not match';
                    }
                }

                //Make sure errors are empty
                if (empty($data['email_err']) && empty($data['name_err']) && empty($data['password_err'])
                    && empty($data['confirm_password_err'])) {
                    // Validated

                    // Hash password
                    $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);

                    // Register user
                    if($this->userModel->register($data)){
                        flash('register_success', 'You are registered and can log in');
                        redirect('pages/login');
                    }else{
                        die('Something went wrong');
                    }

                } else {
                    // Load view with errors
                    $this->view('pages/index', $data);
                }

            } else {
                // Load form
                $data = [
                    'name' => '',
                    'email' => '',
                    'password' => '',
                    'confirm_password' => '',
                    'name_err' => '',
                    'email_err' => '',
                    'password_err' => '',
                    'confirm_password_err' => '',
                ];

                // Load view
                $this->view('pages/index', $data);
            }
        }



        public function login()
        {
            // Check for POST
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                // Process form

                // Sanitize POST data
                $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

                // Init data
                $data = [
                    'email' => trim($_POST['email']),
                    'password' => trim($_POST['password']),
                    'email_err' => '',
                    'password_err' => '',
                ];

                // Validate Email
                if (empty($data['email'])) {
                    $data['email_err'] = 'Please enter email';
                }

                // Validate Password
                if (empty($data['password'])) {
                    $data['password_err'] = 'Please enter password';
                }

                // Check for user/email

                if($this->userModel->findUserByEmail($data['email'])){
                    // User found
                }else{
                    // User not found
                    $data['email_err'] = 'No user found';
                }

                // Make sure errors are empty
                if (empty($data['email_err']) &&  empty($data['password_err'])) {
                    // Validated
                    // Check and set logged in user
                    $loggedInUser = $this->userModel->login($data['email'], $data['password']);

                    if ($loggedInUser){
                        // Creat session
                        $this->createUserSession($loggedInUser);
                        if($_SESSION['customers_role'] == 'admin'){
                            redirect('admins/admins');
                        }
                    }else{
                        $data['password_err'] = 'Password incorrect';

                        $this->view('pages/login', $data);
                    }
                } else {
                    // Load view with errors
                    $this->view('pages/login', $data);
                }

            } else {
                // Load form
                $data = [
                    'email' => '',
                    'password' => '',
                    'email_err' => '',
                    'password_err' => '',
                ];

                // Load view
                $this->view('pages/login', $data);
            }
        }


        public function createUserSession($user)
        {
            $_SESSION['customers_id'] = $user->id;
            $_SESSION['customers_email'] = $user->email;
            $_SESSION['customers_name'] = $user->name;
            $_SESSION['customers_role'] = $user->role;
            redirect('infos/products');
        }

        public function logout()
        {
            unset($_SESSION['customers_id']);
            unset($_SESSION['customers_email']);
            unset($_SESSION['customers_name']);
            unset ($_SESSION['customers_role']);
            session_destroy();
            redirect('pages/login');
        }

//        public function isLoggedIn()
//        {
//            if (isset($_SESSION['customers_id'])){
//                return true;
//            }else{
//                return false;
//            }
//        }
    }