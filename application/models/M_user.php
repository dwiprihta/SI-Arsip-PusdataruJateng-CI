<?php
     Class M_user extends CI_Model{

          public function show_user(){
              $query=$this->db->get('v_login');
              return $query->result_array();
          }

          public function get_pegawai(){
               $query=$this->db->get_where('tbl_pegawai', ['status'=>'aktif']);
               return $query->result_array();
          }


          public function add_user(){
                    $data = [
                         "nip" =>$this->input->post('nip',true),
                         "password" =>password_hash($this->input->post('pass1',true),PASSWORD_DEFAULT),
                         "status_akun"=>'aktif',
                         "id_role"=>'1'];
                         $this->db->insert('tbl_user', $data);
          }

          public function del_user($id){
               $this->db->where('nip', $id);
               $this->db->delete('tbl_user');
          }

          function get_where_profil($table = null, $where = null)
	{
		$this->db->from($table);
          $this->db->where($where);
		return $this->db->get();
	}

          public function getdetil_user($id){
               $query=$this->db->get_where('tbl_user', ['nip'=>$id]);
               return $query->row_Array();
           }

          public function edit_user(){
               $data = [
                    "nip" =>$this->input->post('nip',true),
                    "password" =>password_hash($this->input->post('pass1',true),PASSWORD_DEFAULT),
                    "status_akun"=>'aktif',
                    "id_role"=>'1'];
                    $this->db->where('nip',$this->input->post('nip'));
                    $this->db->update('tbl_user', $data);
          }

     }
?>