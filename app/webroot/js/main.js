
jQuery('html').removeClass('no-js').addClass('js');

   // When DOM is fully loaded
   jQuery(document).ready(function($) {

       $('#nav li').on({
           mouseenter: function() {
               $(this).find('.dot').each(function(i) {
                   $(this).delay(100*i).transition({ scale: 1.25, opacity: 1, duration: 200 }).transition({ scale: 1 });
               });
           },
           mouseleave: function() {
               $(this).find('.dot').stop().transition({ opacity: 0 });
           }
       });

       $('.chefs').find('.description').transition({ scale: 1.5 });

       $('.chefs .chef-thumb').on({
           mouseenter: function() {
               $(this).find('.description').show().transition({ scale: 1 });
               $(this).find('.name-english, .name-japanese').fadeOut();
           },
           mouseleave: function() {
               $(this).find('.description').stop().fadeOut().transition({ scale: 1.5 });
               $(this).find('.name-english, .name-japanese').stop().fadeIn();
           }
       });

	
/* ---------------------------------------------------------------------- */
	/*	Main Navigation
	/* ---------------------------------------------------------------------- */
	
	(function() {

		var $mainNav    = $('#nav');
		// Regular nav
		$mainNav.on('mouseenter', 'li', function() {
			var $this    = $(this),
				$subMenu = $this.children('ul');
			if( $subMenu.length ) $this.addClass('hover');
			$subMenu.hide().stop(true, true).fadeIn(200);
		}).on('mouseleave', 'li', function() {
			$(this).removeClass('hover').children('ul').stop(true, true).fadeOut(50);
		});

	})();

	/* end Main Navigation */

	/* ---------------------------------------------------------------------- */
	/*	Features Slider
	/* ---------------------------------------------------------------------- */

	/* end Features Slider */
});

