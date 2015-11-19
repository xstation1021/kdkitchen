 <?php 
    echo $this->Html->script('jquery-ui.min');
    echo $this->Html->css('jquery-ui.min');
?>

<script>
$(function() {
$( "#UserSubscriptionFromDate" ).datepicker({
defaultDate: "+1w",
changeMonth: true,
numberOfMonths: 1,
minDate: new Date("<?php echo date("Y/m/01");?>"),
onClose: function( selectedDate ) {
$( "#UserSubscriptionToDate" ).datepicker( "option", "minDate", selectedDate );
}
});
$( "#UserSubscriptionToDate" ).datepicker({
defaultDate: "+1w",
changeMonth: true,
numberOfMonths: 1,
onClose: function( selectedDate ) {
$( "#UserSubscriptionFromDate" ).datepicker( "option", "maxDate", selectedDate );
}
});
});

$(document).ready(function(){
	$('#add_btn').click(function(){
		$('#UserSubscriptionLevel').val(1);
		$('#UserSubscriptionSubscriptionEditForm').find('input').val("");
		}
	);
	
});
</script>

<?php
$user = $this->data;

?>

<?php 
echo "<h3>現在のデータ</h3>";
echo "Status : " . ($subscribed?"Subscribed":"Not Subscribed");
    if(!empty($subscribed )){
    	echo "<p>Level : " .  $subscribed['level'] . "</p>";
        echo "<p>From Date : " .  $subscribed['from_date'] . "</p>";
        echo "<p>To Date : " .  $subscribed['to_date'] . "</p>";
    }
    echo $this->Html->link('Add', array(
                'controller'=>'users', 
                'action'=>'subscription_add', $user_id));?>
    
<?php
if($subscribed == true){
    echo "<div id='updateform' style='display:none;'>";
	echo $this->Form->create('UserSubscription', array(
        'url' => array('controller' => 'users', 'action' => 'subscription_edit', $user_id)
    ));
    echo  $this->Form->input('id', array('type'=>"hidden",
    
    ));
    echo  $this->Form->input('level', array(
            'label' => 'Level: ',
            'options' => array(1 => 1, 2 => 2),
    ));
    echo  $this->Form->input('from_date', array('type'=>"text",
    
    ));
    
    echo  $this->Form->input('to_date', array(
            'type'=>"text",
    ));
    
    echo $this->Form->button('更新する', array('type'=>'submit', 'id'=>'submit_btn', 'class'=>'btn btn-submit'));
    echo $this->Form->end();
    echo '</div>';
    
    echo "<div id='newform' style='display:none;'>";
    echo $this->Form->create('UserSubscription', array(
            'url' => array('controller' => 'users', 'action' => 'subscription_edit', $user_id)
    ));
    
    echo  $this->Form->input('level', array(
            'label' => 'Level: ',
            'options' => array(1 => 1, 2 => 2),
    ));
    echo  $this->Form->input('from_date', array('type'=>"text",
    
    ));
    
    echo  $this->Form->input('to_date', array(
            'type'=>"text",
    ));
    
    echo $this->Form->button('更新する', array('type'=>'submit', 'id'=>'submit_btn', 'class'=>'btn btn-submit'));
    echo $this->Form->end();
    echo '</div>';
}


?>

<p>History:</p>

<table>
    <tr>
        <th>Level</th>
        <th>Start</th>
        <th>End</th>
        <th>Status</th>
        <th>Edit</th>
    </tr>
<?php foreach($list as $item) { ?>
    <tr>
        <td><?php echo $item['UserSubscription']['level']; ?></td>
        <td><?php $from_date = new DateTime($item['UserSubscription']['from_date']); 
        echo $from_date->format("m/d/Y"); ?></td>
        <td><?php 
        if($item['UserSubscription']['to_date']==null){
            echo "not set";
        }
        else{ $to_date = new DateTime($item['UserSubscription']['to_date']);
            echo $to_date->format("m/d/Y");
        } ?></td>
        <td>
            <?php if(!empty($subscribed) && (int)$item['UserSubscription']['id'] == (int)$subscribed['id']){echo "Active";}else{echo "Inactive";}?>
        </td>
        <td><?php echo $this->Html->link('Edit', array(
                'controller'=>'users', 
                'action'=>'subscription_edit', $item['UserSubscription']['id']));?>
        </td>
        
    </tr>
<?php } ?>
</table>
    

