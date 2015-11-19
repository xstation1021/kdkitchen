<?php
echo $this->Html->css ( 'calendar' );
echo $this->Html->css ( 'responsive-calendar' );
echo $this->Html->script ( 'jquery.calendario' );
echo $this->Html->script ( 'data' );
?>
<script type="text/javascript">	
var codropsEvents = <?php echo json_encode($calData);?>
	
			$(function() {
				
				var cal = $( '#calendar' ).calendario( {
					startIn:0,
						onDayClick : function( $el, $contentEl, dateProperties ) {

// 							for( var key in dateProperties ) {
// 								console.log( key + ' = ' + dateProperties[ key ] );
// 							}

						},
						caldata : codropsEvents
					} ),
					$month = $( '#custom-month' ).html( cal.getMonthName() ),
					$year = $( '#custom-year' ).html( cal.getYear() );

				$( '#custom-next' ).on( 'click', function() {
					cal.gotoNextMonth( updateMonthYear );
				} );
				$( '#custom-prev' ).on( 'click', function() {
					cal.gotoPreviousMonth( updateMonthYear );
				} );
				$( '#custom-current' ).on( 'click', function() {
					cal.gotoNow( updateMonthYear );
				} );

				function updateMonthYear() {				
					$month.html( cal.getMonthName() );
					$year.html( cal.getYear() );
				}

				// you can also add more data later on. As an example:
				/*
				someElement.on( 'click', function() {
					
					cal.setData( {
						'03-01-2013' : '<a href="#">testing</a>',
						'03-10-2013' : '<a href="#">testing</a>',
						'03-12-2013' : '<a href="#">testing</a>'
					} );
					// goes to a specific month/year
					cal.goto( 3, 2013, updateMonthYear );

				} );
				*/
			
			});
		</script>


<script>

$(document).ready(function() {
    var $container = $('.item-list-wrapper');

    $(document).on('click', '.fc-content a',  function(){
        
        var json_string = $(this).siblings('.hidden').html();
        var calendarJson = JSON.parse(json_string);
        console.log(calendarJson);
        var calendarDetail ="<p><b>SUMMARY</b>";
        calendarDetail += "<div>"+ calendarJson.summary +"</div></p>";
        calendarDetail +="<p><b>WHEN</b>";
        calendarDetail += "<div>"+ calendarJson.when +"</div></p>";
        calendarDetail +="<p><b>WHERE</b>";
        calendarDetail += "<div>"+ calendarJson.where +"</div></p>";
        calendarDetail +="<p><b>DESCRIPTION</b>";
        calendarDetail += "<div>"+ calendarJson.description +"</div></p>";

        $('#CalendarDetailPopupContent').html(calendarDetail);


        $.magnificPopup.open({
		    items: {
		        src: '#CalendarDetailPopup',
		        type: 'inline',
		    },
		    showCloseBtn: false
		});
    });

    $('.food-gallery').magnificPopup({
        type: 'image',
        tLoading: 'Loading image...',
        mainClass: 'mfp-img-mobile',
        gallery: {
            enabled: true,
            navigateByImgClick: true,
            preload: [0,1]
        }
    });

    $('#ContactButton').magnificPopup({
        items: {
            src: '#ContactPopup',
            type: 'inline',
        },
        showCloseBtn: false
    });

    $("'[placeholder]'").parents("form").submit(function() {
          $(this).find("[placeholder]").each(function() {
                  var input = $(this);
                      if (input.val() == input.attr("placeholder")) {
                                input.val("''");
                                    }
                    })
    });
});
$(window).resize(function() {
//     $('.image-gallery').css('width', '100%');
//     $('.image-gallery').css('height', '100%');
//     $('.item-thumb').css('width', '100%');
    
//     $('.item-minithumb-wrapper').css('width', '100%');
//     $('.item-minithumb-item-image').css('width', '100%');
});
</script>

<?php
$profile_pic = NULL;
if (! empty ( $attachments ['profile'] )) {
    $profile_pic = $attachments ['profile'] [0];
}
$food_pics = NULL;
if (! empty ( $attachments ['food'] )) {
    $food_pics = $attachments ['food'];
}
?>

<div id="CalendarDetailPopup" class="contact-modal mfp-hide">
<a href="javascript:void(0);" onclick="$.magnificPopup.close();"
					class="btn-close"><span class="icon icon-x"></span></a>
					<div id="CalendarDetailPopupContent"></div>
</div>

<div id="ContactPopup" class="contact-modal mfp-hide">
	<h1 class="modal-heading">コンタクト</h1>
	<a href="javascript:void(0);" onclick="$.magnificPopup.close();"
		class="btn-close"><span class="icon icon-x"></span></a>
        <?php echo $this->Form->create('Email', array('method'=>'POST', 'action'=>'contact_chef')); ?>
        <?php echo $this->Form->input('name', array('type' => 'text', 'placeholder'=>'お名前', 'label'=>false)); ?>
        <?php echo $this->Form->input('from', array('type' => 'text', 'placeholder'=>'メールアドレス', 'label'=>false)); ?>
        <?php echo $this->Form->input('phone', array('type' => 'text', 'placeholder'=>'電話番号', 'label'=>false)); ?>
        <?php echo $this->Form->input('body', array('type' => 'textarea', 'label'=>false)); ?>
        <?php echo $this->Form->input('chef_email', array('type' => 'hidden', 'value'=>$this->data['User']['email'])); ?>
        <?php echo $this->Form->button('送信する', array('class'=>'btn btn-send')); ?>
        <?php echo $this->Form->end(); ?>
</div>

<div class="container">

	<!-- EDIT PAGE BUTTON -->
    <?php if($logged_user && $logged_user['id'] == $this->data['User']['id']) { ?>
    <div class="userpage-editbtn-wrapper">
		<button class="btn btn-edit"
			onclick="window.location='/user_pages/edit/<?php echo $this->data['UserPage']['id']?>'">編集</button>
	</div>
    <?php } ?>

    <div class="page-heading">
		<h1><?php echo $this->data['User']['display_name'];?></h1>
		<div class="dot-container">
			<div class="dot"></div>
			<div class="dot"></div>
			<div class="dot"></div>
		</div>
	</div>
	<div class="container-slim profile">
		<div class="profile-picture">
			<!--<img src="http://placehold.it/220x220">-->
            <?php if(isset($profile_pic['file_name'])) {?>
                <img class="item-thumb"
				src="/<?php echo $profile_pic['file_dir'].'/cropped/'.$profile_pic['file_name'];?>" width="100%"/>    
            <?php } else {?>
                <?php echo $this->Html->image('profile-default.png', array('class'=>'item-thumb', 'width'=>"100%"));?>
            <?php }?>
        </div>
		<a href="#ContactPopup" id="ContactButton"
			class="btn_kd btn-contact ContactButton">予約・コンタクト</a>
		<hr class="divider">
        <?php if(isset($this->data['UserPage']['body']) && '' != trim($this->data['UserPage']['body']) ) {?>
        <h3 class="module-heading">インフォメーション</h3>
		<div class="info">
            <?php echo $this->data['UserPage']['body'];?>
        </div>
        <?php }?>
        <?php if($food_pics) {?>
        <h3 class="module-heading">ギャラリー</h3>
		<div class=" row ">
           
            <?php $count = 0;?>
            <?php while($food_pics && $count < 6) { ?>
                <div
				class="mt-5 food-item col-sm-4">
                    <?php if(isset($food_pics[$count])){ ?>
                    <a class="  food-gallery" rel="1"
					href="/<?php echo $food_pics[$count]['file_dir'].'/disp/'.$food_pics[$count]['file_name'];?>">
					<img
					src="/<?php echo $food_pics[$count]['file_dir'].'/thumbnails/'.$food_pics[$count]['file_name'];?>"
					alt="Smiley face" width="100%" />
				</a>
                    <?php } ?>
                </div>
                <?php
                
if ($count == 2) {
                    echo '<div style="clear:both"></div> ';
                }
                ?>
                <?php $count += 1;?>
            <?php }?>
        </div>
        <?php }?>
        <?php if($this->data['UserPage']['phone_number']) {?>
        <h3 class="module-heading">電話番号</h3>
		<div class="phonenumber-container">
            <?php
            echo h ( $this->data ['UserPage'] ['phone_number'] );
            ?>
        </div>
        <?php }?>
        <?php
        $address = $this->data ['UserPageAddress'];
        extract ( $address );
        
        ?>
        <?php if('' != trim($zip.$prefectureName.$street)) {?>
        <h3 class="module-heading">住所</h3>
		<div class="location-container">
            <?php echo !preg_match('/[0-9]/', $zip) ? '': '&#12306;'.h($zip); ?>
            <?php echo h($prefectureName.' '.$street);?>
        </div>
        <?php }?>
        <?php //if(isset($this->data['UserPage']['calendar_iframe']) && $this->data['UserPage']['calendar_iframe'] != '') {?>
<!--         <h3 class="module-heading">スケジュール</h3> -->
<!-- 		<div class="row"> -->
<!-- 			<div class="calendar-container"> -->
				<!-- Codrops top bar -->

<!-- 				<div class="custom-calendar-wrap"> -->
<!-- 					<div class="custom-header clearfix"> -->

<!-- 						<h3 class="custom-month-year"> -->
<!-- 							<span id="custom-month" class="custom-month"></span> <span -->
<!-- 								id="custom-year" class="custom-year"></span> -->
<!-- 							<nav> -->
<!-- 								<span id="custom-prev" class="custom-prev"></span> <span -->
<!-- 									id="custom-next" class="custom-next"></span> <span -->
<!-- 									id="custom-current" class="custom-current" -->
<!-- 									title="Got to current date"></span> -->
<!-- 							</nav> -->
<!-- 						</h3> -->
<!-- 					</div> -->
					
<!-- 				</div> -->
<!-- 			</div> -->
<!-- 		</div> -->
        <?php // }?>
        <?php if(isset($calData)){?>
          <h3 class="module-heading">スケジュール</h3>
			<div class="calendar-container">
				<!-- Codrops top bar -->

				<div class="custom-calendar-wrap">
					<div class="custom-header clearfix">

						<h3 class="custom-month-year">
							<span id="custom-month" class="custom-month"></span> <span
								id="custom-year" class="custom-year"></span>
							<nav>
								<span id="custom-prev" class="custom-prev"></span> <span
									id="custom-next" class="custom-next"></span> <span
									id="custom-current" class="custom-current"
									title="Got to current date"></span>
							</nav>
						</h3>
					</div>
					
				</div>
			</div>
        <div id="calendar" class="fc-calendar-container"></div>
        <?php }?>
</div>