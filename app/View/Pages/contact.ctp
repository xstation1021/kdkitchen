<div class="container clearfix">

    <header class="page-header">
    
        <h1 class="page-title">We'd Love to hear from you!</h1>
        
    </header><!-- end .page-header -->

</div>

<div class="container clearfix">
        
    <div class="one-fourth">

        <h3>Contact Info</h3>

        <p>
        Email: contact@kdkitchen.com
        </p>
        
    </div><!-- end .one-fourth -->
    
    <div class="three-fourth last contact-wrapper">

        <h3>Let's keep in touch</h3>

        <?php echo $this->Form->create('Utility', array('action'=>'send_contact_email', 'method'=>'post', 'class'=>'contact-form')); ?>
        
            <div class="hidden">
                <!-- $pam check -->
                <div class="dummy">
                    <input name="email" type="text" value="">
                    <input name="subject" type="text" value="">
                </div>
            </div>

            <div class="contact-form-input-wrapper">
            <div class="contact-input-wrapper">
                <?php echo $this->Form->input('name', array('label'=>'<label for="contact-name"><strong>名前</strong> (必須)</label>', 'id'=>'contact-name')); ?>

                <?php echo $this->Form->input('email', array('label'=>'<label for="contact-email"><strong>メールアドレス</strong> (必須)</label>')); ?>
            
                <?php echo $this->Form->input('subject', array('label'=>'<label for="contact-subject"><strong>題名</strong></label>', 'id'=>'contact-subject')); ?>
                <div class="clear"></div>
            </div>
            <?php echo $this->Form->input('message', array('label'=>'<label for="contact-message"><strong>メッセージ</strong> (必須)</label>', 'id'=>'contact-message', 'cols'=>'88', 'rows'=>'6')); ?>
            </div>
        <?php echo $this->Form->end('送信'); ?>

        <div class="clear"></div>


    </div><!-- end .three-fourth.last -->

</div>
