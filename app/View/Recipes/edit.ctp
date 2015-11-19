<?php 
    echo $this->Html->script('jquery-ui.min');
    echo $this->Html->css('jquery-ui.min');
?>


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

    $('.publishDate').datepicker();
    
    $('#ScheduleInfoButton').magnificPopup({
        items: {
            src: '#ScheduleInfoPopup',
            type: 'inline',
        },
        showCloseBtn: false
    });
});

var file_upload ='<div class="input file"><label for="AttachmentFile">File</label><input type="file" name="data[Attachment][file]"  id="AttachmentFile"/></div>';
var replace = '<img src="http://placehold.it/1080x720"><div class="input file"><label for="AttachmentImage">Image</label><input id="AttachmentImage" type="file" name="data[Attachment][image]"></div>';
</script>

<?php
$recipe_id = null;
$pdf_dir = null;
$image_pic_dir = NULL;
$recipe = $this->data;
if(!empty($recipe['Recipe']) && !empty($recipe['Recipe']['id']) ) {
    $image_pic_dir = '/uploads/recipe/'. $recipe['Recipe']['hash'].'/recipe'.$recipe['Recipe']['id'].'.jpg';
    $pdf_dir = $recipe['Recipe']['hash']. "/recipe" . $recipe['Recipe']['id']. ".pdf";
}

?>
<?php 

    $data = $this->data;
?>


<div class="container-slim">
    <div class="page-heading">
        <h1><?php echo $title;?></h1>
        <div class="dot-container">
            <div class="dot"></div>
            <div class="dot"></div>
            <div class="dot"></div>
        </div>
    </div>
    <div class="container-slim profile">
    <?php
    $id = null;
    if(isset($this->data['id'])){
        $id = $this->data['id'];
    }
    $options = array('method'=>'post', 'type'=>'file');
    if($edit == false){
        $action = 'add';
    } else {
        $action = 'edit';
    }
    $options['url'] = array('controller' => 'recipes', 'action' => $action, $id);
    
    echo $this->Form->create('Recipe', $options);
    if(isset($fileError['image'])){
        echo $fileError['image'];
    }
    ?>
        <div class="profile-picture">
            <!--
            <img src="http://placehold.it/220x220">
            -->
        <!-- EDIT PROF PICS -->
        <?php if($image_pic_dir) { ?>
            <div id="ImageWrapperProfile">
                <div class="item-edit-imgwrapper">
                    <img class="item-thumb" style="border-radius:0px;" src="<?php echo $image_pic_dir;?>">    
                    <a href="javascript:void(0);" onclick="$('.profile-picture').html(replace);" class="btn btn-delete"><span class="icon icon-delete"></span>Replace</a>
                </div>    
            </div>
        <?php } else { ?>
            <img src="http://placehold.it/1080x720">
                <?php echo $this->Form->input('Attachment.image', array('type' => 'file')); ?>
        <?php } ?>
        </div>
        <br> <br>
        <hr class="divider">
        <h3 class="module-heading">レシピタイトル</h3>
        <div class="introductions-container">
        <?php echo $this->Form->input('id', array('type'=>'hidden', 'label'=>false, 'class'=>'input-introductions'));?>
        <?php echo $this->Form->input('hash', array('type'=>'hidden', 'label'=>false, 'class'=>'input-introductions'));?>
            <?php echo $this->Form->input('title', array('type'=>'text', 'label'=>false, 'class'=>'input-introductions'));?>
        </div>
        <h3 class="module-heading">英語サブタイトル</h3>
        <div class="introductions-container">
            <?php echo $this->Form->input('title_eng', array('type'=>'text', 'label'=>false, 'class'=>'input-introductions'));?>
        </div>
        <h3 class="module-heading">紹介文</h3>
        <!-- PROFILE EDITOR WIDGET -->
        <?php echo $this->Form->input('summary', array('label'=>false, 'id'=>'profile', 'type'=>'textarea'));?>
        <br>

        <h3 class="module-heading">レシピカテゴリー</h3>
        <?php 
            echo $this->Form->input('category_id', array(
                    'options' => $categories,
                    'label' => false,
                    'required'=>true,
                    'empty' => '選択してください'
            ));
        ?>
        
        <h3 class="module-heading">公開月</h3>
            <?php 
                echo $this->Form->input('summary_id', array(
                        'options' => $summary_list,
                        'label' => false,   
                        'required'=>true 
                ));
            ?>
        <h3 class="module-heading">レシピPDF</h3>
        <h4 class="module-heading" style="color:red;">Firefoxを使用しないでください。</h3>
            <?php 
            if($pdf_dir != null && file_exists("uploads/recipe/" . $pdf_dir)){
            ?>
            <div id="recipe_file_upload">
                <a href="/recipes/downloadfile/<?php echo $recipe['Recipe']['id'];?>">Check Uploaded Recipe</a>
                <a href="javascript:void(0);" onclick="$('#recipe_file_upload').html(file_upload);" class="btn">Replace PDF</a>
            </div>
           
            <?php     
            } else {
            	echo $this->Form->input('Attachment.file', array('type' => 'file'));
            	if(isset($fileError['file'])){
            	    echo $fileError['file'];
            	}
            }
            if(isset($fileError['file'])){
                echo $fileError['file'];
            }
            ?>
        <h3 class="module-heading">VIMEO Video ID</h3>
            <div class="introductions-container">
                <?php echo $this->Form->input('video_url', array('type'=>'text', 'label'=>false, 'class'=>'input-introductions'));?>
            </div>
            
            <h3>Sort Order</h3>
               <div>
                <?php echo $this->Form->input('sortorder', array('type'=>'text', 'label'=>false, 'style'=>'width:50px'));?>
                (numbers only)
                </div>
                <br>
            
        <h3 class="module-heading-inline">レシピを公開する</h3>
        <?php echo $this->Form->checkbox('is_public', array('type'=>'checkbox'));?>
    <?php echo $this->Form->submit('保存する', array('class'=>'btn btn-save')); ?>
    <?php echo $this->Form->end(); ?>
    </div>
</div>

