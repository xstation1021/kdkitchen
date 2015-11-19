<style>
    input, textarea {
        width:400px;
    }
</style>

<div class="container-slim">
    <div class="container-slim profile">
    <h2>
        <?php echo $title;?>
    </h2>
    
    
    <?php
        echo $this->Form->create('Content', array('action'=>''));
        echo $this->Form->input('id', array('type' => 'hidden'));
    ?>
    <div>Key</div>
    <?php
        echo $this->Form->input('key', array('label'=>''));
    ?>
    <div>Value</div>
    <?php
        echo $this->Form->input('value', array('label'=>''));
    ?>
    <div>ディスクリプション</div>
    <?php 
        echo $this->Form->input('description', array('label'=>'', 'type'=>'textarea'));
    ?>
    <?php echo $this->Form->submit('保存する', array('class'=>'btn btn-save')); ?>
    <?php echo $this->Form->end(); ?>
    </div>
</div>
