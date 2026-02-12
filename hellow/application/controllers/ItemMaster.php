<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ItemMaster extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->library('session');
        $this->load->helper('url');

        // Login check
        if(!$this->session->userdata('user_id')){
            redirect('LoginUser');
        }
    }

    // Show all items
    public function index()
    {
        $data['items'] = $this->db->get('itemmaster')->result();
        $this->load->view('itemmaster_view', $data);
    }
}
