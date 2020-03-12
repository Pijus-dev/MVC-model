<?php

    class Laptops
    {
        private $db;

        public function __construct()
        {
            $this->db = new Database();
        }

        public function laptopsInfo()
        {
            $this->db->query("SELECT * FROM `laptops`");
            return $this->db->resultSet();
        }

        public function selectLaptops()
        {
            if (isset($_POST['model']) && (isset($_POST['brand']))) {
                $model = $_POST['model'];
                $brand = $_POST['brand'];
                $this->db->query("SELECT * FROM `laptops` WHERE brand IN ('" . implode("','",
                        $brand) . "') AND model IN ('" . implode("','", $model) . "')");
            } else {
                $brand = isset($_POST['brand']) ? $_POST['brand'] : array();
                $model = isset($_POST['model']) ? $_POST['model'] : array();
                $this->db->query("SELECT * FROM `laptops` WHERE brand IN ('" . implode("','",
                        $brand) . "') OR model IN ('" . implode("','", $model) . "')");
            }
            return $this->db->resultSet();

        }
    }