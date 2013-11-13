
$(document).ready(function() {
	PasswordVerification.initialize();
});

/**
 * Password verification.
 *
 * @copyright   2010, Blizzard Entertainment, Inc.
 * @class       RedemptionForm
 * @example
 *
 *      PasswordVerification.initialize();
 *
 */
var PasswordVerification = {
	_validAlphabetic: 'ABCDEFGHIJKLMNOPQRSTUVWXYZ',
	_validNumeric: '0123456789',
	_validPunctuation: '!"$%',
	_minLength: 8,
	_maxLength: parseInt($('#newPassword').attr('maxlength'), 10),
	_noteToggler: $('#newPassword').parent('.form-row').find('.note-toggler'),
	initialize: function() {
		$('#newPassword').bind({
			'keyup': function() {
					if ($(this).val().length >= PasswordVerification._minLength
						&& $(this).val().length <= PasswordVerification._maxLength) {
						if (!PasswordVerification.isValidString($(this).val())) {
							UI.showNotes(PasswordVerification._noteToggler);
						} else {
							UI.hideNotes();
						}
					} else {
						UI.hideNotes();
					}
			},
			'blur': function() {
				if ($(this).val().length >= PasswordVerification._minLength
					&& $(this).val().length <= PasswordVerification._maxLength) {
					if (!PasswordVerification.isValidString($(this).val())) {
						UI.showNotes(PasswordVerification._noteToggler);
					} else {
						UI.hideNotes();
					}
				} else {
					UI.hideNotes();
				}
			}
		});
	},
	isValidString: function(string) {
		var length = string.length,
			i = 0;
		for (i; i < length; i++) {
			var lastChar = string[i];
			if ((PasswordVerification._validAlphabetic.indexOf(lastChar) === -1
					&& PasswordVerification._validAlphabetic.toLowerCase().indexOf(lastChar) === -1
					&& PasswordVerification._validNumeric.indexOf(lastChar) === -1
					&& PasswordVerification._validPunctuation.indexOf(lastChar) === -1)) {
				return false;
			}
		}
		return true;
	}
};
