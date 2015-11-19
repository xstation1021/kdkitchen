<div id="Popup" class="contact-modal mfp-hide">
				
		<?php 
            echo $this->Html->image("workshops.jpg", array('width'=>'100%'));
        ?>		
	<div class="contact_btn mt-20">
    	<a href="/pages/workshops" class="btn_kd btn-contact ContactButton ">詳しくはこちら</a>
    </div>	
	
</div>

<script>
$( document ).ready(function() {
	setTimeout(function(){
		$.magnificPopup.open({
		    items: {
		        src: '#Popup',
		        type: 'inline',
		    },
		    showCloseBtn: false
		});
    }, 1500);
	
});
</script>