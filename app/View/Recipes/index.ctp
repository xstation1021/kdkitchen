 <style>
  .ui-tooltip-content {
    font-size:10px;
  }
  </style>
    
    <?php
    echo $this->Html->script('jquery-ui.min');
    echo $this->Html->css('jquery-ui.min');
        
        $recipe_date = new DateTime ( $summary_recipes [0]['RecipeSummary'] ['publish_month'] );
        $is_admin = $logged_user ['is_admin'];
        $top_section_date = "<span class='font-light' style='font-size:72px;'>" . $recipe_date->format ( "Y" ) . "," . $recipe_date->format ( "m" ) . " </span><span class='font-black' style='font-size: 72px;'>" . $recipe_date->format ( "F" ) . "</span>";
            ?>
            <div class="container">
            <?php 
            echo $this->Html->css ( 'recipe_index' );
            ?>

    <div class="page-heading">
		<h1><?php echo $title;?></h1>
		<div class="dot-container">
			<div class="dot"></div>
			<div class="dot"></div>
			<div class="dot"></div>
		</div>
	</div>

	<div id="top_section" style="background:transparent  url(/uploads/recipesummary/<?php echo $summary_recipes[0]['RecipeSummary']['hash'] . "/recipesummary" . $summary_recipes[0]['RecipeSummary']['id'] . ".jpg";?>) no-repeat;) no-repeat;">
		<div id="recipe_summary_date"><?php echo $top_section_date;?></div>
		<div id="recipe_list">
            <?php
            $new_recipe = true;
            for($i = 0; $i < 3; $i ++) {
                if (isset ( $summary_recipes [$i] )) {
                    echo $this->element ( 'Recipes/recipe_item', array (
                            "hash" => $summary_recipes [$i] ['Recipe'] ['hash'],
                            "id" => $summary_recipes [$i] ['Recipe'] ['id'],
                            "video_url" => $summary_recipes [$i] ['Recipe'] ['video_url'],
                            "summary" => $summary_recipes [$i] ['Recipe'] ['summary'],
                            "category" => $summary_recipes [$i] ['RecipeCategory'] ['category_name'],
                            "title" => $summary_recipes [$i] ['Recipe'] ['title'],
                            "title_eng" => $summary_recipes [$i] ['Recipe'] ['title_eng'],
                            "publish_date" => $summary_recipes [$i] ['RecipeSummary'] ['publish_month'],
                            "new_recipe" => $new_recipe,
                            "recipe_transaction" => $summary_recipes [$i] ['Payment'],
                            "is_admin" => $is_admin,
                            'subscribed' => $subscribed
                    ) );
                } else {
                    echo $this->element ( 'Recipes/recipe_item_comingsoon' );
                }
            }
            ?>
            <div style="clear: both;"></div>
		</div>

		<div id="recipe_summary_content">

			<div style="float: left;"><img src="/uploads/recipesummary/<?php echo $summary_recipes[0]['RecipeSummary']['hash'] . "/chef.jpg";?>" height="180" width="270" alt="chef"></div>

			<div id="recipe_summary_chef">
				<span class="font-light">CHEF:</span><span class="font-black"><?php echo $summary_recipes [0]['RecipeSummary'] ['chef'];?></span>
			</div>

			<div id="recipe_summary_summary" class="font-medium">
                <?php
            echo $summary_recipes [0]['RecipeSummary'] ['content']?>
            </div>


		</div>
	</div>
<div style="clear:both;"></div>
	<div id="recipe_display">

		<div style="font-size: 72px; line-height: 55px; float: left;"
			class="font-light">RECIPE</div>
		<div id="recipe_display_image">
            <?php
            if ($recipeListAll == false) {
                echo $this->Html->image ( 'recipe/accessible_recipe.png', array (
                        'alt' => 'All Recipes' 
                ) );
            } else {
                echo $this->Html->image ( 'recipe/all_recipes.png', array (
                        'alt' => 'All Recipes' 
                ) );
            }
            
            ?> 
        </div>
                <?php
            
        if ($recipeListAll == false) {
                echo $this->element ( 'Recipes/view_all' );
            } else {
                echo $this->element ( 'Recipes/view_accessible' );
            }
            ?>
		<div style="clear: both;"></div>
			<div style="margin: 30px 0px 30px 0px;">
		<ul class="category-list">
			<li><?php
			         $all_link = 'Javascript:void(0)';
			         $all_style = "background-color:#ffbf00;color:white;";
			         
			         if($category !== null){
			         	$all_link = '/recipes/index';
			         	$all_style = "background-color:white;color:black;";
			         }
			         echo $this->Html->link('All', $all_link, array('class'=>'button', 'style'=>$all_style));?></li>
                <?php
            foreach ( $recipeCategories as $recipeCategory ) {
               
                $item = $recipeCategory ['RecipeCategory'];
                $id = $item['id'];
                $item_link = "/find/recipe/$id";
                $item_style = "background-color:white;color:black;";
                if($category == $id){
                	$item_link = 'Javascript:void(0)';
                    $item_style = "background-color:#ffbf00;color:white;";
                }

                ?>  
                    <li><?php
                    
                echo $this->Html->link ( $item ['category_name'], "$item_link", array (
                        'class' => 'button',
                        'style' => $item_style 
                ) );
                ?>
                    </li>
                <?php
            }
            ?>
        </ul>
	</div>
	</div>


	 <div id="item-list" style="padding-left: 35px;">
        <?php 
            $num = 0; 
            $first_recipe_of_month = null; 
        ?>
        <?php foreach ($data as $index => $recipe): ?>
        <?php ?>
        <?php if(isset($recipe['Recipe']) && $recipe['Recipe']['is_public'] == 0 || !isset($recipe['Recipe'])){continue;}?>
        <?php
            if ($first_recipe_of_month != $recipe ['RecipeSummary'] ['publish_month']) {
                $first_recipe_of_month = $recipe ['RecipeSummary'] ['publish_month'];
                if($showAll == true){
                    if ($num % 3 != 0 && ($recipeListAll == true)) {
                        $numberOfComingSoon = 3 - ($num % 3);
                        for($i = 0; $i < $numberOfComingSoon; $i ++) {
                            echo $this->element ( 'Recipes/recipe_item_comingsoon' );
                            $num ++;
                        }
                    }
                }
            }
            
            if ($num != 0 && $num % 3 == 0) {
                echo '<div style="clear:both; margin-bottom:20px;"></div>';
            }
            
            $new_recipe = false;
            if ($page == 1 && $num < 3 && $recipe_date == (new DateTime($recipe ['RecipeSummary'] ['publish_month']))) {
                $new_recipe = true;
            }
            
            echo $this->element ( 'Recipes/recipe_item', array (
                    "hash" => $recipe ['Recipe'] ['hash'],
                    "id" => $recipe ['Recipe'] ['id'],
                    "title_eng" => $recipe ['Recipe'] ['title_eng'],
                    "video_url" => $recipe ['Recipe'] ['video_url'],
                    "summary" => $recipe ['Recipe'] ['summary'],
                    "category" => $recipe ['RecipeCategory'] ['category_name'],
                    "title" => $recipe ['Recipe'] ['title'],
                    "publish_date" => $recipe ['RecipeSummary'] ['publish_month'],
                    "new_recipe" => $new_recipe,
                    "recipe_transaction" => $recipe ['Payment'],
                    "is_admin" => $is_admin,
                    'subscribed' => $subscribed
            ) );
            ?>
           
        <?php $num++; endforeach; ?>
     <div style="clear:both;"></div>
        <?php echo $this->element('paginator');?>
	</div>
    
</div>
<div id="ContactPopup" class="contact-modal mfp-hide">
    <h1 class="modal-heading">商品問い合わせ</h1>
    <a href="javascript:void(0);" onclick="$.magnificPopup.close();" class="btn-close"><span class="icon icon-x"></span></a>
        <?php echo $this->Form->create('Email', array('method'=>'POST', 'action'=>'contact_recipe')); ?>
        <?php echo $this->Form->input('name', array('type' => 'text', 'placeholder'=>'お名前', 'label'=>false,'value'=>$logged_user['display_name'])); ?>
        <?php echo $this->Form->input('from', array('type' => 'text', 'placeholder'=>'メールアドレス', 'label'=>false, 'value'=>$logged_user['email'])); ?>
        <?php echo $this->Form->input('phone', array('type' => 'text', 'placeholder'=>'電話番号', 'label'=>false)); ?>
        <?php echo $this->Form->input('body', array('type' => 'textarea', 'label'=>false)); ?>
        <?php echo $this->Form->input('to', array('type' => 'hidden', 'value'=>'info@kdkitchen.com')); ?>
        <?php echo $this->Form->input('subject', array('type' => 'hidden', 'value'=>'レシピ購入問い合わせ')); ?>
        <?php echo $this->Form->button('送信する', array('class'=>'btn btn-send')); ?>
        <?php echo $this->Form->end(); ?>
</div>

<script>
  
    $(document).ready(function(){

    	  $(function() {
    		    $( document ).tooltip();
    		  });

        $('.video_icon').mouseout(function() {
        	$(this).find('img').attr('src', '/img/recipe/btn_movie_gray.png');
          })
          .mouseover(function() {
        	  $(this).find('img').attr('src', '/img/recipe/btn_movie_orange.png');
          });

        $('.pic_icon').mouseout(function() {
        	$(this).find('img').attr('src', '/img/recipe/btn_pic_gray.png');
          })
          .mouseover(function() {
        	  $(this).find('img').attr('src', '/img/recipe/btn_pic_orange.png');
          });

        $('.pdf_icon').mouseout(function() {
        	$(this).find('img').attr('src', '/img/recipe/btn_PDF_gray.png');
          })
          .mouseover(function() {
        	  $(this).find('img').attr('src', '/img/recipe/btn_PDF_orange.png');
          });

        $('.pdf_icon_cover').mouseout(function() {
        	$(this).find('img').attr('src', '/img/recipe/btn_PDF_cover_gray.png');
          })
          .mouseover(function() {
        	  $(this).find('img').attr('src', '/img/recipe/btn_PDF_cover_orange.png');
          });

    	<?php
        if ($logged_user ['is_admin'] == true) {
            ?>
    		    $('.recipe_display_sel_font').click(function(){
    		        alert("アドミンはこのボタンが使えません。");
    		        return false;
    		    });
    		    <?php
        }
        ?>
    		      
	    $('.popup-vimeo').magnificPopup({
	      disableOn: 700,
	      type: 'iframe',
	      mainClass: 'mfp-fade',
	      removalDelay: 160,
	      preloader: false,
	      fixedContentPos: false
	    });

	    $('.ContactButton').click(function(){
		    var recipeName = "<?php echo $logged_user['display_name'];?>さん:";
		    recipeName += $(this).parent().find('.recipe_item_title').html();
		    recipeName += "の購入の問い合わせ";
		    $('#ContactPopup').find('#EmailSubject').val(recipeName);
		    });
	    
	    $('.ContactButton').magnificPopup({
	        items: {
	            src: '#ContactPopup',
	            type: 'inline',
	        },
	        showCloseBtn: false
	    });

	    


	    $("'[placeholder]'").parents("form").submit(function() {
	          $(this).find("[placeholder]").each(function() {
	                  var input = $(this);
	                      if (input.val() == input.attr("placeholder")) {
	                                input.val("''");
	                                    }
	                    })
	    });
    });
</script>


