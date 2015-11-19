<div id="content">

    <div class="container">
        <div class="page-heading">
            <h1>KD KITCHEN PRODUCTS</h1>
            <div class="dot-container">
                <div class="dot"></div>
                <div class="dot"></div>
                <div class="dot"></div>
            </div>
        </div>
        <div class="hero">
            <?php
            $imgpath = '/img/info-kdk_products.jpg';
            if(isset($settings['products_img']) && !empty($settings['products_img'])) { $imgpath = $settings['products_img']; }
            ?>
            <img src="<?php echo $imgpath;?>" alt="" class="slide-bg-image" />
        </div>
        <div class="info-content">
            <p>KD KITCHENではオリジナルのキッチングッズをご用意しております。みなさまのクッキングクラスがより楽しく、そして便利なものとなるようご活用下さい。</p>
            <p><h3>ご購入方法</h3>
            商品の価格、購入については、平日（月～金、祝日除く）10～17時の間で以下の番号にお問い合わせ下さいませ。06-6310-2670。
            <br/>
            *不在の際は留守番電話にお名前とお電話番号をお残し下さいませ。折り返しご連絡を差し上げます。
            </p>
        </div>
        <ul class="fluid-grid info-page-buckets">
            <li>
                <a href="#">
                    <img src="/img/info-bowl.png" class="thumb">
                    <h3 class="heading">KD KITCHEN オリジナルボウル</h3>
                    <p class="copy">---円</p>
                </a>
            </li>
            <li>
                <a href="#">
                    <img src="/img/info-plate.png" class="thumb">
                    <h3 class="heading">KD KITCHEN オリジナルプレート</h3>
                    <p class="copy">
                    シンプルな白のデザイン。リムにKD KITCHENのロゴが入っています。
                    直径 18cm。<br/>
                    ---円
                    </p>
                </a>
            </li>
            <li>
                <a href="#">
                    <img src="/img/info-bowl_plate.png" class="thumb">
                    <h3 class="heading">KD KITCHEN ボウル＆プレートセット</h3>
                    <p class="copy">
                    サラダボウルとプレートのセット。<br/>
                    ---円
                    </p>
                </a>
            </li>
            <!-- gap to align previous elements, do not remove -->
            <li class="gap"></li>
        </ul>
    </div>

</div>

