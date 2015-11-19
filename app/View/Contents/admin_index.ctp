<?php echo $this->Html->link('Add', array('controller'=>'contents', 'action'=>'add'));?>
<style>
    table, th, td{
        border:1px solid black;
        
    }
</style>
<table>
    <tr>
        <th>id</th>
        <th>Key</th>
        <th>Value</th>
        <th>Description</th>
        <th>DisplayUntil</th>
       
    </tr>
<?php foreach($this->data as $content) { ?>


    <?php $content = $content['Content']; ?>
    <tr>
        <td><?php echo $content['id']; ?></td>
        <td><?php echo $this->Html->link($content['key'], array('controller'=>'contents', 'action'=>'edit', $content['id']), $options=array());?></td>
        <td><?php echo $content['value'];?></td>
        <td><?php echo $content['description'];?></td>
        <td><?php echo $content['display_until']; ?></td>
    </tr>
<?php } ?>
</table>
