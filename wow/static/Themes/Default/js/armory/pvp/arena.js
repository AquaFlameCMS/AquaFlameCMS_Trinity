
var Arena = {

	/**
	 * Swap between weekly and seasonal stats.
	 *
	 * @param target
	 * @param value
	 * @param dropdown
	 */
	swapStats: function(target, value, dropdown) {
		target = $(target);

		if (value == 'weekly') {
			target
				.find('.weekly').show().end()
				.find('.season').hide().end();
		} else {
			target
				.find('.season').show().end()
				.find('.weekly').hide().end();
		}
	}
	
};