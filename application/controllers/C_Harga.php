<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class C_Harga extends CI_Controller{
    
    public function __construct(){
        parent::__construct();
        $this->load->helper(array('form','url'));
        $this->load->library('session');
        $this->load->model('M_harga');
        $this->load->model('M_Setting');
        // $this->load->library('excel');
    }

    function index()
    {
        $this->load->view('template/header');
        $id = $this->session->userdata('id_user');
        $data['menu'] = $this->M_Setting->getmenu1($id);
        $this->load->view('template/sidebar.php', $data);
        $data['harga'] = $this->M_harga->getall();
        $this->load->view('harga/v_harga',$data); 
        $this->load->view('template/footer');
    }

    function form()
    {
        $this->load->view('harga/form'); 
    }

    function add()
    {
        $this->load->view('template/header');
        $id = $this->session->userdata('id_user');
        $data['menu'] = $this->M_Setting->getmenu1($id);
        $this->load->view('template/sidebar.php', $data);
        $this->load->view('harga/v_addharga'); 
        $this->load->view('template/footer');
    }

    public function tambah()
    {   
        $this->M_harga->tambahdata();
        $this->session->set_flashdata('SUCCESS', "Record Added Successfully!!");
        redirect('C_Harga');
    }

    function view($ida)
    {
        $this->load->view('template/header');
        $id = $this->session->userdata('id_user');
        $data['menu'] = $this->M_Setting->getmenu1($id);
        $this->load->view('template/sidebar.php', $data);
        $data['harga'] = $this->M_harga->getspek($ida);
        $this->load->view('harga/v_vharga',$data); 
        $this->load->view('template/footer');
    }

    function edit($idharga)
    {
        $this->load->view('template/header');
        $id = $this->session->userdata('id_user');
        $data['menu'] = $this->M_Setting->getmenu1($id);
        $this->load->view('template/sidebar.php', $data);
        $data['harga'] = $this->M_harga->getspek($idharga);
        $this->load->view('harga/v_eharga',$data); 
        $this->load->view('template/footer');
    }

    function editharga()
    {   
        $this->M_harga->edit();
        $this->session->set_flashdata('SUCCESS', "Record Added Successfully!!");
        redirect('C_Harga');
    }

    function hapus($id){
        $where = array('id_harga' => $id);
        $this->M_Setting->delete($where,'tb_harga');
        $this->session->set_flashdata('SUCCESS', "Record Added Successfully!!");
        redirect('C_Harga');
    }

    public function upload()
    {
        // Load plugin PHPExcel nya
        include APPPATH.'third_party/PHPExcel/PHPExcel.php';

        $config['upload_path'] = realpath('excel');
        $config['allowed_types'] = 'xlsx|xls|csv';
        $config['max_size'] = '10000';
        $config['encrypt_name'] = true;

        $this->load->library('upload', $config);

        if (!$this->upload->do_upload()) {

            //upload gagal
            $this->session->set_flashdata('notif', '<div class="alert alert-danger"><b>PROSES IMPORT GAGAL!</b> '.$this->upload->display_errors().'</div>');
            //redirect halaman
            redirect('C_Harga');

        } else {

            $data_upload = $this->upload->data();

            $excelreader     = new PHPExcel_Reader_Excel2007();
            $loadexcel         = $excelreader->load('excel/'.$data_upload['file_name']); // Load file yang telah diupload ke folder excel
            $sheet             = $loadexcel->getActiveSheet()->toArray(null, true, true ,true);

            $data = array();

            $numrow = 1;
            foreach($sheet as $row){
                            if($numrow > 1){
                                $where = array('tujuan' => $row['B']);
                                $this->M_Setting->delete($where,'tb_harga');
                                
                                array_push($data, array(
                                    'tglaktif' => date('Y-m-d'),
                                    'tujuan'      => $row['B'],
                                    'code'      => $row['C'],
                                    'harga'      => $row['D'],
                                    'kg'      => $row['E'],
                                    'tl'      => $row['F'],
                                ));
                    }
                $numrow++;
            }
            $this->db->insert_batch('tb_harga', $data);
            //delete file from server
            unlink(realpath('excel/'.$data_upload['file_name']));

            //upload success
            $this->session->set_flashdata('notif', '<div class="alert alert-success"><b>PROSES IMPORT BERHASIL!</b> Data berhasil diimport!</div>');
            //redirect halaman
            redirect('C_Harga/');

        }
    }
}
