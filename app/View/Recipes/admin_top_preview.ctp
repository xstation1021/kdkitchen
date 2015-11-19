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
                if (isset ( $summary_recipes [$i] ) && !empty($summary_recipes[$i]['Recipe']['id'])) {
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
                            "is_admin" => $is_admin 
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
    });
</script>


