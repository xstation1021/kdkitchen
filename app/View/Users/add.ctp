<?php
echo $this->Form->create('User', array('action'=>'add'));
?>
<div class="hidden">
    <!-- $pam check -->
    <div class="dummy">
        <input name="username" type="text" value="">
        <input name="email" type="text" value="">
        <input name="password" type="password" value="">
    </div>
</div>
<?php
echo $this->Form->input($imap['username'], array('label'=>'Username'));
echo $this->Form->input('display_name', array('label'=>'Display Name'));
echo $this->Form->input($imap['email'], array('label'=>'Email'));
echo $this->Form->input($imap['password'], array('type'=>'password', 'label'=>'Password'));
echo $this->Form->input('password_confirm', array('type'=>'password', 'label'=>'Retype Password'));

echo $this->Form->end('Submit');
?>
