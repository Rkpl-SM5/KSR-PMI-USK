<?php
defined('BASEPATH') or exit('No direct script access allowed');

class SearchDashboard extends CI_Controller
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
        $page = $this->load->view('searchDashboard', '', true);
        $val = array();
        $navigator = array();

        array_push($navigator, "Search");
        array_push($val, "searchDashboard");

        $data = array("page" => $page, "val" => $val, "nav" => $navigator);
        echo json_encode($data);
    }


    public function search()
    {
        $pendonor = sprintf("select * from pendonor");
        $val = array();
        $navigator = array();
        $result = $this->Model_lib->SelectQuery($pendonor)->result();

        $page = $this->generateSurfacePendonor($result);
        $data = array("page" => $page, "val" => $val, "nav" => $navigator);

        echo json_encode($data);
    }

    public function generateSurfacePendonor($data)
    {
        $value = '<div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <strong class="card-title">Custom Table</strong>
                        </div>
                        <div class="table-stats order-table ov-h">
                            <table class="table ">
                            <thead>
                                <tr>
                                    <th class="serial">#</th>
                                    <th>Nama</th>
                                    <th>Gol Darah</th>
                                    <th>Kontak</th>
                                    <th>Alamat</th>
                                    <th>Tanggal</th>
                                    <th>Email</th>
                                </tr>
                            </thead>
                            <tbody>';


        foreach ($data as $row) {
            $no = 1;
            $value .= '
                                <tr>
                                    <td class="serial">' . $no++ . '.</td>
                             
                                    <td> ' . $row->NAMA . ' </td>
                                    <td> <span class="name">' . $row->GOLONGAN_DARAH . '</span> </td>
                                    <td> <span class="product">' . $row->KONTAK . '</span> </td>
                                    <td><span class="count">' . $row->ALAMAT . '</span></td>
                                    <td><span class="count">' . $row->TANGGAL . '</span></td>
                                    <td><span class="count">' . $row->EMAIL . '</span></td>
                                    
                                </tr>
                                    
                                    ';
        }



        $value .= '             </tbody>
                            </table>
                        </div>
                    </div>
                </div>';
        return $value;
    }

}