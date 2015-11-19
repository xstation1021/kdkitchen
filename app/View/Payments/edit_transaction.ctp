    <?php
    echo $this->Form->create('Payment', array('method'=>'post', 'type'=>'file'));
    ?>
    <?php 
    echo "<p>". 
            $this->Form->input('item_id', array(
            'label' => 'Recipe: ',
            'options' => $recipe_list,
    ));
    ?>
    <?php 
    echo "<p>". 
            $this->Form->input('trans_type', array(
            'label' => 'Payment: ',
            'options' => $transaction_type_list,
    ));
    ?>    
    
    <?php 
    $style = "";
    if(!isset ($this->data['Payment']['trans_type']) || ($this->data['Payment']['trans_type']=='adjustment')){
    	$style="display:none";
    }
    echo  "<p>". $this->Form->input('recipe_access_level', array(
            'label' => 'Level: ',
            'options' => array(1 => 1, 2 => 2)));
    echo "<div id='payment' style='" . $style .   "'>";
    echo "<p>". $this->Form->input('amount', array('type'=>'text', 'label'=>'Amount: '));
    echo "</div>";
    ?>
    
    <?php echo "<p>". $this->Form->input('note', array('type'=>'textarea', 'label'=>'Note: '));  ?>
    
    <?php echo $this->Form->submit('保存する', array('class'=>'btn btn-save')); ?>
    <?php echo $this->Form->end(); ?>
    
    <!-- foreach($list as $item) -->
    <script>
    $(document).ready(function(){
        $('#PaymentTransType').change(function(){
            var value = $(this).val();
            if(value == 'purchased'){
                $('#payment').show();
            }
            else{
                $('#payment').hide();
                $('#PaymentAmount').val("");
                }
        });
        })
    </script>