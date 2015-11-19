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

</script>


<div class="container-slim">
    <div class="container-slim profile">
    <h2>
        <?php echo $title;?>
    </h2>
    <?php
    echo $this->Form->create('Question', array('action'=>''));
    echo $this->Form->input('id', array('type' => 'hidden'));
    echo $this->Form->input('title', array('label'=>'タイトル'));
    ?>
<h3 class="module-heading">解答</h3>
<?php echo $this->Form->input('answers', array('label'=>false, 'id'=>'profile', 'type'=>'textarea'));?>
        <h3 class="module-heading-inline">質問を載せる</h3>
        <?php echo $this->Form->checkbox('is_public', array('type'=>'checkbox'));?>
    <?php echo $this->Form->submit('保存する', array('class'=>'btn btn-save')); ?>
    <?php echo $this->Form->end(); ?>
    </div>
</div>
