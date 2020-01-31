<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Pegawai extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		is_logged_in();
		$this->load->model('Pegawai_m');
		
	}
	

	public function index()
	{
		$data['title'] = 'Semua Pegawai';
		$data['pegawai'] = $data['allpegawai'] = true;
		$data['content'] = 'backend/pegawai';
		$this->load->view('backend/index', $data);
	}
	public function golongan()
	{
		$data['title'] = 'Golongan';
		$data['pegawai'] = $data['golongan'] = true;
		$data['content'] = 'backend/golongan';
		$this->load->view('backend/index', $data);
	}
	public function addNew()
	{
		$this->db->insert('pegawai', $this->data());
		$this->toastr->success('Created Successfully');
		redirect('pegawai');
		
	}
	public function addNewGolongan()
	{
		$this->db->insert('golongan', $this->dataGolongan());
		$this->toastr->success('Created Successfully');
		redirect('pegawai/golongan');
		
	}
	public function ubah()
	{
		$data = [
			"nip"=>$this->input->post('nip', true),
			"nama"=>$this->input->post('nama', true),
			"jk"=>$this->input->post('jk', true),
			"agama"=>$this->input->post('agama', true),
			"telp"=>$this->input->post('telp', true),
			"update_at"=>get_dateTime(),
			"update_by"=>user()['idusers']
		];
		$this->db->where('idpegawai', $this->input->post('idpegawai', true));
		$this->db->update('pegawai', $data);
	}
	public function ubahGolongan()
	{
		$data = [
			"golongan"=>$this->input->post('golongan', true),
			"gaji_pokok"=>delMask($this->input->post('gaji_pokok', true)),
			"update_at"=>get_dateTime(),
			"update_by"=>user()['idusers']
		];
		$this->db->where('idgolongan', $this->input->post('idgolongan', true));
		$this->db->update('golongan', $data);
	}
	/**
	* Data Pegawai
	* @return Array
	*/
	private function data() {
		return [
			'nip'=>$this->input->post('nip', true),
			'nama'=>$this->input->post('nama', true),
			'jk'=>$this->input->post('jk', true),
			'agama'=>$this->input->post('agama', true),
			'telp'=>$this->input->post('telp', true),
			'create_at'=>get_dateTime(),
			'create_by'=>user()['idusers']
		];
	}
	/**
	* Data Golongan
	* @return Array
	*/
	private function dataGolongan() {
		return [
			'golongan'=>$this->input->post('golongan', true),
			'gaji_pokok'=>delMask($this->input->post('gaji_pokok', true)),
			'create_at'=>get_dateTime(),
			'create_by'=>user()['idusers']
		];
	}
	/**
	* View By Id
	* @return Array
	*/
	public function view()
	{
		$id = $this->input->post('id', true);
		$data = $this->db->get_where('pegawai',['idpegawai'=>$id])->row();
		echo json_encode($data);
	}
	/**
	* View Golongan By Id
	* @return Array
	*/
	public function viewGolongan()
	{
		$id = $this->input->post('id', true);
		$data = $this->db->get_where('golongan',['idgolongan'=>$id])->row();
		echo json_encode($data);
	}
	/**
	* Delete By ID
	* @return Boolean
	*/
	public function delete()
	{
		$id = $this->input->post('id');
		for ($i=0; $i < count($id); $i++) { 
			$this->Pegawai_m->delete_permanen($id[$i]);
		}
	}
	/**
	* Delete Golongan By ID
	* @return Boolean
	*/
	public function deleteGolongan()
	{
		$id = $this->input->post('id');
		for ($i=0; $i < count($id); $i++) { 
			$this->Pegawai_m->delete_permanenGolongan($id[$i]);
		}
	}
}

/* End of file Pegawai.php */
