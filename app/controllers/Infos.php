<?php

class Infos extends Controller
{
    public function products()
    {
        $data=[];
        $this->view('info/products', $data);
    }
}