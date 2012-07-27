<?php
App::uses('AppController', 'Controller');
App::uses('Sanitize', 'Utility');

class SmabloController extends AppController {
  public $helpers = array( 'Form' );
  public $layout = "mobile";

  public function index() {
    $this->modelClass = null;
    $result = "Hello World!";
    $this->set("header_for_layout", "Sample");
    $this->set("footer_for_layout", "Copyright by Daisuke Ozaki. 2012");
    $this->set("result", $result);
  }

  public function post() {
    $this->modelClass = null;
    $message = '';

    $jpeg = "files/56a5570f.jpg";
    list( $max_width, $max_height ) = getimagesize( $jpeg );

    if ($this->request->data){
      //$message = Sanitize::stripAll(
      //  $this->request->data['text1']);
        $message = $this->request->data['text1'];

      $font = "/usr/local/share/fonts/mplus-1p-regular.ttf";
      $font_size = 24;

    
      $str_img_size = imageftbbox( $font_size, 0, $font, $message );
      $width = $str_img_size[2] - $str_img_size[6];
      $height = $str_img_size[3] - $str_img_size[7];

      $str_img = imagecreatetruecolor( $width + $font_size, $height + $font_size );
      $col = imagecolorallocate( $str_img, 255, 255, 255 );

      imagettftext( $str_img, $font_size, 0, $font_size / 2, $font_size + $font_size / 2, $col, $font, $message);
      imagejpeg($str_img, "files/string.jpg");
      
      $orig_img = imagecreatefromjpeg($jpeg);
      $img = imagecreatetruecolor($max_width, $max_height + $height + $font_size);
      imagecopyresampled($img, $orig_img, 0, 0, 0, 0, $max_width, $max_height, $max_width, $max_height);
      imagecopyresampled($img,$str_img,$max_width / 2 - $width / 2 - $font_size,$max_height,0,0,$max_width,$max_height,$max_width,$max_height);

      imagejpeg($img,"files/saved.jpg");


      $result = '<img src="/cake/files/saved.jpg" width="100%" style="max-width:' . $max_width . 'px;">';
      $result .= '<br /><img src="/cake/files/string.jpg" width="100%" style="max-width:' . $width . 'px;">';

    } else {
      $result = '<img src="/cake/' . $jpeg . '" width="100%" style="max-width:' . $max_width . 'px;">';
    }

    $this->set("result", $result);
    $this->set("header_for_layout", "Sample");
    $this->set("footer_for_layout", "Copyright by Daisuke Ozaki. 2012");
  }
}

