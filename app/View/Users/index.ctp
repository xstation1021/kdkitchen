<?php echo $this->Html->link('Add', array('controller'=>'users', 'action'=>'add'));?>
<?php echo " ";?>
<?php echo $this->Html->link('Order', array('controller'=>'users', 'action'=>'order'));?>
<table>
    <tr>
        <th>id</th>
        <th>username</th>
        <th>display name</th>
        <th>created</th>
        <th></th>
    </tr>
<?php foreach($this->data as $user) { ?>
    <?php $user = $user['User']; ?>
    <tr>
        <td><?php echo $user['id']; ?></td>
        <td><?php echo $user['username']; ?></td>
        <td><?php echo $user['display_name']; ?></td>
        <td><?php echo $user['created']; ?></td>
        <td><?php if(!$user['is_admin']) echo $this->Html->link('delete', array('controller'=>'users', 'action'=>'delete', $user['id']), $options=array(), $confirmMessage = 'Delete '.$user['username'].'?');?></td>
    </tr>
<?php } ?>
</table>
