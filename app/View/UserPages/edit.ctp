<script type="text/javascript">
tinymce.init({
        selector: "#profile",
        theme: "modern",
        plugins: [
            "advlist autolink lists link image charmap print preview hr anchor pagebreak",
            "searchreplace wordcount visualblocks visualchars code fullscreen",
            "insertdatetime media nonbreaking save table contextmenu directionality",
            "emoticons template paste textcolor"
        ],
        toolbar1: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image",
        toolbar2: "print preview media | forecolor backcolor emoticons",
        image_advtab: true,
        language: "ja",
        forced_root_block : "",
        templates: [
            {title: 'Test template 1', content: 'Test 1'},
            {title: 'Test template 2', content: 'Test 2'}
        ]
});

$( document ).ready(function() {
    /*$('#ScheduleTip').qtip({
        content: {
            text:''
        }
    });*/
    
    $('#ScheduleInfoButton').magnificPopup({
        items: {
            src: '#ScheduleInfoPopup',
            type: 'inline',
        },
        showCloseBtn: false
    });
});
</script>

<?php
$profile_pic = NULL;
if(!empty($attachments['profile'])) {
    $profile_pic = $attachments['profile'][0];
}
$food_pics = NULL;
if(!empty($attachments['food'])) {
    $food_pics = $attachments['food'];
}
?>

<div id="ScheduleInfoPopup" class="contact-modal mfp-hide">
    <h1 class="modal-heading">スケジュールの埋め込み方</h1>
    <a href="javascript:void(0);" onclick="$.magnificPopup.close();" class="btn-close"><span class="icon icon-x"></span></a>
    <ol>
    <li>
        <a href="https://www.google.com/calendar/render?hl=ja">グーグルカレンダー</a>の左側にあるマイ カレンダーの右隣にある下向き矢印をクリックし、<b>「新しいカレンダーの作成」</b>をクリックします。
    </li>
    <li>
    <b>「このカレンダーを一般公開する」</b>をチェックしてください。
    </li>
    <li>
    マイ カレンダーの中にステップ１で作成したカレンダーが表示されるので、その右隣にある下向き矢印をクリックし、<b>「カレンダーの設定」</b>をクリックします。
    </li>
    <li><b>「このカレンダーを埋め込む」</b>の右側にあるコードを選択しコピーしてください。
    <?php echo $this->Html->image('google-calendar-iframe.png', array('style'=>'width:100%;'));?>
    </li>
    <li>
    KD KITCHENの<b>「スケジュール」</b>に貼付けて下さい。
    <?php echo $this->Html->image('google-calendar-iframe2.png', array('style'=>'width:100%;'));?>
    </li>
    </ol>
</div>

<div class="container-slim">
    <div class="page-heading">
        <h1><?php echo $this->data['User']['username'];?></h1>
        <div class="dot-container">
            <div class="dot"></div>
            <div class="dot"></div>
            <div class="dot"></div>
        </div>
    </div>
    <div class="container-slim profile">
    <?php
    echo $this->Form->create('UserPage', array('method'=>'post', 'type'=>'file', 'action'=>'edit', $this->data['UserPage']['id']));
    ?>
        <div class="profile-picture">
            <!--
            <img src="http://placehold.it/220x220">
            -->
        <!-- EDIT PROF PICS -->
        <?php if($profile_pic) { ?>
            <div id="ImageWrapperProfile">
                <div class="item-edit-imgwrapper">
                    <img class="item-thumb" src="/<?php echo $profile_pic['file_dir'].'/cropped/'.$profile_pic['file_name'];?>">    
                    <?php echo $this->Form->input('Attachment.keep.0', array('type' => 'hidden', 'value'=>$profile_pic['id'])); ?>
                    <a href="javascript:void(0);" onclick="$('#ImageWrapperProfile').html($('#PhotoInput0').html());" class="btn btn-delete"><span class="icon icon-delete"></span>Delete</a>
                </div>    
            </div>
        <?php } else { ?>
            <img src="http://placehold.it/220x220">
            <?php echo $this->Form->input('Attachment.profile.0', array('type' => 'file')); ?>
        <?php } ?>
        </div>
        <a href="javascript:void(0);" class="btn btn-contact">予約・コンタクト</a>
        <hr class="divider">
        <h3 class="module-heading">紹介文</h3>
        <div class="introductions-container">
            <?php echo $this->Form->input('summary', array('type'=>'text', 'label'=>false, 'class'=>'input-introductions'));?>
        </div>
        <h3 class="module-heading">インフォメーション</h3>
        <!-- PROFILE EDITOR WIDGET -->
        <?php echo $this->Form->input('body', array('label'=>false, 'id'=>'profile', 'type'=>'textarea'));?>
        <h3 class="module-heading">ギャラリー</h3>
        <div class="food-gallery-container cf">
<!--
            <div class="food-item left"><a href="#" class="btn btn-delete"><span class="icon icon-delete"></span>Delete</a><img src="http://placehold.it/260x260"></div>
            <div class="food-item center"><a href="#" class="btn btn-delete"><span class="icon icon-delete"></span>Delete</a><img src="http://placehold.it/260x260"></div>
            <div class="food-item right"><a href="#" class="btn btn-delete"><span class="icon icon-delete"></span>Delete</a><img src="http://placehold.it/260x260"></div>
-->
            <?php $fd_classes = array('left', 'center', 'right');?>
            <?php $count = 0;?>
            <?php while($food_pics && $attach = array_shift($food_pics)) { ?>
                <div id="ImageWrapperFood<?php echo $count;?>" class="food-item <?php echo $fd_classes[$count%3]?>">
                    <a href="javascript:void(0);" class="btn btn-delete" onclick="$('#ImageWrapperFood<?php echo $count;?>').html($('#PhotoInput<?php echo $count;?>').html());"><span class="icon icon-delete"></span>Delete</a>
                    <img class="item-thumb" src="/<?php echo $attach['file_dir'].'/thumbnails/'.$attach['file_name'];?>">    
                    <?php echo $this->Form->input('Attachment.keep.'.($count+1), array('type' => 'hidden', 'value'=>$attach['id'])); ?>
                </div>    
                <?php $count += 1;?>
            <?php }?>
            <?php while($count < 6) {?>
                <div class="food-item <?php echo $fd_classes[$count%3]?>">
                <?php echo $this->Form->input('Attachment.food.'.$count, array('type' => 'file', 'label'=>'')); ?>
                </div>
                
                <?php $count += 1;?>
            <?php } ?>
        </div>
        
        <h3 class="module-heading">電話番号</h3>
        <div class="phonenumber-container">
            <?php echo $this->Form->input('UserPage.phone_number.0', array('type'=>'text', 'class'=>'input-phonenumber', 'label'=>false, 'div'=>''));?>
            <span class="zip-dash">-</span>
            <?php echo $this->Form->input('UserPage.phone_number.1', array('type'=>'text', 'class'=>'input-phonenumber-extra-one', 'label'=>false, 'div'=>''));?>
            <span class="zip-dash">-</span>
            <?php echo $this->Form->input('UserPage.phone_number.2', array('type'=>'text', 'class'=>'input-phonenumber-extra-two', 'label'=>false, 'div'=>''));?>
        </div>
        <h3 class="module-heading">郵便番号</h3>
        <div class="location-container">
            
            <div class="input text cf">
                <span class="zip-symbol">&#12306;</span> 
                <?php echo $this->Form->input('UserPageAddress.zip.0', array('type'=>'text', 'class'=>'input-zip', 'label'=>false, 'div'=>''));?>
                <span class="zip-dash">-</span>
                <?php echo $this->Form->input('UserPageAddress.zip.1', array('type'=>'text', 'class'=>'input-zip-extra', 'label'=>false, 'div'=>'', 'label'=>false));?>
            </div>
            <h3 class="module-heading">*都道府県</h3>
            <?php 
            
            echo $this->Form->input('UserPageAddress.prefecture', array(
                    'options' => $prefectureList,
                    'class' => 'select-prefecture',
                    'label' => false,
                    'empty' => '選択してください'

            ));
            //echo $this->element('area_selectbox');
            
            ?>
            <h3 class="module-heading">住所</h3>
            <?php echo $this->Form->input('UserPageAddress.street', array('type'=>'text', 'label'=>false, 'class'=>'input-address'));?>
        </div>
        <h3 class="module-heading-inline schedule">スケジュール</h3><a href="javascript:void(0);"><span id="ScheduleInfoButton" class="icon-inline icon-question"></span></a>
        <div class="schedule-container">
            <?php echo $this->Form->input('calendar_iframe', array('type'=>'textarea', 'label'=>false, 'class'=>'calendar-iframe-input', 'div'=>''));?>
        </div>
        <h3 class="module-heading-inline">ページを公開する</h3>
        <?php echo $this->Form->checkbox('is_public', array('type'=>'checkbox'));?>
    <?php echo $this->Form->submit('保存する', array('class'=>'btn btn-save')); ?>
    <?php echo $this->Form->end(); ?>
    </div>
</div>

<div style="display:none;">
    <div id="PhotoInput0">
        <img src="http://placehold.it/220x220">
        <?php echo $this->Form->input('Attachment.profile.0', array('type' => 'file')); ?>
    </div>
    <div id="PhotoInput1">
        <img src="http://placehold.it/220x220">
        <?php echo $this->Form->input('Attachment.food.0', array('type' => 'file')); ?>
    </div>
    <div id="PhotoInput2">
        <img src="http://placehold.it/220x220">
        <?php echo $this->Form->input('Attachment.food.1', array('type' => 'file')); ?>
    </div>
    <div id="PhotoInput3">
        <img src="http://placehold.it/220x220">
        <?php echo $this->Form->input('Attachment.food.2', array('type' => 'file')); ?>
    </div>    
    <div id="PhotoInput4">
        <img src="http://placehold.it/220x220">
        <?php echo $this->Form->input('Attachment.food.2', array('type' => 'file')); ?>
    </div>
    <div id="PhotoInput5">
        <img src="http://placehold.it/220x220">
        <?php echo $this->Form->input('Attachment.food.2', array('type' => 'file')); ?>
    </div>
</div>
