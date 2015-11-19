


<div>
<?php echo  $this->Html->image('kdservice/kdktraining/arrow_s2.png', array('style' => 'position:relative;'))?>
	<span class="kdservice_separator_title">
	
	<?php $item = $contents[$section.'_details']; echo $item['title']?></span>
</div>
<div class="kdksertvice_detail_container" style="border-top:1px solid black;">
<?php

if ($item ['type'] == '4items') {
    foreach ( $item ['content'] as $content ) {
        ?>
    <div class="kdkservice_detail_four_items col-md-3">
		<h3>
            <?php if(isset($content['orange_title'])):?><span
				class="orange_title"><?php echo $content['orange_title']; endif;?></span>
            <?php if(isset($content['black_title'])):?><span
				class="black_title"><?php echo $content['black_title']; endif;?></span>
		</h3>
		<p>
            <?php echo $content['detail_content']?>
        </p>
	</div>
<?php
    }
} elseif ($item ['type'] == '2items') {
    foreach ( $item ['content'] as $content ) {
        ?>
    <div class="kdkservice_detail_two_items col-md-6">
		<h3>
            <?php if(isset($content['black_title'])):?><span
				class="black_title"><?php echo $content['black_title']; endif;?></span>
		</h3>
		<p>
            <?php echo $content['detail_content']?>
        </p>
	</div>
<?php
    }
}elseif ($item ['type'] == '3items') {
    foreach ( $item ['content'] as $content ) {
        ?>
    <div class="kdkservice_detail_three_items col-md-4">
		<h3>
            <?php if(isset($content['black_title'])):?><span
				class="black_title"><?php echo $content['black_title']; endif;?></span>
		</h3>
		<p>
            <?php echo $content['detail_content']?>
        </p>
	</div>
<?php
    }
}  

elseif ($item ['type'] == '1line') {
    
    foreach ( $item ['content'] as $content ) {
        ?>
<div class="kdkservice_detail_one">
		<p>
			<span class="orange"><?php echo $content['detail_content_orange']?></span>&nbsp;&nbsp;<span class="black"><?php echo $content['detail_content_black'];?></span>
		</p>
	</div>
<?php
    }
    ?>
        <?php
} elseif ($item ['type'] == '2lines') {
    
    foreach ( $item ['content'] as $content ) {
        ?>
<div class="kdkservice_detail_two">
		<p>
			<span class="orange"><?php echo $content['detail_content_orange']?></span><br><span class="black"><?php echo $content['detail_content_black'];?></span>
		</p>
	</div> 
<?php
    }
    ?>
        <?php
}
?>
<div class="clear"></div>

</div>
<div style="text-align:center; margin-bottom:10px;margin-top:30px;">
<?php 
    if($section !='mission'){
        echo $this->Html->image('kdservice/kdktraining/arrow.png');
    }
?>
</div>
