<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$config['mahasiswa/store'] = array(
	array(
		'field' => 'nama',
		'label' => 'Nama',
		'rules' => 'required',
	),
	array(
		'field' => 'nim',
		'label' => 'NIM',
		'rules' => 'required|numeric',
	),
	array(
		'field' => 'email',
		'label' => 'Email',
		'rules' => 'required|valid_email',
	),
	array(
		'field' => 'jurusan',
		'label' => 'Jurusan',
		'rules' => 'required',
	),
);
