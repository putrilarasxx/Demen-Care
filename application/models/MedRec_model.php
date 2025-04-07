<?php
class MedRec_model extends CI_model
{

    public function getAllDokter()
    {
        $data = $this->db->get('dokter');
        return $data->result_array();
    }

    public function getMedRecUser($id)
    {
        $pasien = $this->input->get('nama_pasien');
        $dokter = $this->input->get('dokter');
        $tanggal = $this->input->get('tanggal');
        $data_medrec = $this->input->get('data_medrec');

        $data = [
            $pasien => $this->input->get('nama_pasien', true),
            $dokter => $this->input->get('dokter', true),
            $tanggal => $this->input->get('tanggal', true),
            $data_medrec => $this->input->get('data_medrec', true)
        ];

        if ($this->db->where('id_medrec', $id) && ($pasien == "") && ($dokter == "") && ($tanggal == "") && ($data_medrec == "")) {
            $this->db->order_by('tanggal', 'ASC');
            return $this->db->get('medrec')->result_array();
        };

        $this->db->where('id_medrec', $id);
        $this->db->where('nama_pasien', $pasien);
        $this->db->where('dokter', $dokter);
        $this->db->where('tanggal', $tanggal);
         $this->db->where('data_medrec', $data_medrec);

        $this->db->order_by('tanggal', 'ASC');
        return $this->db->get('medrec')->result_array();
    }

    public function tambahData()
    {
        $data = [
            "id_medrec" => $this->input->post('id_medrec', true),
            "nama_pasien" => $this->input->post('nama_pasien', true),
            "dokter" => $this->input->post('dokter', true),
            "tanggal" => $this->input->post('tanggal', true),
            "data_medrec" => $this->input->post('data_medrec', true)
        ];
        return $this->db->insert('medrec', $data);
    }

    public function hapusData($id)
    {
        $this->db->where('id_medrec', $id);
        return $this->db->delete('medrec');
    }

    public function ubahData()
    {
        $id = $this->input->post('id_medrec', true);
        $data = [
            "id_medrec" => $this->input->post('id_medrec', true),
            "nama_pasien" => $this->input->post('nama_pasien', true),
            "dokter" => $this->input->post('dokter', true),
            "tanggal" => $this->input->post('tanggal', true),
            "data_medrec" => $this->input->post('data_medrec', true)
        ];
        $this->db->where('id_medrec', $id);
        return $this->db->update('medrec', $data);
    }

    public function find()
    {
        $id = $this->input->get('id_medrec');
        $pasien = $this->input->get('nama_pasien');
        $dokter = $this->input->get('dokter');
        $tanggal = $this->input->get('tanggal');
        $data_medrec = $this->input->get('data_medrec');

        $data = [
            $id => $this->input->get('id_medrec', true),
            $pasien => $this->input->get('nama_pasien', true),
            $dokter => $this->input->get('dokter', true),
            $tanggal => $this->input->get('tanggal', true),
            $data_medrec => $this->input->get('data_medrec', true)
        ];

        if (($id == "") && ($pasien == "") && ($dokter == "") && ($tanggal == "") && ($data_medrec == "")) {
            $this->db->order_by('tanggal', 'ASC');
            return $this->db->get('medrec')->result_array();
        };

        $this->db->where('id_medrec', $id);
        $this->db->or_where('nama_pasien', $pasien);
        $this->db->or_where('dokter', $dokter);
        $this->db->or_where('tanggal', $tanggal);
        $this->db->or_where('data_medrec', $data_medrec);

        $this->db->order_by('tanggal', 'ASC');
        return $this->db->get('medrec')->result_array();
    }
}
