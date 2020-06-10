<?php
     class Box extends CI_Controller{

          public function __construct(){
               parent::__construct();
               $this->load->model('M_box');
               $this->load->library('form_validation');
               if($this->session->userdata('status')!=="login") {
                    redirect('login/login');
                  }
               }
     
          public function index(){
               $data['box']=$this->M_box->show_box();
               $this->load->view('template/header');
               $this->load->view('template/sidebar');
               $this->load->view('box/v_data_box',$data);
               $this->load->view('template/footer');
          }

          public function add_box(){
               //validasi form
               $this->form_validation->set_rules('box','box','required');

               if ($this->form_validation->run()==FALSE){
                    $this->session->set_flashdata('notif','<div class="alert alert-danger mt-2" role="alert"> <strong>Data box gagal ditambahkan ! </strong> <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
                  redirect('box');
               }else{
                  $this->M_box->add_box();
                  $this->session->set_flashdata('notif','<div class="alert alert-info mt-2" role="alert"> <strong>Data box berhasil ditambahkan ! </strong> <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
                  redirect('box');
               }
          } 
            
          public function ubah_box(){ 
                  $this->M_box->edit_box();
                  $this->session->set_flashdata('notif','<div class="alert alert-info mt-2" role="alert"> <strong>Data box berhasil dinonaktifkan ! </strong> <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
                  redirect('box');
          }

     } 
?>