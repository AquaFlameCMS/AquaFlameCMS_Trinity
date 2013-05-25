$(document).ready(function() {
    RAF.sourceString = $("#customMessage").val();

    $(".claim-mount").live('click', function(){
        $(this).parents("form").submit();
    });
    
    if ($("#name").length != 0) { RAF.validateForm(); }

    $(".claim-mount").live('click', function(){
        $(this).parents("form").submit();
    });

    $("#customMessage").focus(
        function() {
            this.select();
        }
    );

    $("#customMessage").keyup(function(event) {
        RAF.validateForm(event);
    });

    $("#name").keyup(function(event) {
        RAF.validateForm(event);
    });

     $("#email").keyup(function(event) {
        RAF.validateForm(event);
    });

    $("#customMessage").change(function(event) {
        RAF.validateForm(event);
    });

    $("#name").change(function(event) {
        RAF.validateForm(event);
    });

     $("#email").change(function(event) {
        RAF.validateForm(event);
    });

    $('textarea[maxlength]').keyup(function(){
         var limit = parseInt($(this).attr('maxlength'));
         var text = $(this).val();
         var chars = text.length;

         if(chars > limit){
             var new_text = text.substr(0, limit);
             $(this).val(new_text);  
         }

        RAF.customMessageEdited = true;
     });

    $("#raf-form").submit(function() {

        if (RAF.sourceString == $("#customMessage").val()) {
            $("#customMessage").val("");
        }
    });

});

var RAF = {
    sourceString : null,
    customMessageEdited : false,
    showLegend : function() {
        $("#legend").show();
        $("#show-legend").hide();
        $("#hide-legend").show();
    },
    hideLegend : function() {
        $("#legend").hide();
        $("#show-legend").show();
        $("#hide-legend").hide();
    },
    validateForm : function() {
        if (($("#name").val().length > 0) && ($("#email").val().length > 0)) {
            $("#submit1").removeClass("disabled").removeAttr("disabled");
        } else {
            $("#submit1").addClass("disabled").attr("disabled", "disabled");
        }
    }
}
