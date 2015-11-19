<?php 
    echo $this->Html->css('kdtraining');
?>

<style>
    h3{
        color:#ffbf00;
    }
    
</style>
<script>

$(document).ready(function() {

    $('#ContactButton').magnificPopup({
        items: {
            src: '#ContactPopup',
            type: 'inline',
        },
        showCloseBtn: false
    });

    $('#ContactButton2').magnificPopup({
        items: {
            src: '#ContactPopup',
            type: 'inline',
        },
        showCloseBtn: false
    });

    $("'[placeholder]'").parents("form").submit(function() {
          $(this).find("[placeholder]").each(function() {
                  var input = $(this);
                      if (input.val() == input.attr("placeholder")) {
                                input.val("''");
                                    }
                    })
    });
});

</script>

<div id="ContactPopup" class="contact-modal mfp-hide">
    <h1 class="modal-heading">コンタクト</h1>
    <a href="javascript:void(0);" onclick="$.magnificPopup.close();" class="btn-close"><span class="icon icon-x"></span></a>
        <?php echo $this->Form->create('Email', array('method'=>'POST', 'action'=>'contact_certification')); ?>
        <?php echo $this->Form->input('name', array('type' => 'text', 'placeholder'=>'お名前', 'label'=>false)); ?>
        <?php echo $this->Form->input('from', array('type' => 'text', 'placeholder'=>'メールアドレス', 'label'=>false)); ?>
        <?php echo $this->Form->input('phone', array('type' => 'text', 'placeholder'=>'電話番号', 'label'=>false)); ?>
        <?php echo $this->Form->input('body', array('type' => 'textarea', 'label'=>false)); ?>
        <?php echo $this->Form->input('chef_email', array('type' => 'hidden', 'value'=>"info@kdkitchen.com")); ?>
        <?php echo $this->Form->button('送信する', array('class'=>'btn btn-send')); ?>
        <?php echo $this->Form->end(); ?>
</div>

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
        
        <div class="kdtraining_header_1">インストラクター資格取得講座</div>

        <div class="container-slim profile" style="margin-bottom:50px;">
        <a href="#ContactPopup" id="ContactButton" class="btn btn-contact">予約・コンタクト</a>
        </div>
        <div class="kdtraining_contents">
            <div></div>
            <div id="kdtraining_session">
                <div class="kdtraining_text_section kdtraining_text_section_left">
                    <div class="kdtraining_title">
                        SESSION
                    </div>
                    
                    <div class="kdtraining_border"></div>
                    <div id="kdtraining_session_section1">
                        <div class="kdtraining_orangebox">
                            KDダイエットコーチ　MARI<br>
                            &amp; シェフMIKEによる二日間のセッション
                        </div>
                    </div>
                    <div class="kdtraining_content_title">
                        DAY 1
                    </div>
                    
                    <div class="kdtraining_content kdtraining_content_densed" id="kdtraining_session_section2">
                        <div class="kdtraining_section_space">
                            <span class="kdtraining_font_large">デトックス講座</span>
                            <span class="kdtraining_font_medium">／前半５時間：コーチ MARI</span>
                            <br>
                            <span class="kdtraining_font_small">KDの概念 - 体の中からきれいになる方法やマインド、<br>ライフスタイル定着への重要性</span>
                         </div>
                         <div class="kdtraining_section_space">
                            <span class="kdtraining_font_large">クッキング講座</span>
                            <span class="kdtraining_font_medium">／後半５時間：コーチ MIKE</span>
                            <br>
                            <span class="kdtraining_font_small">食べ物に触れながら、食べ物が体に与える影響、<br>クリーンフードの調理基本について<br></span>
                        </div>
                    </div>
                    <div class="kdtraining_content_title">
                        DAY 2
                    </div>
                    
                    <div class="kdtraining_content" id="kdtraining_session_section3">
                        <div class="kdtraining_section_space">
                            <span class="kdtraining_font_large">KD KITCHEN講座</span>
                            <span class="kdtraining_font_medium">／前半５時間：コーチ MARI</span>
                            <br>
                            <span class="kdtraining_font_small">KDの概念。クラスの運営方法やテクニックについて。Q&A</span>
                        </div>
                        <div class="kdtraining_section_space">
                            <span class="kdtraining_font_large">クッキング講座</span>
                            <span class="kdtraining_font_medium">／後半５時間：コーチ MARI</span>
                            <br>
                            <span class="kdtraining_font_small">クリーンフードの基本レシピを実践を交えながら学びます。Q&A</span>
                        </div>
                    </div>
                </div>    
            </div>
            <div id="kdtraining_program">
                <div class="kdtraining_text_section kdtraining_text_section_right">
                    <div class="kdtraining_title">
                        PROGRAM
                    </div>
                    
                    <div class="kdtraining_border"></div>
                    <div id="kdtraining_program_section1">
                        <div class="kdtraining_box" >
                            3日目からは日々の生活の中で、各自30日間のプログラムを実践して頂きます。KDが最も伝えたいNew York流のライフスタイルを実践に体験することで、
                            KD &amp; KD KITCHENの効果、楽しさ、意味を、体とマインドでしっかり学んで頂けます。
                         
                        </div>
                    </div>
                    <div id="kdtraining_program_section2">     
                        <div class="kdtraining_orangebox" id="kdtraining_custom_orangebox1">
                            Karada Detox<br>
                            30日間 Healthy is Sexy<br>
                                                                 ライフスタイルチェンジプログラム<br>
                        </div>
                    </div>
                    <div class="kdtraining_content_title">
                                                   ライフスタイルチェンジプログラムに含まれる内容
                    </div>
                    
                    <div class="kdtraining_content" id="kdtraining_program_section3">
                        <span class="kdtraining_font_large">フードダイアリーレビュー</span>
                        <br>
                        <span class="kdtraining_font_small">ダイエットコーチによるレビュー。 (土日、祝日を除く)</span>
                        <br>
                        <div style="height:5px;"></div>
                        <span class="kdtraining_font_large">週１度の課題</span>
                        <span class="kdtraining_font_medium">／合計５回</span>
                        <br>
                        <span class="kdtraining_font_small">宿題はメールにて。<br>食に関するVideo鑑賞、感想提出、クラスの開催に向けての準備等</span>
                    </div>
                    
              
                </div>    
            </div>
            
            <div id="kdtraining_support">
                <div class="kdtraining_text_section kdtraining_text_section_left">
                    <div class="kdtraining_title">
                        SUPPORT
                    </div>
                    
                    <div class="kdtraining_border"></div>
                    <div id="kdtraining_support_section1">                   
                        <div id="kdtraining_support_section2">  
                            <div class="kdtraining_orangebox" id="kdtraining_custom_orangebox2">
                                KD KITCHENクラス開催へのサポート
                            </div>
                        </div>
                       
                        <div id="kdtraining_support_section3">
                            <div class="kdtraining_box">
                                                                実際に初めてのクラスを開催するのは勇気がいることです。<br>KD KITCHENはインストラクターとして輝いて欲しいという願いを込めたプロジェクトですので、皆さんが最初のクラスをスムーズに開催できるようしっかりサポートをします。
                             <br>    
                                                               ※KD KITCHEN インストラクターとして自分のクラスを開催することが大切ですので、初回はお友達や家族対象で構いません。    
                            </div>
                        </div>
                    </div>
                    <div class="kdtraining_content_title">
                                                   サポート内容
                    </div>
                    
                    <div class="kdtraining_content kdtraining_content_densed" id="kdtraining_support_section4">
                    
                        <span class="kdtraining_font_large">各種開設や設定におけるアドバイス</span>
                        <br>
                        <span class="kdtraining_font_small">ブログ開設、スケジュール設定、クラスで使用するレシピ設定等の<br>アドバイスを行います。</span>
                        <br>
                        <div style="height:5px;"></div>
                        <span class="kdtraining_font_large">その他含まれるもの</span>
                        <br>
                  
                      <ul class="support">  
                          <li class="bullet">テキストブック </li>
                          <li class="bullet">ディプロマ（資格承認証）</li>
                          <li class="bullet">毎月お届けニュースレター ※Health TIp等をご紹介しています。</li>
                          <li class="bullet">KD KITCHEN PLUS   ※月会費&#165;3500(税別)&nbsp;&nbsp;任意</li>
                    </ul>
                    <div id="kdtraining_support_section5">
                        <span class="kdtraining_font_small">※KD KITCHEN PLUSには各種イベントご招待や、<br>毎月New Yorkから新しいレシピx3、レシピビデオx3をお届けする等、<br>様々な特典をご用意しております。</span>
                        <br>
                        </div>
                   </div>
                </div>    
            </div>
            
            
            
        </div>
        
        <div class="container-slim profile">
              <a href="#ContactPopup" id="ContactButton2" class="btn btn-contact">予約・コンタクト</a>
        </div>
    </div>
</div>

