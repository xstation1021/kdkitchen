<script>
$(document).ready(function() {
    
//    $("a#Inline").fancybox({
//        'hideOnContentClick': true
//    });
    
    $('.comment-delete-link').magnificPopup({
        items: {
            src: '#DeletePopup',
            type: 'inline'
        }
    });
});
</script>

<div class="container">
    <div class="page-heading">
        <h1>REPORT</h1>
        <div class="dot-container">
            <div class="dot"></div>
            <div class="dot"></div>
            <div class="dot"></div>
        </div>
    </div>
    <div class="blog-front cf">
        <div class="col col-blog-left">
            
            <!-- Blog Post -->
            <div class="blog-view cf">
                <?php if($this->data['Post']['featured_media_url'] != '') { ?>
                    <?php echo $this->Html->image($this->data['Post']['featured_media_url'], array('class'=>'entry-image'));?>
                <?php }?>
                <div class="post-content">
                    <h2 class="post-title"><?php echo $this->data['Post']['title'];?></h2>
                    <?php echo $this->data['Post']['body'];?>
                </div>
                <div class="post-info-container">
                    <ul class="post-info">
                        <?php 
                        $tags = array();
                        if(isset($this->data['Tag'])) {
                            $tags = $this->data['Tag'];
                        }
                        ?>
                        <li><span class="tags">Tags: </span><?php $tmp=array();foreach($tags as $tag){$tmp[] = $tag['tag'];}echo implode(', ', $tmp);?></li>
                        <li><span class="date">Posted: </span><?php $date = date_create($this->data['Post']['created']);echo date_format($date, 'M j, Y');?></li>
                        <!--<li><span class="title">Comments:</span> <a href="#"><?php echo $this->data['Post']['comment_count'];?></a></li>
                        -->
                    </ul>
                </div>
            </div>
            
            <!-- Comments -->
            <?php if(isset($this->data['Comment'])) { ?>
            <section id="comments" id="Test">
                <h6 class="section-title">Comments (<?php echo count($this->data['Comment']);?>)</h6>
                <ol class="comments-list">
                    <?php foreach($this->data['Comment'] as $comment) { ?>
                    <li class="comment">
                        <article>
                            <img src="http://www.gravatar.com/avatar/00000000000000000000000000000000?d=mm&amp;s=50" alt="Image" class="avatar">
                            <div class="comment-inner-wrapper">
                                <div class="comment-meta">
                                    <h5 class="author">
                                    <?php echo h($comment['created_by']);?> - <a href="javascript:void(0);" class="comment-reply-link" onclick="$('#ParentId').val('<?php echo $comment['id']?>');$('.cancel-reply-wrapper').show();">返信</a> - <a class="comment-delete-link" href="#Data" onclick="$('#CommentId').val('<?php echo $comment['id'];?>');">削除</a>
                                    </h5>
                                    <p class="date"><?php $date = date_create($comment['created']);echo date_format($date, 'F j, Y, H:i:s');?></p>
                                </div>
                                <div class="comment-body">
                                    <p>
                                        <?php echo h($comment['body']);?>
                                    </p>    
                                </div>
                            </div>
                        </article>
                        <?php if(isset($comment['children'])) { ?>
                        <ul class="children">
                            <?php foreach($comment['children'] as $child_comment) { ?>
                            <li class="comment">
                                <article>
                                    <img src="http://www.gravatar.com/avatar/00000000000000000000000000000000?d=mm&amp;s=50" alt="Image" class="avatar">
                                    <div class="comment-inner-wrapper">
                                        <div class="comment-meta">
                                            <h5 class="author">
                                            <?php echo h($child_comment['created_by']);?> - <a href="javascript:void(0);" class="comment-reply-link" onclick="$('#ParentId').val('<?php echo $child_comment['id'];?>');$('.cancel-reply-wrapper').show();">返信</a> - <a class="comment-delete-link" href="#Data" onclick="$('#CommentId').val('<?php echo $child_comment['id'];?>');">削除</a>
                                            </h5>
                                            <p class="date"><?php $date = date_create($child_comment['created']);echo date_format($date, 'F j, Y, H:i:s');?></p>
                                        </div>
                                        <div class="comment-body">
                                            <p>
                                                <?php echo h($child_comment['body']);?>
                                            </p>    
                                        </div>
                                    </div>
                                </article>
                            </li>
                            <?php } ?>
                        </ul>
                        <?php } ?>
                    </li>
                    <?php } ?>
                </ol> 
            </section>

            <div style="display:none">
                <div id="DeletePopup" class="contact-modal mfp-hide">
                    <h1 class="modal-heading">コメント削除</h1>
                    <?php echo $this->Form->create('Comment', array('action'=>'delete', 'method'=>'POST'));?>
                        <?php echo $this->Form->input('id', array('type'=>'hidden', 'id'=>'CommentId'));?>
                        <?php echo $this->Form->input('password', array('label'=>'パスワード', 'type'=>'password'));?>
                        <?php echo $this->Form->button('削除する', array('type'=>'submit', 'class'=>'btn btn-save'));?>
                    <?php echo $this->Form->end();?>
                </div>
            </div>
            <?php } ?>

            <section id="respond">
                
                <div class="cancel-reply-wrapper" style="display:none;">
                    <a href="javascript:void(0);" class="cancel-reply" onclick="$('#ParentId').val('');$('.cancel-reply-wrapper').hide();">Cancel Reply</a>
                </div>
                <h6 class="section-title">コメント</h6>

                <?php echo $this->Form->create('Comment', array('action'=>'add', 'method'=>'post', 'class'=>'comments-form')); ?>
                    <h3 class="module-heading">お名前 <span class="required">(required)</span></h3>
                    <?php echo $this->Form->hidden('post_id', array('value'=>$this->data['Post']['id'])); ?>
                    <?php echo $this->Form->hidden('parent_id', array('id'=>'ParentId')); ?>
                    <?php echo $this->Form->input($imap['created_by'], array('label'=>'', 'div'=>'input-block')); ?>
                    <div class="clear"></div>
                    <h3 class="module-heading">メッセージ <span>(required)</span></h3>
                    <?php echo $this->Form->input($imap['body'], array('type'=>'textarea', 'label'=>'', 'div'=>'textarea-block')); ?>
                    <div class="clear"></div>
                    <div class="comment-password-wrapper">
                        <h3 class="module-heading">削除キー <span>(required)</span></h3>
                        <?php echo $this->Form->input($imap['password'], array('type'=>'password', 'label'=>'', 'div'=>'input-block')); ?>
                    </div>
                    <div class="clear"></div>
                    <?php echo $this->Form->submit('送信する', array('class'=>'btn btn-save'));?>
                <?php echo $this->Form->end();?>
                
            </section>
            <!-- END Comments -->
        </div>

<?php
/*                        
switch($category_code) {
    case 'recipe':
        $description['title'] = 'Description Titile';    
        $description['text'] = 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat.';
        break;
    case 'report':
        $description['title'] = 'Description Titile';    
        $description['text'] = 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat.';
        break;
    default:
        $description = False;
}
 */
$description = False;
?>
<?php echo $this->element('/Posts/sidebar', array('description'=>$description));?>
    </div>
</div>

