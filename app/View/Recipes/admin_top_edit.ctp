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
    

});

var replace = '<img src="http://placehold.it/970x670"><div class="input file"><label for="AttachmentImage">Image</label><input id="AttachmentImage" type="file" name="data[Attachment][image]"></div>';
var replace2 = '<img src="http://placehold.it/270x180"><div class="input file"><label for="AttachmentImage">Image</label><input id="AttachmentImage" type="file" name="data[Attachment][chef]"></div>';

</script>

<?php
$recipe_id = null;
$image_pic_dir = NULL;
$chef_pic_dir = NULL;

$summary = $this->data;
if(!empty($summary['RecipeSummary']) && !empty($summary['RecipeSummary']['id']) ) {
    $image_pic_dir = '/uploads/recipesummary/'. $summary['RecipeSummary']['hash'].'/recipesummary'.$summary['RecipeSummary']['id'].'.jpg';
    $chef_pic_dir = '/uploads/recipesummary/' . $summary['RecipeSummary']['hash']. '/chef.jpg';
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
        $action = 'admin_top_add';
    } else {
    	$action = 'admin_top_edit';
    }
    $options['url'] = array('controller' => 'recipes', 'action' => $action, $id);

    echo $this->Form->create('RecipeSummary', $options);
    echo $this->Form->input('id', array('type'=>'hidden'));
    ?>
    <h3 class="module-heading">バックグランドイメージ</h3>
        <div id="img1" class="profile-picture">
            <!--
            <img src="http://placehold.it/220x220">
            -->
        <!-- EDIT PROF PICS -->
        <?php if($image_pic_dir) { ?>
            <div id="ImageWrapperProfile">
                <div class="item-edit-imgwrapper">
                    <img class="item-thumb" style="border-radius:0px;" src="<?php echo $image_pic_dir;?>">   
                    <a href="javascript:void(0);" onclick="$('#img1').html(replace);" class="btn btn-delete"><span class="icon icon-delete"></span>Replace</a>
                </div>    
            </div>
        <?php } else { ?>
            <img src="http://placehold.it/970x670">
            <?php echo $this->Form->input('Attachment.image', array('type' => 'file')); 
            if(isset($fileError)){
                echo $fileError;
            }
            ?>
            
        <?php } ?>
        </div>
        <br> <br>
        <hr class="divider">
        <h3 class="module-heading">シェフイメージ</h3>
                <div id="img2" class="profile-picture">
            <!--
            <img src="http://placehold.it/220x220">
            -->
        <!-- EDIT PROF PICS -->
        <?php if($chef_pic_dir) { ?>
        
            <div id="ImageWrapperProfile">
                <div class="item-edit-imgwrapper">
                    <img class="item-thumb" style="border-radius:0px;" src="<?php echo $chef_pic_dir;?>">   
                    <a href="javascript:void(0);" onclick="$('#img2').html(replace2);" class="btn btn-delete"><span class="icon icon-delete"></span>Replace</a>
                </div>    
            </div>
        <?php } else { ?>
            <img src="http://placehold.it/270x180">
            <?php echo $this->Form->input('Attachment.chef', array('type' => 'file')); 
            if(isset($fileError2)){
                echo $fileError2;
            }
            ?>
            
        <?php 
            } 
        ?>
        
     
        </div>
        <br> <br>
        <hr class="divider">
           <h3 class="module-heading">シェフ名</h3>
        <?php 
        
        echo $this->Form->input('chef', array('type' => 'text', 'label'=>false));
        ?>
        <h3 class="module-heading">コンテンツ</h3>
        <!-- PROFILE EDITOR WIDGET -->
        <?php echo $this->Form->input('content', array('label'=>false, 'id'=>'profile', 'type'=>'textarea'));?>
        <br>

        <h3 class="module-heading">公開月  (日は影響を受けません) </h3>
            <?php echo $this->Form->input('publish_month', array('type' => 'text', 'label'=>false,'class' => 'publishDate')); ?>
        <h3 class="module-heading-inline">レシピを公開する</h3>
        <?php echo $this->Form->checkbox('is_public', array('type'=>'checkbox'));?>
    <?php echo $this->Form->submit('保存する', array('class'=>'btn btn-save')); ?>
    <?php echo $this->Form->end(); ?>
    </div>
</div>

