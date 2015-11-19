<script>

$(document).ready(function() {
    $(".item-thumb-link").fancybox();
    $(".image-gallery").fancybox();

    $(".item-buy-link").fancybox({
        type:'inline',
        scrolling:'no'
    });
    var $container = $('.item-list-wrapper');

    $container.imagesLoaded(function() {
        $('.item-list-wrapper').isotope({
            itemSelector : '.item-wrapper',
            //layoutMode : 'fitRows',
            layoutMode : 'fitRows',
        });
    });

    $container.infinitescroll({
        navSelector  : '#Paginator',    // selector for the paged navigation 
        nextSelector : '#Paginator .next a',  // selector for the NEXT link (to page 2)
        itemSelector : '.item-wrapper',     // selector for all items you'll retrieve
        loading: {
            finishedMsg: 'No more pages to load.',
            img: 'http://i.imgur.com/qkKy8.gif'
            }
        },
        function( newElements ) {
    $container.imagesLoaded(function() {
            $container.isotope( 'appended', $(newElements) ); 
    });
        }
    );
});

$(window).smartresize( function() {
    $('.image-gallery').css('width', '100%');
    $('.image-gallery').css('height', '100%');
    $('.item-thumb').css('width', '100%');
    
    $('.item-minithumb-wrapper').css('width', '100%');
    $('.item-minithumb-item-image').css('width', '100%');

}).smartresize();

</script>
<div class="item-list-wrapper clearfix">
<?php foreach($data['Item'] as $item_index=>$item) { ?>
    <?php 
    $store_hash = $item['Store']['store_hash'];

    $attachment = array();
    if(isset($item['Attachment'])){
        $attachment = $item['Attachment'];
    }

    if(isset($item['Item'])){
        $item = $item['Item'];
    }

    $last = ''; 
    ?>
    <?php if($item_index%3 == 2 || count($data['Item'])-1 == $item_index) {$last='last';} ?>
    <div class="item-wrapper one-third <?php echo $last;?>">
        <label class="item-name"><a href="/items/view/<?php echo $item['id'];?>"><?php echo h($item['name']); ?></a></label>
        <?php if(!empty($attachment)) {?>
        <div class="item-images-wrapper">
            <div class="item-thumb-wrapper">
            <?php if($attach = array_shift($attachment)) { ?>
                <a class="image-gallery" rel="<?php echo $item_index; ?>" href="/<?php echo $attach['file_dir'].'/disp/'.$attach['file_name'];?>">
                    <img class="item-thumb" src="/<?php echo $attach['file_dir'].'/thumbnails/'.$attach['file_name'];?>">    
                </a>
            <?php } ?>
            </div>
            <!--
            <table class="item-minithumb-wrapper">
            <tr>
            <?php $count = 0 ?>
            <?php while($attach = array_shift($attachment)) { ?>
                <td class="item-minithumb-item-wrapper">
                    <a class="image-gallery" rel="<?php echo $item_index; ?>" href="/<?php echo $attach['file_dir'].'/disp/'.$attach['file_name'];?>">
                        <img class="item-minithumb-item-image" src="/<?php echo $attach['file_dir'].'/thumbnails_mini/'.$attach['file_name'];?>" alt="Smiley face">    
                    </a>
                </td>
                <?php $count += 1 ?>
            <?php } ?>
            <?php if($count == 1){?><td>&nbsp;</td> <?php }?>
            </tr>
            </table>
            -->
        </div>
        <?php } else { ?>
            <img class="item-thumb" src="/img/placeholders/pna.jpg">    
        <?php } ?>
        <div class="item-desc">
        <div class="item-desc-price">$<?php echo h($item['price']); ?></div>
            <div class="item-desc-desciption">
                <?php echo h($item['description']); ?>
            </div>

            <?php if($item['is_active']) { ?>
                <?php if(!isset($data['is_store_manager']) || (isset($data['is_store_manager']) && !$data['is_store_manager'])) { ?>
                    <a class="button item-buy-link" href="#ItemBuyForm" onclick="$('#StoreHash').val('<?php echo $store_hash;?>');$('#ItemBuyId').val('<?php echo $item['id']; ?>');">BUY</a>
                <?php } ?>
            <?php } else { ?>
                SOLD
            <?php } ?>
        </div>
    </div>
<?php } ?>
</div>


<?php echo $this->element('Items/buy');?>

<div class="clear"></div>
<div style="display:none;">
<?php echo $this->element('paginator');?>
</div>
