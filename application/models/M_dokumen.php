<?php

     Class M_dokumen extends CI_Model{



          public function show_dokumen(){

              $query=$this->db->get_where('v_dokumen', ['status'=>'aktif']);

              return $query->result_array();

          }



          public function show_dokumen_p(){

               $query=$this->db->get_where('v_dokumen', ['status'=>'pensiun']);

               return $query->result_array();

           }



          public function get_almari(){

               $query=$this->db->get('tbl_almari');

               return $query->result_array();

          }



          public function get_block(){

               $query=$this->db->get('tbl_block');

               return $query->result_array();

          }



          public function get_rak(){

               $query=$this->db->get('tbl_rak');

               return $query->result_array();

          }



          public function get_box(){

               $query=$this->db->get('tbl_box');

               return $query->result_array();

          }



          public function view(){

               return $this->db->get('tbl_pegawai')->result(); 

          }



          public function get_last()

          {

               $query = $this->db->select('penyimpanan')->order_by('tanggal_simpan',"desc")->limit(1)->get('tbl_dokumen');

               //var_dump ($query);

          

               if ($query->num_rows() > 0) {

                    return $query->row_array();

               }

          }



          public function get_maps($where)

               {

                    //$query = $this->db->where($where)->get(self::$table);

                    $query = $this

                    ->db

                    ->select('*')

                    ->from('tbl_dokumen')

                    ->where($where)

                    ->get();

                    if ($query->num_rows() == 0) {

                    return TRUE;

               } else {

                    return FALSE;

               }

               }



          public function get_result($keyword, $where)

          {

               $query = $this

                         ->db

                         ->select('*')

                         ->from('tbl_pegawai')

                         ->like('nip', $keyword)

                         ->or_like('nama', $keyword)

                         ->where($where)

                         ->get();

     

             if ($query->num_rows() > 0) {

                 return $query->result();

             } else {

                 return NULL;

             }

          }



          public function add_dokumen(){

               $data = [

                    //"id_dokumen" =>$this->input->post('id_dokumen',true),

                    "nip" =>$this->input->post('nip',true),

                    "rak" =>$this->input->post('d_cname',true),

                    "box" =>$this->input->post('d_fname',true),

                    "definitif" =>$this->input->post('d_map',true),

                    "penyimpanan" =>$this->input->post('d_kode_map',true),

                    "tanggal_simpan" =>date('Y-m-d'),

                    //BATAS DOKUMEN

                    "surat_lamaran" =>$this->input->post('surat_lamaran',true),

                    "cv" =>$this->input->post('cv',true),

                    "sk_cpns" =>$this->input->post('sk_cpns',true),

                    "sttpl" =>$this->input->post('sttpl',true),

                    "sk_pns" =>$this->input->post('sk_pns',true),

                    "kapeg" =>$this->input->post('kapeg',true),

                    "taspen" =>$this->input->post('taspen',true),

                    "sumpah_pegawai" =>$this->input->post('sumpah_pegawai',true),

                    "ijasah" =>$this->input->post('ijasah',true),

                    "surat_kenaikan_gaji" =>$this->input->post('surat_kenaikan_gaji',true),

                    "sk_kenaikan_pangkat" =>$this->input->post('sk_kenaikan_pangkat',true),

                    "sk_jabatan" =>$this->input->post('sk_jabatan',true),

                    "sumpah_jabatan" =>$this->input->post('sumpah_jabatan',true),

                    "sk_penempatan" =>$this->input->post('sk_penempatan',true),

                    "data_keluarga" =>$this->input->post('data_keluarga',true),

                    "karsu" =>$this->input->post('karsu',true),

                    "akses_bpjs" =>$this->input->post('akses_bpjs',true),

                    "surat_cuti" =>$this->input->post('surat_cuti',true),

                    "surat_mutasi" =>$this->input->post('surat_mutasi',true),

                    "dp_tiga" =>$this->input->post('dp_tiga',true),

                    "surat_belajar" =>$this->input->post('surat_belajar',true),

                    "penilaian_prestasi" =>$this->input->post('penilaian_prestasi',true),

                    "tanda_jasa" =>$this->input->post('tanda_jasa',true),

                    "surat_penggunaan_gelar" =>$this->input->post('surat_penggunaan_gelar',true),

                    "riwayat_diklat" =>$this->input->post('riwayat_diklat',true),

                    "surat_nikah_akta" =>$this->input->post('surat_nikah_akta',true),

                    "surat_tugas" =>$this->input->post('surat_tugas',true),

                    "ktp_kk" =>$this->input->post('ktp_kk',true),

                    "pend_profesi" =>$this->input->post('pend_profesi',true),

                    "sk_pensiun" =>$this->input->post('sk_pensiun',true)

               ];

                    $this->db->insert('tbl_dokumen', $data);

                    

          }



          // Fungsi untuk melakukan proses upload file

          public function upload_file($filename){

               $this->load->library('upload'); // Load librari upload

               

               $config['upload_path'] = './excel/';

               $config['allowed_types'] = 'xlsx';

               $config['max_size']	= '2048';

               $config['overwrite'] = true;

               $config['file_name'] = $filename;

          

               $this->upload->initialize($config); // Load konfigurasi uploadnya

               if($this->upload->do_upload('file')){ // Lakukan upload dan Cek jika proses upload berhasil

                    // Jika berhasil :

                    $return = array('result' => 'success', 'file' => $this->upload->data(), 'error' => '');

                    return $return;

               }else{

                    // Jika gagal :

                    $return = array('result' => 'failed', 'file' => '', 'error' => $this->upload->display_errors());

                    return $return;

               }

          }

          

          // Buat sebuah fungsi untuk melakukan insert lebih dari 1 data

          public function insert_multiple($data){

               $this->db->insert_batch('tbl_dokumen', $data);

          }



          public function del_dokumen($id){

               $this->db->where('nip', $id);

               $this->db->delete('tbl_dokumen');

          }



          public function getdetil_dokumen($id){

              $query=$this->db->get_where('tbl_dokumen', ['nip'=>$id]);

              return $query->row_Array();

          }



          public function getdetil_dokumen_u($id){

               $query=$this->db->get_where('v_dokumen', ['nip'=>$id]);

               return $query->row_Array();

           }



           public function getdetil_dokumen_p($id){

               $query=$this->db->get_where('v_pinjam', ['nip'=>$id]);

               return $query->row_Array();

           }

 



          public function edit_dokumen(){

               $data = [

                   //"id_dokumen" =>$this->input->post('id_dokumen',true),

                   "nip" =>$this->input->post('nip',true),

                   "rak" =>$this->input->post('d_cname',true),

                   "box" =>$this->input->post('d_fname',true),

                   "definitif" =>$this->input->post('d_map',true),

                   "penyimpanan" =>$this->input->post('d_kode_map',true),

                   "penyimpanan_pensiun" =>$this->input->post('simpan_pensiun',true),

                   "tanggal_simpan" =>$this->input->post('tgl',true),

                  //BATAS DOKUMEN

                   "surat_lamaran" =>$this->input->post('surat_lamaran',true),

                   "cv" =>$this->input->post('cv',true),

                   "sk_cpns" =>$this->input->post('sk_cpns',true),

                   "sttpl" =>$this->input->post('sttpl',true),

                   "sk_pns" =>$this->input->post('sk_pns',true),

                   "kapeg" =>$this->input->post('kapeg',true),

                   "taspen" =>$this->input->post('taspen',true),

                   "sumpah_pegawai" =>$this->input->post('sumpah_pegawai',true),

                   "ijasah" =>$this->input->post('ijasah',true),

                   "surat_kenaikan_gaji" =>$this->input->post('surat_kenaikan_gaji',true),

                   "sk_kenaikan_pangkat" =>$this->input->post('sk_kenaikan_pangkat',true),

                   "sk_jabatan" =>$this->input->post('sk_jabatan',true),

                   "sumpah_jabatan" =>$this->input->post('sumpah_jabatan',true),

                   "sk_penempatan" =>$this->input->post('sk_penempatan',true),

                   "data_keluarga" =>$this->input->post('data_keluarga',true),

                   "karsu" =>$this->input->post('karsu',true),

                   "akses_bpjs" =>$this->input->post('akses_bpjs',true),

                   "surat_cuti" =>$this->input->post('surat_cuti',true),

                   "surat_mutasi" =>$this->input->post('surat_mutasi',true),

                   "dp_tiga" =>$this->input->post('dp_tiga',true),

                   "surat_belajar" =>$this->input->post('surat_belajar',true),

                   "penilaian_prestasi" =>$this->input->post('penilaian_prestasi',true),

                   "tanda_jasa" =>$this->input->post('tanda_jasa',true),

                   "surat_penggunaan_gelar" =>$this->input->post('surat_penggunaan_gelar',true),

                   "riwayat_diklat" =>$this->input->post('riwayat_diklat',true),

                   "surat_nikah_akta" =>$this->input->post('surat_nikah_akta',true),

                   "surat_tugas" =>$this->input->post('surat_tugas',true),

                   "ktp_kk" =>$this->input->post('ktp_kk',true),

                   "pend_profesi" =>$this->input->post('pend_profesi',true),

                   "sk_pensiun" =>$this->input->post('sk_pensiun',true)];

                   

                    $this->db->where('nip',$this->input->post('nip'));

                    $this->db->update('tbl_dokumen', $data);

          }



          public function cari_mhs(){

               $keyword=$this->input->post('search');

               $this->db->like('nama',$keyword);

               $this->db->or_like('npm',$keyword);

               $query=$this->db->get('mahasiswa');

               return $query->result_array();

          }





     }

?>