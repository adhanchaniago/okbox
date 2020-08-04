<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class C_Laporan extends CI_Controller{
    
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
        $tgla = $this->input->post('tgl');
        $tglb = str_replace(' ', '', $tgla);
        $excel = $this->input->post('excel');
        if ($excel == 'excel'){
            redirect('C_Laporan/excel/'.$tglb);
        } else {
        $this->load->view('template/header');
        $id = $this->session->userdata('id_user');
        $data['menu'] = $this->M_Setting->getmenu1($id);
        $this->load->view('template/sidebar.php', $data);
        $data['transaksi'] = $this->M_transaksi->search($tglb);
        $this->load->view('laporan/v_laporan',$data); 
        $this->load->view('template/footer');
        }
    }

    public function excel($tglb)
    {   
        
        $pembelian = $this->M_transaksi->excel($tglb);
        $data = array('title' => 'Laporan Resi',
                'excel' => $pembelian);
        $this->load->view('laporan/excellaporan', $data);
    }
}