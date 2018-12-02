<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Akun extends CI_Controller {

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

	public function index()
	{
		$data=array('page_content' => 'akun');
		$this->load->view($this->_public_view,$data);
	}

	public function open()
	{
          $tabel=$_SESSION["table"];
          $where=sprintf("WHERE email='%s'",$_SESSION["akun"]);
		$result = $this->Model_lib->SelectWhere($tabel,$where)->row();

          $tabel="data_foto_profile";
          $where=sprintf("WHERE email='%s' order by tanggal_perubahan DESC",$_SESSION["akun"]);
		$resultF = $this->Model_lib->SelectWhere($tabel,$where)->row();

          $tabelA="akun";
          $whereA=sprintf("WHERE email='%s'",$_SESSION["akun"]);
		$resultA = $this->Model_lib->SelectWhere($tabelA,$whereA)->row();

          $data=array('result' => $result,'resultF' => $resultF,'resultA' => $resultA);
          $_SESSION["data"]=array('result' => $result,'resultF' => $resultF );
          $this->load->view('akun',$data);
	}
     public function do_upload()
     {
          $config['upload_path']="./asset/images"; //path folder file upload
          $new_name = time().$this->trimLeftEmail($_SESSION["akun"]).$_FILES["file"]['name'];
          $config['allowed_types']='gif|jpg|jpeg|png'; //type file yang boleh di upload
          $config['file_name'] = $new_name;
          //$config['encrypt_name'] = TRUE; //enkripsi file name upload

          $this->load->library('upload',$config); //call library upload
          if($this->upload->do_upload("file")){ //upload file
               $tabel="data_foto_profile";
               $data["email"]=$_SESSION["akun"];
               $dataID = array('upload_data' => $this->upload->data());
               $data["id_foto"]=$dataID['upload_data']['file_name'];

               $data["tanggal_perubahan"]=date("Y-m-d H:i:s");
               $result=$this->Model_lib->insert($tabel,$data);

               $var="s";
          }else {
               $var = $this->upload->display_errors('', '');
          }
          echo $var;
     }

	public function otherAkun($value)
	{
          if(strcmp($_SESSION["akun"],$value)==0){
               $this->open();
          }else {

               $tabel="universitas";
               $atEmail=$this->trimEmail($value);
               //echo $atEmail;
               $where=sprintf("where email_at='%s'",$atEmail);
               $result = $this->Model_lib->Cek($tabel,$where)->num_rows();
               //print_r($result);
               //$result=0;
               $tabel= ($result==0 ? "mahasiswa" : "dosen");
               //echo $tabel;
               $where=sprintf("where email='%s'",$value);
               $result = $this->Model_lib->SelectWhere($tabel,$where)->row();
               //print_r($result);
               $tabelF="data_foto_profile";
               $whereF=sprintf("WHERE email='%s' order by tanggal_perubahan DESC",$value);
               $resultF = $this->Model_lib->SelectWhere($tabelF,$whereF)->row();

               $tabelA="akun";
               $whereA=sprintf("WHERE email='%s'",$value);
               $resultA = $this->Model_lib->SelectWhere($tabelA,$whereA)->row();

               $data=array('result' => $result,'resultF' => $resultF,'resultA' => $resultA);

               $this->load->view('otherAkun',$data);
          }
	}
     public function trimEmail($value)
	{
		$i=0;
		for (; $i<strlen($value); $i++) {
			if($value[$i]=='@'){
				break;
			}
		}
		return substr($value,$i+1);
	}
     public function trimLeftEmail($value)
	{
		$i=0;
		for (; $i<strlen($value); $i++) {
			if($value[$i]=='@'){
				break;
			}
		}
		return substr($value,0,$i);
	}

     public function updateProfile()
     {
          //$data["email"] = stripslashes($this->db->escape_str($this->input->post("email")));
          $dataU= array(
               'nama' =>stripslashes($this->db->escape_str($this->input->post("nama"))),
               'password'=>stripslashes($this->db->escape_str($this->input->post("password")))
          );
          $tabelU=$_SESSION["table"];
          $whereU=sprintf("email='%s'", $_SESSION["akun"]);
          $resultU=$this->Model_lib->Update($tabelU,$dataU,$whereU);


          $dataA= array(
               'profile' =>stripslashes($this->db->escape_str($this->input->post("profile"))),
               'bio'=>stripslashes($this->db->escape_str($this->input->post("bio")))
          );
          $tabelA="akun";
          $whereA=sprintf("email='%s'", $_SESSION["akun"]);
          $resultA=$this->Model_lib->Update($tabelA,$dataA,$whereA);

     }

}
