/**
 * Functionality for patchnotes page interactions
 */
var PatchNotes = {

    /**
     * Initializes the patchnotes javascript, including binding events and 
     * generating dynamic parts of the page
     *
     * @method init
     */
    init: function() {
        PatchNotes.createTOC();
    },

    /**
     * Creates a table of contents list based on the content
     *
     * @method init
     */
    createTOC: function() {
        var $toc = $('.table-of-contents'),
            $sections = $('.patch-contents h3');

        if(!$toc.length) {
            return;
        }

        if(!$sections.length) {
            return $toc.hide();
        }

        $sections.each(function() {
            var $h3 = $(this),
                text = $h3.clone()    //clone the element
                            .children() //select all the children
                            .remove()   //remove all the children
                            .end()      //again go back to selected element
                            .text()     //get the text of element
                            .trim(),    //trim whitespace
                hash = $h3.attr('id') || $h3.parent().parent().attr('name'); //parent.parent is feature-block for backwards compat

            $toc.append(
                $(
                    //create an anchor element
                    '<a/>',
                    //with these properties
                    {
                        href: '#' + hash,
                        'class': 'toc-link',
                        text: text
                    }
                )
            );
        });
    }
};