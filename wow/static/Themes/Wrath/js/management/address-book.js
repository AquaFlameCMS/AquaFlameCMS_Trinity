var AddressBook = {
    changeCountry: function(staticCountryId, listId, self) {
        var $listElement = $('select[id=' + listId + ']');
        
        $("#" + staticCountryId).hide();
        $listElement.show();
        $("#cancel-edit").show();

        //disable all inputs that is not the country
        var formContext = $(self).closest(".form-row").parent();
        var countryRow = $listElement.parent();
        var formRows = $(".form-row:has(input), .form-row:has(select)", formContext).not(countryRow);

        //fade out all form elements
        formRows.not(countryRow).fadeTo(100, .3);

        //disable all elements after country
        formRows.find("input, select").attr("disabled", "disabled");
    },
    cancelChangeCountry: function(staticCountryId, listId, self) {
        var $listElement = $('select[id=' + listId + ']');
        
        $("#" + staticCountryId).show();
        $listElement.hide();
        $("#cancel-edit").hide();

        //disable all inputs that is not the country
        var formContext = $(self).closest(".form-row").parent();
        var countryRow = $listElement.parent();
        var formRows = $(".form-row:has(input), .form-row:has(select)", formContext).not(countryRow);

        //un-fade out all form elements
        formRows.fadeTo(100, 1);

        //disable all elements after country
        formRows.find("input, select").removeAttr("disabled");

    },
    refreshCountry: function(node) {
        $(node).parents("form")[0].submit();
    },
    handleCountryChange: function(element) {
		var value = encodeURIComponent(element.value),
			newCountry = document.getElementById('newCountry'),
			hasChanged = document.getElementById('hasCountryChanged');
		
        if (value !== newCountry.value) {
        	newCountry.value = value;
            hasChanged.value = '1';

            $(element).parents('form')[0].submit();
        }
    },
    setPrimary: function(id) {
        $.ajax({
            url: 'set-shipping-address.html',
            data: { id: id },
            type: 'POST',
            success: function() {
                window.location.reload();
            }
        });
        return false;
    },
    deleteAddress: function(id) {
        $.ajax({
            url: 'delete-address.html',
            data: { id: id },
            type: 'POST',
            success: function() {
				$("#address-"+ id).fadeOut();
            }
        });
        return false;
    }
};