<?php
class App_model extends CI_model
{

    public function getAllDokter()
    {
        $data = $this->db->get('dokter');
        return $data->result_array();
    }

    public function getAppUser($id)
    {
        $pasien = $this->input->get('nama_pasien');
        $dokter = $this->input->get('dokter');
        $tanggal = $this->input->get('tanggal');

        $data = [
            $pasien => $this->input->get('nama_pasien', true),
            $dokter => $this->input->get('dokter', true),
            $tanggal => $this->input->get('tanggal', true),
        ];

        if ($this->db->where('id_akun', $id) && ($pasien == "") && ($dokter == "") && ($tanggal == "")) {
            $this->db->order_by('tanggal', 'ASC');
            return $this->db->get('app')->result_array();
        };

        $this->db->where('id_akun', $id);
        $this->db->where('nama_pasien', $pasien);
        $this->db->where('dokter', $dokter);
        $this->db->where('tanggal', $tanggal);

        $this->db->order_by('tanggal', 'ASC');
        return $this->db->get('app')->result_array();
    }

    public function tambahData()
    {
        $data = [
            "id_akun" => $this->input->post('id_akun', true),
            "nama_pasien" => $this->input->post('nama_pasien', true),
            "dokter" => $this->input->post('dokter', true),
            "tanggal" => $this->input->post('tanggal', true)
        ];
        return $this->db->insert('app', $data);
    }

    public function hapusData($id)
    {
        $this->db->where('id_app', $id);
        return $this->db->delete('app');
    }

    public function ubahData()
    {
        $id = $this->input->post('id_app', true);
        $data = [
            "id_app" => $this->input->post('id_app', true),
            "nama_pasien" => $this->input->post('nama_pasien', true),
            "dokter" => $this->input->post('dokter', true),
            "tanggal" => $this->input->post('tanggal', true),
        ];
        $this->db->where('id_app', $id);
        return $this->db->update('app', $data);
    }

    public function find()
    {
        $id = $this->input->get('id_app');
        $pasien = $this->input->get('nama_pasien');
        $dokter = $this->input->get('dokter');
        $tanggal = $this->input->get('tanggal');

        $data = [
            $id => $this->input->get('id_app', true),
            $pasien => $this->input->get('nama_pasien', true),
            $dokter => $this->input->get('dokter', true),
            $tanggal => $this->input->get('tanggal', true),
        ];

        if (($id == "") && ($pasien == "") && ($dokter == "") && ($tanggal == "")) {
            $this->db->order_by('tanggal', 'ASC');
            return $this->db->get('app')->result_array();
        };

        $this->db->where('id_app', $id);
        $this->db->or_where('nama_pasien', $pasien);
        $this->db->or_where('dokter', $dokter);
        $this->db->or_where('tanggal', $tanggal);

        $this->db->order_by('tanggal', 'ASC');
        return $this->db->get('app')->result_array();
    }
}
