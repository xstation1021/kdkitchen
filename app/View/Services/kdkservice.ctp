<?php
echo $this->Html->css ( 'kdkservice.css?v=1.1' );
echo $this->Html->css ( 'kdtraining2.css?v=1.1' );
echo $this->element ( 'Service/contact_template' );
?>
<div id="main-content">
	<div class="container mt-80">
		<div id="content_kd">
			<div class="col-lg-12 mb-30">
				<div class="service_title">インストラクター資格取得講座</div>
			</div>
            <?php if(isset($contents['extra_title'])):?>
            <div class="col-lg-12">
    			<div class="extra_title"><?php echo $contents['extra_title'] ;?></div>
    		</div>
            <?php endif;?>
            <div class="col-lg-12">
				<div class="kdservice_title">
					<span class="black">KDK <?php if($page=="kdknewyork") echo "New York"; else if($page=="kdkskype") echo "Skype"; else if($page=="kdktraining") echo "Japan" ?></span>
					<span class="thin">Instructor Training</span>
				</div>
			</div>
			<div class="col-lg-12">
				<h5><?php echo $contents['top_sub_title'];?></h5>
			</div>
			<div class="col-lg-12">
				<h3 class="light"><?php echo $contents['page_summary'];?></h3>
			</div>
			<div class="col-lg-12 mt-50">
             <?php echo $this->element('Service/contact'); ?>
            </div>
		</div>
	</div>
	<div class="container">
	   <div class="row mt-50">
        <?php
            echo $this->element ( 'Service/kdkservice_content', array (
                    'section' => 'session' 
            ));
        ?>
        </div>
        <div class="row mt-50 row-border" >
        <?php
            echo $this->element ( 'Service/kdkservice_content_detail', array (
                'section' => 'session' 
            ));
        ?>
        </div>
        <div class="row mt-50">
        <?php
            echo $this->element ( 'Service/kdkservice_content', array (
                'section' => 'program' 
            ));
        ?>
        </div>
        <div class="row mt-50 row-border" >
        <?php
            echo $this->element ( 'Service/kdkservice_content_detail', array (
                'section' => 'program' 
            ));
        ?>
        </div>
        <div class="row mt-50">
        <?php
            echo $this->element ( 'Service/kdkservice_content', array (
                'section' => 'mission' 
            ));
        ?>
        </div>
        <div class="row mt-50 row-border" >
        <?php
            echo $this->element ( 'Service/kdkservice_content_detail', array (
                'section' => 'mission' 
            ));
        ?>
        </div>
	</div>
	<div id="content">

	<div id="content_kd">
		<div class="clear" style="height: 50px;"></div>
		<?php
            echo $this->element ( 'Service/kdk_service_plan' );
        ?>
		<div class="clear" style="height: 140px;"></div>	
		<?php echo $this->element('Service/contact'); ?>
		<div class="kdkplus_link">
		  KD KITCHEN PLUSの詳細は <?php echo $this->Html->link('こちら', 'kdkplus')?>
		</div>
	</div>

</div>
</div>

