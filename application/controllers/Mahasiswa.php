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
		$data['keyword'] = $this->input->post('keyword');
		$data['mahasiswa'] = $this->Mahasiswa->search($data['keyword'], array(
			'nama',
			'jurusan',
		));
		
		return $this->load->view('mahasiswa/index', $data);
	}

	public function show($id)
	{
		$data['title'] = 'Detail Mahasiswa';
		$data['mahasiswa'] = $this->get_or_fail($this->Mahasiswa->get($id));
		
		return $this->load->view('mahasiswa/show', $data);
	}

	public function create()
	{
		$data['title'] = 'Tambah Mahasiswa';
		$data['jurusan'] = $this->Mahasiswa->get_all_jurusan();
		$this->store();
		
		return $this->load->view('mahasiswa/create', $data);
	}

	public function edit($id)
	{
		$data['title'] = 'Sunting Mahasiswa';
		$data['mahasiswa'] = $this->get_or_fail($this->Mahasiswa->get($id));
		$data['jurusan'] = $this->Mahasiswa->get_all_jurusan();
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
			alert('mahasiswa', 'Sukses memperbarui data.', 'success');
		} else {
			$this->Mahasiswa->insert($data);
			alert('mahasiswa', 'Sukses menyimpan data.', 'success');
		}
		
		return redirect('mahasiswa');
	}

}