
$(function() {
	Wow.initialize();
	Fansite.initialize();
});

var Wow = {

	/**
	 * Initialize all wow tooltips.
	 *
	 * @constructor
	 */
	initialize: function() {
		setTimeout(function() {
		Wow.bindTooltips('achievement');
		Wow.bindTooltips('spell');
		Wow.bindTooltips('quest');
		Wow.bindTooltips('currency');
		Wow.bindTooltips('zone');
		Wow.bindTooltips('faction');
		Wow.bindTooltips('npc');
		Wow.bindItemTooltips();
		Wow.bindCharacterTooltips();
			Wow.initNewFeatureTip();
		}, 1);
	},

	/**
	 * Display or hide the video.
	 */
	toggleInterceptVideo: function() {
		$("#video, #blackout, #play-trailer").toggle();
		return false;
	},

	/**
	 * Bind item tooltips to links.
	 * Gathers the item ID from the href, and the optional params from the data-item attribute.
	 */
	bindItemTooltips: function() {
		Tooltip.bind('a[href*="/item/"], [data-item]', false, function() {
			if (this.rel == 'np')
				return;

			var self = $(this),
				id,
				query;

			if (this.href !== null) {
				if (this.href == 'javascript:;' || this.href.indexOf('#') == 0)
					return;

				var data = self.data('item'),
					href = self.attr('href').split(Core.baseUrl +'/item/');

				id = parseInt(href[1]);
				query = (data) ? '?'+ data : "";

			} else {
				id = parseInt(self.data('item'));
				query = '';
			}

			if (id && id > 0)
				Tooltip.show(this, '/item/'+ id +'/tooltip'+ query, true);
		});
	},

	/**
	 * Bind character tooltips to links.
	 * Add rel="np" to disable character tooltips on links.
	 */
	bindCharacterTooltips: function() {
		Tooltip.bind('a[href*="/character/"]', false, function() {
			if (this.href == 'javascript:;' || this.href.indexOf('#') == 0 || this.rel == 'np' || this.href.indexOf('http://eu.battle.net/vault/') != -1)
				return;

			var href = $(this).attr('href').replace(Core.baseUrl +'/character/', "").split('http://eu.battle.net/');

			if (location.href.toLowerCase().indexOf('/'+ href[1].toLowerCase() +'/') != -1 && this.rel != 'allow')
				return;

			Tooltip.show(this, '/character/'+ encodeURIComponent(href[0]) +'/'+ href[1] +'/tooltip', true);
		});
	},

	/**
	 * Bind a tooltip to a specific wiki type.
	 *
	 * @param type
	 */
	bindTooltips: function(type) {
		Tooltip.bind('[data-'+ type +']', false, function() {
			if (this.rel == 'np')
				return;

			var data = $(this).data(type);

			if (typeof data != 'undefined')
				Tooltip.show(this, '/'+ type +'/'+ data +'/tooltip', true);
		});
	},

	/**
	 * Update the events within the sidebar.
	 *
	 * @param id
	 * @param status
	 */
	updateEvent: function(id, status) {
		$('#event-'+ id +' .actions').fadeOut('fast');

		$.ajax({
			url: $('.profile-link').attr('href') +'event/'+ status,
			data: { eventId: id },
			dataType: "json",
			success: function(data) {
				$('#event-'+ id).fadeOut('fast', function() {
					$(this).remove();
				});
			}
		});

		return false;
	},

	/**
	 * Load the browse.json data and display the dropdown menu.
	 *
	 * @param node
	 * @param url
	 */
	browseArmory: function(node, url) {
		if ($('#menu-tier-browse').is(':visible'))
			return;

		Menu.load('browse', url);
		Menu.show(node, 'http://eu.battle.net/', { set: 'browse' });
	},

	/**
	 * Creates the html nodes for basic tooltips.
	 *
	 * @param title
	 * @param description
	 * @param icon
	 */
	createSimpleTooltip: function(title, description, icon) {

		var $tooltip = $('<ul/>');

		if (icon) {
			$('<li/>').append(Wow.Icon.framedIcon(icon, 56)).appendTo($tooltip);
		}

		if (title) {
			$('<li/>').append($('<h3/>').text(title)).appendTo($tooltip);
		}

		if (description) {
			$('<li/>').addClass('color-tooltip-yellow').html(description).appendTo($tooltip);
		}

		return $tooltip;
	},

	/**
	 * Add new BML commands to the editor.
	 */
	addBmlCommands: function() {
		BML.addCommands([
			{
				type: 'item',
				tag: 'item',
				filter: true,
				selfClose: true,
				prompt: Msg.bml.itemPrompt,
				pattern: [
					'\\[item="([0-9]{1,5})"\\s*/\\]'
				],
				result: [
					'<a href="'+ Core.baseUrl +'/item/$1">'+ Core.host + Core.baseUrl +'/item/$1</a>'
				]
			}
		]);
	},

	initNewFeatureTip: function() {
		Core.showUntilClosed('#feature-tip', 'wow-feature-mop', {
			endDate: '2011/11/02',
			fadeIn: 333,
			trackingCategory: 'New Feature Tip',
			trackingAction: 'Mists of Pandaria'
		});
	}

};

Wow.Icon = {

	/**
	 * Generate icon path.
	 *
	 * @param name
	 * @param size
	 */
	getUrl: function(name, size) {
		return Core.cdnUrl +'/wow/icons/'+ size +'/'+ name +'.jpg';
	},

	/**
	 * Create frame icon markup.
	 *
	 * @param name
	 * @param size
	 */
	framedIcon: function(name, size) {
		var iconSize = 56;

		if (size <= 18)
			iconSize = 18;
		else if (size <= 36)
			iconSize = 36;

		var $icon = $('<span/>').addClass('icon-frame frame-' + size);

		if (size == 18 || size == 36 || size == 56) {
			$icon.css('background-image', 'url(' + Wow.Icon.getUrl(name, iconSize) + ')');
		} else {
			$icon.append($('<img/>').attr({
				width: size,
				height: size,
				src: Wow.Icon.getUrl(name, iconSize)
			}));
		}

		return $icon;
	}

};

/**
 * 3rd-party fansite integration.
 */
var Fansite = {

	/**
	 * Map of sites and available URLs.
	 */
	sites: {
		wowhead: {
			name: 'Wowhead',
			site: 'http://www.wowhead.com/',
			regions: ['us', 'eu'],
			locales: ['de', 'es', 'fr', 'ru'],
			urls: {
				achievement: ['achievements', 'achievement={0}'],
				character: ['profiles', function(params) {

					var region = params[1].toLowerCase();
					var realm = params[3].toLowerCase();
					realm = realm.replace(/( )+/g, '-')
					realm = realm.replace(/^A-Z/ig, '')
					var name = params[2].toLowerCase();

					return 'profile='+ encodeURIComponent(region) + '.' + encodeURIComponent(realm) + '.' + encodeURIComponent(name);
				}],
				faction: ['factions', 'faction={0}'],
				'class': ['classes', 'class={0}'],
				object: ['objects', 'object={0}'],
				skill: ['skills', 'skill={0}'],
				race: ['races', 'race={0}'],
				quest: ['quests', 'quest={0}'],
				spell: ['spells', 'spell={0}'],
				event: ['events', 'event={0}'],
				title: ['titles', 'title={0}'],
				zone: ['zones', 'zone={0}'],
				item: ['items', 'item={0}'],
				npc: ['npcs', 'npc={0}'],
				pet: ['pets', 'pet={0}']
			}
		},
		wowpedia: {
			name: 'Wowpedia',
			site: 'http://www.wowpedia.org/',
			regions: ['us', 'eu'],
			locales: ['fr', 'es', 'de', 'ru', 'it'],
			domains: {
				ru: 'http://wowpedia.ru/wiki/',
				de: 'http://de.wow.wikia.com/wiki/',
				it: 'http://it.wow.wikia.com/wiki/'
			},
			urls: {
				faction: ['Factions', '{1}'],
				'class': ['Classes', '{1}'],
				skill: ['Professions', '{1}'],
				race: ['Races', '{1}'],
				zone: ['Zones', '{1}'],
				item: ['Items', '{1}'],
				pet: ['Pets', '{1}'],
				npc: ['NPCs', '{1}']
			},
			buildUrl: function(params) {
				return params[2].replace(/\s+/g, '_').replace(/"/ig, '&quot;');
			}
		},
		judgehype: {
			name: 'JudgeHype',
			site: 'http://worldofwarcraft.judgehype.com/',
			regions: ['eu'],
			locales: ['fr'],
			urls: {
				achievement: ['?page=hautsfaits', '?page=hautsfait&amp;w={0}'],
				faction: ['?page=reputations', '?page=reputation&amp;w={0}'],
				'class': ['?page=racesclasses', function(params) {
					return '?page='+ encodeURIComponent(params[1].toLowerCase());
				}],
				skill: ['?page=professions', function(params) {
					return '?page='+ encodeURIComponent(params[1].toLowerCase());
				}],
				quest: ['?page=quetes', '?page=quete&amp;w={0}'],
				spell: ['?page=spell', '?page=spell&amp;w={0}'],
				zone: ['?page=zones', '?page=zone&amp;w={0}'],
				item: ['?page=objets', '?page=objet&amp;w={0}'],
				race: ['?page=factions', function(params) {
					return '?page='+ encodeURIComponent(params[1].toLowerCase());
				}],
				npc: ['?page=pnjs', '?page=pnj&amp;w={0}'],
				pet: ['?page=pnjs-betes', '?page=pnjs-bete&amp;w={0}']
			}
		},
		buffed: {
			name: 'Buffed.de',
			site: 'http://wowdata.buffed.de/',
			regions: ['eu'],
			locales: ['de'],
			urls: {
				achievement: ['', '?a={0}'],
				faction: ['faction/', '?faction={0}'],
				'class': ['class/portal', 'class/portal/{0}'],
				skill: ['', 'spell/profession/{0}'],
				spell: ['', '?s={0}'],
				title: ['title/list', 'title/list'],
				quest: ['quest/list/1/', '?q={0}'],
				item: ['item/list', '?i={0}'],
				zone: ['zone/list/1/', '?zone={0}'],
				npc: ['', '?n={0}']
			}
		},
		printwarcraft: {
			name: 'PrintWarcraft',
			site: 'http://printwarcraft.com/',
			regions: ['us', 'eu'],
			locales: ['fr', 'es', 'de', 'ru', 'it'],
			urls: {
				character: ['Characters', function(params) {
					var prefix = '';
					var prefixMap = {
						'fr-fr': 'fr/',
						'de-de': 'de/',
						'en-gb': 'uk/'
					};

					if (prefixMap[Core.locale]) {
						prefix = prefixMap[Core.locale];
					}

					var name = params[2];
					var realm = params[3];
					var region = params[1];

					return prefix + 'armorylanding.html?r=' + encodeURIComponent(realm) +"&amp;n=" + encodeURIComponent(name);
				}]
			}
		},
		figureprints: {
			name: 'FigurePrints',
			site: 'http://figureprints.com/',
			regions: ['us', 'eu'],
			locales: ['fr', 'es', 'de', 'ru', 'it'],
			urls: {
				character: ['Characters', function(params) {
					var name = params[2];
					var realm = params[3];
					var region = params[1];

					return 'CharacterList.aspx?n=' + encodeURIComponent(name) + '&amp;r=' + encodeURIComponent(realm) + '&amp;e=' + encodeURIComponent(region);
				}]
			}
		}
	},

	/**
	 * Map of content types and available sites for that type.
	 */
	map: {
		achievement: ['wowhead', 'buffed', 'judgehype'],
		character: ['figureprints', 'printwarcraft', 'wowhead'],
		faction: ['wowhead', 'wowpedia', 'buffed', 'judgehype'],
		'class': ['wowhead', 'wowpedia', 'buffed', 'judgehype'],
		object: ['wowhead'],
		skill: ['wowhead', 'wowpedia', 'buffed', 'judgehype'],
		quest: ['wowhead', 'buffed', 'judgehype'],
		spell: ['wowhead', 'buffed', 'judgehype'],
		event: ['wowhead'],
		title: ['wowhead', 'buffed'],
		arena: [],
		guild: [],
		zone: ['wowhead', 'wowpedia', 'buffed', 'judgehype'],
		item: ['wowhead', 'wowpedia', 'buffed', 'judgehype'],
		race: ['wowhead', 'wowpedia', 'judgehype'],
		npc: ['wowhead', 'wowpedia', 'buffed', 'judgehype'],
		pet: ['wowhead', 'wowpedia', 'judgehype'],
		pvp: []
	},

	/**
	 * Create the menu HTML and delegate link events.
	 *
	 * @constructor
	 */
	initialize: function() {
		if (Fansite.initialized) {
			return;
		}

		Fansite.initialized = true;

		$(document)
			.delegate('a[data-fansite]', 'mouseenter.fansite', Fansite.onMouseOver)
			.delegate('a[data-fansite]', 'mouseleave.fansite', ContextMenu.delayedHide);
	},

	onMouseOver: function() {
		var node = $(this),
			params = Fansite.read(node.data('fansite'));

		Fansite.openMenu(node, params);
			return false;
	},

	/**
	 * Split params the awesome way!
	 *
	 * @param data
	 * @return array
	 */
	read: function(data) {
		return data.split('|');
	},

	/**
	 * Generate links from params.
	 *
	 * @param params
	 * @return array
	 */
	createLinks: function(params) {
		var type = params[0],
			map = Fansite.map[type],
			links = [],
			lang = Core.getLanguage();

		if (map.length > 0) {
			var site, url, urls;

			for (var i = 0, len = map.length; i < len; ++i) {
				if (!Fansite.sites[map[i]])
					continue;

				site = Fansite.sites[map[i]];

				if (
					((lang != 'en') && ($.inArray(lang, site.locales) < 0)) ||
					($.inArray(Core.buildRegion, site.regions) < 0) || 
					!site.urls[type]
				) {
					continue;
				}

				url = Fansite.createUrl(site),
				urls = site.urls[type];

				if (params.length <= 1) {
					url += urls[0];
				} else {
					if (typeof site.buildUrl == 'function') {
						url += site.buildUrl(params);
					} else {
						var urlPattern = urls[1];
						
						if (typeof urlPattern == 'function') {
							url += urlPattern(params);
						} else {
							for (var j = 1; j < params.length; ++j) {
								urlPattern = urlPattern.replace('{' + (j - 1) + '}', encodeURIComponent(params[j]));
							}
							url += urlPattern;
						}
					}
				}

				links.push('<a href="'+ url +'" target="_blank">'+ site.name +'</a>');
			}
		}

		return links;
	},

	/**
	 * Create the URL based on locale.
	 *
	 * @param site
	 * @return string
	 */
	createUrl: function(site) {
		var url = site.site,
			lang = Core.getLanguage();

		if ($.inArray(lang, site.locales) >= 0) {
			if (site.domains && site.domains[lang])
				url = site.domains[lang];
			else
			url = url.replace('www', lang);
		}

		return url;
	},

	/**
	 * Open up the menu and show the available sites for that type.
	 *
	 * @param node
	 * @param params
	 */
	openMenu: function(node, params) {
		Fansite.node = node;

		var list = $('<ul/>');
		var links = Fansite.createLinks(params);

		var title = '';

		if (links.length == 0) {
			title = Msg.ui.fansiteNone;
		} else {
			if (Msg.fansite[params[0]]) {
				title = Msg.ui.fansiteFindType.replace('{0}', Msg.fansite[params[0]]);
			} else {
				title = Msg.ui.fansiteFind;
			}
		}

		$('<li/>')
			.addClass('divider')
			.html('<span>' + title + '</span>')
			.appendTo(list);

		if (links.length > 0) {
			for (var i = 0, length = links.length; i < length; ++i) {
				$('<li/>').append(links[i]).appendTo(list);
			}

			// Also linkify the button itself if there's only 1 fansite
			if (links.length == 1) {
				node.attr('href', $(links[0]).attr('href'));
				node.attr('target', '_blank');
			}
		}

		ContextMenu.show(node, list);
	},

	/**
	 * Generate links for inline display.
	 *
	 * @param target
	 * @param data
	 */
	generate: function(target, data) {
		var links = Fansite.createLinks(Fansite.read(data));

		$(target).html(links.join(' ')).addClass('fansite-group');
	}

};

/* Show a custom contextual menu at the desired location */
var ContextMenu = {

	DELAY_HIDE: 333,

	// DOM
	object: null,
	node: null,
	parentNode: null,
	cb: null,

	initialize: function() {

		if(ContextMenu.object != null) {
			return;
		}

		ContextMenu.object = $('<div/>')
			.attr('id', 'context-menu')
			.addClass('flyout-menu')
			.appendTo('body')
			.mouseenter(ContextMenu.onMouseOver)
			.mouseleave(ContextMenu.onMouseOut);
	},

	show: function(node, contents) {

		if(ContextMenu.parentNode != null) {
			ContextMenu.parentNode.removeClass('hover');
		}
		clearTimeout(ContextMenu.timer);

		node = $(node);

		ContextMenu.node = node;
		ContextMenu.parentNode = node.parent();

		ContextMenu.initialize();
		ContextMenu.object.html(contents);
		ContextMenu.position(node);	
		
		ContextMenu.parentNode.addClass('hover');
	},

	onMouseOver: function() {
		clearTimeout(ContextMenu.timer);
	},

	onMouseOut: function() {
		ContextMenu.hide();
	},

	delayedHide: function() {
		clearTimeout(ContextMenu.timer);
		ContextMenu.timer = setTimeout(ContextMenu.hide, ContextMenu.DELAY_HIDE);
	},

	/**
	 * Hide the menu.
	 */
	hide: function() {

		ContextMenu.object.hide();

		if(ContextMenu.parentNode != null) {
			ContextMenu.parentNode.removeClass('hover');
		}

		ContextMenu.node = null;
		ContextMenu.parentNode = null;
	},

	/**
	 * Position the menu at the middle right.
	 *
	 * @param node
	 */
	position: function(node) {
		var offset = node.offset(),
			nodeWidth = node.outerWidth(),
			nodeHeight = node.outerHeight(),
			winWidth = ($(window).width() / 3),
			width = ContextMenu.object.outerWidth(),
			height = ContextMenu.object.outerHeight(),
			y = (offset.top + (nodeHeight / 2)) - (height / 2),
			x;

		if (offset.left > (winWidth * 2))
			x = (offset.left - width) - 10;
		else
			x = offset.left + nodeWidth;

		ContextMenu.object.css({
			top: y,
			left: x + 5
		}).fadeIn('fast');
	}

};