<?php echo $this->Html->link('Add', array('controller'=>'images', 'action'=>'add'));?>
<table>
    <tr>
        <th>id</th>
        <th>file name</th>
        <th>url</th>
        <th>created</th>
        <th></th>
    </tr>
<?php foreach($this->data as $media) { ?>
    <?php $media = $media['Media']; ?>
    <tr>
        <td><?php echo $media['id']; ?></td>
        <td><?php echo $media['file_name']; ?></td>
        <?php $url = '/'. $media['file_dir'].'/'.$media['file_name'];?>
        <td><?php echo $this->Html->link($url, $url, array('target'=>'_blank'));?></td>
        <td><?php echo $media['created']; ?></td>
        <td><?php echo $this->Html->link('delete', array('controller'=>'media', 'action'=>'delete', $media['id']), $options=array(), $confirmMessage = 'Delete '.$media['file_name'].'?');?></td>
    </tr>
<?php } ?>
</table>
