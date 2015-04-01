/* FLAME ADMIN INPUT SCRIPTS */

/* CHECKBOX */

$.fn.flcheck = function() {
	$(this).each( function() {
		var checkboxid = $(this).attr('id');
		    checkboxclass = $(this).attr('class');
		$(this).hide().wrap('<div class="checkbox-cont"></div>');
		    checkboxCont = $(this).parents('.checkbox-cont');
		if (!$(this).attr('checked')) { checkboxCont.addClass('unchecked'); };
		if ($(this).attr('disabled')) { checkboxCont.addClass('disabled'); };

		checkboxCont.addClass(checkboxid).addClass(checkboxclass);

		if (!$(this).hasClass('chbox-mini')) checkboxCont.append('<div class="on"><span>=</span></div>', '<div class="off"><span>X</span></div>', '<div class="check-mask"></div>');
		if ($(this).hasClass('chbox-mini')) checkboxCont.append('<div class="on"><span>=</span></div>');
	});
	$('.checkbox-cont:not(.disabled)').click( function() {
		var checkboxCont = $(this);
			checkbox = $(this).children('input:checkbox');
		    checkattr = $(checkbox).attr('checked');
		if (checkattr) {
		  $(checkbox).removeAttr('checked');
		  checkboxCont.addClass('unchecked');
		} else {
		  $(checkbox).attr('checked', 'checked');
		  checkboxCont.removeClass('unchecked');
		};
	});
	$('.chbox-radio .checkbox-cont:not(.disabled)').click( function() {
		$(this).parents('.chbox-radio').find('.checkbox-cont').not(this).addClass('unchecked').children('.chbox').removeAttr('checked');
	});
};

/* HOVER INTENT */
(function($){$.fn.hoverIntent=function(f,g){var cfg={sensitivity:7,interval:100,timeout:0};cfg=$.extend(cfg,g?{over:f,out:g}:f);var cX,cY,pX,pY;var track=function(ev){cX=ev.pageX;cY=ev.pageY};var compare=function(ev,ob){ob.hoverIntent_t=clearTimeout(ob.hoverIntent_t);if((Math.abs(pX-cX)+Math.abs(pY-cY))<cfg.sensitivity){$(ob).unbind("mousemove",track);ob.hoverIntent_s=1;return cfg.over.apply(ob,[ev])}else{pX=cX;pY=cY;ob.hoverIntent_t=setTimeout(function(){compare(ev,ob)},cfg.interval)}};
var delay=function(ev,ob){ob.hoverIntent_t=clearTimeout(ob.hoverIntent_t);ob.hoverIntent_s=0;return cfg.out.apply(ob,[ev])};var handleHover=function(e){var ev=jQuery.extend({},e);var ob=this;if(ob.hoverIntent_t){ob.hoverIntent_t=clearTimeout(ob.hoverIntent_t)}if(e.type=="mouseenter"){pX=ev.pageX;pY=ev.pageY;$(ob).bind("mousemove",track);if(ob.hoverIntent_s!=1){ob.hoverIntent_t=setTimeout(function(){compare(ev,ob)},cfg.interval)}}else{$(ob).unbind("mousemove",track);
if(ob.hoverIntent_s==1){ob.hoverIntent_t=setTimeout(function(){delay(ev,ob)},cfg.timeout)}}};return this.bind('mouseenter',handleHover).bind('mouseleave',handleHover)}})(jQuery);

/* NANOSCROLLER */

(function(c,f,g){var j,h,k,l,m;l={paneClass:"pane",sliderClass:"slider",contentClass:"scroll-cont",iOSNativeScrolling:!1,preventPageScrolling:!1,disableResize:!1,alwaysVisible:!1,flashDelay:1500,sliderMinHeight:20,sliderMaxHeight:null};j="Microsoft Internet Explorer"===f.navigator.appName&&/msie 7./i.test(f.navigator.appVersion)&&f.ActiveXObject;h=null;m=function(){var b,a;b=g.createElement("div");a=b.style;a.position="absolute";a.width="100px";a.height="100px";a.overflow="scroll";a.top="-9999px";g.body.appendChild(b);
a=b.offsetWidth-b.clientWidth;g.body.removeChild(b);return a};k=function(){function b(a,b){this.el=a;this.options=b;h||(h=m());this.$el=c(this.el);this.doc=c(g);this.win=c(f);this.generate();this.createEvents();this.addEvents();this.reset()}b.prototype.preventScrolling=function(a,b){this.isActive&&("DOMMouseScroll"===a.type?("down"===b&&0<a.originalEvent.detail||"up"===b&&0>a.originalEvent.detail)&&a.preventDefault():"mousewheel"===a.type&&a.originalEvent&&a.originalEvent.wheelDelta&&("down"===b&&
0>a.originalEvent.wheelDelta||"up"===b&&0<a.originalEvent.wheelDelta)&&a.preventDefault())};b.prototype.updateScrollValues=function(){var a;a=this.content[0];this.maxScrollTop=a.scrollHeight-a.clientHeight;this.contentScrollTop=a.scrollTop;this.maxSliderTop=this.paneHeight-this.sliderHeight;this.sliderTop=this.contentScrollTop*this.maxSliderTop/this.maxScrollTop};b.prototype.createEvents=function(){var a=this;this.events={down:function(b){a.isBeingDragged=!0;a.offsetY=b.pageY-a.slider.offset().top;
a.pane.addClass("active");a.doc.bind("mousemove",a.events.drag).bind("mouseup",a.events.up);return!1},drag:function(b){a.sliderY=b.pageY-a.$el.offset().top-a.offsetY;a.scroll();a.updateScrollValues();a.contentScrollTop>=a.maxScrollTop?a.$el.trigger("scrollend"):0===a.contentScrollTop&&a.$el.trigger("scrolltop");return!1},up:function(){a.isBeingDragged=!1;a.pane.removeClass("active");a.doc.unbind("mousemove",a.events.drag).unbind("mouseup",a.events.up);return!1},resize:function(){a.reset()},panedown:function(b){a.sliderY=
(b.offsetY||b.originalEvent.layerY)-0.5*a.sliderHeight;a.scroll();a.events.down(b);return!1},scroll:function(b){a.isBeingDragged||(a.updateScrollValues(),a.sliderY=a.sliderTop,a.slider.css({top:a.sliderTop}),null!=b&&(a.contentScrollTop>=a.maxScrollTop?(a.options.preventPageScrolling&&a.preventScrolling(b,"down"),a.$el.trigger("scrollend")):0===a.contentScrollTop&&(a.options.preventPageScrolling&&a.preventScrolling(b,"up"),a.$el.trigger("scrolltop"))))},wheel:function(b){if(null!=b)return a.sliderY+=
-b.wheelDeltaY||-b.delta,a.scroll(),!1}}};b.prototype.addEvents=function(){var a;this.removeEvents();a=this.events;this.options.disableResize||this.win.bind("resize",a.resize);this.slider.bind("mousedown",a.down);this.pane.bind("mousedown",a.panedown).bind("mousewheel DOMMouseScroll",a.wheel);this.content.bind("scroll mousewheel DOMMouseScroll touchmove",a.scroll)};b.prototype.removeEvents=function(){var a;a=this.events;this.win.unbind("resize",a.resize);this.slider.unbind();this.pane.unbind();this.content.unbind("scroll mousewheel DOMMouseScroll touchmove",
a.scroll).unbind("keydown",a.keydown).unbind("keyup",a.keyup)};b.prototype.generate=function(){var a,b,i,c,d;i=this.options;c=i.paneClass;d=i.sliderClass;a=i.contentClass;!this.$el.find(""+c).length&&!this.$el.find(""+d).length&&this.$el.append('<div class="'+c+'"><div class="'+d+'" /></div>');this.content=this.$el.children("."+a);this.content.attr("tabindex",0);this.slider=this.$el.find("."+d);this.pane=this.$el.find("."+c);h&&(b={right:-h},this.$el.addClass("has-scrollbar"));i.iOSNativeScrolling&&
(null==b&&(b={}),b.WebkitOverflowScrolling="touch");null!=b&&this.content.css(b);i.alwaysVisible&&this.pane.css({opacity:1,visibility:"visible"});return this};b.prototype.restore=function(){this.stopped=!1;this.pane.show();return this.addEvents()};b.prototype.reset=function(){var a,b,c,f,d,g,e;this.$el.find("."+this.options.paneClass).length||this.generate().stop();this.stopped&&this.restore();a=this.content[0];c=a.style;f=c.overflowY;j&&this.content.css({height:this.content.height()});b=a.scrollHeight+
h;g=this.pane.outerHeight();e=parseInt(this.pane.css("top"),10);d=parseInt(this.pane.css("bottom"),10);d=g+e+d;e=Math.round(d/b*d);e<this.options.sliderMinHeight?e=this.options.sliderMinHeight:null!=this.options.sliderMaxHeight&&e>this.options.sliderMaxHeight&&(e=this.options.sliderMaxHeight);"scroll"===f&&"scroll"!==c.overflowX&&(e+=h);this.maxSliderTop=d-e;this.contentHeight=b;this.paneHeight=g;this.paneOuterHeight=d;this.sliderHeight=e;this.slider.height(e);this.events.scroll();this.pane.show();
this.isActive=!0;this.pane.outerHeight(!0)>=a.scrollHeight&&"scroll"!==f?(this.pane.hide(),this.isActive=!1):this.el.clientHeight===a.scrollHeight&&"scroll"===f?this.slider.hide():this.slider.show();return this};b.prototype.scroll=function(){this.sliderY=Math.max(0,this.sliderY);this.sliderY=Math.min(this.maxSliderTop,this.sliderY);this.content.scrollTop(-1*((this.paneHeight-this.contentHeight+h)*this.sliderY/this.maxSliderTop));this.slider.css({top:this.sliderY});return this};b.prototype.scrollBottom=
function(a){this.reset();this.content.scrollTop(this.contentHeight-this.content.height()-a).trigger("mousewheel");return this};b.prototype.scrollTop=function(a){this.reset();this.content.scrollTop(+a).trigger("mousewheel");return this};b.prototype.scrollTo=function(a){this.reset();a=c(a).offset().top;a>this.maxSliderTop&&(a/=this.contentHeight,this.sliderY=a*=this.maxSliderTop,this.scroll());return this};b.prototype.stop=function(){this.stopped=!0;this.removeEvents();this.pane.hide();return this};
b.prototype.flash=function(){var a=this;this.pane.addClass("flashed");setTimeout(function(){a.pane.removeClass("flashed")},this.options.flashDelay);return this};return b}();c.fn.nanoScroller=function(b){return this.each(function(){var a;if(!(a=this.nanoscroller))a=c.extend({},l),b&&"object"===typeof b&&(a=c.extend(a,b)),this.nanoscroller=a=new k(this,a);if(b&&"object"===typeof b){c.extend(a.options,b);if(b.scrollBottom)return a.scrollBottom(b.scrollBottom);if(b.scrollTop)return a.scrollTop(b.scrollTop);
if(b.scrollTo)return a.scrollTo(b.scrollTo);if("bottom"===b.scroll)return a.scrollBottom(0);if("top"===b.scroll)return a.scrollTop(0);if(b.scroll&&b.scroll instanceof c)return a.scrollTo(b.scroll);if(b.stop)return a.stop();if(b.flash)return a.flash()}return a.reset()})}})(jQuery,window,document);

/* MASKED INPUT PLUGIN */

(function(a){var b=(a.browser.msie?"paste":"input")+".mask",c=window.orientation!=undefined;a.mask={definitions:{9:"[0-9]",a:"[A-Za-z]","*":"[A-Za-z0-9]"},dataName:"rawMaskFn"},a.fn.extend({caret:function(a,b){if(this.length!=0){if(typeof a=="number"){b=typeof b=="number"?b:a;return this.each(function(){if(this.setSelectionRange)this.setSelectionRange(a,b);else if(this.createTextRange){var c=this.createTextRange();c.collapse(!0),c.moveEnd("character",b),c.moveStart("character",a),
c.select()}})}if(this[0].setSelectionRange)a=this[0].selectionStart,b=this[0].selectionEnd;else if(document.selection&&document.selection.createRange){var c=document.selection.createRange();a=0-c.duplicate().moveStart("character",-1e5),b=a+c.text.length}return{begin:a,end:b}}},unmask:function(){return this.trigger("unmask")},mask:function(d,e){if(!d&&this.length>0){var f=a(this[0]);return f.data(a.mask.dataName)()}e=a.extend({placeholder:"_",completed:null},e);var g=a.mask.definitions,
h=[],i=d.length,j=null,k=d.length;a.each(d.split(""),function(a,b){b=="?"?(k--,i=a):g[b]?(h.push(new RegExp(g[b])),j==null&&(j=h.length-1)):h.push(null)});return this.trigger("unmask").each(function(){function v(a){var b=f.val(),c=-1;for(var d=0,g=0;d<k;d++)if(h[d]){l[d]=e.placeholder;while(g++<b.length){var m=b.charAt(g-1);if(h[d].test(m)){l[d]=m,c=d;break}}if(g>b.length)break}else l[d]==b.charAt(g)&&d!=i&&(g++,c=d);if(!a&&c+1<i)f.val(""),t(0,k);else if(a||c+1>=i)u(),a||f.val(f.val().substring(0,c+1));return i?d:j}
function u(){return f.val(l.join("")).val()}function t(a,b){for(var c=a;c<b&&c<k;c++)h[c]&&(l[c]=e.placeholder)}function s(a){var b=a.which,c=f.caret();if(a.ctrlKey||a.altKey||a.metaKey||b<32)return!0;if(b){c.end-c.begin!=0&&(t(c.begin,c.end),p(c.begin,c.end-1));var d=n(c.begin-1);if(d<k){var g=String.fromCharCode(b);if(h[d].test(g)){q(d),l[d]=g,u();var i=n(d);f.caret(i),e.completed&&i>=k&&e.completed.call(f)}}return!1}}function r(a){var b=a.which;if(b==8||b==46||c&&b==127){var d=f.caret(),e=d.begin,g=d.end;
g-e==0&&(e=b!=46?o(e):g=n(e-1),g=b==46?n(g):g),t(e,g),p(e,g-1);return!1}if(b==27){f.val(m),f.caret(0,v());return!1}}function q(a){for(var b=a,c=e.placeholder;b<k;b++)if(h[b]){var d=n(b),f=l[b];l[b]=c;if(d<k&&h[d].test(f))c=f;else break}}function p(a,b){if(!(a<0)){for(var c=a,d=n(b);c<k;c++)if(h[c]){if(d<k&&h[c].test(l[d]))l[c]=l[d],l[d]=e.placeholder;else break;d=n(d)}u(),f.caret(Math.max(j,a))}}function o(a){while(--a>=0&&!h[a]);return a}function n(a){while(++a<=k&&!h[a]);return a}var f=a(this),l=a.map(d.split(""),
function(a,b){if(a!="?")return g[a]?e.placeholder:a}),m=f.val();f.data(a.mask.dataName,function(){return a.map(l,function(a,b){return h[b]&&a!=e.placeholder?a:null}).join("")}),f.attr("readonly")||f.one("unmask",function(){f.unbind(".mask").removeData(a.mask.dataName)}).bind("focus.mask",function(){m=f.val();var b=v();u();var c=function(){b==d.length?f.caret(0,b):f.caret(b)};(a.browser.msie?c:function(){setTimeout(c,0)})()}).bind("blur.mask",function(){v(),f.val()!=m&&f.change()}).bind("keydown.mask",r)
.bind("keypress.mask",s).bind(b,function(){setTimeout(function(){f.caret(v(!0))},0)}),v()})}})})(jQuery);

/* NOTIFICATIONS */

$.fn.loginNotif = function() {
	$('.notification').append('<span class="icon close">X</span>');
	$('.notification .close').click( function() {
		$(this).parents('.notification').fadeOut(200);
	});
};

$.fn.notif = function () {
	$('.notif').click( function() {
		var notif = $(this);
		if (notif.children('.nt-det').length > 0 && !notif.hasClass('expanded')) {
			var detH = notif.children('.nt-det').outerHeight();
			notif.addClass('expanded').css('height', detH + 42);
		} else if (!notif.hasClass('no-coll')) {
			$(notif).addClass('hide');
			setTimeout(function() {
				notif.remove();
			}, 300);
		}
		notif.not('.no-coll').click( function() { notif.addClass('hide').removeClass('expanded').removeAttr('style'); });
	})
};

/* SCROLLSPY */

$.fn.scrollspy = function() {
	var lastId,
	    topMenu = $(this),
	    topMenuHeight = topMenu.outerHeight()+40,
	    menuItems = topMenu.find("a"),
	    scrollItems = menuItems.map(function(){
	      var item = $($(this).attr("href"));
	      if (item.length) { return item; }
	    });
	    if (topMenu.hasClass('nav-vt')) topMenuHeight = 23;

	menuItems.click(function(e){
	  var href = $(this).attr("href"),
		  contentOffset = $('#content').offset().top;
	      offsetTop = href === "#" ? 0 : $(href).offset().top - topMenuHeight - contentOffset + 3;
	  $('html, body').stop().animate({ 
	      scrollTop: offsetTop
	  }, 300);
	  e.preventDefault();
	});

	$(window).scroll(function(){
	   var contentOffset = $('#content').offset().top;
	   var fromTop = $(this).scrollTop() + topMenuHeight + contentOffset;	   
	   var cur = scrollItems.map(function(){
	     if ($(this).offset().top < fromTop)
	       return this;
	   });
	   cur = cur[cur.length-1];
	   var id = cur && cur.length ? cur[0].id : "";	   
	   if (lastId !== id) {
	       lastId = id;
	       menuItems
	         .parents('li').removeClass("active")
	         .end().filter("[href=#"+id+"]").parents('li').addClass("active");
	   }                   
	})
};

/* TOOLTIPS */

$.fn.tooltip = function () {
	$.fn.showTooltip = function() {
		var trigger = $(this);
		    ttopt = trigger.data('ttip-opt');
		    ttext = trigger.data('ttip');
		$('body').append('<div class="tooltip">'+ttext+'<span class="arrow">+</span></div>');+
		trigger.removeAttr('title');

		if (typeof ttopt == 'undefined') ttopt = 'top';
		if (ttopt == 'dark') ttopt = 'top dark';

    	$('body .tooltip').addClass(ttopt);
    	$('body .tooltip.left').position({ of: trigger, at: 'left-8 center', my: 'right center' }).addClass('show').children('.arrow').text('*');

		$('body .tooltip.right').position({ of: trigger, at: 'right center', my: 'left+8 center' }).addClass('show').children('.arrow').text(')');

		$('body .tooltip.bottom').position({ of: trigger, at: 'center bottom+8', my: 'center top' }).addClass('show').children('.arrow').text(',');

		$('body .tooltip.top').position({ of: trigger, at: 'center top-8', my: 'center bottom' }).addClass('show');
	};
	$.fn.destroyTooltip = function() {
		$('body .tooltip').removeClass('show').remove();
	};
	$('.ttip').hoverIntent( function() {
		var tooltip = $(this);
		if (tooltip.attr('title') && !tooltip.data('ttip')) tooltip.attr('data-ttip', tooltip.attr('title'));
		$(this).showTooltip();
	}, function() {
		$(this).destroyTooltip()
	}, 15);

	$('.ttip-tg').click( function() {
		var trigger = $(this);
		trigger.toggleClass('pressed');
		if (trigger.hasClass('pressed')) {
			trigger.showTooltip();
		} else {
			trigger.destroyTooltip();
		}
	});
};

/* DROPS & SELECTS */

$.fn.btnDrop = function() {
	$('.drop.single button, .drop:not(.disabled) .arrow').click( function() {
		$('body').find('.drop.active').removeClass('active');
		$(this).parents('.drop').toggleClass('active').closeOnBlur();
	});
	$('.drop:not(.multiple) li').click( function() {
		$(this).addClass('sel').siblings('li').removeClass('sel');
	});
	$('.drop li:not(.sel-search)').click( function() {
		$(this).parents('.drop').removeClass('active');
	});
};

$.fn.flselect = function() {
	$('.select').each( function() {
		if (!$(this).has('.arrow')) { $(this).addClass('no-arrow') };
	});
	$('.select:not(.disabled) *:not(.delete)').click( function() {
		$('body').find('.select.active').removeClass('active');
		$(this).parents('.select').toggleClass('active').closeOnBlur();
	});
	$('.select:not(.multiple) li').click( function() {
		var opt = $(this);
		    optVal = opt.text();
		    parent = opt.parents('.select');
		    option = parent.children('.opt-sel');
		    defVal = option.data('default-val');
		if (parent.has('.delete') && typeof defVal == 'undefined') {
			var defVal = option.html();
			option.attr('data-default-val', defVal);
		};
		$(option).html(optVal);
		$(this).addClass('sel').siblings('li').removeClass('sel');

		if (parent.has('select')) {
			var selectedIndex = opt.index();
			    select = parent.children('select');
			select.children('option').eq(selectedIndex).attr('selected','selected').siblings('option').removeAttr('selected');
			select.trigger('change');
		}
	});
	$('.select.multiple li:not(.no-sel)').click( function() {
		var optVal = $(this).text();
		    optNum = $(this).index();
		    parent = $(this).parents('.select');
		    option = parent.children('.opt-sel');
		if (parent.not('.has-tags')) { parent.addClass('has-tags') };

		if (!$(this).is('.used')) {
			$(this).addClass('used');
			$(parent).append(
				'<div class="sel-tag" data-sel-trigger="'+optNum+'">'+optVal+'<span class="icon delete">X</span></div>'
			);
		};
		$('.sel-tag .delete').click( function() {
			var tag = $(this).parents('.sel-tag');
			trigger = tag.data('sel-trigger');
			$(tag).remove();
			parent.children('ul').find('li:eq('+trigger+')').removeClass('used');
			if (parent.children('.sel-tag').length < 1) {
				parent.removeClass('has-tags');
			};
		});
	});
	$('.select ul').click( function() {
		$(this).parents('.select').removeClass('active');
	});
	$('.select.multiple .delete').click( function() {
		var parent = $(this).parents('.select');
		    option = parent.children('.opt-sel');
		parent.children('.sel-tag').remove();
		parent.removeClass('has-tags');
	    option.show();
	    parent.children('ul').find('li.used').removeClass('used');
	});
	$('.select:not(.multiple) .delete').click( function() {
		var defVal = $(this).siblings('.opt-sel').data('default-val');
		    parent = $(this).parents('.select');
		    option = parent.children('.opt-sel');
		option.html(defVal);
		parent.find('li.sel').removeClass('sel');
	});
};

$.fn.makeSelect = function() {
	$('body').find('select').not('.transformed').each( function() {
		var select = $(this);
			selectCls = select.attr('class');
		    selectOpts = select.children('option');
		    selectedOpt = select.children('option:selected');

		select.wrap('<div class="drop select"></div>').hide().addClass('transformed');
		var selectPar = select.parent('.select');

		if (typeof selectCls != 'undefined') { selectPar.addClass(selectCls) }
		if (typeof selectedOpt != 'undefined') {
			selectedVal = selectedOpt.html();
			selectedIndex = selectedOpt.index();
		} else {
			selectedVal = selectOpts[0].html();
			selectedIndex = 0;
		}
		selectPar.append('<ul />')
				 .append('<span class="opt-sel">'+selectedVal+'</span>');
		selectOpts.each( function() {
			if ($(this).val() == 0) $(this).addClass('default-val');
			selectPar.children('ul').append('<li>'+$(this).html()+'</li>')
		})
		selectPar.find('li').eq(selectedIndex).addClass('sel');

		if (!select.hasClass('no-arrow')) { selectPar.append('<span class="arrow">&amp;</span>'); }
		if (select.attr('disabled')) { selectPar.addClass('disabled'); }
		if (select.attr('multiple')) { selectPar.addClass('multiple'); }
		if (select.hasClass('has-delete')) selectPar.append('<div class="button black icon delete">X</div>');

		selectPar.find('.delete').click( function() {
			select.find('.default-val').attr('selected','selected').siblings('option').removeAttr('selected');
		})
	})
	$.fn.flselect();
};

$.fn.closeOnBlur = function() {
	$('body').click( function() {
		$('.drop.active').removeClass('active');
	});
	$('.drop, .sel-tag, .sel-tag *, .delete, .no-sel, .no-sel *').bind('click', function(event) {
		event.stopPropagation();
	});
};

/* FORM VALIDATION */

$.fn.validate = function(options) {
	var defaultOptions = {
      errorClass: 'error',
      validClass: 'valid'
    };
    options = $.extend(true, defaultOptions, options);

	$.fn.validateInput = function() {
		var input = $(this);
			inputVal = input.val();
			valLength = inputVal.length;
			errorMsg = 'This field is required';

        $.fn.hasError = function() {
        	var trigger = $(this);
        	    triggerNum = $(this).index();
            	offPar = trigger.offsetParent();
        	    position = $(this).position();
        	    posTop = position.top + trigger.outerHeight() / 2 + 1;
        	    posLeft = position.left + trigger.outerWidth();
        	if (offPar.children('.input-error[data-trigger="'+triggerNum+'"]').length < 1) offPar.append('<span class="input-error icon ttip" style="top: '+posTop+'px; left: '+posLeft+'px;" data-ttip="'+errorMsg+'" data-ttip-opt="left" data-trigger="'+triggerNum+'">X</span>').tooltip();
        	trigger.addClass(options.errorClass).removeClass(options.validClass);
        };
        $.fn.isValid = function() {
        	var trigger = $(this);
        	    triggerNum = $(this).index();
        	    offPar = trigger.offsetParent();
        	offPar.find('.input-error').each( function() {
        		if ($(this).data('trigger') == triggerNum) $(this).remove();
        	});
        	trigger.addClass(options.validClass).removeClass(options.errorClass);
        };
        $.fn.resetInput = function() { input.isValid(); input.removeClass(options.validClass) };

		$.fn.validateRequired = function() {
			if (input.data('min')) { var minLength = input.data('min') } else { var minLength = 1 };
			if (valLength < minLength) {
				if (minLength > 1) errorMsg = 'Enter at least '+minLength+' characters';
				input.hasError();
			} else {
				input.isValid();
			}
		};
		$.fn.validateEmail = function() {
			var email = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
	        if (valLength > 0 && inputVal.match(email)) {
	        	input.isValid();
	        } else if (valLength < 1 && !input.hasClass('required')) { input.resetInput();
	        } else {
	        	if (valLength > 0) errorMsg = 'Not a valid e-mail address';
        		input.hasError();
	        }
		};
		$.fn.validateCardnum = function() {
			var cardnr = /[0-9]+$/;
	        if (valLength = 16 && inputVal.match(cardnr)) {
	        	input.isValid();
	        } else if (valLength < 1 && !input.hasClass('required')) { input.resetInput();
	        } else {
	        	if (valLength > 0 && valLength < 16) errorMsg = 'Not a valid card number';
        		input.hasError();
	        }
		};
		$.fn.validateMatch = function() {
			var match = input.data('match');
	        input.siblings('.match').each( function() {
	        	if ($(this).data('match') == match) {
	        		var matchTarget = $(this);
	        		if (inputVal == matchTarget.val() && valLength > 0) {
	        			input.isValid(); matchTarget.isValid();
	        		} else if (valLength > 0) {
	        			errorMsg = 'These fields must match';
	        			input.hasError();
	        		} else { input.hasError(); }
	        	}
	        });
	        if (inputVal == 0) {
	        	input.keyup( function() {
	        		input.resetInput();
	        	});
	        }
		};

        if (input.hasClass('required')) input.validateRequired();
		if (input.hasClass('email')) input.validateEmail();
		if (input.hasClass('cardnum')) input.validateCardnum();
		if (input.hasClass('match')) input.validateMatch();
	};

	$.fn.validateSelect = function() {
		var select = $(this);
		if (select.find('li.sel').length == 1) {
			select.addClass(options.validClass).removeClass(options.errorClass).children('.input-error').remove();
			select.children('.arrow').show();
		} else {
			errorMsg = 'Please select an option';
			select.addClass(options.errorClass).removeClass(options.validClass);
			if (select.children('.input-error').length < 1) select.append('<span class="input-error icon ttip" data-ttip="'+errorMsg+'" data-ttip-opt="left">X</span>').tooltip();
			select.children('.arrow').hide();
		}
	};

	$.fn.validateSpinner = function() {
		var spinner = $(this);
		    spnBody = spinner.parents('.spinner-body');
		    errorMsg = 'This field is required';
		if (spinner.val().length < 1) {
			spinner.addClass(options.errorClass).removeClass(options.validClass);
			if (spnBody.children('.input-error').length < 1)
				spnBody.append('<span class="input-error icon ttip" data-ttip="'+errorMsg+'" data-ttip-opt="left">X</span>').tooltip();
		} else {
			spinner.addClass(options.validClass).removeClass(options.errorClass);
			spnBody.children('.input-error').remove();
		}
	};

	$.fn.validateCheckbox = function() {
		var chbox = $(this);
		    chboxCont = chbox.parents('.checkbox-cont');
		if (!chbox.attr('checked')) {
			chboxCont.addClass(options.errorClass).removeClass(options.validClass);
			chboxCont.addClass('ttip').attr('data-ttip','Checking this is required').tooltip('right');
		} else {
			chboxCont.addClass(options.validClass).removeClass(options.errorClass);
			chboxCont.removeClass('ttip').removeAttr('data-ttip').tooltip();
		}
	};

    $(this).each( function() {
    	var form = $(this);

    	form.find('input:not(.spinner):not(:disabled)').each( function() {
    		var input = $(this);
    		input.keyup( function() { input.validateInput() });
    		input.blur( function() { input.validateInput() });
    	});

    	form.find('.select.required').click( function() {
    		$(this).validateSelect();
    	});

    	form.find('.spinner.required').change( function() { $(this).validateSpinner() });
    	form.find('.spinner.required').keyup( function() { $(this).trigger('change') });
    	form.find('.spinner-body .spinner-btn').click( function() { $(this).siblings('.spinner.required').trigger('change') });

    	form.find('.checkbox-cont.required').click( function() { $(this).children('input.chbox').validateCheckbox() });

        form.submit( function(e) {
        	var form = $(this);
	        	textInputs = 'input.required:not(.spinner):not(.chbox):not(:disabled)';
        	form.find(textInputs).each( function() { $(this).validateInput() });
        	form.find('.select.required:not(.disabled)').each( function() { $(this).validateSelect() });
        	form.find('.spinner.required:not(.disabled)').each( function() { $(this).validateSpinner() });
        	form.find('input.chbox.required').each( function() { $(this).validateCheckbox() });
        	var invalids = form.find('.error');
        	if (invalids.length > 0) {
        		invalids.not('.select').eq(0).focus();
        		e.preventDefault();
        		return false;
        	};
        });
    });
};

$.fn.validateLogin = function() {
	$(this).each( function() {
		var form = $(this);

    	$.fn.validateInput = function() {
    		input = $(this);
    		val = input.val();

			$.fn.hasError = function() {
				input.addClass('error').siblings('span').text('X').css('color','#e56969');
			};
			$.fn.isValid = function() {
				input.removeClass('error');
				input.siblings('span').text('=').css('color','#9fbf2f');
			};

			if (val < 1) input.hasError(); else input.isValid();

			if ($('#psw').hasClass('error')) $('#forgot-psw').show();
			else $('#forgot-psw').hide();
    	};

    	form.find('input:not(.spinner):not(:disabled)').each( function() {
    		var input = $(this);
    		input.keyup( function() { input.validateInput() });
    		input.blur( function() { input.validateInput() });
    	});

    	form.submit( function(e) {
    		var form = $(this);
			form.find('input.required').each( function() { $(this).validateInput() });
			var invalids = form.find('.error');
			if (invalids.length > 0) {
			invalids.eq(0).focus();
			e.preventDefault();
			return false;
			};
    	});
	})
};

/* OTHER INPUTS */

$.fn.numberInp = function() {
	$('.spinner').spinner();

	$('.number').keyup( function() {
		this.value = this.value.replace(/[^0-9]/g,'');
	});
};

$.fn.fileSel = function() {
	$('.file-sel').each( function() {
		$('input.file', this).after('<input type="text" class="file-text full" value="Select a file...">');
	});
	$('input.file').change(function(e){
	  var input = $(this);
	      filename = input.val().split(/\\/).pop()
	  input.next('.file-text').val(filename);
	});
};

$.fn.inputgrp = function() {
	$('.input-group').each( function() {
    	var group = $(this);
    	    grpCompWidth = 0;
    	    groupWidth = $(this).width();
    	    input = group.children('input');

    	    group.children('.input-comp').each( function() {
    	    	grpCompWidth += $(this).outerWidth( true );
    	    });

    	    inputWidth = groupWidth - grpCompWidth;
    	    input.css('width', inputWidth);

    	    if (group.children('.input-comp:last-child').offset().top > group.offset().top) input.css('width', inputWidth -1);
    })
};

$.fn.gradeslider = function() {
	$('.slider.grade').each( function() {
		var handle = $(this).children('.ui-slider-handle');
		    value = $(this).slider('option','value');
		handle.append('<span class="grade">'+value+'</span>');

		var gradeEl = handle.children('.grade');
    	$(this).slider().bind('slide', function(event, ui) {
    		gradeEl.html(ui.value);
    	})
    })
};

/* GENERAL INPUTS CALL */

$.fn.inputs = function() {
	$.fn.btnDrop();
	$.fn.fileSel();
	$.fn.flselect();
    $.fn.numberInp();

    $('.input .delete, .input-group .delete').click( function() {
    	$(this).siblings('input').val('').focus();
    });
};

$.fn.btnfns = function() {
    $('button.toggle, .button.toggle').click( function() {
    	$(this).toggleClass('pressed');
    });
    $('.btn-radio > button, .btn-radio > .button').not('.no-tg').click( function() {
    	$(this).addClass('pressed').siblings('.pressed').removeClass('pressed');
    });
};