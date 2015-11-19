<?php
echo $this->Form->create('User');
echo $this->Form->input($imap['password'], array('type'=>'password', 'label'=>'新しいパスワード'));
echo $this->Form->input('password_confirm', array('type'=>'password', 'label'=>'パスワードの確認'));
?>
<div class="input">
<?php echo $this->Form->button('保存する', array('type'=>'submit', 'class'=>'btn btn-submit'));?>
</div>
<?php
echo $this->Form->end();
?>
