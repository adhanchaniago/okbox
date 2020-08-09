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
        $this->load->library('Pdf');   
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
                $tujuankirim = $data->tujuan;
            }
        
            $callback = array('harga'=>$harga, 'min'=>$min,  'tujuankirim'=>$tujuankirim); // Masukan variabel lists tadi ke dalam array $callback dengan index array : list_kota
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

    function cetak($ida)
    {
        $this->load->view('transaksi/cetak'); 
    }

    function cetak1($ida){
        $pdf = new FPDF('L','mm',array('148', '210'));
        // membuat halaman baru
        $pdf->AddPage();
        // setting jenis font yang akan digunakan
        $pdf->SetFont('Arial','',7,'C');
        // mencetak string       

        $pdf->Image('assets/images/kopa.jpg',10,5,190,15);
        $pdf->Cell(0,13,'',0,1);
        $pdf->Cell(20,5,'No Resi',1,0,'C');
        $pdf->Cell(30,5,'Asal',1,0,'C');
        $pdf->Cell(30,5,'Tujuan',1,0,'C');
        $pdf->Cell(30,5,'Jumlah Barang',1,0,'C');
        $pdf->Cell(25,5,'Berat',1,0,'C');
        $pdf->Cell(25,5,'Berat Volume',1,0,'C');
        $pdf->Cell(30,5,'Harga/Kg',1,1,'C');

        $data = $this->M_transaksi->getspek($ida);
        foreach ($data as $key ) {
            $pdf->Cell(20,5,$key->noresi,1,0,'C');
            $pdf->Cell(30,5,$key->asal,1,0,'C');
            $pdf->Cell(30,5,$key->tujuan,1,0,'C');
            $pdf->Cell(30,5,$key->jumlahbarang,1,0,'C');
            $pdf->Cell(25,5,$key->berat,1,0,'C');
            $pdf->Cell(25,5,$key->beratvolume,1,0,'C');
            $pdf->Cell(30,5,'Rp.'.number_format($key->harga),1,1,'C');
            $pdf->Cell(50,5,'Nama Pengirim : '.$key->namapengirim,1,0);
            $pdf->Cell(50,5,'Nama Penerima : '.$key->namapenerima,1,0);
            $pdf->Cell(90,5,'Jenis Barang',1,1,'C');
            $pdf->Cell(50,5,'NIK : '.$key->nikpengirim,1,0);
            // $pdf->Cell(50,21,'Alamat Penerima : '.$key->alamatpenerima,'LR');
            $pdf->cell(50,5,'Alamat Penerima : ','LR');
            $pdf->Cell(90,5,$key->jenisbarang,1,1,'C');
            $pdf->cell(50,5,'Alamat Pengirim : ','LR');
            // $pdf->cell(50,10,$key->alamatpenerima,'LR');
            $pdf->MultiCell(50, 3, $key->alamatpenerima, 'LR');
            $pdf->MultiCell(50,3,$key->alamatpengirim,'LR');
            $pdf->ln();
            $pdf->Cell(90,5,'INFORMASI JENIS KIRIMAN & LAYANAN',1,1,'C');
            $pdf->cell(50,5,'','LR');
            if ($key->jeniskiriman == 'dokumen'){
                $pdf->Cell(7,5,'v',1,0,'C');
            } else {
                $pdf->Cell(7,5,'',1,0,'C');
            }
            $pdf->Cell(20,5,'Dokumen',1,0,'C');
            if ($key->jeniskiriman == 'paket'){
                $pdf->Cell(7,5,'v',1,0,'C');
            } else {
                $pdf->Cell(7,5,'',1,0,'C');
            }
            $pdf->Cell(15,5,'Paket',1,0,'C');
            $pdf->Cell(41,5,$key->jenismuatan,1,1,'C');
            $pdf->Cell(25,5,'Tlp. Pengirim',1,0,'C');
            $pdf->Cell(25,5,'Email Pengirim',1,0,'C');
            $pdf->Cell(25,5,'Tlp. Penerima',1,0,'C');
            $pdf->Cell(25,5,'Email Penerima',1,0,'C');
            $pdf->Cell(90,20,'',1,0,'C');
            $pdf->Image('assets/images/ket.jpg',111,53,75,17);
            $pdf->Cell(91,5,'',0,1,'C');
            $pdf->Cell(25,5,$key->tlppengirim,1,0,'C');
            $pdf->Cell(25,5,$key->emailpengirim,1,0,'C');
            $pdf->Cell(25,5,$key->tlppenerima,1,0,'C');
            $pdf->Cell(25,5,$key->emailpenerima,1,1,'C');
            $pdf->Cell(100,5,'Keterangan :'.$key->ket,1,1,'');
            $pdf->Cell(25,5,'Ttd/Stempel','LR');
            $pdf->Cell(25,5,'Ttd/Stempel','LR');
            $pdf->Cell(25,5,'Ttd/Stempel','LR');
            $pdf->Cell(25,5,'Nama Penerima',1,1);
            $pdf->Cell(25,5,'','LR');
            $pdf->Cell(25,5,'','LR');
            $pdf->Cell(25,5,'','LR');
            $pdf->Cell(25,5,'','LR');
            $pdf->Cell(90,5,'INFORMASI RINCIAN BIAYA',1,1);
            $pdf->Cell(25,5,'','LR');
            $pdf->Cell(25,5,'','LR');
            $pdf->Cell(25,5,'','LR');
            $pdf->Cell(25,5,'','LR');
            $pdf->Cell(40,5,'Biaya Kirim',1,0);
            $pdf->Cell(50,5,'Rp.'.number_format($key->subharga),1,1);
            $pdf->Cell(25,5,'Pengirim',1,0);
            $pdf->Cell(25,5,'Petugas',1,0);
            $pdf->Cell(25,5,'Penerima',1,0);
            $pdf->Cell(25,5,'No. Handphone',1,0);
            $pdf->Cell(40,5,'Biaya Packing',1,0);
            $pdf->Cell(50,5,'Rp.'.number_format($key->biayapacking),1,1);
            $pdf->Cell(25,5,'','LR');
            $pdf->Cell(25,5,'','LR');
            $pdf->Cell(25,5,'','LR');
            $pdf->Cell(25,5,'','LR');
            $pdf->Cell(40,5,'Asuransi',1,0);
            $pdf->Cell(50,5,'Rp.'.number_format($key->asuransi),1,1);
            $pdf->Cell(25,5,'','LR');
            $pdf->Cell(25,5,'','LR');
            $pdf->Cell(25,5,'','LR');
            $pdf->Cell(25,5,'','LR');
            $pdf->Cell(40,5,'PPN 1%',1,0);
            $pdf->Cell(50,5,'Rp.'.number_format($key->ppn),1,1);
            $pdf->Cell(25,6,'Tgl Transaksi',1,0);
            $pdf->Cell(25,6,'',1,0);
            $pdf->Cell(25,6,'Tgl Barang Diterima',1,0);
            $pdf->Cell(25,6,'Jam Barang Diterima',1,0);
            $pdf->SetFont('Arial','',10,'C');
            $pdf->Cell(40,6,'Total Biaya',1,0);
            $pdf->Cell(50,6,'Rp.'.number_format($key->total),1,1);
            $pdf->SetFont('Arial','',7,'C');
            $pdf->Cell(50,5,'Putih : Pengirim / Cash','LR');
            $pdf->Cell(50,5,'Kuning : Arsip','LR');
            $pdf->Cell(50,5,'Biru : Tempel Di Paket','LR');
            $pdf->SetFont('Arial','',8,'C');
            $pdf->Cell(40,5,'Admin','LR',1);
            $pdf->Cell(50,10,'','LR');
            $pdf->Cell(50,10,'','LR');
            $pdf->Cell(50,10,'','LR');
            $pdf->Cell(40,10,'','LR',1);
            $pdf->Cell(190,0,'',1,1);
        }
        
        // $pdf->AutoPrint(true);
        $pdf->Output();
    }



}