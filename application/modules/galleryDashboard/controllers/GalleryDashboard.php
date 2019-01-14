<?php
defined('BASEPATH') or exit('No direct script access allowed');

class GalleryDashboard extends CI_Controller
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


        $page = $this->load->view('galleryDashboard', $data, true);
        // echo $page;
        $val = array();
        $navigator = array();

        array_push($navigator, "Gallery");
        array_push($val, "galleryDashboard");

        $data = array("page" => $page, "val" => $val, "nav" => $navigator);
        echo json_encode($data);
    }

    public function add()
    {
        $page = $this->load->view('addGallery', '', true);
        $val = array();
        $navigator = array();

        array_push($navigator, "Gallery");
        array_push($val, "galleryDashboard");

        array_push($navigator, "Add");
        array_push($val, "add");

        $data = array("page" => $page, "val" => $val, "nav" => $navigator);
        echo json_encode($data);
    }

    public function show($id_gallery)
    {
        $query = sprintf("SELECT * FROM image WHERE ID_GALLERY='%s';", $id_gallery);

        $result = $this->Model_lib->SelectQuery($query);

        $query = sprintf("SELECT TITLE FROM gallery WHERE ID_GALLERY='%s';", $id_gallery);
        $resultTitle = $this->Model_lib->SelectQuery($query)->row()->TITLE;

        $this->generateImageGallery($result, $resultTitle);
    }

    public function generateImageGallery($data, $resultTitle)
    {
        $val = array();
        $navigator = array();

        array_push($navigator, "Gallery");
        array_push($val, "galleryDashboard");

        array_push($navigator, $resultTitle);
        array_push($val, "show");

        $page = '<div class="row">';
        foreach ($data->result() as $row) {

            $page .= '<div id="' . $row->ID_IMAGE . '" class="col-md-4 image-gallery centered-content">';
            $page .= '<div class="card">';
            $page .= '<img onclick="show(this)" class="card-img-top" src="'.base_url().'Data/images/' . $row->ID_IMAGE . '">';
            $page .= '<div class="card-image-gallery">';
            $page .= '<h6 class="card-title mb-3">' . $row->NAME . '</h6>';
            $page .= '</div>';
            $page .= '</div>';
            $page .= '</div>';
        }
        $page .= '</div>';

        $data = array("page" => $page, "val" => $val, "nav" => $navigator);
        echo json_encode($data);
    }

    public function navImage($id_image)
    {
        $page = "";
        $query = sprintf("SELECT * FROM image WHERE ID_IMAGE='%s';", $id_image);
        $image = $this->Model_lib->SelectQuery($query)->row();

        $query = sprintf("SELECT * FROM gallery WHERE ID_GALLERY='%s';", $image->ID_GALLERY);
        $gallery = $this->Model_lib->SelectQuery($query)->row();

        $val = array();
        $navigator = array();

        array_push($navigator, "Gallery");
        array_push($val, "galleryDashboard");

        array_push($navigator, $gallery->TITLE);
        array_push($val, "show/" . $image->ID_GALLERY);

        array_push($navigator, $image->NAME);

        $data = array("page" => $page, "val" => $val, "nav" => $navigator);
        echo json_encode($data);
    }


    public function addNewGallery()
    {
        $data = $_POST["data"];
        $query = sprintf("SELECT * FROM Label WHERE Label LIKE '%s'", $data[1]);
        $Label = $this->Model_lib->SelectQuery($query);
        $id = "";
        if ($Label->num_rows() > 0) {
            $query = sprintf("SELECT * FROM gallery WHERE TITLE LIKE '%s'", $data[0]);
            $gallery = $this->Model_lib->SelectQuery($query);

            if ($gallery->num_rows() == 0) {
                $tabel = "gallery";
                $dataInsert["TITLE"] = stripslashes($this->db->escape_str($data[0]));
                $dataInsert["ID_LABLE"] = $Label->row()->Id_Label;
                $dataInsert["MAKE"] = stripslashes($this->db->escape_str($data[2]));
                $result = $this->Model_lib->insert($tabel, $dataInsert);
            }
            $query = sprintf("SELECT ID_GALLERY FROM gallery WHERE TITLE LIKE '%s' AND MAKE='%s'", $data[0], $data[2]);
            $id = $this->Model_lib->SelectQuery($query)->row()->ID_GALLERY;

        } else {
            $tabel = "Label";
            $dataInsert["Label"] = stripslashes($this->db->escape_str($data[1]));
            $dataInsert["Make"] = stripslashes($this->db->escape_str($data[2]));
            $result = $this->Model_lib->insert($tabel, $dataInsert);
            $dataInsert = "";

            $query = sprintf("SELECT * FROM gallery WHERE TITLE LIKE '%s'", $data[0]);
            $gallery = $this->Model_lib->SelectQuery($query);

            if ($gallery->num_rows() == 0) {        
                $query = sprintf("SELECT * FROM Label WHERE Label LIKE '%s'", $data[1]);
                $Label = $this->Model_lib->SelectQuery($query);

                
                $tabel = "gallery";
                $insert["TITLE"] = stripslashes($this->db->escape_str($data[0]));
                $insert["ID_LABLE"] = $Label->row()->Id_Label;
                $insert["MAKE"] = stripslashes($this->db->escape_str($data[2]));
                $result = $this->Model_lib->insert($tabel, $insert);
            }

            $query = sprintf("SELECT ID_GALLERY FROM gallery WHERE TITLE LIKE '%s' AND MAKE='%s'", $data[0], $data[2]);
            $id = $this->Model_lib->SelectQuery($query)->row()->ID_GALLERY;
        }
        // $data = var_dump($_POST);
        $arr = array('id' => $id);
        echo json_encode($arr);
    }

    public function uploadImage($id_gallery)
    {
        // $data = var_dump($_FILES["file"]);

        $config['upload_path'] = "./Data/images/"; //path folder file upload
        $name = $this->stripFileName($id_gallery . stripslashes($this->db->escape_str($_FILES["file"]['name'])));
        $config['allowed_types'] = 'gif|jpg|jpeg|png'; //type file yang boleh di upload
        $config['file_name'] = $name;

        //$config['encrypt_name'] = TRUE; //enkripsi file name upload
        $this->load->library('upload', $config); //call library upload
        if ($this->upload->do_upload("file")) { //upload file

            $tabel = "image";
            $dataID = array('upload_data' => $this->upload->data());

            $data["ID_IMAGE"] = $this->stripFileName($dataID['upload_data']['file_name']);
            $data["ID_GALLERY"] = $id_gallery;
            preg_replace("/[^A-Za-z0-9 ]/", '', $name);
            $data["NAME"] = $name;

            $result = $this->Model_lib->insert($tabel, $data);
            $var = "s";

        } else {
            $var = $this->upload->display_errors('', '');
        }
        echo json_encode($var);
    }

    public function stripFileName($name)
    {
        $ext = pathinfo($name, PATHINFO_EXTENSION);

        $file = basename($name, "." . $ext);
        return preg_replace("/[^A-Za-z0-9 ]/", '_', $file) . "." . $ext;

        // echo $tes;
    }
}