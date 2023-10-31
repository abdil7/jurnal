<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Guru extends CI_Controller
{
    public function index()
    {
        $data['title'] = 'User Manajement';
        $data['user'] = $this->db->get_where('user', ['username' =>
        $this->session->userdata('username')])->row_array();

        $data['guru'] = $this->db->get_where('user', 'role_id = 2')->result_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('guru/index', $data);
        $this->load->view('templates/footer');
    }

    public function hapusGuru($id)
    {
        $this->load->model('Guru_model', 'guru');
        $this->guru->hapusData($id);
        redirect('guru');
    }
}
