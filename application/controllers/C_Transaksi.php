<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class C_Transaksi extends CI_Controller{
    
    public function __construct(){
        parent::__construct();
        $this->load->helper(array('form','url'));
        $this->load->library('session');
        $this->load->model('M_transaksi');
        $this->load->model('M_Setting');
        $this->load->model('M_harga');
    }

    function index()
    {
        $this->load->view('template/header');
        $id = $this->session->userdata('id_user');
        $data['menu'] = $this->M_Setting->getmenu1($id);
        $this->load->view('template/sidebar.php', $data);
        $data['transaksi'] = $this->M_transaksi->gettransaksi();
        $this->load->view('transaksi/v_transaksi',$data); 
        $this->load->view('template/footer');
    }

    function add()
    {
        $this->load->view('template/header');
        $id = $this->session->userdata('id_user');
        $data['menu'] = $this->M_Setting->getmenu1($id);
        $this->load->view('template/sidebar.php', $data);
        $data['asal'] = $this->M_harga->getharga();
        $data['harga'] = $this->M_harga->getharga();
        $this->load->view('transaksi/v_addtransaksi', $data); 
        $this->load->view('template/footer');
    }

    public function tambah()
    {   
        $this->M_transaksi->tambahdata();
        $this->session->set_flashdata('SUCCESS', "Record Added Successfully!!");
        redirect('C_transaksi');
    }

    function view($id)
    {
        $this->load->view('template/header');
        $id = $this->session->userdata('id_user');
        $data['menu'] = $this->M_Setting->getmenu1($id);
        $this->load->view('template/sidebar.php', $data);
        $data['transaksi'] = $this->M_transaksi->getspek($id);
        $this->load->view('transaksi/v_vtransaksi',$data); 
        $this->load->view('template/footer');
    }

    function edit($idtransaksi)
    {
        $this->load->view('template/header');
        $id = $this->session->userdata('id_user');
        $data['menu'] = $this->M_Setting->getmenu1($id);
        $this->load->view('template/sidebar.php', $data);
        $data['transaksi'] = $this->M_transaksi->getspek($idtransaksi);
        $this->load->view('transaksi/v_etransaksi',$data); 
        $this->load->view('template/footer');
    }

    function edittransaksi()
    {   
        $this->M_transaksi->edit();
        $this->session->set_flashdata('SUCCESS', "Record Added Successfully!!");
        redirect('C_transaksi');
    }

    function hapus($id){
        $where = array('id_transaksi' => $id);
        $this->M_Setting->delete($where,'tb_transaksi');
        $this->session->set_flashdata('SUCCESS', "Record Added Successfully!!");
        redirect('C_transaksi');
    }

     function cek_harga(){
            // Ambil data ID Provinsi yang dikirim via ajax post
            $id_harga = $this->input->post('id_harga');
            
            $hasil_kode = $this->M_harga->getnama($id_harga);
            
            foreach($hasil_kode as $data){
                $harga = $data->harga;
                $min = $data->kg;
            }
        
            $callback = array('harga'=>$harga, 'min'=>$min); // Masukan variabel lists tadi ke dalam array $callback dengan index array : list_kota
            echo json_encode($callback); // konversi varibael $callback menjadi JSON
    }



}