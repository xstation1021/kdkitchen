
<table>
    <tr>
        <th>id</th>
        <th>username</th>
        <th>display name</th>
        <th>status</th>
        <th>action</th>
    </tr>
<?php foreach($this->data as $user) { ?>
    <tr>
        <td><?php echo $user['User']['id']; ?></td>
        <td><?php echo $user['User']['username']; ?></td>
        <td><?php echo $user['User']['display_name']; ?></td>
        <td><?php if (isset($user['UserSubscription']) && count($user['UserSubscription']) > 0){
        	echo 'subscribed';
        }
        else{
        	echo 'not subscribed';
        } ?>
        </td>
        <td><?php if(!$user['User']['is_admin']) echo $this->Html->link('edit', array('controller'=>'users', 'action'=>'subscription_details', $user['User']['id']));?>
    </tr>
<?php } ?>
</table>
