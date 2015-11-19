<a href="/stores/view/<?php echo $this->data['Store']['id'];?>">Back</a>
<?php echo $this->Form->create('Store', array('action'=>'edit')); ?>
    <?php echo $this->Form->input('name', array('label'=>'Store Name')); ?>
    <?php echo $this->Form->input('email', array('label'=>'Email')); ?>
    <?php echo $this->Form->input('description', array('type'=>'textarea', 'maxLength'=>3000)); ?>
<?php echo $this->Form->end('submit'); ?>
