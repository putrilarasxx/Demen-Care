<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Appointment extends CI_Controller
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
        $data['judul'] = 'Appointment';
        $data['user'] = $this->M_Login->getUserId($this->session->userdata('id_akun'));
        $data['dokter'] = $this->App_model->getAllDokter();
        $data['appUser'] = $this->App_model->getAppUser($this->session->userdata('id_akun'));
        $data['find'] = $this->App_model->find();
        $role = $this->M_Login->getUserRole($this->session->userdata('id_akun'));
        if ($role['role'] == "dokter") {
            $this->load->view('template/header', $data);
            $this->load->view('app/V_appointment');
            $this->load->view('template/footer');
        } else {
            $this->load->view('template/header', $data);
            $this->load->view('app/V_appointmentP');
            $this->load->view('template/footer');
        }
    }

    public function tambah()
    {
        $this->form_validation->set_rules('id_akun', 'id_akun', 'required');
        $this->form_validation->set_rules('nama_pasien', 'nama_pasien', 'required');
        $this->form_validation->set_rules('dokter', 'dokter', 'required');
        $this->form_validation->set_rules('tanggal', 'tanggal', 'required');

        if ($this->form_validation->run() == TRUE) {
            $cek = $this->App_model->tambahData();
            if ($cek) $this->session->set_flashdata('success', 'Data Berhasil Ditambahkan');
            else $this->session->set_flashdata('failed', 'Gagal Menambahkan Data');
            redirect('Appointment');
        }
        redirect('Appointment');
    }

    public function hapus($id)
    {
        $cek = $this->App_model->hapusData($id);
        if ($cek) $this->session->set_flashdata('success', 'Data Berhasil Dihapus');
        else $this->session->set_flashdata('failed', 'Gagal Menghapus Data');
        redirect('Appointment');
    }

    public function ubah()
    {
        $this->form_validation->set_rules('id_app', 'id_app', 'required');
        $this->form_validation->set_rules('nama_pasien', 'nama_pasien', 'required');
        $this->form_validation->set_rules('dokter', 'dokter', 'required');
        $this->form_validation->set_rules('tanggal', 'tanggal', 'required');

        if ($this->form_validation->run() == TRUE) {
            $cek = $this->App_model->ubahData();
            if ($cek) $this->session->set_flashdata('success', 'Data Berhasil Diubah');
            else $this->session->set_flashdata('failed', 'Gagal Mengubah Data');
            redirect('Appointment');
        }
        redirect('Appointment');
    }
}
