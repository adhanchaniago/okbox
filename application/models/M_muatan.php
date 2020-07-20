<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_muatan extends CI_Model {

	function getmuatan(){
		$this->db->select('*');
        $query = $this->db->get('tb_jenismuatan');
    	return $query->result();
    }

    function getnama($ida){
        $where = array(
            'id_jenismuatan' => $ida
        );
        return $this->db->get_where('tb_jenismuatan',$where)->result();
    }

    function cek_muatan($kode){
        $this->db->select('*');
        $where = array(
            'jenismuatan' => $kode
        );
        $query = $this->db->get_where('tb_jenismuatan', $where);
        return $query->result();
    }

    function tambahdata(){
        $muatan = array(
            'jenismuatan' => $this->input->post('jenismuatan')
        );
        
        $this->db->insert('tb_jenismuatan', $muatan);
    }

    function getspek($idmuatan){
		$this->db->select('*');
        $where = array(
            'id_jenismuatan' => $idmuatan
        );
        $query = $this->db->get_where('tb_jenismuatan', $where);
    	return $query->result();
    }

    function edit(){
        $muatan = array(
            'jenismuatan' => $this->input->post('jenismuatan')
        );

        $where = array(
            'id_jenismuatan' =>  $this->input->post('id'),
        );
        
        $this->db->where($where);
        $this->db->update('tb_jenismuatan',$muatan);
    }

    
}