<script>
function viewMessage(id) {
    window.location = '/messages/view/'+id;
}
</script>
<table class="store-list">
    <tr>
        <th></th>
        <th>From</th>
        <th>Store</th>
        <th>Item</th>
        <th>Time</th>
    </tr>
    <?php foreach ($data['Message'] as $msg): ?>
        <?php
            $sent = True;
            if($msg['Message']['receiver_id'] == $logged_user['id']) {
                $sent = False;
            }
        ?>
    <tr onclick="viewMessage(<?php echo $msg['Message']['id'];?>);">
        <td>
            <?php if($sent) {?>
                &#8617;
            <?php } ?>
          
        </td>
        <td class="itemcount-cell">
            <?php echo $msg['Message']['sender_email'];?>
        </td>
        <td class="name-cell">
            <?php echo $msg['Store']['name'];?>
        </td>
        <td class="location-cell">
            <?php echo $msg['Item']['name'];?>
        </td>
        <td class="location-cell">
            <?php echo $msg['Message']['created'];?>
        </td>
    </tr>
    <?php endforeach; ?>
</table>

<?php echo $this->element('paginator');?>
