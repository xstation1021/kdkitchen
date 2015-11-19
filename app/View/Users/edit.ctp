<?php
echo $this->Form->create('User', array('action'=>'edit'));
echo $this->Form->input('email', array('label'=>'メール'));
?>
<div class="input">
<?php echo $this->Form->button('保存する', array('type'=>'submit', 'class'=>'btn btn-submit'));?>
</div>
<?php
echo $this->Form->end();
?>
