<?php 
class M_dosen extends CI_Model{

    public function read(){
        return $this->db->get('tb_dosen');
    }

    public function tambah($data){
        $this->db->insert('tb_dosen',$data);
    }

    public function hapus($where,$table){
        $this->db->where($where);
        $this->db->delete($table);
    }

    public function edit_data($where, $table){
        return $this->db->get_where($table, $where);
    }

    public function update_data($where, $data, $table){
        $this->db->where($where);
        $this->db->update($table, $data);
    }
}