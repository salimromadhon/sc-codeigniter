<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MY_Model extends CI_Model {

	protected $table;
	
	public function __construct()
	{
		parent::__construct();
	}
	
	public function all($limit = NULL, $offset = NULL)
	{
		return $this->db->get($this->table, $limit, $offset)->result();
	}

	public function count()
	{
		return $this->db->count_all_results($this->table);
	}
	
	public function get($id)
	{
		return $this->db->get_where($this->table, array('id' => $id), 1)->row();
	}
	
	public function insert($data)
	{
		if (isset($data[0]) && is_array($data[0])) {
			return $this->db->insert_batch($this->table, $data);
		}
		
		return $this->db->insert($this->table, $data);
	}
	
	public function update($id, $data)
	{
		return $this->db->where('id', $id)->update($this->table, $data);
	}
	
	public function delete($id)
	{
		return $this->db->where('id', $id)->delete($this->table);
	}

	public function search($keyword, $fields, $limit = NULL, $offset = NULL)
	{
		$this->db->start_cache();
		foreach ($fields as $field) {
			$this->db->or_like($field, $keyword);
		}
		$this->db->stop_cache();

		$result = $this->db->limit($limit)->get($this->table, $limit, $offset)->result();
		$count = $this->db->count_all_results($this->table);
		$this->db->flush_cache();
		
		return compact('result', 'count');
	}

}
