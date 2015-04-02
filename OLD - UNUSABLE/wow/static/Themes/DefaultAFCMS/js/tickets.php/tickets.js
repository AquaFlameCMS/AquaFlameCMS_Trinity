/**
 * Sortable, filterable ticket history table.
 *
 * @copyright   2011, Blizzard Entertainment, Inc
 * @class       TicketHistory
 */
var TicketHistory = Class.extend({

	/**
	 * jQuery objects for specific elements.
	 */
	table: null,
	rows: null,
	links: null,
	dateTime: null,
	tableSorter: null,
	filterSelect: null,
	filterLink: null,
	regionSelect: null,
	filter: '',

	/**
	 * Configuration.
	 */
	config: {},

	/**
	 * Initialize the class and apply the config.
	 */
	init: function(config) {

		config = typeof config === 'object' ? config : {};

		// Merge configuration
		this.config = $.extend({
			sortable: true,
			filterable: true,
			results: 10
		}, config);

		this.setup();

	},

	/**
	 * Find the elements, bind the event handlers, blah blah blah.
	 */
	setup: function() {

		var config = this.config;

		this.table = $('#ticket-history');
		this.rows = this.table.find('tbody tr');
		this.dateTime = new DateTime();
		this.dateTime.localize();
		this.tableSorter = new Table('#ticket-history', {
			paging: true,
			results: config.results
		});
		this.filterSelect = $('#filter-select');
		this.filterLink= $('#filter-link');
		this.filter =  $('#filter-select option:selected')[0].value;
		this.regionSelect = $('#region-select');

		this.applyFilter(this.filter);

		this.filterSelect.bind('change', { history : this }, function(e) {
			var filter = $(this).find('option:selected')[0].value;
			e.data.history.applyFilter(filter);
			return false;
		});

		this.filterLink.live('click', { history : this }, function(e) {
			var filter = $(this).attr('rel');
			e.data.history.applyFilter(filter);
			return false;
		});

		this.regionSelect.bind('change', { history : this }, function(e) {
			var region = $(this).find('option:selected')[0].value;
			if (region !== Core.buildRegion) {
				e.data.history.changeRegion(region);
				return false;
			}
		});

		this.rows.live({
			'mouseenter': function() {
				$(this).css('cursor', 'pointer');
			},
			'click': function(e) {
				if (e.target.tagName.toLowerCase() === 'a') {
					return true;
				}
				document.location.href = $(this).find('a.ticket-link')[0].href;
				return false;
			}
		});

	},

	/**
	 * Filter the history table by class name.
	 *
	 * @param filter The class name to filter by (will be prefixed with 'ticket-').
	 */
	applyFilter: function(filter) {
		this.filterSelect.find('option[value="' + filter + '"]')[0].selected = true;
		if (filter === 'all') {
			this.tableSorter.filter('class', 'class', '');
		} else {
			this.tableSorter.filter('class', 'class', 'ticket-' + filter);
		}
	},

	/**
	 * Change the region.
	 *
	 * @param region The two-character region code (e.g., "us").
	 */
	changeRegion: function(region) {
		document.location.href = document.location.href.split('?')[0] + '?region=' + encodeURIComponent(region);
	}

});
