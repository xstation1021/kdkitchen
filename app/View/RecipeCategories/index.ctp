<?php echo $this->Html->link('Add', array('controller'=>'recipecategories', 'action'=>'add'));?>
 | 
<?php echo $this->Html->link('Order', array('controller'=>'recipecategories', 'action'=>'order'));?>

<table>
    <tr>
        <th>id</th>
        <th>Recipe Category Name</th>
        <th>created</th>
        <th>modified</th>
        <th></th>
    </tr>
<?php foreach($this->data as $recipecategory) { ?>


    <?php $recipecategory = $recipecategory['RecipeCategory']; ?>
    <tr>
        <td><?php echo $recipecategory['id']; ?></td>
        <td><?php echo $this->Html->link($recipecategory['category_name'], array('controller'=>'recipecategories', 'action'=>'edit', $recipecategory['id'])); ?></td>
        <td><?php echo $recipecategory['created']; ?></td>
        <td><?php echo $recipecategory['modified']; ?></td>
        <td>
        <?php //echo $this->Html->link('delete', 
               // array('controller'=>'users', 'action'=>'delete', $recipecategory['id']), 
              //  $options=array(), $confirmMessage = 'Delete '.$recipecategory['id'].'?');?>
              
        <?php 
            if($logged_user['is_admin'] == 1){
                echo $this->Form->create('RecipeCategory', array('action'=>'delete')); ?>
                
                <?php echo $this->Form->input('RecipeCategory.id', array('value'=>$recipecategory['id']));
                ?>
                  
                  <?php echo $this->Form->submit('Delete', array('onclick'=>'return confirm("Delete?")', 'class'=>'dlt_submit'))?>
                  <?php echo $this->Form->end();  
            }
            ?>        
        </td>
    </tr>
<?php } ?>
</table>
