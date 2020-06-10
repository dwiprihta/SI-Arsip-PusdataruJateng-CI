<?php

class Admin extends CI_Controller {

	public function __construct()
	{
	   parent::__construct();
	   $this->load->model('M_admin');
        $this->load->helper('url','form','html');
        if($this->session->userdata('status')!=="login") {
          redirect('login/login');
        }
	 }

	public function index(){
		$data['aktif'] = $this->M_admin->tampil_aktif();
		$data['pensiun'] = $this->M_admin->tampil_pensiun();
		$data['arsip'] = $this->M_admin->tampil_arsip();
		$data['pinjam'] = $this->M_admin->tampil_pinjam();
		$data['graph'] = $this->M_admin->graph();
		$data['graph1'] = $this->M_admin->graph1();
		$this->load->view('template/header.php');
		$this->load->view('template/sidebar.php');
		$this->load->view('template/v_admin.php',$data);
		$this->load->view('template/footer.php');
	}
}
