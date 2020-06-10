<?php
     Class M_admin extends CI_Model{

          function tampil_aktif(){
               $query = $this->db->get_where('tbl_pegawai', ['status'=>'aktif']);
                    if($query->num_rows()>0)
                    {
                         return $query->num_rows();
                    }
                    else
                    {
                         return 0;
                    }
               }

          function tampil_pensiun(){
               $query = $this->db->get_where('tbl_pegawai', ['status'=>'pensiun']);
                    if($query->num_rows()>0)
                    {
                         return $query->num_rows();
                    }
                    else
                    {
                         return 0;
                    }
               }

          function tampil_arsip(){
               $query = $this->db->get('tbl_dokumen');
                    if($query->num_rows()>0)
                    {
                         return $query->num_rows();
                    }
                    else
                    {
                         return 0;
                    }
               }

               function tampil_pinjam(){
                    $query = $this->db->get_where('tbl_pinjam', ['status'=>'dipinjam']);
                         if($query->num_rows()>0)
                         {
                              return $query->num_rows();
                         }
                         else
                         {
                              return 0;
                         }
                    }
               
               public function graph()
                    {
                         $data = $this->db->query("select status,COUNT(*) as 'total' from tbl_pegawai GROUP by status");
                         return $data->result();
                    }

               public function graph1()
                    {
                         $data = $this->db->query("select instansi,COUNT(*) as 'total' from tbl_pegawai GROUP by instansi");
                         return $data->result();
                    }

     }
?>