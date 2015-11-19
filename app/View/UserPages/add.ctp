<script type="text/javascript">
tinymce.init({
        selector: "textarea",
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


<?php
echo $this->Form->create('UserPage', array('action'=>'add'));
echo $this->Form->input('body', array('label'=>'Body', 'type'=>'textarea'));
echo $this->Form->end('Submit');
?>
