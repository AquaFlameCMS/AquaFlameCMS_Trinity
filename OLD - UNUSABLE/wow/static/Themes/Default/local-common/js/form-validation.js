var FormValidation = {
    form: null,
    delay: null,
    timeout: 100,
    eventCache: null,
    initialized: false,
    totalFields: 0,
    totalValid: 0,
    validCssClass: "valid",
    invalidCssClass: "invalid",
    fields: null,
    referenceIds: {
        password: "password",
        passwordConfirm: "passwordConfirmation",
        emailAddress: "emailAddress",
        emailAddressConfirm: "emailAddressConfirmation",
        formErrorBox: "formValidation",
        formErrorList: "errorList",
        passwordMessageBox: "passwordValidation"
    },
    disabledPasteFields: ["password", "passwordConfirm", "emailAddress", "emailAddressConfirm"],
    elements: {
        formErrorBox: null,
        formErrorList: null,
        passwordErrorList: null,
        passwordMessageBox: null
    },
    reinitialize: function (formId, usePasswordValidation, newReferenceIds) {
    	FormValidation.fields = null;
    	FormValidation.initialize(formId, usePasswordValidation, newReferenceIds);

    },
    initialize: function(formId, usePasswordValidation, newReferenceIds) {
        //get form for context of faster searching
        FormValidation.form = document.getElementById(formId);

        // only initialize password validation if needed
        if (usePasswordValidation)
            FormValidation.passwordValidation.initialize();

        // optional new reference ids
        if (newReferenceIds) {
            for (var id in newReferenceIds) {
                FormValidation.referenceIds[id] = newReferenceIds[id];
            }
        }

        //get dom objects for relevent elements
        for (var element in FormElements) {
            var domObject = document.getElementById(FormValidation.referenceIds[element]);
            if (domObject) {
                FormElements[element] = domObject;
            }
        }

        //collect fields requiring validation
        FormValidation.fields = new Object();
    	  FormValidation.totalFields = 0;

        $("input.validate", FormValidation.form).not(":hidden").each( function() {
            var field = this;

            FormValidation.fields[field.id] = {
                element: field,
                parentRow: document.getElementById(field.id + "Row"),
                classes: field.className.split(" "),
                valid: false,
                hasTyped: false,
                required: (field.className.indexOf("required") > -1)
            };

            FormValidation.totalFields++;
        });
        
        //special case for the age selects
        $("select#dobDay, select#dobMonth, select#dobYear", FormValidation.form).not(":hidden").each( function() {
            var field = this;

            FormValidation.fields[field.id] = {
                element: field,
                parentRow: document.getElementById("ageRow"),
                classes: field.className.split(" "),
                valid: false,
                hasTyped: false,
                required: (field.className.indexOf("required") > -1)
            };

            FormValidation.totalFields++;
        });

        // disable copy+paste on certain elements
        FormValidation._disableCopyPaste(FormValidation.disabledPasteFields);

        // initialization complete!
        FormValidation.initialized = true;
    },
    validateForm: function(formChild) {
        //reset number of valid fields
        FormValidation.totalValid = 0;

        // loop through all fields requiring validation
        for (var field in FormValidation.fields) {
            FormValidation.fields[field].hasTyped = true;
            FormValidation._validateField(FormValidation.fields[field].element);

            // change errors to onkeyup so that if required fields are missed they
            // will go away
            FormValidation.fields[field].element.onkeyup = function(event) {
                FormValidation.validateField(this, event);
            }

            if (FormValidation.fields[field].valid)
                FormValidation.totalValid++;
        }

        //if no errors, then submit!
        if (FormValidation.totalValid == FormValidation.totalFields && (PasswordValidation.totalValid == PasswordValidation.MIN_VALIDATORS_PASSED)) {
            return true;
        } else {
            return false;
        }

    },
    validateField: function(element, callingEvent) {
        //ignore certain keystrokes
        if (FormValidation._checkKeyCode(callingEvent))
            return false;

        if (!FormValidation.initialized)
            FormValidation.initialize();

        if (FormValidation.delay != null)
            clearTimeout(FormValidation.delay);

		FormValidation.eventCache = callingEvent;

        // delay for keyup events so validation doesnt lag
        if (FormValidation.eventCache && FormValidation.eventCache.type == "keyup" && !$.browser.msie) {
            FormValidation.delay = setTimeout( function() {
                FormValidation._validateField(element, FormValidation.eventCache);
            }, FormValidation.timeout);
        } else {
            FormValidation._validateField(element, FormValidation.eventCache);
        }
    },
    passwordValidation: {
        //see below
    },
    validators: {
        //for fields that need to be filled out before the form is submitted
        required: {
            validate: function(element) {

                var elementProperties = FormValidation.fields[element.id];

                // checkboxes or radio buttons just need 1 checked
                if ($(element).is(":checkbox") || $(element).is(":radio")) {
                    var elements = document.getElementsByName(element.name);

                    for (var x = 0; x < elements.length; x++) {
                        if (elements[x].checked) {
                            elementProperties.valid = true;
                            FormErrors.updateFieldDisplay(elementProperties, Validators.required.errorProperties);
                            return;
                        }
                    }

                    elementProperties.valid = false;
                    FormErrors.updateFieldDisplay(elementProperties, Validators.required.errorProperties);
                    return;

                } else if ($(element).is("select")) {
                    elementProperties.valid = (element.selectedIndex > 0);
                    elementProperties.hasTyped = true;
                    FormErrors.updateFieldDisplay(elementProperties, Validators.required.errorProperties);
                } else {
                    elementProperties.valid = ($.trim(element.value) != "");
                    FormErrors.updateFieldDisplay(elementProperties, Validators.required.errorProperties);
                }
            },
            errorProperties: {
                id: "error.field.requiredFields",
                text: "",
                fromServer: false
            }
        },
        //validator making sure email fields match
        emailMatch: {
            validate: function(element) {
                var emailProperties = FormValidation.fields[FormValidation.referenceIds.emailAddress];
                var emailConfirmProperties = FormValidation.fields[FormValidation.referenceIds.emailAddressConfirm];

                var emailValue = $.trim(emailProperties.element.value);
                var emailConfirmValue = $.trim(emailConfirmProperties.element.value);

                if (emailValue == "" && emailConfirmValue == "")
                    return;

                emailConfirmProperties.valid = (emailConfirmValue == emailValue && emailValue != "");

                // if emails don't match, invalidate the CONFIRM email field
                FormErrors.updateFieldDisplay(emailConfirmProperties, Validators.emailMatch.errorProperties);
            },
            errorProperties: {
                id: "error.emailConfirm.mismatch",
                text: "",
                fromServer: false
            }
        },
        //use password validation
        password: {
            validate: function(element, callingEvent) {
                PasswordValidation.validate(callingEvent);
            },
            errorProperties: {
                id: "error.password.invalid",
                text: "",
                fromServer: false
            }
        },
        //captcha validator
        captcha: {
            validate: function(element) {
                var elementProperties = FormValidation.fields[element.id];
                elementProperties.valid = ($.trim(element.value) != "");
                FormErrors.updateFieldDisplay(elementProperties, Validators.captcha.errorProperties);
            },
            errorProperties: {
                id: "error.captcha.failed",
                text: "",
                fromServer: true
            }
        },
        //server says email is in use, make sure they enter in a different email
        emailUnavailable: {
            validate: function(element) {
                if (FormValidation.originalEmailValue) {
                    var elementProperties = FormValidation.fields[element.id];
                    elementProperties.valid = ($.trim(element.value) != $.trim(FormValidation.originalEmailValue));
                    FormErrors.updateFieldDisplay(elementProperties, Validators.emailUnavailable.errorProperties, FormValidation.validators.emailInvalid.errorProperties.id);
                }
            },
            errorProperties: {
                id: "error.email.unavailable.trialSignup",
                text: "",
                fromServer: true
            }
        },
        //server says email is invalid, make sure they enter in a different email
        emailInvalid: {
            //same functionality as "emailUnavailable.validate", but different error message
            validate: function(element) {
                if (FormValidation.originalEmailValue) {
                    var elementProperties = FormValidation.fields[element.id];
                    elementProperties.valid = ($.trim(element.value) != $.trim(FormValidation.originalEmailValue));
                    FormErrors.updateFieldDisplay(elementProperties, Validators.emailInvalid.errorProperties, FormValidation.validators.emailUnavailable.errorProperties.id);
                }
            },
            errorProperties: {
                id: "error.email.invalid",
                text: "",
                fromServer: true
            }
        },
        //fields that cannot be pasted
        cannotPaste: {
            validate: function(element) {
                //n/a
            },
            errorProperties: {
                id: "error.field.cannotPaste",
                text: "",
                fromServer: false
            }
        },
        //validator for CN NID
        nidInvalid: {
            validate: function(element) {
                if (element.value == "")
                    return;
				var elementProperties = FormValidation.fields[element.id];
				if(element.value != "" ) {
					elementProperties.hasTyped = true;
        }
				elementProperties.valid = new NID(element.value).isValid();
				FormErrors.updateFieldDisplay(elementProperties, Validators.nidInvalid.errorProperties, FormValidation.validators.nidInvalid.errorProperties.id);
    },
            errorProperties: {
                id: "error.nid.invalid",
                text: "",
                fromServer: false
            }
		},
        //validator for CN phone
        phone: {
            validate: function(element) {
                if (element.value == "")
                    return;
				var elementProperties = FormValidation.fields[element.id];
				var stippedPhoneNumber = element.value.split("-").join("");
				var isValid = true;
				var isNumReg = /^[0-9]*$/;
				if (!isNumReg.test(stippedPhoneNumber)) {
					isValid = false;
				} else {
					switch(stippedPhoneNumber.length) {
						case 10:
							isValid = true;
							break;
						case 11:
							isValid = ( ( stippedPhoneNumber.charAt(0) == "1" && ( stippedPhoneNumber.charAt(1) == '3' || stippedPhoneNumber.charAt(1) == '5' || stippedPhoneNumber.charAt(1) == '8' ) ) || (stippedPhoneNumber.charAt(0) != '1' || (stippedPhoneNumber.charAt(0) == '1' && stippedPhoneNumber.charAt(1) == '0')) );
							break;
						case 12:
							isValid = true;
							break;
						case 14:
							isValid = ( stippedPhoneNumber.charAt(3) == "1" );
							break;
						case 15:
							isValid = ( stippedPhoneNumber.charAt(4) == "1" );
							break;
						default:
							isValid = false;
					}
				}
				elementProperties.valid = isValid;
				FormErrors.updateFieldDisplay(elementProperties, Validators.phone.errorProperties, FormValidation.validators.phone.errorProperties.id);
			},
            errorProperties: {
                id: "error.phone.invalid",
                text: "",
                fromServer: false
            }
		}
    },
    errors: {
        updateFieldDisplay: function(elementProperties, errorProperties, mutuallyExclusiveId) {
            //add relevent classes to element's parent row and handle error messaging
            if (elementProperties.valid) {
                FormValidation.errors._valid(elementProperties);

                if (errorProperties)
                    FormValidation.errorMessages.removeErrorMessage(errorProperties);
            } else {
                //only show errors if that field has been typed in
                if (elementProperties.hasTyped) {
                    FormValidation.errors._invalid(elementProperties);

                    //some errors we don't want showing at the same time, don't add them if they already exist
                    if (mutuallyExclusiveId) {
                        if (errorProperties && !document.getElementById(mutuallyExclusiveId))
                            FormValidation.errorMessages.addErrorMessage(errorProperties);
                    } else {
                        if (errorProperties)
                            FormValidation.errorMessages.addErrorMessage(errorProperties);
                    }
                } else {
                    FormValidation.errors._clear(elementProperties);
                }
            }
        },
        //set parent row as valid
        _valid: function(elementProperties) {
            //special case for date of birth
            if (elementProperties.parentRow == document.getElementById("ageRow")) {
				
                $(elementProperties.element).removeClass(FormValidation.validCssClass + " " + FormValidation.invalidCssClass);

                if (FormValidation.fields["dobMonth"].valid && FormValidation.fields["dobDay"].valid && FormValidation.fields["dobYear"].valid) {
                    FormValidation.errors._clear(elementProperties);
                    $(elementProperties.parentRow).addClass(FormValidation.validCssClass);
                    $(elementProperties.element).addClass(FormValidation.validCssClass);
                }

            } else {
                FormValidation.errors._clear(elementProperties);
                $(elementProperties.parentRow).addClass(FormValidation.validCssClass);
                $(elementProperties.element).addClass(FormValidation.validCssClass);
            }
        },
        //set parent row as invalid
        _invalid: function(elementProperties) {
            FormValidation.errors._clear(elementProperties);
            $(elementProperties.parentRow).addClass(FormValidation.invalidCssClass);
            $(elementProperties.element).addClass(FormValidation.invalidCssClass);
        },
        //clear invalid and/or valid css class
        _clear: function(elementProperties) {
            $(elementProperties.parentRow).removeClass(FormValidation.validCssClass + " " + FormValidation.invalidCssClass);
            $(elementProperties.element).removeClass(FormValidation.validCssClass + " " + FormValidation.invalidCssClass);
        }
    },
    errorMessages: {
        show: function() {
            FormElements.formErrorBox.style.display = "";
        },
        hide: function() {
            FormElements.formErrorBox.style.display = "none";
        },
        //add error message to message box if applicable
        addErrorMessage: function(errorProperties) {
            if (!errorProperties)
                return;

            // if error doesnt exist yet AND it doesn't come from the server
            if (!document.getElementById(errorProperties.id)) {
                var listItem = document.createElement("li");
                listItem.id = errorProperties.id;
                listItem.innerHTML = errorProperties.text;

                FormElements.formErrorList.appendChild(listItem);
            }

            FormValidation.errorMessages.show();
        },
        //removes error message from box and hides box if no errors left
        removeErrorMessage: function(errorProperties) {
            // do nothing if error is on page
            if (!errorProperties || !document.getElementById(errorProperties.id)) {
                return;
            }

            // only look at required rows that are invalid
            // (don't show error message if they haven't typed there yet)
            var canRemoveRequired = ($("tr.invalid input.required, tr.invalid input.captcha").length == 0);
			if(FormValidation.fields["dobMonth"]) {
				if (!FormValidation.fields["dobMonth"].valid || !FormValidation.fields["dobDay"].valid || !FormValidation.fields["dobYear"].valid) {
					canRemoveRequired = false;
				}
			}
			
            var listItem = document.getElementById(errorProperties.id);
            var listChildren = $("li", FormElements.formErrorList);
            var numChildren = listChildren.length;

            for (var i = 0; i < listChildren.length; i++) {
                if (listChildren[i] == listItem) {
                    if (!((listChildren[i].id == Validators.required.errorProperties.id) && !canRemoveRequired)) {
                        FormElements.formErrorList.removeChild(listItem);
                        numChildren--;
                    }
                }
            }

            //hide error message box if no more errors exist
            if (numChildren == 0)
                FormValidation.errorMessages.hide();
            else
                FormValidation.errorMessages.show();
        
			
		}
    },
    //private functions
    _validateField: function(element, callingEvent) {
        var fieldProperties = FormValidation.fields[element.id];

        // store if that field has a value
        if (element.value != "") {
            fieldProperties.hasTyped = true;
        }

        //loop through classes to look for validators
        $(fieldProperties.classes).each( function() {
            var format = Validators[this];
			
            if (format)
                format.validate(element, callingEvent);
        });

        // if the field was invalid and it was a blur event,
        // change validation to onkeyup so it validates while you type
        if (callingEvent && callingEvent.type == "blur" && !fieldProperties.valid) {
            element.onkeyup = function(callingEvent) {
                FormValidation.validateField(element, callingEvent);
            }
        }

    },
    //disable ctrl+v and context menu on fields
    _disableCopyPaste: function(fields) {

        var disableCopyPaste = function(callingEvent) {
            var currentEvent = (window.event) ? window.event : callingEvent;
            var target = (window.event) ? currentEvent.srcElement : currentEvent.target;

            if (currentEvent.type == "keydown") {
                var keyNum = (window.event) ? currentEvent.keyCode : currentEvent.which;

                if (keyNum == 86 && (currentEvent.ctrlKey && !currentEvent.altKey)) {
                    target.value = "";

                    FormValidation.errorMessages.addErrorMessage(FormValidation.validators.cannotPaste.errorProperties);
                    return false;
                } else {
                    FormValidation.errorMessages.removeErrorMessage(FormValidation.validators.cannotPaste.errorProperties);
                }
            } else if (currentEvent.type == "contextmenu") {
                return false;
            }
        }

        //loop through fields requiring copy/paste disable and add events
        for (var field in fields) {

            var currentElement = FormValidation.fields[FormValidation.referenceIds[fields[field]]].element;
            if (currentElement) {
                currentElement.onkeydown = disableCopyPaste;
                currentElement.oncontextmenu = disableCopyPaste;
            }
        }
    },
    //ignore tab and shift and control and windows key
    _checkKeyCode: function(callingEvent) {
        var keyCode = (window.event) ? window.event.keyCode : callingEvent.keyCode;
        return (keyCode == 9 || keyCode == 16 || keyCode == 17 || keyCode == 93);
    }
};

/*******************************************************************************
 * Password Validation
 ******************************************************************************/
FormValidation.passwordValidation = {
    MIN_PASSWORD_LENGTH: 8,
    MAX_PASSWORD_LENGTH: 16,
    MIN_VALIDATORS_PASSED: 6,
    MAX_SIMILARITY_LENGTH: 4,
    blurOnce: false,
    initialize: function() {
        //store dom elements
        for (var validator in FormValidation.passwordValidation.validators) {
            var currentValidator = PasswordValidation.validators[validator];
            currentValidator.element = document.getElementById(currentValidator.id);
        }
    },
    /** valid passwords */
    validate: function(callingEvent) {

        var passwordRef = FormValidation.fields[FormValidation.referenceIds.password];
        var passwordConfirmRef = FormValidation.fields[FormValidation.referenceIds.passwordConfirm];

        var password = passwordRef.element.value;

        if (password == "" && !passwordRef.hasTyped)
            return;

        // if user has already typed in password field but then erased, show error
        if (passwordRef.hasTyped && password == "") {
            passwordRef.valid = false;
            FormValidation.errors.updateFieldDisplay(passwordRef);
            return;
        }

        PasswordValidation.totalValid = 0;

        //run and tally validators
        for (var validator in FormValidation.passwordValidation.validators) {
            var currentValidator = FormValidation.passwordValidation.validators[validator];
            currentValidator.validate(password, currentValidator)
            PasswordValidation.setValidClasses(currentValidator.element, currentValidator.valid);

            if (currentValidator.valid)
                PasswordValidation.totalValid++;
        }

        //if the missing validation is 'password matching', then show first password as valid
        if (PasswordValidation.totalValid + 1 == PasswordValidation.MIN_VALIDATORS_PASSED && !PasswordValidation.validators.matchValidator.valid) {
            FormValidation.errors._clear(passwordRef);
            FormValidation.errors._clear(passwordConfirmRef);
            FormElements.passwordMessageBox.style.display = "";
        } else {
            //check if minimum number of validation has been password
            if (PasswordValidation.totalValid >= PasswordValidation.MIN_VALIDATORS_PASSED) {

                FormValidation.errors.updateFieldDisplay(passwordRef);
                FormValidation.errors.updateFieldDisplay(passwordConfirmRef);
                FormElements.passwordMessageBox.style.display = "none";

            } else {
                PasswordValidation.setValidClasses(passwordRef.parentRow, false);
                PasswordValidation.setValidClasses(passwordConfirmRef.parentRow, false);

                FormElements.passwordMessageBox.style.display = "";
            }
        }

        //clear error for keyup if they havent moved away from the field
        if (callingEvent) {
            if (callingEvent.type == "keyup" && !PasswordValidation.blurOnce) {
                FormValidation.errors._clear(passwordRef);
            } else if (callingEvent.type == "blur") {
                PasswordValidation.blurOnce = true;
            }
        }

        //if havent typed in password confirmation field, dont show an error
        if (passwordConfirmRef.element.value == "" && !passwordConfirmRef.hasTyped)
            FormValidation.errors._clear(passwordConfirmRef);
    },
    validateField: function(callingEvent) {
        if (FormValidation.delay > 0)
            clearTimeout(FormValidation.delay);

        // delay for keyup events so validation doesnt lag
        if (callingEvent.type == "keyup") {
            if ($.browser.msie) {
                PasswordValidation.validate(callingEvent);
            } else {
                setTimeout(function(callingEvent) {
                    PasswordValidation.validate(callingEvent);
                }, FormValidation.delay);
            }
        }
    },
    //set the class of passed element to valid or invalid
    setValidClasses: function(element, valid) {
        if (valid)
            element.className = FormValidation.validCssClass;
        else
            element.className = FormValidation.invalidCssClass;
    },
    //private methods
    _hasRequiredLength: function(string, validator) {
        var stringLength = string.length;
        validator.valid = ((stringLength >= PasswordValidation.MIN_PASSWORD_LENGTH) && (stringLength <= PasswordValidation.MAX_PASSWORD_LENGTH));
    },
    _hasRequiredCharacters: function(string, validator) {
        validator.valid = (/^[a-zA-Z0-9!\"#$%]*$/.test(string) && /[a-zA-Z]/.test(string));
    },
    _hasNumber: function(string, validator) {
        validator.valid = /\d/.test(string);
    },
    _hasCharacter: function(string, validator) {
        validator.valid = /[a-zA-Z]/.test(string);
    },
    _doPasswordsMatch: function(string, validator) {
        validator.valid = ((string != "") && (string == FormValidation.fields[FormValidation.referenceIds.passwordConfirm].element.value));
    },
    _isSimilar: function(password, validator) {
        if (password == null) {
            validator.valid = false;
            return;
        }
        //get the name of the account
        var accountName = FormValidation.fields[FormValidation.referenceIds.emailAddress].element.value;

        // treat blank account name differently
        if (accountName == "") {
            validator.valid = (password != "");
            return;
        }

        if (accountName.indexOf("@") != -1) {
            accountName = accountName.substring(0, accountName.indexOf("@"));
        }

        //if the password length is below the max similarity length, just
        // look for the password inside so the front-end validation looks consistent
        if (accountName.length - PasswordValidation.MAX_SIMILARITY_LENGTH < 0) {
            if (password.indexOf(accountName) != -1) {
                validator.valid = false;
                return;
            }
        } else {
            for (var i = 0; i <= accountName.length - PasswordValidation.MAX_SIMILARITY_LENGTH; i++) {
                if (password.indexOf(accountName.substring(i, i + PasswordValidation.MAX_SIMILARITY_LENGTH)) != -1) {
                    validator.valid = false;
                    return;
                }
            }
        }

        validator.valid = true;
    }
};

/*******************************************************************************
 * variable references for brevity's sake
 ******************************************************************************/
var Validators = FormValidation.validators;
var FormElements = FormValidation.elements;
var FormErrors = FormValidation.errors;
var PasswordValidation = FormValidation.passwordValidation;

/*******************************************************************************
 * Password Validators (do not change)
 ******************************************************************************/
FormValidation.passwordValidation.validators = {
    lengthValidator: {
        id: "passwordLength",
        element: null,
        validate: PasswordValidation._hasRequiredLength,
        valid: false
    },
    charactersValidator: {
        id: "passwordCharacters",
        element: null,
        validate: PasswordValidation._hasRequiredCharacters,
        valid: false
    },
    alphabeticValidator: {
        id: "passwordCharacter",
        element: null,
        validate: PasswordValidation._hasCharacter,
        valid: false
    },
    numberValidator: {
        id: "passwordNumber",
        element: null,
        validate: PasswordValidation._hasNumber,
        valid: false
    },
    similarityValidator: {
        id: "passwordSimilarity",
        element: null,
        validate: PasswordValidation._isSimilar,
        valid: false
    },
    matchValidator: {
        id: "passwordsMatch",
        element: null,
        validate: PasswordValidation._doPasswordsMatch,
        valid: false
    }
};
