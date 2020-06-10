<?php
     Class M_rak extends CI_Model{

          public function show_rak(){
              $query=$this->db->get('tbl_rak');
              return $query->result_array();
          }

          public function get_rak(){
               $query=$this->db->get('tbl_rak');
               return $query->result_array();
          }

          public function add_rak(){
                    $data = [
                         "rak" =>$this->input->post('rak',true),
                         "status"=>'aktif'];
                         $this->db->insert('tbl_rak', $data);
          }

          
          public function getdetil_rak($id){
              $query=$this->db->get_where('tbl_rak', ['id_rak'=>$id]);
              return $query->row_Array();
          }

          public function edit_rak(){
               $data = [
                    "id_rak" =>$this->input->post('id',true),
                    "rak" =>$this->input->post('rak',true),
                    "status"=>$this->input->post('status',true)];
                    $this->db->where('id_rak',$this->input->post('id'));
                    $this->db->update('tbl_rak', $data);
          }

     }
?>