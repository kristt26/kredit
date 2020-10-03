<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Auth_model extends CI_Model {
    public function login($params)
    {
        $result = $this->db->get_where('user', ['username'=>$params['username'], 'password'=>md5($params['password'])])->result_array();
        return $result;
    }
}
