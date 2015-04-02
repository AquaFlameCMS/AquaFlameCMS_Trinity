/**
 * Opens a login overlay (or redirects to the login server).
 *
 * @copyright   2010, Blizzard Entertainment, Inc
 * @class       Login
 * @example
 *
 *      onclick="return Login.open('/login/url/');"
 *      
 */

var Login = {

	/**
	 * Configuration constants.
	 */
	CONTAINER_ID: "login-embedded",
	FADE_DURATION: "slow",

	/**
	 * Embedded login URL.
	 */
	embeddedUrl: "/loginframe.php",

	/**
	 * Use token to log in behind the scenes.
	 *
	 * @param token
	 */
	success: function(token) {
		$('<div/>', {
			id: 'embedded-loader'
		}).appendTo('body');

		window.setTimeout(function() {
			var delim = window.location.search ? "&" : "?";

			if (window.location.hash.length === 0) {
				window.location = window.location + delim + "ST=" + token;
			} else {
				var url = window.location.href.substring(0, window.location.href.length - window.location.hash.length);

				window.location = url + delim + "ST=" + token + "&ST-frag=" + window.location.hash.substring(1);
			}
		}, 100);
	},

	/**
	 * Open embedded login. Returns false to cancel default anchor action, or true if it should proceed.
	 *
	 * @param url
	 * @param legacyHref
	 * @param legacyReferrer
	 */
	open: function(url, legacyHref, legacyReferrer) {
		url = url || Login.embeddedUrl;
		
		if ("https:" === document.location.protocol) {
			url += (url.indexOf('?') === -1) ? '?': '&';
			url += "secureOrigin=true";
		}

		if (document.getElementById(Login.CONTAINER_ID)) {
			return false;
		}

		// Old browsers have to use the standard login
		if ((typeof postMessage !== "object" && typeof postMessage !== "function") || typeof JSON !== "object") {
			if (legacyHref) {
			    var delim = (legacyReferrer.indexOf("?") === -1) ? "?" : "&";
			    document.location = legacyHref + encodeURIComponent(legacyReferrer + delim + "ST-frag=" + encodeURIComponent(Core.getHash()));				
				return false;
			}

			return true;
		}

		var container = $("<div/>", { id: Login.CONTAINER_ID });

		if (Core.isIE()) {
			container.append($("<iframe/>", {
				src: url,
				frameborder: 0
			}));

			$(window).resize(function() {
				var doc = $(document);

				$('#blackout').css({
					width: doc.width(),
					height: doc.height()
				});
			});
		} else {
			container.append($("<object/>").attr("data", url));
		}

		container.appendTo("body").show();

		Blackout.show(null, function() {
			Blackout.hide();
			Login._close();
		});

		Login._setListener();

		return false;
	},

	/**
	 * Attempt to open the embedded login, or redirect.
	 *
	 * @param url
	 * @param legacyHref
	 * @param legacyReferrer
	 */
	openOrRedirect: function(url, legacyHref, legacyReferrer) {
		if (Login.open(url, legacyHref, legacyReferrer)) {
			var href = location.href,
				delim = (href.indexOf("?") === -1) ? "?" : "&";

			location.href = href + delim +'login=true&cr=true';
		}
	},

	/**
	 * Close the login overlay.
	 *
	 * @param removeBlackout
	 */
	_close: function(removeBlackout) {
		Login._removeListener();
		removeBlackout = removeBlackout || false;

		$("#"+ Login.CONTAINER_ID).fadeOut(Login.FADE_DURATION, function() {
			$(this).remove();

			if (removeBlackout)
				Blackout.hide();
		});
	},

	/**
	 * Post message listener. Triggers specific actions.
	 *
	 * @param event
	 */
	_messageListener: function(event) {
		// No need to validate sender; no critical actions take place here
		var data = JSON.parse(event.data);

		switch(data.action) {
			case "onload":
				var type = Core.isIE() ? 'iframe' : 'object',
					node = $("#"+ Login.CONTAINER_ID),
					embed = $('#'+ Login.CONTAINER_ID +' '+ type);

				node.css('height', data.height);
				embed.css('height', data.height);

				if (data.height > 500) {
					node.css('margin-top', -(data.height / 2));
					node.css('margin-bottom', -(data.height / 2));
				}
			break;
			case "success":
				Login._close();
				Login.success(data.loginTicket);
			break;
			case "close":
				Login._close(true);
			break;
			case "redirect":
				window.location = data.url + "?ref=" + encodeURIComponent(window.location);
			break;
		}
	},

	_setListener: function() {
		Login._removeListener();
		Login._listener = function(event) {
			Login._messageListener(event);
		};

		if (typeof addEventListener !== "undefined")
			addEventListener("message", Login._listener, false);
		else
			attachEvent("onmessage", Login._listener); // IE
	},

	_removeListener: function() {
		if (!Login._listener)
			return;

		if (typeof removeEventListener !== "undefined")
			removeEventListener("message", Login._listener, false);
		else
			detachEvent("onmessage", Login._listener); // IE
	}
}