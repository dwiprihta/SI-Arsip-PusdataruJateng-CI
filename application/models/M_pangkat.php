<?php
     Class M_pangkat extends CI_Model{

          public function show_pangkat(){
              $query=$this->db->get('tbl_pangkat');
              return $query->result_array();
          }

          public function get_pangkat(){
               $query=$this->db->get('tbl_pangkat');
               return $query->result_array();
          }

          public function add_pangkat(){
                    $data = [
                         "pangkat" =>$this->input->post('pangkat',true),
                         "status"=>'aktif'];
                         $this->db->insert('tbl_pangkat', $data);
          }

          public function getdetil_pangkat($id){
              $query=$this->db->get_where('tbl_pangkat', ['id_pangkat'=>$id]);
              return $query->row_Array();
          }

          public function edit_pangkat(){
               $data = [
                    "id_pangkat" =>$this->input->post('id',true),
                    "pangkat" =>$this->input->post('pangkat',true),
                    "status"=>$this->input->post('status',true)];
                    $this->db->where('id_pangkat',$this->input->post('id'));
                    $this->db->update('tbl_pangkat', $data);
          }

     }
?>