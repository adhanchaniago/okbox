<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class C_Transaksi extends CI_Controller{
    
    public function __construct(){
        parent::__construct();
        $this->load->helper(array('form','url'));
        $this->load->library('session');
        $this->load->model('M_transaksi');
        $this->load->model('M_Setting');
        $this->load->model('M_harga');
        $this->load->model('M_muatan');
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
        $data['jenismuatan'] = $this->M_muatan->getmuatan();
        $this->load->view('transaksi/v_addtransaksi', $data); 
        $this->load->view('template/footer');
    }

    public function tambah()
    {   
        $id = $this->session->userdata('id_user');
        $this->M_transaksi->tambahdata($id);
        $this->session->set_flashdata('SUCCESS', "Record Added Successfully!!");
        redirect('C_transaksi');
    }

    function view($ida)
    {
        $this->load->view('template/header');
        $id = $this->session->userdata('id_user');
        $data['menu'] = $this->M_Setting->getmenu1($id);
        $this->load->view('template/sidebar.php', $data);
        $data['transaksi'] = $this->M_transaksi->getspek($ida);
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
                $harga = 'Rp. '.number_format($data->harga);
                $min = $data->kg;
            }
        
            $callback = array('harga'=>$harga, 'min'=>$min); // Masukan variabel lists tadi ke dalam array $callback dengan index array : list_kota
            echo json_encode($callback); // konversi varibael $callback menjadi JSON
    }

     function cek_resi(){
        # ambil username dari form
        
        $noresi = $this->input->post('noresi');
                # select ke model member username yang diinput user
        $hasil_nik = $this->M_transaksi->getresi($noresi);
         
                # pengecekan value $hasil_username
        if(count($hasil_nik)!=0){
          # kalu value $hasil_username tidak 0
                  # echo 1 untuk pertanda username sudah ada pada db    
                        echo "1"; 
        }else{
                  # kalu value $hasil_username = 0
                  # echo 2 untuk pertanda username belum ada pada db
            echo "2";
        }
         
    }



}