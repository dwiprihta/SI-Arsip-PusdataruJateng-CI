<?php
     Class M_golongan extends CI_Model{

          public function show_golongan(){
              $query=$this->db->get('tbl_golongan');
              return $query->result_array();
          }

          public function get_golongan(){
               $query=$this->db->get('tbl_golongan');
               return $query->result_array();
          }

          public function add_golongan(){
                    $data = [
                         "golongan" =>$this->input->post('golongan',true),
                         "status"=>'aktif'];
                         $this->db->insert('tbl_golongan', $data);
          }

          public function getdetil_golongan($id){
              $query=$this->db->get_where('tbl_golongan', ['id_golongan'=>$id]);
              return $query->row_Array();
          }

          public function edit_golongan(){
               $data = [
                    "id_golongan" =>$this->input->post('id',true),
                    "golongan" =>$this->input->post('golongan',true),
                    "status"=>$this->input->post('status',true)];
                    $this->db->where('id_golongan',$this->input->post('id'));
                    $this->db->update('tbl_golongan', $data);
          }

     }
?>