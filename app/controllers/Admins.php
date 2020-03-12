<?php

    class Admins extends Controller
    {
        public function __construct()
        {
            $this->adminModel = $this->model('Admin');
            $this->userModel = $this->model('User');
        }

        public function admins()
        {
            if ($_SESSION['customers_role'] != 'admin') {
                redirect('infos/products');
            }

            $customers_info = $this->userModel->getAllUsers();

            $data = [
                'allCustomers' => $customers_info
            ];


            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                // Process form

                // Sanitize POST data
                $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

                $data = [
                    'allCustomers' => $customers_info,
                    'get_user' => '',
                    'role_err' => '',
                    'id_err' => '',
                    'email_err' => '',
                    'id' => $_POST['id'],
                    'name' => $_POST['name'],
                    'email' => $_POST['email'],
                    'role' => $_POST['role']
                ];


//                Checking ID

                if (isset($_POST['select'])) {

//                   ID Validation

                    if (empty($data['id'])) {
                        $data['id_err'] = 'Please enter ID';
                    } else {
                        if (!$data['get_user'] = $this->userModel->getUserById($data['id'])) {
                            $data['id_err'] = 'Id Does not exist';
                        }
                    }
                }


                if (isset($_POST['update'])) {
                    $array = [];

                    if (empty($data['id'])) {
                        $data['id_err'] = 'Please enter ID';
                    } else {
                        if (!$data['get_user'] = $this->userModel->getUserById($data['id'])) {
                            $data['id_err'] = 'This ID does not exists';
                        }
                    }

                    if (empty($data['id_err'])) {
                        $array['id'] = $data['id'];

                        if (empty($data['email'])) {
                            $data['email_err'] = 'Please enter the email';
                        } else {
                            if ($this->userModel->findUserByEmail($data['email'])) {
                                $data['email_err'] = 'Email is already taken';
                            } else {
                                $array['email'] = $data['email'];
                            }
                        }
                        if (!empty($data['name'])) {
                            $array['name'] = $data['name'];
                        }


                        if (!empty($data['role'])){
                           if( $data['role'] != 'user' && $data['role'] != 'admin'){
                            $data['role_err'] = "please enter 'admin' or 'role'";
                        } else {
                            $array['role'] = $data['role'];
                        }
                    }

                        $this->userModel->updateUserArray($array);
                    }
                }

                if (isset($_POST['delete'])) {

                    if (empty($data['id'])) {
                        $data['id_err'] = 'Please enter ID';
                    } elseif (!$data['get_user'] = $this->userModel->getUserById($data['id'])) {
                        $data['id_err'] = 'This is ID does not exist';
                    } else {
                        $this->userModel->deleteUserById($data);
                    }
                }
            }

//            Users Graph

            $result = $this->userModel->getUserByRow();
            $usersAmount = count($result);
            $user = 0;
            $admin = 0;
            $data ['usersAmount'] = $usersAmount;
            foreach ($result as $value){
                if($value->role == 'admin'){
                    $admin++;
                } else{
                    $user++;
                }
            }

               $userProc = round((100 * $user) / $usersAmount);
              $adminProc = round((100 * $admin) / $usersAmount);

            $data['user'] = $user;
            $data['admin'] = $admin;

            $data['userProc'] = $userProc . '%';
            $data['adminProc'] = $adminProc . '%';



            $this->view('admins/admin', $data);

        }

    }