<?php

class Overview extends CI_Controller

{

   public function __construct()

   {

       parent::__construct();
       if($this->session->userdata('status') != "MASUK"){
        redirect(base_url("otentikasi"));
    }

   }



   public function index()

   {
    $data["title"] = "Dashboard";
    $this->load->view('overview',$data);    }

}