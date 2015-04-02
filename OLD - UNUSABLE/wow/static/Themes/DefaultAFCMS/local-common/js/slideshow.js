/**
 * A slideshow system. Will display a single slide (with a description, title and image) at a time,
 * and will fade between the slides based on a duration. You can manually jump to specific slides.
 *
 * @copyright   2010, Blizzard Entertainment, Inc
 * @class       Slideshow
 * @example
 *
 *      Slideshow.initialize('#slideshow', []);
 *
 */

var Slideshow = {

    /**
     * The slide containing element.
     */
    object: null,

    /**
     * The rotation timer.
     */
    timer: null,

    /**
     * Current index.
     */
    index: 0,

	/**
	 * Array of slide data.
	 */
	data: [],

    /**
     * A collection of the slide DOM objects.
     */
    slides: [],

    /**
     * Is rotation currently playing.
     */
    playing: false,

	/**
	 * The last slide index.
	 */
	lastSlide: null,

    /**
     * Initialize the slider by building the slides based on this.data and starting the rotation.
     *
     * @param object - CSS expression
     * @param data
     * @constructor
     */
    initialize: function(object, data) {
        Slideshow.object = $(object);
		Slideshow.data = data;
		Slideshow.slides = Slideshow.object.find('.slide');

		// Apply events
		Slideshow.object.find('.mask').hover(
			function() { Slideshow.pause(); },
			function() { Slideshow.play(); }
		);

		Slideshow.object.find('.paging a').mouseleave(function() {
			Slideshow.object.find('.preview').empty().hide();
		});

		// Save views
		if (Slideshow.data.length > 0 && Slideshow.data[0].id) {
			var firstId = Slideshow.data[0].id;
			var cookie = Cookie.read('slideViewed');

			if (!cookie)
				cookie = [];
			else
				cookie = decodeURIComponent(cookie).split(',');

			if ($.inArray(firstId.toString(), cookie) < 0)
				cookie.push(firstId);

			if (cookie.length > 100)
				cookie.shift();

			Cookie.create('slideViewed', cookie.join(','), {
				escape: true,
				expires: 744 // 1 month
			});
		}

		if (Slideshow.slides.length <= 1)
			Slideshow.object.find('.controls, .paging').hide();

		Slideshow.link(0);
		Slideshow.play();
    },

	/**
	 * Fade out the slides and fade in selected.
	 *
	 * @param index
	 */
	fade: function(index) {
		Slideshow.slides.stop(true, true).fadeOut('normal');
		Slideshow.slides.eq(index).fadeIn(1500);
		Slideshow.link(index);

		var caption = Slideshow.object.find('.caption');

		caption.stop(true, true).fadeOut('fast', function() {
			if (Slideshow.data[index]) {
				caption.html("")
					.append('<h3><a href="'+ Slideshow.data[index].url +'" class="link">'+ Slideshow.data[index].title +'</a></h3>')
					.append(Slideshow.data[index].desc)
					.fadeIn(1500);
			}
		});

		Slideshow.lastSlide = index;
	},

    /**
     * Manually jump to a specific slide. Pauses rotation.
     *
     * @param index
	 * @param control
     */
    jump: function(index, control) {
		if ((Slideshow.lastSlide == index) || (Slideshow.slides.length <= 1))
			return;

        Slideshow.pause();
		Slideshow.fade(index);
        Slideshow.index = index;

        Slideshow.object.find('.paging a').removeClass('current');
        $(control).addClass('current');
    },

	/**
	 * Link the mask overlay and track the event.
	 *
	 * @param index
	 */
	link: function(index) {
		if (Slideshow.data[index]) {
			Slideshow.object
				.find('.mask')
					.unbind('click.slideshow')
					.bind('click.slideshow', function() {
						if (typeof _gaq != 'undefined') {
							var pushEvent = [
								'_trackEvent',
								Core.project +' Banners',
								'Banner Click-Throughs',
								'Banner-'+ Slideshow.data[index].id +'-'+ encodeURIComponent(Slideshow.data[index].title.replace(' ','_')) +'-'+ Core.locale
							];
							_gaq.push(pushEvent);
						}

						Core.goTo(Slideshow.data[index].url);
					})
				.end()
				.find('.link')
					.attr('href', Slideshow.data[index].url)
				.end();
		}
	},

    /**
     * Play the rotation.
     */
    play: function() {
		if (Slideshow.slides.length <= 1)
			return;

        if (!Slideshow.playing) {
            Slideshow.playing = true;
            Slideshow.timer = window.setInterval(Slideshow.rotate, 5000);
        }
    },

    /**
     * Pause the automatic rotation.
     */
    pause: function() {
		if (Slideshow.slides.length <= 1)
			return;

        window.clearInterval(Slideshow.timer);

        Slideshow.playing = false;
    },

    /**
     * Display a tooltip preview.
	 *
	 * @param index
     */
    preview: function(index) {
        if (Slideshow.data[index]) {
            var tooltip = Slideshow.object.find('.preview'),
				top = (index * 15) + 15;

			if (Slideshow.data[index].image) {
				$('<img/>', {
					src: Slideshow.data[index].image,
					width: 100,
					height: 47,
					alt: ''
				}).appendTo(tooltip);
			}

            tooltip.append('<span>'+ Slideshow.data[index].title +'</span>').css('top', top);
            tooltip.show();
        }
    },

    /**
     * Automatically cycle through all the slides.
     */
    rotate: function() {
        var slideIndex = Slideshow.index + 1;

        if (slideIndex > (Slideshow.slides.length - 1))
            slideIndex = 0;

		if (Slideshow.lastSlide == slideIndex)
			return;

        Slideshow.fade(slideIndex);
        Slideshow.index = slideIndex;

        // Set control to current
        Slideshow.object
			.find('.paging a').removeClass('current').end()
			.find('.paging a:eq('+ slideIndex +')').addClass('current');
    },

    /**
     * Toggle between play and pause.
     */
    toggle: function() {
        if (Slideshow.playing)
            Slideshow.pause();
        else
            Slideshow.play();
    }

};

var TakeOver = {

	/**
	 * Open the take over ad and hide the slideshow.
	 */
	open: function() {
		var cookie = Cookie.read('sc2.takeOver');

		if (cookie && cookie == 1)
			return;

		$('.sidebar-promo').hide();
	},

	/**
	 * Close the take over and play the slideshow.
	 *
	 * @param saveCookie
	 */
	close: function(saveCookie) {
		$('#takeover-container').hide();
		$('.sidebar-promo').show();

		if (Slideshow.object) {
			Slideshow.play();
			$("#slideshow").show();
		}

		if (saveCookie) {
			Cookie.create('sc2.takeOver', 1, {
				expires: 48, // Expires in 48 hours
				path: '/'
			});
		}
	},

	/**
	 * Play the media video.
	 */
	play: function() {
		$("#takeover-play").hide();
		$("#takeover-video").show();
	}

};