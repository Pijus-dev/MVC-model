<?php

    class User
    {
        private $db;

        public function __construct()
        {
            $this->db = new Database();
        }

        public function register($data)
        {
            $this->db->query('INSERT INTO customers (name, email, password) VALUE (:name, :email, :password)');
            //Bind values
            $this->db->bind(':name', $data['name']);
            $this->db->bind(':email', $data['email']);
            $this->db->bind(':password', $data['password']);

            // Execute
            if ($this->db->execute()){
                return true;
            }else{
                return false;
            }
        }

        public function findUserByEmail($email)
        {
            $this->db->query('SELECT * FROM customers WHERE email = :email');

            // Bind value

            $this->db->bind(':email', $email);

            $row = $this->db->single();

            // Check row
            if($this->db->rowCount() > 0){
                return true;
            }else{
                return false;
            }
        }

        public function login($email, $password)
        {
            $this->db->query('SELECT * FROM customers WHERE email = :email');
            $this->db->bind(':email', $email);

            $row = $this->db->single();

            $hashed_password = $row->password;
            if (password_verify($password, $hashed_password)){
                return $row;
            }else{
                return false;
            }

        }

        public function getAllUsers()
        {
            $this->db->query("SELECT `id`, `name`, `email`, `role`  FROM `customers`");
            return $this->db->resultSet();
        }

        public function getUserById($id)
        {
            $this->db->query('SELECT * FROM customers WHERE id = :id');
            $this->db->bind(':id', $id);

            return $this->db->single();

        }

        public function updateUserArray($array)
        {
            $comma = ' ';
            $id = $array['id'];
            unset($array['id']);

            if(count($array)>1){
                $comma = ',';
            }
            $string = '';
            foreach ($array as $key => $value){
                $string .= ( '`' . $key . '`' .  ' = ' . '\'' . $value . '\'' . $comma);
            }

            $string = substr($string, 0, -1);

            $this->db->query("UPDATE `customers` SET $string WHERE `id`= $id");

            // Execute
            if ($this->db->execute()) {
                return true;
            } else {
                return false;
            }
        }

        public function deleteUserById($data){

            $this->db->query('SELECT * FROM customers WHERE id = :id');

            // Bind value

            $this->db->bind(':id', $data['id']);

            return $this->db->single();
        }

        public function getUserByRow()
        {
            $this->db->query("SELECT  `role`  FROM `customers`");
            return $this->db->resultSet();
        }
    }