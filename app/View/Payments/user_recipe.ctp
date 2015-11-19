<div class="one-third">
<?php 
    if(!empty($user_list)){
    	?>
    	<table>
    	   <thead>
    	       <tr>
    	           <th>ユーザーネーム</th>
    	           <th>Display Name</th>
    	           <th>Created Date</th>
    	           <th></th>
    	       </tr>
    	   </thead>
    	   <tbody>
    	<?php 
    	foreach($user_list as $item){
            $user = $item['User'];
            
            ?>
            <tr>
                <td><?php echo $user['username']?></td>
                <td><?php echo $user['display_name']?></td>
                <td><?php $date=new DateTime($user['created']); echo $date->format('Y-m-d')?></td>
                <td><?php 
                    echo $this->Html->link('View Transaction', array('controller'=>'payments', 'action'=>'view_transaction', $user['id']));?>
                 </td>
            </tr>
            <?php 
        }
    	?>
        </tbody>
    	</table>
<?php 
    }
?>
</div>