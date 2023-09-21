<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Agenda extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Agenda_model', 'agenda');

        $this->form_validation->set_rules('kelas_id', 'Kelas', 'required');
        $this->form_validation->set_rules('mapel_id', 'Mapel', 'required');
        $this->form_validation->set_rules('guru_id', 'Guru', 'required');
        $this->form_validation->set_rules('materi', 'Materi', 'required');
        $this->form_validation->set_rules('siswa_absensi', 'Absen');
    }

    public function rpl()
    {
        $data['title'] = 'Rekayasa Perangkat Lunak';
        $data['user'] = $this->db->get_where('user', ['username' =>
        $this->session->userdata('username')])->row_array();

        $data['rpl'] = $this->agenda->getAgendaRpl();

        $data['kelas'] = $this->db->get('kelas')->result_array();
        $data['mapel'] = $this->db->get('mapel')->result_array();
        $data['guru'] = $this->db->get('guru')->result_array();

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('agenda/rpl/x_rpl/index', $data);
            $this->load->view('templates/footer');
        } else {
            $data = [
                'kelas_id' => $this->input->post('kelas_id'),
                'mapel_id' => $this->input->post('mapel_id'),
                'guru_id' => $this->input->post('guru_id'),
                'materi' => $this->input->post('materi'),
                'siswa_absensi' => $this->input->post('siswa_absensi')
            ];
            $this->db->insert('jurusan_rpl', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Selesai Ditambahkan</div>');
            redirect('agenda/rpl');
        }
    }

    public function mp()
    {
        $data['title'] = 'X MP';
        $data['user'] = $this->db->get_where('user', ['username' =>
        $this->session->userdata('username')])->row_array();

        $data['mp'] = $this->agenda->getAgendaMp();

        $data['kelas'] = $this->db->get('kelas')->result_array();
        $data['mapel'] = $this->db->get('mapel')->result_array();
        $data['guru'] = $this->db->get('guru')->result_array();

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('agenda/mp/x_mp', $data);
            $this->load->view('templates/footer');
        } else {
            $data = [
                'kelas_id' => $this->input->post('kelas_id'),
                'mapel_id' => $this->input->post('mapel_id'),
                'guru_id' => $this->input->post('guru_id'),
                'materi' => $this->input->post('materi'),
                'siswa_absensi' => $this->input->post('siswa_absensi')
            ];
            $this->db->insert('jurusan_mp', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Selesai Ditambahkan</div>');
            redirect('agenda/mp');
        }
    }

    public function hapusRpl($jam)
    {
        $this->agenda->hapusDataRpl($jam);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Selesai Dihapus</div>');
        redirect('agenda/rpl');
    }

    public function gantiRpl($jam)
    {
        $data['title'] = 'Rekayasa Perangkat Lunak';
        $data['user'] = $this->db->get_where('user', ['username' =>
        $this->session->userdata('username')])->row_array();

        $data['kelas'] = $this->db->get('kelas')->result_array();
        $data['mapel'] = $this->db->get('mapel')->result_array();
        $data['guru'] = $this->db->get('guru')->result_array();
        
        $data['idrpl'] = $this->agenda->getIdRpl($jam);

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('agenda/rpl/x_rpl/ganti_x_rpl', $data);
            $this->load->view('templates/footer');
        } else {
            $this->agenda->gantiRpl($jam);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Selesai Diganti</div>');
            redirect('agenda/rpl');
        }
    }
}
