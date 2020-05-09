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