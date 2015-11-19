<?php echo $this->Html->link('Add', array('controller'=>'questions', 'action'=>'add'));?>
<?php echo " ";?>
<?php echo $this->Html->link('Order', array('controller'=>'questions', 'action'=>'order'));?>
<table>
    <tr>
        <th>id</th>
        <th>Title</th>
        <th>Is Public</th>
        <th>created</th>
        <th>modified</th>
        <th></th>
    </tr>
<?php foreach($this->data as $question) { ?>


    <?php $question = $question['Question']; ?>
    <tr>
        <td><?php echo $question['id']; ?></td>
        <td><?php echo $this->Html->link($question['title'], array('controller'=>'questions', 'action'=>'edit', $question['id']), $options=array());?></td>
        <td><?php if($question['is_public'] == 1)echo "公開中";else echo "非公開"; ?></td>
        <td><?php echo $question['created']; ?></td>
        <td><?php echo $question['modified']; ?></td>
        <td><?php echo $this->Html->link('delete', array('controller'=>'questions', 'action'=>'delete', $question['id']), $options=array(), $confirmMessage = 'Delete '.$question['id'].'?');?></td>
    </tr>
<?php } ?>
</table>
