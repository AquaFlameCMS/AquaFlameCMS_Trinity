 $(document).ready(function() {
        //move he last list item before the first item. The purpose of this is if the user clicks to slide left he will be able to see the last item.
        $('.carousel_ul li:first').before($('.carousel_ul li:last')); 
        
        
        //when user clicks the image for sliding right        
        $('.right_scroll img').click(function(){
        
            //get the width of the items ( i like making the jquery part dynamic, so if you change the width in the css you won't have o change it here too ) '
            var item_width = $('.carousel_ul li').outerWidth() + 32;
            
            //calculae the new left indent of the unordered list
            var left_indent = parseInt($('.carousel_ul').css('left')) - item_width;
            
            //make the sliding effect using jquery's anumate function '
            $('.carousel_ul:not(:animated)').animate({'left' : left_indent},600,function(){    
                
                //get the first list item and put it after the last list item (that's how the infinite effects is made) '
                $('.carousel_ul li:last').after($('.carousel_ul li:first')); 
                
                //and get the left indent to the default -210px
                $('.carousel_ul').css({'left' : '-210px'});
            }); 
        });
        
        //when user clicks the image for sliding left
        $('.left_scroll img').click(function(){
            
            var item_width = $('.carousel_ul li').outerWidth() + 32;
            
            /* same as for sliding right except that it's current left indent + the item width (for the sliding right it's - item_width) */
            var left_indent = parseInt($('.carousel_ul').css('left')) + item_width;
            
            $('.carousel_ul:not(:animated)').animate({'left' : left_indent},500,function(){    
            
            /* when sliding to left we are moving the last item before the first list item */            
            $('.carousel_ul li:first').before($('.carousel_ul li:last')); 
            
            /* and again, when we make that change we are setting the left indent of our unordered list to the default -210px */
            $('.carousel_ul').css({'left' : '-210px'});
            });
            
            
        });

//-----------------------------------------------------------------------------------------------------------------------------------------------------------------


//move he last list item before the first item. The purpose of this is if the user clicks to slide left he will be able to see the last item.
        $('.carousel_ul2 li:first').before($('.carousel_ul2 li:last')); 
        
        
        //when user clicks the image for sliding right        
        $('.right_scroll2 img').click(function(){
        
            //get the width of the items ( i like making the jquery part dynamic, so if you change the width in the css you won't have o change it here too ) '
            var item_width = $('.carousel_ul2 li').outerWidth() + 32;
            
            //calculae the new left indent of the unordered list
            var left_indent = parseInt($('.carousel_ul2').css('left')) - item_width;
            
            //make the sliding effect using jquery's anumate function '
            $('.carousel_ul2:not(:animated)').animate({'left' : left_indent},600,function(){    
                
                //get the first list item and put it after the last list item (that's how the infinite effects is made) '
                $('.carousel_ul2 li:last').after($('.carousel_ul2 li:first')); 
                
                //and get the left indent to the default -210px
                $('.carousel_ul2').css({'left' : '-210px'});
            }); 
        });
        
        //when user clicks the image for sliding left
        $('.left_scroll2 img').click(function(){
            
            var item_width = $('.carousel_ul2 li').outerWidth() + 32;
            
            /* same as for sliding right except that it's current left indent + the item width (for the sliding right it's - item_width) */
            var left_indent = parseInt($('.carousel_ul2').css('left')) + item_width;
            
            $('.carousel_ul2:not(:animated)').animate({'left' : left_indent},500,function(){    
            
            /* when sliding to left we are moving the last item before the first list item */            
            $('.carousel_ul2 li:first').before($('.carousel_ul2 li:last')); 
            
            /* and again, when we make that change we are setting the left indent of our unordered list to the default -210px */
            $('.carousel_ul2').css({'left' : '-210px'});
            });
            
            
        });
		

//------------------------------------------------------------------------------------------------------------------------------------------------------------
		
		
		
		
		
		//When page loads...
	$(".tab_content").hide(); //Hide all content
	$("ul#tablist li:first").addClass("active").show(); //Activate first tab
	$(".tab_content:first").show(); //Show first tab content

	//On Click Event
	$("ul#tablist li").click(function() {

		$("ul#tablist li").removeClass("active"); //Remove any "active" class
		$(this).addClass("active"); //Add "active" class to selected tab
		$(".tab_content").hide(); //Hide all tab content

		var activeTab = $(this).find("a").attr("href"); //Find the href attribute value to identify the active tab + content
		$(activeTab).fadeIn('slow'); //Fade in the active ID content
		return false;
	});
  });