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
            $page .= '<img onclick="show(this)" class="card-img-top" src="Data/images/' . $row->ID_IMAGE . "-" . $row->ID_GALLERY . '.jpg">';
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

        $data = "sss";
        echo json_encode($data);

    }
}