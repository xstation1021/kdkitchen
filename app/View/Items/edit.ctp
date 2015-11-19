<?php
$attachment = $this->data['Attachment'];
?>

<?php echo $this->Form->create('Item', array('method'=>'post', 'type'=>'file')); ?>
    <?php echo $this->Form->input('name'); ?>
    <?php echo $this->Form->input('price'); ?>
    <?php echo $this->Form->input('description', array('type'=>'textarea', 'maxLength'=>3000)); ?>
    <?php $count = 0;?>
    <?php while($attach = array_shift($attachment)) { ?>
        <div id="ImageWrapper<?php echo $count;?>">
            <div class="item-edit-imgwrapper">
                <a href="javascript:void(0);" onclick="$('#ImageWrapper<?php echo $count;?>').html($('#PhotoInput<?php echo $count;?>').html());">Delete</a>
                <img class="item-thumb" src="/<?php echo $attach['file_dir'].'/thumbnails/'.$attach['file_name'];?>">    
                <?php echo $this->Form->input('Attachment.keep.'.$count, array('type' => 'hidden', 'value'=>$attach['id'])); ?>
            </div>    
        </div>
        <?php $count += 1;?>
    <?php }?>
    <?php while($count < 3) {?>
        <?php echo $this->Form->input('Attachment.photo.'.$count, array('type' => 'file')); ?>
        <?php $count += 1;?>
    <?php }?>
<?php echo $this->Form->end('save'); ?>
<button type="button" onclick="window.location.reload();">Reset</button>

<div style="display:none;">
    <div id="PhotoInput0">
        <?php echo $this->Form->input('Attachment.photo.0', array('type' => 'file')); ?>
    </div>
    <div id="PhotoInput1">
        <?php echo $this->Form->input('Attachment.photo.1', array('type' => 'file')); ?>
    </div>
    <div id="PhotoInput2">
        <?php echo $this->Form->input('Attachment.photo.2', array('type' => 'file')); ?>
    </div>
</div>
