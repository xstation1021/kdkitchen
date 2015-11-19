<style>
    @media ( max-width :767px) {
        .nopadding{
            padding-left:15px;
            padding-right:15px;
        }
    }
</style>

<div id="main-content">
<div class="container mt-30">
    <div class="row mb-30">
        <div class="col-md-6 mb-20">
        <?php 
            echo $this->Html->image("workshops.jpg", array('width'=>'100%'));
        ?>
        </div>
        <div id="workshops-content" class="col-md-6">
            <h3 class="orange" style="margin-top:0;">
                <span class="thin">KD KITCHEN -</span>
                <span class="bold">NY最新のクリーン Dietを学ぶ</span>
            </h3>
            <div>
                美しくなりたいと願うあなたに必要なのは、辛く継続不可能な食事制限や、エクササイズではありません。
                揺るがない美しい体を手に入れる為に取り組まなければいけないことは「健康な体とマインド」をつくることです。
                NYに拠点を置く、KD KITCHENの本社「Karada Detox」は、ニューヨーカー達が注目する最も効果的な最新のダイエット
                「クリーンダイエット」をベースとした食事方法で、世界中の方をHealthy(健康で)、Sexy(自信に満ち溢れた)、Happy(幸せ)で導いてきました。
                私たちが求める「楽しみたい！幸せになりたい！」という気持ちを絶対的なコアとしたコーチングで「100%満足」の評価を受けるプロのダイエットヘルスコーチ
                「Mari」が、NY最新の情報を体の中から綺麗になる食事と共にご紹介します！
            </div>
            <?php 
            echo $this->Html->image("wk_detail1.jpg", array('width'=>'100%'));
            ?>
            <h3 class="orange">
                <span class="thin">KD KITCHEN -</span>
                <span class="bold orange">Karada Detox 基礎修了コース</span>
            </h3>

            <div>
                この講座では「Healthy(健康で)、Sexy(自信に満ち溢れた)、Happy(幸せ)な自分」を手にいれる為、Karada Detox基礎と実践方法を学んで頂きます。
                NYで活躍するプロのダイエットヘルスコーチ「Mari」が、ニューヨーカー達に実際にコーチングを提供している、
                「30日間・Healthy is Sexy and Happy プログラム」と体の中からキレイになる「Karada Detoxの概念をご紹介していきます。
                ここではあなたの人生、そして大切な家族や周りの人達にも役立つ学びを得ることになるでしょう。
                
                <p>コースを取得して頂いた方には、KD KITCHEN - Karada Detox基礎修了証をお渡しします。</p>
            </div>
            <?php 
            echo $this->Html->image("wk_detail2.jpg", array('width'=>'100%'));
            ?>
        </div>
       
    </div>
     <?php
     echo $this->element ( 'Service/contact_template' );
     echo $this->element('Service/contact');
      ?>
</div>
</div>