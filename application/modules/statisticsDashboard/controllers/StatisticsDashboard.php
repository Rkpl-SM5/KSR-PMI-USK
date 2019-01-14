<?php
defined('BASEPATH') or exit('No direct script access allowed');

class StatisticsDashboard extends CI_Controller
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
        $this->allTheTime();
    }

    public function allTheTime()
    {
        $page = $this->load->view('allTheTimeDashboard', '', true);
        $val = array();
        $navigator = array();

        array_push($navigator, "Statistics");
        array_push($val, "statisticsDashboard");


        array_push($navigator, "All The Time");
        array_push($val, "allTheTime");

        $data = array("page" => $page, "val" => $val, "nav" => $navigator);
        echo json_encode($data);
    }

    public function annual()
    {
        $page = $this->load->view('annualDashboard', '', true);
        $val = array();
        $navigator = array();

        array_push($navigator, "Statistics");
        array_push($val, "statisticsDashboard");


        array_push($navigator, "Annual");
        array_push($val, "annual");

        $data = array("page" => $page, "val" => $val, "nav" => $navigator);
        echo json_encode($data);
    }

    public function getAllTheTime()
    {
        $where = sprintf("WHERE EMAIL='%s'", $data["email"]);
        $result = $this->Model_lib->Cek("admin", $where);
    }
}


/***
 * total ~ select count(nama),LEFT(GOLONGAN_DARAH,length(GOLONGAN_DARAH)-1) as gol  from pendonor group by LEFT(GOLONGAN_DARAH,length(GOLONGAN_DARAH)-1) ORDER BY LEFT(GOLONGAN_DARAH,length(GOLONGAN_DARAH)-1); 
 * total - select count(nama),LEFT(GOLONGAN_DARAH,length(GOLONGAN_DARAH)-1) as gol  from pendonor where GOLONGAN_DARAH like '%-' group by LEFT(GOLONGAN_DARAH,length(GOLONGAN_DARAH)-1) ORDER BY LEFT(GOLONGAN_DARAH,length(GOLONGAN_DARAH)-1);
 * total + select count(nama),LEFT(GOLONGAN_DARAH,length(GOLONGAN_DARAH)-1) as gol  from pendonor where GOLONGAN_DARAH like '%+' group by LEFT(GOLONGAN_DARAH,length(GOLONGAN_DARAH)-1) ORDER BY LEFT(GOLONGAN_DARAH,length(GOLONGAN_DARAH)-1);
 *
 * 
 * 
 * year : tambah where YEAR(TANGGAL)=tahun
 *          ex = where YEAR(TANGGAL)=2019
 * 
 * /