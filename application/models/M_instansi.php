<?php
     Class M_instansi extends CI_Model{

          public function show_instansi(){
              $query=$this->db->get('tbl_instansi');
              return $query->result_array();
          }

          public function get_instansi(){
               $query=$this->db->get('tbl_instansi');
               return $query->result_array();
          }

          public function add_instansi(){
                    $data = [
                         "instansi" =>$this->input->post('instansi',true),
                         "inisial" =>$this->input->post('inisial',true),
                         "status"=>'aktif'];
                         $this->db->insert('tbl_instansi', $data);
          }

          
          public function getdetil_instansi($id){
              $query=$this->db->get_where('tbl_instansi', ['id_instansi'=>$id]);
              return $query->row_Array();
          }

          public function edit_instansi(){
               $data = [
                    "id_instansi" =>$this->input->post('id',true),
                    "instansi" =>$this->input->post('instansi',true),
                    "inisial" =>$this->input->post('inisial',true),
                    "status"=>$this->input->post('status',true)];
                    $this->db->where('id_instansi',$this->input->post('id'));
                    $this->db->update('tbl_instansi', $data);
          }

     }
?>