var WowLanding = {
    video: {
        element:     null,
        id:          "flashVideo",
        focus:       false,
        promoStartupVideo:   null,
        lightBoxContainer:	"flashContainer",
        videoCover: {
            id: "videoCover",
            element: null
        },
        initialized: false,
        originalContent: null,
        initialize: function() {
            WowLanding.video.element = document.getElementById(WowLanding.video.id);
            WowLanding.video.originalContent = WowLanding.video.element.innerHTML;
            WowLanding.video.videoCover.element = document.getElementById(WowLanding.video.videoCover.id);
			WowLanding.video.lightboxContainer = document.getElementById(WowLanding.video.lightBoxContainer);
            WowLanding.video.initialized = true;
        },
        create: function(locale, filename) {
            if (!WowLanding.video.initialized)
                WowLanding.video.initialize();
            
   			if(WowLanding.video.promoStartupVideo) WowLanding.video.processPreviewContainer(locale);
   			
   			var flashFilename = "wow-cinematic-",
   				playerSplash = "wow-cinematic",
   				hostingDir = "games/wow/cinematic",
   				playerParams = "&skincolor=0f1621:30CFF7:084b68&rating=&autoplay=true&agegatereq=false",
   				playerHeight = "390";
   				
				if (WowLanding.video.promoStartupVideo) {
					flashFilename = filename || WowLanding.video.promoStartupVideo + '-',
					playerSplash = "mistert",
					hostingDir = "games/wow/promotions",
					playerHeight = "510";
				}
                
            flashFilename += locale;

            swfobject.embedSWF("http://us.media.blizzard.com/blizzard/movies/player/video_loader2.swf",
				"flashVideo", "848", playerHeight, "9", null, { "vidArr": flashFilename + ":" + playerSplash + ":" + hostingDir + "" + playerParams }, 
				{ "allowFullScreen" : true, "bgcolor" : "000000", "base" : "http://us.media.blizzard.com/blizzard/movies/player/", "allowScriptAccess" : "always", "wmode" : "transparent" }
			);
			
        },
        show: function(locale) {
            
            if (!WowLanding.video.initialized)
                WowLanding.video.initialize();

            /*Adjust height, width of overlay TODO: needs IE fixing*/
            var videoCoverParent = $(WowLanding.video.videoCover.element).parent();
            
            /*$(WowLanding.video.videoCover.element)
            	.height(videoCoverParent.height())
            	.width(videoCoverParent.width())
            	.show()*/
            
            //make video but show cover so it can fade out		
            $(WowLanding.video.videoCover.element).show();
            $("#closeVideo").hide();
            WowLanding.video.create(locale);
            $(WowLanding.video.lightboxContainer).show();
				
            WowLanding.video.centerVideoContainer();
            
            if(Core.isIE(6)) {
                WowLanding.fixSelectElements("hide");
                WowLanding.blackout.show(false);
            } else WowLanding.blackout.show(true);

            setTimeout("$(WowLanding.video.videoCover.element).fadeOut(200);", 400);
            setTimeout("$(WowLanding.video.element).show(); $('#closeVideo').show();", 500)

        },
        hide: function() {
            if (!WowLanding.video.initialized)
                WowLanding.video.initialize();

            //remove children
            var videoChildren = WowLanding.video.element.childNodes;
            for (var i = 0; i < videoChildren.length; i++) {
                WowLanding.video.element.removeChild(videoChildren[i]);
            }
		
        	WowLanding.fixSelectElements("show"); // IE6 stacking bug with selects
                
            $(WowLanding.video.lightboxContainer).hide();
            //append empty div
            $(WowLanding.video.element).html(WowLanding.video.originalContent);
        }, 
        processPreviewContainer: function(locale) {
        	var listElements = $("#previewContainer li"), 
				comingSoonClass = "cover-comingsoon",
				previewOverClass = "preview-over";
		
				$(listElements).hover(
					function () {
						var $listElement = $(this),
							$cover = $listElement.find(".cover");
				
						$listElement.addClass(previewOverClass);
						
						if($cover.text().length > 2 && !$listElement.hasClass(comingSoonClass)) 
							$cover.addClass(comingSoonClass);
				
						if($.browser.msie) { $cover.show() } else { $cover.show().stop().animate({ opacity: 1 }, 250); }
					}, 
					function () {
						var $listElement = $(this),
							$cover = $listElement.find(".cover");
				
						$listElement.removeClass(previewOverClass);
				
						if($.browser.msie) { $cover.hide()	} else {	$cover.stop().animate({ opacity: 0 }); }
					}
				)
				.unbind("click")
				.click(function() {
					var $listElement = $(this),
						listIndex = parseInt(listElements.index(this) + 1);
						
					if(!$listElement.hasClass("preview-inactive")) { 
						listElements.removeClass("preview-active");
						$listElement.addClass("preview-active"); 
						WowLanding.video.create(locale, $listElement.attr("fileName") + "-"); //expecting filename mistert_1; 
					}
				})
        },
	  centerVideoContainer: function () {
			var scroll = WowLanding.video._getScrollPosition(),
				topValue = ((($(window).height() - $(WowLanding.video.lightboxContainer).height()) / 2) + scroll.scrollTop) - 20, //jQuery bug need to remove padding-top
				leftValue = Math.round(($(window).width() - $(WowLanding.video.lightboxContainer).width()) / 2);
				$(WowLanding.video.lightboxContainer).css({
					top: topValue,
					left: leftValue
				})
		},
		_getScrollPosition: function (){
			scrollTop = $(window).scrollTop() ,
			scrollLeft = $(window).scrollLeft() ;
			return {scrollTop: scrollTop, scrollLeft: scrollLeft};
		}
		
    },
    fixSelectElements: function (state) {
    	if(Core.isIE(6))
			$("#ageRow select").css("visibility", (state == 'hide') ? "hidden" : "visible");
	},
    blackout: {
        initialized: false,
        element: null,
        initialize: function() {
            WowLanding.blackout.element = document.getElementById("blackout");
            WowLanding.blackout.element.style.height = $(document).height();
            WowLanding.blackout.initialized = true;
        },
        show: function(useFade) {
            if (!WowLanding.blackout.initialized)
                WowLanding.blackout.initialize();

            if (useFade)
                $(WowLanding.blackout.element).fadeIn(500);
            else
                $(WowLanding.blackout.element).show();
        },
        hide: function() {
            if (!WowLanding.blackout.initialized)
                WowLanding.blackout.initialize();           
            
            if (!WowLanding.video.focus) {
                WowLanding.blackout.element.style.display = "none";
                WowLanding.video.hide();
            }

        }
    },
    //changing region
    regionMenu: {
        labelElement: null,
        focus: false,
        element: null,
        regionLabels: null,
        toggle: function() {
            if (WowLanding.regionMenu.element == null)
                WowLanding.regionMenu.element = document.getElementById("regionSelection");

            var display = WowLanding.regionMenu.element.style.display;

            if (display == "block") {
                WowLanding.regionMenu.element.style.display = "none";
            	WowLanding.fixSelectElements("block");
            } else {
                WowLanding.regionMenu.element.style.display = "block";
            	WowLanding.fixSelectElements("hide");
            }
        },
        hide: function() {
            if (!WowLanding.regionMenu.focus && WowLanding.regionMenu.element) {
                WowLanding.regionMenu.element.style.display = "none";
                WowLanding.fixSelectElements("show");
            }
        },
        click: function(url, targetRegion, currentRegion) {
        	// IE fires change event on radio input blur instead of immediately like other browsers
        	if (Core.isIE(6)) {
        		WowLanding.regionMenu._submitForm(url, targetRegion, currentRegion);
        	}
        },
        change: function(url, targetRegion, currentRegion) {
        	if (!Core.isIE(6)) {
        		WowLanding.regionMenu._submitForm(url, targetRegion, currentRegion);
        	}
        },
        _submitForm: function(url, targetRegion, currentRegion) {

            if (!WowLanding.regionMenu.labelElement)
                WowLanding.regionMenu.labelElement = document.getElementById("regionLabel");
                
            //dont submit when changing from EU to RU or RU to EU
            if ((targetRegion == "EU" || targetRegion == "RU") && (currentRegion == "EU" || currentRegion == "RU")) {
                WowLanding.regionMenu.labelElement.innerHTML = WowLanding.regionMenu.regionLabels[targetRegion.toLowerCase()]
            } else if (targetRegion != currentRegion) {
                //clear fields
                $("#password").val("");
                $("#passwordConfirmation").val("");

                if($("#securityText")) {
                    $("#securityText").val("");
                }

                $("#prepopulate").val("true");

                var $signUpForm = $("#signUpForm");

                $signUpForm[0].onsubmit = null;

                $signUpForm.attr("action", url + "/account/creation/wow/signup/");

                $signUpForm.submit();
            }
        }
    },
    addCinematicIcon: function(promoType) {
    	  
    	  var flashPath = "https://eu.battle.net/account/images/"; 	  
    	  
    	  switch (promoType) {
    	  	case "promo-mistert":
    	  		flashPath +=  "lightweight-account-creation/promo-mistert/promo-mistert-icon.html";
    	  		break;
    	  	default: 
    	  		flashPath +=  "lightweight-account-creation/cinematic-icon.html";
    	  }
       
		swfobject.embedSWF(flashPath,
			"cinematicIcon", "43", "37", "9", null, null, 
			{ "bgcolor" : "000000", "allowScriptAccess" : "always", "wmode" : "transparent" }
		);

        $("#cinematicIcon object").mousedown(function() {            
            $("a.watchCinematic").trigger("click");     
        })
    }
};


var ReturningUser = {
    cookieName: "wowSignUp",
    startOverURL: "/account/creation/wow/signup/",
    check: function() {
        var returningName = Cookie.get(ReturningUser.cookieName);

        if (returningName && returningName != "--") {
            if (enforceCaptcha)
                $("#captchaExtension").hide().removeClass("backgroundExtension");

            $("input").attr("disabled","disabled");
            $(".messageBox").hide();

            $("#nameHeader").text(returningName);
            $("#nameSubheader").text(returningName);
            $("#signUpForm, .signUpForm").hide();
            $("#returningVisitor").show();
            $("#accountNote").hide();
        }
    },
    clear: function() {
        Cookie.remove(ReturningUser.cookieName);
        window.location = ReturningUser.startOverURL;
    }
};

var Cookie = {
    set: function(cookieName, value, days) {
        if (days) {
            var date = new Date();
            date.setTime(date.getTime()+(days*24*60*60*1000));
            var expires = "; expires="+date.toGMTString();
        }
        else
            var expires = "";
        document.cookie = cookieName + "=" + value + expires + "; path=/";
    },
    get: function(cookieName) {
        cookieName += "=";
        var cookies = document.cookie.split(';');
        for(var i = 0; i < cookies.length; i++) {
            var cookie = cookies[i];
            while (cookie.charAt(0)==' ')
                cookie = cookie.substring(1, cookie.length);
            if (cookie.indexOf(cookieName) == 0)
                return cookie.substring(cookieName.length, cookie.length);
        }
        return null;
    },
    remove: function(cookieName) {
        Cookie.set(cookieName, "", -1);
    }
};

function selectLanguage(lang) {
    window.location = window.location.pathname + "?locale=" + lang;
}


