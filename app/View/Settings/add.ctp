
<?php echo $this->Html->link('設定一覧', array('controller'=>'images', 'action'=>'index'));?>
<?php
echo $this->Form->create('Setting', array('method'=>'post', 'type'=>'file', 'action'=>'add'));
?>
    <?php echo $this->Form->input('key'); ?>
    <?php echo $this->Form->input('value'); ?>
<?php
echo $this->Form->end('Save');
?>
