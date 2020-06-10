<?php
     class Pangkat extends CI_Controller{

          public function __construct(){
               parent::__construct();
               $this->load->model('M_pangkat');
               $this->load->library('form_validation');
               if($this->session->userdata('status')!=="login") {
                    redirect('login/login');
                  }
               }
     
          public function index(){
               $data['pangkat']=$this->M_pangkat->show_pangkat();
               $this->load->view('template/header');
               $this->load->view('template/sidebar');
               $this->load->view('pangkat/v_data_pangkat',$data);
               $this->load->view('template/footer');
          }

          public function detil_pangkat($id){
               $data['pangkat']=$this->M_pangkat->getdetil_pangkat($id);
               $this->load->view('template/header');
               $this->load->view('template/sidebar');
               $this->load->view('pangkat/v_detil_pangkat',$data);
               $this->load->view('template/footer');
          }
         
          public function add_pangkat(){
               //validasi form
               $this->form_validation->set_rules('pangkat','pangkat','required');

               if ($this->form_validation->run()==FALSE){
                    $this->session->set_flashdata('notif','<div class="alert alert-danger mt-2" role="alert"> <strong>Data pangkat gagal ditambahkan ! </strong> <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
                  redirect('pangkat');
               }else{
                  $this->M_pangkat->add_pangkat();
                  $this->session->set_flashdata('notif','<div class="alert alert-info mt-2" role="alert"> <strong>Data pangkat berhasil ditambahkan ! </strong> <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
                  redirect('pangkat');
               }
          } 
          
          public function del_pangkat($id){
               $this->M_pangkat->del_pangkat($id);
               $this->session->set_flashdata('notif','<div class="alert alert-info mt-2" role="alert"> <strong>Data pangkat berhasil dihapus ! </strong> <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
               redirect ('pangkat');
          }
     
          public function ubah_pangkat(){ 
                  $this->M_pangkat->edit_pangkat();
                  $this->session->set_flashdata('notif','<div class="alert alert-info mt-2" role="alert"> <strong>Data pangkat berhasil dinonaktifkan ! </strong> <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
                  redirect('pangkat');
          }

     } 
?>