<?php
    defined('BASEPATH') or exit('No direct script access allowed');

    class SignIn extends CI_Controller
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
            $page = $this->load->view('signin', '', true);
            echo json_encode($page);
        }
        function admin()
        {
        $data["email"] = $this->db->escape_str($this->input->post("email"));
        $data["password"] = stripslashes($this->db->escape_str($this->input->post("password")));
        
            
            if(empty($data['email']))
            {
                $err="Mohon isi alamat email";
                $klas="#email";
            }
            else  if(!filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
                $err="Email yang anda masukkan tidak valid";
                $klas="#email";
            }
            else if(empty($data["password"]))
            {
                $err="Mohon isi password";
                $klas="#password";
            }
            else
            {
                $where=sprintf("WHERE EMAIL='%s'",$data["email"]);
                $result = $this->Model_lib->Cek("admin",$where);
                if($result->num_rows()>0){
                    $where=sprintf("WHERE EMAIL='%s' AND PASS='%s'",$data["email"],$data["password"]);
                    $result = $this->Model_lib->Cek("admin",$where);
                    if($result->num_rows()>0){
                        $err="ss";
                        $klas="";
                    }else{
                        $err="password salah";
                        $klas="";
                    }
                }
                else{
                        $err="email belum terdaftar";
                        $klas="";
                }
            }
            
            $arr = array('err'=>$err,'klas'=>$klas);
            echo json_encode($arr);
        }
        
    }