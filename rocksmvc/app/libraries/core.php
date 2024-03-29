<!-- Pulls links from URLS -->
<?php
/**
 * App Core/Main Class
 * Creates URL & loads core controller
 * URL format - /controller/method/params
 * e.g /rocksmvc/public/posts/id/1
 */

 class Core {
  protected $currentController = 'Pages'; // default controller
  protected $currentMethod = 'index';
  protected $params = [];

  public function __construct(){
    // print_r($this->getUrl());
    $url = $this->getUrl();
    /**
     * look in URL/controllers (posts/edit/1) for first value (posts)
     * if exists, set as current controller, else default to Pages controller
     * everything gets routed into index.php
     * define path as if we were in index.php
     * ucwords() - capitalizes the first letter 
     */
    if(isset($url[0])){
      if(file_exists('../app/controllers/' . ucwords($url[0]) . '.php')){
        $this->currentController = ucwords($url[0]);
        unset($url[0]); //unset zero index
      }else{
        // load the default Controller 'Pages'
      }
    }

    // Require the controller
    require_once '../app/controllers/' . $this->currentController . '.php';

    // Instantiate controller class
    // $Pages = new Pages;
    $this->currentController = new $this->currentController;
    // echo $this->currentMethod;

    // check second part of URL
    if(isset($url[1])){
      // check if method exists in controller
      if(method_exists($this->currentController, $url[1])){
        $this->currentMethod = $url[1];
      }
      unset($url[1]);
    }

    // Get params
    $this->params = $url ? array_values($url) : [];

    // Call a callback with array of params
    call_user_func_array([$this->currentController, $this->currentMethod], $this->params);

  }

  // strip URL into array list
  public function getUrl(){
    if(isset($_GET['url'])){
      // echo 'URL format - /controller/method/params <br/>' . 'URL - ' . $_GET['url'];
      $url = rtrim($_GET['url'], '/'); // strip the ending slash
      $url = filter_var($url, FILTER_SANITIZE_URL); // sanitize URL
      $url = explode('/', $url); // Break to array upon every /
      return $url; // return array
    }   
  }
}