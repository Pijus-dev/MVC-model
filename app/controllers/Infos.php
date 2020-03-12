<?php

class Infos extends Controller
{
    public function __construct()
    {
        $this->laptopModel = $this->model('Laptops');
    }

    public function products()
    {
//        if(!isLoggedIn()){
//            redirect('pages/login');
//        }
        if($_SERVER['REQUEST_METHOD'] == 'POST') {
            $laptop = $this->laptopModel->selectLaptops();

            $data = [
                'pc' => $laptop
            ];
            $this->view('info/products', $data);

        } else{
            $laptop = $this->laptopModel->laptopsInfo();

            $data = [
                'pc' => $laptop
            ];
            $this->view('info/products', $data);
        }
    }
}