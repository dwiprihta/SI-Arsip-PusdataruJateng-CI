<?php
     class Golongan extends CI_Controller{

          public function __construct(){
               parent::__construct();
               $this->load->model('M_golongan');
               $this->load->library('form_validation');
               if($this->session->userdata('status')!=="login") {
                    redirect('login/login');
                  }
               }
     
          public function index(){
               $data['golongan']=$this->M_golongan->show_golongan();
               $this->load->view('template/header');
               $this->load->view('template/sidebar');
               $this->load->view('golongan/v_data_golongan',$data);
               $this->load->view('template/footer');
          }

          public function detil_golongan($id){
               $data['golongan']=$this->M_golongan->getdetil_golongan($id);
               $this->load->view('template/header');
               $this->load->view('template/sidebar');
               $this->load->view('golongan/v_detil_golongan',$data);
               $this->load->view('template/footer');
          }
         
          public function add_golongan(){
               //validasi form
               $this->form_validation->set_rules('golongan','golongan','required');

               if ($this->form_validation->run()==FALSE){
                    $this->session->set_flashdata('notif','<div class="alert alert-danger mt-2" role="alert"> <strong>Data golongan gagal ditambahkan ! </strong> <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
                  redirect('golongan');
               }else{
                  $this->M_golongan->add_golongan();
                  $this->session->set_flashdata('notif','<div class="alert alert-info mt-2" role="alert"> <strong>Data golongan berhasil ditambahkan ! </strong> <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
                  redirect('golongan');
               }
          } 
          
          public function del_golongan($id){
               $this->M_golongan->del_golongan($id);
               $this->session->set_flashdata('notif','<div class="alert alert-info mt-2" role="alert"> <strong>Data golongan berhasil dihapus ! </strong> <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
               redirect ('golongan');
          }
     
          public function ubah_golongan(){ 
                  $this->M_golongan->edit_golongan();
                  $this->session->set_flashdata('notif','<div class="alert alert-info mt-2" role="alert"> <strong>Data golongan berhasil dinonaktifkan ! </strong> <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
                  redirect('golongan');
          }

     } 
?>