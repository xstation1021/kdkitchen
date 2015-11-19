<?php

    echo $this->Html->script('stupidtable.min');
    echo $this->Html->script('sortorder');
?>

<?php
   echo $this->Form->create('Question', array('action'=>'order'));
?>

<table id="sorttable">
<thead>
    <tr>
        <th>ID</th>
        <th>Title</th>
        <th>Order</th>
        <th id="sortTrigger" data-sort="int" style="display:none;"></th>
    </tr>
    </thead>
    <tbody>
<?php foreach($this->data as $index=> $userpage) { ?>
    <tr>
        <td><?php echo $userpage['Question']['id']; echo $this->Form->input('Question.' . $index . '.id', array('type' => 'hidden', 'value'=> $userpage['Question']['id']) );?></td>
        <td><?php echo $userpage['Question']['title']; ?></td>
        <td ><?php 
                
                echo $this->Form->input('Question.' . $index . '.sortorder', array('label' =>false, 'options' => $sortOrder,'class'=>'sortorder', 'value'=> $userpage['Question']['sortorder']) );
            ?>
            </td>
            <td style="display:none;">
            <?php echo $userpage['Question']['sortorder']; ?>
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
