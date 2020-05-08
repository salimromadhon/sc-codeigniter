<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Migrate extends MY_Controller
{

    public function index($version = '')
    {
		$this->load->library('migration');

        if ($version && $this->migration->version($version) === FALSE || $this->migration->latest() === FALSE)
        {
			show_error($this->migration->error_string());
		}
	}

}