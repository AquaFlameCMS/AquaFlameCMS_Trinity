/**
 * Creates an overlay box (modal) and blacks out the page for focus.
 * Can fetch content from a DOM element or through AJAX.
 *
 * @copyright   2010, Blizzard Entertainment, Inc
 * @class       Overlay
 * @requires    Page
 * @example
 *
 *      onclick="Overlay.open('/ajax/url/', { ajax: true });"
 *
 */

var Overlay = {

	/**
     * Cached results from the AJAX responses.
     */
    cache: {},

	/**
	 * Default configuration.
	 */
	config: {
		ajax: false,
		bindClose: true,
		className: "",
		fadeSpeed: 250,
		blackout: true
	},

	/**
	 * Has the class been initialized?
	 */
	loaded: null,

	/**
	 * DOM object for the overlay.
	 */
	wrapper: null,

	/**
	 * Initialize the class and create the markup.
     *
     * @constructor
	 */
	initialize: function() {
		if (Overlay.loaded && Overlay.wrapper)
			return;

		Overlay.wrapper = $('<div/>', { id: 'overlay' }).appendTo('body').hide();
		$('<div/>', { id: 'overlay-top' }).appendTo(Overlay.wrapper);
		$('<div/>', { id: 'overlay-middle' }).appendTo(Overlay.wrapper);
		$('<div/>', { id: 'overlay-bottom' }).appendTo(Overlay.wrapper);

		Overlay.loaded = true;
	},

	/**
	 * Close the overlay.
	 */
	close: function(speed) {
		speed = (!speed) ? 10 : speed || 250;

		$("#blackout").fadeOut(speed);

		Overlay.wrapper.fadeOut(speed, function() {
			Overlay.setContent("");
			Overlay.wrapper.attr('class', '');

			if (Overlay.wrapper.attr('id') !== 'overlay')
				Overlay.wrapper.hide();
		});
	},

	/**
	 * Open up an overlay. Fill the content with text, DOM or AJAX.
	 *
	 * @param content
	 * @param config
	 */
	open: function(content, config) {
		Overlay.initialize();
		config = $.extend({}, Overlay.config, config);

		if (config.className)
			Overlay.wrapper.addClass(config.className);

		if (config.blackout) {
			if (config.bindClose) {
				Blackout.show(null, function() {
					Overlay.close(config.fadeSpeed);
				});
			} else {
				Blackout.show();
			}
		}

		// Content: AJAXs
		if (config.ajax) {

			// Look in cache
            if (Overlay.cache[content]) {
				Overlay.show(Overlay.cache[content]);
            } else {
				$.ajax({
					type: "GET",
					url: content,
					dataType: "html",
					beforeSend: function() {
						Overlay.reset();
						Overlay.show();
					},
					success: function(data, status) {
						Overlay.cache[content] = data;
						Overlay.setContent(data);
					}
				});
			}

		// Content: DOM
        } else if (content.substr(0, 1) === '#') {
            Overlay.show($(content).html());

        // Content: Text
        } else {
            Overlay.show(content);
        }
	},

	/**
	 * Open up a custom overlay.
	 *
	 * @param element
	 * @param config
	 */
	openCustom: function(element, config) {
		Overlay.wrapper = $(element);

		if (Overlay.wrapper) {
			config = $.extend({}, Overlay.config, config);

			if (config.blackout) {
				if (config.bindClose) {
					Blackout.show(null, function() {
						Overlay.close(config.fadeSpeed);
					});
				} else {
					Blackout.show();
				}
			}

			Overlay.position();
		}
	},

	/**
     * Position the overlay at specific coodinates.
     *
     * @param node
     */
    position: function(node) {
        node = node || Overlay.wrapper;

        var width = node.outerWidth(),
			height = node.outerHeight(),
			x = (Page.dimensions.width / 2) - (width / 2),
			y = (Page.dimensions.height / 2) - (height / 2);

		if (Core.isIE(6))
			y = Page.scroll.top + y;

        node.show().css({
			left: x +'px',
			top: y +'px',
			position: Core.isIE(6) ? 'absolute': 'fixed'
		});
    },

	/**
	 * Wipe the overlay and display a loading animation.
	 */
	reset: function() {
		Overlay.wrapper.find('#overlay-middle')
			.html("")
			.addClass('overlay-loading');
	},

	/**
	 * Now display the overlay.
	 *
	 * @param content
	 */
	show: function(content) {
		Overlay.setContent(content);
		Overlay.position();
	},

	/**
	 * Set the content of the overlay.
	 *
	 * @param content
	 */
	setContent: function(content) {
		if (content != null)
			Overlay.wrapper.find('#overlay-middle').html(content);
	}

};