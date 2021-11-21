<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Model_auth');
        $this->load->library('form_validation');
    }

    public function index()
    {
        if (isset($_POST['submit'])) {
            $email      = $this->input->post('email');
            $password   = $this->input->post('password');
            $cek = $this->Model_auth->auth($email, $password);
            if ($cek == True) {
                $this->session->set_userdata(array(
                    'status' => 'oke',
                    'email'   => $email,
                ));
                redirect('user');
            } else {
                $this->session->set_flashdata('message', '
                <div class="alert alert-dismissible alert-danger">Wrong password!</div>');

                redirect('auth');
            }
        } else {
            $this->load->view('layout_auth/login_header');
            $this->load->view('login');
            $this->load->view('layout_auth/login_footer');
        }
    }

    function send_mail($token)
    {
        $config = [
            'protocol'      => 'smtp',
            'smtp_host'     => 'ssl://smtp.googlemail.com',
            'smtp_user'     => 'jwp2021bayu@gmail.com',
            'smtp_pass'     => 'Bayu1234',
            'smtp_port'     => 465,
            'mailtype'      => 'html',
            'charset'       => 'utf-8',
            'newline'       => "\r\n",
        ];
        $this->load->library('email', $config);

        $this->email->from('jwp2021bayu@gmail.com', 'JWP_2021_BAYU EKA SAPUTRA');
        $this->email->to($this->input->post('email'));
        $this->email->subject('Reset password');
        $this->email->message('Click this link for reset your password : <a href="' . base_url() . 'auth/reset_password?email=' . $this->input->post('email') . '&token=' . urlencode($token) . '">Reset Password</a>');

        if ($this->email->send()) {
            return true;
        } else {
            echo $this->email->print_debugger();
            die;
        }
    }

    public function register()
    {
        if (isset($_POST['submit'])) {
            $config['upload_path']          = './uploads/';
            $config['allowed_types']        = 'gif|jpg|png|jpeg';
            $config['max_size']             = 1200;
            $config['max_width']            = 6000;
            $config['max_height']           = 6000;
            $config['overwrite'] = TRUE;
            $config['remove_spaces'] = TRUE;
            $config['encrypt_name'] = TRUE;
            $this->upload->initialize($config);
            if ($_FILES["image"]["size"] > 1200199) {
                $this->session->set_flashdata('message', 'photo size is too big max 1mb');
                redirect('auth/register');
            }
            $email          = $this->input->post('email');
            $get_mail       = $this->Model_auth->get_mail($email);
            if ($get_mail == True) {
                $this->session->set_flashdata('message', 'Email has been used!');
                redirect('auth/register');
            }
            $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email');
            $this->form_validation->set_rules('password', 'password', 'required|trim|min_length[6]|matches[password2]');
            $this->form_validation->set_rules('password2', 're password', 'required|trim|min_length[6]|matches[password]');
            if ($this->form_validation->run() == false) {
                $this->load->view('layout_auth/login_header');
                $this->load->view('register');
                $this->load->view('layout_auth/login_footer');
            } else {

                if ($this->upload->do_upload('image')) {
                    $data = array('upload_data' => $this->upload->data());
                    $name           = $this->input->post('name', true);
                    $email          = $this->input->post('email', true);
                    $password       = $this->input->post('password', true);

                    $foto = $this->upload->data('file_name');

                    $data = array(
                        'name' => $name,
                        'email' => $email,
                        'password' => SHA1($password),
                        'picture' => $foto,

                    );
                    $this->Model_auth->insert($data);
                    redirect('auth');
                } else {
                    $this->session->set_flashdata('message', 'Photo is required');
                    redirect('auth/register');
                }
            }
        } else {
            $this->load->view('layout_auth/login_header');
            $this->load->view('register');
            $this->load->view('layout_auth/login_footer');
        }
    }

    function forgot_password()
    {
        if (isset($_POST['submit'])) {
            $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email');
            if ($this->form_validation->run() == false) {
                // $this->session->set_flashdata('message', '');
                $this->load->view('layout_auth/login_header');
                $this->load->view('forgot_password');
                $this->load->view('layout_auth/login_footer');
            } else {
                $email      = $this->input->post('email');
                $cek   = $this->Model_auth->get_mail($email);
                if ($cek == True) {

                    $token = base64_encode(random_bytes(32));
                    $user_token = [
                        'email'     => $email,
                        'token'     => $token
                    ];
                    $get_data = $this->db->get_where('token', ['email' => $email])->row_array();
                    if ($get_data) {
                        $this->db->where('email', $email)->delete('token');
                    }
                    $this->db->insert('token', $user_token);
                    $this->send_mail($token);
                    $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> Please check your email for reset your password or click this link for testing <a href="' . base_url() . 'auth/reset_password?email=' . $this->input->post('email') . '&token=' . urlencode($token) . '">Reset Password</a> .Token will be exp in 2 hour');
                    $this->load->view('layout_auth/login_header');
                    $this->load->view('forgot_password');
                    $this->load->view('layout_auth/login_footer');
                } else {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">  Email doesnt registered </div>');
                    $this->load->view('layout_auth/login_header');
                    $this->load->view('forgot_password');
                    $this->load->view('layout_auth/login_footer');
                }
            }
        } else {
            $this->load->view('layout_auth/login_header');
            $this->load->view('forgot_password');
            $this->load->view('layout_auth/login_footer');
        }
    }

    function reset_password()
    {
        $email =  $this->input->get('email');
        $token = $this->input->get('token');

        $cek   = $this->Model_auth->get_mail($email);

        if ($cek == True) {
            $get_token = $this->db->get_where('token', ['token' => $token])->row_array();
            if ($get_token) {
                $time   = $this->Model_auth->get_time($email)->row_array();
                $prevtime =  strtotime($time['createdate']);
                $realtime = strtotime(date('Y-m-d h:i'));
                $diff   = $realtime - $prevtime;
                $exp = $diff % 60;
                if ($exp >= 7200) {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert"> Token' . $exp . 'l' . $token . ' Expired!  </div>');
                    redirect('auth');
                } else {
                    $this->session->set_userdata('reset_password', $email);
                    $this->change_password();
                }
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert"> Reset password faild , Wrong token!  </div>');
                redirect('auth');
            }
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert"> Reset password faild , cannot be found email! </div>');
            redirect('auth');
        }
    }

    function change_password()
    {
        if (isset($_POST['submit'])) {
            $this->form_validation->set_rules('password', 'password', 'required|trim|min_length[6]|matches[password2]');
            $this->form_validation->set_rules('password2', 're password', 'required|trim|min_length[6]|matches[password]');

            if ($this->form_validation->run() == false) {
                $this->load->view('layout_auth/login_header');
                $this->load->view('change_password');
                $this->load->view('layout_auth/login_footer');
            } else {
                $this->db->set('password', sha1($this->input->post('password')))
                    ->where('email', $this->input->post('email'))
                    ->update('user');
                $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> Reset password sucess! </div>');
                redirect('auth');
            }
        } else {
            $this->load->view('layout_auth/login_header');
            $this->load->view('change_password');
            $this->load->view('layout_auth/login_footer');
        }
    }


    function logout()
    {
        $this->session->sess_destroy();
        redirect('auth');
    }
}
