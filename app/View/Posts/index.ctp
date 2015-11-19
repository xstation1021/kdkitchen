<?php 
switch($category_code) {
    case 'recipe':
        $title = 'RECIPE';
        $description['title'] = 'KDK Free Recipes';    
        $description['text'] = 'New YorkerやKDガール&ボーイ達が作るKD KITCHEN認定のレシピを無料でお届けします。';
        break;
    case 'report':
        $title = 'REPORT';
        $description['title'] = 'KD+KDK Bog';    
        $description['text'] = 'New Yorkから体の中からキレイになる情報や日々のできごとをお届けします。';
        break;
    default:
        $title = '';
        $description = False;
}
?>
<div class="container">
    <div class="page-heading">
        <h1><?php echo $title;?></h1>
        <div class="dot-container">
            <div class="dot"></div>
            <div class="dot"></div>
            <div class="dot"></div>
        </div>
    </div>
        
    <div class="blog-front cf">
        <div class="col col-blog-left">
        <div class="fb-like-box blog-post cf" data-href="https://www.facebook.com/kdkitchennewyork" data-width="720"  data-height="600" data-colorscheme="light" data-show-faces="false" data-header="false" data-stream="true" data-show-border="false"></div>
        <?php if(!$data) { ?>&nbsp;<?php }; ?> 

        <?php foreach($data as $article) { ?>
        <?php $tags = $article['Tag'];?>
        <?php $article = $article['Post'];?>
            <!-- Blog Post -->
            <div class="blog-post cf">
                <?php if(isset($article['featured_media_url']) && $article['featured_media_url'] != ''){?>
                <?php echo $this->Html->link(
                    $this->Html->image($article['featured_media_url'], array('class'=>'entry-image')),
                    array('controller'=>'posts', 'action'=>'view', 
                    $article['id']), array('escape'=>false));
                ?>
                <?php } ?>
                <div class="post-content">
                <h2 class="post-title"><?php echo $article['title'];?></h2>
                    <?php 
                    $body = $article['body'];
                    preg_match("/<p>(.*)<\/p>/",$body,$matches);
                    if($matches) {
                        $intro = strip_tags($matches[1]);
                        if(strlen($intro) > 1000) {
                            echo substr($intro, 0, 1000)."...";
                        } else {
                            echo $intro;
                        }
                    }
                    ?>
                    </p>
                </div>
                <div class="post-info-container">
                    <ul class="post-info">
                        <li><span class="date">日付: </span><a href="#"><?php $date = date_create($article['created']);echo date_format($date, 'M j, Y');?></a></li>
                        <li><span class="tags">タグ: </span><?php $tmp=array();foreach($tags as $tag){$tmp[] = $tag['tag'];}echo implode(', ', $tmp);?></li>
                        <li><span class="comments">コメント数: </span> <a href="#"><?php echo $article['comment_count'];?></a></li>
                    </ul>
                    <?php echo $this->Html->link('もっと読む', array('controller'=>'posts', 'action'=>'view', $article['id']), array('class'=>'btn read-more', 'escape'=>false));?>
                </div>
            </div>
        <?php } ?>
        <?php echo $this->element('paginator');?>

        </div>

        <?php 
        switch($category_code) {
            case 'recipe':
                $description['title'] = 'KDK Free Recipes';    
                $description['text'] = 'New YorkerやKDガール&ボーイ達が作るKD KITCHEN認定のレシピを無料でお届けします。';
                break;
            case 'report':
                $description['title'] = 'KD+KDK Bog';    
                $description['text'] = 'New Yorkから体の中からキレイになる情報や日々のできごとをお届けします。';
                break;
            default:
                $description = False;
        }
        ?>
        <?php echo $this->element('/Posts/sidebar', array('description'=>$description));?>
    </div>
</div>

   <script>
      window.fbAsyncInit = function() {
        FB.init({
          appId      : '1484247458508583',
          xfbml      : true,
          version    : 'v2.1'
        });
      };

      (function(d, s, id){
         var js, fjs = d.getElementsByTagName(s)[0];
         if (d.getElementById(id)) {return;}
         js = d.createElement(s); js.id = id;
         js.src = "//connect.facebook.net/en_US/sdk.js";
         fjs.parentNode.insertBefore(js, fjs);
       }(document, 'script', 'facebook-jssdk'));
    </script>

    <div id="fb-root"></div>
    <script>(function(d, s, id) {
      var js, fjs = d.getElementsByTagName(s)[0];
      if (d.getElementById(id)) return;
      js = d.createElement(s); js.id = id;
      js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&appId=1484247458508583&version=v2.0";
      fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));

    </script>