
<div class="recipe_item">

	<div class="recipe_image_holder">
		   <?php if($new_recipe == true){?>
	       <div class="new_recipe_tag"><strong>New</strong></div>
	   <?php }?>
	   <img src="/uploads/recipe/<?php echo $hash . "/disp/recipe" . $id . ".jpg";?>" width="270" height="180">

	</div>
    <div class="recipe_item_text">
        <div style="padding:0px 13px 0px 13px;height:104px;">
            <div class="recipe_item_title"><?php echo $title; ?></div>
            <div class="recipe_item_title_eng"><?php echo $title_eng; ?></div>
            <div class="recipe_item_summary_text"><?php echo $summary; ?></div>
        </div>
        <div class="recipe_item_date">
        <?php
            $publish_date_first_date_month = new DateTime($publish_date);
            $publish_date_first_date_month->modify('first day of this month');
            $publish_date_formatted = $publish_date_first_date_month->format("Y-m");
            echo $publish_date_formatted;
            echo "   " . $category;
        ?>
        </div>
        <?php if($is_admin == true || !empty($recipe_transaction['id'])){
            $url = 'http://vimeo.com/api/oembed.json?url=http%3A//vimeo.com/'. $video_url;
            $curl = curl_init($url);
            curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
            curl_setopt($curl, CURLOPT_TIMEOUT, 30);
            curl_setopt($curl, CURLOPT_FOLLOWLOCATION, 1);
            $video_exist = curl_exec($curl);
            curl_close($curl);
            ?>
            <?php if($video_exist != '404 Not Found' && $recipe_transaction['recipe_access_level'] == 2 || $is_admin == true){?>
            <div class="recipe_item_icon video_icon">
                <a class="popup-vimeo" href="https://vimeo.com/<?php echo $video_url?>">
                    <?php echo $this->Html->image('recipe/btn_movie_gray.png', array('width'=>'30px', 'height' => '30px'));?>
                </a>
            </div>
            <?php }?>
            <?php 
            if(file_exists("uploads/recipe/$hash/recipe" . $id. ".jpg")){?>
            <div class="recipe_item_icon pic_icon">
                <a href="/recipes/downloadimage/<?php echo $id;?>">
                    <?php echo $this->Html->image('recipe/btn_pic_gray.png', array('width'=>'30px', 'height' => '30px'));?>
                </a>
            </div>
            <?php }?>
 
            <?php 
            if(file_exists("uploads/recipe/$hash/recipe" . $id. ".pdf")){?>
            <div class="recipe_item_icon pdf_icon">
                <a target="_blank" href="/recipes/downloadfile/<?php echo $id;?>">
                    <?php echo $this->Html->image('recipe/btn_PDF_gray.png', array('width'=>'30px', 'height' => '30px'));?>
                </a>
            </div>
            <?php }?>
        <?php } else {
            if($subscribed == true){

echo $this->Html->link('購入する', array(
        'controller' => 'payments',
        'action' => 'addcart',
       
        '?' => array('id' => $id, 'type' => 'recipe'),
        
),
array('class' => 'purchase_btn')
);

         }}?>
    </div>
</div>
