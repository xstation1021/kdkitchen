
<div class="container-slim">
    <div class="page-heading">
        <h1>JOIN THE CLASS</h1>
        <div class="dot-container">
            <div class="dot"></div>
            <div class="dot"></div>
            <div class="dot"></div>
        </div>
    </div>
    
    <div style="height:180px;">
    <ul class="area-list">
        <li><?php
                $seleced_style = "background-color:#ffbf00;color:white;";
                $not_seleced_style = "background-color:white;color:black;";
                $all_style = $seleced_style;
                $url = "Javascript:void(0)";
            
                if($prefecture != null){ 
                    $all_style = $not_seleced_style;
                    $url = '/user_pages/area/';
                }
                echo $this->Html->link('All', $url, array('class'=>'button all', 'style'=>$all_style));
            ?>
        </li>
            <?php 
                $selectedRegion = "";
                foreach ($regions as $index=> $region){
                    $selected = false;
                    $item = $region['RegionPrefecture'];
                    
                    if(!empty($prefecture)){
                        foreach($item as $record){
                            if($record['id'] == $prefecture){
                                $selectedRegion = $index;
                                $selected = true;
                            }
                        }
                    }
                    $item=$region['Region'];
                    if(!empty($region['RegionPrefecture'])){
                    ?>  
                <li><?php 
                    $style = "";
                    if($selected == true){
                    	$style = "$seleced_style";
                    }
                    echo $this->Html->link($item['name'], 'Javascript:void(0)', array('id'=>'region'.$item['id'], 'class'=>'button region', 'style'=>"$style"));
                    }
                ?>
                </li>
            <?php 
                 }
            ?>
    </ul>
    
    <ul class="area-list">
            <?php 
               
                foreach ($regions as $index => $region){
                    $selected_region = false;
                    $item=$region['RegionPrefecture'];
                    if($selectedRegion == $index){$selected_region = true;}
                    foreach($item as $record){
            ?>  
        <li><?php 
        $prefectureName = $record['name'];
        $prefectureId = $record['id'];
        if($selected_region == true && $record['id'] == $prefecture){
            $style = "$seleced_style";   
        } elseif ($selected_region == true){
        	$style = "$not_seleced_style";
        }
         else {
            $style = "display:none;";
        }
        echo $this->Html->link($prefectureName, "/find/area/$prefectureId", array('onclick'=>'getInstructorsList("'. $record['id'] . '")','class'=>'button prefecture region'.$record['region_id'], 'style'=>"$style"));?></li>
            <?php 
                 }}
            ?>
    </ul>
    </div>


    <div class="instructor-list">

    <?php foreach ($data as $userpage): ?>
    <?php if(isset($userpage['UserPage']) && $userpage['UserPage']['is_public'] == 0 || !isset($userpage['UserPage'])){continue;}?>
        <!-- Instructor Row to Repeat -->
        <div class="row cf">
            <div class="instructor-col-left">
                <a href="/user_pages/view/<?php echo $userpage['UserPage']['id']; ?>">
                <?php if(isset($userpage['Attachment']['id'])) {?>
                    <img class="item-thumb" src="/<?php echo $userpage['Attachment']['file_dir'].'/cropped/'.$userpage['Attachment']['file_name'];?>">
                <?php } else {?>
                    <?php echo $this->Html->image('profile-default.png');?>
                <?php }?>
                </a>
            </div>
            <div class="instructor-col-right">
                <h2 class="name"><?php echo h($userpage['User']['display_name']);?></h2>
                <?php if(isset($userpage['UserPage']['phone_number']) && !empty($userpage['UserPage']['phone_number'])) {?>
                <p class="phone"><span class="icon icon-phone-black"></span><?php echo h($userpage['UserPage']['phone_number']);?></p>
                <?php }?>
                <p class="address"><span class="icon icon-address-black"></span>
                    <?php 
                    $address = $userpage['UserPageAddress'];
                    extract($address); 
                    ?>
                    <?php echo '&#12306;'.h($zip.' '.$userpage['RegionPrefecture']['name'].' '.$street);?>
                </p>
                <p class="description">
                    <?php echo h($userpage['UserPage']['summary']);?>
                </p>
                <a href="/user_pages/view/<?php echo $userpage['UserPage']['id']; ?>" class="btn btn-view">詳細<span class="icon icon-arrow-right"></span></a>
            </div>
        </div>
    <?php endforeach; ?>

    </div>
    <?php echo $this->element('paginator');?>
</div>

<script>
    var onGoing = false;
    function getInstructorsList(prefecture){
//         if(onGoing == true){
//             return false;
//         }
//     	$.get( "/find/area/"+prefecture, function(){
//         	onGoing = true;
//     		$('.instructor-list').html("");

//         	})
//     	.done(function( data ) {
//     		   $('.instructor-list').html(data);
//     		   onGoing = false;
//     	});
    }


    $('.prefecture').each(function(){
        if($(this).html() != '北海道' && $(this).html() != '海外'){
        　　　　　　　　var prefecture = $(this).html();
            prefecture = prefecture.substring(0, prefecture.length - 1);
          $(this).html(prefecture);
        }
    });

    var currentlySelected = null;

    $(document).ready(function(){
        
        $('.all').click(function(){
            $('.prefecture').hide();
            getInstructorsList("ALL");
        });

        $('.region').click(function(){
    	    $('.prefecture').hide();
    	    var regionId = $(this).attr('id');
    	    $('.' + regionId).show();
        });

        $('.area-list a').click(function(){

            $('.area-list a').css( "background-color", "white" );
            $('.area-list a').css( "color", "#666666" );

	    if($(this).hasClass('all')){
                currentlySelected  = null;
        	}

	    if($(this).hasClass('region') == true && currentlySelected != null){
                $(currentlySelected).css( "background-color", "#ffbf00" );
                $(currentlySelected).css( "color", "white" );
		}

            $(this).css( "background-color", "#ffbf00" );
            $(this).css( "color", "white" );

            if($(this).hasClass('prefecture') == true){
                currentlySelected = $(this);
                var classes = $(this).attr('class');
                var items = classes.split(' ');
                var regionName = items[2];
                
                $('#'+ regionName).css( "background-color", "#ffbf00" );
                $('#'+ regionName).css( "color", "white" );
            }            
        });
        
    });

</script>
