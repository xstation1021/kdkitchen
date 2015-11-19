<?php 
    echo $this->Html->css('payment');
?>

<div class="container-slim">
    <div class="page-heading">
        <h1><?php echo $title;?></h1>
        <div class="dot-container">
            <div class="dot"></div>
            <div class="dot"></div>
            <div class="dot"></div>
        </div>
    </div>
    <div class="container-slim profile">
    
            <div class="lhs">
		<table id="shopping_list" style="width:100%;">
    <?php
    foreach($data as $recipe):?>
        <tr>
				<td class="img_td"><img src="<?php echo $recipe['image'];?> "
					width=100px></td>
				<td class="title_td"><?php echo $recipe['name']?></td>
			</tr>
        <?php endforeach;?>
    </table>

	</div>
    
        <div class="rhs">
            <?php
            echo $this->Form->create();
            ?>
    Payment Review <br>
    <table class="payment-review" align="center">
        <tr>
            <th>お名前</th><td><?php echo $details['LASTNAME'] . " " . $details['FIRSTNAME']?></td>
        </tr>
        <tr>
            <th>購入レシピ</th><td><?php echo $details['L_NAME0'] ?></td>
        </tr>
        <tr>
        <th>値段</th>　<td><?php echo $details['ITEMAMT']?>  </td>
        </tr>
        <tr><th>税金</th><td><?php echo $details['TAXAMT']?></td></tr>
        
     　　<tr class="order-total">
            <th>合計</th><td><?php echo $details['AMT'] ?></td>
        </tr>
    </table>
         
    <button class="btn btn-save" name="submit" type="submit" value="purchase">購入する</button>
    <button class="btn btn-save" name="submit" type="submit" value="cancel">キャンセルする</button>
    <?php echo $this->Form->end(); ?>
         </div> 
    
    

    </div>
</div>
