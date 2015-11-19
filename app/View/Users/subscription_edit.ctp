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
$subscribed = false;
$toDateisNull = false;

if(isset($user['UserSubscription'])){
	$subscribed = true;
	if(empty($user['UserSubscription']['to_date'])){
		$toDateisNull = true;
	}
	$id = $user['UserSubscription']['id'];
	$user_id = $user['UserSubscription']['user_id'];
}
?>


    
<?php
echo "<h3>$title</h3>";
	echo $this->Form->create('UserSubscription', array(
        'url' => array('controller' => 'users', 'action' => $action, $jump_id)
    ));
    echo  $this->Form->input('id', array('type'=>"hidden",
    
    ));

echo  $this->Form->input('user_id', array('type'=>"hidden",

));
    echo  $this->Form->input('level', array(
            'label' => 'Level: ',
            'options' => array(1 =>1, 2 => 2),
    ));
    echo  $this->Form->input('from_date', array('type'=>"text",
    
    ));
    
    echo  $this->Form->input('to_date', array(
            'type'=>"text",
    ));
    
    echo $this->Form->button('更新する', array('type'=>'submit', 'id'=>'submit_btn', 'class'=>'btn btn-submit'));
    echo $this->Form->end();


?>
