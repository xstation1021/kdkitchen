<?php
echo $this->Html->css ( 'kdkservice' );
echo $this->Html->css ( 'kdtraining2' );
?>
<?php

echo $this->element ( 'Service/contact_template' );
?>
<div id="main-content">
	<div class="container mt-80">
		<div id="content_kd">
			<div class="col-lg-12 mb-30">
				<div class="service_title">KD KITCHEN PLUS</div>
			</div>
            <?php if(isset($contents['extra_title'])):?>
            <div class="col-lg-12">
				<div class="extra_title"><?php echo $contents['extra_title'];?></div>
			</div>
            <?php endif;?>
            <div class="col-lg-12">
				<div class="kdservice_title">
					<span class="black">KDK</span> <span class="thin">PLUS</span>
				</div>
			</div>
			<div class="col-lg-12">
				<h5>KD KITCHEN プラス</h5>
			</div>
			<div class="col-lg-12">
				<h3 class="light">KD KITCHEN インストラクターの資格を持つ方だけにご利用頂けるサービスです。
					最新のレシピに加え、クッキングクラスを運営する為に役立つNY の最新情報や、
					インストラクターの活性化とやる気を最大限に引き出すサービスを提供いたします。</h3>
			</div>
			<div class="col-lg-12 mt-50">
             <?php echo $this->element('Service/contact'); ?>
            </div>
		</div>
	</div>
	<div class="container mt-50">
		<div class="row">
			<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12">
				<div class="row">
					<div id="content_kd">
						<ul id="service_ul">
							<li class="banner"><a id="sec_1" class="section">
									<p id="plus_section1" class="banner_picture">
										<span class="black">KD KITCHEN</span><span class="light"> PLUS</span>
									</p>
									<div class=arrow_wrapper>
									   <img src="/img/kdkplus/arrow_A.png" id="sec_1_arrow" class="arrow_A" alt="">
									</div>
							</a></li>
							<li class="banner">
								<div id="sec_1_content" class="container" style="display:none;">
				<?php
    echo $this->element ( 'Service/kdk_service_description', array (
            'title' => 'WEBサイトで利用できるサービス',
            'header' => '毎月1日にお届けします。',
            'class' => 'service_description_content_div_ul',
            'contents' => array (
                    'ウェブサイトプロフィール掲載',
                    'レシピX3／PDFファイル *クラスで配布するレシピ。ダウンロード可。',
                    'ビデオレシピX3 *ウェブサイト上で確認。',
                    'レシピ写真／JPGファイル *フライヤー用に使用。ダウンロード可。' 
            ) 
    ) );
    ?>
    <?php
    echo $this->element ( 'Service/kdk_service_description', array (
            'class' => 'service_description_content_div_ul',
            'title' => 'I &#9829 NY &amp; KDK',
            'contents' => array (
                    'Let&#39;s Study!<br>-最新のNYのエネルギーをお届けしながら、最高のKDKインストラクターを目指してブラッシュアップ！<br>（1回/月提供。ビデオ鑑賞、本のご紹介、セッションなどのいずれかをご提供します。）',
                    'Let&#39;s Hang!<br>-NY 本部スタッフと過ごすSpecialな時間。NYのエネルギーを本部スタッフがお届けします!',
                    'Skype Call from NY!(Q&A)<br>-KD KITCHENのクラスにCEOのマリがNYからSkypeでコールイン！生徒さんの質問にお受けします！' 
            ),
            'extra' => array (
                    '' 
            ) 
    ) );
    ?>
    <?php
    echo $this->element ( 'Service/kdk_service_description', array (
            'title' => 'その他の特典',
            'class' => 'service_description_content_div_ul',
            'contents' => array (
                    'イベントの割引ご招待（不定期）',
                    '過去のレシピを１レシピごとにご購入することが可能。 <br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;※￥350/レシピ（ビデオレシピ、写真付き・NY州税別）',
                    '名刺のテンプレート、KDKフライヤー発注可 （別途料金）' 
            ) 
    ) );
    ?>
    <div class="col-sm-12">
										<div class="service_sub_title_wrapper">
											<div class="service_sub_title">
												<div class="vertical">
													<span class="price"> 料金 </span>
												</div>
											</div>
											<div class="service_sub_content">基本金額：<?php echo $content['kdk_plus_price_basic']?> / month</div>
										</div>
									</div>
									<div class="clear mb-50"></div>
										<div>
											<div class="price_box_container col-lg-3 col-md-3 col-sm-6">
												<div class="price_box">
												    <div class="price_box_header">
													<div class="vertical">初回</div>
												    </div>
												    <div class="price_box_content">
    													<p class="price_remarks"><?php echo $content['kdk_plus_price_first_remarks'];?></p>
    													<p class="price_price"><?php echo $content['kdk_plus_price_first'];?></p>
												    </div>
												</div>
											</div>
											<div class="price_box_container col-lg-3 col-md-3 col-sm-6">
												<div class="price_box">
												    <div class="price_box_header">
													<div class="vertical">4ヶ月目以降</div>
												    </div>
												    <div class="price_box_content">
    													<p class="price_remarks"><?php echo $content['kdk_plus_price_four_months_remarks'];?></p>
														<p class="price_price"><?php echo $content['kdk_plus_price_four_months'];?></p>
												    </div>
												</div>
											</div>
											<div class="price_box_container col-lg-3 col-md-3 col-sm-6">
												<div class="price_box">
												    <div class="price_box_header">
															<div class="vertical">
																<p>まとめてお支払い</p>
																<div style="height: 10px;"></div>
																<p class="price_box_month_wrapper" style="margin: auto;">6ヶ月分</p>
																<div style="height: 10px;"></div>
																<p><?php echo $content['kdk_plus_price_six_months_discounts'];?></p>
															</div>
														</div>
												    <div class="price_box_content">
    													<p class="price_remarks"><?php echo $content['kdk_plus_price_six_months_remarks'];?></p>
															<p class="price_price"><?php echo $content['kdk_plus_price_six_months'];?></p>
												    </div>
												</div>
											</div>
											<div class="price_box_container col-lg-3 col-md-3 col-sm-6">
												<div class="price_box">
												    <div class="price_box_header">
															<div class="vertical">
																<p>まとめてお支払い</p>
																<div style="height: 10px;"></div>
																<p class="price_box_month_wrapper" style="margin: auto;">12ヶ月分</p>
																<div style="height: 10px;"></div>
																<p><?php echo $content['kdk_plus_price_twelve_months_discounts'];?></p>
															</div>
														</div>
												    <div class="price_box_content">
    													<p class="price_remarks"><?php echo $content['kdk_plus_price_twelve_months_remarks'];?></p>
															<p class="price_price"><?php echo $content['kdk_plus_price_twelve_months'];?></p>
												    </div>
												</div>
											</div>
										</div>



										<div class="clear"></div>
										<div class="kdk_plus_bottom">
											お支払い方法・注意事項・詳細については<a class="sec_3" href="#plus_section3">
												こちら </a>
										</div>
										<div class="clear" style="height: 50px;"></div>
							
							</li>
							<li class="banner"><a id="sec_2" class="section">
        						<p id="plus_section2" class="banner_picture">
        							<span class="black">KD KITCHEN</span> <span class="thin"> 資格のみ</span>
        						</p>
        						<div class=arrow_wrapper>
									   <img src="/img/kdkplus/arrow_A.png" id="sec_2_arrow" class="arrow_A" alt="">
									</div>        					
        				</a></li>
        				    <li class="banner">
					<div id="sec_2_content" class="container" style="display:none;">
				<?php
    echo $this->element ( 'Service/kdk_service_description', array (
            'class' => 'service_description_content_div_ul',
            'title' => 'WEBサイトで利用できるサービス',
            'contents' => array (
                    'ウェブサイトプロフィール掲載' 
            ) 
    ) );
    ?>
    <?php
    echo $this->element ( 'Service/kdk_service_description', array (
            'class' => 'service_description_content_div_ul2',
            'title' => 'その他の特典',
            'contents' => array (
                    '資格取得講座を申し込んだ際にもらえる11個のレシピ、KD KITCHENが発行するレシピ本(デジタルファイル)を購入し、それを使って、クラスを開催して頂くことが可能です。',
                    'レシピ本は1年間の間にKDK PLUSメンバーにお届けしたレシピをまとめたものとなります。',
                    '（不定期・レシピ本はインストラクターのみご購入頂けます。）' 
            ) 
    ) );
    ?>
					<div class="service_sub_title_wrapper">
							<div class="service_sub_title">
								<div class="vertical">
									<span class="price"> 料金 </span>
								</div>
							</div>
						</div>
						<div class="clear" style="height: 50px;"></div>
						<div class="price_box_container">
							<div class="price_box price_box_one">
								<div class="price_box_header">
									<div class="vertical">
										KDK資格に<br>料金は含まれています
									</div>
								</div>
								<div class="price_box_content">
									<div class="vertical">
										<p class="price_price">￥0</p>
									</div>
								</div>
							</div>
						</div>
						<div class="kdk_plus_bottom">
							お支払い方法・注意事項・詳細については<a class="sec_3"> こちら </a>
						</div>
						<div class="clear" style="height: 50px;"></div>
					</div>
				</li>
				<li class="banner"><a id="sec_3" class="section">
						<p id="plus_section3" class="banner_picture">
							<span class="black">KD KITCHEN</span> <span class="thin">
								お支払い方法・注意事項・詳細</span>
						</p>
						<div class="arrow_wrapper">
		                <?php echo $this->Html->image('kdkplus/arrow_A.png', array('id' => 'sec_3_arrow', 'class' => 'arrow_A'));?>
					</div>
						<div class="clear"></div>
				</a></li>
				<li class="banner">
					<div id="sec_3_content" style="display:none;">
						<div class="service_description">
							<div class="service_sub_title_wrapper">
								<div class="service_sub_title">
									<div class="vertical">
										<span> お支払い方法 </span>
									</div>
								</div>
							</div>
							<div id="kdk_plus_payment_message_wrapper">
								<div class="kdk_plus_orange_text">指定のゆうちょ銀行にお振込をお願いします</div>
								<div class="attention_text">※振込手数料はインストラクターのご負担となります</div>
							</div>
							<div id="bank_info_wrapper">ゆうちょ銀行 普通預金 店番 （支店名） ：418 （ヨンイチハチ）
								口座番号:0188458 口座名義：クロダマリ</div>

							<div class="clear" style="height: 70px;"></div>
							<div class="service_sub_title_wrapper">
								<div class="service_sub_title">
									<div class="vertical">
										<span> 注意事項・詳細</span>
									</div>
								</div>
							</div>
<?php
echo $this->element ( 'Service/kdk_service_description', array (
        'class' => 'service_description_content_div_ul2',
        'title' => 'KD KITCHEN PLUSをご利用頂く方',
        'contents' => array (
                '最低3ヶ月間お申し込み頂く必要があります。',
                '4ヶ月目以降からは1ヶ月単位でご利用頂けます。' 
        ) 
) );
?>
<?php
/*
echo $this->element ( 'Service/kdk_service_description', array (
        'class' => 'service_description_content_div_ul2',
        'title' => 'レシピのみを購入、KDKPへ変更する場合',
        'contents' => array (
                'この場合は追加というオプションになり、' . $content ['kdk_plus_upgrade_price'] . '(税別)で',
                'KDK KITCHEN PLUSを追加して頂けます。',
                'また' . $content ['kdk_plus_upgrade_price'] . 'オプションはKDKPと同じように最低でも3ヶ月の申し込み期間が必要ですので、申し込み時に3か月分お支払いして頂く必要があります。' 
        ) 
) );
*/
?>

<?php

echo $this->element ( 'Service/kdk_service_description', array (
        'class' => 'service_description_content_div_ul2',
        'title' => 'I &#9829 NY &amp; KDK',
        'contents' => array (
                'NYから本部スタッフが来日して開催する「Let&#39;s Hang!」は、スケジュールの都合上不定期の開催となります。' 
        ) 
) );
?>

<?php
echo $this->element ( 'Service/kdk_service_description', array (
        'class' => 'service_description_content_div_ul2',
        'title' => 'セッションに参加できない場合',
        'contents' => array (
                'インストラクターの都合でセッションに参加できない場合の代替日程はご提供できません。予めご了承くださいませ。' 
        ) 
) );
?>

<?php
echo $this->element ( 'Service/kdk_service_description', array (
        'class' => 'service_description_content_div_ul2',
        'title' => '月単位でお支払いされる方',
        'contents' => array (
                '毎月1日に発行されるレシピについて、前日25日迄に入金を確認させて頂く必要があります。' 
        ) 
) );
?>

<?php
echo $this->element ( 'Service/kdk_service_description', array (
        'class' => 'service_description_content_div_ul2',
        'title' => '自動引き落としのサービスについて',
        'contents' => array (
                '自動引き落としについてはservice@kdkitchen.com迄ご連絡ください。' 
        ) 
) );
?>
						<div class="clear"></div>
						</div>
					</div>
				</li>
				<li class="banner"><a id="sec_4" class="section">
						<p id="plus_section4" class="banner_picture">
							<span class="black">KD KITCHEN</span> <span class="thin">サービス利用同意書</span>
						</p>
						<div class="arrow_wrapper">
		                <?php echo $this->Html->image('kdkplus/arrow_A.png', array('id' => 'sec_4_arrow', 'class' => 'arrow_A'));?>
					</div>
						<div class="clear"></div>
				</a></li>
				<li class="banner">
					<div id="sec_4_content" class="container" style="display:none;">
						<div id="kdkplus_service_agreement">このKD KITCHEN
							PLUSサービス利用同意書は、Karada Detox (からだデトックス、以下 「KD」 )が運営するKD KITCHEN
							(ケイディ・キッチン、以下 「KDK」) 等の関連事業 （これらを総称して弊社といいます）が提供するKD KITCHEN
							PLUS(以下「KDKP」)サービスにおいて、KDKPのサービスをお申し込み頂く方に適用されるものです。
							以下の内容に同意の上、お申し込みください。 （お申し込みを頂いた方は、以下の内容に同意して頂いたものとします。）</div>
<?php
echo $this->element ( 'Service/kdk_service_description', array (
        'class' => 'service_description_content_div_ul2',
        'title' => 'ご利用について',
        'contents' => array (
                '●KDKP のサービスはお申し込み頂く方のみが利用できるサービスです。 ',
                '●KDKPを初めてご利用頂く方は、最低3ヶ月間お申込み頂く必要があります。4ヶ月目以降からは1ヶ月単位でご利用頂けます。',
                '● 一旦サービスを止められ、また再開する場合は、再度最低3ヶ月間お申し込み頂く必要があります。',
                '●Let&#39;s Study!でSkypeセッションを開催する場合について、Skypeで繋げる際は１度に参加できる人数に限りがあります。申込者が多い場合は同じセッションを数日に分けて、全員が参加できる日数を用意するなどの工夫をします。（先着順で予約を受け付けさせて頂きます。）',
                '●Let&#39;s Hang!は NY からスタッフが来日時に開催します。(不定期)',
                '●Skype Call from NY は、CEO マリが対応可能な時にのみお受け致します。 ',
                '●月単位でお支払いされる方は、毎月1日に発行されるレシピについて、前月25日迄にご入金を確認させて頂く必要があります。 '
        ) 
) );
?>

<?php
echo $this->element ( 'Service/kdk_service_description', array (
        'class' => 'service_description_content_div_ul2',
        'title' => '情報の使用、公開、管理について',
        'contents' => array (
                '●ご提供するサービスはインストラクターの理解を深め、活性化を図る目的で作られています。他の方との共有や、転売、貸与、公開、譲渡等はできません。',
                '●ご提供する教材やレシピ等の情報が漏洩しないよう、インストラクターが責任を持って管理をしてください。また提供されるレシピは必ずプリントアウトしてから配布するようにしてください。レシピをデジタルデータで配布することは禁止します。',
                '●「I &#9829 NY &amp; KDK」でご提供する情報やイベントで習得して頂く知識以外の情報（レシピ、ビデオレシピ）を、KDKP のサービスを申し込みされていない方と共有することは禁止します。KDKP の申し込みをされない方と共有する行為を発見した場合は、KDKP を利用するインストラクター、及び共有した方がインストラクターであればその方、両方の KDK インストラクターの資格剥奪、及び相応の措置を取らせて頂きます。またその場合のお支払済のサービス料は返金致しかねます。',
                '●弊社が提供するレシピや情報には全て著作権がついています。弊社のレシピや情報をKDKのインストラクターとして使用する目的以外で使用することは禁止します。弊社のレシピや写真、情報はKDKのクラス、及びインストラクターのプロモーション活動のみに使用し、その際は必ず弊社の名前とKDKのインストラクターであることを明確に伝わるようにします。弊社のレシピ、及び情報を他社の名前を使って転載、転売、譲渡、別の名前での利用、活動することは禁止します。またそのような行為を発見した場合、インストラクターの資格剥奪、及び相応の措置を取らせて頂きます。',
                '●KDKのクラスで使用するレシピは、KD KITCHEN PLUSに加入中に取得したレシピのみを使用できます。 KD KITCHEN PLUSに加入せず、他のKDKクラスに参加して得たレシピや、他の方法で入手したKDKレシピを使用することは禁止します。 ' 
        ) 
) );
?>
<?php

echo $this->element ( 'Service/kdk_service_description', array (
        'class' => 'service_description_content_div_ul2',
        'title' => '弊社が提供する情報、サービスについて',
        'contents' => array (
                '●弊社のサービスは情報提供を目的とするもので、医療的治療を無くすこと、 病状の診断をすること、病気の治療をすることを目的としていません。また、病気を未然に防ぐことを保証するものではありません。 ',
                '●弊社が紹介する情報、プログラム、商品等は食品医薬品局から指示、審査を受けたものではありません。' ,
                '●弊社が紹介する筆者、医師、ウェブサイトの作成者、配給者などが記載、掲載する内容に一切の法的責任及び保証はしません。',
                '●ご提供するサービスは変更、追加、または休止することがあります。 '
        ) 
) );
?>
<?php

echo $this->element ( 'Service/kdk_service_description', array (
        'class' => 'service_description_content_div_ul2',
        'title' => 'セッションと返金について',
        'contents' => array (
                '●「I &#9829 NY &amp; KDK」でご提供するセッションについて、予定日に参加ができない場合でも、代替えのセッションはご用意できません。またそれに対する返金等は致しかねます。',
                '●「I &#9829 NY &amp; KDK」でご提供するセッションについて、KD KITCHEN側の止むを得ない事情でセッション内容が変わる場合があります。その場合は代替えのものをご用意致します。またこの場合の料金の返金は致しかねます。 ',
                '●サービスを利用する際に起こるトラブル（インターネットやパソコンが使えない等）において、弊社は一切の責任を負えません。',
                '●各自インターネット等の通信手段にかかる費用はインストラクターの負担となります。 ',
                '●レシピ、レシピビデオ、レシピの写真は毎月一日にお届けする予定です。但しインターネットの不都合や天災、事故等によりお届けする時期が遅れる場合がありますので予めご了承下さい。またこれに対する返金は致しかねます。',
                '●インストラクターのご都合によるサービスキャンセルの場合、一旦納入された費用は返金致しかねます。',
                '●レシピやビデオ、写真等のデジタルファイルは、その商品の性質上、一度配信されたものはいかなる理由があっても返金は致しかねます。 '
        ) 
) );
?>
<?php

echo $this->element ( 'Service/kdk_service_description', array (
        'class' => 'service_description_content_div_ul2',
        'title' => '一般条項ついて',
        'contents' => array (
                '●弊社がご紹介する情報、プログラム、食品の利用において、全ての方、特に18歳未満、妊娠中の方、授乳中の方、医師にかかっておられる方、薬を服用中の方は必ず医師にご相談下さい。',
                '●インストラクターと第三者の間で問題が発生した場合、インストラクターが責任を持ってその問題を解決させ、弊社に一切の迷惑、損害を与えないものとします。',
                '●ここに表記する内容に違反する行為や、弊社に不利益や迷惑がかかる行為から訴訟が発生し弁護士を用いた場合、弊社が依頼する弁護士の報酬規定に基づく弁護士費用についても利用者の負担となります。',
                '●弊社はサービスの内容、及び同意書についていつでも変更、追加、休止、及び廃止ができるものとします。またそれによる返金は致しかねます。',
                '●インストラクターは住所、氏名、連絡先等、弊社に届け出た内容に変更があった際、速やかに弊社に届け出る必要があります。また届け出が無くインストラクターに不利益が生じても弊社は一切の責任を負えません。 ',
                '',
                '',
                '以上、KD KITCHEN PLUSサービスにお申込みの方は、この同意書に同意して頂いたものとします。'
        ) 
) );
?>
				</div>
				</li>
				
				
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div>


</div>



<?php
echo $this->Html->script ( 'jQueryRotate' );
?>

<script>
function close_open_content(id){
	for(var i = 1; i<=4; i++){
		var sec_id = "sec_"+ i;
		if(sec_id == id){
			if(openItem == id){
				$('#' + sec_id + "_arrow").rotate({animateTo:0});
				$('#' + sec_id + "_content").fadeOut('slow');
				openItem = null;
			} else{
				$('#' + sec_id + "_arrow").rotate({animateTo:90});
				$('#' + sec_id + "_content").fadeIn('slow');
				openItem = id;
				
				var new_position = $("#" + sec_id).offset();
				window.scrollTo(new_position.left,new_position.top);
			}
		} else {
			$('#' + sec_id + "_arrow").rotate({animateTo:0});
			$('#' + sec_id + "_content").hide();
			}
	}
}
var openItem = null;
$(document).ready(function(){
	
	$('#service_ul a').click(function(){
		var id = $(this).attr('id');
		if(id === undefined){
			id= $(this).attr('class');
			}
			
		close_open_content(id);
		});
});

</script>