<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_Setting extends CI_Model {

    function getharga(){
        $this->db->select('*');
        $this->db->from('tb_harga');
        $query = $this->db->get();
        return $query->result();
    }

	function datatransaksi(){
        $query = $this->db->get('tb_transaksi');
        return $query->num_rows();
    }

    function datatujuan(){
        $query = $this->db->get('tb_harga');
        return $query->num_rows();
    }

     function datastaf(){
        $query = $this->db->get('tb_user');
        return $query->num_rows();
    }

    function transaksiperbulan(){
        $vbulan = date("m"); 
         $this->db->select('sum(total) as totalbulanini');
        $this->db->where('month(tgl_transaksi)',$vbulan);
        $query = $this->db->get('tb_transaksi');
        return $query->result();
    }


    function getakses($ida){
        $this->db->select('*');
        $this->db->join('tb_menu', 'tb_menu.id_menu = tb_akses.id_menu');
        $where = array(
            'tb_akses.id_user' => $ida
        );
        $query = $this->db->get_where('tb_akses', $where);
        return $query->result();
    }

    function getmenu1($id){
        $this->db->distinct();
        $this->db->select('tb_menu.id_menu, menu, icon,link');
        $this->db->order_by('urutan', 'ASC');
        $this->db->join('tb_akses', 'tb_akses.id_menu = tb_menu.id_menu');
        $where = array(
            'tb_akses.id_user' => $id, 'tb_akses.view' => '1'
        );
        $query = $this->db->get_where('tb_menu', $where);
        return $query->result();
    }

    function editv($iduser,$submenu,$view){
            $where = array(
                'id_user' =>  $iduser,
                'id_menu' => $view
            );

            $view = array(
                'view' =>  '1'
            );

            $this->db->where($where);
            $this->db->update('tb_akses',$view);         
        }

    function edita($iduser,$submenu,$add){
        $where = array(
            'id_user' =>  $iduser,
            'id_menu' => $add
        );

        $add = array(
            'add' =>  '1'
        );

        $this->db->where($where);
        $this->db->update('tb_akses',$add);         
    }

    function edite($iduser,$submenu,$edit){
        $where = array(
            'id_user' =>  $iduser,
            'id_menu' => $edit
        );

        $edit = array(
            'edit' =>  '1'
        );

        $this->db->where($where);
        $this->db->update('tb_akses',$edit);         
    }


    function editd($iduser,$submenu,$delete){
        $where = array(
            'id_user' =>  $iduser,
            'id_menu' => $delete
        );

        $delete = array(
            'delete' =>  '1'
        );

        $this->db->where($where);
        $this->db->update('tb_akses',$delete);         
    }

    function refresh($iduser){
        $user = array(
            'view' => '0',
            'add' => '0',
            'edit' => '0',
            'delete' => '0'
        );

        $where = array(
            'id_user' =>  $iduser
        );

        $this->db->where($where);                                                            
        $this->db->update('tb_akses',$user);       
    }


    function delete($where,$table){
    $this->db->where($where);
    $this->db->delete($table);
    }
 }