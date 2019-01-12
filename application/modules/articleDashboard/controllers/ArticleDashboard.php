<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ArticleDashboard extends CI_Controller {

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

     function __construct() {
		parent::__construct();
		$this->_public_view= $this->config->item('public_view');
          //$this->load->helper('url');
		$this->load->model('Model_lib');
	}

	public function activities()
	{
		$page=$this->load->view('activitiesDashboard','',true);
		$val=array();
		$navigator=array();

		array_push($navigator,"Article");
		array_push($val,"articleDashboard");

		array_push($navigator,"Activities");
		array_push($val,"activities");

		$data=array("page"=>$page,"val"=>$val,"nav"=>$navigator);
		echo json_encode($data);
	}

	public function news()
	{
		$page=$this->load->view('newsDashboard','',true);
		$val=array();
		$navigator=array();

		array_push($navigator,"Article");
		array_push($val,"articleDashboard");

		array_push($navigator,"News");
		array_push($val,"news");

		$data=array("page"=>$page,"val"=>$val,"nav"=>$navigator);
		echo json_encode($data);
	}

	public function addActivity()
    {
        $page = $this->load->view('addActivity', '', true);
        $val = array();
        $navigator = array();

        array_push($navigator, "Article");
		array_push($val, "articleDashboard");
		
		array_push($navigator,"Activities");
		array_push($val,"activities");

        array_push($navigator, "Add");
        array_push($val, "add");

        $data = array("page" => $page, "val" => $val, "nav" => $navigator);
        echo json_encode($data);
    }


}

 	