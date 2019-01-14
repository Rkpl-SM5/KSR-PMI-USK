<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Gallery extends CI_Controller
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
        $query = $this->Model_lib->SelectQuery("SELECT min(ID_IMAGE) as ID_IMAGE ,i.ID_GALLERY,TITLE FROM image as i,gallery as g WHERE i.ID_GALLERY=g.ID_GALLERY GROUP BY ID_GALLERY;");
        $data = array('data' => $query->result());

        $page = $this->load->view('gallery', $data, true);

        echo json_encode($page);
    }

}