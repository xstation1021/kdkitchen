<?php 
echo $this->Html->script('jquery.min');
//TODO JUST USE JQUEYR
?>
<script>
<?php
if(isset($errors) && !empty($errors)) {
?>
    var form = window.parent.document.getElementById('<?php echo $form_id;?>');
    $('.error-message', form).hide();
    <?php
    foreach($errors as $name=>$msgs) {
        
        $input_name = 'data['.$model.']['.$name.']';
        $msg = $msgs[0];
    ?>
        $('[name="<?php echo $input_name;?>"]', form).addClass('form-error');
        $('[name="<?php echo $input_name;?>"]', form).parent('div').addClass('error');
        $('[name="<?php echo $input_name;?>"]', form).parent('div').append('<div class="error-message"><?php echo $msg;?></div>');

    <?php
    }
    ?>
    window.parent.resizeFancybox();
<?php
} else {
?>
    window.parent.location = "<?php echo $redirect;?>";

<?php
}
?>
</script>
