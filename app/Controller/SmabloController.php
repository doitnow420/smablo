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

    # 画像の指定
    $jpeg = "files/56a5570f.jpg";
    # 画像の大きさを取得
    list( $max_width, $max_height ) = getimagesize( $jpeg );

    if ($this->request->data){
      //$message = Sanitize::stripAll(
      //  $this->request->data['text1']);
      # テキストエリアから取得
      $message = $this->request->data['text1'];

      # フォント指定
      $font = "/usr/local/share/fonts/mplus-1p-regular.ttf";

      # フォントサイズを最適化
      $font_size = $this->optimize_font_size( 48, $font, $message, $max_width );
    
      $str_img_size = imageftbbox( $font_size, 0, $font, $message );
      $width = $str_img_size[2] - $str_img_size[6];
      $height = $str_img_size[3] - $str_img_size[7];

      # 文字列を書いただけの画像を作成
      $str_img = imagecreatetruecolor( $width + $font_size, $height + $font_size );
      $col = imagecolorallocate( $str_img, 255, 255, 255 );

      imagettftext( $str_img, $font_size, 0, $font_size / 2, $font_size + $font_size / 2, $col, $font, $message);
      imagejpeg($str_img, "files/string.jpg"); # 固定はやめよう。いつか失敗する
      
      # オリジナルと文字列の画像を合体
      $orig_img = imagecreatefromjpeg($jpeg);
      $img = imagecreatetruecolor($max_width, $max_height + $height + $font_size);
      imagecopyresampled($img, $orig_img, 0, 0, 0, 0, $max_width, $max_height, $max_width, $max_height);
      imagecopyresampled($img,$str_img,$max_width / 2 - $width / 2 - $font_size,$max_height,0,0,$max_width,$max_height,$max_width,$max_height);

      # マージした画像を生成
      imagejpeg($img,"files/saved.jpg"); # 固定はやめる

      # ビューに渡す文字列の生成
      $result = '<img src="/cake/files/saved.jpg" width="100%" style="max-width:' . $max_width . 'px;">';

    } else {
      $result = '<img src="/cake/' . $jpeg . '" width="100%" style="max-width:' . $max_width . 'px;">';
    }

    $this->set("result", $result);
    $this->set("header_for_layout", "Sample");
    $this->set("footer_for_layout", "Copyright by Daisuke Ozaki. 2012");
  }

  private function optimize_font_size( $fsize, $font, $message, $max_width ) {

      $font_size = $fsize;
      $str_img_size = imageftbbox( $font_size, 0, $font, $message );
      $width = $str_img_size[2] - $str_img_size[6];

      while( $width >= $max_width )
      {
        # 20%縮めてみる
        $font_size = (int) ( $font_size * 0.8 );
        $str_img_size = imageftbbox( $font_size, 0, $font, $message );
        $width = $str_img_size[2] - $str_img_size[6];
      }
      return $font_size;
  }
}

