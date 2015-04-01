// GLDATEPICKER

(function(c){var r={calId:0,cssName:"default",startDate:-1,endDate:-1,selectedDate:-1,showPrevNext:!0,allowOld:!0,showAlways:!1,position:"absolute"},j={init:function(a){return this.each(function(){var b=c(this),e=c.extend({},r);e.calId=b[0].id+"-gldp";a&&(e=c.extend(e,a));b.data("settings",e);b.click(j.show).focus(j.show);e.showAlways&&setTimeout(function(){b.trigger("focus")},50);c(document).bind("click",function(){j.hide.apply(b)})})},show:function(a){a.stopPropagation();j.hide.apply(c("._gldp").not(c(this)));
j.update.apply(c(this))},hide:function(){if(c(this).length){var a=c(this).data("settings");a.showAlways||(c("#"+a.calId).slideUp(200),c(this).removeClass("_gldp"))}},setStartDate:function(a){c(this).data("settings").startDate=a},setEndDate:function(a){c(this).data("settings").endDate=a},setSelectedDate:function(a){c(this).data("settings").selectedDate=a},update:function(){var a=c(this),b=a.data("settings"),e=b.calId,d=b.startDate;-1==b.startDate&&(d=new Date,d.setDate(1));d.setHours(0,0,0,0);var k=
d.getTime(),f=new Date(0);-1!=b.endDate&&(f=new Date(b.endDate),/^\d+$/.test(b.endDate)&&(f=new Date(d),f.setDate(f.getDate()+b.endDate)));f.setHours(0,0,0,0);var f=f.getTime(),h=new Date(0);-1!=b.selectedDate&&(h=new Date(b.selectedDate),/^\d+$/.test(b.selectedDate)&&(h=new Date(d),h.setDate(h.getDate()+b.selectedDate)));h.setHours(0,0,0,0);var h=h.getTime(),i=a.data("theDate"),i=-1==i||"undefined"==typeof i?d:i,m=new Date(i);m.setDate(1);var r=m.getTime(),d=new Date(m);d.setMonth(d.getMonth()+1);
d.setDate(0);var w=d.getTime(),t=d.getDate(),n=new Date(m);n.setDate(0);n=n.getDate();a.data("theDate",i);for(var d="",u=0,v=0;6>u;u++){for(var s="",q=0;7>q;q++,v++){var o=n-m.getDay()+v+1,p=o-n,g=0==q?"sun":6==q?"sat":"day";if(1<=p&&p<=t){o=new Date;o.setHours(0,0,0,0);var l=new Date(i);l.setHours(0,0,0,0);l.setDate(p);l=l.getTime();g=o.getTime()==l?"today":g;b.allowOld||(g=l<k?"noday":g);-1!=b.endDate&&(g=l>f?"noday":g);-1!=b.selectedDate&&(g=l==h?"selected":g)}else g="noday",p=0>=p?o:o-t-n;s+=
"<td class='gldp-days "+g+" **-"+g+"'><div class='"+g+"'>"+p+"</div></td>"}d+="<tr class='days'>"+s+"</tr>"}h=k<r||b.allowOld;k=w<f||f<k;b.showPrevNext||(h=k=!1);f="January,February,March,April,May,June,July,August,September,October,November,December".split(",")[i.getMonth()]+" "+i.getFullYear();k=("<div class='**'><table><tr>"+("<td class='**-prevnext prev'>%</td>")+"<td class='**-monyear' colspan='5'>{MY}</td>"+("<td class='**-prevnext next'>(</td>")+"</tr><tr class='**-dow'><td>Sun</td><td>Mon</td><td>Tue</td><td>Wed</td><td>Thu</td><td>Fri</td><td>Sat</td></tr>"+
d+"</table></div>").replace(/\*{2}/gi,"gldp-"+b.cssName).replace(/\{MY\}/gi,f);0==c("#"+e).length&&a.after(c("<div id='"+e+"'></div>").css({position:b.position,"z-index":b.zIndex,left:a.offset().left,top:a.offset().top+a.outerHeight(!0)}));e=c("#"+e);e.html(k).slideDown(200);a.addClass("_gldp");c("[class*=-prevnext]",e).click(function(b){b.stopPropagation();if(""!=c(this).html()){var b=c(this).hasClass("prev")?-1:1,d=new Date(m);d.setMonth(i.getMonth()+b);a.data("theDate",d);j.update.apply(a)}});
c("tr.days td:not(.noday, .selected)",e).click(function(b){b.stopPropagation();var b=c(this).children("div").html(),d=a.data("settings"),e=new Date(i);e.setDate(b);a.data("theDate",e);a.val(e.getMonth()+
1+"/"+e.getDate()+"/"+e.getFullYear());if(null!=d.onChange&&"undefined"!=typeof d.onChange)d.onChange(a,e);d.selectedDate=e;j.hide.apply(a)})}};c.fn.glDatePicker=function(a){if(j[a])return j[a].apply(this,Array.prototype.slice.call(arguments,1));if("object"===typeof a||!a)return j.init.apply(this,arguments);c.error("Method "+a+" does not exist on jQuery.glDatePicker")}})(jQuery);

// jQUERY KNOB

(function(e){"use strict";var t={},n=Math.max,r=Math.min;t.c={};t.c.d=e(document);t.c.t=function(e){return e.originalEvent.touches.length-1};t.o=function(){var n=this;this.o=null;this.$=null;this.i=null;this.g=null;this.v=null;this.cv=null;this.x=0;this.y=0;this.$c=null;this.c=null;this.t=0;this.isInit=false;this.fgColor=null;this.pColor=null;this.dH=null;this.cH=null;this.eH=null;this.rH=null;this.run=function(){var t=function(e,t){var r;for(r in t){n.o[r]=t[r]}n.init();n._configure()._draw()};if(this.$.data("kontroled"))return;
this.$.data("kontroled",true);this.extend();this.o=e.extend({min:this.$.data("min")||0,max:this.$.data("max")||100,stopper:true,readOnly:this.$.data("readonly"),cursor:this.$.data("cursor")===true&&30||this.$.data("cursor")||0,thickness:this.$.data("thickness")||.35,width:this.$.data("width")||200,height:this.$.data("height")||200,displayInput:this.$.data("displayinput")==null||this.$.data("displayinput"),displayPrevious:this.$.data("displayprevious"),fgColor:this.$.data("fgcolor")||"#87CEEB",inline:false,draw:null,change:null,cancel:null,release:null},this.o);
if(this.$.is("fieldset")){this.v={};this.i=this.$.find("input");this.i.each(function(t){var r=e(this);n.i[t]=r;n.v[t]=r.val();r.bind("change",function(){var e={};e[t]=r.val();n.val(e)})});this.$.find("legend").remove()}else{this.i=this.$;this.v=this.$.val();this.v==""&&(this.v=this.o.min);this.$.bind("change",function(){n.val(n.$.val())})}!this.o.displayInput&&this.$.hide();this.$c=e('<canvas width="'+this.o.width+'px" height="'+this.o.height+'px"></canvas>');this.c=this.$c[0].getContext("2d");this.$.wrap(e('<div style="'+"width:"+this.o.width+"px; height:"+this.o.height+'px; float: left; position: relative;"></div>'))
.before(this.$c);if(this.v instanceof Object){this.cv={};this.copy(this.v,this.cv)}else{this.cv=this.v}this.$.bind("configure",t).parent().bind("configure",t);this._listen()._configure()._xy().init();this.isInit=true;this._draw();return this};this._draw=function(){var e=true,t=document.createElement("canvas");t.width=n.o.width;t.height=n.o.height;n.g=t.getContext("2d");n.clear();n.dH&&(e=n.dH());e!==false&&n.draw();n.c.drawImage(t,0,0);t=null};this._touch=function(e){var r=function(e){var t=n.xy2val(e.originalEvent.touches[n.t].pageX,e.originalEvent.touches[n.t].pageY);if(t==n.cv)return;if(n.cH&&n.cH(t)===false)return;n.change(t);
n._draw()};this.t=t.c.t(e);r(e);t.c.d.bind("touchmove.k",r).bind("touchend.k",function(){t.c.d.unbind("touchmove.k touchend.k");if(n.rH&&n.rH(n.cv)===false)return;n.val(n.cv)});return this};this._mouse=function(e){var r=function(e){var t=n.xy2val(e.pageX,e.pageY);if(t==n.cv)return;if(n.cH&&n.cH(t)===false)return;n.change(t);n._draw()};r(e);t.c.d.bind("mousemove.k",r).bind("keyup.k",function(e){if(e.keyCode===27){t.c.d.unbind("mouseup.k mousemove.k keyup.k");if(n.eH&&n.eH()===false)return;n.cancel()}}).bind("mouseup.k",function(e){t.c.d.unbind("mousemove.k mouseup.k keyup.k");if(n.rH&&n.rH(n.cv)===false)return;n.val(n.cv)});return this};
this._xy=function(){var e=this.$c.offset();this.x=e.left;this.y=e.top;return this};this._listen=function(){if(!this.o.readOnly){this.$c.bind("mousedown",function(e){e.preventDefault();n._xy()._mouse(e)}).bind("touchstart",function(e){e.preventDefault();n._xy()._touch(e)});this.listen()}else{this.$.attr("readonly","readonly")}return this};this._configure=function(){if(this.o.draw)this.dH=this.o.draw;if(this.o.change)this.cH=this.o.change;if(this.o.cancel)this.eH=this.o.cancel;if(this.o.release)this.rH=this.o.release;if(this.o.displayPrevious){this.pColor=this.h2rgba(this.o.fgColor,"0.4");this.fgColor=this.h2rgba(this.o.fgColor,"0.6")}else{this.fgColor=this.o.fgColor}return this};
this._clear=function(){this.$c[0].width=this.$c[0].width};this.listen=function(){};this.extend=function(){};this.init=function(){};this.change=function(e){};this.val=function(e){};this.xy2val=function(e,t){};this.draw=function(){};this.clear=function(){this._clear()};this.h2rgba=function(e,t){var n;e=e.substring(1,7);n=[parseInt(e.substring(0,2),16),parseInt(e.substring(2,4),16),parseInt(e.substring(4,6),16)];return"rgba("+n[0]+","+n[1]+","+n[2]+","+t+")"};this.copy=function(e,t){for(var n in e){t[n]=e[n]}}};t.Dial=function(){t.o.call(this);this.startAngle=null;this.xy=null;this.radius=null;this.lineWidth=null;this.cursorExt=null;this.w2=null;this.PI2=2*Math.PI;
this.extend=function(){this.o=e.extend({bgColor:this.$.data("bgcolor")||"#EEEEEE",angleOffset:this.$.data("angleoffset")||0,angleArc:this.$.data("anglearc")||360,inline:true},this.o)};this.val=function(e){if(null!=e){this.cv=this.o.stopper?n(r(e,this.o.max),this.o.min):e;this.v=this.cv;this.$.val(this.v);this._draw()}else{return this.v}};this.xy2val=function(e,t){var i,s;i=Math.atan2(e-(this.x+this.w2),-(t-this.y-this.w2))-this.angleOffset;if(this.angleArc!=this.PI2&&i<0&&i>-.5){i=0}else if(i<0){i+=this.PI2}s=~~(.5+i*(this.o.max-this.o.min)/this.angleArc)+this.o.min;this.o.stopper&&(s=n(r(s,this.o.max),this.o.min));return s};this.listen=function(){var t=this,i=function(e){e.preventDefault();
var n=e.originalEvent,r=n.detail||n.wheelDeltaX,i=n.detail||n.wheelDeltaY,s=parseInt(t.$.val())+(r>0||i>0?1:r<0||i<0?-1:0);if(t.cH&&t.cH(s)===false)return;t.val(s)},s,o,u=1,a={37:-1,38:1,39:1,40:-1};this.$.bind("keydown",function(i){var f=i.keyCode;if(f>=96&&f<=105){f=i.keyCode=f-48}s=parseInt(String.fromCharCode(f));if(isNaN(s)){f!==13&&f!==8&&f!==9&&f!==189&&i.preventDefault();if(e.inArray(f,[37,38,39,40])>-1){i.preventDefault();var l=parseInt(t.$.val())+a[f]*u;t.o.stopper&&(l=n(r(l,t.o.max),t.o.min));t.change(l);t._draw();o=window.setTimeout(function(){u*=2},30)}}}).bind("keyup",function(e){if(isNaN(s)){if(o){window.clearTimeout(o);o=null;u=1;t.val(t.$.val())}}else{t.$.val()>t.o.max&&t.$.val(t.o.max)||t.$.val()<t.o.min&&t.$.val(t.o.min)}});
this.$c.bind("mousewheel DOMMouseScroll",i);this.$.bind("mousewheel DOMMouseScroll",i)};this.init=function(){if(this.v<this.o.min||this.v>this.o.max)this.v=this.o.min;this.$.val(this.v);this.w2=this.o.width/2;this.cursorExt=this.o.cursor/100;this.xy=this.w2;this.lineWidth=this.xy*this.o.thickness;this.radius=this.xy-this.lineWidth/2;this.o.angleOffset&&(this.o.angleOffset=isNaN(this.o.angleOffset)?0:this.o.angleOffset);this.o.angleArc&&(this.o.angleArc=isNaN(this.o.angleArc)?this.PI2:this.o.angleArc);this.angleOffset=this.o.angleOffset*Math.PI/180;this.angleArc=this.o.angleArc*Math.PI/180;this.startAngle=1.5*Math.PI+this.angleOffset;this.endAngle=1.5*Math.PI+this.angleOffset+this.angleArc;
var e=n(String(Math.abs(this.o.max)).length,String(Math.abs(this.o.min)).length,2)+2;this.o.displayInput&&this.i.css({height:(this.o.width/3>>0)+"px",position:"absolute","margin-top":+(this.o.width/3>>0)+"px"})||this.i.css({width:"0px",visibility:"hidden"})};this.change=function(e){this.cv=e;this.$.val(e)};this.angle=function(e){return(e-this.o.min)*this.angleArc/(this.o.max-this.o.min)};
this.draw=function(){var e=this.g,t=this.angle(this.cv),n=this.startAngle,r=n+t,i,s,o=1;e.lineWidth=this.lineWidth;this.o.cursor&&(n=r-this.cursorExt)&&(r=r+this.cursorExt);e.beginPath();e.strokeStyle=this.o.bgColor;e.arc(this.xy,this.xy,this.radius,this.endAngle,this.startAngle,true);e.stroke();if(this.o.displayPrevious){s=this.startAngle+this.angle(this.v);i=this.startAngle;this.o.cursor&&(i=s-this.cursorExt)&&(s=s+this.cursorExt);e.beginPath();e.strokeStyle=this.pColor;e.arc(this.xy,this.xy,this.radius,i,s,false);e.stroke();o=this.cv==this.v}e.beginPath();e.strokeStyle=o?this.o.fgColor:this.fgColor;e.arc(this.xy,this.xy,this.radius,n,r,false);e.stroke()};this.cancel=function(){this.val(this.v)}};
e.fn.dial=e.fn.knob=function(n){return this.each(function(){var r=new t.Dial;r.o=n;r.$=e(this);r.run()}).parent()}})(jQuery);

// TOASTR NOTIFICATIONS

(function(n){n(["jquery"],function(n){var t=function(){var u={tapToDismiss:!0,toastClass:"toast",containerId:"toast-container",debug:!1,fadeIn:400,fadeOut:400,extendedTimeOut:1e3,iconClasses:{error:"toast-error",info:"toast-info",success:"toast-success",warning:"toast-warning"},iconClass:"toast-info",positionClass:"toast-top-right",timeOut:5e3,titleClass:"toast-title",messageClass:"toast-message"},f=function(n,t,u){return r({iconClass:i().iconClasses.error,message:n,optionsOverride:u,title:t})},e=function(t){var i=n("#"+t.containerId);return i.length?i:(i=n("<div/>").attr("id",t.containerId).addClass(t.positionClass),i.appendTo(n("body")),i)},i=function(){return n.extend({},u,t.options)},
o=function(n,t,u){return r({iconClass:i().iconClasses.info,message:n,optionsOverride:u,title:t})},r=function(t){var r=i(),o=t.iconClass||r.iconClass;typeof t.optionsOverride!="undefined"&&(r=n.extend(r,t.optionsOverride),o=t.optionsOverride.iconClass||o);var s=null,h=e(r),u=n("<div/>"),c=n("<div/>"),l=n("<div/>"),a={options:r,map:t};t.iconClass&&u.addClass(r.toastClass).addClass(o),t.title&&(c.append(t.title).addClass(r.titleClass),u.append(c)),t.message&&(l.append(t.message).addClass(r.messageClass),u.append(l));var f=function(){if(!(n(":focus",u).length>0)){var t=function(n){return u.fadeOut(r.fadeOut,n)},i=function(){u.is(":visible")||(u.remove(),h.children().length===0&&h.remove())};t(i)}},
v=function(){(r.timeOut>0||r.extendedTimeOut>0)&&(s=setTimeout(f,r.extendedTimeOut))},y=function(){clearTimeout(s),u.stop(!0,!0).fadeIn(r.fadeIn)};return u.hide(),h.prepend(u),u.fadeIn(r.fadeIn),r.timeOut>0&&(s=setTimeout(f,r.timeOut)),u.hover(y,v),!r.onclick&&r.tapToDismiss&&u.click(f),r.onclick&&u.click(function(){r.onclick()&&f()}),r.debug&&console&&console.log(a),u},s=function(n,t,u){return r({iconClass:i().iconClasses.success,message:n,optionsOverride:u,title:t})},h=function(n,t,u){return r({iconClass:i().iconClasses.warning,message:n,optionsOverride:u,title:t})},c=function(t){var u=i(),r=n("#"+u.containerId),f;if(t&&n(":focus",t).length===0){f=function(){t.is(":visible")||(t.remove(),
r.children().length===0&&r.remove())},t.fadeOut(u.fadeOut,f);return}r.length&&r.fadeOut(u.fadeOut,function(){r.remove()})};return{clear:c,error:f,info:o,options:{},success:s,version:"1.1.4.2",warning:h}}();return t})})(typeof define=="function"&&define.amd?define:function(n,t){typeof module!="undefined"&&module.exports?module.exports=t(require(n[0])):window.toastr=t(window.jQuery)});

// COOKIES

(function(e){if(typeof define==="function"&&define.amd&&define.amd.jQuery){define(["jquery"],e)}else{e(jQuery)}})(function(e){function n(e){return e}function r(e){return decodeURIComponent(e.replace(t," "))}function i(e){if(e.indexOf('"')===0){e=e.slice(1,-1).replace(/\\"/g,'"').replace(/\\\\/g,"\\")}try{return s.json?JSON.parse(e):e}catch(t){}}var t=/\+/g;var s=e.cookie=function(t,o,u){if(o!==undefined){u=e.extend({},s.defaults,u);if(typeof u.expires==="number"){var a=u.expires,f=u.expires=new Date;f.setDate(f.getDate()+a)}o=s.json?JSON.stringify(o):String(o);return document.cookie=[encodeURIComponent(t),"=",s.raw?o:encodeURIComponent(o),
u.expires?"; expires="+u.expires.toUTCString():"",u.path?"; path="+u.path:"",u.domain?"; domain="+u.domain:"",u.secure?"; secure":""].join("")}var l=s.raw?n:r;var c=document.cookie.split("; ");var h=t?undefined:{};for(var p=0,d=c.length;p<d;p++){var v=c[p].split("=");var m=l(v.shift());var g=l(v.join("="));if(t&&t===m){h=i(g);break}if(!t){h[m]=i(g)}}return h};s.defaults={};e.removeCookie=function(t,n){if(e.cookie(t)!==undefined){e.cookie(t,"",e.extend(n,{expires:-1}));return true}return false}});

// USER PANEL

$.fn.userpanel = function() {
	$('#usr-panel').hoverIntent( function() {
	  $('#usr-info').addClass('show');
	}, function() {
	  $('#usr-info').removeClass('show');
	}, 5)
};

// CHAT CONVERSATION

$.fn.conv = function() {
	$('.conv-text').submit( function(e) {
	  e.preventDefault();
	  var conv = $(this).siblings('.conv');
	      convInputVal = $(this).children('.conv-input').val();
	  if (convInputVal.length > 0) {
	    $(conv).append('<li class="msg sent"><div class="message"><p><span class="msg-info">Sent just now</span>'+convInputVal+'</p></div></li>');
	    $(conv).parents('.scroll').nanoScroller({ scroll: 'bottom' });
	    $('.conv-input').val('');
	  }
	})
};

// MODAL WINDOWS

$.fn.modal = function() {
	$(this).click( function() {
		var trigger = $(this).data('modal');
		      modId = trigger.split(' ')[0];
		      tabId = trigger.split(' ')[1];
		     target = $(modId);
		$(target).addClass('show').parents('#modal-ov').addClass('show');
		$.fn.modNav = function() {
			var items = $(this).children('.mod-act').find('.mod-nav');
			$(items).children('li').click( function() {
				var navTarget = $(this).data('nav');
				$(this).addClass('sel').siblings('li').removeClass('sel');
				if ($(this).has('.unread-ind')) { $(this).children('.unread-ind').fadeOut(200); };
				$(this).parents('.mod-act').siblings('.mod-body').children(navTarget).addClass('show').siblings('.show').removeClass('show');
			});
			if ( trigger.split(' ').length > 1) {
				var navBtn = $(items).children('li[data-nav="'+tabId+'"]');
				$(navBtn).addClass('sel').siblings('li').removeClass('sel');
				$(navBtn).parents('.mod-act').siblings('.mod-body').children(tabId).addClass('show').siblings('.show').removeClass('show');
			};
		};
		if ($(target).has('.mod-nav')) { $(target).modNav() };
		$('#wrapper').addClass('fixed');
	});
	$('#modal-ov, .modal .close').click( function(e) {
		if ($(e.target).is('.modal, .modal *:not(.close)')) return;
		$('.modal').removeClass('show').parents('#modal-ov').removeClass('show');
		$('#wrapper').removeClass('fixed');
	})
};

// CONTENT FUNCTIONS

$.fn.tgclass = function() {
	$(this).click( function() {
		var trigger = $(this);
		triggerdata = $(trigger).data('tgcls');
		$.fn.togglefn = function () {
			var target = triggerdata.split(' ')[0];
		    targetclass = triggerdata.split(' ')[1];
			$('body').find(target).toggleClass(targetclass);
		};
		if (typeof triggerdata == 'undefined') {
			var triggerdata = $(this).find('*[data-tgcls]').data('tgcls');
			if (typeof triggerdata == 'undefined') { return false } else { $.fn.togglefn(); }; 
		} else {
			$.fn.togglefn();
		}
	})
};

$.fn.contNav = function() {
	$('.nav-box').each( function() {
		var box = $(this);
		   menu = box.children('.nav');
		   body = box.children('.nav-body');
		   actbtn = box.children('.nav-act');

		$('.nav li').click( function() {
			var parent = $(this).parent('.nav');
				body = parent.siblings('.nav-body');
				trigger = $(this).data('nav');
			     target = body.find(trigger);
			$(this).addClass('sel').siblings('.sel').removeClass('sel');
			$(target).addClass('show').siblings('.nav-item').removeClass('show');
		});

		if (body.hasClass('updown')) {
	    	var boxHeight = box.innerHeight();
				bodyOffset = body.position().top;

			if (actbtn.length > 0 && actbtn.position().top > bodyOffset) {
				actBtnHeight = actbtn.outerHeight()
			} else { actBtnHeight = 0 }

			if (box.hasClass('nav-btm')) {
				navHeight = menu.height();
				body.css('height', boxHeight - navHeight - actBtnHeight);
			} else {
				body.css('height', boxHeight - bodyOffset - actBtnHeight);
			}
	    };

	    if (box.hasClass('nav-l') || box.hasClass('nav-r')) {
	    	var boxWidth = box.innerWidth();
		    	navWidth = menu.outerWidth(true);
			body.css('width', boxWidth - navWidth);

			if (body.position().top > 1) { body.css('width', body.width() - 1) }
	    };

		$('.nav-act .next').click( function() {
			var currSel = body.children('.nav-item.show');
			    menuSel = menu.children('.sel');
			$(currSel).removeClass('show').next('.nav-item').addClass('show');
			$(menuSel).removeClass('sel').next('li').addClass('sel');
		});
		$('.nav-act .prev').click( function() {
			var currSel = body.children('.nav-item.show');
			    menuSel = menu.children('.sel');
			$(currSel).removeClass('show').prev('.nav-item').addClass('show');
			$(menuSel).removeClass('sel').prev('li').addClass('sel');
		});

		if (actbtn.length > 0) {
			$.fn.wizardSteps = function() {
				steps = body.children('.nav-item');
				if ($(steps).first().hasClass('show')) { actbtn.find('.prev').attr('disabled','disabled') } else { actbtn.find('.prev').attr('disabled', false) };
				if ($(steps).last().hasClass('show')) { actbtn.find('.next').attr('disabled','disabled') } else { actbtn.find('.next').attr('disabled', false) };
			};
			$.fn.wizardSteps();
			$('.nav li, .nav-act .next, .nav-act .prev').click( function() {
				$.fn.wizardSteps();
			});
		}
	})
};

$.fn.boxColl = function() {
	$('.box.coll').each( function() {
		if ($(this).hasClass('collapsed')) var defHeight = $(this).children('.box-body').outerHeight() + 38;
		else var defHeight = $(this).outerHeight();
		$(this).attr('data-height', defHeight);
	})
	$('.box.coll > .box-ttl').click(function() {
		var box = $(this).parents('.box');
		if ($(box).hasClass('collapsed')) $(box).removeClass('collapsed').css('height', box.data('height'));
		else $(box).addClass('collapsed');
	})
};

$.fn.flaccordion = function() {
	$(this).each( function() {
		var cont = $(this);
			contHeight = cont.innerHeight();
		    sections = cont.children('.section');
		    sectionHeight = sections.eq(0).outerHeight()
		    sectionsHeight = sectionHeight * sections.length;

		$.fn.expand = function() {
			var height = $(this).data('height');
			$(this).addClass('expanded').css('height', height);
		}
		$.fn.collapse = function() {
			$(this).removeClass('expanded').removeAttr('style');
		}

		sections.each( function() {
			var content = $(this).children('.section-content');
			if (contHeight == sectionsHeight) {
				var height = $(this).children('.section-content').outerHeight() + sectionHeight;
			} else {
				var height = contHeight - sectionsHeight + sectionHeight;
			}
			$(this).attr('data-height', height);

			if (content.outerHeight() < height - sectionHeight) {
				content.css('height', height - sectionHeight);
			} else {
				content.wrap('<div class="scroll"></div>').wrap('<div class="scroll-cont"></div>');
				content.parents('.scroll').css('height', height - sectionHeight).nanoScroller();
			}
		})
		
		sections.eq(0).expand();

		sections.click( function() {
			$(this).expand();
		    $(this).siblings('.section').collapse();
		})
	})
};

// GLOBAL FUNCTION CALLS

$.fn.loadfns = function(specificfns) {
	$('#wrapper').hide();
	$('#load').fadeIn(400);
	$(window).load( function() {
	  $('body').append('<div id="calc-test"></div>');
	  if ($('#calc-test').width() != $('body').width() - 25) $('#wrapper').addClass('altgrd');
	  $('#calc-test').remove();
	  $('#load').fadeOut(400, function() {
	    $('#wrapper').fadeIn(600, function() {
	    	if (specificfns) {
	    		specificfns();
	        }
	        $.fn.boxColl();
	        $.fn.contNav();
	    })
	  })
	});

	$.fn.notif();
	$.fn.btnfns();
	$.fn.userpanel();
	$.fn.makeSelect();
	$('.conv').conv();
	$('.ttip').tooltip();
	$('.chbox, .chbox-mini').flcheck();
	$('#usr-btn, #set-btn').modal();
	$('.tgcls').tgclass();

	// ADAPTIVE FUNCTIONS

	var docWidth = $(document).width();
	   docHeight = $(document).height();
	if (docHeight < 674) $('#wrapper').addClass('abs-nav');
	if (docWidth < 640) $('#nav').click( function() {
		$(this).toggleClass('show');
	});
	if (docWidth < 481) $('.flt-no').removeClass('flt-no');
};