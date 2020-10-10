<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Auth_model extends CI_Model {
    public function login($params)
    {
        $get = $this->db->get('user');
        if($get->num_rows()>0){
            $result = $this->db->get_where('user', ['username'=>$params['username'], 'password'=>md5($params['password'])])->result_array();
            return $result;
        }else{
            $this->db->trans_begin();
            $this->db->insert('role', ['role'=>'Admin']);
            $idrole = $this->db->insert_id();
            $this->db->insert('user', ['username'=>'admin', 'password'=>md5('admin')]);
            $iduser = $this->db->insert_id();
            $this->db->insert('userinrole', ['idrole'=>$idrole, 'iduser'=>$iduser]);
            if($this->db->trans_status()){
                $this->db->trans_commit();
                if($params['username']=='admin' && $params['password']=='admin'){
                    return ['iduser'=>$iduser, 'username'=>$params['username']];
                }else{
                    return [];
                }
            }else{
                return [];
            }
        }
    }
}
