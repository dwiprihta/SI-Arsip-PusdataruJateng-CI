<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
        $this->load->helper('url','form','html');
    //     if($this->session->userdata('status')=="login") {
    //         redirect('admin');
    //    }
     }
    
    
    function login(){
        $this->form_validation->set_rules('nip', 'NIP',  'required|trim|numeric');
        $this->form_validation->set_rules('pass', 'Password',  'required|trim|min_length[5]');
        if ($this->form_validation->run()==false){
            $this->load->view('users/v_login.php'); 	
        }else{
            $this->_login();
    }
}
    
 function _login(){
    $nip = $this->input->post('nip');
    $pass = $this->input->post('pass');

    $user=$this->db->get_where('v_login', ['nip'=>$nip])->row_array();
        if ($user){
            if($user['status_akun']=='aktif'){
                if (password_verify($pass,$user['password'])){
                    $data=[
                        'nip'=>$user['nip'],
                        'id_role'=>$user['id_role'],
                        'nama'=>$user['nama'],
                        'jenis_kelamin'=>$user['jenis_kelamin'],
                        'instansi'=>$user['instansi'],
                        'jabatan'=>$user['jabatan'],
                        'pangkat'=>$user['pangkat'],
                        'golongan'=>$user['golongan'],
                        'status_akun'=>$user['status_akun'],
                        'foto'=>$user['foto'],
                        'status' => "login"
                    ];
                    $this->session->set_userdata($data);
                    if ($data['id_role']==1){
                        redirect('admin');
                    }else{
                        redirect('error');
                    }
                }else{
                $this->session->set_flashdata('notif','<div style="border-radius:5px; color:#fff; background-color:#da3737;" class="alert alert-danger alert-dismissible fade show" role="alert"><i class="fa fa-exclamation-triangle"></i> Password salah !</div>');
                redirect('login/login');
                }

            }else{
            $this->session->set_flashdata('notif','<div style="border-radius:5px; color:#fff; background-color:#da3737;" class="alert alert-danger alert-dismissible fade show" role="alert"><strong></strong><i class="fa fa-exclamation-triangle"></i> Email belum diaktivasi !</div>');
            redirect('login/login');	
            }
    }else{
        $this->session->set_flashdata('notif','<div style="border-radius:5px; color:#fff; background-color:#da3737;" class="alert alert-danger alert-dismissible fade show" role="alert"><strong></strong><i class="fa fa-exclamation-triangle"></i> Username atau password anda salah !</div>');
        redirect('login/login');	
    }
    }

    public function logout(){
        $this->session->unset_userdata('status');
        $this->session->unset_userdata('nip');
        $this->session->unset_userdata('id_role');
        $this->session->unset_userdata('nama');
        $this->session->unset_userdata('jenis_kelamin');
        $this->session->unset_userdata('instansi');
        $this->session->unset_userdata('jabatan');
        $this->session->unset_userdata('pangkat');
        $this->session->unset_userdata('golongan');
        $this->session->unset_userdata('status_akun');
        $this->session->unset_userdata('foto');
        $this->session->sess_destroy();
        redirect('home');
   } 
}

/* End of file login.php */
/* Location: ./application/controllers/login.php */