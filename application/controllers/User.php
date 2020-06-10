<?php
     class User extends CI_Controller{

          public function __construct(){
               parent::__construct();
               $this->load->model('M_user');
               $this->load->library('form_validation');
               if($this->session->userdata('status')!=="login") {
                    redirect('login/login');
                  }
               }
     
          public function index(){
               $data['user']=$this->M_user->show_user();
               $data['pegawai']=$this->M_user->get_pegawai();
               $this->load->view('template/header');
               $this->load->view('template/sidebar');
               $this->load->view('users/v_data_user',$data);
               $this->load->view('template/footer');
          }

          public function profil(){
               //$data['user']=$this->M_user->show_user();
               $this->load->view('template/header');
               $this->load->view('template/sidebar');
               $this->load->view('users/v_profil');
               $this->load->view('template/footer');
          }

          public function add_user(){
               $this->form_validation->set_rules('nip', 'Nip', 'required');
               $this->form_validation->set_rules('pass1', 'Password',  'required|trim|min_length[5]|matches[pass2]');
               $this->form_validation->set_rules('pass2', 'Password',  'required|trim|min_length[5]|matches[pass1]');
               if ($this->form_validation->run()==false){
                    $this->session->set_flashdata('notif','<div class="alert alert-danger mt-2" role="alert"> <strong>Data gagal ditambahkan ! </strong> <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
                    redirect('user'); 	
               }else{
                    $this->M_user->add_user();
                    $this->session->set_flashdata('notif','<div class="alert alert-info mt-2" role="alert"> <strong>Data user berhasil ditambahkan ! </strong> <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
                    redirect('user');	
               }
          } 

          // public function detil_user($id){
          //      $data['user']=$this->M_user->getdetil_user($id);
          //      $this->load->view('template/header');
          //      $this->load->view('template/sidebar');
          //      $this->load->view('pangkat/v_data_user',$data);
          //      $this->load->view('template/footer');
          // }

          public function ubah_user(){ 
               $this->form_validation->set_rules('nip', 'Nip', 'required');
               $this->form_validation->set_rules('pass1', 'Password',  'required|trim|min_length[5]|matches[pass2]');
               $this->form_validation->set_rules('pass2', 'Password',  'required|trim|min_length[5]|matches[pass1]');
               if ($this->form_validation->run()==false){
                    echo '<script type="text/javascript">alert("PASSWORD TIDAK MATCH !");window.location.replace("'.base_url().'user")</script>';
               }else{
                    $get_data = $this->M_user->get_where_profil('tbl_user', array('nip' => $this->input->post('nip',true)))->row();
                    if (!password_verify($this->input->post('pass',TRUE), $get_data->password))
                    { 
                      echo '<script type="text/javascript">alert("PASSWORD LAMA YANG ANDA MASUKAN SALAH !");window.location.replace("'.base_url().'user")</script>';
          
                    } else {
               $this->M_user->edit_user();
               $this->session->set_flashdata('notif','<div class="alert alert-info mt-2" role="alert"> <strong>Password user berhasil diubah ! </strong> <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
               redirect('user');
               }
          }
          }

          public function del_user($id){
               $this->M_user->del_user($id);
               $this->session->set_flashdata('notif','<div class="alert alert-info mt-2" role="alert"> <strong>Data user berhasil dihapus ! </strong> <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
               redirect ('user');
          }

     } 
?>