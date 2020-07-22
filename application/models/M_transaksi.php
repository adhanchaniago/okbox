<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_transaksi extends CI_Model {

	function gettransaksi(){
		$this->db->select('*');
        $query = $this->db->get('tb_transaksi');
    	return $query->result();
    }

    function getnama($ida){
        $where = array(
            'id_transaksi' => $ida
        );
        return $this->db->get_where('tb_transaksi',$where)->result();
    }

    function cek_transaksi($kode){
        $this->db->select('*');
        $where = array(
            'transaksi' => $kode
        );
        $query = $this->db->get_where('tb_transaksi', $where);
        return $query->result();
    }

    function tambahdata(){
        $transaksi = $this->input->post('transaksi');
        $transaksi_str = preg_replace("/[^0-9]/", "", $transaksi);
        $transaksi = array(
            'tglaktif' => date('Y-m-d'),
            'tujuan' => $this->input->post('tujuan'),
            'code' => $this->input->post('code'),
            'transaksi' => $transaksi_str,
            'kg' => $this->input->post('kg'),
            'tl' => $this->input->post('tl'),
            'status' => 'aktif',
        );
        
        $this->db->insert('tb_transaksi', $transaksi);
    }

    function getspek($idtransaksi){
		$this->db->select('*');
        $where = array(
            'id_transaksi' => $idtransaksi
        );
        $query = $this->db->get_where('tb_transaksi', $where);
    	return $query->result();
    }

    function edit(){
        $transaksi = $this->input->post('transaksi');
        $transaksi_str = preg_replace("/[^0-9]/", "", $transaksi);
        $transaksi = array(
            'tglaktif' => date('Y-m-d'),
            'tujuan' => $this->input->post('tujuan'),
            'code' => $this->input->post('code'),
            'transaksi' => $transaksi_str,
            'kg' => $this->input->post('kg'),
            'tl' => $this->input->post('tl'),
            'status' => 'aktif',
        );

        $where = array(
            'id_transaksi' =>  $this->input->post('id'),
        );
        
        $this->db->where($where);
        $this->db->update('tb_transaksi',$transaksi);
    }

    
    function saverecords($tujuan,$code,$transaksi,$kg,$tl)
    {
        $transaksi = array(
            'tglaktif' => date('Y-m-d'),
            'tujuan' => $tujuan,
            'code' => $code,
            'transaksi' => $transaksi,
            'kg' => $kg,
            'tl' => $tl,
            'status' => 'aktif',
        );
        
        $this->db->insert('tb_transaksi', $transaksi);
    }


     function insertimport($data)
     {
        $this->db->insert_batch('tb_transaksi', $data);
        return $this->db->insert_id();
     }

    
}