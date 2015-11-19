<script>

$(document).ready(function() {
    $('.ContactButton').magnificPopup({
        items: {
            src: '#ContactPopup',
            type: 'inline',
        },
        showCloseBtn: false
    });

   
});

</script>

<div id="ContactPopup" class="contact-modal mfp-hide">
    <h1 class="modal-heading">コンタクト</h1>
    <a href="javascript:void(0);" onclick="$.magnificPopup.close();" class="btn-close"><span class="icon icon-x"></span></a>
        <?php echo $this->Form->create('Email', array('method'=>'POST', 'action'=>'contact_certification')); ?>
        <?php echo $this->Form->input('name', array('type' => 'text', 'placeholder'=>'お名前', 'label'=>false)); ?>
        <?php echo $this->Form->input('from', array('type' => 'text', 'placeholder'=>'メールアドレス', 'label'=>false)); ?>
        <?php echo $this->Form->input('phone', array('type' => 'text', 'placeholder'=>'電話番号', 'label'=>false)); ?>
        <?php echo $this->Form->input('body', array('type' => 'textarea', 'label'=>false)); ?>
        <?php echo $this->Form->input('chef_email', array('type' => 'hidden', 'value'=>"info@kdkitchen.com")); ?>
        <?php echo $this->Form->button('送信する', array('class'=>'btn_kd btn-send')); ?>
        <?php echo $this->Form->end(); ?>
</div>