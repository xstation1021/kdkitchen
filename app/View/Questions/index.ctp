<style>
    .question-list{
        border:1px black solid;
        border-radius:10px;
        padding:5px;
    }
    
    .question-title{
        color:#ffbf00;
        padding:10px;
        cursor:pointer;
    }
</style>

<div id="content">

    <div class="container">
        <div class="page-heading">
            <h1>よくあるご質問</h1>
            <div class="dot-container">
                <div class="dot"></div>
                <div class="dot"></div>
                <div class="dot"></div>
            </div>
        </div>

        <div class="container question-list">
            <?php $firstLoop = true;?>
            <?php foreach($this->data as $question) { ?>
            <?php if($firstLoop == false){?>
            <div style="border-top:1px black solid;"></div>
            <?php 
            } else {
                $firstLoop = false;
            }
            ?>
                <?php $question = $question['Question']; ?>
                    <div class="question-title">
                        <strong>
                        <?php echo $this->Html->image('arrow.png', array('alt' => '>', 'height' => '12px;', 'width' => '12px;'));?>
                        <?php echo $question['title'];?>
                        </strong>
                    </div>
                    <div style="padding:12px;display:none;border-top:1px dashed #999999">
                    <?php echo $question['answers'];?>    
                    </div>
                    
            <?php } ?>
        
        </div>
    </div>
</div>

<?php
    echo $this->Html->script('jQueryRotate');
?>

<script type="text/javascript">
    $(document).ready(function(){
        $('.question-title').mouseover(function(){
            $(this).css('background-color', '#f0f0f0');
        }).mouseleave(function(){
        	$(this).css('background-color', 'white');
        });

        $('.question-title').click(function(){
            $(this).next('div').toggle();
            var as= $(this).find('img').first();

            if($(this).hasClass('opened') == false){
            	$(this).addClass('opened');
            	as.rotate({animateTo:90});
            } else {
                $(this).removeClass('opened');
            	as.rotate({animateTo:0});
            }
            
           
    
        });
    });
</script>

