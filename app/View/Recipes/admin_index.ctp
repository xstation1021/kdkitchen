<style>
    table {
    border-collapse: collapse;
}

table, th, td {
    border: 1px solid black;
}


</style>

<strong>レシピトップ部分一覧</strong><br>
<div style="border-bottom:2px solid Red;margin-bottom:10px; padding-bottom:10px;">
    <?php echo $this->Html->link('Add', array('controller'=>'recipes', 'action'=>'admin_top_add'));?>
    <br>
    <?php 
        if(count($top_list) > 0){ 
    ?>
    <table>
        <tr>
            <th>id</th><th>コンテンツ</th><th>公開月</th><th></th>
        </tr>
    
    
    <?php
            foreach($top_list as $item){
    ?>
        
        <tr>
            <td><?php echo $item['RecipeSummary']['id']; ?></td>
            <td><?php echo $item['RecipeSummary']['content']; ?></td>
            <td><nobr><?php $date = new DateTime($item['RecipeSummary']['publish_month']);echo $date->format("Y") . "年" . $date->format('m') . "月"; ?></nobr></td>
            <td><?php echo $this->Html->link('Edit', array('controller'=>'Recipes', 'action'=>'admin_top_edit', $item['RecipeSummary']['id']), $options=array());?>
            <?php echo $this->Html->link('Preview', array('controller'=>'Recipes', 'action'=>'admin_top_preview', $item['RecipeSummary']['id']), $options=array());?></td>
        </tr>
    <?php
        } 
    ?>
    </table>
    <?php         
        } else {
            echo "まだ何もありません。<br>";
        }
    ?>
    
</div>


<strong>レシピ一覧</strong><br>
<?php echo $this->Html->link('Add', array('controller'=>'recipes', 'action'=>'add'));?>
<?php echo " ";?>


<table>
    <tr>
        <th>id</th>
        <th>Title</th>
        <th>Category</th>
        <th>publish date</th>
        <th>Is Public?</th>
        <th>created</th>
        <th>modified</th>
        <th></th>
    </tr>
<?php foreach($this->data as $data) { ?>


    <?php 
    
    
        $recipe = $data['Recipe'];
        $recipe_category = $data['RecipeCategory'];
        $recipe_summary = $data['RecipeSummary'];
    
    ?>
    <tr>
        <td><?php echo $recipe['id']; ?></td>
        <td><?php echo $this->Html->link($recipe['title'], array('controller'=>'Recipes', 'action'=>'edit', $recipe['id']), $options=array());?></td>
        <td><?php echo $recipe_category['category_name']; ?></td>
        
       
        <td><?php echo $recipe_summary['publish_month']; ?></td>
        <td><?php if($recipe['is_public'] == 1)echo "公開中";else echo "非公開"; ?></td>
        <td><?php echo $recipe['created']; ?></td>
        <td><?php echo $recipe['modified']; ?></td>
        
        <td>
        <?php // echo $this->Html->link('delete', array('controller'=>'Recipes', 'action'=>'delete', $recipe['id']), $options=array(), $confirmMessage = 'Delete '.$recipe['id'].'?'); ?>
        <?php echo $this->Form->create(array('action'=>'delete')); ?>
        <?php echo $this->Form->input('Recipe.id', array('value'=>$recipe['id']));?>
        <?php $confirmMessage = $recipe['title'] . "消去しますか?"; echo $this->Form->submit('Delete', array('onclick'=>"return confirm('$confirmMessage')",'class' => 'dlt_submit'))?>
        <?php echo $this->Form->end(); ?>

        </td>
    </tr>
<?php } ?>
</table>
