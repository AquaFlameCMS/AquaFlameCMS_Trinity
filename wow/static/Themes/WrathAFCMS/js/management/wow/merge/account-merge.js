/**
 * Account merge utility.
 *
 * @copyright   2011, Blizzard Entertainment, Inc
 * @class       AccountMerge
 */
var AccountMerge = Class.extend({

	/**
	 * jQuery objects for specific elements.
	 */
	form: null,
	wowLogin: null,
	regionSelect: null,
	captchaInput: null,
	submitButton: null,

	captchaRegions: [],
	accountCountry: '',

	/**
	 * Configuration.
	 */
	config: {},

	/**
	 * Initialize the class and apply the config.
	 *
	 * @param form The account merge form (e.g., '#account-merge').
	 * @param config An optional config object.
	 */
	init: function(form, config) {

		config = typeof config === 'object' ? config : {};
		form = $(form);

		if (form.length) {
			if (form[0].tagName.toLowerCase() !== 'form') {
				form = form.find('form');
			}

			this.form = (form.length) ? form : null;
		}

		if (form !== null) {
			// Merge configuration
			this.config = $.extend({
				captchaRegions: [],
				accountCountry: ''
			}, config);
			// Setup the class
			this.setup();
		}

	},

	/**
	 * Find the elements, bind the event handlers, reticulate splines.
	 */
	setup: function() {

		var form = this.form,
			config = this.config;

		this.wowLogin = $('#wowLogin');
		this.regionSelect = $('#wowRegion');
		this.captchaInput = $('#captchaInput');

		this.submitButton = form.find('button[type=submit]');

		this.captchaRegions = config.captchaRegions;
		this.accountCountry = config.accountCountry;

		// Bind the form validation event.
		form.bind('validate', { form: this }, function(e, complete) {
			if (complete) {
				e.data.form.enable();
			} else {
				e.data.form.disable();
			}
		});

		// Bind the region select event.
		this.regionSelect.bind('change', { form: this }, function(e) {
			e.data.form.changeRegion();
		});

		this.changeRegion();

	},

	/**
	 * Change the WoW region.
	 */
	changeRegion: function() {

		var accountCountry = this.accountCountry,
			enableCaptcha = false;

		if (this.form === null) {
			return false;
		}

		var wowRegion = $("#wowRegion").val();

		if (wowRegion === 'KR' && accountCountry !== 'KOR') {
			this.wowLogin.hide();
			$("#notKRAccount").show();
			$("#mergeNA").hide();
			$("#tw-warning").hide();
			$("#captcha-field").hide();
		} else if (wowRegion !== 'TW') {
			this.wowLogin.show();
			$("#notKRAccount").hide();
			$("#mergeNA").hide();
			$("#tw-warning").hide();
			$("#captcha-field").hide();
            $("#pwLink").show();
            $("#pwLinkNo").hide();
		} else {
			this.wowLogin.show();
			$("#notKRAccount").hide();
			$("#mergeNA").hide();
			$("#tw-warning").show();
			$("#captcha-field").show();
            $("#pwLink").hide();
            $("#pwLinkNo").show();
		}

		for (var i = 0, length = this.captchaRegions.length; i < length; i++) {
			if (this.captchaRegions[i] === wowRegion) {
				enableCaptcha = true;
				break;
			}
		}

		if (enableCaptcha) {
			this.enableCaptcha();
		} else {
			this.disableCaptcha();
		}

	},

	/**
	 * Enable the CAPTCHA input.
	 */
	enableCaptcha: function() {
		this.captchaInput.removeAttr('disabled').addClass('glow-shadow-2').parent('span.input-text').removeClass('input-text-disabled');
	},

	/**
	 * Disable the CAPTCHA input.
	 */
	disableCaptcha: function() {
		this.captchaInput.attr('disabled', 'disabled').removeClass('glow-shadow-2').parent('span.input-text').addClass('input-text-disabled');
	},

	/**
	 * Enable the submit button.
	 */
	enable: function() {
		this.submitButton.removeClass('disabled').removeAttr('disabled');
	},

	/**
	 * Prevent the form from being submitted.
	 */
	disable: function() {
		this.submitButton.addClass('disabled').attr('disabled', 'disabled');
	}

});