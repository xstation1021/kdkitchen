<div class="col col-blog-right">
    <h2>カテゴリー</h2>
    <ul class="blog-categories">
        <li><a href="/posts/index/recipe">レシピ</a></li>
        <li><a href="/posts/index/report">レポート</a></li>
    </ul>
        
    <?php if(isset($description) && $description) { ?>
        <h2><?php echo $description['title'];?></h2>
        <p class="posts-description"><?php echo $description['text'];?></p>
    <?php } ?>
</div>
