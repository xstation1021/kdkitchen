<div class="container">
            <?php 
             if(isset($popup) && $popup == true){
                  echo $this->element ( 'Pages/kdpossibilitypopup');
             }?>
    <div class="hero" style="cursor: pointer;">
	<section id="features-slider" class="ss-slider">
		<article class="slide">
            <?php
            $imgpath = 'img/home-main-hero-1.jpg';
            if(isset($settings['slider_img_1']) && !empty($settings['slider_img_1'])) { $imgpath = $settings['slider_img_1']; }
            ?>
            <img src="<?php echo $imgpath;?>" alt="" class="slide-bg-image" />

			<div class="slide-button">
			</div>
		
			<div class="slide-content">
				<p><a class="button" href="#">Read More</a></p>
			</div>
			
		</article><!-- end .slide (Responsive Layout) -->
	
		<article class="slide">

            <?php
            $imgpath = 'img/home-main-hero-2.jpg';
            if(isset($settings['slider_img_2']) && !empty($settings['slider_img_2'])) { $imgpath = $settings['slider_img_2']; }
            ?>
            <img src="<?php echo $imgpath;?>" alt="" class="slide-bg-image" />
		
			<div class="slide-button">		
			</div>
			
			<div class="slide-content">
				<p><a class="button" href="#">Read More</a></p>
			</div>
			
		</article><!-- end .slide (HTML5 / CSS3) -->
	
		<article class="slide">
		
            <?php
            $imgpath = 'img/home-main-hero-3.jpg';
            if(isset($settings['slider_img_3']) && !empty($settings['slider_img_3'])) { $imgpath = $settings['slider_img_3']; }
            ?>
            <img src="<?php echo $imgpath;?>" alt="" class="slide-bg-image" />
		
			<div class="slide-button">
			</div>
			
			<div class="slide-content">
				<p><a class="button" href="#">Read More</a></p>
			</div>
			
		</article><!-- end .slide (Easily Customisable) -->
	
		<article class="slide">
		
            <?php
            $imgpath = 'img/home-main-hero-4.jpg';
            if(isset($settings['slider_img_4']) && !empty($settings['slider_img_4'])) { $imgpath = $settings['slider_img_4']; }
            ?>
            <img src="<?php echo $imgpath;?>" alt="" class="slide-bg-image" />
		
			<div class="slide-button">
			</div>
			
			<div class="slide-content">
				<p><a class="button" href="#">Read More</a></p>
			</div>
			
		</article><!-- end .slide (Unique & Clean) -->
		
	</section><!-- end #features-slider -->

    </div>
    <ul class="fluid-grid hero-buckets">
        <li>
            <a href="/pages/whatiskdk">
                <?php
                $imgpath = 'home-main-bucket-1.jpg';
                if(isset($settings['whatis_id_img_home']) && !empty($settings['whatis_id_img_home'])) { $imgpath = $settings['whatis_id_img_home']; }
                ?>
                <?php echo $this->Html->image($imgpath, array('class'=>'thumb'));?>
                <h2 class="heading">What is KD Kitchen</h2>
                <p class="copy">情報の最先端New Yorkからやってきた、NYスタイルのダイエットクッキングクラス。</p>
            </a>
        </li>
        <li>
            <a href="/pages/kdtraining">
                <?php
                $imgpath = 'home-main-bucket-2.jpg';
                if(isset($settings['instructor_training_img_home']) && !empty($settings['instructor_training_img_home'])) { $imgpath = $settings['instructor_training_img_home']; }
                ?>
                <?php echo $this->Html->image($imgpath, array('class'=>'thumb'));?>
                <h2 class="heading">Instructor Training</h2>
                <p class="copy">NYから届くレシピを使ってKD KITCHENのインストラクターとして活躍する。</p>
            </a>
        </li>
        <li>
            <a href="/find/area">
                <?php
                $imgpath = 'home-main-bucket-3.jpg';
                if(isset($settings['find_kd_kitchen_img_home']) && !empty($settings['find_kd_kitchen_img_home'])) { $imgpath = $settings['find_kd_kitchen_img_home']; }
                ?>
                <?php echo $this->Html->image($imgpath, array('class'=>'thumb'));?>
                <h2 class="heading">Find KD Kitchen</h2>
                <p class="copy">KD KITCHENのクッキングクラスに参加して、NY流に美味しく楽しくキレイにダイエット。</p>
            </a>
        </li>
        <li>
            <a href="#NewLetterPopup" id="NewLetterButton">
                <?php
                $imgpath = 'NEWSLETTER.png';
                ?>
                <?php echo $this->Html->image($imgpath, array('class'=>'thumb'));?>
                <h2 class="heading">KD KITCHEN NEWSLETTER</h2>
                <p class="copy">NYから旬な情報をお届けします。現在進行形のNYをお楽しみください。</p>
            </a>
        </li>
        <!-- gap to align previous elements, do not remove -->
        <li class="gap"></li>
    </ul>
    <!--<div class="whats-new">
        <div class="whats-new-heading-container">
            <h2>What's New</h2>
            <p><?php 
            if(isset($content)){
                    if(isset($link)){
                        echo $this->Html->link(
                                $content,
                                $link
                        );
                    } else {
                        echo $content;
                    }
                } else {
                    echo "流行の最先端New YorkからKD KITCHENの最新の情報をお届けします。";
                    }
            ?></p>
            
            
        </div>
        <?php echo $this->Html->image('home-whatsnew-hero.png');?>
    </div>-->
    
    <?php if(isset($content['youtube_home_id']) && !empty($content['youtube_home_id'])):?>
     <div style="margin-bottom:50px;">
        <iframe id="ytplayer" type="text/html" width="970" height="550" src="https://www.youtube.com/embed/<?php echo $content['youtube_home_id']?>?autoplay=0" frameborder="0"/></iframe>
    </div>
    <?php endif;?>
    <ul class="fluid-grid whats-new-buckets">
         <li>
            <a href="http://ameblo.jp/karadadetox" target="_blank">
                <div class="shader"></div>
                <div class="trio-img-container">
                    <!--<img src="http://placehold.it/301x70" class="thumb">-->
                    <?php echo $this->Html->image('bottom_pic_1.jpg', array('class'=>'thumb'));?>
                </div>
                
                <p class="copy">DietコーチのブログをNew Yorkからお届けします！</p>
            </a>
        </li>        <li>
            <a href="/pages/kdtraining">
                <div class="shader"></div>
                <div class="trio-img-container">
                    <!--<img src="http://placehold.it/301x70" class="thumb">-->
                    <?php echo $this->Html->image('bottom_pic_2.jpg', array('class'=>'thumb'));?>
                </div>
                
                <p class="copy">KD KITCHENインストラクター資格取得講座</p>
            </a>
        </li>
        <li>
            <a href="http://www.karadadetox.com" target="_blank">
                <div class="shader"></div>
                <div class="trio-img-container">
                    <!--<img src="http://placehold.it/301x70" class="thumb">-->
                    <?php echo $this->Html->image('karadadetox.png', array('class'=>'thumb'));?>
                </div>
                <h3 class="heading">KARADA DETOX</h3>
                <p class="copy">NY生まれの体の中からキレイになるダイエット＋ライフスタイルチェンジプログラム。留学プログラムでHealthy, Sexy, Happyな体を目指します！</p>
            </a>
        </li>
        <!-- gap to align previous elements, do not remove -->
        <li class="gap"></li>
    </ul>
</div>
<div style="height:70px;"></div>

<div class="fb-like-box blog-post cf" data-href="https://www.facebook.com/kdkitchennewyork" data-width="970"  data-height="600" data-colorscheme="light" data-show-faces="false" data-header="false" data-stream="true" data-show-border="false"></div>
<div id="NewLetterPopup" class="contact-modal mfp-hide">
    <h1 class="modal-heading">ニュースレターの配信登録</h1>
    <div id="newsletter_error" style="color:red;">
    </div>
    <a href="javascript:void(0);" onclick="$.magnificPopup.close();" class="btn-close"><span class="icon icon-x"></span></a>
        <form method="POST" action="/addemail">     
        <?php echo $this->Form->input('email', array('type' => 'text', 'placeholder'=>'メールアドレス', 'label'=>false)); ?>
        <?php echo $this->Form->input('last_name', array('type' => 'text', 'placeholder'=>'姓', 'label'=>false)); ?>
        <?php echo $this->Form->input('first_name', array('type' => 'text', 'placeholder'=>'名前', 'label'=>false)); ?>
        <?php echo $this->Form->button('送信する', array('id' => 'newsletter_send_btn', 'class'=>'btn btn-send')); ?>
        </form>
</div>
<?php
    echo $this->Html->script('respond.min');
    echo $this->Html->script('jquery.easing-1.3.min');
    echo $this->Html->script('jquery.smartStartSlider');
    echo $this->Html->script('jquery.jcarousel.min');
    echo $this->Html->script('jquery.cycle.all.min');
?>
    <script>
   // $(window).load(function() {
   
   function validateEmail(email)
{
 var reg = /^\w+([-+.']\w+)*@\w+([-.]\w+)*\.\w+([-.]\w+)*$/
 if (reg.test(email)){
 return true; }
 else{
 return false;
 }
} 
   jQuery(document).ready(function($) {
	   $('#newsletter_send_btn').click(function(){
		   var error = "";
		   if($('#email').val() == "" || validateEmail($('#email').val()) == false){
			   error += 'Eメールアドレスが正しくありません。'
		   }
		   if($('#last_name').val() == ""){
			   if( error.length > 0){
				   error += '<br>';
			   }
			   error += '性を入力してください。'
		   }
		   if($('#first_name').val() == ""){
			   if( error.length > 0){
				   error += '<br>';
			   }
			   error += '名を入力してください。'
		   }

		   $('#newsletter_error').html(error);
		   if(error.length == 0){
			   return true;
		   } else {
			   return false;
		   }
		   return false;
		   });
	   
	    $('#NewLetterButton').magnificPopup({
	        items: {
	            src: '#NewLetterPopup',
	            type: 'inline',
	        },
	        showCloseBtn: false
	    });

	   
		var $slider = $('#features-slider');

		if( $slider.length ) {

			// Prevent multiple initialization
			if( $slider.data('init') === true )
				return false;

			$slider.data( 'init', true )
				   .smartStartSlider({
				   	   pos                : 0,
					   width              : 970,
					   height             : 440,
					   contentSpeed       : 450,
					   showContentOnhover : true,
					   hideContent        : false,
					   contentPosition    : '',
					   timeout            : 3000,
					   pause              : false,
					   pauseOnHover       : true,
					   hideBottomButtons  : false,
					   type               : {
						   mode           : 'random',
						   speed          : 600,
						   easing         : 'easeInOutExpo',
						   seqfactor      : 100
					   }
				   });
		}

		$( "#content div" ).click(function(){
			var classname = $(this).attr('class');
			 if(classname == 'slide-button' || classname == 'active-slide-bar'){
				    return false;
			 }

			 if(classname == "hero"){
				 var count = 1;
				 var activeButton = 0;
				$('.slide-button').each(function(){
				    var activeClass = $(this).attr('class');
				    if(activeClass.indexOf("active") > -1){
					    activeButton = count;
				    }
				    count++;
				});
				if(activeButton == 1){
					window.location = "<?php echo (isset($content['home_slider_link_1']) && !empty($content['home_slider_link_1']) ? $content['home_slider_link_1'] : "javascript:void(0);");?>";
				} else if(activeButton == 2){
					window.location = "<?php echo (isset($content['home_slider_link_2']) && !empty($content['home_slider_link_2']) ? $content['home_slider_link_2'] : "javascript:void(0);");?>";
				} else if(activeButton == 3){
					window.location = "<?php echo (isset($content['home_slider_link_3']) && !empty($content['home_slider_link_3']) ? $content['home_slider_link_3'] : "javascript:void(0);");?>";
				} else if(activeButton == 4){
					window.location = "<?php echo (isset($content['home_slider_link_4']) && !empty($content['home_slider_link_4']) ? $content['home_slider_link_4'] : "javascript:void(0);");?>";
				}
			 }

		});
		
	});
</script>
    
    <script>(function(d, s, id) {
      var js, fjs = d.getElementsByTagName(s)[0];
      if (d.getElementById(id)) return;
      js = d.createElement(s); js.id = id;
      js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&appId=1484247458508583&version=v2.0";
      fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));

    </script>
