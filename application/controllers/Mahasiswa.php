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

    public function index($offset = 0)
	{
		$data['title'] = 'Daftar Mahasiswa';
		$data['keyword'] = $this->input->get('keyword', TRUE);
		$data['limit'] = 5;
		$data['mahasiswa'] = $this->Mahasiswa->search($data['keyword'], array(
			'nama',
			'jurusan',
		), $data['limit'], $offset);
		
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
			'nama' => $this->input->post('nama', TRUE),
			'nim' => $this->input->post('nim', TRUE),
			'email' => $this->input->post('email', TRUE),
			'jurusan' => $this->input->post('jurusan', TRUE),
		);
		
		if ($id = $this->input->post('id', TRUE)) {
			$this->Mahasiswa->update($id, $data);
			alert('mahasiswa', 'Sukses memperbarui data.', 'success');
		} else {
			$this->Mahasiswa->insert($data);
			alert('mahasiswa', 'Sukses menyimpan data.', 'success');
		}
		
		return redirect('mahasiswa');
	}

}
