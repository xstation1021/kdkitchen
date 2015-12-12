<?php
/**
 *
 * PHP 5
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright 2005-2012, Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright 2005-2012, Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       Cake.View.Layouts
 * @since         CakePHP(tm) v 0.10.0.1076
 * @license       MIT License (http://www.opensource.org/licenses/mit-license.php)
 */

//$cakeDescription = __d('cake_dev', 'CakePHP: the rapid development php framework');
?>

<!DOCTYPE html>

<!--[if IE 7]>                  <html class="ie7 no-js" lang="en">     <![endif]-->
<!--[if lte IE 8]>              <html class="ie8 no-js" lang="en">     <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!--> <html class="not-ie no-js" lang="en">  <!--<![endif]-->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="description" content="">
    <meta name="author" content="Naofumi Ezaki">
    <meta name="author" content="Rebecca Thompson">
    <!--
    <meta name="viewport" content="width=device-width, initial-scale=1">
	-->
    <title>KD KITCHEN</title>
	
	<meta name="description" content="NYで生まれた体の中からキレイになる食事方法と美味しいレシピでHealthy, Sexy, Happyな体を目指すクッキングクラス。インストラクターとして活躍できる資格プログラムも提供しています。">

	<?php
        echo $this->Html->meta(
        'favicon.ico',
        '/favicon.ico',
        array('type' => 'icon')
        );

        echo $this->Html->css('https://fonts.googleapis.com/css?family=Lato:400,700,900,400italic,700italic,900italic');
		echo $this->html->css('main.css?v=1.1');
        echo $this->Html->css('/modules/Magnific-Popup/dist/magnific-popup.css');

		echo $this->Html->script('jquery.min');
		echo $this->Html->script('jquery.transit.min.js');
        echo $this->Html->script('respond.min');
        echo $this->Html->script('jquery.easing-1.3.min');
        echo $this->Html->script('jquery.SSSlider');
        echo $this->Html->script('jquery.jcarousel.min');
        echo $this->Html->script('jquery.cycle.all.min');
        //echo $this->Html->script('modernizr.custom');
        echo $this->Html->script('/modules/Magnific-Popup/dist/jquery.magnific-popup.min.js');
		echo $this->Html->script('/modules/tinymce/tinymce.min');

	    echo $this->Html->script('https://maps.google.com/maps/api/js?sensor=false');
	    echo $this->Html->script('jquery.gmap.min');
        
        echo $this->Html->script('main');
        echo $this->fetch('meta');
		echo $this->fetch('css');
		echo $this->fetch('script');
    ?>


    <!--[if !lte IE 6]><!-->
        <!--[if lt IE 9]> <script src="js/selectivizr-and-extra-selectors.min.js"></script> <![endif]-->
    <!--<![endif]-->

	<!--[if !lte IE 6]><!-->
		<link rel="stylesheet" href="//fonts.googleapis.com/css?family=Open+Sans:400,600,300,800,700,400italic|PT+Serif:400,400italic" />
	<!--<![endif]-->

	<!--[if lte IE 6]>
		<link rel="stylesheet" href="//universal-ie6-css.googlecode.com/files/ie6.1.1.css" media="screen, projection">
	<![endif]-->
</head>
<body>
    	<div id="header" class="container">
            <?php echo $this->Html->link($this->Html->image('logo.png'), '/', array('id' => 'logo', 'escape'=>False));?>
    		<ul id="nav">
    			<li>
    				<a href="/services" data-description="インストラクター"><span>Become an Instructor</span>
    				<div class="dot-container">
    					<div class="dot"></div>
    					<div class="dot"></div>
    					<div class="dot"></div>
                    </div>
                    </a>
       				<ul style="display: none;">
       				     <li><a href="/services">講座内容</a></li>
                        <li><a href="/pages/kdtraining">KD KITCHENインストラクター</a></li>
                    </ul/>
    			</li>
     			<li>
    				<a href="/user_pages/area/" data-description="クラス"><span>Classes</span>
    				<div class="dot-container">
    					<div class="dot"></div>
    					<div class="dot"></div>
    					<div class="dot"></div>
    				</div>
                    </a>
       				<ul style="display: none;">
                        <li><a href="/user_pages/area/">KD KITCHENに参加する</a></li>
                        <li><a href="/pages/workshops">Workshops</a></li>
                    </ul>
    			</li>
    			
                <li>
                    <a href=/pages/whatiskdk data-description="アバウト"><span>About</span>
                    <div class="dot-container">
                        <div class="dot"></div>
                        <div class="dot"></div>
                        <div class="dot"></div>
                    </div>
                    </a>
       				<ul style="display: none;">
                        <li><a href="/pages/whatiskdk">KD KITCHENとは</a></li>
                        <li><a href="/pages/kdchefs">NY シェフ</a></li>
                        <li><a href="/questions">よくあるご質問</a></li>
                    </ul>
                </li>
                
                <?php 
                /*
                <li>
    				<a href="/posts/index/report" data-description="ブログ"><span>Blogs</span>
    				<div class="dot-container">
    					<div class="dot"></div>
    					<div class="dot"></div>
    					<div class="dot"></div>
    				</div>
                    </a>
    				<ul style="display: none;">
    				<li><a href="/posts/index/report">レポート</a></li>
                        <li><a href="/posts/index/recipe">レシピ</a></li>
                    </ul>
    			</li>
    			*/
    			?>
    			
                <?php if($logged_user) {?>
                <li>
    				<a href="/recipes/index" data-description="レシピ"><span>Recipe</span>
        				<div class="dot-container">
        					<div class="dot"></div>
        					<div class="dot"></div>
        					<div class="dot"></div>
        				</div>
                    </a>
    				<ul style="display: none;">
                        <li><a href="/recipes/index">レシピ</a></li>
                    </ul>
			    </li>
                <?php }?>
    			
    			
    			
    			<li>
                    <?php if($logged_user) {?>
                    <a href="/users/view" data-description="<?php echo $logged_user['username'];?>">アカウント設定
                    <?php } else {?>
                    <a href="/users/login" data-description="ログイン">Login
                    <?php }?>
    				<div class="dot-container">
    					<div class="dot"></div>
    					<div class="dot"></div>
    					<div class="dot"></div>
    				</div>
                    </a>
    				<ul style="display: none;">
                        <?php if($logged_user) {?>
                        <li><a href="/users/view">アカウント設定</a></li>
                        <li><a href="/users/logout">ログアウト</a></li>
                        <?php } else {?>
                        <li><a href="/users/login">ログイン</a></li>
                        <?php }?>
                        <?php if(isset($logged_user['is_admin']) && $logged_user['is_admin'] == True) {?>
                        <!--<li><a href="/users/add">ユーザー登録</a></li>-->
                        <?php } ?>
                    </ul>
    			</li>
    			 <?php if($logged_user && $logged_user['is_admin'] == 0  &&isset($subscribed) && $subscribed == true) {?>
                <li>
    				<a id="cart" href="/payments/purchase"><span id="cart_item_number"><?php echo $shopping_cart_count;?></span><?php echo $this->Html->Image('cart.png');?></a>
			    </li>
                <?php }?>
    		</ul>
    	</div>
        <div id="content">
            <?php echo $this->Session->flash(); ?>
            <?php echo $this->fetch('content'); ?>
        </div>
        <div id="footer">
        	<div class="container cf">
        		<ul id="nav-footer">
                    <li><?php echo $this->Html->link('KDNY シェフ', array('controller'=>'pages', 'action'=>'kdchefs'));?></li>
        			<li><?php echo $this->Html->link('インストラクター', array('controller'=>'user_pages', 'action'=>'area'));?></li>
        			<li><?php echo $this->Html->link('ブログ', array('controller'=>'posts', 'action'=>'index', 'recipe'));?></li>
        			<li class="last"><?php echo $this->Html->link('会社概要', array('controller'=>'pages', 'action'=>'companyinfo'));?></li>
        		</ul>
        		<ul class="contact-info col-two-third">
                    <!--
        			<li class="address"><span class="icon icon-address"></span>123 Example Street, Queens NY, 11102</li>
        			<li class="phone"><span class="icon icon-phone"></span>(123) 456-7890</li>
                    -->
        			<li class="email"><span class="icon icon-email"></span><a href="mailto:info@kdkitchen.com">info@kdkitchen.com</a></li>
        		</ul>
        		<ul class="social-links col-one-third last">
                    <li class="fb"><?php echo $this->Html->link('<span class="icon icon-fb"></span>', 'https://www.facebook.com/kdkitchennewyork', array('escape'=>false));?></li>
                    <li class="yt"><?php echo $this->Html->link('<span class="icon icon-yt"></span>', 'https://www.youtube.com/user/KaradaDetox', array('escape'=>false));?></li>
                    <li class="ig"><?php echo $this->Html->link('<span class="icon icon-ig"></span>', 'https://instagram.com/kdkitchen/', array('escape'=>false));?></li>
        		</ul>
                <span class="copyright">Copyright &#169; Karada Detox, LLC</span>
        	</div>
        </div>

</body>
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-59140319-1', 'auto');
  ga('send', 'pageview');

</script>
</html>
