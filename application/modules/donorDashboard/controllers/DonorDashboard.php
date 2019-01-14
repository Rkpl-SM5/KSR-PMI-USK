<?php
defined('BASEPATH') or exit('No direct script access allowed');

class DonorDashboard extends CI_Controller
{

    /**
     * Index Page for this controller.
     *
     * Maps to the following URL
     * 		http://example.com/index.php/welcome
     *	- or -
     * 		http://example.com/index.php/welcome/index
     *	- or -
     * Since this controller is set as the default controller in
     * config/routes.php, it's displayed at http://example.com/
     *
     * So any other public methods not prefixed with an underscore will
     * map to /index.php/welcome/<method_name>
     * @see https://codeigniter.com/user_guide/general/urls.html
     */

    function __construct()
    {
        parent::__construct();
        $this->_public_view = $this->config->item('public_view');
          //$this->load->helper('url');
        $this->load->model('Model_lib');
    }

    public function index()
    {
        $page = $this->load->view('donorDashboard', '', true);
        $val = array();
        $navigator = array();

        array_push($navigator, "Donor");
        array_push($val, "donorDashboard");

        $data = array("page" => $page, "val" => $val, "nav" => $navigator);
        echo json_encode($data);
    }


    public function donor()
    {
        $table = "pendonor";

        $data["NAMA"] = $this->db->escape_str($this->input->post("nama"));
        $data["KONTAK"] = $this->db->escape_str($this->input->post("kontak"));
        $data["ALAMAT"] = $this->db->escape_str($this->input->post("alamat"));
        $data["JENIS_KELAMIN"] = $this->db->escape_str($this->input->post("jenisKelamin"));
        $data["EMAIL"] = $this->db->escape_str($this->input->post("email"));
        $data["KEGIATAN"] = $this->db->escape_str($this->input->post("kegiatan"));
        $data["TANGGAL"] = $this->db->escape_str($this->input->post("tanggal"));
        $data["GOLONGAN_DARAH"] = $this->db->escape_str($this->input->post("golonganDarah"));
        $flag = 0;
        $keys = array_keys($data);
        for ($a = 0; $a < sizeof($data); $a++) {
            $var = (string)$data[$keys[$a]] . "";
            if (!isset($var) || trim($var) === '') {
                $err = "Mohon isi bagian " . strtolower(str_replace('_', ' ', $keys[$a]));
                $klas = $data;
                $flag = 1;
                break;
            }
        }
        if ($flag == 0) {
            if (!filter_var($data['EMAIL'], FILTER_VALIDATE_EMAIL)) {
                $err = "Email yang anda masukkan tidak valid";
                $klas = "#email";
            } else {

                $result = $this->Model_lib->insert("pendonor", $data);

                if ($result) {
                    $err = "ss";
                    $klas = "Input Berhasil";
                } else {
                    $err = "ss";
                    $klas = "Input Gagal";
                }
            }
        }
        $arr = array('err' => $err, 'klas' => $klas);
        echo json_encode($arr);

    }
}