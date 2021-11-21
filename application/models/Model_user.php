<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Model_user extends CI_Model
{


    public function get()
    {
        return  $this->db->get('user');
    }
    public function get_one($email)
    {
        return  $this->db->where('email', $email)
            ->get('user');
    }
}
