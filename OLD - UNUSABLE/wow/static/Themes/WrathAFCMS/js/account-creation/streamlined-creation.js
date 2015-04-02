/**
 * Password validation and strength rating.
 *
 * @copyright   2011, Blizzard Entertainment, Inc
 * @class       Password
 */
var Password = Class.extend({

	/**
	 * Regex patterns for password validation.
	 */
	passwordPattern1: new RegExp(),
	passwordPattern2: new RegExp(),
	maxRepetition: 0,
	maxSequentiality: 0,

	/**
	 * Configuration.
	 * passwordPattern1: The ASCII printable character set
	 * passwordPattern2: At least one letter and one number
	 * maxRepetition: Use lower values to permit greater repetition.
	 * maxSequentiality: Use lower values to permit greater sequentiality.
	 */
	config: {},

	/**
	 * Initialize the class and apply the config.
	 */
	init: function(config) {

		config = typeof config !== 'undefined' ? config : {};

		// Merge configuration
		this.config = $.extend({
			passwordPattern1: new RegExp('^[\x20-\x7E]+$'),
			passwordPattern2: new RegExp('^(?=.*[0-9]+.*)(?=.*[a-zA-Z]+.*).+$'),
			maxRepetition: 2,
			maxSequentiality: 4
		}, config);

		config = this.config;

		this.passwordPattern1 = config.passwordPattern1;
		this.passwordPattern2 = config.passwordPattern2;
		this.maxRepetition = config.maxRepetition;
		this.maxSequentiality = config.maxSequentiality;

	},

	/**
	 * Check password to ensure it meets minimum requirements.
	 * Returns 0 if condition was not checked or password was empty.
	 * Returns -1 if condition was not met.
	 * Returns 1 if condition was met.
	 *
	 * @param password1 The password to be checked.
	 * @param password2 The re-entered password.
	 * @param email The user’s email address.
	 */
	check: function(password1, password2, email) {

		password1 = typeof password1 !== 'undefined' ? password1 : '';
		password2 = typeof password2 !== 'undefined' ? password2 : '';
		email = typeof email !== 'undefined' ? email : '';

		var results = [0, 0, 0, 0, 0];

		if (password1.length > 0) {
			// Password must be between 8–16 characters in length.
			if (password1.length >= 8 && password1.length <= 16) {
				results[0] = 1;
			} else {
				results[0] = -1;
			}
			// Password may only contain ASCII printable characters.
			if (this.passwordPattern1.test(password1)) {
				results[1] = 1;
			} else {
				results[1] = -1;
			}
			// Password must contain at least one alphabetic character and one numeric character.
			if (this.passwordPattern2.test(password1)) {
				results[2] = 1;
			} else {
				results[2] = -1;
			}
			// Cannot use account name as password.
			if (password1 !== email) {
				results[3] = 1;
			} else {
				results[3] = -1;
			}
			// Passwords must match.
			if (password2 === '') {
				results[4] = 0;
			} else if (password1 === password2) {
				results[4] = 1;
			} else {
				results[4] = -1;
			}
		}

		return results;
	},

	/**
	 * Rate a password’s strength.
	 * Returns 0 if password is empty or untested.
	 * Returns 1 if password is too short.
	 * Returns 2 if password is weak.
	 * Returns 3 if password is fair.
	 * Returns 4 if password is strong.
	 *
	 * @param password1 The password to be rated.
	 */
	rate: function(password1) {

		password1 = typeof password1 !== 'undefined' ? password1 : '';

		var result = 0;

		if (password1.length > 0) {
			if (password1.length >= 8) {
				if (this.passwordPattern1.test(password1) && this.passwordPattern2.test(password1) && password1.length > 10 && !this.hasRepetition(password1) && !this.hasSequentiality(password1)) {
					result = 4;
				} else {
					if (this.passwordPattern1.test(password1) && this.passwordPattern2.test(password1) && password1.length > 8 && !this.hasRepetition(password1) && !this.hasSequentiality(password1)) {
						result = 3;
					} else {
						result = 2;
					}
				}
			} else {
				result = 1;
			}
		}

		return result;

	},

	/**
	 * Check for repetition in a string.
	 * Returns true if the string has high repetition, false otherwise.
	 *
	 * @param string The string to check.
	 */
	hasRepetition: function(string) {

		string = typeof string !== 'undefined' ? string : '';
		pLen = typeof pLen !== 'undefined' ? pLen : 2;

		var pLen = this.maxRepetition,
			res = '';

		for (var i = 0, len = string.length; i < len; i++) {
			repeated = true;
			for (var j = 0; j < pLen && (j + i + pLen) < string.length; j++) {
				repeated = repeated && (string.charAt(j + i) === string.charAt(j + i + pLen));
			}
			if (j < pLen) {
				repeated = false;
			}
			if (repeated) {
				i += pLen - 1;
				repeated = false;
			} else {
				res += string.charAt(i);
			}
		}

		return res.length - string.length < 0;

	},

	/**
	 * Check for sequentiality in a string.
	 * Returns true if the string has high sequentiality, false otherwise.
	 *
	 * @param string The string to check.
	 */
	hasSequentiality: function(string) {

		string = typeof string !== 'undefined' ? string.toLowerCase() : '';

		var pLen = this.maxSequentiality,
			lowercase = 'abcdefghijklmnopqrstuvwxyz',
			lowercaseReverse = lowercase.split('').reverse().join(''),
			numbers = '1234567890',
			numbersReverse = numbers.split('').reverse().join(''),
			qwerty = 'qwertyuiopasdfghjklzxcvbnm!@#$%^&*()_+',
			qwertyReverse = qwerty.split('').reverse().join(''),
			chunk = ' ' + string.slice(0, pLen - 1);

		for (var i = pLen, len = string.length; i < len; i++) {
			chunk = chunk.slice(1) + string.charAt(i);
			if (lowercase.indexOf(chunk) > -1 || numbers.indexOf(chunk) > -1 || qwerty.indexOf(chunk) > -1 ||
				lowercaseReverse.indexOf(chunk) > -1 || numbersReverse.indexOf(chunk) > -1 || qwertyReverse.indexOf(chunk) > -1) {
				return true;
			}
		}

		return false;

	}


});

/**
 * Email validation.
 *
 * @copyright   2011, Blizzard Entertainment, Inc
 * @class       Email
 */
var Email = Class.extend({

	/**
	 * Regex patterns for password validation.
	 */
	emailPattern: new RegExp(),

	/**
	 * Configuration.
	 */
	config: {},

	/**
	 * Initialize the class and apply the config.
	 */
	init: function(config) {

		config = typeof config !== 'undefined' ? config : {};

		// Merge configuration
		this.config = $.extend({
			emailPattern: new RegExp('^[0-9a-zA-Z+_.-]+@[0-9a-zA-Z_-]+\\.[0-9a-zA-Z_.-]+$')
		}, config);

		this.emailPattern = this.config.emailPattern;

	},

	/**
	 * Check email address to ensure it meets minimum requirements.
	 * Returns 0 if condition was not checked or email was empty.
	 * Returns -1 if condition was not met.
	 * Returns 1 if condition was met.
	 *
	 * @param email1 The email address to be checked.
	 * @param email2 The re-entered email address (only checked if config.verify is true).
	 */
	check: function(email1, email2) {

		email1 = typeof email1 !== 'undefined' ? email1 : '';
		email2 = typeof email2 !== 'undefined' ? email2 : '';

		var results = [0, 0];

		if (email1 === '') {
			results[0] = 0;
		} else if (this.emailPattern.test(email1)) {
			results[0] = 1;
		} else {
			results[0] = -1;
		}

		if (email1 === '') {
			results[1] = 0;
		} else if (email1 === email2) {
			results[1] = 1;
		} else {
			results[1] = -1;
		}

		return results;

	}

});

/**
 * Account creation utility.
 *
 * @copyright   2011, Blizzard Entertainment, Inc
 * @class       Creation
 */
var Creation = Class.extend({

	/**
	 * jQuery objects for specific elements.
	 */
	form: null,
	submitButton: null,
	countrySelect: null,
	countryWarning: null,
	countrySubmit: null,
	countryCancel: null,
	countryDefault: null,
	countryBlockable: null,
	countryBlock: null,

	emailInput1: null,
	emailMessage1: null,
	emailInput2: null,
	emailMessage2: null,
	emailRight: null,
	emailLeft: null,
	emailValidator: new Email(),
	emailValidated: false,
	emailTimer: null,
	activeEmailInput: -1,
	autocompleteOptions: {},

	contactInput1: null,
	contactMessage1: null,
	contactInput2: null,
	contactMessage2: null,
	contactRight: null,
	contactLeft: null,
	contactValidated: false,
	contactTimer: null,
	contactInfo: null,
	showContactInfo: false,
	activeContactInput: -1,

	passwordInput1: null,
	passwordMessage1: null,
	passwordMessage1Default: null,
	passwordInput2: null,
	passwordMessage2: null,
	passwordMessage2Default: null,
	passwordRight: null,
	passwordLeft: null,
	passwordResult: null,
	passwordRating: null,
	passwordLevels: [],
	passwordGuidelines: null,
	passwordValidator: new Password(),
	passwordValidated: false,
	passwordTimer: null,
	showPasswordGuidelines: false,
	activePasswordInput: -1,

	activeInput: -1,

	secretQuestion: null,
	secretAnswer: null,
	secretInfo: null,
	secretTimer: null,
	showSecretInfo: false,

	/**
	 * Configuration.
	 */
	config: {},

	/**
	 * Initialize the class and apply the config.
	 *
	 * @param form The account creation form (e.g., '#creation').
	 * @param config An optional config object.
	 */
	init: function(form, config) {

		config = typeof config !== 'undefined' ? config : {};
		form = $(form);

		if (form.length) {
			if (form[0].tagName.toLowerCase() !== 'form') {
				form = form.find('form');
			}

			this.form = (form.length) ? form : null;
		}

		if (this.form !== null) {
			// Merge configuration
			this.config = $.extend({
				showContactInfo: false,
				contactFields: [
					'#parentContactEmail',
					'#parentContactEmailConfirmation'
				],
				emailFields: [
					'#emailAddress',
					'#emailAddressConfirmation'
				],
				passwordFields: [
					'#password',
					'#rePassword'
				],
				secretFields: [
					'#question1',
					'#answer1'
				],
				domains: []
			}, config);
			// Setup the class
			this.setup();
		}

	},

	/**
	 * Find the elements, bind the event handlers, reticulate splines.
	 */
	setup: function() {

		var form = this.form;

		this.submitButton = form.find('button[type=submit]');

		this.countrySelect = $('#country');
		if (this.countrySelect.length) {
			this.countryDefault = this.countrySelect.find(':selected')[0].value;
			this.countryWarning = $('#country-warning');
			this.countryGlobal = $('#countryGlobal');
			this.countryCHINA = $('#countryCHINA');
			this.countrySubmit = this.countryWarning.find('a.ui-button');
			this.countryCancel = this.countryWarning.find('a.ui-cancel');
			this.countryBlockable = $('#country-change');
			this.countryBlock = $('#country-change-overlay');
		}

		this.emailInput1 = $(this.config.emailFields[0]);
		this.emailMessage1 = $(this.config.emailFields[0] + '-message');
		this.emailInput2 = $(this.config.emailFields[1]);
		this.emailMessage2 = $(this.config.emailFields[1] + '-message');
		this.emailRight = this.emailInput1.parents('span.input-right');
		this.emailLeft = this.emailRight.siblings('span.input-left');

		if (this.config.showContactInfo) {
			this.contactInput1 = $(this.config.contactFields[0]);
			this.contactMessage1 = $(this.config.contactFields[0] + '-message');
			this.contactInput2 = $(this.config.contactFields[1]);
			this.contactMessage2 = $(this.config.contactFields[1] + '-message');
			this.contactRight = this.contactInput1.parents('span.input-right');
			this.contactLeft = this.contactRight.siblings('span.input-left');
			this.contactInfo = $('#contact-info');
		}

		this.passwordInput1 = $(this.config.passwordFields[0]);
		this.passwordMessage1 = $(this.config.passwordFields[0] + '-message');
		this.passwordMessage1Default = this.passwordMessage1.text();
		this.passwordInput2 = $(this.config.passwordFields[1]);
		this.passwordMessage2 = $(this.config.passwordFields[1] + '-message');
		this.passwordMessage2Default = this.passwordMessage2.text();
		this.passwordRight = this.passwordInput1.parents('span.input-right');
		this.passwordLeft = this.passwordRight.siblings('span.input-left');
		this.passwordResult = $('#password-result');
		this.passwordRating = $('#password-rating');
		this.passwordGuidelines = $('#password-strength');

		for (var i = 0; i < 5; i++)
			this.passwordLevels[i] = $('#password-level-' + i);

		this.secretQuestion = $(this.config.secretFields[0]);
		this.secretAnswer = $(this.config.secretFields[1]);
		this.secretInfo = $('#question-info');

		// Bind the events for country/region selection.
		if (this.countrySelect.length) {
			this.countrySelect.bind('change', { form: this }, function(e) {
				e.data.form.changeCountry(e.target.value);
			});

			this.countryCancel.bind('click', { form: this }, function(e) {
				e.data.form.resetCountry();
				return false;
			});
		}

		// Bind the form validation event.
		this.form.bind('validate', { form: this }, function(e, complete) {
			if (!e.data.form.emailValidated) {
				e.data.form.validateEmail();
			}
			if (!e.data.form.passwordValidated) {
				e.data.form.checkPassword();
			}
			if (e.data.form.config.showContactInfo && !e.data.form.contactValidated) {
				e.data.form.validateContact();
			}
			if (complete && e.data.form.emailValidated && e.data.form.passwordValidated && (!e.data.form.config.showContactInfo || e.data.form.contactValidated)) {
				e.data.form.enable();
			} else {
				e.data.form.disable();
			}
		});

		// Domain autocompletion for email addresses
		if (this.config.domains.length) {
			this.autocompleteOptions = {
				minChars: 0,
				matchSubset: false,
				matchContains: true,
				source: []
			};
			this.emailInput1.autocomplete(this.autocompleteOptions);
			this.emailInput2.autocomplete(this.autocompleteOptions);
		}

		// Inline messaging for e-mail addresses.
		this.emailInput1.bind('focus blur',
			$.proxy(this._validateEmail, this)
		).bind('input propertychange',
			$.proxy(this._completeEmail, this)
		);

		this.emailInput2.bind('focus blur',
			$.proxy(this._validateEmail, this)
		).bind('input propertychange',
			$.proxy(this._completeEmail, this)
		);

		// Contact info for parental account creation forms.
		if (this.config.showContactInfo) {

			this.contactInput1.bind('focus blur input propertychange',
				$.proxy(this._validateContact, this)
			);

			this.contactInput2.bind('focus blur input propertychange',
				$.proxy(this._validateContact, this)
			);

		}

		// Dynamic password strength rating.
		this.passwordInput1.bind('focus blur input',
			$.proxy(this._validatePassword, this)
		);

		this.passwordInput2.bind('focus blur input',
			$.proxy(this._validatePassword, this)
		);

		// Secret question information
		this.secretQuestion.bind('focus blur',
			$.proxy(this._toggleSecretNote, this)
		);
		this.secretAnswer.bind('focus blur',
			$.proxy(this._toggleSecretNote, this)
		);

	},

	/**
	 * Block the form until the user confirms their country change (or cancels it).
	 */
	block: function() {
		this.countryBlock.height(this.countryBlockable.height()).show();
		this.countryBlockable.find('input').attr('disabled', 'disabled').removeClass('glow-shadow-2');
		this.countryBlockable.find('select').attr('disabled', 'disabled').removeClass('glow-shadow-2');
		this.countryBlockable.find('span.input-text').addClass('input-text-disabled');
		this.countryBlockable.find('span.input-select').addClass('input-select-disabled');
		this.countryBlockable.find('a.input-checkbox').addClass('input-checkbox-disabled');
		this.countryBlockable.find('a.input-checkbox-checked').addClass('input-checkbox-checked-disabled');
		this.countrySelect.addClass('input-select-disabled').removeClass('glow-shadow-2').attr('disabled', 'disabled');
	},

	/**
	 * Unblock the form.
	 */
	unblock: function() {
		this.countryBlock.hide();
		this.countryBlockable.find('input').removeAttr('disabled').addClass('glow-shadow-2');
		this.countryBlockable.find('select').removeAttr('disabled').addClass('glow-shadow-2');
		this.countryBlockable.find('span.input-text').removeClass('input-text-disabled');
		this.countryBlockable.find('span.input-select').removeClass('input-select-disabled');
		this.countryBlockable.find('a.input-checkbox').removeClass('input-checkbox-disabled');
		this.countryBlockable.find('a.input-checkbox-checked').removeClass('input-checkbox-checked-disabled');
		this.countrySelect.removeClass('input-select-disabled').addClass('glow-shadow-2').removeAttr('disabled');
	},

	/**
	 * Reset the current region to the default; cancel country change.
	 */
	resetCountry: function() {
		this.countrySelect.find('option[value="' + this.countryDefault + '"]')[0].selected = true;
		this.keepCountry();
	},

	/**
	 * Keep the current region; cancel country change.
	 */
	keepCountry: function() {
		this.unblock();
		this.countryWarning.slideUp(125);
	},

	/**
	 * Create a link to reload the form with the newly selected country.
	 *
	 * @param country A 3-character country code, e.g., 'USA'
	 */
	changeCountry: function(country) {
		this.countrySubmit[0].href = '?country=' + encodeURIComponent(country) + this.filterQueryString();
		this.block();
		if (country === "CHINA") {
			this.countryGlobal.hide();
			this.countryCHINA.show();
		}else{
			this.countryGlobal.show();
			this.countryCHINA.hide();
		}
		this.countryWarning.slideDown(250);
		this.countrySelect.hide().show(10);
	},

	/**
     * Filter and encode a query string.
	 *
	 * @param prefix Boolean indicating whether or not to prefix the string with '?'.
     */
    filterQueryString: function(prefix) {
    	prefix = prefix ? '?' : '&';
        var query = document.location.search,
            pairs = [],
            index = 0,
            key = '',
            val = '',
            result = '';
        query = query.substr(1);
        pairs = query.split('&');
        for (var i = 0, length = pairs.length; i < length; i++) {
            index = pairs[i].indexOf('=');
            key = encodeURIComponent(decodeURIComponent(pairs[i].substring(0, index)));
            val = encodeURIComponent(decodeURIComponent(pairs[i].substr(index + 1)));
            if (key !== 'style' && key !== 'ref' && key !== 'theme') {
                continue;
            }
            if (i === 0) {
                result = prefix + key + '=' + val;
            } else {
                result += '&' + key + '=' + val;
            }
        }
        return result;
    },

	/**
	 * Autocomplete the domain name for an e-mail address.
	 *
	 * @param e The event data.
	 */
	_completeEmail: function(e) {
		var domains = this.config.domains,
			target = e.target.id,
			email1 = this.emailInput1[0].id;
		if (domains.length) {
			var atTest = new RegExp('^[0-9a-zA-Z+_.-]+@+$');

			if (atTest.test(e.target.value)) {
				var userName = e.target.value,
					emailIDs = [];
				for (var i = 0, domain; domain = domains[i]; i++) {
					emailIDs.push(userName + domain);
				}
				this.autocompleteOptions.source = emailIDs;
				this.emailInput1.autocomplete(this.autocompleteOptions);
				this.emailInput2.autocomplete(this.autocompleteOptions);
				if ($.browser.msie && $.browser.version.substr(0,1) < 7) {
					if (target == email1) {
						$("#question1").hide();
					}
				}
			} else {
				this.autocompleteOptions.source = [];
			}
		}
		if (target !== email1) {
			this._validateEmail(e);
		}
	},

	/**
	 * Internal call to validateEmail() that uses a timer as a limiter.
	 *
	 * @param e The event data.
	 */
	_validateEmail: function(e) {


		var type = e.type,
			target = e.target.id,
			email1 = this.emailInput1[0].id,
			email2 = this.emailInput2[0].id,
			length1 = this.emailInput1[0].value.length,
			length2 = this.emailInput2[0].value.length,
			delay = (type === 'keyup' || type === 'input' || type === 'propertychange') ? 100 : 0,
			bind = this;

		// Override the default message if this field gets focus.
		if (type !== 'blur') {
			this.activeInput = 1;
		}
		if (target === email1 && type === 'focus') {
			clearTimeout(this.emailTimer);
			this.emailTimer = null;
			this.emailMessage1.html(FormMsg.emailMessage1);
		} else if (target === email2 && type !== 'blur' && length1 > length2) {
			this.emailMessage2.html(' ');
		} else if (this.emailTimer === null) {
			this.emailTimer = setTimeout(function() {
				bind.validateEmail();
			}, delay);
		}
		if(target === email1 && type === 'blur' && $.browser.msie && $.browser.version.substr(0,1) < 7){
			$("#question1").show();
		}
	},

	/**
	 * Validate an e-mail address.
	 */
	validateEmail: function() {
		var pass = true,
			email1 = this.emailInput1[0].value,
			email2 = this.emailInput2[0].value,
			rowRight = this.emailRight,
			rowLeft = this.emailLeft,
			placeholder1 = this.emailInput1.attr('placeholder'),
			placeholder2 = this.emailInput2.attr('placeholder'),
			validator = this.emailValidator,
			results;

		// Make sure we’re not validating placeholder text.
		if (email1 === placeholder1) {
			email1 = '';
		}
		if (email2 === placeholder2) {
			email2 = '';
		}

		results = validator.check(email1, email2);

		// Inline error for field #1.
		if (results[0] === -1) {
			this.emailMessage1.html(FormMsg.emailError1);
			pass = false;
		} else {
			this.emailMessage1.html(' ');
		}

		// Inline error for field #2.
		if (email2 !== '' && results[1] === -1) {
			this.emailMessage2.html(FormMsg.emailError2);
			pass = false;
		} else {
			this.emailMessage2.html(' ');
		}

		if (this.emailTimer !== null) {
			clearTimeout(this.emailTimer);
			this.emailTimer = null;
		}

		if (pass) {
			if (this.activeEmailInput > -1) {
				rowRight.removeClass('input-error');
				rowLeft.removeClass('input-error');
			}
			this.activeEmailInput = 1;
		} else {
			rowRight.addClass('input-error');
			rowLeft.addClass('input-error');
		}

		this.emailValidated = pass;
		return pass;
	},

	/**
	 * Internal call to validateContact() that uses a timer as a limiter.
	 *
	 * @param e The event data.
	 */
	_validateContact: function(e) {
		var type = e.type,
			target = e.target.id,
			contact1 = this.contactInput1[0].id,
			delay = (type === 'keyup' || type === 'input' || type === 'propertychange') ? 100 : 0,
			bind = this;

		this.showContactInfo = type !== 'blur';
		this.activeContactInput = -1;
		if (type !== 'blur') {
			this.activeContactInput = target === contact1 ? 0 : 1;
			this.activeInput = 1;
		}
		if (this.contactTimer === null) {
			this.contactTimer = setTimeout(function() {
				bind.validateContact();
			}, delay);
			return true;
		}
		return false;
	},

	/**
	 * Validate parent’s contact e-mail.
	 */
	validateContact: function() {
		var pass = true,
			contact1 = this.contactInput1[0].value,
			contact2 = this.contactInput2[0].value,
			rowRight = this.contactRight,
			rowLeft = this.contactLeft,
			placeholder1 = this.contactInput1.attr('placeholder'),
			placeholder2 = this.contactInput2.attr('placeholder'),
			validator = this.emailValidator,
			results;

		// Make sure we're not validating placeholder text.
		if (contact1 === placeholder1) {
			contact1 = '';
		}
		if (contact2 === placeholder2) {
			contact2 = '';
		}

		results = validator.check(contact1, contact2);

		// Inline error for field #1.
		if (results[0] === -1 && !this.showContactInfo) {
			this.contactMessage1.html(FormMsg.emailError1);
			pass = false;
		} else {
			this.contactMessage1.html(' ');
		}

		// Inline error for field #2.
		if (contact2 !== '' && results[1] === -1 && !this.showContactInfo) {
			this.contactMessage2.html(FormMsg.emailError2);
			pass = false;
		} else {
			this.contactMessage2.html(' ');
		}

		if (this.showContactInfo) {
			var arrow = this.contactInfo.find('div.input-note-arrow');
			this.contactInfo.slideDown(250);
			if (this.activeContactInput === 1) {
				arrow.animate({
					left: '468px'
				}, 250);
			} else {
				arrow.animate({
					left: '146px'
				}, 250);
			}
		} else {
			// Need a delay here so users can click on the link in the note.
			var form = this;
			setTimeout(function() {
				form.contactInfo.slideUp(125);
			}, 100);
		}

		if (this.contactTimer !== null) {
			clearTimeout(this.contactTimer);
			this.contactTimer = null;
		}

		if (pass) {
			rowRight.removeClass('input-error');
			rowLeft.removeClass('input-error');
		} else {
			rowRight.addClass('input-error');
			rowLeft.addClass('input-error');
		}

		this.contactValidated = pass;
		return pass;
	},

	/**
	 * Internal call to checkPassword() that uses a timer as a limiter.
	 *
	 * @param e The event data.
	 */
	_validatePassword: function(e) {
		var type = e.type,
			target = e.target.id,
			password1 = this.passwordInput1[0].id,
			delay = (type === 'keyup' || type === 'input' || type === 'propertychange') ? 100 : 0,
			bind = this;
		this.showPasswordGuidelines = type !== 'blur';
		this.activePasswordInput = -1;
		if (type !== 'blur') {
			this.activePasswordInput = target === password1 ? 0 : 1;
			this.activeInput = 1;
		}
		if (this.passwordTimer === null) {
			this.passwordTimer = setTimeout(function() {
				bind.checkPassword();
			}, delay);
			return true;
		}
		return false;
	},

	/**
	 * Check password to ensure it meets minimum strength requirements.
	 */
	checkPassword: function() {
		var form = this.form,
			pass = this.passwordValidator,
			result = true,
			password1 = this.passwordInput1[0].type === 'password' ? this.passwordInput1[0].value : '',
			password2 = this.passwordInput2[0].type === 'password' ? this.passwordInput2[0].value : '',
			rowRight = this.passwordRight,
			rowLeft = this.passwordLeft,
			message1 = this.passwordMessage1,
			message2 = this.passwordMessage2,
			default1 = this.passwordMessage1Default,
			default2 = this.passwordMessage2Default,
			email = this.emailInput1[0].value,
			show = this.showPasswordGuidelines;


		if (password1.length > 0) {
			rowRight.removeClass('input-error');
			rowLeft.removeClass('input-error');

			for (var i = 0, level, pw; pw = pass.check(password1, password2, email)[i]; i++) {
				level = form.find('#password-level-' + i);
				level.removeClass();
				if (pw === 1) {
					level.addClass('pass');
				} else if (pw === -1) {
					rowRight.addClass('input-error');
					rowLeft.addClass('input-error');
					level.addClass('fail');
					result = false;
				}
				if (i === 4 && pw === -1) {
					if (show) {
						message2.html(' ');
					} else {
						message2.html(FormMsg.passwordError2);
					}
				}
			}

			if (result || show) {
				message1.html(' ');
			} else if (!result || message2.html() === default2 || message2.html() === ' ') {
				message1.html(FormMsg.passwordError1);
			}

		} else {
			message1.html(default1);
			message2.html(default2);
			this.passwordLevels[0].removeClass();
			this.passwordLevels[1].removeClass();
			this.passwordLevels[2].removeClass();
			this.passwordLevels[3].removeClass();
			this.passwordLevels[4].removeClass();
			result = false;
		}

		this.ratePassword();

		this.passwordValidated = result;

		return result;
	},

	/**
	 * Rate a password’s strength.
	 */
	ratePassword: function() {
		var pass = this.passwordValidator,
			score = 0,
			password1 = this.passwordInput1[0].type === 'password' ? this.passwordInput1[0].value : '',
			rating = this.passwordRating,
			result = this.passwordResult,
			message1 = this.passwordMessage1,
			message2 = this.passwordMessage2;

		rating.removeClass().addClass('rating rating-default');
		result.html('').removeClass();

		if (password1.length > 0) {
			score = pass.rate(password1);
			if (score === 4) {
				rating.removeClass().addClass('rating rating-strong');
				result.html(FormMsg.passwordStrength3);
			} else if (score === 3) {
				rating.removeClass().addClass('rating rating-fair');
				result.html(FormMsg.passwordStrength2);
			} else if (score === 2) {
				rating.removeClass().addClass('rating rating-weak');
				result.html(FormMsg.passwordStrength1);
			} else if (score === 1) {
				rating.removeClass().addClass('rating rating-short');
				result.html(FormMsg.passwordStrength0).addClass('fail');
			}
		}

		if (this.showPasswordGuidelines) {
		    message1.html(' ');
		    message2.html(' ');
			var arrow = this.passwordGuidelines.find('div.input-note-arrow');
			this.passwordGuidelines.slideDown(250);
			if (this.activePasswordInput === 1) {
				arrow.animate({
					left: '468px'
				}, 250);
			} else {
				arrow.animate({
					left: '146px'
				}, 250);
			}
		} else {
			this.passwordGuidelines.slideUp(125);
		}

		if (this.passwordTimer !== null) {
			clearTimeout(this.passwordTimer);
			this.passwordTimer = null;
		}

	},

	/**
	 * Internal call to toggleSecretNote() that uses a timer as a limiter.
	 *
	 * @param e The event data.
	 */
	_toggleSecretNote: function(e) {
		var type = e.type,
			bind = this;

		this.showSecretInfo = type !== 'blur';
		if (this.secretTimer === null) {
			this.secretTimer = setTimeout(function() {
				bind.toggleSecretNote();
			}, 0);
			return true;
		}
		return false;
	},

	/**
	 * Toggle the secret question information.
	 */
	toggleSecretNote: function() {

		if (this.showSecretInfo) {
			this.secretInfo.show();
		} else {
			this.secretInfo.hide();
		}

		if (this.secretTimer !== null) {
			clearTimeout(this.secretTimer);
			this.secretTimer = null;
		}

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

/**
 * Account creation confirmation utility.
 *
 * @copyright   2011, Blizzard Entertainment, Inc
 * @class       Confirmation
 */
var Confirmation = Class.extend({

	/**
	 * jQuery objects for specific elements.
	 */
	form: null,
	submitButton: null,

	emailInput1: null,
	contactInput1: null,
	contactMessage1: null,
	contactValidator: new Email(),
	contactTimer: null,

	/**
	 * Configuration.
	 */
	config: {},

	/**
	 * Initialize the class and apply the config.
	 *
	 * @param form The account creation form (e.g., '#creation').
	 * @param config An optional config object.
	 */
	init: function(form, config) {

		config = typeof config !== 'undefined' ? config : {};
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
				contactFields: [
					'#parentEmail'
				],
				emailFields: [
					'#emailAddress'
				]
			}, config);
			// Setup the class
			this.setup();
		}

	},

	/**
	 * Find the elements, bind the event handlers, reticulate splines.
	 */
	setup: function() {

		var form = this.form;

		this.submitButton = form.find('button[type=submit]');

		this.emailInput1 = $(this.config.emailFields[0]);
		this.contactInput1 = $(this.config.contactFields[0]);
		this.contactMessage1 = $(this.config.contactFields[0] + '-message');

		// Bind the form validation event.
		this.form.bind('validate', { form: this }, function(e, complete) {
			if (complete && e.data.form.contactValidated) {
				e.data.form.enable();
			} else {
				e.data.form.disable();
			}
		});

		// Parent’s contact e-mail
		this.contactInput1.bind('focus',
			$.proxy(this._validateContact, this)
		).bind('blur',
			$.proxy(this._validateContact, this)
		).bind('input propertychange',
			$.proxy(this._validateContact, this)
		);

	},

	/**
	 * Internal call to validateContact() that uses a timer as a limiter.
	 *
	 * @param e The event data.
	 */
	_validateContact: function(e) {
		var type = e.type,
			delay = (type === 'keyup' || type === 'input' || type === 'propertychange') ? 100 : 0,
			bind = this;
		if (this.contactTimer === null) {
			this.emailTimer = setTimeout(function() {
				bind.validateContact();
			}, delay);
		}
		return false;
	},

	/**
	 * Validate parent's contact e-mail.
	 */
	validateContact: function() {
		var pass = true,
			email1 = this.emailInput1[0].value,
			contact1 = this.contactInput1[0].value,
			placeholder1 = this.contactInput1.attr('placeholder'),
			validator = this.contactValidator,
			results;

		// Make sure we're not validating placeholder text.
		if (contact1 === placeholder1) {
			contact1 = '';
		}

		results = validator.check(contact1);

		// Inline error for field #1.
		if (results[0] === -1) {
			this.contactMessage1.html(FormMsg.contactError1);
			pass = false;
		} else if (contact1 === email1) {
			this.contactMessage1.html(FormMsg.contactMessage1);
			pass = false;
		} else {
			this.contactMessage1.html(' ');
		}

		if (this.contactTimer !== null) {
			clearTimeout(this.contactTimer);
			this.contactTimer = null;
		}

		this.contactValidated = pass;
		return pass;
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
