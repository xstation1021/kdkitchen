<style>
    #trans_table, #trans_table th, #trans_table td{
        border:1px solid black;
        border-collapse:collapse;
    }
    
    #trans_table th, #trans_table td{
        min-width:125px;
        max-width:205px;
        text-align:center;
    }
    #trans_table{
      margin-left:auto; 
    margin-right:auto;
    }
</style>
<h1>Transaction History</h1>
<h3><?php echo $user['User']['display_name']?></h3>
<?php 
if($logged_user['is_admin'] == 1){
echo $this->Html->link('Add', array('controller'=>'payments', 'action'=>'add_transaction', $user['User']['id']));
} ?>
<table id="trans_table">
    <tr>
        <th>日付</th>
        <th>品名</th>
        <th>タイプ</th>
        <th>カテゴリー</th>
        <th>価格</th>

        <th>アクセス</th>
         <?php 
        if($logged_user['is_admin'] == 1){
        	echo " <th>Note</th><th>Action</th>";
        }
        ?>
    </tr>
    <?php 
        foreach($list as $item){
    ?>       
        <tr>
            <td><?php $date = new DateTime($item['Payment']['display_from']); echo $date->format("Y-m-d")?></td>
            <td><?php echo $item['Recipe']['title']?></td>
            <td><?php if($item['Payment']['trans_type'] == 'purchased')echo '購入'; elseif($item['Payment']['trans_type'] == 'adjustment')echo 'ギフト';elseif($item['Payment']['trans_type'] == 'subscription')echo '購読';?></td>
          　<td><?php if(strtolower($item['Payment']['category']) == 'recipe')echo 'レシピ'; ?></td>
            <td><?php echo $item['Payment']['amount']
           . ' ' ;
            if(!empty($item['Payment']['amount']) && $item['Payment']['currency'] == "JPY"){
            	echo "円";
            }
            
            ?></td>
            <td><?php 
                if($item['Payment']['recipe_access_level']==1){
                    echo "レシピ, 写真";
                } else if($item['Payment']['recipe_access_level']==2){
                	echo "レシピ, 写真, ビデオ";
                }
                else {
                	echo "";
                }
                ?></td>
            
            <?php 
            if($logged_user['is_admin'] == 1){
                echo "<td>". $item['Payment']['note'] . "</td>";
                echo "<td>";
                echo $this->Html->link('Edit', array('controller'=>'payments', 'action'=>'edit_transaction', $item['Payment']['id'] ))
                . " "  ;

                echo $this->Form->create('Payment', array('action'=>'delete')); ?>
                        <?php echo $this->Form->input('Payment.id', array('value'=>$item['Payment']['id']));?>
                        
                                <?php $confirmMessage = $item['Recipe']['title'] . "消去しますか?"; echo $this->Form->submit('Delete', array('onclick'=>"return confirm('$confirmMessage')",'class' => 'dlt_submit'))?>
                        
                        
                        <?php // $this->Form->submit('Delete', array('class' => 'dlt_submit'))?>
                        <?php echo $this->Form->end(); 
                    
                echo "</td>";
                }
            ?>
        </tr> 
    <?php
        }
    ?>

</table>