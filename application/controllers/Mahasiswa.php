<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mahasiswa extends MY_Controller
{
	
	public function __construct()
    {
		parent::__construct();
		
		$this->load->model('Mahasiswa_model', 'Mahasiswa');
	}

    public function index()
	{
		$data['title'] = 'Daftar Mahasiswa';
		$data['mahasiswa'] = $this->Mahasiswa->all();
		
		return $this->load->view('mahasiswa', $data);
	}
}