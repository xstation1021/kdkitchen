<?php
echo $this->Html->css ( 'kdservice2' );
?>
<div id='main-content'>
	<div class="container mt-80"></div>
	<div style="padding-top: 40px;">
		<h1 id="service_title">インストラクター資格取得講座</h1>
	</div>

	<div class="container" style="max-width: 1000px;">
		<div class="row">
			<div class="col-md-6">
				<div class="service_plan_box">
					<div class="service_title_section">
						<h2 class="service_plan_title">
							<strong>KDK</strong>
						</h2>
						<h3 class="service_plan_sub_title">Instructor Training</h3>
						<h4 class="service_plan_sub_title_jap">KDK トレーニング</h4>
					</div>
					<div class="service_plan_image">
				<?php echo $this->Html->image('kdservice/KDK_photo.png');?>
				</div>
					<div class="service_plan_description">
						KDダイエットコーチMARIが、NYから来日して開催致します。
					</div>
					<a href="/services/kdktraining"><?php echo $this->Html->image('kdservice/arrow.png');?></a>
				</div>
			</div>
			<div class="col-md-6">
				<div class="service_plan_box">
					<div class="service_title_section">
						<h2 class="service_plan_title">KDK New York</h2>
						<h3 class="service_plan_sub_title">Instructor Training</h3>
						<h4 class="service_plan_sub_title_jap">KDKトレーニング</h4>
					</div>
					<div class="service_plan_image">
				<?php echo $this->Html->image('kdservice/KDKnewyork_photo.png');?>
				</div>
					<div class="service_plan_description">
						Healthy, Sexy, Happyの本場NYで、<br>KDダイエットコーチMARIが講座を開催致します。
					</div>
					<a href="/services/kdknewyork"><?php echo $this->Html->image('kdservice/arrow.png');?></a>
				</div>
			</div>
			<div class="col-md-6">
				<div class="service_plan_box">
					<div class="service_title_section">
						<h2 class="service_plan_title">KDK Skype</h2>
						<h3 class="service_plan_sub_title">Instructor Training</h3>
						<h4 class="service_plan_sub_title_jap">スカイプ・トレーニング</h4>
					</div>
					<div class="service_plan_image">
				<?php echo $this->Html->image('kdservice/KDKskype_photo.png');?>
				</div>
					<div class="service_plan_description">
						数時間ずつ学べるのが特徴。<br>
						NYからスカイプでセッション致します。
					</div>
					<a href="/services/kdkskype"><?php echo $this->Html->image('kdservice/arrow.png');?></a>
				</div>
			</div>
			<div class="col-md-6">
				<div class="service_plan_box">
					<div class="service_title_section">
						<h2 class="service_plan_title">KDK PLUS</h2>
						<h3 class="service_plan_sub_title">Instructors Only</h3>
						<h4 class="service_plan_sub_title_jap">KD KITCHEN プラス</h4>
					</div>
					<div class="service_plan_image">
				<?php echo $this->Html->image('kdservice/KDKplus_photo.png');?>
				</div>
					<div class="service_plan_description">
						KD KITCHENインストラクターの資格を持つ方のみ対象。<br> 最新のレシピに加え、NYの最新情報や、 <br>
						インストラクターを活性化させるサービスを提供。
					</div>
					<a href="/services/kdkplus"><?php echo $this->Html->image('kdservice/arrow.png');?></a>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="clear"></div>
		<?php
echo $this->element ( 'Service/contact' );
echo $this->element ( 'Service/contact_template' );
?>
<div class="clear" style="height:50px;"></div>

