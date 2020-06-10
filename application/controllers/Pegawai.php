<?php
     class Pegawai extends CI_Controller{

          private $filename = "import_pegawai"; // Kita tentukan nama filenya
          public function __construct(){
               parent::__construct();
               $this->load->model('M_pegawai');
               $this->load->library('form_validation');
               $this->load->helper('form','url');
               if($this->session->userdata('status')!=="login") {
                    redirect('login/login');
                  }
               }
     
          public function index(){
               $data['pegawai']=$this->M_pegawai->show_pegawai();
               $data['instansi']=$this->M_pegawai->get_instansi();
               $data['jabatan']=$this->M_pegawai->get_jabatan();
               $data['pangkat']=$this->M_pegawai->get_pangkat();
               $data['golongan']=$this->M_pegawai->get_golongan();
               $this->load->view('template/header');
               $this->load->view('template/sidebar');
               $this->load->view('pegawai/v_data_pegawai',$data);
               $this->load->view('template/footer');
          }

          public function pensiun(){
               $data['pegawai']=$this->M_pegawai->show_pegawai_p();
               $data['instansi']=$this->M_pegawai->get_instansi();
               $data['jabatan']=$this->M_pegawai->get_jabatan();
               $data['pangkat']=$this->M_pegawai->get_pangkat();
               $data['golongan']=$this->M_pegawai->get_golongan();
               $this->load->view('template/header');
               $this->load->view('template/sidebar');
               $this->load->view('pegawai/v_data_pegawai_pensiun',$data);
               $this->load->view('template/footer');
          }

          public function detil_pegawai($id){
               $data['pegawai']=$this->M_pegawai->getdetil_pegawai($id);
               $this->load->view('template/header');
               $this->load->view('template/sidebar');
               $this->load->view('pegawai/v_detil_pegawai',$data);
               $this->load->view('template/footer');
          }
         
          public function add_pegawai(){
               //validasi form
               $this->form_validation->set_rules('npm','Npm','required|numeric');
               $this->form_validation->set_rules('nama','Nama','required'); 
               $this->form_validation->set_rules('jk','Jenis Kelamin','required'); 

               if ($this->form_validation->run()==FALSE){
                    $this->session->set_flashdata('notif','<div class="alert alert-danger mt-2" role="alert"> <strong>Data pegawai gagal ditambahkan ! </strong> <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
                  redirect('pegawai');
               }else{
                  $this->M_pegawai->add_pegawai();
                  $this->session->set_flashdata('notif','<div class="alert alert-info mt-2" role="alert"> <strong>Data pegawai berhasil ditambahkan ! </strong> <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
                  redirect('pegawai');
               }
          } 

          public function import(){
               $upload = $this->M_pegawai->upload_file($this->filename);
               if($upload['result'] == "success"){
               // Load plugin PHPExcel nya
               include APPPATH.'third_party/PHPExcel/PHPExcel.php';
               
               $excelreader = new PHPExcel_Reader_Excel2007();
               $loadexcel = $excelreader->load('excel/'.$this->filename.'.xlsx'); // Load file yang telah diupload ke folder excel
               $sheet = $loadexcel->getActiveSheet()->toArray(null, true, true ,true);
               
               // Buat sebuah variabel array untuk menampung array data yg akan kita insert ke database
               $data = array();
               
               $numrow = 1;
               foreach($sheet as $row){
                    // Cek $numrow apakah lebih dari 1
                    // Artinya karena baris pertama adalah nama-nama kolom
                    // Jadi dilewat saja, tidak usah diimport
                    if($numrow > 1){
                         // Kita push (add) array data ke variabel data
                         array_push($data, array(
                              'nama'=>$row['A'], // Insert data nis dari kolom A di excel
                              'nip'=>$row['B'], // Insert data nama dari kolom B di excel
                              'jenis_kelamin'=>$row['C'], // Insert data jenis kelamin dari kolom C di excel
                              'tempat_lahir'=>$row['D'], // Insert data alamat dari kolom D di excel
                              'tanggal_lahir'=>$row['E'],
                              'instanSi'=>$row['F'],
                              'pangkat'=>$row['G'],
                              'Jabatan'=>$row['H'],
                              'Golongan'=>$row['I'],
                              'status'=>$row['J'],
                              'tanggal_pensiun'=>$row['K'],
                              'foto'=>$row['L']

                         ));
                    }
                    
                    $numrow++; // Tambah 1 setiap kali looping
               }
     
               // Panggil fungsi insert_multiple yg telah kita buat sebelumnya di model
               $this->M_pegawai->insert_multiple($data);
               $this->session->set_flashdata('notif','<div class="alert alert-info mt-2" role="alert"> <strong>Import Data pegawai berhasil dilakukan ! </strong> <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
               redirect("pegawai"); // Redirect ke halaman awal (ke controller siswa fungsi index)

                    }else{ // Jika proses upload gagal
                         $data['upload_error'] = $upload['error']; // Ambil pesan error uploadnya untuk dikirim ke file form dan ditampilkan
                    }
          }
          

          public function export(){
               // Load plugin PHPExcel nya
               include APPPATH.'third_party/PHPExcel/PHPExcel.php';
               
               // Panggil class PHPExcel nya
               $excel = new PHPExcel();

               // Buat header tabel nya pada baris ke 3
               $excel->setActiveSheetIndex(0)->setCellValue('A1', "NAMA");
               $excel->setActiveSheetIndex(0)->setCellValue('B1', "NIP"); 
               $excel->setActiveSheetIndex(0)->setCellValue('C1', "JENIS KELAMIN"); 
               $excel->setActiveSheetIndex(0)->setCellValue('D1', "TEMPAT LAHIR"); 
               $excel->setActiveSheetIndex(0)->setCellValue('E1', "TANGGAL LAHIR"); 
               $excel->setActiveSheetIndex(0)->setCellValue('F1', "INSTANSI");
               $excel->setActiveSheetIndex(0)->setCellValue('G1', "JABATAN"); 
               $excel->setActiveSheetIndex(0)->setCellValue('H1', "PANGKAT"); 
               $excel->setActiveSheetIndex(0)->setCellValue('I1', "GOLONGAN");
               $excel->setActiveSheetIndex(0)->setCellValue('J1', "STATUS"); 
               $excel->setActiveSheetIndex(0)->setCellValue('K1', "TANGGAL_PENSIUN"); 
               $excel->setActiveSheetIndex(0)->setCellValue('L1', "FOTO"); 
       
               $tbl_pegawai = $this->M_pegawai->view();
               $no = 1; 
               $numrow = 2; 
               foreach($tbl_pegawai as $data){ 
                    
                    $excel->setActiveSheetIndex(0)->setCellValue('A'.$numrow, $data->nama);
                    $excel->setActiveSheetIndex(0)->setCellValue('B'.$numrow, $data->nip);
                    $excel->setActiveSheetIndex(0)->setCellValue('C'.$numrow, $data->jenis_kelamin);
                    $excel->setActiveSheetIndex(0)->setCellValue('D'.$numrow, $data->tempat_lahir);
                    $excel->setActiveSheetIndex(0)->setCellValue('E'.$numrow, $data->tanggal_lahir);
                    $excel->setActiveSheetIndex(0)->setCellValue('F'.$numrow, $data->instansi);
                    $excel->setActiveSheetIndex(0)->setCellValue('G'.$numrow, $data->jabatan);
                    $excel->setActiveSheetIndex(0)->setCellValue('H'.$numrow, $data->pangkat);
                    $excel->setActiveSheetIndex(0)->setCellValue('I'.$numrow, $data->golongan);
                    $excel->setActiveSheetIndex(0)->setCellValue('J'.$numrow, $data->status);
                    $excel->setActiveSheetIndex(0)->setCellValue('K'.$numrow, $data->tanggal_pensiun);
                    $excel->setActiveSheetIndex(0)->setCellValue('L'.$numrow,"default.jpg");

                    $excel->setActiveSheetIndex(0)->setCellValue('AM1','ada');
                    $excel->setActiveSheetIndex(0)->setCellValue('AM2','tidak ada');

                    $no++; // Tambah 1 setiap kali looping
                    $numrow++; // Tambah 1 setiap kali looping
               }
     
               // Set width kolom
               $excel->getActiveSheet()->getColumnDimension('A')->setWidth(30); // Set width kolom B
               $excel->getActiveSheet()->getColumnDimension('B')->setWidth(30); // Set width kolom C
              
               
               // Set height semua kolom menjadi auto (mengikuti height isi dari kolommnya, jadi otomatis)
               $excel->getActiveSheet()->getDefaultRowDimension()->setRowHeight(-1);
     
               // Set orientasi kertas jadi LANDSCAPE
               $excel->getActiveSheet()->getPageSetup()->setOrientation(PHPExcel_Worksheet_PageSetup::ORIENTATION_LANDSCAPE);
     
               // Set judul file excel nya
               $excel->getActiveSheet(0)->setTitle("import pegawai");
               $excel->setActiveSheetIndex(0);
     
               // Proses file excel
               header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
               header('Content-Disposition: attachment; filename="import_pegawai.xlsx"'); // Set nama file excel nya
               header('Cache-Control: max-age=0');
     
               $write = PHPExcel_IOFactory::createWriter($excel, 'Excel2007');
               $write->save('php://output');
          }

          
          public function del_pegawai($id){
               $this->M_pegawai->del_pegawai($id);
               $this->session->set_flashdata('notif','<div class="alert alert-info mt-2" role="alert"> <strong>Data pegawai berhasil dihapus ! </strong> <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
               redirect ('pegawai');
          }
     
          public function ubah_pegawai($id){ 
               $data['pegawai']=$this->M_pegawai->getdetil_pegawai($id);
               $data['instansi']=$this->M_pegawai->get_instansi();
               $data['jabatan']=$this->M_pegawai->get_jabatan();
               $data['pangkat']=$this->M_pegawai->get_pangkat();
               $data['golongan']=$this->M_pegawai->get_golongan();
               //$this->form_validation->set_rules('npm','nomor pokok mahasiswa','required|numeric');
               // $this->form_validation->set_rules('nama','Nama','required'); 
               $this->form_validation->set_rules('jk','Jenis Kelamin','required'); 
               
               if ($this->form_validation->run()==FALSE){
                    $this->load->view('template/header');
                    $this->load->view('template/sidebar');
                    $this->load->view('pegawai/v_edit_pegawai',$data);
                    $this->load->view('template/footer');
               }else{
                  $this->M_pegawai->edit_pegawai();
                  $this->session->set_flashdata('notif','<div class="alert alert-info mt-2" role="alert"> <strong>Data pegawai berhasil diubah ! </strong> <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
                  redirect('pegawai');
               }
          }
          

          //UBAH STATUS
          public function ubah_pegawaii(){ 
                  $this->M_pegawai->edit_pegawai();
                  $this->session->set_flashdata('notif','<div class="alert alert-info mt-2" role="alert"> <strong>Data pegawai berhasil dipensiunkan ! </strong> <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
                  redirect('pegawai');
          }

          //EDIT KP
		public function edit_foto(){
			//aksi edit form kp
	           $this->M_pegawai->edit_foto();
	           $this->session->set_flashdata('notif','<div class="alert alert-info mt-2" role="alert">Foto Berhasil diperbarui <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
	           redirect('pegawai');
          }
     } 
