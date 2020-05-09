<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mahasiswa_model extends MY_Model {

	protected $table = 'mahasiswa';

	public function get_all_jurusan()
	{
		return array(
			'Komputer',
			'Akuntansi',
			'Geografi',
			'Fisika',
			'Kimia',
		);
	}

}