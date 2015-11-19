<!DOCTYPE html>

<!--[if lt IE 9]> <html class="lt-ie9" lang="en"> <![endif]-->
<!--[if !IE] -->
<html lang='en'>
<!-- <![endif] -->
<head>
<title>KD KITCHEN</title>
<meta
	content='blog, business, clean, multipurpose template, twitter bootstrap 3, responsive'
	name='keywords'>
<meta content='kdkitchen' name='description'>
<meta content='BublinaStudio.com' name='author'>
<meta content='all' name='robots'>
<meta content='text/html; charset=utf-8' http-equiv='Content-Type'>
<meta content='width=device-width, initial-scale=1.0' name='viewport'>
<!--[if IE]> <meta http-equiv='X-UA-Compatible' content='IE=edge,chrome=1'> <![endif]-->
<!-- / required stylesheets -->
<!--     <link href="assets/stylesheets/bootstrap/bootstrap.min.css" media="all" id="bootstrap" rel="stylesheet" type="text/css" /> -->
    <?php
    echo $this->Html->css ( 'bootstrap.min' );
    ?>
    <?php
    echo $this->Html->css ( 'kdk_responsive.css?v=1.1' );
    if (isset ( $white )) {
        echo $this->Html->css ( 'whitenavi' );
    }
    
    echo $this->Html->css ( '/modules/Magnific-Popup/dist/magnific-popup.css' );
    echo $this->fetch ( 'meta' );
    echo $this->fetch ( 'css' );
    echo $this->fetch ( 'script' );
    echo $this->Html->script ( 'jquery-1.11.2.min' );
    echo $this->Html->script ( 'jquery.mobile.custom.min.js' );
    echo $this->Html->script ( '/modules/Magnific-Popup/dist/jquery.magnific-popup.min.js' );
    ?>
    
    <!-- / not required stylesheets -->
<!--     <link href="assets/stylesheets/demo.css" media="all" rel="stylesheet" type="text/css" /> -->
<!--[if lt IE 9]>
      <script src="assets/javascripts/ie/html5shiv.js" type="text/javascript"></script>
      <script src="assets/javascripts/ie/respond.min.js" type="text/javascript"></script>
    <![endif]-->
</head>
<body class='homepage'>
	<div id='wrapper'>
		<header id='header'>
			<div class='container'>
				<nav class='navbar navbar-collapsed-sm navbar-default' id='nav'
					role='navigation'>
					<div class='navbar-header'>
						<button class='navbar-toggle'
							data-target='.navbar-header-collapse' data-toggle='collapse'
							type='button'>
							<span class='sr-only'>Toggle navigation</span> <span
								class='icon-bar'></span> <span class='icon-bar'></span> <span
								class='icon-bar'></span>
						</button>
						<a class='navbar-brand' href='/'> <img alt="KD Kitchen" 
							width="260"
							src="<?php echo (isset($white)? "/img/logo-white-transparent.png":"/img/logo.png");?>" />
						</a>
					</div>
					<div class='collapse navbar-collapse navbar-header-collapse'>
						<ul class='nav navbar-nav navbar-right'>
							<li class='dropdown'><a class='dropdown-toggle' data-delay='50'
								data-hover='dropdown' data-toggle='dropdown' href='#'> <span>
										Become an Instructor <i class='fa-icon-angle-down'></i>
								</span>
							</a>
								<ul class='dropdown-menu' role='menu'>
									<li class=''><a href='/services'>講座内容</a></li>
									<li class=''><a href='/pages/kdtraining'>インストラクター資格取得講座</a></li>
								</ul></li>
							<li class='dropdown'><a class='dropdown-toggle' data-delay='50'
								data-hover='dropdown' data-toggle='dropdown' href='#'> <span>
										Classes <i class='fa-icon-angle-down'></i>
								</span>
							</a>
								<ul class='dropdown-menu' role='menu'>
									<li class=''><a href='/user_pages/area/'>KD Kitchenに参加する</a></li>
									<li class=''><a href='/pages/workshops'>Workshops</a></li>
								</ul></li>
							<li class='dropdown'><a class='dropdown-toggle' data-delay='50'
								data-hover='dropdown' data-toggle='dropdown' href='#'> <span>
										About <i class='fa-icon-angle-down'></i>
								</span>
							</a>
								<ul class='dropdown-menu' role='menu'>
									<li class=''><a href='/pages/whatiskdk'>KD Kitchenとは</a></li>
									<li class=''><a href='/pages/kdchefs'>NYシェフ</a></li>
									<li class=''><a href='questions'>よくある質問</a></li>
								</ul></li>
								<?php if($logged_user) {?>
								<li class='dropdown'><a class='dropdown-toggle' data-delay='50'
								data-hover='dropdown' data-toggle='dropdown' href='#'> <span>
										Recipe <i class='fa-icon-angle-down'></i>
								</span>
							</a>
								<ul class='dropdown-menu' role='menu'>
									<li class=''><a href='/recipes'>レシピ</a></li>
								</ul></li>
								<?php }?>
                            <?php if(!isset($logged_user)){?>
							<li class='dropdown'><a class='dropdown-toggle' data-delay='50'
								data-hover='dropdown' data-toggle='dropdown' href='#'> <span>
										Login <i class='fa-icon-angle-down'></i>
								</span>
							</a>
								<ul class='dropdown-menu' role='menu'>
									<li class=''><a href='/users/login'>ログイン</a></li>
								</ul></li>
								<?php } else {?>
								<li class='dropdown'><a class='dropdown-toggle' data-delay='50'
								data-hover='dropdown' data-toggle='dropdown' href='#'> <span>
										Account <i class='fa-icon-angle-down'></i>
								</span>
							</a>
								<ul class='dropdown-menu' role='menu'>
									<li class=''><a href='/users/view'>アカウント設定</a></li>
									<li class=''><a href='/users/logout'>ログアウト</a></li>
								</ul></li>
								<?php
                            }
                            ?>
						</ul>
					</div>
				</nav>
			</div>
		</header>
		<div>
		<div class="message-container col-xs-12">
            <?php echo $this->Session->flash(); ?>
        </div>
            <?php echo $this->fetch('content'); ?>
            <div id="NewLetterPopup" class="contact-modal mfp-hide">
				<h1 class="modal-heading">ニュースレターの配信登録</h1>
				<div id="newsletter_error" style="color: red;"></div>
				<a href="javascript:void(0);" onclick="$.magnificPopup.close();"
					class="btn-close"><span class="icon icon-x"></span></a>
				<form method="POST" action="/addemail">     
        <?php echo $this->Form->input('email', array('type' => 'text', 'placeholder'=>'メールアドレス', 'label'=>false)); ?>
        <?php echo $this->Form->input('last_name', array('type' => 'text', 'placeholder'=>'姓', 'label'=>false)); ?>
        <?php echo $this->Form->input('first_name', array('type' => 'text', 'placeholder'=>'名前', 'label'=>false)); ?>
        <?php echo $this->Form->button('送信する', array('id' => 'newsletter_send_btn', 'class'=>'btn btn-send')); ?>
        </form>
			</div>
			<script>
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
	   
	    $('.NewLetterButton').magnificPopup({
	        items: {
	            src: '#NewLetterPopup',
	            type: 'inline',
	        },
	        showCloseBtn: false
	    });
	});

</script>


<?php
echo $this->Html->css ( 'flexslider2' );
echo $this->Html->script ( 'jquery.flexslider-min' );
?>
<script>
$(window).load(function() {
    $('.flexslider2').flexslider({
        controlNav:false,
        slideshowSpeed:3000,
        pauseOnHover:true	
    });
  });

            </script>
		</div>
		<div class='fade' id='scroll-to-top'>
			<i class='fa-icon-chevron-up'></i>
		</div>

		<footer id='footer'>
			<div id='footer-main'>
				<div class='container'>
					<div class='row'>
						<div class='col-md-3 col-sm-6 info-box'>
							<h2 class='title'>KD KITCHEN</h2>
							<p class='no-mg-b'>
								<a href="/services">講座内容</a>
							</p>
							<p class='no-mg-b'>
								<a href="/pages/kdtraining">インストラクター資格取得講座</a>
							</p>
							<p class='no-mg-b'>
								<a href="/user_pages/area/">KD KITCHENに参加する</a>
							</p>
							<p class='no-mg-b'>
								<a href="http://ameblo.jp/karadadetox">Dietコーチのブログ</a>
							</p>
							<p class='no-mg-b'>
								<a href="http://www.karadadetox.com/karadadetox/Home.html">KARADETOX</a>
							</p>
						</div>
						<div class='col-md-3 col-sm-6 info-box'>
							<h2 class='title'>About</h2>
							<p class='no-mg-b'>
								<a href="/pages/whatiskdk">WHAT'S KD KITCHEN</a>
							</p>
							<p class='no-mg-b'>
								<a href="/pages/companyinfo">会社概要</a>
							</p>
							<p class='no-mg-b'>
								<a href="/questions">よくあるご質問</a>
							</p>
						</div>
						<div class='col-md-3 col-sm-6 info-box'>
							<h2 class='title'>Contact</h2>
							<div class='icon-boxes'>
								<div class='icon-box'>
									<div class='icon icon-wrap'>
										<i class='fa-icon-map-marker'></i>
									</div>
									<div class='content'>
										75 Wall Street <br>New York, NY 10005 U.S.A.
									</div>
								</div>
								<?php /*
								<div class='icon-box'>
									<div class='icon icon-wrap'>
										<i class='fa-icon-phone'></i>
									</div>
									<div class='content'>
										<a href='tel:+012345678'>+012 345 678</a>
									</div>
								</div>
								*/
								?>
								<div class='icon-box'>
									<div class='icon icon-wrap'>
										<i class='fa-icon-envelope'></i>
									</div>
									<div class='content'>
										<a href="mailto:info@kdkitchen.com">info@kdkitchen.com</a>
									</div>
								</div>
								<div class='icon-box'>
									<div class='icon icon-wrap'>
										<i class='fa-icon-globe'></i>
									</div>
									<div class='content'>
										<a href="#">www.kdkitchen.com</a>
									</div>
								</div>
							</div>
						</div>
						
						<div class='col-md-3 col-sm-6 info-box'>
							<h2 class='title'>Newsletter</h2>
							<p class='no-mg-b'><a href="#NewLetterPopup" class="NewLetterButton">配信登録する</a></p>
						</div>
					</div>
				</div>
			</div>
			<div id='footer-copyright'>
				<div class='container'>
					<div class='row'>
						<div class='col-lg-12 clearfix'>
							<p class='copyright'>Copyright &copy; <?php echo date("Y");?> Karadadetox LLC</p>
							<div class='links'>
								<a class='btn btn-circle btn-medium-light btn-sm'
									href='https://instagram.com/kdkitchen/'> <i
									class='fa-icon-instagram text-dark'></i>
								</a> <a class='btn btn-circle btn-medium-light btn-sm'
									href='https://www.youtube.com/user/KaradaDetox'> <i
									class='fa-icon-youtube text-dark'></i>
								</a> <a class='btn btn-circle btn-medium-light btn-sm'
									href='https://www.facebook.com/kdkitchennewyork'> <i
									class='fa-icon-facebook text-dark'></i>
								</a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</footer>
	</div>
	<!-- / required javascripts -->
	<!--     <script src="assets/javascripts/jquery/jquery.min.js" type="text/javascript"></script> -->

      <?php
    echo $this->Html->script ( 'bootstrap.min' );
    ?>
    <?php
    echo $this->Html->script ( 'plugins/modernizr.custom.min.js' );
    ?>
    <?php
    echo $this->Html->script ( 'plugins/twitter-bootstrap-hover-dropdown.min.js' );
    ?>
    <?php
    // echo $this->Html->script ( 'plugins/retina.min.js' );
    ?>
    <?php
    echo $this->Html->script ( 'plugins/jquery.knob.js' );
    ?>
    <?php
    echo $this->Html->script ( 'plugins/jquery.isotope.min.js' );
    ?>
    <?php
    echo $this->Html->script ( 'plugins/jquery.isotope.sloppy-masonry.min.js' );
    ?>
    <?php
    echo $this->Html->script ( 'plugins/jquery.validate.min.js' );
    ?>
    <?php
    echo $this->Html->script ( 'plugins/jquery.flexslider.min.js' );
    ?>
    <?php
    echo $this->Html->script ( 'plugins/nivo-lightbox.min.js' );
    ?>
    <?php
    echo $this->Html->script ( 'plugins/jquery.cycle.all.min.js' );
    ?>
    <?php
    echo $this->Html->script ( 'kdk_responsive.js' );
    ?>
<script>
    $(document).ready(function(){
    	setTimeout(function(){
    		   $('.message-container').fadeOut();
        	},2000);
        });
</script>
</body>
</html>
