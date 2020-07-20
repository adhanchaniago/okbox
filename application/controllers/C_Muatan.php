<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class C_Muatan extends CI_Controller{
    
    public function __construct(){
        parent::__construct();
        $this->load->helper(array('form','url'));
        $this->load->library('session');
        $this->load->model('M_muatan');
        $this->load->model('M_Setting');
    }

    function index()
    {
        $this->load->view('template/header');
        $id = $this->session->userdata('id_user');
        $data['menu'] = $this->M_Setting->getmenu1($id);
        $this->load->view('template/sidebar.php', $data);
        $data['muatan'] = $this->M_muatan->getmuatan();
        $this->load->view('muatan/v_muatan',$data); 
        $this->load->view('template/footer');
    }

    function add()
    {
        $this->load->view('template/header');
        $id = $this->session->userdata('id_user');
        $data['menu'] = $this->M_Setting->getmenu1($id);
        $this->load->view('template/sidebar.php', $data);
        $this->load->view('muatan/v_addmuatan', $data); 
        $this->load->view('template/footer');
    }

    function cek_jenismuatan(){
        # ambil Kualifikasiname dari form
        
        $kode = $this->input->post('jenismuatan');
                # select ke model member Kualifikasiname yang diinput Kualifikasi
        $hasil_kode = $this->M_muatan->cek_muatan($kode);
         
                # pengecekan value $hasil_Kualifikasiname
        if(count($hasil_kode)!=0){
          # kalu value $hasil_Kualifikasiname tidak 0
                  # echo 1 untuk pertanda Kualifikasiname sudah ada pada db    
                       echo '1';
        }else{
                  # kalu value $hasil_Kualifikasiname = 0
                  # echo 2 untuk pertanda Kualifikasiname belum ada pada db
            echo '2';
        }
         
    }

    public function tambah()
    {   
        $this->M_muatan->tambahdata();
        $this->session->set_flashdata('SUCCESS', "Record Added Successfully!!");
        redirect('C_Muatan');
    }

    function view($id)
    {
        $this->load->view('template/header');
        $id = $this->session->userdata('id_user');
        $data['menu'] = $this->M_Setting->getmenu1($id);
        $this->load->view('template/sidebar.php', $data);
        $data['muatan'] = $this->M_muatan->getspek($id);
        $this->load->view('muatan/v_vmuatan',$data); 
        $this->load->view('template/footer');
    }

    function edit($idmuatan)
    {
        $this->load->view('template/header');
        $id = $this->session->userdata('id_user');
        $data['menu'] = $this->M_Setting->getmenu1($id);
        $this->load->view('template/sidebar.php', $data);
        $data['muatan'] = $this->M_muatan->getspek($idmuatan);
        $this->load->view('muatan/v_emuatan',$data); 
        $this->load->view('template/footer');
    }

    function editMuatan()
    {   
        $this->M_muatan->edit();
        $this->session->set_flashdata('SUCCESS', "Record Added Successfully!!");
        redirect('C_Muatan');
    }

    function hapus($id){
        $where = array('id_jenismuatan' => $id);
        $this->M_Setting->delete($where,'tb_jenismuatan');
        $this->session->set_flashdata('SUCCESS', "Record Added Successfully!!");
        redirect('C_Muatan');
    }

}