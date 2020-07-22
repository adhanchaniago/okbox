<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_harga extends CI_Model {

	function getharga(){
		$this->db->select('*');
        $query = $this->db->get('tb_harga');
    	return $query->result();
    }

    function getnama($id_harga){
        $where = array(
            'id_harga' => $id_harga
        );
        return $this->db->get_where('tb_harga',$where)->result();
    }

    function cek_harga($kode){
        $this->db->select('*');
        $where = array(
            'harga' => $kode
        );
        $query = $this->db->get_where('tb_harga', $where);
        return $query->result();
    }

    function tambahdata(){
        $harga = $this->input->post('harga');
        $harga_str = preg_replace("/[^0-9]/", "", $harga);
        $harga = array(
            'tglaktif' => date('Y-m-d'),
            'tujuan' => $this->input->post('tujuan'),
            'code' => $this->input->post('code'),
            'harga' => $harga_str,
            'kg' => $this->input->post('kg'),
            'tl' => $this->input->post('tl'),
            'status' => 'aktif',
        );
        
        $this->db->insert('tb_harga', $harga);
    }

    function getspek($idharga){
		$this->db->select('*');
        $where = array(
            'id_harga' => $idharga
        );
        $query = $this->db->get_where('tb_harga', $where);
    	return $query->result();
    }

    function edit(){
        $harga = $this->input->post('harga');
        $harga_str = preg_replace("/[^0-9]/", "", $harga);
        $harga = array(
            'tglaktif' => date('Y-m-d'),
            'tujuan' => $this->input->post('tujuan'),
            'code' => $this->input->post('code'),
            'harga' => $harga_str,
            'kg' => $this->input->post('kg'),
            'tl' => $this->input->post('tl'),
            'status' => 'aktif',
        );

        $where = array(
            'id_harga' =>  $this->input->post('id'),
        );
        
        $this->db->where($where);
        $this->db->update('tb_harga',$harga);
    }

    
    function saverecords($tujuan,$code,$harga,$kg,$tl)
    {
        $harga = array(
            'tglaktif' => date('Y-m-d'),
            'tujuan' => $tujuan,
            'code' => $code,
            'harga' => $harga,
            'kg' => $kg,
            'tl' => $tl,
            'status' => 'aktif',
        );
        
        $this->db->insert('tb_harga', $harga);
    }


     function insertimport($data)
     {
        $this->db->insert_batch('tb_harga', $data);
        return $this->db->insert_id();
     }

    
}