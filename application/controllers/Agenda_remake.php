<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Agenda_remake extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Agenda_remake_model', 'agenda');

        $this->form_validation->set_rules('jam', 'required');
        $this->form_validation->set_rules('kelas_id', 'Kelas', 'required');
        $this->form_validation->set_rules('mapel_id', 'Mapel', 'required');
        $this->form_validation->set_rules('guru_id', 'Guru', 'required');
        $this->form_validation->set_rules('materi', 'Materi', 'required');
        $this->form_validation->set_rules('siswa_absensi', 'Absen');
    }

    
    public function hapusData($id)
    {
        $this->agenda->hapusData($id);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Selesai Dihapus</div>');
        redirect('agenda_remake');
    }


    public function ganti($id)
    {
        $data['title'] = 'Ganti Agenda';
        $data['user'] = $this->db->get_where('user', ['username' =>
        $this->session->userdata('username')])->row_array();

        $data['kelas'] = $this->db->get('kelas')->result_array();
        $data['mapel'] = $this->db->get('mapel')->result_array();
        $data['guru'] = $this->db->get('guru')->result_array();

        $data['idagenda'] = $this->agenda->getId($id);

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('agenda_remake/ganti', $data);
            $this->load->view('templates/footer');
        } else {
            $this->agenda->ganti($id);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Selesai Diganti</div>');
            redirect('agenda_remake');
        }
    }

    public function index()
    {
        $data['title'] = 'XII RPL 2';
        $data['user'] = $this->db->get_where('user', ['username' =>
        $this->session->userdata('username')])->row_array();

        $data['kelas'] = $this->db->get('kelas')->result_array();
        $data['mapel'] = $this->db->get('mapel')->result_array();
        $data['guru'] = $this->db->get('guru')->result_array();
    
        $data['agenda'] = $this->agenda->getAgenda();

        // if(isset($_POST['cari'])) {
        //     $data['keyword'] = $this->;
        // }
    
        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('agenda_remake/mp/x_mp_1/index', $data);
            $this->load->view('templates/footer');
        } else {
            $this->agenda->tambahData();
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Selesai Ditambahkan</div>');
            redirect('agenda_remake');
        }
    }
}
