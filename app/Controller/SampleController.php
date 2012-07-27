<?php
App::uses('AppController', 'Controller');
App::uses('Sanitize', 'Utility');
 
class SampleController extends AppController {
  public $helpers = array( 'Form' );
 
  public function index() {
    $this->modelClass = null;
    if ($this->request->data){
      $result = "[result]";
      $result .= "<br>text1: " . Sanitize::
          stripAll($this->request->data['text1']);
      $result .= "<br>check1: " . 
          $this->request->data['check1'];
      $result .= "<br>radio1: " . 
          $this->request->data['radio1'];
      $result .= "<br>select1: " . 
          $this->request->data['select1'];
    } else {
      $result = "no data.";
    }
    $this->set("result", $result);
  }
 
}
