/**
 * Dynamically create tooltips, append specific content from different medians, and display at certain positions.
 *
 * @copyright   2010, Blizzard Entertainment, Inc
 * @class       Tooltip
 * @requires    Page
 * @example
 *
 *      onmouseover="Tooltip.show(this, 'This is the tooltip text!');"
 *
 */

var Tooltip = {

    /**
     * The current tooltip object and its markup
     */
    wrapper: null,

    /**
     * Content within the tooltip
     */
    contentCell: null,

    /**
     * Cached results from the AJAX responses
     */
    cache: {},

    /**
     * Flag storing intialization status of tooltip
     */
    initialized: false,

	/**
	 * Is the mouse currently hovering over the node?
	 */
	currentNode: null,

	/**
	 * Is the tooltip visible?
	 */
	visible: false,

	/**
	 * Default options
	 */
	options: {
		ajax: false,
		className: false,
		location: 'topRight',
		useTable: false
	},

    /**
	 * Max tooltip width for IE6.
	 */
	maxWidth: 250,

    /**
     * Initialize the tooltip markup and append it to document.
     *
     * @constructor
     */
    initialize: function() {
		var tooltipDiv = $('<div/>').addClass('ui-tooltip').appendTo("body");

		if (Core.isIE(6) && document.location.protocol === 'http:') {
			$('<iframe/>', {
				src: 'javascript:void(0);',
				frameborder: 0,
				scrolling: 'no',
				marginwidth: 0,
				marginheight: 0
			}).addClass('tooltip-frame').appendTo('body');
		}

		if (!Tooltip.options.useTable) {
			Tooltip.contentCell = $('<div/>').addClass('tooltip-content').appendTo(tooltipDiv);

		} else {
			var tooltipTable = $("<table>", {
				cellspacing: 0,
				cellpadding: 0
			}).appendTo(tooltipDiv);

			var emptyCell = $('<td>').attr("valign", "top").text(" "),
				emptyRow = $('<tr>'),
				contentCell = emptyCell.clone();

			tooltipTable
				.append(
					emptyRow.clone()
						.append(emptyCell.clone().addClass("top-left"))
						.append(emptyCell.clone().addClass("top-center"))
						.append(emptyCell.clone().addClass("top-right"))
				)
				.append(
					emptyRow.clone()
						.append(emptyCell.clone().addClass("middle-left"))
						.append(contentCell.addClass("middle-center"))
						.append(emptyCell.clone().addClass("middle-right"))
				)
				.append(
					emptyRow.clone()
						.append(emptyCell.clone().addClass("bottom-left"))
						.append(emptyCell.clone().addClass("bottom-center"))
						.append(emptyCell.clone().addClass("bottom-right"))
				);

			Tooltip.contentCell = contentCell;
		}

        // Assign to reference later
        Tooltip.wrapper = tooltipDiv;
        Tooltip.initialized = true;
    },

	/**
	 * Bind a mouse over to all tooltips in the page. Will only display the title of the element.
	 * Will first detect data-tooltip and then the tooltip attribute.
	 *
	 * @param query
	 * @param options
	 * @param callback
	 */
	bind: function(query, options, callback) {
		var doc = $(document),
			func;

		if (Core.isCallback(callback)) {
			func = callback;
		} else {
			func = function() {
				var self = $(this),
					title = self.data('tooltip') || this.title;

				if (title && self.attr('rel') != 'np') {
					Tooltip.show(this, title, self.data('tooltip-options') || options);
				}
			};
		}

		doc.undelegate(query, 'mouseover.tooltip', func);
		doc.delegate(query, 'mouseover.tooltip', func);
	},

    /**
     * Grab the content for the tooltip, then pass it on to be positioned.
     *
     * @param node
     * @param content
     * @param options - className, ajax, location
     */
    show: function(node, content, options) {
		if (!Tooltip.wrapper)
			Tooltip.initialize();

		if (options === true)
			options = { ajax: true };
		else
			options = options || {};

		options = $.extend({}, Tooltip.options, options);

		Tooltip.currentNode = node = $(node);

		// Update trigger node
        node.mouseout(function() {
        	Tooltip.hide();

			if (options.className)
				Tooltip.wrapper.removeClass(options.className);
        });

		// Update values
		if (!Tooltip['_'+ options.location])
			options.location = Tooltip.options.location;

		// Left align tooltips in the right half of the screen
		if (options.location == Tooltip.options.location && node.offset().left > $(window).width() / 2)
			options.location = 'topLeft';

		if (options.className)
			Tooltip.wrapper.addClass(options.className);

		// Content: DOM node created w/ jQuery
		if (typeof content === 'object') {
			Tooltip.position(node, content, options.location);

		} else if (typeof content === 'string') {

			// Content: AJAX
			if (options.ajax) {
				if (Tooltip.cache[content]) {
					Tooltip.position(node, Tooltip.cache[content], options.location);
				} else {
					var url = content;

					if (url.indexOf(Core.projectUrl) != 0) { // Add base URL when provided URL doesn't begin with project URL (e.g. /d3)
						url = Core.baseUrl + content;
					}

					$.ajax({
						type: "GET",
						url: url,
						dataType: "html",
						global: false,
						beforeSend: function() {
							// Show "Loading..." tooltip when request is being slow
							setTimeout(function() {
								if (!Tooltip.visible)
									Tooltip.position(node, Msg.ui.loading, options.location);
							}, 500);
						},
						success: function(data) {
							if (Tooltip.currentNode == node) {
								Tooltip.cache[content] = data;
								Tooltip.position(node, data, options.location);
							}
						},
						error: function(xhr) {
							if (xhr.status != 200)
								Tooltip.hide();
						}
					});
				}

			// Content: Copy content from the specified DOM node (referenced by ID)
			} else if (content.substr(0, 1) === '#') {
				Tooltip.position(node, $(content).html(), options.location);

			// Content: Text
			} else {
				Tooltip.position(node, content, options.location);
			}
		}
    },

    /**
     * Hide the tooltip.
     */
	hide: function() {
		if (!Tooltip.wrapper)
			return;

		if (Core.isIE(6)) {
			$('.tooltip-frame').hide();
			Tooltip.wrapper.removeAttr('style');
		}

		Tooltip.wrapper.hide();
		Tooltip.wrapper.unbind('mousemove.tooltip');

		Tooltip.currentNode = null;
		Tooltip.visible = false;
	},

    /**
     * Position the tooltip at specific coodinates.
     *
     * @param node
     * @param content
	 * @param location
     */
    position: function(node, content, location) {
		if (!Tooltip.currentNode)
			return;

		if (typeof content == 'string')
	        Tooltip.contentCell.html(content);
		else
			Tooltip.contentCell.empty().append(content);

        var width = Tooltip.wrapper.outerWidth(),
			height = Tooltip.wrapper.outerHeight();

		if (Core.isIE(6) && width > Tooltip.maxWidth)
			width = Tooltip.maxWidth;

		var coords = Tooltip['_' + location](width, height, node);

		if (coords)
			Tooltip.move(coords.x, coords.y, width, height);
    },

	/**
	 * Move the tooltip around.
	 *
	 * @param x
	 * @param y
	 * @param w
	 * @param h
	 */
	move: function(x, y, w, h) {
		Tooltip.wrapper
			.css("left", x +"px")
			.css("top",  y +"px")
			.show();

		Tooltip.visible = true;

		if (Core.isIE(6)) {
			$('.tooltip-frame').css({
				width: w + 60,
				height: h,
				left: (x - 60) +"px",
				top: y +"px"
			}).fadeTo(0, 0).show();

			Tooltip.wrapper.css('width', w);
		}
	},

	/**
	 * Position at the mouse cursor.
	 *
	 * @param width
	 * @param height
	 * @param node
	 */
	_mouse: function(width, height, node) {
		node.unbind('mousemove.tooltip').bind('mousemove.tooltip', function(e) {
			Tooltip.move((e.pageX + 10), (e.pageY + 10), width, height);
		});
	},

	/**
	 * Position at the top left.
	 *
	 * @param width
	 * @param height
	 * @param node
	 * @return object
	 */
	_topLeft: function(width, height, node) {
		var offset = node.offset(),
			x = offset.left - width,
			y = offset.top - height;

		return Tooltip._checkViewport(x, y, width, height, node);
	},

	/**
	 * Position at the top center.
	 *
	 * @param width
	 * @param height
	 * @param node
	 * @return object
	 */
	_topCenter: function(width, height, node) {
		var offset = node.offset(),
			nodeWidth = node.outerWidth(),
			x = offset.left + ((nodeWidth / 2) - (width / 2)),
			y = offset.top - height - 5;

		return Tooltip._checkViewport(x, y, width, height, node);
	},

	/**
	 * Position at the top right.
	 *
	 * @param width
	 * @param height
	 * @param node
	 * @return object
	 */
	_topRight: function(width, height, node) {
		var offset = node.offset(),
			nodeWidth = node.outerWidth(),
			x = offset.left + nodeWidth,
			y = offset.top - height;

		return Tooltip._checkViewport(x, y, width, height, node);
	},

	/**
	 * Position at the middle left.
	 *
	 * @param width
	 * @param height
	 * @param node
	 * @return object
	 */
	_middleLeft: function(width, height, node) {
		var offset = node.offset(),
			nodeHeight = node.outerHeight(),
			x = offset.left - width,
			y = (offset.top + (nodeHeight / 2)) - (height / 2);

		return Tooltip._checkViewport(x, y, width, height, node);
	},

	/**
	 * Position at the middle right.
	 *
	 * @param width
	 * @param height
	 * @param node
	 * @return object
	 */
	_middleRight: function(width, height, node) {
		var offset = node.offset(),
			nodeWidth = node.outerWidth(),
			nodeHeight = node.outerHeight(),
			x = offset.left + nodeWidth,
			y = (offset.top + (nodeHeight / 2)) - (height / 2);

		return Tooltip._checkViewport(x, y, width, height, node);
	},

	/**
	 * Position at the bottom left.
	 *
	 * @param width
	 * @param height
	 * @param node
	 * @return object
	 */
	_bottomLeft: function(width, height, node) {
		var offset = node.offset(),
			nodeHeight = node.outerHeight(),
			x = offset.left - width,
			y = offset.top + nodeHeight;

		return Tooltip._checkViewport(x, y, width, height, node);
	},

	/**
	 * Position at the bottom center.
	 *
	 * @param width
	 * @param height
	 * @param node
	 * @return object
	 */
	_bottomCenter: function(width, height, node) {
		var offset = node.offset(),
			nodeWidth = node.outerWidth(),
			nodeHeight = node.outerHeight(),
			x = offset.left + ((nodeWidth / 2) - (width / 2)),
			y = offset.top + nodeHeight + 5;

		return Tooltip._checkViewport(x, y, width, height, node);
	},

	/**
	 * Position at the bottom right.
	 *
	 * @param width
	 * @param height
	 * @param node
	 * @return object
	 */
	_bottomRight: function(width, height, node) {
		var offset = node.offset(),
			nodeWidth = node.outerWidth(),
			nodeHeight = node.outerHeight(),
			x = offset.left + nodeWidth,
			y = offset.top + nodeHeight;

		return Tooltip._checkViewport(x, y, width, height, node);
	},

	/**
	 * Makes sure the tooltip appears within the viewport.
	 *
	 * @param x
	 * @param y
	 * @param width
	 * @param height
	 * @param node
	 * @return object
	 */
	_checkViewport: function(x, y, width, height, node) {
		var offset = node.offset();

		// Greater than x viewport
		if ((x + width) > Page.dimensions.width)
			x = Page.dimensions.width - width;
			//x = (offset.left - width);

		// Less than x viewport
		if (x < 0)
			x = 15;

		// Greater than y viewport
		if ((y + height) > (Page.scroll.top + Page.dimensions.height))
			y = y - ((y + height) - (Page.scroll.top + Page.dimensions.height));

		// Node on top of viewport scroll
		else if ((offset.top - 100) < Page.scroll.top)
			y = offset.top + node.outerHeight();

		// Less than y viewport scrolled
		else if (y < Page.scroll.top)
			y = Page.scroll.top + 15;

		// Less than y viewport
		if (y < 0)
			y = 15;

		return {
			x: x,
			y: y
		};
	}

};

// Set data-tooltip binds globally
$(function() {
	Tooltip.bind('[data-tooltip]');
});