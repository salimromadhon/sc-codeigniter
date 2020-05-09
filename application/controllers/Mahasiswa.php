<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mahasiswa extends MY_Controller
{
	
	public function __construct()
    {
		parent::__construct();
		
		$this->load->model('Mahasiswa_model', 'Mahasiswa');
		$this->load->library('form_validation');
	}

    public function index()
	{
		$data['title'] = 'Daftar Mahasiswa';
		$data['mahasiswa'] = $this->Mahasiswa->all();
		
		return $this->load->view('mahasiswa/index', $data);
	}

	public function create()
	{
		$this->store();
		
		return $this->load->view('mahasiswa/create');
	}

	public function edit($id)
	{
		$data['mahasiswa'] = $this->get_or_fail($this->Mahasiswa->get($id));
		$this->store();
		
		return $this->load->view('mahasiswa/edit', $data);
	}
	
	public function delete($id)
	{
		$this->Mahasiswa->delete($id);
		
		return redirect('mahasiswa');
	}
	
	protected function store()
	{	
		if ($this->form_validation->run('mahasiswa/store') === FALSE) {
			return;
		}
		
		$data = array(
			'nama' => $this->input->post('nama', true),
			'nim' => $this->input->post('nim', true),
			'email' => $this->input->post('email', true),
			'jurusan' => $this->input->post('jurusan', true),
		);
		
		if ($id = $this->input->post('id', true)) {
			$this->Mahasiswa->update($id, $data);
			$this->session->flashdata('alert', 'Sukses memperbarui data.');
		} else {
			$this->Mahasiswa->insert($data);
			$this->session->flashdata('alert', 'Sukses menyimpan data.');
		}
		
		return redirect('mahasiswa');
	}

}