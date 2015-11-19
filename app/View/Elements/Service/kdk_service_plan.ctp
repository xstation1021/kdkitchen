<div>
	<div class="service_summary">

		<div class="service_header">料金 ： <?php echo $contents['service_price'];?><span class="price_per"><?php if(isset($contents['service_price_per']))echo '／'. $contents['service_price_per'];?></span><span class="attention"><?php if(isset( $contents['price_summary_warning']['price'])) echo '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;(※' . $contents['price_summary_warning']['price']['index'] . ')';?></span></div>
		<?php if(isset($contents['service_num_people'])){?>
		<div class="service_summary_container">
			<div class="service_summary_detail_title">催行人数</div>
			<div class="service_summary_detail_content"><?php echo $contents['service_num_people'];?></div>
		</div>
		<?php }?>
		<?php if(isset($contents['service_schedule_place'])){?>
		<div class="service_summary_container">
			<div class="service_summary_detail_title">場所と日程</div>
			<div class="service_summary_detail_content col-xs-12"><?php echo $contents['service_schedule_place'];?>1/10, 11@11:00-20:00 東京都新宿区@ガーデンキッチン<br>1/17, 18@11:00-20:00 大阪なんば@なんば駅徒歩圏内<span class="attention"><?php if(isset( $contents['price_summary_warning']['schedule_place'])) echo '(※' . $contents['price_summary_warning']['schedule_place']['index'] . ')';?></span></div>
		</div>
		<?php }?>
		<?php if(isset($contents['service_schedule'])){?>
		<div class="service_summary_container">
			<div class="service_summary_detail_title">場所と日程</div>
			<div class="service_summary_detail_content col-xs-12"><?php echo $contents['service_schedule'];?><span class="attention"><?php if(isset( $contents['price_summary_warning']['schedule'])) echo '(※' . $contents['price_summary_warning']['schedule']['index'] . ')';?></span></div>
		</div>
		<?php }?>
		<?php if(isset($contents['service_deadline'])){?>
		<div class="service_summary_container">
			<div class="service_summary_detail_title">申込み締切り</div>
			<div class="service_summary_detail_content col-xs-12"><?php echo $contents['service_deadline'];?><span class="attention"><?php if(isset( $contents['price_summary_warning']['schedule'])) echo '(※' . $contents['price_summary_warning']['schedule']['index'] . ')';?></span></div>
		</div>
		<?php }?>
		<?php if(isset($contents['service_place'])){?>
		<div class="service_summary_container">
			<div class="service_summary_detail_title">レッスンの場所</div>
			<div class="service_summary_detail_content col-xs-12"><?php echo $contents['service_place'];?><span class="attention"><?php if(isset( $contents['price_summary_warning']['place'])) echo '(※' . $contents['price_summary_warning']['place']['index'] . ')';?></span></div>
		</div>
		<?php }?>
		
		<?php if(isset($contents['service_required_items'])){?>
		<div class="service_summary_container">
			<div class="service_summary_detail_title">必要なもの</div>
			<div class="service_summary_detail_content col-xs-12"><?php echo $contents['service_required_items'];?><span class="attention"><?php if(isset( $contents['price_summary_warning']['required_items2'])) echo '*' . $contents['price_summary_warning']['required_items2']['index'];?></span></div>
		</div>
		<?php }?>
		
<div class='clear' style="height:20px;"></div>
		<?php 
		  if(!empty($contents['price_summary_warning'])){
		?>
		<ul class="attention_ul">
		      <?php foreach($contents['price_summary_warning'] as $item){?>
		          <li>
		          
		              <?php 
		                  echo '<span class="attention2">*'. $item['index'] . '</span><span class="attension2_detail">' . $item['value'] . '</span>';
		              ?>
		          </li>
		      <?php 
		          }
		      ?> 
		</ul>
		<?php 
		}
		?>
	</div>

</div>

<style>
.attention_ul, .attention_ul li{
    margin:0;
    height: 16px;
}
.price_per {
    font-size:14px;
    font-family: "NotoSans-Light", sans-serif;
}
.attention{
    padding-left:10px;
    font-size:14px;
    color:#ffbf00;
}
.attension2_detail{
    padding-left:10px;
    font-family: "NotoSans-Light", sans-serif;
    font-size:12px;
}
.attention2{
 font-size:12px;
    color:#ffbf00;
}
.service_summary {
	margin-top: 30px;
	margin: auto;
	max-width: 540px;
}

.service_summary_container{
    padding-top:10px;
    padding-bottom:10px;
    clear:both;
}

.service_summary .service_header {
    padding-top:5px;
    padding-bottom:5px;
	border: 1px solid #ffbf00;
	margin-bottom: 20px;
	text-align: center;
	font-size:21px;
	margin-top:2px;
	margin-left:3px;
	margin-right:3px;
}

.service_summary_detail_title {
    width:120px;
	text-align: center;
	border: 1px solid black;
	float:left;
}

.service_summary_detail_content {
    padding-left:20px;
    line-height:28px;
	font-size: 14px;
	font-family: "NotoSans-Light", sans-serif;
	min-width:300px;
	max-width:400px;
	float:left;
}
</style>