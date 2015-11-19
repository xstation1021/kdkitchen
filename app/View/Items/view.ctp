<script>

$(document).ready(function() {
    $(".item-thumb-link").fancybox();
    $(".image-gallery").fancybox();
    $(".item-buy-link").fancybox({type:'inline'});
    var $container = $('.item-list-wrapper');

    $container.imagesLoaded(function() {
        $('.item-list-wrapper').isotope({
            itemSelector : '.item-wrapper',
                layoutMode : 'fitRows',
        });
    });
});
$(window).resize(function() {
    $('.image-gallery').css('width', '100%');
    $('.image-gallery').css('height', '100%');
    $('.item-thumb').css('width', '100%');
    
    $('.item-minithumb-wrapper').css('width', '100%');
    $('.item-minithumb-item-image').css('width', '100%');
});
</script>

<?php
$attachment = $this->data['Attachment'];
?>
<br/>
<div class="one-third">

    <div class="item-images-wrapper">
        <?php if($attach = array_shift($attachment)) { ?>
            <a class="image-gallery" rel="1" href="/<?php echo $attach['file_dir'].'/disp/'.$attach['file_name'];?>">
                <img class="item-thumb" src="/<?php echo $attach['file_dir'].'/thumbnails/'.$attach['file_name'];?>">    
            </a>
        <?php } else { ?>
            <img class="item-thumb" src="/img/placeholders/pna.jpg">    
        <?php } ?>
        <table class="item-minithumb-wrapper">
        <tr>
        <?php while($attach = array_shift($attachment)) { ?>
            <td class="item-minithumb-item-wrapper">
                <a class="image-gallery" rel="1" href="/<?php echo $attach['file_dir'].'/disp/'.$attach['file_name'];?>">
                    <img class="item-minithumb-item-image" src="/<?php echo $attach['file_dir'].'/thumbnails_mini/'.$attach['file_name'];?>" alt="Smiley face">    
                </a>
            </td>
        <?php } ?>
        </tr>
        </table>
    </div>
</div>

<div class="two-third last">
    <h2><?php echo $this->data['Item']['name'];?></h2>
    <?php echo $this->Html->link('Edit', array('controller'=>'items', 'action'=>'edit', $this->data['Item']['id']));?>
    <div class="price"><h3>$<?php echo $this->data['Item']['price'];?><h3></div>
    <div class="created">Created: <?php $date = date_create($this->data['Item']['created']);echo date_format($date, 'F j, Y, H:i:s');?></div>
    <div class="status">Status: Active</div>
    <div class="infobox"><?php echo $this->data['Item']['description'];?></div>
    <a class="button item-buy-link" href="#ItemBuyForm" onclick="$('#StoreHash').val('<?php echo $this->data['Store']['store_hash'];?>');$('#ItemBuyId').val('<?php echo $this->data['Item']['id']; ?>');">BUY</a>
    <?php echo $this->element('Items/buy');?>

    <div class="clear"></div>

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
                            <?php echo $comment['created_by'];?> - <a href="javascript:void(0);" class="comment-reply-link" onclick="$('#ParentId').val('<?php echo $comment['id']?>');$('.cancel-reply-wrapper').show();">Reply</a>
                            </h5>
                            <p class="date"><?php $date = date_create($comment['created']);echo date_format($date, 'F j, Y, H:i:s');?></p>
                        </div>
                        <div class="comment-body">
                            <p>
                                <?php echo $comment['body'];?>
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
                                    <?php echo $child_comment['created_by'];?> - <a href="javascript:void(0);" class="comment-reply-link" onclick="$('#ParentId').val('<?php echo $child_comment['id'];?>');$('.cancel-reply-wrapper').show();">Reply</a>
                                    </h5>
                                    <p class="date"><?php $date = date_create($child_comment['created']);echo date_format($date, 'F j, Y, H:i:s');?></p>
                                </div>
                                <div class="comment-body">
                                    <p>
                                        <?php echo $child_comment['body'];?>
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
    <?php } ?>

    <section id="respond">
        
        <div class="cancel-reply-wrapper" style="display:none;">
            <a href="javascript:void(0);" class="cancel-reply" onclick="$('#ParentId').val('');$('.cancel-reply-wrapper').hide();">Cancel Reply</a>
        </div>
        <h6 class="section-title">leave a comment</h6>

        <?php echo $this->Form->create('Comment', array('action'=>'add', 'method'=>'post', 'class'=>'comments-form')); ?>
            <label for="comment-name"><strong>Name</strong> (required)</label>
            <?php echo $this->Form->hidden('item_id', array('value'=>$this->data['Item']['id'])); ?>
            <?php echo $this->Form->hidden('parent_id', array('id'=>'ParentId')); ?>
            <?php echo $this->Form->input($imap['created_by'], array('label'=>'', 'div'=>'input-block')); ?>
            <div class="clear"></div>
            <label for="comment-message"><strong>Your Comment</strong> (required)</label>
            <?php echo $this->Form->input($imap['body'], array('type'=>'textarea', 'label'=>'', 'div'=>'textarea-block')); ?>
            <div class="clear"></div>
            <div class="comment-password-wrapper">
                <label for="comment-password"><strong>Password</strong> (required)</label>
                <?php echo $this->Form->input($imap['password'], array('type'=>'password', 'label'=>'', 'div'=>'input-block')); ?>
            </div>
            <div class="clear"></div>
        <?php echo $this->Form->end('submit'); ?>
        
    </section>
</div>

