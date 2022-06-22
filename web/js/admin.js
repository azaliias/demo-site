(function ($, undefined) {
	$(document).ready(function(){

		/* If mobile */
		if(jQuery.browser.mobile === true) {
			$('body').removeClass('fixed-sidebar');
		}

		/* Hamburger */
		$('.site-header .collapse-button').click(function(){
			if ($('body').hasClass('mobile-menu-opened')) {
				$(this).removeClass('active');
				$('body').removeClass('mobile-menu-opened');
				if(jQuery.browser.mobile === false){
					$('html').css('overflow','auto');
				}
			} else {
				$(this).addClass('active');
				$('body').addClass('mobile-menu-opened');
				if(jQuery.browser.mobile === false){
					$('html').css('overflow','hidden');
				}
			}
		});

		$('.mobile-menu-overlay').click(function(){
			$('.site-header .collapse-button').removeClass('active');
			$('body').removeClass('mobile-menu-opened');
			$('html').css('overflow','auto');
		});

		/* Toggle search */
		$(document).on('click', '.toggle-search', function () {
			if ($('#search-form').hasClass('visible-anyway')) {
				$('.btn-label', this).html('<i class="ti-arrow-down">');
				$('#search-form').removeClass('visible-anyway');
			} else {
				$('.btn-label', this).html('<i class="ti-arrow-up">');
				$('#search-form').addClass('visible-anyway');
			}
		});

		/* Sidebar */
		$('.sidebar-menu li.with-sub').each(function(){
			var parent = $(this),
				clickLink = parent.find('>span'),
				subMenu = parent.find('ul');

			clickLink.click(function(){
				if (parent.hasClass('opened')) {
					parent.removeClass('opened');
					subMenu.slideUp();
				} else {
					$('.sidebar-menu li.with-sub').not(this).removeClass('opened').find('ul').slideUp();
					parent.addClass('opened');
					subMenu.slideDown();
				}
			});
		});

		$('.sidebar-menu li.with-sub .active').parents('li:last').children('span:first').trigger('click');
		

		/* Hide notification */
		$(document).on('click', '.menu-editor .notifications .close', function () {
			$(this).parent().hide();
		});
		
		/* Tooltip */
		$("[data-toggle='tooltip']").tooltip();

		$('.shield-start').focus(function() {
			$('.shield').val(42);
		});

	});
})(jQuery);