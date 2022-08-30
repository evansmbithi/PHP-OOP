<?php
/**
 * Base controller
 * Always ensure to extend this class from any controller you create
 * load models and views from other controllers
 * Every controller will extend this class
 * includes methods to load a model/view
 */
class Controller{
  //load model
  public function model($model){
    // require model file
    require_once '../app/models/' . $model . '.php';

    // Instantiate model
    return new $model();
  }

  // Load View
  public function view($view, $data = []){
    // Check for file view
    if(file_exists('../app/views/' . $view . '.php')){
      require_once '../app/views/' . $view . '.php';
    }else{
      // view does not exist
      die('View does not exist');
    }

  }
}