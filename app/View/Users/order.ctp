<?php

    echo $this->Html->script('stupidtable.min');
    echo $this->Html->script('sortorder');
?>

<?php
   echo $this->Form->create('User', array('action'=>'order'));
?>

<table id="sorttable">
<thead>
    <tr>
        <th>user page id</th>
        <th>user id</th>
        <th>name</th>
        <th>Order</th>
        <th id="sortTrigger" data-sort="int" style="display:none;"></th>
    </tr>
    </thead>
    <tbody>
<?php foreach($this->data as $index=> $userpage) { ?>
    <tr>
        <td><?php echo $userpage['UserPage']['id']; echo $this->Form->input('UserPage.' . $index . '.id', array('type' => 'hidden', 'value'=> $userpage['UserPage']['id']) );?></td>
        <td><?php echo $userpage['User']['id']; ?></td>
        <td><?php echo $userpage['User']['display_name']; ?></td>
        <td ><?php 
                
                echo $this->Form->input('UserPage.' . $index . '.sortorder', array('label' =>false, 'options' => $sortOrder,'class'=>'sortorder', 'value'=> $userpage['UserPage']['sortorder']) );
            ?>
            </td>
            <td style="display:none;">
            <?php echo $userpage['UserPage']['sortorder']; ?>
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
