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
    $tabel="Label_Activity";
    $data["Label"] = stripslashes($this->db->escape_str($this->input->post("Label")));
		$data["Make"] = stripslashes($this->db->escape_str($this->input->post("Make")));

    $result = $this->Model_lib->insert($tabel,$data);

    if($result){
			$err="s";
			$arr = array('err'=>$err,'klas'=>$data);
		}else{
			$err="s";
			$arr = array('err'=>$err,'klas'=>$data);
		}

    echo json_encode($arr);
  }


	public function selectActivity (){
		$query = $this->Model_lib->SelectQuery("SELECT * FROM Label_Activity");
		$a=array();

		foreach ($query->result() as $row)
		{
		   array_push( $a ,'
       <div class="col-lg-3 col-md-6">
          <div id="content-activity" class="card content-activity">
            <div class="card-body">
              <div class="stat-widget-one">
                <div class="stat-icon dib"><i class="ti-layout-grid2 text-warning border-warning"></i></div>
                <div class="stat-content dib">
                 <div class="stat-text">'.$row->Label.'</div>
                 <div class="stat-text">'.$row->Make.'</div>
                 <div class="stat-text">Total: 100</div>
                </div>
              </div>
            </div>
          </div>
        </div>
          ');
		}
      $date=date("Y-m-d");
      $result=array($a,$date);
		 echo json_encode($result);
	}


}
