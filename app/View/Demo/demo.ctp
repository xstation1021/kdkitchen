<!DOCTYPE html>
<html lang="en">

<head>

<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="description" content="">
<meta name="author" content="">

<title>KD Kitchen</title>

<!-- Bootstrap Core CSS -->
    <?php
    echo $this->Html->css ( 'bootstrap.min' );
    ?>
    
    <?php
    echo $this->Html->css ( 'stylish-portfolio' );
    ?>

    <!-- Custom CSS -->
     <?php
    echo $this->Html->css ( 'grayscale' );
    ?>
    
    

    <!-- Custom Fonts -->
<link href="/font-awesome/css/font-awesome.min.css" rel="stylesheet"
	type="text/css">
<link
	href="http://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic"
	rel="stylesheet" type="text/css">
<link href="http://fonts.googleapis.com/css?family=Montserrat:400,700"
	rel="stylesheet" type="text/css">


    <?php
    echo $this->Html->css ( 'demo' );
    ?>
 <style>
body {
	background-color: white;
}
.row {
	padding-top: 180px;
}

@media screen and (max-width: 767px) {
	.navbar-custom {
		background-color: orange;
	}
	.test {
		position: relative;
		position: relative;
		top: -80%;
		transform: translateY(80%);
	}
}

@media ( min-width :761px) and (max-width: 1200px) {
	.test {
		position: relative;
		position: relative;
		top: -20%;
		transform: translateY(20%);
	}
}

@media ( max-width : 760px) {
	.test {
		padding-top: 200px;
		position: relative;
		position: relative;
		top: -30%;
		transform: translateY(30%);
	}
}

@media only screen and (min-device-width: 480px){
.test {
		padding-top: 200px;
		position: relative;
		position: relative;
		top: -30%;
		transform: translateY(30%);
	}
}
@media only screen and (min-device-width: 768px){
.test {
		padding-top: 200px;
		position: relative;
		position: relative;
		top: -10%;
		transform: translateY(10%);
	}
}

.top-nav-collapse {
	background-color: orange;
}

.btn-light {
	background-color: rgb(255, 255, 255);
	border-radius: 0;
	color: #333;
}

.row {
	padding-top: 40px;
}

@media ( min-width :761px) {
	#logo {
		position: relative;
		top: -20px;
	}
}

@media ( max-width :760px) {
	#logo {
		position: relative;
		top: -10px;
	}
}
</style>

</head>

<body id="page-top" data-spy="scroll" data-target=".navbar-fixed-top">

	<!-- Navigation -->
	<nav class="navbar navbar-custom navbar-fixed-top"2="navigation">
		<div class="container">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle" data-toggle="collapse"
					data-target=".navbar-main-collapse">
					<i class="fa fa-bars"></i>
				</button>
				<a class="navbar-brand page-scroll" href="#page-top"> <img id="logo"
					src="/img/logo.png" height="60px;" width="60px;">
				</a>
			</div>

			<!-- Collect the nav links, forms, and other content for toggling -->
			<div
				class="collapse navbar-collapse navbar-right navbar-main-collapse">
				<ul class="nav navbar-nav">
					<!-- Hidden li included to remove active class from about link when scrolled up past about section -->
					<li class="hidden active"><a href="#page-top"></a></li>
					<li class="dropdown"><a aria-expanded="true" role="button"
						data-toggle="dropdown" class="dropdown-toggle" href="#">Training <span
							class="caret"></span></a>
						<ul role="menu" class="dropdown-menu">
							<li><a href="#">インストラクター資格取得</a></li>
							<li><a href="#">資格の可能性</a></li>
						</ul></li>
					<li class="dropdown"><a aria-expanded="true" role="button"
						data-toggle="dropdown" class="dropdown-toggle" href="#">Classes <span
							class="caret"></span></a>
						<ul role="menu" class="dropdown-menu">
							<li><a href="#">KD Kitchenに参加する</a></li>
						</ul></li>
					<li class="dropdown"><a aria-expanded="true" role="button"
						data-toggle="dropdown" class="dropdown-toggle" href="#">About <span
							class="caret"></span></a>
						<ul role="menu" class="dropdown-menu">
							<li><a href="#">KD Kitchenとは</a></li>
							<li><a class="page-scroll" href="#chef">KD シェフ</a></li>
							<li><a href="#">よくあるご質問</a></li>
						</ul></li>

					<li class="dropdown"><a aria-expanded="true" role="button"
						data-toggle="dropdown" class="dropdown-toggle" href="#">Blog <span
							class="caret"></span></a>
						<ul role="menu" class="dropdown-menu">
							<li><a href="#">レポート</a></li>
							<li><a href="#">レシピ</a></li>
						</ul></li>
					<li><a class="page-scroll" href="#">Recipe</a></li>
					<li><a class="page-scroll" href="#">Login</a></li>
				</ul>
			</div>
			<!-- /.navbar-collapse -->
		</div>
		<!-- /.container -->
	</nav>

	<!-- Intro Header -->
	<header class="intro">
		<div class="intro-body">
			<div class="container">
				<div class="row">
					<div class="col-md-8 col-md-offset-2 test">
						<h5 class="intro-text">Healthy, Sexy, Happy</h5>
						<h2 class="brand-heading">KD Kitchen</h2>
					</div>
				</div>
			</div>
		</div>
	</header>

	<!-- Services -->
	<!-- The circle icons use Font Awesome's stacked icon classes. For more information, visit http://fontawesome.io/examples/ -->
	<section id="services" class="services bg-primary">
		<div class="container">
			<div class="row text-center">
				<div class="col-lg-10 col-lg-offset-1">
					<h2>サービス</h2>
					<hr class="small">
					<div class="row">
						<div class="col-md-3 col-sm-6">
							<div class="service-item">
								<span class="fa-stack fa-4x"> <i
									class="fa fa-circle fa-stack-2x"></i> <i
									class="fa fa-graduation-cap fa-stack-1x text-primary"></i>
								</span>
								<h4>
									<strong>Training</strong>
								</h4>
								<a href="#" class="btn btn-light">Learn More</a>
							</div>
						</div>
						<div class="col-md-3 col-sm-6">
							<div class="service-item">
								<span class="fa-stack fa-4x"> <i
									class="fa fa-circle fa-stack-2x"></i> <i
									class="fa fa-users fa-stack-1x text-primary"></i>
								</span>
								<h4>
									<strong>Join Classes</strong>
								</h4>
								<a href="#" class="btn btn-light">Learn More</a>
							</div>
						</div>
						<div class="col-md-3 col-sm-6">
							<div class="service-item">
								<span class="fa-stack fa-4x"> <i
									class="fa fa-circle fa-stack-2x"></i> <i
									class="fa fa-shopping-cart fa-stack-1x text-primary"></i>
								</span>
								<h4>
									<strong>Shop</strong>
								</h4>
								<a href="#" class="btn btn-light">Learn More</a>
							</div>
						</div>
						<div class="col-md-3 col-sm-6">
							<div class="service-item">
								<span class="fa-stack fa-4x"> <i
									class="fa fa-circle fa-stack-2x"></i> <i
									class="fa fa-pencil fa-stack-1x text-primary"></i>
								</span>
								<h4>
									<strong>Blog</strong>
								</h4>
								<a href="#" class="btn btn-light">Learn More</a>
							</div>
						</div>
					</div>
					<!-- /.row (nested) -->
				</div>
				<!-- /.col-lg-10 -->
			</div>
			<!-- /.row -->
		</div>
		<!-- /.container -->
	</section>

	<!-- Portfolio -->
	<section id="chef" class="portfolio">
		<div class="container">
			<div class="row">
				<div class="col-lg-10 col-lg-offset-1 text-center">
					<h2 style="color: black;">シェフ</h2>
					<hr class="small">
					<div class="row">
						<div class="col-md-6">
							<div class="portfolio-item">
								<a href="#"> <img class="img-portfolio img-responsive"
									src="/img/chefs/chef-mike.jpg">
								</a>
							</div>
						</div>
						<div class="col-md-6">
							<div class="portfolio-item">
								<a href="#"> <img class="img-portfolio img-responsive"
									src="/img/chefs/chef-matt.jpg">
								</a>
							</div>
						</div>
						<div class="col-md-6">
							<div class="portfolio-item">
								<a href="#"> <img class="img-portfolio img-responsive"
									src="/img/chefs/chef-kimiko.jpg">
								</a>
							</div>
						</div>
						<div class="col-md-6">
							<div class="portfolio-item">
								<a href="#"> <img class="img-portfolio img-responsive"
									src="/img/chefs/chef-shiho.jpg">
								</a>
							</div>
						</div>
					</div>
					<!-- /.row (nested) -->
				</div>
				<!-- /.col-lg-10 -->
			</div>
			<!-- /.row -->
		</div>
		<!-- /.container -->
	</section>

	<!-- Call to Action -->
	<aside class="call-to-action bg-primary">
		<div class="container">
			<div class="row">
				<div class="col-lg-12 text-center">
					<h3>The buttons below are impossible to resist.</h3>
					<a href="#" class="btn btn-lg btn-light">Click Me!</a> <a href="#"
						class="btn btn-lg btn-dark">Look at Me!</a>
				</div>
			</div>
		</div>
	</aside>

	<div class="content-section-a">

		<div class="container">
			<h2 style="text-align: center;">What is KD Kitchen?</h2>
			<div class="row">
				<div class="col-lg-5 col-sm-6">
					<hr class="section-heading-spacer">
					<div class="clearfix"></div>
					<h2 class="section-heading">NEW YORK生まれのKD KITCHEN</h2>
					<p class="lead">体の中からキレイに、ヘルシー、セクシー、そして
						ハッピーな自分を手に入れる為の「食べ方と美味しいレシピ」を紹介しながら、世界中の方を 健康に、そして幸せに導くことを目指すNew
						Yorkスタイルのダイエットクッキングクラスです。</p>
				</div>
				<div class="col-lg-5 col-lg-offset-2 col-sm-6">
					<img class="img-responsive" src="/img/info-what_is_kdk.jpg" alt="">
				</div>
			</div>

		</div>
		<!-- /.container -->

	</div>
	<!-- /.content-section-a -->
	<div class="content-section-b">

		<div class="container">
			<h2 style="text-align: center;">Instructor Training</h2>
			<div class="row">
				<div class="col-lg-5 col-lg-offset-1 col-sm-push-6  col-sm-6">
					<hr class="section-heading-spacer">
					<div class="clearfix"></div>
					<h2 class="section-heading">インストラクターになる</h2>
					<p class="lead">NYから届くレシピを使ってKD KITCHENのインストラクターとして活躍してみませんか</p>
				</div>
				<div class="col-lg-5 col-sm-pull-6  col-sm-6">
					<img class="img-responsive" src="/img/home-main-bucket-2.jpg"
						alt="">
				</div>
			</div>

		</div>
		<!-- /.container -->

	</div>
	<!-- /.content-section-b -->

	<div class="content-section-a">

		<div class="container">
			<h2 style="text-align: center;">Find KD Kitchen</h2>
			<div class="row">
				<div class="col-lg-5 col-sm-6">
					<hr class="section-heading-spacer">
					<div class="clearfix"></div>
					<h2 class="section-heading">NEW YORK生まれのKD KITCHEN</h2>
					<p class="lead">KD Kitchenのクッキングクラスに参加して、NY流に美味しく美しい体にダイエット。</p>
				</div>
				<div class="col-lg-5 col-lg-offset-2 col-sm-6">
					<img class="img-responsive" src="/img/info-what_is_kdk.jpg" alt="">
				</div>
			</div>

		</div>
		<!-- /.container -->

	</div>
	<!-- /.content-section-a -->
	<div class="content-section-b">

		<div class="container">
			<h2 style="text-align: center;">ニュースレター</h2>
			<div class="row">
				<div class="col-lg-5 col-lg-offset-1 col-sm-push-6  col-sm-6">
					<hr class="section-heading-spacer">
					<div class="clearfix"></div>
					<h2 class="section-heading">NYからの最新情報の購読</h2>
					<p class="lead">ニューヨークからの最新のヘルシーな情報をえて、心も体もHealthy, Sexy, Happy!</p>
				</div>
				<div class="col-lg-5 col-sm-pull-6  col-sm-6">
					<img class="img-responsive" src="/img/home-main-bucket-4.jpg"
						alt="">
				</div>
			</div>

		</div>
		<!-- /.container -->

	</div>
	<!-- /.content-section-b -->
	<!-- Call to Action -->
	<aside class="call-to-action bg-primary">
		<div class="container">
			<div class="row">
				<div class="col-lg-12 text-center">
					<h3>The buttons below are impossible to resist.</h3>
					<a href="#" class="btn btn-lg btn-light">Click Me!</a> <a href="#"
						class="btn btn-lg btn-dark">Look at Me!</a>
				</div>
			</div>
		</div>
	</aside>

	<!-- Contact Section -->
	<section id="contact" class="container text-center">
		<div class="col-xs-12 viddler-wrapper">
			<div id="video-overlayer-inner-wrap-id-1"
				class="video-overlayer-inner-wrap"
				style="padding-top: 63.389830508474574%;">
				<iframe id="ytplayer" type="text/html" width="970" height="550"
					src="https://www.youtube.com/embed/DzYYFBxbYnk?autoplay=0&html5=1"
					frameborder="0" /></iframe>
			</div>
		</div>
	</section>

	<!-- Call to Action -->
	<aside class="call-to-action bg-primary">
		<div class="container">
			<div class="row">
				<div class="col-lg-12 text-center">
					<h3>Contact US</h3>
					<a href="#" class="btn btn-lg btn-light">Click Me!</a> <a href="#"
						class="btn btn-lg btn-dark">Look at Me!</a>
				</div>
			</div>
		</div>
	</aside>

	<!-- Footer -->
	<footer>
		<div class="container">
			<div class="row">
				<div class="col-lg-10 col-lg-offset-1 text-center">
					<h4>
						<strong>KD Kitchen</strong>
					</h4>
					<p>
						75 Wall Street <br>New York, NY 10005 U.S.A.
					</p>
					<ul class="list-unstyled">
						<li><i class="fa fa-phone fa-fw"></i> 050-3136-7222</li>
						<li><i class="fa fa-envelope-o fa-fw"></i> <a
							href="mailto:info@kdkitchenny.com">info@kdkitchenny.com </a></li>
					</ul>
					<br>
					<ul class="list-inline">
						<li><a href="#"><i class="fa fa-facebook fa-fw fa-3x"></i></a></li>
						<li><a href="#"><i class="fa fa-youtube fa-fw fa-3x"></i></a></li>
					</ul>
					<hr class="small">
					<p class="text-muted">Copyright &copy; KD Kitchen 2012-<?php echo date('Y')?></p>
				</div>
			</div>
		</div>
	</footer>



	<!-- Footer -->
	<footer>
		<div class="container text-center">
			<p>Copyright &copy; Your Website 2014</p>
		</div>
	</footer>

 <?php
echo $this->Html->script ( 'jquery-1.11.2.min' );
?>

    <!-- Bootstrap Core JavaScript -->
     <?php
    echo $this->Html->script ( 'bootstrap.min' );
    ?>

    <!-- Plugin JavaScript -->
    <?php
    echo $this->Html->script ( 'jquery.easing.min' );
    ?>


	<!-- Custom Theme JavaScript -->
    <?php
    echo $this->Html->script ( 'grayscale' );
    ?>

</body>

</html>
