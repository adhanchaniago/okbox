<?php 

class C_Login extends CI_Controller{

	function __construct(){
		parent::__construct();		
		$this->load->model('M_login');

	}

	function index(){
		$this->load->view('v_login');
	}

	function cek_login(){
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		//echo $nip.$password;
		$user = $this->M_login->get($username);

		if(empty($user)){
			$this->session->set_flashdata('pesan','salah');
			$this->load->view('v_login');
		} else {
		    if($password == $user->password){ // Jika password yang diinput sama dengan password yang didatabase
        		$session = array(
		          'authenticated'=>true, // Buat session authenticated dengan value true
		          'username'=>$user->username,  // Buat session nip
		          'nama'=>$user->nama_user,
		          'id_user'=>$user->id_user // Buat session authenticated
		          
		        );
		        $this->session->set_userdata($session); // Buat session sesuai $session
		        redirect('Welcome'); // Redirect ke halaman welcome
		    }else{
		        $this->session->set_flashdata('message', 'Password salah'); // Buat session flashdata
		        redirect('C_Login'); // Redirect ke halaman login
		    }
   		}
   	}

	function logout(){
		$this->session->sess_destroy();
		redirect('C_Login');
	}
}