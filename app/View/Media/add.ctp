
<?php echo $this->Html->link('イメージファイル一覧', array('controller'=>'images', 'action'=>'index'));?>
<?php
echo $this->Form->create('Media', array('method'=>'post', 'type'=>'file', 'action'=>'add'));
?>
    <div>
        <label>Upload File</label>
        <?php echo $this->Form->input('file', array('type' => 'file')); ?>
    </div>

<?php
echo $this->Form->end('Save');
?>
