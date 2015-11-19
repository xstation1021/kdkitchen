<?php echo $this->Form->create('Item', array('method'=>'post', 'type'=>'file')); ?>
    <?php echo $this->Form->input('name'); ?>
    <?php echo $this->Form->input('price'); ?>
    <?php echo $this->Form->input('description', array('type'=>'textarea', 'maxLength'=>3000)); ?>
    <?php echo $this->Form->input('Attachment.photo.0', array('type' => 'file')); ?>
    <?php echo $this->Form->input('Attachment.photo.1', array('type' => 'file')); ?>
    <?php echo $this->Form->input('Attachment.photo.2', array('type' => 'file')); ?>
<?php echo $this->Form->end('submit'); ?>
