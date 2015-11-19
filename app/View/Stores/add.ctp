<?php echo $this->Form->create('Store', array('method'=>'post')); ?>
    <div class="hidden">
        <!-- $pam check -->
        <div class="dummy">
            <input name="password" type="password" value="">
            <input name="email" type="text" value="">
        </div>
    </div>
    <?php echo $this->Form->input('name', array('label'=>'Store Name')); ?>
    <?php echo $this->Form->input($imap['password'], array('label'=>'Store Password', 'type'=>'password')); ?>
    <?php echo $this->Form->input($imap['email'], array('label'=>'Email')); ?>
    <?php echo $this->Form->input('description', array('type'=>'textarea', 'maxLength'=>3000)); ?>
<?php echo $this->Form->end('submit'); ?>
