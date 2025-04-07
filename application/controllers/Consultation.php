<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Consultation extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        // Load M_Login
        $this->load->model('M_Login');

        // Load driver ('cache', array('adapter' => 'apc', 'backup' => 'file'))
        $this->load->driver('cache', array('adapter' => 'apc', 'backup' => 'file'));

        if (!empty($this->session->userdata('is_login') == FALSE)) {
            // buat session 'failed' berisi pesan peringatan bahwa harus login terlebih dahulu
            $this->session->set_flashdata('failed', 'Anda Belum login, silahkan login terlebih dahulu');
            redirect('dashboard');
        }

        $this->load->model('App_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data['judul'] = 'Consultation';
        $data['user'] = $this->M_Login->getUserId($this->session->userdata('id_akun'));
        $this->load->view('template/header', $data);
        $this->load->view('consultation/V_consultation');
        $this->load->view('template/footer');
    }
}
