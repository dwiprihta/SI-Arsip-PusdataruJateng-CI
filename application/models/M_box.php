<?php
     Class M_box extends CI_Model{

          public function show_box(){
              $query=$this->db->get('tbl_box');
              return $query->result_array();
          }

          public function get_box(){
               $query=$this->db->get('tbl_box');
               return $query->result_array();
          }

          public function add_box(){
                    $data = [
                         "box" =>$this->input->post('box',true),
                         "status"=>'aktif'];
                         $this->db->insert('tbl_box', $data);
          }

          
          public function getdetil_box($id){
              $query=$this->db->get_where('tbl_box', ['id_box'=>$id]);
              return $query->row_Array();
          }

          public function edit_box(){
               $data = [
                    "id_box" =>$this->input->post('id',true),
                    "box" =>$this->input->post('box',true),
                    "status"=>$this->input->post('status',true)];
                    $this->db->where('id_box',$this->input->post('id'));
                    $this->db->update('tbl_box', $data);
          }

     }
?>