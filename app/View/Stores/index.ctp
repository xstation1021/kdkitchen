<table class="store-list">
    <tr>
        <th></th>
        <th>Name</th>
        <th>Location</th>
        <th># Items</th>
        <th class="created-cell"></th>
    </tr>
    <?php foreach ($data['Store'] as $store): ?>
    <?php if($store['Store']['item_count'] == 0){continue;}?>
    <tr>
        <td class="image-cell">
            <?php
            if(isset($store['Item'][0]['Attachment'][0])) {
            ?>
            <a href="/stores/view/<?php echo $store['Store']['id']; ?>">
                <img class="item-thumb" src="/<?php echo $store['Item'][0]['Attachment'][0]['file_dir'].'/thumbnails_mini/'.$store['Item'][0]['Attachment'][0]['file_name'];?>">
            </a>
            <?php
            } else { 
            ?>
                <img class="item-thumb" src="/img/placeholders/pna.jpg">    
            <?php }?>

        </td>
        <td class="name-cell">
            <a href="/stores/view/<?php echo $store['Store']['id']; ?>"><?php echo $store['Store']['name']; ?></a>
            <?php 
                if(strtotime($store['Store']['created']) > (time() - 60*60*3)) {?>
                <span class="new">NEW</span>
            <?php }?>
        </td>
        <td class="location-cell">
            Astoria
        </td>
        <td class="itemcount-cell">
            <?php echo $store['Store']['item_count'];?>
        </td>
        <td class="created-cell">
            <?php echo $store['Store']['created'];?>
        </td>
    </tr>
    <?php endforeach; ?>
</table>

<a class="button" href="/stores/add">+CREATE</a>

<?php echo $this->element('paginator');?>
