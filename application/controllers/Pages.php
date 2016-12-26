<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Pages extends CI_Controller {

    function __construct(){

        parent::__construct();
        $this->load->helper('url');
        $this->load->model('Storex_model');


    }

    public function index()
    {
     $this->load->view('index');
    }

    public function image(){
        $allowed = 'jpge,jpg,png,gif';
         $upload = $this->Storex_model->upload('pp','default','image_profile',$_FILES['fileUpload'],$allowed,3);
        echo $upload;

    }

    public function exibir(){

        $data3 = $this->load->database('default', TRUE);
        $data3->from('image_profile');
        $data3->where('id',addslashes($_GET['id']));
        $query = $data3->get();
        $fetch = $query->result_array();
        header("content-type: ".$fetch[0]['ext']."");
        echo $fetch[0]['file'];

    }




}


?>