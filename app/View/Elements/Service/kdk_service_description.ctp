<div class="service_description row">
	<div class="service_description_title col-sm-5"><?php echo $title?></div>
	<div class="service_description_content col-sm-7">
	<?php if (isset($header)):?>
		<h4><?php echo $header?></h4>
		<?php endif;?>
		<div class="<?php echo $class;?>">
			<ul>
			<?php foreach($contents as $content):?>
				<li><?php echo $content?></li>
			<?php endforeach;?>
			</ul>
			<?php if(isset($extra)){
			    foreach($extra as $value){
                    echo '<span class="extra_description">'.$value . '</span><br>';
                }
			}?>
		</div>
	</div>
</div>