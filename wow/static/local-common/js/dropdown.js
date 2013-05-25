/**
 * Turns specific elements into custom dropdown systems, to replace the default form select dropdown.
 *
 * @copyright   2010, Blizzard Entertainment, Inc
 * @class       Dropdown
 * @example
 *
 *      $('.ui-dropdown').dropdown();
 *
 *      <div class="ui-dropdown" id="dropdown-id">
 *          <select name="dropdown">
 *              <option value="1">Option 1</option>
 *              <option value="2">Option 2</option>
 *              <option value="3">Option 3</option>
 *          </select>
 *      </div>
 *
 */

(function($) {

    /**
     * Apply to all elements.
     *
     * @param object configuration
     * @constuctor
     * */
    $.fn.dropdown = function(configuration) {
		var config = this.extend({}, $.fn.dropdown.config, configuration);
        
		this.each(function() {
            var container = $(this),
				dropdown = container.find('select'),
				path = '#'+ container.attr('id') + ' .dropdown-wrapper',
				disabled = false;

            if (dropdown.attr('disabled') == 'disabled') {
                dropdown.parent().addClass('disabled');
                disabled = true;
            }
            
            $('<a/>', {
                href: '#',
                html: $('<span/>', {
                    text: $('select option:selected', container).html()
                }),
                click: function() {
                    if (!disabled) {
                        if ($(path).is(':hidden'))
                            Toggle.open(container, 'opened', path, 100);
                        else
                            Toggle.close(container, 'opened', path, 100);
                    }

                    return false;
                }
            }).addClass('dropdown-toggler').appendTo(container);

            // Build the list
            var div = $('<div/>').addClass('dropdown-wrapper').hide().appendTo(container),
				ul = $('<ul/>').appendTo(div);

            $.each(dropdown.find('option'), function(key, value) {
                var option = $(value),
					markup = {
						text: option.html(),
						href: '#'
					};

				if (config.trigger) {
                    markup.click = function() {
						if (config.closeOnClick) {
							Toggle.keepOpen = false;
							Toggle.close(container, 'opened', path, 50);
						}
						
						if (config.updateValue) {
							dropdown.val(option.val());
							dropdown.find('option:selected').removeAttr('selected');
							dropdown.find("option[value='"+ option.val() +"']").attr('selected', 'selected');
						}
						
						if (config.updateText)
							container.find('.dropdown-toggler span').html(option.html());

						if (Core.isCallback(config.callback))
							config.callback(container, option.val());

                        return false;
                    }
                }

                var li = $('<li/>').appendTo(ul);
                $('<a/>', markup).appendTo(li);
            });

            // Hide the select dropdown
            dropdown.hide();
        });
    }

    /**
	 * Default configuration.
	 */
	$.fn.dropdown.config = {
		trigger: true,
		callback: null,
		updateText: true,
		updateValue: true,
		closeOnClick: true
	};

})(jQuery);
