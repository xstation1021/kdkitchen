<section id="main">
    <?php foreach($this->data['Post'] as $article) { ?>
    <article class="entry clearfix">
        <?php if(isset($article['featured_media_url']) && $article['featured_media_url'] != ''){?>
        <?php echo $this->Html->link(
            $this->Html->image($article['featured_media_url'], array('class'=>'entry-image')),
            array('controller'=>'posts', 'action'=>'view', 
            $article['id']), array('escape'=>false));
        ?>
        <?php } ?>
        <div class="entry-body">

        <a href="/posts/view/<?php echo $article['id'];?>">
            <h1 class="title"><?php echo $article['title'];?></h1>
            </a>

            <?php echo $article['body'];?>
            
        </div><!-- end .entry-body -->

        <div class="entry-meta">

            <ul>
                <li><?php echo $this->Html->link('<span class="post-format">Permalink</span>', array('controller'=>'posts', 'action'=>'view', $article['id']), array('escape'=>false));?></li>
                <li><span class="title">Posted:</span> <a href="#"><?php $date = date_create($article['created']);echo date_format($date, 'M j, Y');?></a></li>
                <li><span class="title">Tags:</span> <a href="#">Standard</a></li>
                <li><span class="title">Comments:</span> <a href="#"><?php echo $article['comment_count'];?></a></li>
            </ul>

        </div><!-- end .entry-meta -->
        
    </article>
    <?php } ?>
</section>
<aside id="sidebar">

        <div class="widget">

            <h6 class="widget-title">Blog Categories</h6>

            <ul class="categories">
                <li><a href="#">Recipe</a></li>
                <li><a href="#">Reports</a></li>
            </ul>

        </div><!-- end .widget -->

        <div class="widget">
        
            <h6 class="widget-title">Text Widget</h6>

            <p>Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.</p>

        </div><!-- end .widget -->

        
</aside>
