<?php
     class Dokumen extends CI_Controller{


          private $filename = "import_dokumen"; // Kita tentukan nama filenya
          public function __construct(){
               parent::__construct();
               $this->load->model('M_dokumen');
               $this->load->library('form_validation');
               if($this->session->userdata('status')!=="login") {
                    redirect('login/login');
                  }
               }
          
          public function index(){
               $data['dokumen']=$this->M_dokumen->show_dokumen();
               // $data['jabatan']=$this->M_dokumen->get_jabatan();
               $this->load->view('template/header');
               $this->load->view('template/sidebar');
               $this->load->view('dokumen/v_data_dokumen',$data);
               $this->load->view('template/footer');
          }

          public function pensiun(){
               $data['dokumen']=$this->M_dokumen->show_dokumen_p();
               // $data['jabatan']=$this->M_dokumen->get_jabatan();
               $this->load->view('template/header');
               $this->load->view('template/sidebar');
               $this->load->view('dokumen/v_data_dokumen_pensiun',$data);
               $this->load->view('template/footer');
          }

          //AUTOFILL NAMA dokumen
          public function find()
          {
               $keyword = $this->uri->segment(3);
               $where = "status = 'aktif'";
               $data = $this->M_dokumen->get_result($keyword, $where);

               if (is_array($data) && !empty($data)) {
                    foreach($data as $row)
                    {
                              $arr['query'] = $keyword;
                              $arr['suggestions'][] = [
                              'value'	=> $row->nip." — ".$row->nama." — ".$row->jabatan,
                              'nip' => $row->nip,
                              'nama' => $row->nama,
                              'instansi' => $row->instansi,
                              'pangkat' => $row->pangkat,
                              'jabatan' => $row->jabatan,
                              //'m_name' => $row->m_name,
                         ];
                    }
                    echo json_encode($arr);

               } else {
                    $arr['suggestions'][] = [
                         'value'	=> "<span>dokumen tidak ditemukan!</span>",
                         'nip' => "",
                         'nama' => "",
                         'pangkat' => "",
                         'jabatan' => "",
                         //'m_name' => "",
                    ];
                    echo json_encode($arr);
               }
          }

         //cek pegawai ditambahkan
          public function check()
              {
                   $keyword = $this->uri->segment(3);
                   $keyword = $this->input->get('keyword', TRUE);
                   $where = "nip = '$keyword'";
                   echo $this->M_dokumen->get_maps($where) ? 1 : 0;
              }

         public function result()
         {
              $keyword = $this->uri->segment(3);
              $keyword = $this->input->get('keyword', TRUE);
              $where = "penyimpanan = '$keyword'";
              echo $this->M_dokumen->get_maps($where) ? 1 : 0;
         }

         public function import(){
          $upload = $this->M_dokumen->upload_file($this->filename);
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
                         //'nama'=>$row['A'],
                         "nip" =>$row['B'],
                         "rak" =>$row['C'],
                         "box" =>$row['D'],
                         "definitif" =>$row['E'],
                         "penyimpanan" =>$row['F'],
                         "tanggal_simpan" =>$row['G'],
                        //BATAS DOKUMEN
                         "surat_lamaran" =>$row['H'],
                         "cv" =>$row['I'],
                         "sk_cpns" =>$row['J'],
                         "sttpl" =>$row['K'],
                         "sk_pns" =>$row['L'],
                         "kapeg" =>$row['M'],
                         "taspen" =>$row['N'],
                         "sumpah_pegawai" =>$row['O'],
                         "ijasah" =>$row['P'],
                         "surat_kenaikan_gaji" =>$row['Q'],
                         "sk_kenaikan_pangkat" =>$row['R'],
                         "sk_jabatan" =>$row['S'],
                         "sumpah_jabatan" =>$row['T'],
                         "sk_penempatan" =>$row['U'],
                         "data_keluarga" =>$row['V'],
                         "karsu" =>$row['W'],
                         "akses_bpjs" =>$row['X'],
                         "surat_cuti" =>$row['Y'],
                         "surat_mutasi" =>$row['Z'],
                         "dp_tiga" =>$row['AA'],
                         "surat_belajar" =>$row['AB'],
                         "penilaian_prestasi" =>$row['AC'],
                         "tanda_jasa" =>$row['AD'],
                         "surat_penggunaan_gelar" =>$row['AE'],
                         "riwayat_diklat" =>$row['AF'],
                         "surat_nikah_akta" =>$row['AG'],
                         "surat_tugas" =>$row['AH'],
                         "ktp_kk" =>$row['AI'],
                         "pend_profesi" =>$row['AJ'],
                         "sk_pensiun" =>$row['AK']

                    ));
               }
               
               $numrow++; // Tambah 1 setiap kali looping
          }

          // Panggil fungsi insert_multiple yg telah kita buat sebelumnya di model
          $this->M_dokumen->insert_multiple($data);
          $this->session->set_flashdata('notif','<div class="alert alert-info mt-2" role="alert"> <strong>Import Data arsip berhasil dilakukan ! </strong> <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
          redirect("dokumen"); // Redirect ke halaman awal (ke controller siswa fungsi index)

               }else{ // Jika proses upload gagal
                    $data['upload_error'] = $upload['error']; // Ambil pesan error uploadnya untuk dikirim ke file form dan ditampilkan
               }
     }

     public function export(){
          // Load plugin PHPExcel nya
          include APPPATH.'third_party/PHPExcel/PHPExcel.php';
          
          // Panggil class PHPExcel nya
          $excel = new PHPExcel();

          // Settingan awal fil excel
          $excel->getProperties()->setCreator('My Notes Code')
                                      ->setLastModifiedBy('My Notes Code')
                                      ->setTitle("Data Pegawai")
                                      ->setSubject("Siswa")
                                      ->setDescription("Laporan Semua Data Siswa")
                                      ->setKeywords("Data Siswa");

          // Buat sebuah variabel untuk menampung pengaturan style dari header tabel
          $style_col = array(
               'font' => array('bold' => true), // Set font nya jadi bold
               'alignment' => array(
                    'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER, // Set text jadi ditengah secara horizontal (center)
                    'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER // Set text jadi di tengah secara vertical (middle)
               ),
               'borders' => array(
                    'top' => array('style'  => PHPExcel_Style_Border::BORDER_THIN), // Set border top dengan garis tipis
                    'right' => array('style'  => PHPExcel_Style_Border::BORDER_THIN),  // Set border right dengan garis tipis
                    'bottom' => array('style'  => PHPExcel_Style_Border::BORDER_THIN), // Set border bottom dengan garis tipis
                    'left' => array('style'  => PHPExcel_Style_Border::BORDER_THIN) // Set border left dengan garis tipis
               )
          );

          // Buat sebuah variabel untuk menampung pengaturan style dari isi tabel
          $style_row = array(
               'alignment' => array(
                    'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER // Set text jadi di tengah secara vertical (middle)
               ),
               'borders' => array(
                    'top' => array('style'  => PHPExcel_Style_Border::BORDER_THIN), // Set border top dengan garis tipis
                    'right' => array('style'  => PHPExcel_Style_Border::BORDER_THIN),  // Set border right dengan garis tipis
                    'bottom' => array('style'  => PHPExcel_Style_Border::BORDER_THIN), // Set border bottom dengan garis tipis
                    'left' => array('style'  => PHPExcel_Style_Border::BORDER_THIN) // Set border left dengan garis tipis
               )
          );

          // $excel->setActiveSheetIndex(0)->setCellValue('A1', "DATA SISWA"); // Set kolom A1 dengan tulisan "DATA SISWA"
          // $excel->getActiveSheet()->mergeCells('A1:E1'); // Set Merge Cell pada kolom A1 sampai E1
          // $excel->getActiveSheet()->getStyle('A1')->getFont()->setBold(TRUE); // Set bold kolom A1
          // $excel->getActiveSheet()->getStyle('A1')->getFont()->setSize(15); // Set font size 15 untuk kolom A1
          // $excel->getActiveSheet()->getStyle('A1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER); // Set text center untuk kolom A1

          // Buat header tabel nya pada baris ke 3
          $excel->setActiveSheetIndex(0)->setCellValue('A1', "NAMA");
          $excel->setActiveSheetIndex(0)->setCellValue('B1', "NIP"); 
          $excel->setActiveSheetIndex(0)->setCellValue('C1', "RAK/ALMARI"); 
          $excel->setActiveSheetIndex(0)->setCellValue('D1', "BOX/OUTNER"); 
          $excel->setActiveSheetIndex(0)->setCellValue('E1', "NO URUT"); 
          $excel->setActiveSheetIndex(0)->setCellValue('F1', "PENYIMPANAN");
          $excel->setActiveSheetIndex(0)->setCellValue('G1', "TANGGAL SIMPAN"); 
          $excel->setActiveSheetIndex(0)->setCellValue('H1', "Surat lamaran"); 
          $excel->setActiveSheetIndex(0)->setCellValue('I1', "CV/DRH");
          $excel->setActiveSheetIndex(0)->setCellValue('J1', "SK CPNS"); 
          $excel->setActiveSheetIndex(0)->setCellValue('K1', "STTPL"); 
          $excel->setActiveSheetIndex(0)->setCellValue('L1', "SK PNS"); 
          $excel->setActiveSheetIndex(0)->setCellValue('M1', "Kapeg"); 
          $excel->setActiveSheetIndex(0)->setCellValue('N1', "Taspen");
          $excel->setActiveSheetIndex(0)->setCellValue('O1', "Sumpah janji pegawai");
          $excel->setActiveSheetIndex(0)->setCellValue('P1', "Ijazah");
          $excel->setActiveSheetIndex(0)->setCellValue('Q1', "Surat kenaikan gaji berkala");
          $excel->setActiveSheetIndex(0)->setCellValue('R1', "SK kenaikan pangkat");
          $excel->setActiveSheetIndex(0)->setCellValue('S1', "SK jabatan & pelantikan");
          $excel->setActiveSheetIndex(0)->setCellValue('T1', "Sumpah jabatan");
          $excel->setActiveSheetIndex(0)->setCellValue('U1', "SK penempatan");
          $excel->setActiveSheetIndex(0)->setCellValue('V1', "Data keluarga");
          $excel->setActiveSheetIndex(0)->setCellValue('W1', "KARSU/KARIS");
          $excel->setActiveSheetIndex(0)->setCellValue('X1', "Akses BPJS");
          $excel->setActiveSheetIndex(0)->setCellValue('Y1', "Suart-surat cuti");
          $excel->setActiveSheetIndex(0)->setCellValue('Z1', "Surat mutasi pegawai");
          $excel->setActiveSheetIndex(0)->setCellValue('AA1', "DP 3");
          $excel->setActiveSheetIndex(0)->setCellValue('AB1', "Surat izin/ tugas belajar");
          $excel->setActiveSheetIndex(0)->setCellValue('AC1', "Penilaian prestasi kerja");
          $excel->setActiveSheetIndex(0)->setCellValue('AD1', "Tanda jasa");
          $excel->setActiveSheetIndex(0)->setCellValue('AE1', "Surat keterangan penggunaan gelar");
          $excel->setActiveSheetIndex(0)->setCellValue('AF1', "Riwayat diklat");
          $excel->setActiveSheetIndex(0)->setCellValue('AG1', "Surat nikah & akta kelahiran anak");
          $excel->setActiveSheetIndex(0)->setCellValue('AH1', "Surat-surat tugas");
          $excel->setActiveSheetIndex(0)->setCellValue('AI1', "KTP & KK");
          $excel->setActiveSheetIndex(0)->setCellValue('AJ1', "Pendidikan profesi / spesialis");
          $excel->setActiveSheetIndex(0)->setCellValue('AK1', "SK Pensiun");

          // Apply style header yang telah kita buat tadi ke masing-masing kolom header
          // $excel->getActiveSheet()->getStyle('A3')->applyFromArray($style_col);
          $excel->getActiveSheet()->getStyle('A1')->applyFromArray($style_col);
          $excel->getActiveSheet()->getStyle('B1')->applyFromArray($style_col);
          // $excel->getActiveSheet()->getStyle('C1')->applyFromArray($style_col);
          // $excel->getActiveSheet()->getStyle('D1')->applyFromArray($style_col);
          // $excel->getActiveSheet()->getStyle('E1')->applyFromArray($style_col);
          // $excel->getActiveSheet()->getStyle('F1')->applyFromArray($style_col);
          // $excel->getActiveSheet()->getStyle('G1')->applyFromArray($style_col);
          // $excel->getActiveSheet()->getStyle('H1')->applyFromArray($style_col);
          // $excel->getActiveSheet()->getStyle('I1')->applyFromArray($style_col);
          // $excel->getActiveSheet()->getStyle('J1')->applyFromArray($style_col);
          // $excel->getActiveSheet()->getStyle('K1')->applyFromArray($style_col);
          // $excel->getActiveSheet()->getStyle('L1')->applyFromArray($style_col);
          // $excel->getActiveSheet()->getStyle('M1')->applyFromArray($style_col);
          // $excel->getActiveSheet()->getStyle('N1')->applyFromArray($style_col);
          // $excel->getActiveSheet()->getStyle('O1')->applyFromArray($style_col);
          // $excel->getActiveSheet()->getStyle('P1')->applyFromArray($style_col);
          // $excel->getActiveSheet()->getStyle('Q1')->applyFromArray($style_col);
          // $excel->getActiveSheet()->getStyle('R1')->applyFromArray($style_col);
          // $excel->getActiveSheet()->getStyle('S1')->applyFromArray($style_col);
          // $excel->getActiveSheet()->getStyle('T1')->applyFromArray($style_col);
          // $excel->getActiveSheet()->getStyle('U1')->applyFromArray($style_col);
          // $excel->getActiveSheet()->getStyle('V1')->applyFromArray($style_col);
          // $excel->getActiveSheet()->getStyle('W1')->applyFromArray($style_col);
          // $excel->getActiveSheet()->getStyle('X1')->applyFromArray($style_col);
          // $excel->getActiveSheet()->getStyle('Y1')->applyFromArray($style_col);
          // $excel->getActiveSheet()->getStyle('Z1')->applyFromArray($style_col);
          // $excel->getActiveSheet()->getStyle('AA1')->applyFromArray($style_col);
          // $excel->getActiveSheet()->getStyle('AB1')->applyFromArray($style_col);
          // $excel->getActiveSheet()->getStyle('AC1')->applyFromArray($style_col);
          // $excel->getActiveSheet()->getStyle('AD1')->applyFromArray($style_col);
          // $excel->getActiveSheet()->getStyle('AE1')->applyFromArray($style_col);
          // $excel->getActiveSheet()->getStyle('AF1')->applyFromArray($style_col);
          // $excel->getActiveSheet()->getStyle('AG1')->applyFromArray($style_col);
          // $excel->getActiveSheet()->getStyle('AH1')->applyFromArray($style_col);
          // $excel->getActiveSheet()->getStyle('AI1')->applyFromArray($style_col);
          // $excel->getActiveSheet()->getStyle('AJ1')->applyFromArray($style_col);
          // $excel->getActiveSheet()->getStyle('AJK')->applyFromArray($style_col);

          // Panggil function view yang ada di SiswaModel untuk menampilkan semua data siswanya
          $tbl_pegawai = $this->M_dokumen->view();

          $no = 1; // Untuk penomoran tabel, di awal set dengan 1
          $numrow = 2; // Set baris pertama untuk isi tabel adalah baris ke 4
          foreach($tbl_pegawai as $data){ // Lakukan looping pada variabel siswa
               // $excel->setActiveSheetIndex(0)->setCellValue('A'.$numrow, $no);
               $excel->setActiveSheetIndex(0)->setCellValue('A'.$numrow, $data->nama);
               $excel->setActiveSheetIndex(0)->setCellValue('B'.$numrow, $data->nip);
               $excel->setActiveSheetIndex(0)->setCellValue('AM1','ada');
               $excel->setActiveSheetIndex(0)->setCellValue('AM2','tidak ada');
               // $excel->setActiveSheetIndex(0)->setCellValue('C'.$numrow, $data->rak);
               // $excel->setActiveSheetIndex(0)->setCellValue('D'.$numrow, $data->box);
               // $excel->setActiveSheetIndex(0)->setCellValue('E'.$numrow, $data->definitif);
               // $excel->setActiveSheetIndex(0)->setCellValue('F'.$numrow, $data->penyimpanan);
               
               // Apply style row yang telah kita buat tadi ke masing-masing baris (isi tabel)
               // $excel->getActiveSheet()->getStyle('A'.$numrow)->applyFromArray($style_row);

               $excel->getActiveSheet()->getStyle('A1'.$numrow)->applyFromArray($style_row);
               $excel->getActiveSheet()->getStyle('B1'.$numrow)->applyFromArray($style_row);
               // $excel->getActiveSheet()->getStyle('C1'.$numrow)->applyFromArray($style_row);
               // $excel->getActiveSheet()->getStyle('D1'.$numrow)->applyFromArray($style_row);
               // $excel->getActiveSheet()->getStyle('E1'.$numrow)->applyFromArray($style_row);
               // $excel->getActiveSheet()->getStyle('F1'.$numrow)->applyFromArray($style_row);
               // $excel->getActiveSheet()->getStyle('G1'.$numrow)->applyFromArray($style_row);
               // $excel->getActiveSheet()->getStyle('H1'.$numrow)->applyFromArray($style_row);
               // $excel->getActiveSheet()->getStyle('I1'.$numrow)->applyFromArray($style_row);
               // $excel->getActiveSheet()->getStyle('J1'.$numrow)->applyFromArray($style_row);
               // $excel->getActiveSheet()->getStyle('K1'.$numrow)->applyFromArray($style_row);
               // $excel->getActiveSheet()->getStyle('L1'.$numrow)->applyFromArray($style_row);
               // $excel->getActiveSheet()->getStyle('M1'.$numrow)->applyFromArray($style_row);
               // $excel->getActiveSheet()->getStyle('N1'.$numrow)->applyFromArray($style_row);
               // $excel->getActiveSheet()->getStyle('O1'.$numrow)->applyFromArray($style_row);
               // $excel->getActiveSheet()->getStyle('P1'.$numrow)->applyFromArray($style_row);
               // $excel->getActiveSheet()->getStyle('Q1'.$numrow)->applyFromArray($style_row);
               // $excel->getActiveSheet()->getStyle('R1'.$numrow)->applyFromArray($style_row);
               // $excel->getActiveSheet()->getStyle('S1'.$numrow)->applyFromArray($style_row);
               // $excel->getActiveSheet()->getStyle('T1'.$numrow)->applyFromArray($style_row);
               // $excel->getActiveSheet()->getStyle('U1'.$numrow)->applyFromArray($style_row);
               // $excel->getActiveSheet()->getStyle('V1'.$numrow)->applyFromArray($style_row);
               // $excel->getActiveSheet()->getStyle('W1'.$numrow)->applyFromArray($style_row);
               // $excel->getActiveSheet()->getStyle('X1'.$numrow)->applyFromArray($style_row);
               // $excel->getActiveSheet()->getStyle('Y1'.$numrow)->applyFromArray($style_row);
               // $excel->getActiveSheet()->getStyle('Z1'.$numrow)->applyFromArray($style_row);
               // $excel->getActiveSheet()->getStyle('AA1'.$numrow)->applyFromArray($style_row);
               // $excel->getActiveSheet()->getStyle('AB1'.$numrow)->applyFromArray($style_row);
               // $excel->getActiveSheet()->getStyle('AC1'.$numrow)->applyFromArray($style_row);
               // $excel->getActiveSheet()->getStyle('AD1'.$numrow)->applyFromArray($style_row);
               // $excel->getActiveSheet()->getStyle('AE1'.$numrow)->applyFromArray($style_row);
               // $excel->getActiveSheet()->getStyle('AF1'.$numrow)->applyFromArray($style_row);
               // $excel->getActiveSheet()->getStyle('AG1'.$numrow)->applyFromArray($style_row);
               // $excel->getActiveSheet()->getStyle('AH1'.$numrow)->applyFromArray($style_row);
               // $excel->getActiveSheet()->getStyle('AI1'.$numrow)->applyFromArray($style_row);
               // $excel->getActiveSheet()->getStyle('AJ1'.$numrow)->applyFromArray($style_row);
               // $excel->getActiveSheet()->getStyle('AJK'.$numrow)->applyFromArray($style_row);
               $no++; // Tambah 1 setiap kali looping
               $numrow++; // Tambah 1 setiap kali looping
          }

          // Set width kolom
         // $excel->getActiveSheet()->getColumnDimension('A')->setWidth(5); // Set width kolom A
          $excel->getActiveSheet()->getColumnDimension('A')->setWidth(30); // Set width kolom B
          $excel->getActiveSheet()->getColumnDimension('B')->setWidth(30); // Set width kolom C
         
          
          // Set height semua kolom menjadi auto (mengikuti height isi dari kolommnya, jadi otomatis)
          $excel->getActiveSheet()->getDefaultRowDimension()->setRowHeight(-1);

          // Set orientasi kertas jadi LANDSCAPE
          $excel->getActiveSheet()->getPageSetup()->setOrientation(PHPExcel_Worksheet_PageSetup::ORIENTATION_LANDSCAPE);

          // Set judul file excel nya
          $excel->getActiveSheet(0)->setTitle("import dokumen");
          $excel->setActiveSheetIndex(0);

          // Proses file excel
          header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
          header('Content-Disposition: attachment; filename="import_dokumen.xlsx"'); // Set nama file excel nya
          header('Cache-Control: max-age=0');

          $write = PHPExcel_IOFactory::createWriter($excel, 'Excel2007');
          $write->save('php://output');
     }
     

          public function add_dokumen(){
               //validasi form
               $this->form_validation->set_rules('nip','Nip','required');
               
               $data['lastmap'] = $this->M_dokumen->get_last();
               $data['almari']=$this->M_dokumen->get_almari();
               $data['block']=$this->M_dokumen->get_block();
               $data['rak']=$this->M_dokumen->get_rak();
               $data['box']=$this->M_dokumen->get_box();

               if ($this->form_validation->run()==FALSE){
                    $this->load->view('template/header');
                    $this->load->view('template/sidebar');
                    $this->load->view('dokumen/v_add_dokumen',$data);
                    $this->load->view('template/footer');
               }else{
                  $this->M_dokumen->add_dokumen();
                  $this->session->set_flashdata('notif','<div class="alert alert-info mt-2" role="alert"> <strong>Data Dokumen berhasil ditambahkan ! </strong> <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
                  redirect('dokumen');
               }
          } 

          public function detil_dokumen($id){
               $data['dokumen']=$this->M_dokumen->getdetil_dokumen_u($id);
               $data['dkm']=$this->M_dokumen->getdetil_dokumen($id);
               $data['dkm_p']=$this->M_dokumen->getdetil_dokumen_p($id);
               $this->load->view('template/header');
               $this->load->view('template/sidebar');
               $this->load->view('dokumen/v_detil_dokumen',$data);
               $this->load->view('template/footer');
          }

          public function detil_dokumen_p($id){
               $data['dokumen']=$this->M_dokumen->getdetil_dokumen_u($id);
               $data['dkm']=$this->M_dokumen->getdetil_dokumen($id);
               $data['dkm_p']=$this->M_dokumen->getdetil_dokumen_p($id);
               $this->load->view('template/header');
               $this->load->view('template/sidebar');
               $this->load->view('dokumen/v_detil_dokumen_pensiun',$data);
               $this->load->view('template/footer');
          }
          
     
          public function ubah_dokumen($id){ 
               $data['dokumen']=$this->M_dokumen->getdetil_dokumen_u($id);
               $data['dkm']=$this->M_dokumen->getdetil_dokumen($id);
               $data['lastmap'] = $this->M_dokumen->get_last();
               $data['almari']=$this->M_dokumen->get_almari();
               $data['block']=$this->M_dokumen->get_block();
               $data['rak']=$this->M_dokumen->get_rak();
               $data['box']=$this->M_dokumen->get_box();
               $this->form_validation->set_rules('nip','NIP','required');
               // $this->form_validation->set_rules('nama','Nama','required'); 
               //$this->form_validation->set_rules('jk','Jenis Kelamin','required'); 
               
               if ($this->form_validation->run()==FALSE){
                    $this->load->view('template/header');
                    $this->load->view('template/sidebar');
                    $this->load->view('dokumen/v_edit_dokumen',$data);
                    $this->load->view('template/footer');
               }else{
                  $this->M_dokumen->edit_dokumen();
                  $this->session->set_flashdata('notif','<div class="alert alert-info mt-2" role="alert"> <strong>Data dokumen berhasil diubah ! </strong> <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
                  redirect('dokumen');
               }
          }

          public function ubah_dokumen_p($id){ 
               $data['dokumen']=$this->M_dokumen->getdetil_dokumen_u($id);
               $data['dkm']=$this->M_dokumen->getdetil_dokumen($id);
               $data['lastmap'] = $this->M_dokumen->get_last();
               $data['almari']=$this->M_dokumen->get_almari();
               $data['block']=$this->M_dokumen->get_block();
               $data['rak']=$this->M_dokumen->get_rak();
               $data['box']=$this->M_dokumen->get_box();
               $this->form_validation->set_rules('nip','NIP','required');
               // $this->form_validation->set_rules('nama','Nama','required'); 
               //$this->form_validation->set_rules('jk','Jenis Kelamin','required'); 
               
               if ($this->form_validation->run()==FALSE){
                    $this->load->view('template/header');
                    $this->load->view('template/sidebar');
                    $this->load->view('dokumen/v_edit_dokumen_pensiun',$data);
                    $this->load->view('template/footer');
               }else{
                  $this->M_dokumen->edit_dokumen();
                  $this->session->set_flashdata('notif','<div class="alert alert-info mt-2" role="alert"> <strong>Data dokumen berhasil diubah ! </strong> <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
                  redirect('dokumen/pensiun');
               }
          }


          public function del_dokumen($id){
               $this->M_dokumen->del_dokumen($id);
               $this->session->set_flashdata('notif','<div class="alert alert-info mt-2" role="alert"> <strong>Data dokumen berhasil dihapus ! </strong> <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
               redirect ('dokumen');
          }

     } 
?>