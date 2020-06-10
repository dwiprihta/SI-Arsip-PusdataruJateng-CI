<?php
     class Pinjam extends CI_Controller{

          public function __construct(){
               parent::__construct();
               $this->load->model('M_pinjam');
               $this->load->library('form_validation');
               if($this->session->userdata('status')!=="login") {
                    redirect('login/login');
                  }
               }
     
          public function index(){
               $data['pinjam']=$this->M_pinjam->show_pinjam();
               $data['pegawai']=$this->M_pinjam->get_pegawai();
               $this->load->view('template/header');
               $this->load->view('template/sidebar');
               $this->load->view('pinjam/v_data_pinjam',$data);
               $this->load->view('template/footer');
          }

          public function kembali(){
               $data['kembali']=$this->M_pinjam->show_kembali();
               $this->load->view('template/header');
               $this->load->view('template/sidebar');
               $this->load->view('pinjam/v_data_kembali',$data);
               $this->load->view('template/footer');
          }

          public function add_pinjam(){
               $this->form_validation->set_rules('nip', 'Nip', 'required');
               // $this->form_validation->set_rules('keperluan', 'Keperluan', 'required');
               if ($this->form_validation->run()==false){
                    $this->session->set_flashdata('notif','<div class="alert alert-danger mt-2" role="alert"> <strong>Data gagal ditambahkan ! </strong> <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
                    redirect('pinjam'); 	
               }else{
                    $this->M_pinjam->add_pinjam();
                    $this->session->set_flashdata('notif','<div class="alert alert-info mt-2" role="alert"> <strong>Data pinjam berhasil ditambahkan ! </strong> <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
                    redirect('pinjam');	
               }
          } 


          public function ubah_pinjam(){ 
               $this->form_validation->set_rules('nip', 'Nip', 'required');

               if ($this->form_validation->run()==false){
                    $this->session->set_flashdata('notif','<div class="alert alert-danger mt-2" role="alert"> <strong>Data arsip gagal dikembalikan ! </strong> <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
                    redirect('pinjam'); 
               } else {
                    $this->M_pinjam->edit_pinjam();
                    $this->session->set_flashdata('notif','<div class="alert alert-info mt-2" role="alert"> <strong>Data Arsip berhasil dikembalikan ! </strong> <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
                    redirect('pinjam');
               }
          }

          public function del_pinjam($id){
               $this->M_pinjam->del_pinjam($id);
               $this->session->set_flashdata('notif','<div class="alert alert-info mt-2" role="alert"> <strong>Data pinjam berhasil dihapus ! </strong> <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
               redirect ('pinjam');
          }

     } 
?>