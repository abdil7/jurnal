<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Agenda_model extends CI_Model
{
    public function getAgendaMp()
    {
        $query = "SELECT * FROM jurusan_mp as a 
                    JOIN kelas as k ON k.kelas_id = a.kelas_id
                    JOIN mapel as m ON m.mapel_id = a.mapel_id
                    JOIN guru as g ON g.guru_id = a.guru_id
                    ORDER BY a.jam
                ";
        return $this->db->query($query)->result_array();
    }

    public function getAgendaRpl($keyword = null)
    {
        // if ($keyword) {
        //     $this->db->like('materi', $keyword);
        // }
        $query = "SELECT * FROM jurusan_rpl as a 
                    JOIN kelas as k ON k.kelas_id = a.kelas_id
                    JOIN mapel as m ON m.mapel_id = a.mapel_id
                    JOIN guru as g ON g.guru_id = a.guru_id
                ";
        return $this->db->query($query)->result_array();
    }
    
    public function tambahDataRpl()
    {
        $data = [
            'kelas_id' => $this->input->post('kelas_id'),
            'mapel_id' => $this->input->post('mapel_id'),
            'guru_id' => $this->input->post('guru_id'),
            'materi' => $this->input->post('materi'),
            'siswa_absensi' => $this->input->post('siswa_absensi')  
        ];
        $this->db->insert('jurusan_rpl', $data);
    }

    public function hapusDataRpl($jam)
    {
        $this->db->where('jam', $jam);
        $this->db->delete('jurusan_rpl');
    }

    public function getIdRpl($jam)
    {
        $query = "SELECT * FROM jurusan_rpl as a 
                    JOIN kelas as k ON k.kelas_id = a.kelas_id
                    JOIN mapel as m ON m.mapel_id = a.mapel_id
                    JOIN guru as g ON g.guru_id = a.guru_id
                    WHERE `jam` = $jam
                ";
        return $this->db->query($query)->row_array();
    }

    public function gantiRpl($jam)
    {
        $data = [
            'kelas_id' => $this->input->post('kelas_id'),
            'mapel_id' => $this->input->post('mapel_id'),
            'guru_id' => $this->input->post('guru_id'),
            'materi' => $this->input->post('materi'),
            'siswa_absensi' => $this->input->post('siswa_absensi')
        ];
        $this->db->where('jam', $jam);
        $this->db->update('jurusan_rpl', $data);
    }
}
