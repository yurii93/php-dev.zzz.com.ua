<?php

class CabinetController extends Controller
{
    public function __construct($data = array())
    {
        parent::__construct($data);

        $this->model = new News();
    }

    public function index()
    {
        if(!Session::get('login')) {
            
            Router::redirect('/users/login');
        }
    }
}