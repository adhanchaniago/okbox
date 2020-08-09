<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_transaksi extends CI_Model {

	function gettransaksi(){
		$this->db->select('*');
        $query = $this->db->get('tb_transaksi');
    	return $query->result();
    }

    function getresi($noresi){
        $this->db->select('*');
        $where = array('noresi' => $noresi);
        $query = $this->db->get_where('tb_transaksi', $where);
        return $query->result();
    }

    function tambahdata($id){
        $transaksi = array(
            'tgl_transaksi' => date('Y-m-d'),
            'noresi' => $this->input->post('noresi'),
            'namapengirim' => $this->input->post('namapengirim'),
            'alamatpengirim' => $this->input->post('alamatpengirim'),
            'nikpengirim' => $this->input->post('nikpengirim'),
            'namapenerima' => $this->input->post('namapenerima'),
            'alamatpenerima' => $this->input->post('alamatpenerima'),
            'nikpenerima' => $this->input->post('nikpenerima'),
            'tlppenerima' => $this->input->post('tlppenerima'),
            'tlppengirim' => $this->input->post('tlppengirim'),
            'emailpenerima' => $this->input->post('emailpenerima'),
            'emailpengirim' => $this->input->post('emailpengirim'),
            'ket' => $this->input->post('ket'),
            'jumlahbarang' => $this->input->post('jumlahbarang'),
            'berat' => $this->input->post('berat'),
            'beratvolume' => $this->input->post('volume'),
            'tujuan' => $this->input->post('tujuankirim'),
            'harga' => preg_replace("/[^0-9]/", "", $this->input->post('hargakg')),
            'subharga' => preg_replace("/[^0-9]/", "",$this->input->post('biayakirim')),
            'jenisbarang' => $this->input->post('jenisbarang'),
            'jeniskiriman' => $this->input->post('jeniskiriman'),
            'id_jenismuatan' => $this->input->post('jenismuatan'),
            'biayapacking' => preg_replace("/[^0-9]/", "", $this->input->post('biayapacking')),
            'asuransi' => preg_replace("/[^0-9]/", "", $this->input->post('asuransi')),
            'ppn' => preg_replace("/[^0-9]/", "", $this->input->post('ppn')),
            'total' => preg_replace("/[^0-9]/", "", $this->input->post('total')),
            'asal' => $this->input->post('asal'),
            'id_user' => $id
        );
        
        $this->db->insert('tb_transaksi', $transaksi);
    }

    function getspek($idtransaksi){
		$this->db->select('tb_harga.tujuan as tujuankirim, tb_jenismuatan.*, tb_transaksi.*');
        $this->db->join('tb_jenismuatan', 'tb_jenismuatan.id_jenismuatan = tb_transaksi.id_jenismuatan');
        $this->db->join('tb_harga', 'tb_harga.id_harga = tb_transaksi.tujuan');
        $where = array(
            'id_transaksi' => $idtransaksi
        );
        $query = $this->db->get_where('tb_transaksi', $where);
    	return $query->result();
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

     function search($tgl){
        if(isset($tgl) && !empty($tgl)){
            $tgl=explode('-', $tgl);
            $tgl_mulai=explode('.', $tgl[0]);
            $tgl_sampai=explode('.', $tgl[1]);
        } 

        $this->db->select('*');
        $this->db->join('tb_jenismuatan', 'tb_jenismuatan.id_jenismuatan = tb_transaksi.id_jenismuatan');

        if(!empty($tgl[0]) && !empty($tgl[1])){

        $this->db->where("tgl_transaksi BETWEEN '".($tgl_mulai[2]."-".$tgl_mulai[1]."-".$tgl_mulai[0])."' and '".($tgl_sampai[2]."-".$tgl_sampai[1]."-".$tgl_sampai[0])."'");
        }

        return $this->db->get('tb_transaksi')->result();
      }

      function excel($tgl){
        if(isset($tgl) && !empty($tgl)){
            $tgl=explode('-', $tgl);
            $tgl_mulai=explode('.', $tgl[0]);
            $tgl_sampai=explode('.', $tgl[1]);
        } 

        $this->db->select('*');
        $this->db->join('tb_jenismuatan', 'tb_jenismuatan.id_jenismuatan = tb_transaksi.id_jenismuatan');

        if(!empty($tgl[0]) && !empty($tgl[1])){

        $this->db->where("tgl_transaksi BETWEEN '".($tgl_mulai[2]."-".$tgl_mulai[1]."-".$tgl_mulai[0])."' and '".($tgl_sampai[2]."-".$tgl_sampai[1]."-".$tgl_sampai[0])."'");
        }

        return $this->db->get('tb_transaksi')->result();
      }

    
}