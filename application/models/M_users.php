<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_users extends CI_Model {

	var $tabel = "v_user";

	function validasi_login($username, $password)
	{
		return $this->db
			->select('*')
			->where('nip', $username)
			->where('password', md5($password))
			->limit(1)
			->get('v_login');
	}


	public function user_login($username, $password)
	{
		$this->db->select('*');
		$this->db->from($this->tabel);
		$this->db->where(['username'=>$username,'password'=>$password]);
		$query = $this->db->get();
		if ($query->num_rows() > 0) 
		{
			foreach ($query->result() as $row) 
			{
				if ($row->level == 'admin') 
				{	
					$ambil_data_kasir = $this->db->get_where('tb_kasir',['nama_kasir'=>$username]);
					foreach ($ambil_data_kasir->result() as $data) {
						$session = array('username' => $username,
										'id_user'=>$data->id_user,
										 'id_role'=>'1',
										 'foto'=>$data->foto );
						$this->session->set_userdata($session);
					}
					echo "<script>alert('Selamat Datang $username Anda berhasil login');</script>";
					redirect('admin','refresh');
				}
				elseif ($row->level == 'user') 
				{	
					$ambil_data_kasir = $this->db->get_where('tb_kasir',['nama_kasir'=>$username]);
					foreach ($ambil_data_kasir->result() as $data) {
						$session = array('username' => $username,
										'id_user'=>$data->id_user,
										 'id_role'=>'1',
										 'foto'=>$data->foto );
						$this->session->set_userdata($session);
					}
					echo "<script>alert('Selamat Datang $username Anda berhasil login');</script>";
					redirect('transaksi','refresh');	
				} 
					
			}	
		} 
		else 
		{
			$this->session->set_flashdata('login_response', 'Login Gagal!! Username Dan Password Tidak Valid!!');
			redirect('login');
		}
		
	}	

}

