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
					KD KITCHEN のインストラクターになるということ、それは New York スタイルの知識を身につけ、<br>
					自分だけではなく周りの人をも Healthy &amp; Happy にできるということ。
				</h3>
			</div>
		</div>
        <div align="center">
            <span class="orange_box orange_box_border">
               PDF版ダウンロード
            </span></div>
		<div> 
			<h2>資格取得の流れ</h2>
		</div>

		<div id="shikaku">
			&nbsp;
			<div id="shikaku_nav">
				<a href="javascript:void(0);" class="nav nav_item_1">
					<div class="shikeku_navi_item active">
						<div class="vertical">01.申し込み</div>
					</div>
				</a> <a href="javascript:void(0);" class="nav nav_item_2">
					<div class="shikeku_navi_item">
						<div class="vertical">02.セッション</div>
					</div>
				</a> <a href="javascript:void(0);" class="nav nav_item_3">
					<div class="shikeku_navi_item">
						<div class="vertical">03.プログラム</div>
					</div>
				</a> <a href="javascript:void(0);" class="nav nav_item_4">
					<div class="shikeku_navi_item">
						<div class="vertical">04.チャレンジ</div>
					</div>
				</a> <a href="javascript:void(0);" class="nav nav_item_5">
					<div class="shikeku_navi_item">
						<div class="vertical">05.資格取得</div>
					</div>
				</a> <a href="javascript:void(0);" class="nav nav_item_6">
					<div class="shikeku_navi_item">
						<div class="vertical">06.独立</div>
					</div>
				</a>
			</div>
			<div id="square_animation">
				<div id="triangle"></div>
			</div>
			<div style="clear: both;"></div>
			<div id="shikaku_description">
				<a href="javascript:void(0);" class="nav nav_item_1">
					<div class="shikeku_navi_item active">
						<div class="vertical">申し込みは資格取得講座のページかメールにて</div>
					</div>
				</a>
				<a href="javascript:void(0);" class="nav nav_item_2">
				<div class="shikeku_navi_item">
					<div class="vertical">各プランに応じてコーチがセッションを行います</div>
				</div>
				</a>
				<a href="javascript:void(0);" class="nav nav_item_3">
				<div class="shikeku_navi_item">
					<div class="vertical">３０日間のライフスタイルチェンジプログラムを実践</div>
				</div>
				</a>
				<a href="javascript:void(0);" class="nav nav_item_4">
				<div class="shikeku_navi_item">
					<div class="vertical">資格取得前に初めてのクラス開催にチャレンジ</div>
				</div>
				</a>
				<a href="javascript:void(0);" class="nav nav_item_5">
				<div class="shikeku_navi_item">
					<div class="vertical">資格承認証を授与これ以降はご自分のクラスを開催できます</div>
				</div>
				</a>
				<a href="javascript:void(0);" class="nav nav_item_6">
				<div class="shikeku_navi_item">
					<div class="vertical">独立後も各種サービスをご用意しております</div>
				</div>
				</a>
			</div>
			<div style="clear: both;"></div>
		</div>
		<div style="clear: both; margin-top:30px;"></div>
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
				<div class="instructor_border"></div>
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
				<div class="instructor_border"></div>
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
				<div class="instructor_border"></div>
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
									「健康」なくしては楽しい時間も人生もありません。でも人間は病気から完全に逃れる事はできません。それなら、日頃からの予防がとても大事です。KD＋KDKはそのような本当に大切な事を教えてくれる、料理をいう媒体を通して人生の質をあげてくれたと思っています。また、そのような学びができたのはコーチのまりさんが本当に熱いパッッションの持ち主で、良いものをみんなに伝えたいという思いが生徒さんたちにも伝わった結果であると思います。
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
								<p id="voice_instructor_name">高木 杉江さん</p>
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
						class="income_example_switch"><span>KDKインストラクターの収入例</span></a>
				</div>
				<div id="income_ex_1">
					<div class="income_content">
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
										<td>既婚、子供あり(3人)、パートタイム</td>
									</tr>
									<tr>
										<td>時 給</td>
										<td>:</td>
										<td>800 円 ※週2日労働(1 日あたり4時間)</td>
									</tr>
									<tr>
										<td>月 収</td>
										<td>:</td>
										<td><span class="orange_box">月収:25,600 円</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;※1ヶ月
											32 時間労働</td>
									</tr>
								</tbody>
							</table>
						</div>
					</div>
					<div style="clear: both;"></div>
					<div class="income_footer">子供がいる為、働ける時間に制限があり、そのため勤務先が限られる=収入も限られるという実態です。</div>
				</div>
				<div id="income_ex_2" style="display: none;">
					<div class="income_content">
						<div class="circle">
							<div class="vertical">
								1クラス<br>10人の生徒が<br>参加した場合
							</div>
						</div>
						<div style="float: left;">
							<table style="width: 400px;">
								<tbody>
									<tr>
										<td><nobr>利 益</nobr></td>
										<td>:</td>
										<td>1回 平均 25,000 円 ※材料費を差し引いた純利益、光熱費は含まず</td>
									</tr>
									<tr>
										<td><nobr>時 給</nobr></td>
										<td>:</td>
										<td>2,778 円 ※1 回のクラスにかかる労働時間は 約 9 時間程です。クラスの拘束時間は 2 時間半という
											条件を含め時給にすると、¥2,778 となります。</td>
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
					<div class="income_footer">クラスの準備は欠かせませんが、 実質のクラス当日の拘束時間は
						2時間半です。何より時間を自由に使えます。</div>
				</div>
			</div>

		</div>
		<div style="clear: both; height: 30px;"></div>
		<h2>資格取得の流れ</h2>
		<div id="certification_flow_1">
			<div class="certification_flow_title_orange">
				<div class="vertical">
					資格取得講座に<br>含まれるもの
				</div>
			</div>
			<div class="certification_flow_content">
				<div class="certification_flow_1_content_title">
					<div class="vertical">資格承認証</div>
				</div>
				<div class="certification_flow_1_content_item">
					<div class="vertical">KD KITCHEN インストラクターディプロマ</div>
				</div>
				<div style="clear: both; margin-bottom: 15px;"></div>
				<div class="certification_flow_1_content_title">
					<div class="vertical">資格取得講座</div>
				</div>
				<div class="certification_flow_1_content_item">
					<div class="vertical" style="text-align: left;">
						Karada Detoxの体の中からキレイになる為の食生活、ライフスタイル及び KD KITCHENの概念、クラス運営方法や<br>テクニックの習得
					</div>
				</div>
				<div style="clear: both; margin-bottom: 15px;"></div>
				<div class="certification_flow_1_content_title">
					<div class="vertical">プログラム</div>
				</div>
				<div class="certification_flow_1_content_item">
					<div class="vertical">Karada Detox 30 日間 Healthy is Sexy
						ライフスタイルチェンジプログラム</div>
				</div>
			</div>
			<div style="clear: both; margin-bottom: 15px;"></div>
			<div id="certification_flow_2">
				<div class="certification_flow_title_normal_arrow">
					<div class="vertical_25">申し込み</div>
				</div>
				<div class="certification_flow_content">
					<table id="apply_table">
						<tr>
							<td><nobr>費用</nobr></td>
							<td class="arrow"><nobr>▶</nobr></td>
							<td>"セッション"の料金を参照</td>
						</tr>
						<tr>
							<td><nobr>お申し込み先</nobr></td>
							<td class="arrow"><nobr>▶</nobr></td>
							<td><span class="orange_box"><a href="mailto:info@kdkitchen.com" target="blac">info@kdkitchen.com</a></span> もしくは、 <span
								class="orange_box">インストラクター資格取得講座 予約・コンタクト</span></td>
						</tr>
						<tr>
							<td></td>
							<td></td>
							<td>※お名前とお電話番号、お申し込みご希望の旨をお知らせ下さい。お申し込みを頂いてから 3 日以内にお支払い下さい。</td>
						</tr>
						<tr>
							<td style="vertical-align: top;"><nobr>資格費用支払い</nobr></td>
							<td class="arrow vertical_td" style="vertical-align: top;"><nobr>▶</nobr></td>
							<td style="vertical-align: top; padding: 0 0 0 5px;">
								<ul style="list-style-type: square;">
									<li>ゆうちょ銀行 普通預金 店番 : 418 口座番号 : 0188458 口座名義 : クロダ マリ</li>
									<li>パソコンがあり、メール送信等の基本操作ができる方。ワード、エクセルソフトがあれば尚可。</li>
								</ul>
							</td>
						</tr>
						<tr>
							<td><nobr>応募条件</nobr></td>
							<td class="arrow"><nobr>▶</nobr></td>
							<td>パソコンがあり、メール送信等の基本操作ができる方。ワード、エクセルソフトがあれば尚可。</td>
						</tr>
					</table>
				</div>
				<div style="clear: both; margin-bottom: 15px;"></div>
				<div class="certification_flow_title_normal_arrow">
					<div class="vertical_25">セッション</div>
				</div>
				<div class="certification_flow_content">
					<table id="sesscion_table">
						<tr>
							<th><nobr>セッション</nobr></th>
							<th><nobr>KDK Private Instructor training</nobr></th>
							<th><nobr>KDK Instructor training</nobr></th>
							<th><nobr>KDK Skype Instructor training</nobr></th>
						</tr>
						<tr>
							<td><nobr>レッスンの場所</nobr></td>
							<td>日本国内どこでも<br>生徒の希望地(<span style="color: #ffbf00;">※</span>キッチン要)
							</td>
							<td>東 京<br>KDKが用意
							</td>
							<td>from New York<br>-
							</td>
						</tr>
						<tr>
							<td><nobr>料 金</nobr></td>
							<td><nobr>¥3,500,000/セッション(税別)</nobr></td>
							<td>¥285,000/人(税別)</td>
							<td>$1,480/人(税別)</td>
						</tr>
						<tr>
							<td><nobr>お支払い方法</nobr></td>
							<td>銀行振込</td>
							<td>銀行振込</td>
							<td>クレジットカード($決済)</td>
						</tr>
						<tr>
							<td><nobr>催行人数</nobr></td>
							<td>10人以内</td>
							<td>最低20人~</td>
							<td>最低1人から</td>
						</tr>
						<tr>
							<td><nobr>レッスン時間</nobr></td>
							<td><nobr>2days(20hrs)</nobr></td>
							<td>2days(20hrs)</td>
							<td>6weeks(16hrs)</td>
						</tr>
						<tr>
							<td><nobr>コーチマリ(KD+KDK講座)</nobr></td>
							<td>○</td>
							<td>○</td>
							<td>○</td>
						</tr>
						<tr>
							<td><nobr>シェフマイク(クッキング講座)</nobr></td>
							<td>○</td>
							<td>○</td>
							<td>○</td>
						</tr>
						<tr>
							<td><nobr>日 程</nobr></td>
							<td>ご希望の日程をお問い合わせ下さい。</td>
							<td>5月頃/2015予定</td>
							<td>2/4~3/11, 申込締切:1/29<br>2/27~4/3, 申込締切:2/22<br>3/18~4/22,
								申込締切:3/18
							</td>
						</tr>
						<tr>
							<td><nobr>必要なもの</nobr></td>
							<td>パソコン、ジューサー(KDプログラム用)</td>
							<td>パソコン、ジューサー(KDプログラム用)</td>
							<td>カメラ&マイク内蔵のパソコン、ジューサー</td>
						</tr>
						<tr>
							<td><nobr>こんな方におすすめ</nobr></td>
							<td
								style="text-align: left; min-height: 10px; vertical-align: top;">いつでも、どこでも(ご自宅にでも)、少人数
								グループ(8人以内)でしっかり学びたい方 向け。KD ダイエットコーチ MARI とシェフ MIKE が NY
								から来日、ご指定の場所で開催 いたします。</td>
							<td
								style="text-align: left; min-height: 10px; vertical-align: top;">20
								人以上希望の方が集まった場合に、東京で 開催。年4回ほど募集。KD ダイエットコーチ MARI とシェフ MIKE が
								NY から来日、東京で 開催いたします。</td>
							<td
								style="text-align: left; min-height: 10px; vertical-align: top;">忙しく、あまり時間のない方向け(お1人から
								対応可能です)。数時間ずつ学べるのが特徴。 NY からスカイプでセッションいたします。</td>
						</tr>
					</table>
					<span class="font-small"><span style="color: #ffbf00;">※</span>キッチン相談要(クラスが開催できるよう、ジューサーやブレンダー等の機材も用意して頂く必要があります。</span>
				</div>
				<div style="clear: both; margin-bottom: 30px;"></div>
				<div class="certification_flow_title_normal_arrow">
					<div class="vertical_25">プログラム</div>
				</div>
				<div class="certification_flow_content">
					<h5>Karada Detox 30日間 Healthy is Sexy ライフスタイルチェンジプログラム</h5>
					<p>日々の生活の中で、各自 30 日間のプログラムを実践して頂きます。</p>
					<p>KD が最も伝えたい New York 流のライフスタイルを実践に体験することで、</p>
					<p>KD & KD KITCHEN の効果、楽しさ、意味を、体とマインドでしっかり学んで頂けます。</p>

					<div class="font-small"
						style="border: 1px solid #ffbf00; color: #828282; padding: 10px; width: 557px;">
						フードダイアリーレビュー ダイエットコーチによるレビュー。( 土日、祝日を除く )<br> 週1度の課題 /合計5回
						宿題はメールにて。食に関する Video 鑑賞、感想提出、クラスの開催に向けての準備等
					</div>
				</div>
				<div style="clear: both; margin-bottom: 30px;"></div>
				<div class="certification_flow_title_normal_arrow">
					<div class="vertical_25">チャレンジ</div>
				</div>
				<div class="certification_flow_content">
					<h5>インストラクターとして初めてのクラス開催にチャレンジ!</h5>
					<p>実際に初めてのクラスを開催するのは勇気がいることです。</p>
					<p>KD KITCHEN はインストラクターとして輝いて欲しいという願いを込めたプロジェクトですので、</p>
					<p>皆さんが最初のクラスをスムーズに開催できるようしっかりサポートをします。</p>
					<p>※KD KITCHEN
						インストラクターとして自分のクラスを開催することが大切ですので、初回はお友達や家族対象で構いません。</p>
				</div>
				<div style="clear: both; margin-bottom: 30px;"></div>
				<div class="certification_flow_title_normal_arrow">
					<div class="vertical_25">資格取得</div>
				</div>
				<div class="certification_flow_content">
					<h5>資格取得!クラスを開設することができます。</h5>
					<p>資格承認証(KD KITCHEN
						インストラクターディプロマ)を授与します。これ以降いつでもご自身でクラスを開設することができます。</p>
					<p>&nbsp;</p>
					<p>その他含まれるもの:テキストブック</p>
				</div>
				<div style="clear: both; margin-bottom: 0px;"></div>
				<div class="certification_flow_title_normal">
					<div class="vertical">独 立</div>
				</div>
				<div class="certification_flow_content">
					<h5>独立後も続くサポート。</h5>
					<p>独立後もサポートは続きます。</p>
					<p>さらにステップアップしていただくため、プレミアムインストラクターアクセスなどのサービスもご用意しております。</p>
					<div class="font-small"
						style="border: 1px solid #ffbf00; color: #828282; padding: 10px; width: 420px;">
						<h6>各種開設や設定におけるアドバイス</h6>
						<span style="padding-left: 10px;">
							ブログ開設、スケジュール設定、クラスで使用するレシピ設定等のアドバイスを行います。 </span>
						<h6>その他</h6>
						<span style="padding-left: 10px;"> 毎月、Health TIp
							等を紹介した「お届けニュースレター」などもご用意しております。 </span>
					</div>
					<div style="height: 20px;"></div>
					<div class="font-small"
						style="border: 1px solid #ffbf00; color: #828282; padding: 10px; width: 470px;">
						<h6
							style="font-size: 16px; padding: 0; margin: 0px; letter-spacing: 3px;">プレミアムインストラクターアクセスについて</h6>
						<br> <span>各種イベントへのご招待や、毎月 New York から新しいレシピ x3、レシピビデオ x3
							をお届けする等、 様々な特典をご用意している「プレミアムインストラクターアクセス」は、
							月会費¥3,500(税別)でご利用いただけます。 </span>
					</div>
				</div>
				<div style="clear: both; margin-bottom: 30px;"></div>
			</div>

			<p></p>
			<div style="float: left; width: 70px; font-size: 15px;">注意事項 :</div>
			<div style="float: left; margin-left: 30px;" class="font-small">
				<ul style="padding: 0; margin: 0; padding-left: 14px;">
					<li>やむをえない事情でコーチングに参加できない場合でもクラスの振替えはできませんので、なるべく全てのクラスにご参加頂くようお願い致します。</li>
					<li>「できる」「やってみる」が合い言葉です!これが言える人、この精神を持って取り組める人こそが成功するインストラクターです!(KDK
						インストラクター達はみなさんそのような方です!)</li>
					<li>クラス開始後のキャンセルにおいて、一切の返金は致しかねます。(クラス開始前のキャンセルは 100%返金。)</li>
				</ul>
				※返金の際の振込手数料はお申し込み者様のご負担となります。
			</div>
			<div style="clear: both; margin-bottom: 15px;"></div>
		</div>
	</div>
</div>

<div id="ContactPopup" class="signup-modal mfp-hide">

	<div id="kd_detail">

		<div id="detail_background">
			<h1
				style="z-index: 1; opacity: 1.0; font-size: 28px; padding-top: 10%;">KD
				KITCHENのインストラクターになるということ。</h1>
			<h3 style="color: black;">
				KD KITCHENのインストラクターになるということ、 <br>それは自分だけではなく周りの人をもHealthy &amp;
				Happyにできるということ。<br> New Yorkスタイルの知識を身につけ、自分のページにあわせた時間で働くことができ、<br>
				周りに人や社会に大きな貢献ができるようになるということ。<br> 人を惹き付けるSexyな人間になれるということです。
			</h3>
			<h3 style="color: black;">詳しくはこちら</h3>

		</div>
	</div>
</div>

<script>
$( document ).ready(function() {
    $('.nav').click(function(){
    	 var baseLeft = 63;
         var classes = $(this).attr('class');
         var res = classes.split(' ');
         var c1 = res[1];
         var res = classes.split('_');
         var c1 = res[2];
         c1 = c1 - 1;
         var position = 60 + 163*c1;
         
     	$( "#triangle" ).animate({ "margin-left": position + "px" }, "slow" );

        
        $('#shikaku').find('.active').each(function(){
            $(this).removeClass('active');
            });
        
        
        var item_classes = $(this).attr('class');
        var res_classes = item_classes.split(' ');
        $('.' + res_classes[1]).addClass('active');
        
       
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
            	
                }
            if(id == i){
            	that.removeClass('voice_instructor_not_active');
            	that.addClass('voice_instructor_active');
            	var div ="voice_example_" + i;
            	$('#' + div).show();
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

    
$('.ContactButton').magnificPopup({
    items: {
        src: '#ContactPopup',
        type: 'inline',
    },
    showCloseBtn: false
});

</script>
