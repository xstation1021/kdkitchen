
<div id='main' role='main'>
<div id='main-content'>
	<!-- / carousel blur -->
	<div
		class='hero-carousel carousel-blur carousel-blur-arrows carousel-blur-pagination flexslider'
		id='carousel-example-1'>
		<ul class='slides'>
			<li class='item'>
				<div class='container' >
					<div class='row'>
						<div class='col-lg-12 animate'>
							<p class='normal fadeInUp animated mt-100'><?php echo $content['kdk_home_slide_1_line_1'];?> </p>
							<p class='normal fadeInUp animated'><?php echo $content['kdk_home_slide_1_line_2'];?></p>
							<a class='btn btn-contrast btn-lg fadeInDownBig animated'
								href='/services/kdktraining'> 詳しくはこちら </a>

						</div>
					</div>
				</div>
			</li>
			<li class='item'>
				<div class='container'>
					<div class='row'>
						<div class='col-lg-12 animate'>
							<p class='normal fadeInRightBig animated mt-100'><?php echo $content['kdk_home_slide_2_line_1'];?></p>
							<p class='normal fadeInRightBig animated'><?php echo $content['kdk_home_slide_2_line_2'];?></p>
						</div>
					</div>
				</div>
			</li>
			<li class='item'>
				<div class='container'>
					<div class='row'>
						<div class='col-lg-12 animate'>
							<p class='normal fadeInRightBig animated mt-100'><?php echo $content['kdk_home_slide_3_line_1'];?></p>
							<p class='normal fadeInLeftBig animated'><?php echo $content['kdk_home_slide_3_line_2'];?></p>

						</div>
					</div>
				</div>
			</li>
		</ul>
	</div>
<!-- 	<div id='main-content'> -->
<!-- 		<aside class="call-to-action bg-primary bg-orange"> -->
<!-- 			<div class="container"> -->
<!-- 				<div class="row"> -->
<!-- 					<div class="col-lg-12 lead text-center"> -->
<!-- 						KDダイエットプログラムを日本のみなさんにもぜひ体験して<br>頂きたいと願って生まれたのが 「KD KITCHEN」なのです。 -->
<!-- 					</div> -->
<!-- 				</div> -->
<!-- 			</div> -->
<!-- 		</aside> -->

<div class="container">
		<div class="row text-center mb-50">
			<div>
				<h2 class="h2_title"><span class="border">インストラクター資格取得講座</span></h2>
					<div class="col-md-3 col-sm-6">
    					<a href="/services/kdktraining" class="service-item">
    							<?php echo $this->Html->image ( 'kdservice/KDK_photo.png' );?>
    					</a>
    					<a href="/services/kdktraining" class="trainingBox">
    						<span class="black block service_title_home">KDK </span>
    						<span class="block service_title_home_description">
    						   KDコーチMARIが来日して行う講座
    						</span>
    					</a>
					</div>
					<div class="col-md-3 col-sm-6">
					   <a href="/services/kdknewyork" class="service-item">
    							<img src="/img/kdservice/KDKnewyork_photo.png">
    					</a>
    					<div class="trainingBox">
    					   <span class="block service_title_home"><span class="black">KDK </span><span>New York</span></span>
    					    <span class="block service_title_home_description">
    						   KDコーチMARIがNYで行う講座
    					    </span>
    					</div>
					</div>
					<div class="col-md-3 col-sm-6">
					   <a href="/services/kdkskype" class="service-item">
    							<?php echo $this->Html->image ( 'kdservice/KDKskype_photo.png' );?>
    					</a>
    					<div class="trainingBox">
    					    <span class="block service_title_home"><span class="black">KDK </span> Skype </span>
    					    <span class="block service_title_home_description">
    						   数時間ずつ学べるのが特徴
    					    </span>
    					</div>
					</div>
					<div class="col-md-3 col-sm-6">
					   <a href="/services/kdkplus" class="service-item">
    							<img src="/img/kdservice/KDKplus_photo.png">
    					</a>
    					<div class="trainingBox">
    						<h2><span class="black">KDK </span> PLUS</h2>
    						<p>
    						   インストラクターだけに送る、NYの最新情報
    						</p>
    					</div>
					</div>
					
				<!-- /.row (nested) -->
			</div>
			<!-- /.col-lg-10 -->
		</div>
		<!-- /.row -->
</div>

<div class="container">
<div class="row">
		    <div class="col-md-6 col-0-padding home-flud-left flex2">
    		    <div class="flexslider2">
    		    <?php
            		$imgpath1 = '/img/home/01.jpg';
            		if(isset($settings['small_slider_img_1']) && !empty($settings['small_slider_img_1'])) { $imgpath1 = $settings['small_slider_img_1']; }
            		$imgpath2 = '/img/home/06.png';
            		if(isset($settings['small_slider_img_2']) && !empty($settings['small_slider_img_2'])) { $imgpath2 = $settings['small_slider_img_2']; }
            		$imgpath3 = '/img/home/03.jpg';
            		if(isset($settings['small_slider_img_3']) && !empty($settings['small_slider_img_3'])) { $imgpath3 = $settings['small_slider_img_3']; }
            		$imgpath4 = '/img/home/04.jpg';
            		if(isset($settings['small_slider_img_4']) && !empty($settings['small_slider_img_4'])) { $imgpath4 = $settings['small_slider_img_4']; }
            		$imgpath5 = '/img/home/05.png';
            		if(isset($settings['small_slider_img_5']) && !empty($settings['small_slider_img_5'])) { $imgpath5 = $settings['small_slider_img_5']; }
            	?>
                    <ul class="slides">
                          <li><img src="<?php echo $imgpath1;?>" alt=""></li>
                          <li><img src="<?php echo $imgpath2;?>" alt=""></li>
                          <li><img src="<?php echo $imgpath3;?>" alt=""></li>
                          <li><img src="<?php echo $imgpath4;?>" alt=""></li>
                          <li><img src="<?php echo $imgpath5;?>" alt=""></li>
                        </ul>
    		        </div>
    		    </div>
		    <div class="col-md-6 col-0-padding home-flud-right">
		      <div class="videoWrapper">
		          <iframe width="560" height="315" src="https://www.youtube.com/embed/<?php echo $content['youtube_home_id']?>?autohide=1" frameborder="0" allowfullscreen></iframe>
		        </div>
		    </div>
		    <div class="col-md-12 col-0-padding mt-10">
		        <div class="full_image_container">
		        <div id="home_item_3">
		            <div id="home_item_3_container">
		                <div id="hote_item_3_header" class="black">
		                      KD KITCHEN
		                </div>
		                <div id="hote_item_3_content">
		                      <div id="hote_item_3_content_title" class="thin">
		                          from
		                      </div>
		                      <div id="hote_item_3_content_content" class="black">
		                          NEW YORK
		                      </div>
		                </div>
		            </div>
		        </div>
		        <div id="home_item_3_2" class="light">
		        NYスタイルのHealthy, Sexy, Happyなライフスタイルを定着させて頂くため「KD KITCHEN」は生まれました。
		        </div>
		        
		        <?php
            		$imgpath = '/img/home/A.jpg';
            		if(isset($settings['from_newyork']) && !empty($settings['from_newyork'])) { $imgpath = $settings['from_newyork']; }
            	?>
            	<img src="<?php echo $imgpath;?>" alt="" />
		          
		        </div>
		    </div>
		</div>
</div>
<div class="clear mb-50"></div>
	

<div class="container"> 
		<div class='row sm4items black_txt'>
			<div class='colsm12'>
				<div class='col-sm-3 colsm3'>
					<a href='/pages/whatiskdk'> <img class="fit" src="/img/home-main-bucket-1.jpg">
						<h5>What is KD Kitchen</h5>
						<p>情報の最先端New Yorkからやってきた、NYスタイルのダイエットクッキングクラス。</p>
					</a>
				</div>
				<div class='col-sm-3 colsm3'>
					<a href='/pages/kdtraining'> <img class="fit" src="/img/home-main-bucket-2.jpg">
						<h5>Find KD Kitchen</h5>
						<p>KD KITCHENのクッキングクラスに参加して、NY流に美味しく楽しくライフスタイルチェンジ。</p>
					</a>
				</div>
				<div class='col-sm-3 colsm3'>
					<a href='/find/area'> <img class="fit" src="/img/home-main-bucket-3.jpg">
						<h5>Instructor Training</h5>
						<p>NYから届くレシピを使ってKD KITCHENのインストラクターとして活躍する。</p>
					</a>
				</div>
				<div class='col-sm-3 colsm3'>
					<a href="#NewLetterPopup" class="NewLetterButton"> <img class="fit" src="/img/NEWSLETTER.png">
						<h5>KD Kitchen Newsletter</h5>
						<p>NYから旬な情報をお届けします。現在進行形のNYをお楽しみください。</p>
					</a>
				</div>
			</div>
		</div>
		</div>

		<aside class="callout">
			<div class="text-vertical-center">
				<h2>New York</h2>
			</div>
		</aside>
	</div>
</div>

<?php 
             if(isset($popup)&&$popup == true){
                  echo $this->element ( 'Pages/kdkworkshop');
             }?>
             
<script>
    $(document).on('focus click mouseover', '.flex2',  function(e){
        $('.flex-next').show();
        $('.flex-prev').show();
    });
    $(document).on('mouseout', '.flex2',  function(e){
        $('.flex-next').hide();
        $('.flex-prev').hide();
    });
</script>


