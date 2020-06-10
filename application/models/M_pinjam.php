<?php
     Class M_pinjam extends CI_Model{

          public function show_pinjam(){
              $query=$this->db->get_where('v_pinjam', ['status'=>'dipinjam']);
              return $query->result_array();
          }

          public function show_kembali(){
               $query=$this->db->get_where('v_pinjam', ['status'=>'kembali']);
               return $query->result_array();
           }

          public function get_pegawai(){
               $query=$this->db->get_where('v_dokumen');
               return $query->result_array();
          }


          public function add_pinjam(){
                    $data = [
                         "no_pinjam"=>time(),
                         "nip" =>$this->input->post('nip',true),
                         "keperluan" =>$this->input->post('keperluan',true),
                         "status"=>"dipinjam",
                         "tanggal_pinjam"=>date('Y-m-d'),
                         "petugas"=>$this->input->post('petugas',true)];
                         $this->db->insert('tbl_pinjam', $data);
          }

          public function del_pinjam($id){
               $this->db->where('no_pinjam', $id);
               $this->db->delete('tbl_pinjam');
          }

          public function getdetil_pinjam($id){
               $query=$this->db->get_where('tbl_pinjam', ['nip'=>$id]);
               return $query->row_Array();
           }

          public function edit_pinjam(){
               $data = [
                    "no_pinjam"=>$this->input->post('no_pinjam',true),
                    "nip" =>$this->input->post('nip',true),
                    "keperluan" =>$this->input->post('keperluan',true),
                    "status"=>"kembali",
                    "tanggal_pinjam"=>$this->input->post('tanggal_pinjam',true),
                    "petugas"=>$this->input->post('petugas',true),
                    "tanggal_kembali"=>date('Y-m-d'),
                    "petugas_k"=>$this->input->post('petugas_k',true),
                    "catatan"=>$this->input->post('catatan',true)];
                    $this->db->where('no_pinjam',$this->input->post('no_pinjam'));
                    $this->db->update('tbl_pinjam', $data);
          }

     }
?>