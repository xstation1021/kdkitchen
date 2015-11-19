<?php

    echo $this->Html->script('stupidtable.min');
    echo $this->Html->script('sortorder');
?>

<?php
   echo $this->Form->create('RecipeCategory', array('action'=>'order'));
?>

<table id="sorttable">
<thead>
    <tr>
        <th>ID</th>
        <th>name</th>
        <th>Order</th>
        <th id="sortTrigger" data-sort="int" style="display:none;"></th>
    </tr>
    </thead>
    <tbody>
<?php foreach($this->data as $index=> $recipecategory) { ?>
    <tr>
        <td><?php echo $recipecategory['RecipeCategory']['id']; echo $this->Form->input('RecipeCategory.' . $index . '.id', array('type' => 'hidden', 'value'=> $recipecategory['RecipeCategory']['id']) );?></td>
        <td><?php echo $recipecategory['RecipeCategory']['category_name']; ?></td>
        <td ><?php 
                
                echo $this->Form->input('RecipeCategory.' . $index . '.sortorder', array('label' =>false, 'options' => $sortOrder,'class'=>'sortorder', 'value'=> $recipecategory['RecipeCategory']['sortorder']) );
            ?>
            </td>
            <td style="display:none;">
            <?php echo $recipecategory['RecipeCategory']['sortorder']; ?>
            </td>
    </tr>
    
<?php } ?>
</tbody>
</table>
<div class="input">
<?php echo $this->Form->button('保存する', array('type'=>'submit', 'class'=>'btn btn-submit'));?>
</div>
<?php
    echo $this->Form->end();
?>
