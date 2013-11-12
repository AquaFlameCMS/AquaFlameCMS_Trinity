/**
 * Enables an unordered list to slide left/right to display multiple tiers of child menus.
 *
 * @copyright   2010, Blizzard Entertainment, Inc
 * @class       DynamicMenu
 * @requires    Core
 */
var DynamicMenu = Class.extend({

	/**
	 * Menu DOM objects.
	 */
	menu: null,
	forward: null,
	backward: null,

	/**
	 * Configuration.
	 */
	config: {
		showRoot: true,
		showParent: true,
		rootDirectLink: true,
		openOnLoad: true
	},

	/**
	 * Persists the history.
	 */
	depth: 0,
	links: [],
	menus: [],
	indices: [],
	root: null,

	/**
	 * Initialize the dynamic menu.
	 *
	 * @param menu
	 * @param config
	 * @constructor
	 */
	init: function(menu, config) {
		this.menu = $(menu);
		this.config = $.extend(this.config, config);

		if (!this.menu.length)
			return;

		// Attach handlers for sub menus
		this.buildContainers();
		this.bindSlides(this.menu);

		// Save root back link
		if (this.config.showRoot) {
			var root = this.menu.find('li.root-item:first-child').clone();

			if (root.length) {
				root.addClass('back-to')
					.removeClass('item-active');

				if (!this.config.rootDirectLink) {
					root.find('a:first-child').bind('click', { menu: this }, function(e) {
						e.preventDefault();
						e.data.menu.goBackToRoot();
					});
				}

				this.root = root;
			}
		}

		// Get active links and open to that page
		if (this.config.openOnLoad)
			this.buildHistory();
	},

	/**
	 * Bind the slide forward event handlers to the menu.
	 *
	 * @param menu
	 */
	bindSlides: function(menu) {
		menu.find('li.has-submenu a:first-child').unbind().bind('click', { menu: this }, function(e) {
			e.preventDefault();
			e.data.menu.goForward(this);
		});

		return menu;
	},

	/**
	 * Build the forward/backward menu containers.
	 */
	buildContainers: function() {
		this.backward = $('<div/>')
			.addClass('slide-container')
			.hide()
			.insertAfter(this.menu);

		this.forward = $('<div/>')
			.addClass('slide-container')
			.hide()
			.insertAfter(this.menu);
	},

	/**
	 * Build a back history on the initial page load.
	 */
	buildHistory: function() {
		var active = this.menu.find('li.item-active'),
			length = active.length - 1,
			node = null;

		if (length <= 0)
			return;

		this.menu.hide();

		for (var i = 0; i <= length; ++i) {
			node = $(active[i]);

			if (i == length) {
				break;

			} else {
				this.menus.push( this.bindSlides(node.find('.dynamic-menu').clone()) );

				this.links.push( node.find('a:first').clone().bind('click', {
						menu: this,
						index: this.depth
					}, function(e) {
						e.preventDefault();
						e.data.menu.goBack(e.data.index);
					})
				);

				this.indices.push( node.index() );
			}
		}

		this.generate();
		this.forward.show();

		this.depth = length - 1;
	},

	/**
	 * Return the currently hidden/visible container.
	 *
	 * @param visible
	 */
	container: function(visible) {
		if (visible)
			return this.forward.is(':visible') ? this.forward : this.backward;
		else
			return this.forward.is(':visible') ? this.backward : this.forward;
	},

	/**
	 * Generate the menus dynamically and place within the hidden container.
	 *
	 * @param index
	 */
	generate: function(index) {
		if (typeof index === 'undefined')
			index = (this.menus.length - 1);

		var menu = this.menus[index].clone(true),
			length = this.links.length,
			links = this.links,
			li;

		if (!this.config.showParent)
			--length;

		for (var i = 0; i < length; ++i) {
			if (typeof links[i] !== 'undefined') {
				li = $('<li/>').addClass('back-to').append(links[i]);

				if (i == this.depth)
					li.addClass('item-active');

				li.insertBefore(menu.find('li').eq(i));
			}
		}

		if (this.root !== null)
			menu.prepend(this.root.clone(true));

		menu.addClass('is-submenu');

		this.container().html(menu);
	},

	/**
	 * Go backward a menu tier.
	 *
	 * @param index
	 */
	goBack: function(index) {
		this.depth = index;
		this.menus = this.menus.slice(0, index);
		this.links = this.links.slice(0, index);
		this.indices = this.indices.slice(0, index);

		--index;

		// Show menu and slide
		if (index >= 0) {
			this.generate(index);
			this.slide(true);
		} else {
			this.goBackToRoot();
		}
	},

	/**
	 * Go back to the menu root.
	 */
	goBackToRoot: function() {
		this.depth = 0;
		this.menus = [];
		this.links = [];
		this.indices = [];

		this.container(true).hide('slide', { direction: 'right' }, 150, function() {
			this.menu.show('slide', { direction: 'left' }, 150);
		}.apply(this));

		this.forward.empty();
		this.backward.empty();
	},

	/**
	 * Go forward a menu tier.
	 *
	 * @param node
	 */
	goForward: function(node) {
		node = $(node);

		// Save data
		this.menus.push( this.bindSlides(node.siblings('.dynamic-menu').clone()) );

		this.links.push( node.clone().bind('click', {
				menu: this,
				index: this.depth
			}, function(e) {
				e.preventDefault();
				e.data.menu.goBack(e.data.index);
			})
		);

		this.indices.push( node.parent('li').index() );

		// Show menu and slide
		this.generate(this.depth);
		this.slide();

		// Increment depth
		this.depth++;
	},

	/**
	 * Slide the menu to the left or right.
	 *
	 * @param reverse
	 */
	slide: function(reverse) {
		var hide = this.menu,
			show = this.forward,
			left = 'left',
			right = 'right';

		if (this.depth > 0) {
			if (this.forward.is(':visible')) {
				show = this.backward;
				hide = this.forward;
			} else {
				show = this.forward;
				hide = this.backward;
			}
		}

		if (reverse) {
			left = 'right';
			right = 'left';
		}

		hide.hide('slide', { direction: left }, 150, function() {
			show.show('slide', { direction: right }, 150);
		}.apply(this));
	}

});
