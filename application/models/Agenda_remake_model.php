<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Agenda_remake_model extends CI_Model
{
    public function tambahData()
    {
        $data = [
            'jam' => $this->input->post('jam'),
            'kelas_id' => $this->input->post('kelas_id'),
            'mapel_id' => $this->input->post('mapel_id'),
            'guru_id' => $this->input->post('guru_id'),
            'materi' => $this->input->post('materi'),
            'siswa_absensi' => $this->input->post('siswa_absensi')
        ];
        $this->db->insert('agenda', $data);
    }

    public function hapusData($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('agenda');
    }

    public function getId($id)
    {
        $query = "SELECT * FROM agenda as a ;
                    JOIN kelas as k ON k.kelas_id = a.kelas_id
                    JOIN mapel as m ON m.mapel_id = a.mapel_id
                    JOIN guru as g ON g.guru_id = a.guru_id
                    WHERE `id` = $id
                ";
        return $this->db->query($query)->row_array();
    }

    public function ganti($id)
    {
        $data = [
            'kelas_id' => $this->input->post('kelas_id'),
            'mapel_id' => $this->input->post('mapel_id'),
            'guru_id' => $this->input->post('guru_id'),
            'materi' => $this->input->post('materi'),
            'siswa_absensi' => $this->input->post('siswa_absensi')
        ];
        $this->db->where('id', $id);
        $this->db->update('agenda', $data);
    }

    public function getAgenda($keyword = null)
    {
        // if ($keyword) {
        //     $this->db->like('materi', $keyword);
        // }
        $query = "SELECT * FROM agenda as a 
                    JOIN kelas as k ON k.kelas_id = a.kelas_id
                    JOIN mapel as m ON m.mapel_id = a.mapel_id
                    JOIN guru as g ON g.guru_id = a.guru_id
                    WHERE a.kelas_id = 4
                ";
        return $this->db->query($query)->result_array();
    }
}
