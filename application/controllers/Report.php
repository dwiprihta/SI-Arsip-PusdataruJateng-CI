<?php
     class Report extends CI_Controller{

     public function __construct(){
          parent::__construct();
          $this->load->model('M_report');
          $this->load->library('form_validation');
          if($this->session->userdata('status')!=="login") {
               redirect('login/login');
               }
          }
 
               function index(){
                    $this->load->view('template/header');
                    $this->load->view('template/sidebar');
                    $this->load->view('report/v_report');
                    $this->load->view('template/footer_blind');
               }

               function sortir_label(){   		
                    $keyword = $this->input->post('label');
                    $data['report']=$this->M_report->get_label_keyword($keyword);
                    $this->load->view('template/header_report');
                    $this->load->view('report/r_label',$data);
               }

               function sortir_pegawai(){   		
                    $keyword = $this->input->post('pegawai');
                    $data['pegawai']=$this->M_report->get_pegawai($keyword);
                    $this->load->view('template/header_report');
                    $this->load->view('report/r_pegawai',$data);

               }

               function sortir_dokumen(){   		
                    $keyword = $this->input->post('dokumen');
                    $data['dokumen']=$this->M_report->get_dokumen($keyword);
                    $this->load->view('template/header_report');
                    $this->load->view('report/r_dokumen',$data);

               }
          }