<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Auth_model');
        
    }
    
    public function index()
    {
        $this->load->view('login');
    }

    public function login()
    {
        $data = $this->input->post();
        $output = $this->Auth_model->login($data);
        if(count($output)>0){
            $this->session->set_userdata( $output[0] );
            redirect('dashboard','refresh');
        }else{
            $this->session->set_flashdata('pesan', 'username invalid');
            redirect('auth');
        }

    }
    public function logout()
    {
        $this->session->sess_destroy();
        redirect('auth');
    }

}

/* End of file Controllername.php */
