<div>
    <h3><span class="store-name"><?php echo h($this->data['Store']['name']); ?></span></h3>
    <span class="store-description"><?php echo h($this->data['Store']['description']); ?></span>
    <?php //if(isset($data['is_store_manager']) && $data['is_store_manager']) {?>
        <a class="button" href="/stores/edit/<?php echo $this->data['Store']['id'];?>">Edit Detail</a>
    <?php //}?>
    <?php //if(isset($data['enable_add']) && isset($data['is_store_manager']) && $data['is_store_manager']) {?>
    <a class="button" href="/items/add/<?php echo $this->data['Store']['store_hash']; ?>">+ADD ITEM</a>
    <?php //}?>
</div>

<?php
echo $this->element('Items/list');
?>

