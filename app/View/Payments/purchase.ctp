<?php 
    echo $this->Html->css('payment');
?>
<style>
.img_td {
	border: 1px solid black;
	width: 100px;
	border-collapse: collapse;
}

#shopping_list {
	border: 1px solid black;
	width: 450px;
	border-collapse: collapse;
}

.title_td {
	border: 1px solid black;
	padding-left: 10px;
	border-collapse: collapse;
}

.delete_td {
	border: 1px solid black;
	width: 33px;
	border-collapse: collapse;
}
</style>

<div class="container-slim">
	<div class="page-heading">
		<h1><?php echo $title;?></h1>
		<div class="dot-container">
			<div class="dot"></div>
			<div class="dot"></div>
			<div class="dot"></div>
		</div>
	</div>
    
     <?php
    if(is_array($data) && !empty($data)){
?>
    <div class="lhs">
		<table id="shopping_list">
    <?php
    foreach($data as $recipe):?>
        <tr>
				<td class="img_td"><img src="<?php echo $recipe['image'];?> "
					width=100px"></td>
				<td class="title_td"><?php echo $recipe['name']?></td>
				<td class="title_td">$<?php echo number_format($recipe_price,2);?></td>
				
				<td class="delete_td"><a
					href="remove_from_cart<?php echo "?id=" . $recipe['id'] . "&type=" . $recipe['type']?>">削除</a></td>
			</tr>
        <?php endforeach;?>
    </table>
    <p>合計：$<?php echo number_format( count($data) * $recipe_price,2);?></p>
<a class="btn" href="/recipes/index">買い物に戻る</a>
	</div>

	<div class="rhs">
	
		<p><strong>支払方法をお選びください</strong></p>
		<p>
			クレジットカードで支払う <br>
			<a href="/payments/paypal/creditcard"> <img alt="" title=""
				src="http://www.credit-card-logos.com/images/multiple_credit-card-logos-1/paypal_mc_visa_amex_disc_210x80.gif"
				width="210" height="80" border="0" />
			</a>
		
		
		<p>
			Paypal にログインする <br>
			<a href="/payments/paypal/paypal"> <img
				src="https://www.paypalobjects.com/webstatic/en_US/i/buttons/PP_logo_h_200x51.png"
				alt="PayPal" />
			</a>
	
	</div>
<?php } else {?>

<p>ショッピンングカートが空です。</p>


<?php }?>
</div>