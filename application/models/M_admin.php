<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_admin extends CI_Model
{
    private $_table = "nasabah";
    public function getall()
    {
        $this->db->select('*');
        $this->db->from($this->_table);
        return $this->db->get()->result();
    }

    public function insert($nsb)
    {
        if (!$nsb) {
            return;
        }
        return $this->db->insert($this->_table, $nsb);
    }

    public function edit_data($where, $table)
    {
        return $this->db->get_where($table, $where)->result();
    }
    public function update_data($where, $data, $table)
    {
        $this->db->where($where);
        $this->db->update($table, $data);
    }
    public function hapus_data($where, $table)
    {
        $this->db->where($where);
        $this->db->delete($table);
    }

    function ajax_getbyno_induk($nia)
    {
        $this->db->select('l.password, a.nama, a.rt, a.alamat, a.telepon, a.email ,a.nia');
        $this->db->from('admin as a');
        $this->db->join('user_login as l', 'l.no_induk = a.nia', 'left');
        $this->db->where('l.no_induk', $nia);
        return $this->db->get();
    }

    function Input_Data($data, $table)
    {
        $this->db->insert($table, $data);
    }

    function Delete_Data($where, $table)
    {
        $this->db->where($where);
        $this->db->delete($table);
    }

    public function view_data_where()
    {

        $this->db->select('l.password, a.nama, a.rt, a.alamat, a.telepon, a.email, a.nia');
        $this->db->from('admin as a');
        $this->db->join('user_login as l', 'l.no_induk = a.nia', 'left');
        return $this->db->get()->result();
    }
}
