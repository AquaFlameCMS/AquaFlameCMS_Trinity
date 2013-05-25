$(document).ready(function() {
	Services.initialize();
});

/**
 * Toggles display of WoW service categories, e.g., Character Services, Additional Services.
 *
 * @copyright   2010, Blizzard Entertainment, Inc.
 * @class       Services
 * @requires
 * @example
 *
 *      Services.initialize();
 *
 */
var Services = {
	wrapper: {},
    menuItems: {},
	initialize: function() {
		Services.wrapper = $('.service-selection');
		Services.menuItems = $('.wow-services li a');
		Services.total = Services.menuItems.length;

		if (!Services.menuItems.length) {
			return false;
		}

		Services.menuItems.bind({
			'click': function() {
				Services.pick(this);
				return false;
			}
		});
	},
	clear: function() {
		if (!Services.wrapper.length) {
			Services.initialize();
		}

		Services.wrapper.removeClass().addClass('.service-selection');
	},
	/**
	 * @param target Selected .wow-services li a element
	 */
	pick: function(target) {
		if (!Services.wrapper.length) {
			Services.initialize();
		}
		var category = $(target).attr('href').replace('#','');

		Services.clear();
		Services.wrapper.addClass(category);
		switch (category) {
			case 'character-services':
				$('.position').animate({
					left: 91
				}, 400);
				break;
			case 'additional-services':
				$('.position').animate({
					left: 338
				}, 400);
				break;
			case 'referrals-rewards':
				$('.position').animate({
					left: Services.total > 2 ? 585 : 338
				}, 400);
				break;
			case 'game-time-subscriptions':
				$('.position').animate({
					left: 832
				}, 400);
				break;
		}
	}
};
