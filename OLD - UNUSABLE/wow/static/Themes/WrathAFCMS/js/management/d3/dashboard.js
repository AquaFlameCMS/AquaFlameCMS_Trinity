/**
 * Age gate for mature downloads.
 *
 * @copyright   2011, Blizzard Entertainment, Inc
 * @class       AgeGate
 * @requires    Core
 */
var AgeGate = Class.extend({

	/**
	 * jQuery objects for specific elements.
	 */
	downloadWrapper: null,
	ageGateWrapper: null,
	ageGateSubmit: null,

	infoMessage: null,
	warningMessage: null,
	dateSelect: null,
	yearSelect: null,
	monthSelect: null,
	daySelect: null,

	/**
	 *  Let’s do this.
	 */
	init: function() {

		this.downloadWrapper = $('#download-options');
		this.ageGateWrapper = $('#age-gate');
		this.ageGateSubmit = $('#age-gate button');

		this.infoMessage = $('#age-gate-info');
		this.warningMessage = $('#age-gate-warning');
		this.dateSelect = $('#age-gate-select');
		this.yearSelect = $('#dob-year');
		this.monthSelect = $('#dob-month');
		this.daySelect = $('#dob-day');

		this.hideDownloads();
		this._validateAge();

		if (Cookie.read('bam.ageGate.denied')) {
			this.showWarning();
		}

		this.yearSelect.bind('change',
			$.proxy(this._validateAge, this)
		)

		this.monthSelect.bind('change',
			$.proxy(this._validateAge, this)
		)

		this.daySelect.bind('change',
			$.proxy(this._validateAge, this)
		)

		$(this.ageGateSubmit).bind('click',
			$.proxy(this._submitAge, this)
		);

	},

	/**
	 * Validate age based on event data.
	 *
	 * @param	e The event data.
	 */
	_validateAge: function(e) {
		var year = $('#dob-year option:selected').val(),
			month = $('#dob-month option:selected').val(),
			day = $('#dob-day option:selected').val(),
			result = year !== '' && month !== '' && day !== '';
		result ? this.enableSubmit() : this.disableSubmit();
	},

	/**
	 * Submit age based on event data.
	 *
	 * @param	e The event data.
	 */
	_submitAge: function(e) {
		var year = parseInt($('#dob-year option:selected').val(), 10),
			month = parseInt($('#dob-month option:selected').val(), 10),
			day = parseInt($('#dob-day option:selected').val(), 10),
			result = this.isSeventeen(year, month, day);
		result ? this.showDownloads() : this.showWarning();
		e.currentTarget.blur();
		return false;
	},

	/**
	 * Show the age gate failure warning.
	 */
	showWarning: function() {
		this.hideDownloads();
		this.blockUser();
		this.infoMessage.hide();
		this.warningMessage.show();
		this.dateSelect.hide();
	},

	/**
	 * Show the download options.
	 */
	showDownloads: function() {
		this.downloadWrapper.show();
		this.ageGateWrapper.hide();
	},

	/**
	 * Hide the download options.
	 */
	hideDownloads: function() {
		this.downloadWrapper.hide();
		this.ageGateWrapper.show();
	},

	/**
	 * Prevent the user from retrying the age gate for two hours.
	 */
	blockUser: function() {
		if (!Cookie.read('bam.ageGate.denied')) {
			Cookie.create('bam.ageGate.denied', true, {
				expires: 2,
				path: '/account'
			});
		}
	},

	/**
	 * Test to see if date occurred at least seventeen years ago.
	 *
	 * @param year yyyy
	 * @param month MM
	 * @param day dd
	 */
	isSeventeen: function(year, month, day) {
		if (typeof year === 'number' && typeof month === 'number' && typeof day === 'number') {
		    var date = new Date(year + 17, month - 1, day);
		    var today = new Date();
		    today = new Date(today.getFullYear(), today.getMonth(), today.getDate());
		    return today > date;
		}
		return false;
	},

	/**
	 * Enable the submit button.
	 */
	enableSubmit: function() {
		this.ageGateSubmit.removeClass('disabled').removeAttr('disabled');
	} ,

	/**
	 * Disable the submit button.
	 */
	disableSubmit: function() {
		this.ageGateSubmit.addClass('disabled').attr('disabled','disabled');
	}

});
