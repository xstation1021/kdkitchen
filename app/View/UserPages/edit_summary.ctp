<script type="text/javascript">
tinymce.init({
        selector: "textarea",
        theme: "modern",
        plugins: [
            "advlist autolink lists link image charmap print preview hr anchor pagebreak",
            "searchreplace wordcount visualblocks visualchars code fullscreen",
            "insertdatetime media nonbreaking save table contextmenu directionality",
            "emoticons template paste textcolor"
        ],
        toolbar1: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image",
        toolbar2: "print preview media | forecolor backcolor emoticons",
        image_advtab: true,
        templates: [
            {title: 'Test template 1', content: 'Test 1'},
            {title: 'Test template 2', content: 'Test 2'}
        ]
});
</script>

<?php
$profile_pic = NULL;
if(!empty($attachments['profile'])) {
    $profile_pic = $attachments['profile'][0];
}
$food_pics = NULL;
if(!empty($attachments['food'])) {
    $food_pics = $attachments['food'];
}
?>

<?php
echo $this->Form->create('UserPage', array('method'=>'post', 'type'=>'file', 'action'=>'edit', $this->data['UserPage']['id']));
?>
    
    <div class="one-third">
        <label>Profile Picture</label>
        <?php if($profile_pic) { ?>
            <div id="ImageWrapperProfile">
                <div class="item-edit-imgwrapper">
                    <a href="javascript:void(0);" onclick="$('#ImageWrapperProfile').html($('#PhotoInput0').html());">Delete</a>
                    <img class="item-thumb" src="/<?php echo $profile_pic['file_dir'].'/thumbnails/'.$profile_pic['file_name'];?>">    
                    <?php echo $this->Form->input('Attachment.keep.0', array('type' => 'hidden', 'value'=>$profile_pic['id'])); ?>
                </div>    
            </div>
        <?php } else { ?>
            <?php echo $this->Form->input('Attachment.profile.0', array('type' => 'file')); ?>
        <?php } ?>

        <label>Food</label>
        <?php $count = 0;?>
        <?php while($food_pics && $attach = array_shift($food_pics)) { ?>
            <div id="ImageWrapperFood<?php echo $count;?>">
                <div class="item-edit-imgwrapper">
                    <a href="javascript:void(0);" onclick="$('#ImageWrapperFood<?php echo $count;?>').html($('#PhotoInput<?php echo $count;?>').html());">Delete</a>
                    <img class="item-thumb" src="/<?php echo $attach['file_dir'].'/thumbnails/'.$attach['file_name'];?>">    
                    <?php echo $this->Form->input('Attachment.keep.'.($count+1), array('type' => 'hidden', 'value'=>$attach['id'])); ?>
                </div>    
            </div>
            <?php $count += 1;?>
        <?php }?>
        <?php while($count < 3) {?>
            <?php echo $this->Form->input('Attachment.food.'.$count, array('type' => 'file', 'label'=>'')); ?>
            <?php $count += 1;?>
        <?php } ?>
    </div>
    <div class="two-third last">
        <?php echo $this->Form->input('body', array('label'=>'Body', 'type'=>'textarea'));?>
    </div>
<?php
echo $this->Form->end('Save');
?>
<div style="display:none;">
    <div id="PhotoInput0">
        <?php echo $this->Form->input('Attachment.profile.0', array('type' => 'file')); ?>
    </div>
    <div id="PhotoInput1">
        <?php echo $this->Form->input('Attachment.food.0', array('type' => 'file')); ?>
    </div>
    <div id="PhotoInput2">
        <?php echo $this->Form->input('Attachment.food.1', array('type' => 'file')); ?>
    </div>
    <div id="PhotoInput3">
        <?php echo $this->Form->input('Attachment.food.2', array('type' => 'file')); ?>
    </div>
</div>
