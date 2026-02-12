<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class LoginUser extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->library('session');
        $this->load->helper('url');
    }

    // Login Page
    public function index()
    {
        $this->load->view('login');
    }

    // Login Check
    public function authenticate()
    {
        $username = $this->input->post('username');
        $password = $this->input->post('password');

        $this->db->where('username', $username);
        $this->db->where('password', $password);
        $query = $this->db->get('usermaster');

        if($query->num_rows() == 1)
        {
            $user = $query->row();

            $this->session->set_userdata('user_id', $user->id);
            $this->session->set_userdata('username', $user->username);

            // Correct redirect
            redirect('LoginUser/dashboard');
            // redirect('LoginUser');

        }
        else
        {
            echo "Invalid Username or Password";
        }
    }

    // Dashboard Page
    public function dashboard()
    {
        if(!$this->session->userdata('user_id'))
        {
            redirect('LoginUser');
            // redirect('index.php/LoginUser');

        }

        $this->load->view('dashboard');
    }

    // Logout
    public function logout()
    {
        $this->session->sess_destroy();
        redirect('LoginUser');
    }
}
