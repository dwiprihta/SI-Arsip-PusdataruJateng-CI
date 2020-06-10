<?php
     class Jabatan extends CI_Controller{

          public function __construct(){
               parent::__construct();
               $this->load->model('M_jabatan');
               $this->load->library('form_validation');
               
               }
     
          public function index(){
               $data['jabatan']=$this->M_jabatan->show_jabatan();
               $this->load->view('template/header');
               $this->load->view('template/sidebar');
               $this->load->view('jabatan/v_data_jabatan',$data);
               $this->load->view('template/footer');
          }

          public function add_jabatan(){
               //validasi form
               $this->form_validation->set_rules('jabatan','Jabatan','required');

               if ($this->form_validation->run()==FALSE){
                    $this->session->set_flashdata('notif','<div class="alert alert-danger mt-2" role="alert"> <strong>Data Jabatan gagal ditambahkan ! </strong> <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
                  redirect('jabatan');
               }else{
                  $this->M_jabatan->add_jabatan();
                  $this->session->set_flashdata('notif','<div class="alert alert-info mt-2" role="alert"> <strong>Data Jabatan berhasil ditambahkan ! </strong> <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
                  redirect('jabatan');
               }
          } 
            
          public function ubah_jabatan(){ 
                  $this->M_jabatan->edit_jabatan();
                  $this->session->set_flashdata('notif','<div class="alert alert-info mt-2" role="alert"> <strong>Data jabatan berhasil dinonaktifkan ! </strong> <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
                  redirect('jabatan');
          }

     } 
?>