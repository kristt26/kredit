<?php
/*
 * Generated by CRUDigniter v3.2
 * www.crudigniter.com
 */

class Nasabah extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Nasabah_model');
    }

    /*
     * Listing of nasabah
     */
    public function index()
    {
        $data['nasabah'] = $this->Nasabah_model->get_all_nasabah();
        $data['data'] = ['title' => 'nasabah', 'header' => 'nasabah'];
        $data['_view'] = 'nasabah/index';
        $this->load->view('layouts/main', $data);
    }

    /*
     * Adding a new nasabah
     */
    public function add()
    {
        if (isset($_POST) && count($_POST) > 0) {
            $params = array(
                'nik' => $this->input->post('nik'),
                'nama' => $this->input->post('nama'),
                'jeniskelamin' => $this->input->post('jeniskelamin'),
                'kontak' => $this->input->post('kontak'),
                'pekerjaan' => $this->input->post('pekerjaan'),
                'alamat' => $this->input->post('alamat'),
            );

            $nasabah_id = $this->Nasabah_model->add_nasabah($params);
            redirect('nasabah/index');
        } else {
            $data['data'] = ['title' => 'Tambah nasabah', 'header' => 'Tambah nasabah'];
            $data['_view'] = 'nasabah/add';
            $this->load->view('layouts/main', $data);
        }
    }

    /*
     * Editing a nasabah
     */
    public function edit($idnasabah)
    {
        // check if the nasabah exists before trying to edit it
        $data['nasabah'] = $this->Nasabah_model->get_nasabah($idnasabah);
        $data['data'] = ['title' => 'Ubah nasabah', 'header' => 'Ubah nasabah'];

        if (isset($data['nasabah']['idnasabah'])) {
            if (isset($_POST) && count($_POST) > 0) {
                $params = array(
                    'nik' => $this->input->post('nik'),
                    'nama' => $this->input->post('nama'),
                    'jeniskelamin' => $this->input->post('jeniskelamin'),
                    'kontak' => $this->input->post('kontak'),
                    'pekerjaan' => $this->input->post('pekerjaan'),
                    'alamat' => $this->input->post('alamat'),
                );

                $this->Nasabah_model->update_nasabah($idnasabah, $params);
                redirect('nasabah/index');
            } else {
                $data['_view'] = 'nasabah/edit';
                $this->load->view('layouts/main', $data);
            }
        } else {
            show_error('The nasabah you are trying to edit does not exist.');
        }

    }

    /*
     * Deleting nasabah
     */
    public function remove($idnasabah)
    {
        $nasabah = $this->Nasabah_model->get_nasabah($idnasabah);

        // check if the nasabah exists before trying to delete it
        if (isset($nasabah['idnasabah'])) {
            $this->Nasabah_model->delete_nasabah($idnasabah);
            redirect('nasabah/index');
        } else {
            show_error('The nasabah you are trying to delete does not exist.');
        }

    }

}
