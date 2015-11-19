<h2>
    <?php echo $title;?>
</h2>

<?php
echo $this->Form->create('RecipeCategory');
echo $this->Form->input('id', array('type' => 'hidden'));
echo $this->Form->input('category_name', array('label'=>'表示名'));
?>
<div class="input">
<br>
<?php echo $this->Form->button('保存する', array('type'=>'submit', 'class'=>'btn btn-submit'));?>
</div>
<?php
echo $this->Form->end();
?>
