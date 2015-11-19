<?php echo $this->Html->link('Add', array('controller'=>'settings', 'action'=>'add'));?>
<table>
    <tr>
        <th>id</th>
        <th>key</th>
        <th>value</th>
        <th>group</th>
        <th></th>
    </tr>
<?php foreach($this->data as $setting) { ?>
    <?php $setting = $setting['Setting']; ?>
    <tr>
        <td><?php echo $setting['id']; ?></td>
        <td><?php echo $setting['key']; ?></td>
        <td><?php echo $setting['value']; ?></td>
        <td><?php echo $setting['group']; ?></td>
        <td>
        <?php 
            echo $this->Html->link('edit', array('controller'=>'media', 'action'=>'edit', $setting['id']), $options=array());
            echo $this->Html->link('delete', array('controller'=>'media', 'action'=>'delete', $setting['id']), $options=array(), $confirmMessage = 'Delete '.$media['file_name'].'?');
        ?>
        </td>
    </tr>
<?php } ?>
</table>
