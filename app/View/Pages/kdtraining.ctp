<?php
echo $this->Html->css ( 'kdpossibility' );
?>

<div id="content">

	<div class="container">
		<div class="page-heading">
			<h1>INSTRUCTOR TRAINING</h1>
			<div class="dot-container">
				<div class="dot"></div>
				<div class="dot"></div>
				<div class="dot"></div>
			</div>
		</div>
	</div>
	<div id="content_kd">
		<div id="page_section1">
			<div class="vertical">
				<h1>KD KITCHENのインストラクターになる</h1>
				<h3>
					KD KITCHEN のインストラクターになるということ、 それはNEW YORKスタイルの知識とライフスタイルを身につけることで、
					自分だけではなく、周りの人をHEALTHY &amp; HAPPYにできるということ。
					自分のペースで働き、周りの人や社会に大きな貢献ができるということ。<br>
					そして自信と魅力が溢れるSEXYな人になれるということです。

				</h3>
				<?php
    // <p style="margin-top: 150px;">
    // <a href="downloadfile" class="orange_box orange_box_border">PDF版ダウンロード</a>
    // </p>
    ?>
			</div>
		</div>
		<?php if(isset( $content['youtube_kdk_intro'])):?>
		<iframe id="ytplayer" type="text/html" width="970" height="550"
			src="https://www.youtube.com/embed/<?php echo $content['youtube_kdk_intro'];?>?autoplay=0"
			frameborder="0" /></iframe>
			<?php endif;?>
		<div style="clear: both; margin-top: 50px;"></div>
		<h2>インストラクターの声</h2>

		<div id="instructor_voice">
			<div id="instructor_voice_1">
				<div id="voice_div_1" class="instructor_pic voice_instructor_active">
					<a href="javascript:void(0)" onclick="changeInstructor(1)">
				    <?php
        echo $this->Html->image ( 'kdpossibility/Mitsuko_S.png', array (
                'height' => '120' 
        ) );
        ?>
        </a>
				</div>
				<div id="voice_div_2"
					class="instructor_pic voice_instructor_not_active">
					<a href="javascript:void(0)" onclick="changeInstructor(2)">
				<?php
    echo $this->Html->image ( 'kdpossibility/Yuka_S.png', array (
            'height' => '120' 
    ) );
    ?>
    </a>
				</div>
				<div id="voice_div_3"
					class="instructor_pic voice_instructor_not_active">
					<a href="javascript:void(0)" onclick="changeInstructor(3)">
				<?php
    echo $this->Html->image ( 'kdpossibility/Yuko.png', array (
            'height' => '120' 
    ) );
    ?>
    </a>
				</div>
				<div id="voice_div_4"
					class="instructor_pic voice_instructor_not_active">
					<a href="javascript:void(0)" onclick="changeInstructor(4)">
				<?php
    echo $this->Html->image ( 'kdpossibility/Rie_T_500.png', array (
            'height' => '120' 
    ) );
    ?>
    </a>
				</div>
				<div style="clear: both;"></div>
				<div class="triangles">
					<div id="triangle_white_1" class="triangle_white first active"></div>
					<div id="triangle_white_2" class="triangle_white"></div>
					<div id="triangle_white_3" class="triangle_white"></div>
					<div id="triangle_white_4" class="triangle_white"></div>
				</div>
				<div style="clear: both;"></div>
				<div>
					<div id="voice_instructor_description">
						<p id="voice_instructor_title">KD KITCHEN インストラクター</p>
						<div>
							<div id="voice_example_1">
								<p id="voice_instructor_name">園部 美津子さん</p>
								<div class="instructor_voice">
									コーチによる30日間カラダの中からキレイになれるライフスタイルチェン
									ジプログラムは最高ですよ！厳しい食事制限をさせられずに、毎日愛あるコー
									チングでリードしてもらえるので本当に心強いですし、確実に結果がでます。
									このプログラムをやる前と後では心と体が全然違う！とってもヘルシーになれました！<br> <br>不安定な便通もすっかり整い、体
									も軽くなり、心も軽くなり、まさに Happy!!!食べることが大好きな私。チョコ、アイス、ケーキ、、、食べてOK!!な
									んですよ？！食べたい物を諦めずにヘルシーな心と体を手に入れることができ
									るって最高ですよね！万年ダイエッターの方には是非是非体験していただきた
									いプログラム。自分の中にHealthy革命を起こしてくれるこのプログラムがつ
									いていて、その他手厚いサポートがあるこの講座は他の健康食系のものより断然価値あるものだと感じます。
								</div>
							</div>
							<div id="voice_example_2" style="display: none;">
								<p id="voice_instructor_name">山本 裕夏さん</p>
								<div class="instructor_voice">
									これを知らずに今後も生きていたと思うと家族の健康はどうなっていただろう？と言ってもいいほど貴重な学びでした。人間、歳を重
									ねていくと、生活習慣や考えといったものは変わりにくいものだと思います。しかし、学んでいくうちにそれまでの考えを覆させられるこ
									とが多くありました。しかも心地よくマインドチェンジを行うことができました。 <br> <br>不安定な便通も
									「健康」なくしては楽しい時間も人生もありません。でも人間は病気から完全に逃れる事はできません。それなら、日頃からの予防がとても大事です。KD＋KDKはそのような本当に大切な事を教えてくれる、料理という媒体を通して人生の質をあげてくれたと思っています。また、そのような学びができたのはコーチのまりさんが本当に熱いパッッションの持ち主で、良いものをみんなに伝えたいという思いが生徒さんたちにも伝わった結果であると思います。
								</div>
							</div>
							<div id="voice_example_3" style="display: none;">
								<p id="voice_instructor_name">柿澤 優子さん</p>
								<div class="instructor_voice">
									最初は何だか楽しそう私もその中に入りたいという思いだけで飛
									び込みました。この講座を受けて食の大切さ、体は食べるもので出来ている事を改めて実感しました。<br> <br>
									私は昔からダイエット、リバウンドを繰り返しながら何年も生活してきました。それは食べずに我慢するダイエットばかりでKDの理念
									とは程遠いものでした。KD生活を始めてからは楽しく運動をして毎日美味しいものを食べているのに体が引き締まり、筋肉が付き、吹
									き出物ばかりの肌がキレイになったり。今までの辛いダイエットはなんだったのだろう?昔の私のように辛いダイエットをしているたくさ
									んの人達にKDを教えてあげたい!!家族や友達にもhealthy、
									sexy、happyになって欲しという気持ちでいっぱいです。これから
									の人生でもう辛いダイエットをする事は二度とないと思うとそれだけでこの講座を受けた価値があったと思っています。
								</div>
							</div>
							<div id="voice_example_4" style="display: none;">
								<p id="voice_instructor_name">高木 利江さん</p>
								<div class="instructor_voice">
									年齢とともに女性は心と体の変化を感じやすく、「自分の中でバランスを保つ努力は必要だな」と、ここ数年思っていました。そんな時に、KDKTICHENに出会いました。大阪のクラスに参加して、今までの食生活が実は体に負担をかけていることを知り体の中からキレイになる方法がとてもシンプルなことを学びました。野菜を使ったレシピはどれも簡単で、素材の持つ美味しさに感動しました。そして何より、クラスがとても楽しかったのです。
									<br> <br>
									資格というと「勉強」というイメージが強かったのですが、覚えるという作業ではなく知ることで納得し、自然に理解が深まっています。最初は不安もありましたが、マリコーチの人柄が表れる、ポジティブで和やかな講座は、気付けば毎週の楽しみになっていました。講座は、インストラクターの資質を高めるための様々な工夫が盛り込まれていて、楽しく学んでいけます。
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div style="clear: both;"></div>
		</div>
		<div style="clear: both; height: 30px;"></div>
		<h2>KDKの収入参考資料</h2>
		<div id="income">
			<div class="income_example">
				子育てをしながら、またはパートタイムで働くには様々な制限が存在します。<br>ご自宅や近場で時間を有効につかいながらクラスを持てたらどうでしょう？<br>KD
				KITCHENインストラクターの収入例をご覧ください。
				<div id="income_ex">
					<a id="income_switch_1" href="javascript:void(0)"
						class="active income_example_switch"><span>主婦パート勤めＡさんの収入例</span></a>
					<a id="income_switch_2" href="javascript:void(0)"
						class="income_example_switch" style="margin-left: -5px;"><span>KDKインストラクターの収入例</span></a>
				</div>
				<div id="income_ex_1">
					<div id="income_content_1" class="income_content">
						<div class="circle">
							<div class="vertical">
								Aさん <br>(主婦)
							</div>
						</div>
						<div style="float: left;">
							<table>
								<tbody>
									<tr>
										<td>環 境</td>
										<td>:</td>
										<td>既婚、子供あり(3人)、パートタイム</td>
									</tr>
									<tr>
										<td>時 給</td>
										<td>:</td>
										<td>800 円 ※週2日労働(1 日あたり4時間)</td>
									</tr>
									<tr>
										<td>月 収</td>
										<td>:</td>
										<td><span class="orange_box">月収:25,600 円</span>&nbsp;&nbsp;&nbsp;&nbsp;<span
											style="line-height: 20px;">※1ヶ月 32 時間労働</span></td>
									</tr>
								</tbody>
							</table>
						</div>
					</div>
					<div style="clear: both;"></div>
					<div class="income_footer">子供がいる為、働ける時間に制限があり、そのため勤務先が限られる=収入も限られるという実態です。</div>
				</div>
				<div id="income_ex_2" style="display: none;">
					<div id="income_content_2" class="income_content">
						<div class="circle">
							<div class="vertical">
								1クラス<br>10人の生徒が<br>参加した場合
							</div>
						</div>
						<div style="float: left;">
							<table style="width: 352px;">
								<tbody>
									<tr>
										<td><nobr>利 益</nobr></td>
										<td>:</td>
										<td>1回平均 25,000円 ※材料費を差し引いた純利益、光熱費は含まず</td>
									</tr>
									<tr>
										<td><nobr>時 給</nobr></td>
										<td>:</td>
										<td>2,778 円 ※1 回のクラスにかかる労働時間は約9時間程です。クラスの拘束時間は2時間半という
											条件を含め時給にすると、¥2,778となります。</td>
									</tr>
									<tr>
										<td><nobr>月 収</nobr></td>
										<td>:</td>
										<td><span class="orange_box">月収:325,000 円</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
											※1ヶ月 32 時間労働</td>
									</tr>
								</tbody>
							</table>
						</div>
					</div>
					<div style="clear: both;"></div>
					<div class="income_footer">クラスの準備は欠かせませんが、 実質のクラス当日の拘束時間は
						2時間半です。何より時間を自由に使えます。</div>
				</div>
			</div>

		</div>
				<div style="margin-top: 50px;">
			<h2>資格取得の流れ</h2>
		</div>

		<div id="shikaku">
			&nbsp;
			<div id="shikaku_nav">
				<a href="#apply" class="nav nav_item_1">
					<div class="shikeku_navi_item active">
						<div class="vertical">01.申し込み</div>
					</div>
				</a> <a href="#session" class="nav nav_item_2">
					<div class="shikeku_navi_item">
						<div class="vertical">02.セッション</div>
					</div>
				</a> <a href="#program" class="nav nav_item_3">
					<div class="shikeku_navi_item">
						<div class="vertical">03.プログラム</div>
					</div>
				</a> <a href="#challenge" class="nav nav_item_4">
					<div class="shikeku_navi_item">
						<div class="vertical">04.テストと課題</div>
					</div>
				</a> <a href="#certification" class="nav nav_item_5">
					<div class="shikeku_navi_item">
						<div class="vertical">05.資格取得</div>
					</div>
				</a> <a href="#dokuritsu" class="nav nav_item_6">
					<div class="shikeku_navi_item">
						<div class="vertical">06.独立</div>
					</div>
				</a>
			</div>
			<div class="triangles">
				<div id="triangle_black_1"
					class="triangle_black first active nav_item_1"></div>
				<div id="triangle_black_2" class="triangle_black nav_item_2"></div>
				<div id="triangle_black_3" class="triangle_black nav_item_3"></div>
				<div id="triangle_black_4" class="triangle_black nav_item_4"></div>
				<div id="triangle_black_5" class="triangle_black nav_item_5"></div>
				<div id="triangle_black_6" class="triangle_black nav_item_6"></div>
			</div>
			<div style="clear: both;"></div>
			<div id="shikaku_description">
				<a href="#apply" class="nav nav_item_1">
					<div class="shikeku_navi_item active">
						<div class="vertical">申し込みは資格取得講座のページかメールにて</div>
					</div>
				</a> <a href="#session" class="nav nav_item_2">
					<div class="shikeku_navi_item">
						<div class="vertical">各プランに応じてコーチがセッションを行います</div>
					</div>
				</a> <a href="#program" class="nav nav_item_3">
					<div class="shikeku_navi_item">
						<div class="vertical">３０日間のライフスタイルチェンジプログラムを実践</div>
					</div>
				</a> <a href="#challenge" class="nav nav_item_4">
					<div class="shikeku_navi_item">
						<div class="vertical">学んだことを再確認する為の卒業テストと、資格取得前に初めてのクラス開催にチャレンジ</div>
					</div>
				</a> <a href="#certification" class="nav nav_item_5">
					<div class="shikeku_navi_item">
						<div class="vertical">資格承認証を授与これ以降はご自分のクラスを開催できます</div>
					</div>
				</a> <a href="#dokuritsu" class="nav nav_item_6">
					<div class="shikeku_navi_item">
						<div class="vertical">独立後も各種サービスをご用意しております</div>
					</div>
				</a>
			</div>
			<div style="clear: both;"></div>
		</div>
	</div>
</div>

		<div class="clear"></div>
		<?php
			echo $this->element ( 'Service/contact' );
			echo $this->element ( 'Service/contact_template' );
		?>
		<div class="kdkplus_link">
		  資格取得講座の詳細は <?php echo $this->Html->link('こちら', '/services')?>
		</div>

<script>
$( document ).ready(function() {
    $('.nav').mouseover(function(){
        $('#shikaku').find('.active').each(function(){
            $(this).removeClass('active');
            });
        
        
        var item_classes = $(this).attr('class');
        var res_classes = item_classes.split(' ');
        $('.' + res_classes[1]).children('div').addClass('active');

        var res = res_classes[1].split('_');
        var id = res[2];
        $('#triangle_black_' + id).addClass('active');
        
       
        });
});
    
    function changeInstructor(id){
        for(var i = 1; i<=4; i++){
            var that= $('#voice_div_' + i);
            if(that.hasClass('voice_instructor_active') == true){
            	that.removeClass('voice_instructor_active');
            	that.addClass('voice_instructor_not_active');

            	var div ="voice_example_" + i;
            	$('#' + div).hide();
            	$('#triangle_white_' + i).removeClass('active');
                }
            if(id == i){
            	that.removeClass('voice_instructor_not_active');
            	that.addClass('voice_instructor_active');
            	var div ="voice_example_" + i;
            	$('#' + div).show();
            	$('#triangle_white_' + i).addClass('active');
                }
        }
        
    }

    $('.income_example_switch').click(function(){
        if($(this).hasClass('active') == true){
            return false;
            }
       
        var thisId = $(this).attr('id');
        var res = thisId.split("_"); 

        var thisId = res[2];
        otherId = 0;
        if(thisId == 1){
        	otherId= 2;
            } else {
            	otherId = 1;
                }
        $('#income_switch_' + otherId).removeClass('active');

        $('#income_ex_' + otherId).hide();
        $('#income_ex_' + thisId).show();
        
        $(this).addClass('active');
        });


</script>
