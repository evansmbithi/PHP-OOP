<?php
// Default Controller
class Pages extends Controller{
  public function __construct(){
    // echo 'Pages loaded';
  }

  public function index(){
    // default method
    // because we extended Controller we can either access view or model
    // $this->view('hello'); // loads views/hello.php  
    $data = [
      'title' => 'RocksMVC'
    ];
    
    $this->view('pages/index', $data);
  }

  public function about(){
    $data = [
      'title' => 'About'
    ];

    $this->view('pages/about', $data);    
  }
}