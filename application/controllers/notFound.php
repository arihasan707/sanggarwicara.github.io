<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class notFound extends ci_controller{

  public function __construct()
  {
    parent::__construct();
   

  }
    public function index()
    {
        $data=array
                (
                  'title'   =>'Not found',
                  'isi'     =>'v_404'
                );
        $this->load->view('404/v_wrapper',$data,FALSE);
    }
}