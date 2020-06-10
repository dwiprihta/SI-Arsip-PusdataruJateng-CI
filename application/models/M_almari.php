<?php
     Class M_almari extends CI_Model{

          public function show_almari(){
              $query=$this->db->get('tbl_almari');
              return $query->result_array();
          }

          public function get_almari(){
               $query=$this->db->get('tbl_almari');
               return $query->result_array();
          }

          public function add_almari(){
                    $data = [
                         "almari" =>$this->input->post('almari',true),
                         "status"=>'aktif'];
                         $this->db->insert('tbl_almari', $data);
          }

          
          public function getdetil_almari($id){
              $query=$this->db->get_where('tbl_almari', ['id_almari'=>$id]);
              return $query->row_Array();
          }

          public function edit_almari(){
               $data = [
                    "id_almari" =>$this->input->post('id',true),
                    "almari" =>$this->input->post('almari',true),
                    "status"=>$this->input->post('status',true)];
                    $this->db->where('id_almari',$this->input->post('id'));
                    $this->db->update('tbl_almari', $data);
          }

     }
?>