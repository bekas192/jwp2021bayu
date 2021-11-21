<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        cek();
        $this->load->model('model_user');
    }
    public function index()
    {
        $email = $this->session->userdata['email'];
        $data['user']   = $this->model_user->get_one($email)->row_array();
        $this->load->view('layout/header', $data);
        $this->load->view('index', $data);
        $this->load->view('layout/footer');
    }

    public function get_all()
    {
        $email = $this->session->userdata['email'];
        $data['all']   = $this->model_user->get()->result();
        $data['user']   = $this->model_user->get_one($email)->row_array();
        $this->load->view('layout/header', $data);
        $this->load->view('all_data', $data);
        $this->load->view('layout/footer');
    }
}
