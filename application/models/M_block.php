<?php
     Class M_block extends CI_Model{

          public function show_block(){
              $query=$this->db->get('tbl_block');
              return $query->result_array();
          }

          public function get_block(){
               $query=$this->db->get('tbl_block');
               return $query->result_array();
          }

          public function add_block(){
                    $data = [
                         "block" =>$this->input->post('block',true),
                         "status"=>'aktif'];
                         $this->db->insert('tbl_block', $data);
          }

          
          public function getdetil_block($id){
              $query=$this->db->get_where('tbl_block', ['id_block'=>$id]);
              return $query->row_Array();
          }

          public function edit_block(){
               $data = [
                    "id_block" =>$this->input->post('id',true),
                    "block" =>$this->input->post('block',true),
                    "status"=>$this->input->post('status',true)];
                    $this->db->where('id_block',$this->input->post('id'));
                    $this->db->update('tbl_block', $data);
          }

     }
?>