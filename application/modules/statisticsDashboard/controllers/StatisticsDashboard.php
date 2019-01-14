<?php
defined('BASEPATH') or exit('No direct script access allowed');

class StatisticsDashboard extends CI_Controller
{
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
        $data = array("A" => array(), "AB" => array(), "B" => array(), "O" => array());
        $dataMin = array("A" => array(), "AB" => array(), "B" => array(), "O" => array());
        $dataPlus = array("A" => array(), "AB" => array(), "B" => array(), "O" => array());


        $this->pushArrayQuery($data, "select count(nama) AS count ,LEFT(GOLONGAN_DARAH,length(GOLONGAN_DARAH)-1) as gol from pendonor group by LEFT(GOLONGAN_DARAH,length(GOLONGAN_DARAH)-1) ORDER BY LEFT(GOLONGAN_DARAH,length(GOLONGAN_DARAH)-1)");
        $this->pushArrayQuery($dataMin, "select count(nama) AS count,LEFT(GOLONGAN_DARAH,length(GOLONGAN_DARAH)-1) as gol  from pendonor where GOLONGAN_DARAH like '%-' group by LEFT(GOLONGAN_DARAH,length(GOLONGAN_DARAH)-1) ORDER BY LEFT(GOLONGAN_DARAH,length(GOLONGAN_DARAH)-1)");
        $this->pushArrayQuery($dataPlus, "select count(nama) AS count,LEFT(GOLONGAN_DARAH,length(GOLONGAN_DARAH)-1) as gol  from pendonor where GOLONGAN_DARAH like '%+' group by LEFT(GOLONGAN_DARAH,length(GOLONGAN_DARAH)-1) ORDER BY LEFT(GOLONGAN_DARAH,length(GOLONGAN_DARAH)-1)");

        $this->setToNolIsEmpty($data);
        $this->setToNolIsEmpty($dataMin);
        $this->setToNolIsEmpty($dataPlus);

        $array = array("total" => $data, "min" => $dataMin, "plus" => $dataPlus);

        echo json_encode($array);
    }

    public function getAnnualTime($tahun)
    {
        $data = array("A" => array(), "AB" => array(), "B" => array(), "O" => array());
        $dataMin = array("A" => array(), "AB" => array(), "B" => array(), "O" => array());
        $dataPlus = array("A" => array(), "AB" => array(), "B" => array(), "O" => array());

        $queryData = sprintf("select count(nama) AS count ,LEFT(GOLONGAN_DARAH,length(GOLONGAN_DARAH)-1) as gol from pendonor where YEAR(TANGGAL)='%s' group by LEFT(GOLONGAN_DARAH,length(GOLONGAN_DARAH)-1) ORDER BY LEFT(GOLONGAN_DARAH,length(GOLONGAN_DARAH)-1)", $tahun);
        $queryMin = sprintf("select count(nama) AS count,LEFT(GOLONGAN_DARAH,length(GOLONGAN_DARAH)-1) as gol  from pendonor where YEAR(TANGGAL)='%s' AND GOLONGAN_DARAH like '%s' group by LEFT(GOLONGAN_DARAH,length(GOLONGAN_DARAH)-1) ORDER BY LEFT(GOLONGAN_DARAH,length(GOLONGAN_DARAH)-1)", $tahun, "%-");
        $queryPlus = sprintf("select count(nama) AS count,LEFT(GOLONGAN_DARAH,length(GOLONGAN_DARAH)-1) as gol  from pendonor where YEAR(TANGGAL)='%s' AND GOLONGAN_DARAH like '%s' group by LEFT(GOLONGAN_DARAH,length(GOLONGAN_DARAH)-1) ORDER BY LEFT(GOLONGAN_DARAH,length(GOLONGAN_DARAH)-1)", $tahun, "%+");

        $this->pushArrayQuery($data, $queryData);
        $this->pushArrayQuery($dataMin, $queryMin);
        $this->pushArrayQuery($dataPlus, $queryPlus);

        $this->setToNolIsEmpty($data);
        $this->setToNolIsEmpty($dataMin);
        $this->setToNolIsEmpty($dataPlus);

        $array = array("total" => $data, "min" => $dataMin, "plus" => $dataPlus);

        echo json_encode($array);
    }

    public function setToNolIsEmpty(&$array)
    {
        if (sizeof($array["A"]) == 0) {
            array_push($array['A'], 0);
        }
        if (sizeof($array["AB"]) == 0) {
            array_push($array['AB'], 0);
        }
        if (sizeof($array["B"]) == 0) {
            array_push($array['B'], 0);
        }
        if (sizeof($array["O"]) == 0) {
            array_push($array['O'], 0);
        }
    }

    public function pushArrayQuery(&$array, $query)
    {
        $result = $this->Model_lib->SelectQuery($query);

        if ($result->num_rows() > 0);
        {
            foreach ($result->result() as $row) {
                if ($row->gol == "A") {
                    array_push($array['A'], (int)$row->count);
                } elseif ($row->gol == "AB") {
                    array_push($array['AB'], (int)$row->count);
                } elseif ($row->gol == "B") {
                    array_push($array['B'], (int)$row->count);
                } elseif ($row->gol == "O") {
                    array_push($array['O'], (int)$row->count);
                }
            }
        }
    }
}


