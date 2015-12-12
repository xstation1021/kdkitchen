<div class="kdkservice_content">
<?php if(isset($contents[$section .'_pic_text']) && !empty($contents[$section .'_pic_text'])){?>
	<div class="pic_text"><?php echo $contents[$section .'_pic_text'];?></div>
<?php }?>
	<div class="col-sm-6 col-xs-12 section_image kdkservice_section_pic"
		id="kdkservice_section_pic_<?php echo $section. '_' .  $page?>"></div>
	<div class="kdkservice_section_content col-sm-6 col-xs-12">
		<div class="kdkservice_section_title"><?php echo $section?></div>
		
		<div class="kdkservice_section_sub_title"><?php echo $contents[$section .'_sub_title'];?></div>
					
		<?php if (isset ( $contents [$section . '_sub_description'] )) {?>
			<div class="kdkservice_section_sub_description">
				<?php echo $contents[$section .'_sub_description'];?>
			</div>
		<?php } ?>
		
		<?php if (isset ( $contents [$section . '_sub_title_black'] )) { ?>
				<div class="kdkservice_section_sub_title_black">
		            <?php echo $contents[$section .'_sub_title_black'];?>
				</div>
		<?php } ?>
			 		
		<?php if (isset ( $contents ['summary'] )) { ?>
		    <div class="kdk_content_summary">
        <?php echo $contents['summary'];?>
			</div>   
		<?php } ?>
					
		<div>
		    <?php if(isset($contents['kdk_description_title'])){?>
            <div>
			    <?php echo $contents['kdk_description_title'];?>
	        </div>
	        <?php }?>
	       
	        <?php foreach($contents[$section .'_descriptions'] as $content){?>
			    <div class="kdkservice_content_description row">
				    <div class="orange_circle_pic col-xs-1">
    			        <?php echo $this->Html->image ( 'kdservice/' . $content ['image'] ); ?>
    			    </div>
				<div class="kdkservice_description col-xs-10">
    			    <?php foreach($content['paragraphs'] as $paragraph){?>
        			    <p><?php echo $paragraph?></p>
        		    <?php }?>
    		    </div>
			</div>
		
			<?php }?>
		</div> 
		
		<?php if (isset ( $contents [$section . '_sub_title2'] )) {?>
		<div class="kdkservice_section_sub_title"><?php echo $contents[$section .'_sub_title2'];?></div>
		<?php } ?>
		<?php if (isset ( $contents [$section . '_sub_description2'] )) {?>
			<div class="kdkservice_section_sub_description">
				<?php echo $contents[$section .'_sub_description2'];?>
			</div>
		<?php } ?>
		
		<?php if (isset ( $contents [$section . '_sub_title_black2'] )) { ?>
				<div class="kdkservice_section_sub_title_black">
		            <?php echo $contents[$section .'_sub_title_black2'];?>
				</div>
		<?php } ?>
		<?php if (isset ( $contents [$section . '_descriptions2'] )) { ?>
			<?php foreach($contents[$section .'_descriptions2'] as $content){?>
			    <div class="kdkservice_content_description row">
				    <div class="orange_circle_pic col-xs-1">
    			        <?php echo $this->Html->image ( 'kdservice/' . $content ['image'] ); ?>
    			    </div>
				<div class="kdkservice_description col-xs-10">
    			    <?php foreach($content['paragraphs'] as $paragraph){?>
        			    <p><?php echo $paragraph?></p>
        		    <?php }?>
    		    </div>
			</div>
			<?php }?>
		<?php } ?>
	</div>
</div>
