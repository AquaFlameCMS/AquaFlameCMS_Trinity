
var Search = {

	/**
	 * Type ahead instance.
	 */
	ta: null,

	/**
	 * Map types to other types.
	 */
	map: {
		articlekeyword: 'article',
		blog: 'article'
	},

	/**
	 * Initialize search type ahead.
	 *
	 * @param url
	 */
	initialize: function(url) {
		var resultTypes = [];

		if (Core.project == 'wow') {
			resultTypes = ['wowcharacter', 'wowguild', 'wowarenateam', 'wowitem', 'article', 'static', 'other'];

			Search.map.character = 'wowcharacter';
			Search.map.arenateam = 'wowarenateam';
			Search.map.guild = 'wowguild';
			Search.map.item = 'wowitem';
			Search.map.friend = 'wowcharacter';
		} else {
			resultTypes = ['article', 'static', 'other'];
		}

		Search.ta = new TypeAhead('#search-field', {
			groupResults: true,
			resultTypes: resultTypes,
			ghostQuery: (Core.buildRegion == 'us' || Core.buildRegion == 'eu' || Core.buildRegion == 'sea'),
			source: function(term, display) {
				$.ajax({
					url: url,
					data: {
						term: term,
						locale: Core.formatLocale(2, '_'),
						community: Core.project
					},
					cache: true,
					dataType: url.charAt(0) == '/' ? 'json' : 'jsonp',
					success: function(response) {
						var results = [];
						
						if (response.results) {
							for (var i = 0, result; result = response.results[i]; i++) {
								// Temp fix for escaped strings
								var title = $('<div/>').html(result.title || result.term).text();

								var data = {
									type: Search.map[result.type] || 'other',
									title: title,
									desc: '',
									url: ''
								};

								switch (result.type) {
									// @todo - get realmUrlSlug
									case 'character':
										data.desc = result.realmName;
										data.url = Core.baseUrl +'/character/'+ result.realmName.replace(/[^a-z0-9]/ig, '-').toLowerCase() +'/'+ result.term +'/';
									break;

									// @todo - get realmUrlSlug
									// @todo - get team size
									case 'arenateam':
										data.desc = result.realmName;
										data.url = Core.baseUrl +'/arena/'+ result.realmName.replace(/[^a-z0-9]/ig, '-').toLowerCase() +'/'+ result.teamSize +'/'+ result.term +'/';
									break;

									// @todo - get realmUrlSlug
									case 'guild':
										data.desc = result.realmName;
										data.url = Core.baseUrl +'/guild/'+ result.realmName.replace(/[^a-z0-9]/ig, '-').toLowerCase() +'/'+ result.term +'/';
									break;

									case 'item':
										data.className = 'color-q'+ result.rarity;
										data.desc = Core.msg(Msg.cms.ilvl, result.level);
										data.url = Core.baseUrl +'/item/'+ result.objectId;
									break;

									default:
										data.url = '';

										if (result.url)
											data.url = $('<div/>').html(result.url).text();

										if (data.title != result.term)
											data.desc = result.term || '';
									break;
								}
									
								results.push(data);
							}
						}

						display(results);
					}
				});
			}
		});
	}
};

var TypeAhead = Class.extend({

	/**
	 * Input field DOM object.
	 */
	node: null,

	/**
	 * Type ahead results listing DOM object.
	 */
	html: null,

	/**
	 * Throttler timer.
	 */
	timer: null,

	/**
	 * Currently searched keyword.
	 */
	term: '',

	/**
	 * Current anchor position when using arrows.
	 */
	position: -1,

	/**
	 * List of result items.
	 */
	items: [],
	cache: [],

	/**
	 * Configuration.
	 */
	config: {},

	/**
	 * Initialize on an input field.
	 *
	 * @param node
	 * @param config
	 */
	init: function(node, config) {
		this.node = $(node);

		if (!this.node.length) {
			return false;
		}

		this.config = $.extend({}, {
			minLength: 3,
			resultsLength: 15,
			groupResults: false,
			termMatch: false,
			resultTypes: [],
			ghostQuery: false,
			selectKey: KeyCode.enter,
			throttle: 200,
			source: null,
            onSelect: function(item, ta) {
				ta.node.val(item.title || '');
				ta.close();
			},
			onStart: null,
			onFinish: null
		}, config || {});

		if (this.config.minLength <= 0) {
			this.config.minLength = 1;
		}

		this.config.resultTypes.push('default');

		if (this.node[0].nodeName.toLowerCase() == 'input') {
			this.node.bind('keyup.ta', $.proxy(this.listen, this));
			this.node.bind('keydown.ta', $.proxy(this.trigger, this));

			this.html = $('<div/>')
				.addClass('ui-typeahead')
				.html(Msg.ui.loading)
				.hide()
				.appendTo('body');

			if (this.config.ghostQuery) {
				this.ghost = $('<input/>').attr({
                    type: 'text',
                    value: '',
                    autocomplete: 'off',
					readonly: 'readonly',
					'class': this.node.attr('class')
                })
				.addClass('input input-ghost')
				.focus(function() {
					// IE compatibility
					$(node).focus();
				});

				this.node
					.css('background-color', 'transparent')
					.wrap( $('<div/>').addClass('ui-typeahead-ghost') )
					.before(this.ghost);
			}

            $(document).bind('click.ta', $.proxy(this.close, this));
            this.node.bind('click.ta', Core.stopPropagation);
            this.html.bind('click.ta', Core.stopPropagation);
		}
	},

    /**
     * Close the type ahead and reset.
     */
    close: function() {
        this.position = -1;
        this.html.hide();
		this._ghostText();
    },

	/**
	 * Render the results.
	 *
	 * @param items
	 */
	finish: function(items) {
		var config = this.config;

		this.items = items || [];
		this.cache = [];

		this._populate();
		this._position();

		if (Core.isCallback(config.onFinish)) {
			config.onFinish(this.term, this);
		}
	},

	/**
	 * Highlight the term within the string.
	 *
	 * @param string
	 * @return string
	 */
	highlight: function(string) {
		var regexs = this.term.replace(/[-[\]{}()*+?.,\\^$|#]/g, "\\$&").split(' ');

		for (var i = 0, regex; regex = regexs[i]; i++) {
			string = string.replace(new RegExp(regex, 'ig'), function(result) {
				return '<em>'+ result +'</em>';
			});
		}

		return string;
	},

	/**
	 * Listen for keyup events. Checks the minimum length and begins throttling.
	 *
	 * @param e
	 */
	listen: function(e) {
		var code = e.which;

		if (code == KeyCode.arrowUp || code == KeyCode.arrowDown ||
			code == KeyCode.enter || code == KeyCode.tab ||
			code == this.config.selectKey) {
			return;
		}

		var value = this.node.val();

		if (value.length >= this.config.minLength) {
			this.term = value.trim();
			this._ghostText();
			this.throttle();

		} else if (value.length <= 0) {
			this.close();
		}
	},

	/**
	 * Begin searching the type ahead system and return results.
	 */
	start: function() {
		var config = this.config,
			type = $.type(config.source);

		if (Core.isCallback(config.onStart)) {
			config.onStart(this.term, this);
		}

		if (type == 'function') {
			config.source(this.term, $.proxy(this.finish, this));

		} else if (type == 'array') {
			this.finish(config.source);
		}
	},

	/**
	 * Set a throttle timer for the keyup event.
	 */
	throttle: function() {
		if (this.timer !== null) {
			window.clearTimeout(this.timer);
			this.timer = null;
		}

		this.timer = window.setTimeout($.proxy(this.start, this), this.config.throttle);
	},

	/**
	 * Trigger functionality for arrow and tab keys.
	 *
	 * @param e
	 */
	trigger: function(e) {
		var code = e.which,
			config = this.config;

		if (!(code == KeyCode.arrowUp || code == KeyCode.arrowDown ||
			code == config.selectKey || code == KeyCode.tab) ) {
			return;
		}

		// Default behavior if submitting with enter
		if (code == KeyCode.enter && (this.html.is(':hidden') || this.position == -1)) {
			this.node.parentsUntil('form').parent().submit();

		} else {
			e.preventDefault();
			e.stopPropagation();
		}

		var cache = this.cache,
			items = this.html.find('a');

		items.removeClass('item-active');

		// Move up or down
		if (code == KeyCode.arrowDown || code == KeyCode.arrowUp) {
			if (code == KeyCode.arrowDown) {
				this.position++;

				if (this.position >= items.length)
					this.position = 0;

			} else if (code == KeyCode.arrowUp) {
				this.position--;

				if (this.position <= -1)
					this.position = items.length - 1;
			}

			items.eq(this.position).addClass('item-active');
            this.node.val( cache[this.position].title );
			this._ghostText();

		// Pre-select first item
		} else if (code == KeyCode.tab) {
			this.node.val( cache[0].title );
			this._ghostText( cache[0].title );

		// Go to item
		} else if (code == config.selectKey) {
			if (this.position != -1 && cache[this.position]) {
                var item = cache[this.position];

                if (Core.isCallback(config.onSelect)) {
                    config.onSelect(item, this);

                } else if (item.url) {
                    Core.goTo( item.url );
                }
			}
		}
	},

	/**
	 * Position the list beneath the input field.
	 */
	_position: function() {
		if (!this.items.length) {
			this.close();
			return;
		}

		var offset = this.node.offset();

		this.html.css({
			width: this.node.outerWidth(),
			left: offset.left,
			top: offset.top + this.node.outerHeight()
		}).show();
	},

	/**
	 * Populate the list with matched items.
	 */
	_populate: function() {
		if (!this.items.length) {
			return;
		}

		this.html.empty();
		this.position = -1;

		var config = this.config,
			results = this.items,
			term = this.term,
			groups = {};

		if (config.groupResults) {
			for (var i = 0, result; result = results[i]; i++) {
				if (!groups[result.type])
					groups[result.type] = [];

				groups[result.type].push( result );
			}
		} else {
			groups['default'] = results;
		}

		var div, ul, a, title,
			counter = 0;

		for (var i = 0, type; type = config.resultTypes[i]; i++) {
			if (counter >= config.resultsLength)
				break;

			if (groups[type]) {
				var hasItems = false;

				ul = $('<ul/>');

				for (var x = 0, item; item = groups[type][x]; x++) {
					if (counter >= config.resultsLength) {
						break;
					} else if (config.termMatch && item.title.toLowerCase().indexOf(term.toLowerCase()) <= -1) {
						continue;
					}

					title = '<span class="title">' + this.highlight(item.title) + '</span>';

					if (item.desc)
						title += ' <span class="desc">' + item.desc + '</span>';

					a = $('<a/>', {
						href: item.url,
						html: title,
						'class': item.className || ''
					});

					$('<li/>').append(a).appendTo(ul);

					counter++;
					hasItems = true;
					this.cache.push( item );
				}

				if (hasItems) {
					div = $('<div/>').addClass('group-list group-' + type);

					if (Msg.search && Msg.search[type]) {
						$('<span/>')
							.addClass('group-title')
							.html(Msg.search[type])
							.appendTo(div);
					}

					div.append(ul).appendTo(this.html);
				}
			}
		}

		var text = '';

		if (counter) {
			var test = this.cache[0].title;

			if (test.toLowerCase().indexOf(this.term.toLowerCase()) == 0) {
				text = test.replace(new RegExp(this.term, 'i'), this.term);
			}
		}

		this._ghostText(text);
	},

	/**
	 * Apply the text to the ghost input.
	 *
	 * @param text
	 */
	_ghostText: function(text) {
		if (this.ghost)
			this.ghost.val(text || '');
	}

});