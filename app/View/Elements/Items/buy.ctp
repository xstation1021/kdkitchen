<iframe style="display:none;" name="item-buy-form-proc"></iframe>
<div id="ItemBuyFormWrapper" style="display:none;">
<?php echo $this->Form->create('Item', array('method'=>'post', 'action'=>'buy', 'target'=>'item-buy-form-proc')); ?>
    <div class="hidden">
        <!-- $pam check -->
        <div class="dummy">
            <input name="email" type="text" value="">
        </div>
    </div>
    <?php echo $this->Form->input($imap['email'], array('label'=>'Your Email')); ?>
    <?php echo $this->Form->input('message', array('type'=>'textarea')); ?>
    <?php echo $this->Form->hidden('store_hash', array('id'=>'StoreHash', 'value'=>'')); ?>
    <?php echo $this->Form->hidden('id', array('id'=>'ItemBuyId', 'value'=>'')); ?>
    <?php echo $this->Form->hidden('is_active', array('value'=>0)); ?>
<?php echo $this->Form->end('Buy'); ?>
</div>
