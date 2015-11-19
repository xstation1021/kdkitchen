<style>
#kd_detail {
	background: transparent url(../img/intro-bg3.jpg) no-repeat;
	background-size: 100% auto;
	height: 100%;
	width: 100%;
}

#detail_background {
	width: 80%;
	height: 80%;
	//background-color: rgba(255, 255, 255, 0.8);
	position: absolute;
	top: 0;
	bottom: 0;
	left: 0;
	right: 0;
	margin: auto;
	position: absolute;
	text-align: center;
}

#popup_title_extra_text {
	font-size: 46px;
	font-family: "NotoSans-Light";
	color:#ffbf00;
	margin-top:120px;
	margin-bottom:0px;
}

#popup_title_text {
	font-size: 25px;
	font-family: "NotoSans-Black";
	letter-spacing: 0.1em;
	margin-bottom:10px;
	color:#ffbf00;
	margin-top:0;
}

.popup_main_text {
	font-size: 12px;
	line-height: 2.25;
	font-family: "NotoSans-Light";
	color: white;
	letter-spacing:0.05em;
	line-height:2;
	margin:0;
	padding:0;
}

#detail_process{
    font-family: "NotoSans-Regular";
    font-size:22px;
    border: 2px solid #ffbf00;
    padding:5px 20px 5px 20px;
}

.signup-modal {
	height: 530px;
	width: 800px;
	margin: 0 auto;
	position: relative;
	-webkit-box-shadow: 0 7px 7px rgba(0, 0, 0, 0.75);
	-moz-box-shadow: 0 7px 7px rgba(0, 0, 0, 0.75);
	box-shadow: 0 7px 7px rgba(0, 0, 0, 0.75);
	background-color: white;
	z-index: 999;
}

.ss-slider .active-slide-bar,.ss-slider .buttons-container {
	z-index: -1;
}

#detail_paragraph{
    margin-top:20px;
    font-size:14px;
    letter-spacing : 0.05em;
}
</style>

<div id="ContactPopup" class="signup-modal mfp-hide">
	<div id="kd_detail">

		<div id="detail_background">
		  <p id="popup_title_extra_text">2015 Summer</p>
			<h2 id="popup_title_text">KD KITCHENインストラクター資格取得講座</h2>
				<p class="popup_main_text">この夏、東京と大阪でKD KITCHENインストラクター資格取得講座を開催!</p>

<p class="popup_main_text">2日間でNYスタイルの体の中からキレイになる方法と</p>
<p class="popup_main_text">KD KITCHENのビジネスノウハウをしっかり学び</p>
<p class="popup_main_text">30日間で自分のマインドと体をNYスタイルにチェンジ。</p>
<p class="popup_main_text">NYスタイルがしっかり身についたら、KD KITCHENのインストラクターとして</p>
<p class="popup_main_text">周りの人をNY流に、Healthy, Sexy, Happyに導く舞台があなたを待っています。</p>
<p class="popup_main_text">それがKD KITCHENの使命と目標です。</p>
			<p id="detail_paragraph"><a id="detail_process" href="/services/special">詳しくはこちら</a></p>

		</div>
	</div>
	
</div>

<script>
$( document ).ready(function() {
	setTimeout(function(){
		$.magnificPopup.open({
		    items: {
		        src: '#ContactPopup',
		        type: 'inline',
		    },
		    showCloseBtn: false
		});
    }, 1500);
	
});
</script>