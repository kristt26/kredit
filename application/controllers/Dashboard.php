<?php
/*
 * Generated by CRUDigniter v3.2
 * www.crudigniter.com
 */

class Dashboard extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

    }

    public function index()
    {
        $data['data'] = ['title' => 'Home', 'header' => 'Home'];
        $data['_view'] = 'dashboard';
        $this->load->view('layouts/main', $data);
    }
}
