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
	<div style="padding-top:20px;padding-bottom:40px;">
		<h1 id="workshops_title">WORKSHOPS</h1>
	</div>
    <div class="row mb-30">
        <div class="col-md-6 mb-20">
        <?php 
            echo $this->Html->image("workshops.jpg", array('width'=>'100%'));
        ?>
        </div>
        <div id="workshops-content" class="col-md-6">
            <h3 class="orange" style="margin-top:0;">
                <span class="thin">KD KITCHEN -</span>
                <span class="bold">体の中をがっちりお掃除！</span>
            </h3>
            <br>
            <div>
                年末年始に食べたアレやコレを、NYスタイルでガッチリ体の外へ出す方法を伝授します。Clean Eatingで多くの人をhealthy, Sexy, Happyに導くNY在住のダイエットヘルスコーチMariが来日し、KD KITCHENで活躍するインストラクターと一緒に、体の中を綺麗にお掃除する方法を、分かりやすく<span style="color: red;">美味しく</span>伝えます！
            </div>
            <br>
            <?php 
            echo $this->Html->image("wk_detail1.jpg", array('width'=>'100%'));
            ?>
            
        </div>
       
    </div>
     <?php
     echo $this->element ( 'Pages/contact_template' );
     echo $this->element('Pages/contact');
      ?>
</div>
</div>