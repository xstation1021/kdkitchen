<div>

<?php 
    echo $this->Html->link(
    'レシピの一覧に戻る',
    array(
        'controller' => 'recipes',
        'action' => 'index',
        'full_base' => true
    )
);
?>
</div>