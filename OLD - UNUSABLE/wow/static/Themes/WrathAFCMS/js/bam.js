$(document).ready(function() {
    UI.initialize();
});

/**
 * Functionality for all custom UI elements and systems.
 *
 * @copyright   2010, Blizzard Entertainment, Inc.
 * @class       UI
 * @example
 *
 *      UI.initialize();
 *      UI.freezeButton($('#foobar'));
 *      UI.wakeButton($('#foobar'));
 *      UI.showNotes('a[rel="noteContainerID"]');
 *
 */

var UI = {
    
    buttons: {},
    
    notes: {},
    
    compactInputs: {},
    
    inlineInputs: {},

    parent: $('#content'),
    
    initialize: function(parent) {
        
        UI.parent = parent || $('#content');
        
        UI.buttons = $('.ui-button', UI.parent);
        UI.notes = $('.ui-note', UI.parent);
        UI.compactInputs = $('.label-compact', UI.parent).parent().children('input.input');
        UI.inlineInputs = $('input.inline-input');

        if (UI.buttons.length > 0) {
            UI._initializeButtons();
        }

        if (UI.notes.length > 0) {
            UI._initializeNotes();
        }

        if (UI.compactInputs.length > 0) {
            UI._initializeCompactInputs();
        }

        if (UI.inlineInputs.length > 0) {
            UI._initializeInlineInputs();
        }
    },

    _initializeInlineInputs: function() {
        var length = UI.inlineInputs.length;
        var i = 0;
        for (i; i < length; i++) {
            var input       = UI.inlineInputs[i];
            $(input).bind({
                'keypress': function(e) {
                    var val = this.value;
                    if (e.keyCode == 8) {
                        if (val.length === 0) {
                            var previous = $(this).prev('input.inline-input');
                            $(previous).focus();
                        }
                    }
                },
                'keydown': function(e) {
                    // IE does not recognize backspace with keypress in a blank input box
                    if (!jQuery.support.cssFloat) {
                        var val = this.value;
                        if (e.keyCode == 8) {
                            if (val.length === 0) {
                                var previous = $(this).prev('input.inline-input');
                                $(previous).focus();
                            }
                        }
                    }
                },
                'focus': function() {
                    // need this to place the cursor at the end of the value in IE6
                    this.value = this.value;
                },
                'keyup': function(e) {
                    /**
                      * 8:      Backspace
                      * 9:      Tab
                      * 16:     Shift
                      * 17:     Ctrl
                      * 18:     Alt
                      * 19:     Pause Break
                      * 20:     Caps Lock
                      * 27:     Esc
                      * 33:     Page Up
                      * 34:     Page Down
                      * 35:     End
                      * 36:     Home
                      * 37:     Left Arrow
                      * 38:     Up Arrow
                      * 39:     Right Arrow
                      * 40:     Down Arroww
                      * 45:     Insert
                      * 46:     Delete
                      * 144:    Num Lock
                      * 145:    Scroll Lock
                      */
                    var keys = [8, 9, 16, 17, 18, 19, 20, 27, 33, 34, 35, 36, 37, 38, 39, 40, 45, 46, 144, 145];
                    var string = keys.toString();
                    var maxlength   = parseInt($(this).attr('maxlength'), 10);
                    var val         = this.value;

                    if(string.indexOf(e.keyCode) == -1 && val.length === maxlength) {
                        $(this).next('input.inline-input').focus();
                    }
                }
            });
        }
    },

    _initializeCompactInputs: function() {
        var length = UI.compactInputs.length;
        var i = length - 1;
        if (i > 0) { do {
            var input = UI.compactInputs[i];
            var label =$.trim( $(input).parent().find('.label-compact strong').text());
            $(input).val(label).bind({
                'focus': function() {
                    if ($(this).val() === label) {
                        $(this).val('');
                    }
                },
                'blur': function() {
                    if ($(this).val() === '') {
                        $(this).val(label);
                    }
                }
            });
        } while (i--);}
    },

    _initializeNotes: function() {
        UI.notes.children('.note-toggler').bind({
            'click': function() {
                UI.showNotes(this);
                return false;
            }
        });
        UI.notes.children('.toggle-note').bind({
            'click': function() {
                return false;
            }
        });
        UI.notes.children('.toggle-note').children('.note').children('.close-note').bind({
            'click': function() {
                UI.hideNotes(this);
                return false;
            }
        });
        $(document).bind({
            'click': function() {
                UI.hideNotes();
            }
        });
    },

    hideNotes: function(note) {
        if (note === undefined) {
            $('.toggle-note').hide();
            $('.note-toggler').show();
        } else {
            var target = $(note).attr('rel');
            $(note).parent().parent('.toggle-note').hide();
            $('.note-toggler[rel="' + target + '"]').show();
        }
    },

    showNotes: function(note) {
        if (note === undefined) {
            $('.toggle-note').show();
            $('.note-toggler').hide();
        } else {
            var target = $(note).attr('rel');
            $(note).hide();
            $('#' + target).show();
        }
    },

    _initializeButtons: function() {
        UI.buttons.bind({
            'click': function(e) {
                var button = $(this);
                var onclick = button.attr('onclick');
                var form = button.parents('form');
                
                if ((this.tagName.toLowerCase() === 'button') && (onclick === '' || onclick === undefined || onclick === null) && (form.length > 0)) {
                    e.preventDefault();
                    e.stopPropagation();

                    UI.processButton(this);
                    form.submit();
                }
            },
            'mouseover': function() {
                $(this).addClass('hover');
            },
            'mouseout': function() {
                $(this).removeClass('hover');
            }
        });
    },

    freezeButton: function(target) {
        $(target).addClass('disabled');

        if ($(target)[0].tagName.toLowerCase() === 'button') {
            $(target).attr('disabled','disabled');
        }
    },

    wakeButton: function(target) {
        $(target).removeClass('disabled');

        if ($(target)[0].tagName.toLowerCase() === 'button') {
            $(target).removeAttr('disabled');
        }
    },

    processButton: function(target) {
        $(target).addClass('processing');

        if ($(target)[0].tagName.toLowerCase() === 'button') {
            $(target).attr('disabled','disabled');
        }
    },

    disableButton: function(target) {
        $(target).addClass('disabled');

        if ($(target)[0].tagName.toLowerCase() === 'button') {
            $(target).attr('disabled','disabled');
        }
    },

    enableButton: function(target) {
        $(target).removeClass('disabled').removeClass('processing');

        if ($(target)[0].tagName.toLowerCase() === 'button') {
            $(target).removeAttr('disabled');
        }
    }
};

/**
 * Open up the account menu dropdowns.
 */
function openAccountDropdown(node, id) {
    var target = $('#'+ id +'-menu');

    if (target.is(':visible')) {
        target.hide();
        return;
    } else {
        $('.flyout-menu').hide();
    }
    
    //target.css(opts);
    Toggle.open(node, '', '#'+ id +'-menu');
}


function openEbankOptions(node) {
    var target = $('#balance-options');
    if (target.is(':visible')) {
        target.hide();
        return;
    } else {
        $('#balance-options').hide();
    }
        
    Toggle.open(node, '', '#balance-options');
}

function ComboBox(inputText, inputSelect, toggleLink) {
    var self = this,
        inputText = $(inputText),
        inputSelect = $(inputSelect),
        inputOptions = inputSelect.find('option'),
        toggleLink = $(toggleLink),
        data = [],
        filteredData = [],
        timer = null;

    self.initialize = function() {
        if (!inputSelect.length || !inputText.length)
            return false;

        var i = 0,
            length = inputOptions.length;

        for (i; i < length; i++) {
            var thisOption = $(inputOptions[i]);
            data.push([thisOption.val(), thisOption.text(), _normalize(thisOption.text())])
        }

        toggleLink.bind({
            'click': function() {
                self.filterOptions('');
                self.showSelect();
                return false;
            }
        });

        inputSelect.bind({
            'keyup': function(e) {
                if (e.which === 13) {
                    inputSelect.trigger('click');
                    return false;
                }
            },
            'click': function() {
                self.selectOption();
                return false;
            }
        });

        inputText.attr('autocomplete', 'off');

        inputText.bind({
            'keyup': function(e) {
                clearTimeout(timer);
                timer = null;
                if (e.which === 40) {
                    inputSelect.selectedIndex = 0;
                    inputSelect.find('option')[0].selected = true;
                    inputSelect.focus();
                } else {
                    timer = setTimeout(function() {
                        self.filterOptions(e.target.value);
                    }, 250);
                }
            },
            'focus': function(e) {
                e.target.select();
            }
        });

    };

    self.hideSelect = function() {
        inputSelect.hide();
        toggleLink.show();
    };

    self.showSelect = function() {
        inputSelect.show();
        toggleLink.hide();
    };

    self.filterOptions = function(text) {
        var i = 0,
            length = inputOptions.length,
            input = '',
            test = '';

        filteredData = [];

        for (i; i < length; i++) {
            test = data[i][2];
            input = _normalize(text);
            if (test.lastIndexOf(input) >= 0)
                filteredData.push(data[i]);
        }

        _appendOptions();
    };

    self.selectOption = function() {
        inputSelect.hide();
        toggleLink.show();
        inputText.val($('#' + inputSelect.attr('id') + ' option:selected').text());
    };

    function _appendOptions() {
        var i = 0,
            length = filteredData.length,
            string = '';

        if (length === 1) {
            string = '<option value="' + filteredData[0][0] + '" selected="selected">' + filteredData[0][1] + '</option>';
            inputSelect.empty();
            inputSelect.html(string);
            self.selectOption();
            return;
        } else if (length > 0) {
            for (i; i < length; i++) {
                string = string + '<option value="' + filteredData[i][0] + '">' + filteredData[i][1] + '</option>';
            }
            self.showSelect();
        } else {
            length = data.length;
            for (i; i < length; i++) {
                string = string + '<option value="' + data[i][0] + '">' + data[i][1] + '</option>';
            }
            self.hideSelect();
        }

        inputSelect.empty();
        inputSelect.html(string);
        //Always keep inputSelect width the same with inputText to fix a width bug in IE7
        if (Core.getBrowser() == "ie7") {
            inputSelect.width(inputText.outerWidth());
        }
    }

    function _normalize(text) {
        text = text.toLowerCase();
        text = text.replace('é', 'e');
        text = text.replace('ü', 'u');
        text = text.replace(' - ', ' – ');
        text = text.replace(' – ', ' ');
        return text;
    }

    this.initialize();
}

/**
 * Reformats a date per the user's time zone and locale.
 *
 * @copyright   2010, Blizzard Entertainment, Inc.
 * @class       DateTime
 * @requires    Core
 * @example
 *
 *      var times = new DateTime('#content'); // will apply to all <time/> elements within <div id="content"/>
 */
var DateTime = Class.extend({

    /**
     * jQuery objects for specific elements.
     */
    times: null,

    /**
     * Localization settings.
     */
    format: '',
    locale: Core.locale,

    /**
     * Initialize the class and apply the config.
     */
    init: function(full) {

        full = typeof full === 'undefined';

        this.times = $('time');

        switch (this.locale) {
            default:
            case 'cs-cz':
            case 'de-de':
            case 'pl-pl':
                this.format = 'dd.MM.yyyy';
                if (full) {
                    this.format = this.format + ' HH:mm';
                }
                break;
            case 'en-us':
                this.format = 'MM/dd/yyyy';
                if (full) {
                    this.format = this.format + ' hh:mm a';
                }
                break;
            case 'en-gb':
            case 'es-es':
            case 'es-mx':
            case 'fr-fr':
            case 'pt-br':
            case 'it-it':
            case 'ru-ru':
                this.format = 'dd/MM/yyyy';
                if (full) {
                    this.format = this.format + ' HH:mm';
                }
                break;
            case 'en-sg':
                this.format = 'dd/MM/yyyy';
                if (full) {
                    this.format = this.format + ' hh:mm a';
                }
                break;
            case 'ja-ja':
                this.format = 'yyyy/MM/dd';
                if (full) {
                    this.format = this.format + ' HH:mm';
                }
                break;
            case 'ko-kr':
                this.format = 'yyyy.MM.dd';
                if (full) {
                    this.format = this.format + ' HH?mm?';
                }
                break;
            case 'zh-cn':
                this.format = 'yyyy?MM?dd?';
                if (full) {
                    this.format = this.format + ' HH:mm';
                }
                break;
            case 'zh-tw':
                this.format = 'yyyy-MM-dd';
                if (full) {
                    this.format = this.format + ' HH:mm';
                }
                break;
        }

        if (this.times.length) {
            this.localize();
        }

    },

    localize: function() {

        var times = this.times,
            format = this.format,
            locale = this.locale,
            datetime = null;

        for (var i = 0, len = times.length; i < len; i++) {
            time = $(times[i]);
            datetime = time.attr('datetime');
            datetime = Core.formatDatetime(format, datetime);
            if (!datetime) {
                return;
            }
            datetime = datetime.replace('/0', '/');
            if (datetime.substr(0, 1) === '0') {
                datetime = datetime.substr(1);
            }
            if (locale === 'en-us' || locale === 'en-sg') {
                datetime = datetime.replace(' 0', ' ');
            }

            if ($.browser.msie) {
                time.parent().html(datetime);
            } else {
                time.html(datetime);
            }
        }

    }

});
