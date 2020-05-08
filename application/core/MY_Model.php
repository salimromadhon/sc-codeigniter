<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MY_Model extends CI_Model {

	protected $table;
	
	public function __construct()
	{
		parent::__construct();
	}
	
	public function all()
	{
		return $this->db->get($this->table)->result();
	}
	
	public function get($id)
	{
		return $this->db->get_where($this->table, array('id' => $id), 1);
	}

}