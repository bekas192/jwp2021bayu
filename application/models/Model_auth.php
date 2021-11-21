<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Model_auth extends CI_Model
{


    public function insert($data)
    {
        $this->db->insert('user', $data);
    }

    function auth($email, $pass)
    {
        $cek = $this->db->get_where('user', array('email' => $email, 'password' => sha1($pass)));
        if ($cek->num_rows() > 0) {
            return $cek->row();
        } else {
            return false;
        }
    }

    function get_mail($email)
    {
        $cek = $this->db->get_where('user', array('email' => $email));
        if ($cek->num_rows() > 0) {
            return $cek->row();
        } else {
            return false;
        }
    }

    function get_time($email)
    {
        return  $this->db->where('email', $email)
            ->order_by('id_token', 'DESC')
            ->get('token');
    }
}
