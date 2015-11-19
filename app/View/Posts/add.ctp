<?php
echo $this->Html->css('/modules/jquery-textext-master/src/css/textext.core');
echo $this->Html->css('/modules/jquery-textext-master/src/css/textext.plugin.autocomplete');
echo $this->Html->css('/modules/jquery-textext-master/src/css/textext.plugin.tags');
echo $this->Html->script('/modules/jquery-textext-master/src/js/textext.core');
echo $this->Html->script('/modules/jquery-textext-master/src/js/textext.plugin.autocomplete');
echo $this->Html->script('/modules/jquery-textext-master/src/js/textext.plugin.tags');
?>
<script type="text/javascript">
tinymce.init({
        selector: "#Body",
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
        templates: [
            {title: 'Test template 1', content: 'Test 1'},
            {title: 'Test template 2', content: 'Test 2'}
        ]
});

<?php
$existing_tags = '';
if(isset($this->data['Post']['tag'])) {
    $existing_tags = trim($this->data['Post']['tag'], '[]');
}
?>

$(function() {
    $('#Tags').textext({
            plugins : 'tags autocomplete',
            tagsItems: [<?php echo $existing_tags;?>]
        })
        .bind('getSuggestions', function(e, data)
        {
            var list = [<?php echo $tag_suggestions;?>],
                textext = $(e.target).textext()[0],
                query = (data ? data.query : '') || ''
                ;

            $(this).trigger(
                'setSuggestions',
                { result : textext.itemManager().filter(list, query) }
            );
        })
        ;
});
</script>


<?php
echo $this->Form->create('Post', array('method'=>'post'));
echo $this->Form->input('title', array('label'=>'Title'));
?>
<p>
Make sure the featured image is at least 720px wide.
</p>
<?php
echo $this->Form->input('featured_media_url', array('label'=>'Featured Image URL'));
echo $this->Form->input('featured_media_small_url', array('label'=>'Small Featured Image URL'));
echo $this->Html->link('Upload Image', array('controller'=>'images', 'action'=>'add'), $options = array(), $confirmMessage = 'You will lose unsaved changes.  Are you sure you want to navigate away?');
echo $this->Form->input('summary', array('type'=>'text'));
echo $this->Form->input('body', array('label'=>'Body', 'id'=>'Body', 'type'=>'textarea'));
echo $this->Form->input('tag', array('label'=>'Tags', 'id'=>'Tags', 'rows'=>1, 'value'=>'', 'type'=>'textarea'));
echo $this->Form->input('is_published', array('type'=>'checkbox', 'label'=>'Publish'));
echo $this->Form->end('Submit');
?>
