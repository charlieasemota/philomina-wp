(function($) {
	// Get site URL for link selector (already sanitised)
	var webURL = document.location.origin;

	function configLayout() {
		var window_height = $(window).height();
			window_width = $(window).width();
			header_height = $('header').height();
			block_height = window_height - header_height;
			if (block_height < 350) block_height = 350;
			third_block = block_height /3;
			content_margin = (third_block * 2) - 80;
			aside_height = $('aside').height();
	}

	function enterEffect() {
		$('section').addClass('loadIn');
		$('.preloader').removeClass('loadIn');
	}

	function layout() {
		$('body').css({'padding-top': header_height});
		$('.not-home').css({'margin-top': -block_height});
		$('body > section').css({height:block_height});
		$('.block').css({height:block_height});
		$('.inside_block h1').each(function(){
			block_text_center = (block_height / 2) - [($(this).height() + 37) /2];
			$(this).css({"margin-top": block_text_center});
		})
		$('#internal article').css({"min-height": aside_height});
	}

	function actions() {
		// Page Loading and navigation
		$('a[href^="'+ webURL +'"]').not('a[href$=".jpg"], a[href$=".png"], a[href$=".gif"], a[href$=".jpeg"]').click(function(){
			$('section').removeClass('loadIn');
			$('.preloader').addClass('loadIn');
			getHref = $(this).attr('href');
			setTimeout(window.location.href = getHref , 1000)
			setTimeout(function(){
				$('section').addClass('loadIn');
				$('.preloader').removeClass('loadIn');
			}, 3000);
			return false;
		});

		// Search bar trigger
		$('a.open-search').click(function(){
			$('header form').toggleClass('search-opened');
			$(this).find('.fa-search').toggle();
			$(this).find('.fa-close').toggle();
			return false;
		});
		// Open Menu
		$('.open-menu').click(function(){
			$('nav.hidden-menu').addClass('menu-opened');
			return false;
		});
		// Close menu
		$('nav.hidden-menu, .close-menu').click(function(){
			$('nav.hidden-menu').removeClass('menu-opened');
			return false;
		});
		$('nav.hidden-menu > div').click(function(event){
			event.stopPropagation();
		});
		// Scroll to comments
		$('.go_to_comments').click(function(){
			getAnchor = $(this).attr('href');
			console.log(getAnchor);
			$('section').animate({scrollTop: $(getAnchor).offset().top}, 1500);
			return false;
		})
		// Fancybox
		$('a[href$=".jpg"], a[href$=".png"], a[href$=".gif"], a[href$=".jpeg"]').fancybox();
	}

	$(document).ready(function() {
		configLayout()
		layout();
		actions();
	});
	$(window).load(function() {
		enterEffect();
		layout();
	});
	$(window).resize(function() {
		configLayout()
	    layout();
	});

}) (jQuery)
