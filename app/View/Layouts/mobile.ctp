<!DOCTYPE html> 
<html lang="ja"> 
<head> 
  <?php echo $this->Html->charset(); ?>
  <title>
    <?php echo $title_for_layout; ?>
  </title>
  <meta name="viewport" content="width=device-width, initial-scale=1,minimum-scale=1, maximum-scale=1"> 
  <?php
    echo $this->Html->meta('icon');
    echo $this->Html->css('jquery.mobile-1.0.min.css');
    echo $this->Html->script('jquery-1.6.4.min.js');
    echo $this->Html->script('jquery.mobile-1.0.min.js');
    echo $scripts_for_layout;
  ?>
</head>
<body>
  <div data-role="page" id="index" data-theme="b">
    <div data-role="header" data-theme="b">
      <?php echo $header_for_layout; ?>
    </div>
  <div data-role="content">
    <?php echo $this->Session->flash(); ?>
    <?php echo $content_for_layout; ?>
  </div>
  <div data-role="footer" data-theme="b">
    <?php echo $footer_for_layout; ?>
  </div>
</body>
</html>


