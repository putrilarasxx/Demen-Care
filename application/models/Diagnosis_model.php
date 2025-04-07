<?php
class Diagnosis_model extends CI_model
{

    public function getAllDokter()
    {
        $data = $this->db->get('dokter');
        return $data->result_array();
    }

    public function getDiagnosisUser($id)
    {
        $pasien = $this->input->get('nama_pasien');
        $dokter = $this->input->get('dokter');
        $tanggal = $this->input->get('tanggal');
        $data_diagnosis = $this->input->get('data_diagnosis');

        $data = [
            $pasien => $this->input->get('nama_pasien', true),
            $dokter => $this->input->get('dokter', true),
            $tanggal => $this->input->get('tanggal', true),
            $data_diagnosis => $this->input->get('data_diagnosis', true)
        ];

        if ($this->db->where('id_diagnosis', $id) && ($pasien == "") && ($dokter == "") && ($tanggal == "") && ($data_diagnosis == "")) {
            $this->db->order_by('tanggal', 'ASC');
            return $this->db->get('diagnosis')->result_array();
        };

        $this->db->where('id_diagnosis', $id);
        $this->db->where('nama_pasien', $pasien);
        $this->db->where('dokter', $dokter);
        $this->db->where('tanggal', $tanggal);
         $this->db->where('data_diagnosis', $data_diagnosis);

        $this->db->order_by('tanggal', 'ASC');
        return $this->db->get('diagnosis')->result_array();
    }

    public function tambahData()
    {
        $data = [
            "id_diagnosis" => $this->input->post('id_diagnosis', true),
            "nama_pasien" => $this->input->post('nama_pasien', true),
            "dokter" => $this->input->post('dokter', true),
            "tanggal" => $this->input->post('tanggal', true),
            "data_diagnosis" => $this->input->post('data_diagnosis', true)
        ];
        return $this->db->insert('diagnosis', $data);
    }

    public function hapusData($id)
    {
        $this->db->where('id_diagnosis', $id);
        return $this->db->delete('diagnosis');
    }

    public function ubahData()
    {
        $id = $this->input->post('id_diagnosis', true);
        $data = [
            "id_diagnosis" => $this->input->post('id_diagnosis', true),
            "nama_pasien" => $this->input->post('nama_pasien', true),
            "dokter" => $this->input->post('dokter', true),
            "tanggal" => $this->input->post('tanggal', true),
            "data_diagnosis" => $this->input->post('data_diagnosis', true)
        ];
        $this->db->where('id_diagnosis', $id);
        return $this->db->update('diagnosis', $data);
    }

    public function find()
    {
        $id = $this->input->get('id_diagnosis');
        $pasien = $this->input->get('nama_pasien');
        $dokter = $this->input->get('dokter');
        $tanggal = $this->input->get('tanggal');
        $data_diagnosis = $this->input->get('data_diagnosis');

        $data = [
            $id => $this->input->get('id_diagnosis', true),
            $pasien => $this->input->get('nama_pasien', true),
            $dokter => $this->input->get('dokter', true),
            $tanggal => $this->input->get('tanggal', true),
            $data_diagnosis => $this->input->get('data_diagnosis', true)
        ];

        if (($id == "") && ($pasien == "") && ($dokter == "") && ($tanggal == "") && ($data_diagnosis == "")) {
            $this->db->order_by('tanggal', 'ASC');
            return $this->db->get('diagnosis')->result_array();
        };

        $this->db->where('id_diagnosis', $id);
        $this->db->or_where('nama_pasien', $pasien);
        $this->db->or_where('dokter', $dokter);
        $this->db->or_where('tanggal', $tanggal);
        $this->db->or_where('data_diagnosis', $data_diagnosis);

        $this->db->order_by('tanggal', 'ASC');
        return $this->db->get('diagnosis')->result_array();
    }
}
