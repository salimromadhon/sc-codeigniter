<?php
defined('BASEPATH') OR exit('No direct script access allowed');

if ( ! function_exists('alert'))
{
    function alert($name, $message = NULL, $type = 'info')
    {
        if ($message && $type) {
            get_instance()->session->set_flashdata($name, array($message, $type));
        } else {
            $data = get_instance()->session->flashdata($name);
            
            if (is_array($data) && ! (empty($data[0]) OR empty($data[1]))) {
                return '<div class="alert alert-' . $data[1] . '">' . $data[0] . '</div>';
            }
        }
    }   
}

if ( ! function_exists('pagination'))
{
    function pagination($config)
    {
        get_instance()->load->library('pagination');

		$default = array(
			'base_url' => base_url(),
			'total_rows' => 0,
            'num_links' => 2,
            'reuse_query_string' => TRUE,

			'full_tag_open' => '<nav><ul class="pagination">',
			'full_tag_close' => '</ul></nav>',

			'first_link' => 'Awal',
			'first_tag_open' => '<li class="page-item">',
			'first_tag_close' => '</li>',

			'last_link' => 'Akhir',
			'last_tag_open' => '<li class="page-item">',
			'last_tag_close' => '</li>',

			'next_link' => '&rarr;',
			'next_tag_open' => '<li class="page-item">',
			'next_tag_close' => '</li>',

			'prev_link' => '&larr;',
			'prev_tag_open' => '<li class="page-item">',
			'prev_tag_close' => '</li>',

			'num_tag_open' => '<li class="page-item">',
			'num_tag_close' => '</li>',

			'cur_tag_open' => '<li class="page-item active"><a class="page-link" href="#">',
			'cur_tag_close' => '</a></li>',

            'attributes' => array('class' => 'page-link'),
		);

		get_instance()->pagination->initialize(array_merge($default, $config));
		
		return get_instance()->pagination->create_links();
    }   
}
