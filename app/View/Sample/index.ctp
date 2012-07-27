<h1>Index Page</h1>
<p>this is test View.</p>
<p><?php echo $result; ?></p>
<p>
  <?php
    echo $this->Form->create( null, 
        array('type'=>'post','action'=>'.'));
    echo $this->Form->label('text1',"message");
    echo $this->Form->text('text1');
    echo $this->Form->checkbox('check1');
    echo $this->Form->label('check1',"checkbox1");
    echo $this->Form->radio('radio1', 
        array('male' => '男性', 
          'female' => '女性'));
    echo $this->Form->select('select1',
        array("Mac" => 'マック',
          "Windows" => 'ウインドウズ',
          "Linux" => 'リナックス'));
    echo $this->Form->end("送信");
  ?>
</p>
</div>
