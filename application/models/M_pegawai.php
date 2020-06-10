<?php
     Class M_pegawai extends CI_Model{

          public function show_pegawai(){
               $query=$this->db->get_where('tbl_pegawai', ['status'=>'aktif']);
              return $query->result_array();
          }

          public function show_pegawai_p(){
               $query=$this->db->get_where('tbl_pegawai', ['status'=>'pensiun']);
              return $query->result_array();
          }

          public function get_instansi(){
               $query=$this->db->get_where('tbl_instansi', ['status'=>'aktif']);
               return $query->result_array();
          }

          public function get_jabatan(){
               $query=$this->db->get_where('tbl_jabatan', ['status'=>'aktif']);
               return $query->result_array();
          }

          public function get_pangkat(){
               $query=$this->db->get_where('tbl_pangkat', ['status'=>'aktif']);
               return $query->result_array();
          }

          public function get_golongan(){
               $query=$this->db->get_where('tbl_golongan', ['status'=>'aktif']);
               return $query->result_array();
          }

          public function view(){
               return $this->db->get('tbl_pegawai')->result(); // Tampilkan semua data yang ada di tabel siswa
          }

          public function add_pegawai(){
               $data = [
                    "nip" =>$this->input->post('npm',true),
                    "nama" =>$this->input->post('nama',true),
                    "jenis_kelamin" =>$this->input->post('jk',true),
                    "tempat_lahir" =>$this->input->post('tmp_lahir',true),
                    "tanggal_lahir" =>$this->input->post('tgl_lahir',true),
                    "instansi" =>$this->input->post('instansi',true),
                    "pangkat" =>$this->input->post('pangkat',true),
                    "jabatan" =>$this->input->post('jabatan',true),
                    "golongan" =>$this->input->post('golongan',true),
                    "status"=>$this->input->post('status',true),
                    "foto"=>'default.jpg'];
                    $this->db->insert('tbl_pegawai', $data);
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
               $this->db->insert_batch('tbl_pegawai', $data);
          }

          public function del_pegawai($id){
               $this->db->where('nip', $id);
               $this->db->delete('tbl_pegawai');
          }

          public function getdetil_pegawai($id){
              $query=$this->db->get_where('tbl_pegawai', ['nip'=>$id]);
              return $query->row_Array();
          }

          public function edit_pegawai(){
               $data = [
                    "nip" =>$this->input->post('nip',true),
                    "nama" =>$this->input->post('nama',true),
                    "jenis_kelamin" =>$this->input->post('jk',true),
                    "tempat_lahir" =>$this->input->post('tmp_lahir',true),
                    "tanggal_lahir" =>$this->input->post('tgl_lahir',true),
                    "instansi" =>$this->input->post('instansi',true),
                    "pangkat" =>$this->input->post('pangkat',true),
                    "jabatan" =>$this->input->post('jabatan',true),
                    "golongan" =>$this->input->post('golongan',true),
                    "status"=>$this->input->post('status',true),
                    "tanggal_pensiun"=>$this->input->post('tgl_pensiun',true),
                    "foto"=>'default.jpg'];
                    $this->db->where('nip',$this->input->post('nip'));
                    $this->db->update('tbl_pegawai', $data);
          }

          // //EDIT BERKAS
          // function edit_foto($where,$table){
          //      return $this->db->get_where($table,$where);
          // }

          function edit_foto(){
                  $config['upload_path']          = 'assets/img/foto_pegawai';  // folder upload 
                  $config['allowed_types']        = 'jpg|png'; // jenis file
                  $config['max_size']             = 1000;
                  $config['max_width']            = 4000;
                  $config['max_height']           = 6000;
         
                  $this->load->library('upload', $config);
         
                  if ( ! $this->upload->do_upload('foto')) //sesuai dengan name pada form 
                  {
                        $this->session->set_flashdata('notif','<div class="alert alert-danger" role="alert"> Data Gagal Diubah, Pastikan Data yang Anda Inputkan Sesuai Instruksi! <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
                        redirect('pegawai');
                  }
                  else
                  {
                      $npm=$this->input->post('nip');
                      $file = $this->upload->data();
                      $gambar = $file['file_name'];
         
                      $data = array(
                          'foto' => $gambar);
         
              $this->db->where('nip',$npm);
              $this->db->update('tbl_pegawai',$data);
            }
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