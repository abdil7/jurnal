<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Guru_model extends CI_Model
{
    public function hapusData($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('user');
    }
}