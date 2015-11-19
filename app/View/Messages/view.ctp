<?php echo $this->Html->link('Back', array('controller'=>'messages', 'action'=>'index'));?>
<div>
    <?php echo $this->data['Message']['sender_email']; ?>
</div>
<div>
    <?php echo $this->data['Store']['name']; ?>
</div>
<div>
    <?php echo $this->data['Item']['name']; ?>
</div>
<div>
    <span class="infobox">
        <?php echo $this->data['Message']['body']; ?>
    </span>
</div>
