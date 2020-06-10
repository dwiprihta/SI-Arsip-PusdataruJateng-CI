<?php
     Class M_report extends CI_Model{

          public function show_report(){
              $query=$this->db->get('v_dokumen');
              return $query->result_array();
          }

           //======================SORTIR LAPORAN==========================//
          function get_label_keyword($keyword){
               $this->db->select('*');
               $this->db->from('v_dokumen');
               $this->db->like('nama',$keyword);
               $this->db->or_like('nip',$keyword);
               $this->db->or_like('instansi',$keyword);
               return $this->db->get()->result_array();
          }

          function get_pegawai($keyword){
               $this->db->select('*');
               $this->db->from('tbl_pegawai');
               $this->db->like('nama',$keyword);
               $this->db->or_like('nip',$keyword);
               $this->db->or_like('instansi',$keyword);
               $this->db->or_like('status',$keyword);
               return $this->db->get()->result_array();
          }

          function get_dokumen($keyword){
               $this->db->select('*');
               $this->db->from('v_dokumen');
               $this->db->like('nama',$keyword);
               $this->db->or_like('nip',$keyword);
               $this->db->or_like('instansi',$keyword);
               $this->db->or_like('status',$keyword);
               return $this->db->get()->result_array();
          }
     }
?>