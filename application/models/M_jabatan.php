<?php
     Class M_jabatan extends CI_Model{

          public function show_jabatan(){
              $query=$this->db->get('tbl_jabatan');
              return $query->result_array();
          }

          public function get_jabatan(){
               $query=$this->db->get('tbl_jabatan');
               return $query->result_array();
          }

          public function add_jabatan(){
                    $data = [
                         "jabatan" =>$this->input->post('jabatan',true),
                         "status"=>'aktif'];
                         $this->db->insert('tbl_jabatan', $data);
          }

          
          public function getdetil_jabatan($id){
              $query=$this->db->get_where('tbl_jabatan', ['id_jabatan'=>$id]);
              return $query->row_Array();
          }

          public function edit_jabatan(){
               $data = [
                    "id_jabatan" =>$this->input->post('id',true),
                    "jabatan" =>$this->input->post('jabatan',true),
                    "status"=>$this->input->post('status',true)];
                    $this->db->where('id_jabatan',$this->input->post('id'));
                    $this->db->update('tbl_jabatan', $data);
          }

     }
?>