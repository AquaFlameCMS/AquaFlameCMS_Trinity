// Place use strict in the first file so that aggregation inherits it
"use strict";

/**
 * Application related functionality.
 */
var App = {

	/**
	 * Enable the explore links.
	 *
	 * @constructor
	 */
	initialize: function() {
		var links = $('a[rel="javascript"]');

		if (links.length) {
			links
				.removeAttr('onclick')
				.removeAttr('onmouseover')
				.removeAttr('title')
				.css('cursor', 'pointer');
		}

		var supportLink = $('#support-link'),
			exploreLink = $('#explore-link'),
			newsLink = $('#breaking-link'),
			authLink = $('#auth-link');

		if (supportLink.length > 0) {
			supportLink.unbind().click(function() {
				Tickets.loadStatus();
				Toggle.open(this, 'active', '#support-menu');
				return false;
			});
		}

		if (authLink.length > 0) {
			authLink.unbind().click(function() {
				Toggle.open(this, 'active', '#auth-menu');
				return false;
			});

			$('#auth-menu a').click(function() {
				var label;

				if (this.className === 'auth-close') {
					Toggle.open(authLink, 'active', '#auth-menu');
					authLink.parent().hide();
					label = 'Close';
				} else if (this.className === 'auth-button') {
					label = 'Add';
				} else {
					label = 'More';
				}

				Cookie.create('serviceBar.authCheck', 1, {
					expires: 744, // 1 month of hours
					path: '/'
				});
			});
		}

		if (exploreLink.length > 0) {
			exploreLink.unbind().click(function() {
				Toggle.open(this, 'active', '#explore-menu');
				return false;
			});
		}

		if (newsLink.length > 0) {
			newsLink.unbind().click(function() {
				App.breakingNews();
				return false;
			});
		}
	},

	/**
	 * Hide the service bar warnings.
	 *
	 * @param target
	 * @param cookie
	 */
	closeWarning: function(target, cookie) {
		$(target).hide();

		if (cookie)
			App.saveCookie(cookie);
	},

	/**
	 * Open and close the breaking news.
	 *
	 * @param lastId
	 */
	breakingNews: function(lastId) {
		var node = $("#breaking-news");
		var news = $("#announcement-warning");

		if (news.is(':visible')) {
			news.hide();
			node.removeClass('opened');
		} else {
			news.show();
			node.addClass('opened');
		}

		if (lastId) {
			Cookie.create('serviceBar.breakingNews', lastId);
		}
	},

	/**
	 * Save a cookie.
	 *
	 * @param name
	 */
	saveCookie: function(name) {
		Cookie.create('serviceBar.' + name, 1, {
			expires: 8760, // 1 year of hours
			path: '/'
		});
	},

	/**
	 * Reset a cookie.
	 *
	 * @param name
	 */
	resetCookie: function(name) {
		Cookie.create('serviceBar.' + name, 0, {
			expires: 8760, // 1 year of hours
			path: '/'
		});
	},

	/**
	 * Hide service bar elements depending on cookies.
	 */
	serviceBar: function() {
		var browser = Cookie.read('serviceBar.browserWarning');
		var locale = Cookie.read('serviceBar.localeWarning');

		if (browser === 1)
			$('#browser-warning').hide();

		if (locale === 1)
			$('#i18n-warning').hide();
	},

	/**
	 * Values for sidebar module loading.
	 */
	totalModules: 0,
	totalLoaded: 0,
	modules: [],
	forceLoad: true,

	/**
	 * Dynamically load more than one sidebar module at a time.
	 *
	 * @param modules
	 */
	sidebar: function(modules) {
		App.totalModules = modules.length;

		if (modules.length) {
			for (var i = 0; i <= (modules.length - 1); ++i) {
				App.loadModule(modules[i], i);
			}
		}

		// Show the modules after 5 seconds incase some are hanging
		window.setTimeout(function() {
			if (App.forceLoad) {
				App.showSidebar();
			}
		}, 5000);
	},

	/**
	 * Show the sidebar modules.
	 */
	showSidebar: function() {
		App.forceLoad = false;

		var dynamicSidebarTarget = $("#dynamic-sidebar-target");
		var sidebar = $('#sidebar .sidebar-bot');

		for (var i = 0; i < App.totalModules; i++) {
			if (App.modules[i]) {
				App.modules[i].appendTo(dynamicSidebarTarget);
			}
		}

		$('#sidebar-loading').fadeOut('normal', function() {
			sidebar.find('.sidebar-module').fadeIn();
			$(this).remove();
		});

		// Reset
		App.modules = [];
		App.totalModules = 0;
		App.totalLoaded = 0;
	},

	/**
	 * Load the content of a sidebar module through AJAX.
	 *
	 * @param module
	 * @param index
	 */
	loadModule: function(module, index) {
		var dynamicSidebarTarget = $("#dynamic-sidebar-target");

		$.ajax({
			url: Core.baseUrl + '/sidebar/' + module.type + (module.query || ""),
			type: 'GET',
			dataType: 'html',
			cache: true,
			global: false,
			success: function(data) {
				App.totalLoaded++;

				if ($.trim(data) !== "") {
					var node = $(data);

					if (App.forceLoad) {
						node.hide();
						App.modules[index] = node;
					} else {
						node.appendTo(dynamicSidebarTarget);
					}
				}
			},
			error: function() {
				App.totalLoaded++;
			},
			complete: function() {
				if (App.totalLoaded >= App.totalModules) {
					window.setTimeout(App.showSidebar, 100);
				}
			}
		});
	}

};

$(function() {
	App.initialize();
});/**
 * Creates a full page blackout.
 */
var Blackout = {

	/**
	 * Has the blackout been opened before?
	 */
    initialized: false,

	/**
	 * The DOM element.
	 */
    element: null,

    /**
     * Shim frame for IE6
     */
    shim: null,

	/**
	 * Create the div to be used.
	 *
	 * @constructor
	 */
    initialize: function() {
        Blackout.element = $('<div/>', { id: 'blackout' });
		Blackout.element
			.on('click', Core.stopPropagation)
			.on('keyup', Blackout.listen);

        $("body").append(Blackout.element);

        // IE6 fix
        if (Core.browser.full === 'ie6') {
            Blackout.element.css('backgroundColor', '#000');
            Blackout.element.css('filter', 'alpha(opacity=70)');
            Blackout.shim = $('<iframe />', {
                src: 'javascript:false;',
                frameborder: 0,
                scrolling: 'no'
            }).addClass('support-shim');
            Blackout.element.append(Blackout.shim);
        }

        Blackout.initialized = true;
    },

	/**
	 * Listen for keyboard esc input; if so, close blackout.
	 *
	 * @param e
	 */
	listen: function(e) {
		if (e.which === KeyCode.esc) {
			Blackout.hide();
		}
	},

    /**
     * Shows the blackout.
     *
     * @param callback			Function that gets called after blackout shows
     * @param onClick			Function binds onclick functionality to blackout
	 * @param transparent		Boolean on whether to make the background transparent (true) or black (false)
     */
    show: function(callback, onClick, transparent) {
        if (!Blackout.initialized) {
            Blackout.initialize();
		}

        // IE fix
        if (Core.isIE()) {
            Blackout.element
                .css("width", Page.dimensions.width)
                .css("height", $(document).height());

            // IE6 fix
            if (Core.browser.full === 'ie6') {
                Blackout.shim
                    .css('width', Blackout.element.css('width'))
                    .css('height', Blackout.element.css('height'));
                if (Core.isCallback(onClick)) {
                    Blackout.shim[0].contentWindow.document.onclick = onClick;
                }
            }
        }

		if (transparent) {
			Blackout.element.addClass('blackout-transparent');
		}

        // Show blackout
        Blackout.element.show();

        // Call optional functions
        if (Core.isCallback(callback)) {
            callback();
		}

        if (Core.isCallback(onClick)) {
            Blackout.element.click(onClick);
		}
    },

    /**
     * Hides blackout.
     *
     * @param callback		Function that gets called after blackout hides
     */
    hide: function(callback) {
		Blackout.element.hide();

        if (Core.isCallback(callback)) {
            callback();
		}

        Blackout.element.unbind("click").removeClass('blackout-transparent');
    }
};/**
 * Object.create() polyfill for older browsers.
 */
if (!Object.create) {
	Object.create = function(o) {
		if (arguments.length > 1) {
			throw new Error('Object.create implementation only accepts the first parameter.');
		}

		function F() {}
		F.prototype = o;
		return new F();
	};
}


/**
 * Object.getPrototypeOf polyfill for older browsers.
 *
 * @see http://ejohn.org/blog/objectgetprototypeof/
 */
if (!Object.getPrototypeOf) {
	if (typeof 'test'.__proto__ === 'object') {
		Object.getPrototypeOf = function(object) {
			return object.__proto__;
		};
	} else {
		Object.getPrototypeOf = function(object) {
			// May break if the constructor has been tampered with
			return object.constructor.prototype;
		};
	}
}


/**
 * Polyfill for String.fromCodePoint() in ES6.
 * Generates strings from Unicode code points. String.fromCharCode() cannot handle high code points and should be deprecated.
 */
if (!String.fromCodePoint) {
	/*!
	* ES6 Unicode Shims 0.1
	* (c) 2012 Steven Levithan <http://slevithan.com/>
	* MIT License
	*/
	String.fromCodePoint = function fromCodePoint () {
		var chars = [], point, offset, units, i;
		for (i = 0; i < arguments.length; ++i) {
			point = arguments[i];
			offset = point - 0x10000;
			units = point > 0xFFFF ? [0xD800 + (offset >> 10), 0xDC00 + (offset & 0x3FF)] : [point];
			chars.push(String.fromCharCode.apply(null, units));
		}
		return chars.join("");
	};
}


/**
 * Prototype extensions.
 */
if (!String.prototype.trim) {
	String.prototype.trim = function() {
		return $.trim(this);
	};
}

if (!String.prototype.capitalize) {
	String.prototype.capitalize = function() {
		return this.charAt(0).toUpperCase() + this.slice(1);
	};
}


/**
 * The following 2 functions will heck if jQuery.expr.createPseudo exist.
 * jQuery.expr.createPseudo was introduced in jQuery 1.8, this check ensures apps using older version
 * of jQuery won't break.
 */

/**
 * caseInsensitiveContains jquery custom pseudoselector
 *
 */
jQuery.expr[":"].caseInsensitiveContains = typeof(jQuery.expr.createPseudo) == "function" ?
    jQuery.expr.createPseudo(function(arg) {
        return function(elem) {
            return jQuery(elem).text().toLocaleLowerCase().indexOf(arg.toLocaleLowerCase()) >= 0;
        };
    }) :
    function(elem, i, match) {
        return jQuery(elem).text().toLocaleLowerCase().indexOf(match[3].toLocaleLowerCase()) >= 0;
    };

/**
 * caseInsensitiveStartsWith jquery custom pseudoselector
 *
 */
jQuery.expr[":"].caseInsensitiveStartsWith =  typeof(jQuery.expr.createPseudo) == "function" ?
    jQuery.expr.createPseudo(function(searchString) {
        return function(elem) {
            return jQuery(elem).text().toLocaleLowerCase().indexOf(searchString.toLocaleLowerCase()) === 0;
        };
    }) :
    function(elem, i, match) {
        return jQuery(elem).text().toLocaleLowerCase().indexOf(match[3].toLocaleLowerCase()) === 0;
    };


/**
 * jQuery extensions.
 */
if (!jQuery.Event.prototype.stop) {
	jQuery.Event.prototype.stop = function() {
		this.preventDefault();
		this.stopPropagation();
	};
}

/**
 * Setup ajax calls.
 */
$.ajaxSetup({
	error: function(xhr) {
		if (xhr.readyState !== 4) {
			return false;
		}

		if (xhr.getResponseHeader("X-App") === "login") {
			Login.openOrRedirect();
			return false;
		}

		if (xhr.status) {
			switch (xhr.status) {
				case 301:
				case 302:
				case 307:
				case 403:
				case 404:
				case 500:
				case 503:
					return false;
				break;
			}
		}

		return true;
	},
	statusCode: {
		403: function() {
			// Via AJAX calls
			Login.openOrRedirect();
		}
	}
});
/**
 * Methods for creating, reading, and deleting cookies.
 */
var Cookie = {

	/**
	 * Cached cookies.
	 */
	cache: {},

	/**
	 * Create a cookie. Can accept a third parameter as a literal object of options.
	 *
	 * @param key
	 * @param value
	 * @param options
	 */
	create: function(key, value, options) {
		options = $.extend({}, options);
		options.expires = options.expires || 1; // Default expiration: 1 hour

		if (typeof options.expires === 'number') {
			var hours = options.expires;

			options.expires = new Date();
			options.expires.setTime(options.expires.getTime() + (hours * 3600000));
		}

		var cookie = [
			encodeURIComponent(key) + '=',
			options.escape ? encodeURIComponent(value) : value,
			options.expires ? '; expires=' + options.expires.toUTCString() : '',
			options.path ? '; path=' + options.path : '',
			options.domain ? '; domain=' + options.domain : '',
			options.secure ? '; secure' : ''
		];

		document.cookie = cookie.join('');

		if (Cookie.cache) {
			if (options.expires.getTime() < (new Date()).getTime()) {
				delete Cookie.cache[key];
			} else {
				Cookie.cache[key] = value;
			}
		}
	},

	/**
	 * Read a cookie.
	 *
	 * @param key
	 * @return string
	 */
	read: function(key) {
		// Use cache when available
		if (Cookie.cache[key]) {
			return Cookie.cache[key];
		}

		var cache = {};
		var cookies = document.cookie.split(';');

		if (cookies.length > 0) {
			for (var i = 0; i < cookies.length; i++) {
				var parts = cookies[i].split('=');

				if (parts.length >= 2) {
					cache[$.trim(parts[0])] = parts[1];
				}
			}
		}

		Cookie.cache = cache;

		return cache[key] || null;
	},

	/**
	 * Delete a cookie.
	 *
	 * @param key
	 */
	erase: function(key, options) {
		if (!options) {
			options = { expires: -1 };

		} else if (!options.expires) {
			options.expires = -1;
		}

		Cookie.create(key, 0, options);
	},

	/**
	 * Returns whether cookies are supported/enabled by the browser
	 *
	 * @return boolean
	 */
	isSupported: function() {
		return (document.cookie.indexOf('=') !== -1);
	}
};/**
 * Core global functionality.
 */
var Core = {

	/**
	 * Base context URL for the project.
	 */
	baseUrl: '/',

	/**
	 * Battle.net support site URL.
	 */
	supportUrl: '/support/',

	/**
	 * The cached string for the browser.
	 */
	browser: null,

	/**
	 * Dynamic load queue.
	 */
	deferredLoadQueue: [],

	/**
	 * Current locale and region.
	 */
	locale: 'en-us',
	region: 'us',

	/**
	 * Short date format
	 */
	shortDateFormat: 'MM/dd/Y',

	/**
	 * Date/time format
	 */
	dateTimeFormat: 'dd/MM/yyyy HH:mm',

	/**
	 * The current project.
	 */
	project: '',

	/**
	 * Path to static content.
	 */
	staticUrl: '/',
	sharedStaticUrl: '/local-common/',

	/**
	 * The current host and protocol.
	 */
	host: '',

	/**
	 * User agent specification
	 */
	userAgent: 'web',

	/**
	 * Initialize the script.
	 *
	 * @constructor
	 */
	initialize: function() {
		Core.processLoadQueue();
		Core.ui();
		Core.host = location.protocol + '//' + (location.host || location.hostname);

		// Determine the user agent and add the class name to the html tag
		var html = $('html'),
			browser = Core.getBrowser();

		if (browser.name !== '') {
			html.addClass(browser.name).addClass(browser.full);

			if (browser.name === 'ie' && (browser.version === 6 || browser.version === 7)) {
				html.addClass('ie67');
			}
		}
	},

	/**
	 * Return letter (alphabet) values only within a string.
	 *
	 * @param string
	 * @return string
	 */
	alpha: function(string) {
		return string.replace(/[^a-zA-Z]/gi, '');
	},

	/**
	 * Create a frame within the document.
	 *
	 * @param url
	 * @param width
	 * @param height
	 * @param parent
	 * @param id
	 */
	appendFrame: function(url, width, height, parent, id) {
		if (typeof url === 'undefined')
			return;

		if (typeof width === 'undefined')
			width = 1;

		if (typeof height === 'undefined')
			height = 1;

		if (typeof parent === 'undefined')
			parent = $('body');

		if (Core.isIE()) {
			parent.append('<iframe src="' + url + '" width="' + width + '" height="' + height + '" scrolling="no" frameborder="0" allowTransparency="true"' + ((typeof id !== 'undefined') ? ' id="' + id + '"' : '') + '></iframe>');
		} else {
			parent.append('<object type="text/html" data="' + url + '" width="' + width + '" height="' + height + '"' + ((typeof id !== 'undefined') ? ' id="' + id + '"' : '') + '></object>');
		}
	},

	/**
	 * Fix column headers if multiple lines.
	 *
	 * @param query
	 * @param baseHeight
	 */
	fixTableHeaders: function(query, baseHeight) {
		$(query).each(function() {
			baseHeight = baseHeight || 18;

			var table = $(this);
			var height = baseHeight;

			table.find('.sort-link').each(function() {
				var linkHeight = $(this).height();

				if (linkHeight > height) {
					height = linkHeight;
				}
			});

			if (height > baseHeight) {
				table.find('.sort-link, .sort-tab').css('height', height);
			}
		});
	},

	/**
	 * Format a locale to a specific structure.
	 *
	 * @param format
	 * @param divider
	 * @return string
	 */
	formatLocale: function(format, divider) {
		divider = divider || '-';
		format = format || 1;

		switch (format) {
			case 1:
			default:
				return Core.locale.replace('-', divider);
			break;
			case 2:
				var parts = Core.locale.split('-');
				return parts[0] + divider + parts[1].toUpperCase();
			break;
			case 3:
				return Core.locale.toUpperCase().replace('-', divider);
			break;
		}
	},

	/**
	 * Convert a datetime string to a users local time zone and return as a string using the specified format.
	 *
	 * http://www.w3.org/TR/html5/common-microsyntaxes.html#valid-global-date-and-time-string
	 *
	 * @param format
	 * @param datetime (2010-07-22T07:41-07:00)
	 * @return string
	 */
	formatDatetime: function(format, datetime) {
		var localDate;

		if (!datetime) {
			localDate = new Date();
		} else {
			// gecko
			localDate = new Date(datetime);

			// webkit
			if (isNaN(localDate.getTime())) { // 2010-07-22 07:41 GMT-0700
				datetime = datetime.substring(0,10) + ' ' + datetime.substring(11,16) + ':00 GMT' + datetime.substring(16,19) + datetime.substring(20,22);
				localDate = new Date(datetime);
			}

			// safari still thinking different
			if (isNaN(localDate.getTime())) { // 2010/07/22 07:41 GMT-0700
				datetime = datetime.substring(0,4) + '/' + datetime.substring(5,7) + '/' + datetime.substring(8,29);
				localDate = new Date(datetime);
			}

			// trident
			if (isNaN(localDate.getTime())) { // 07-22 07:41 GMT-0700 2010
				datetime = datetime.substring(5,10) + ' ' + datetime.substring(11,16) + ' GMT' + datetime.substring(23,28) + ' ' + datetime.substring(0,4);
				localDate = new Date(datetime);
			}

			if (isNaN(localDate.getTime())) {
				return false;
			}
		}

		if (!format) {
			format = 'yyyy-MM-ddThh:mmZ';
		}

		var hr = localDate.getHours(),
			meridiem = 'AM';

		if (hr > 12) {
			hr -= 12;
			meridiem = 'PM'

		} else if (hr === 12) {
			meridiem = 'PM'

		} else if (hr === 0) {
			hr = 12;
		}

		var tz = parseInt(localDate.getTimezoneOffset() / 60 * -1, 10);

		if (tz < 0) {
			tz = '-' + Core.zeroFill(Math.abs(tz), 2) + ':00';
		} else {
			tz = ' + ' + Core.zeroFill(Math.abs(tz), 2) + ':00';
		}

		format = format.replace('yyyy', localDate.getFullYear());
		format = format.replace('MM', Core.zeroFill(localDate.getMonth() + 1,2));
		format = format.replace('dd', Core.zeroFill(localDate.getDate(),2));
		format = format.replace('HH', Core.zeroFill(localDate.getHours(),2));
		format = format.replace('hh', Core.zeroFill(hr,2));
		format = format.replace('mm', Core.zeroFill(localDate.getMinutes(),2));
		format = format.replace('a', meridiem);
		format = format.replace('Z', tz);

		return format;
	},

	/**
	 * Detect the browser type, based on feature detection and not user agent.
	 *
	 * @return object
	 */
	getBrowser: function() {
		if (Core.browser) {
			return Core.browser;
		}

		var s = $.support,
			browser = '',
			version = 0;

		if (!s.hrefNormalized && !s.tbody && !s.style && !s.opacity) {
			if (typeof document.body.style.maxHeight !== "undefined" || window.XMLHttpRequest) {
				browser = 'ie';
				version = 7;
			} else {
				browser = 'ie';
				version = 6;
			}

		} else if (s.hrefNormalized && s.tbody && s.style && !s.opacity) {
			browser = 'ie';
			version = 8;

		// $.browser was removed from jQuery in version 1.9
		} else if (typeof $.browser !== 'undefined') {
			if ($.browser.mozilla) {
				browser = 'ff';
			} else if ($.browser.msie) {
				browser = 'ie';
			} else if ($.browser.webkit) {
				if (navigator.userAgent.toLowerCase().indexOf('chrome') >= 0) {
					browser = 'chrome';
				} else {
					browser = 'safari';
				}
			} else if ($.browser.opera) {
				browser = 'opera';
			}

			version = parseInt($.browser.version, 10);
		}

		Core.browser = {
			name: browser,
			full: browser + version,
			version: version
		};

		return Core.browser;
	},

	/**
	 * Get the hash from the URL.
	 *
	 * @return string
	 */
	getHash: function() {
		var hash = location.hash || "";

		return hash.substr(1, hash.length);
	},

	/**
	 * Return the language based off locale.
	 *
	 * @return string
	 */
	getLanguage: function() {
		return Core.locale.split('-')[0];
	},

	/**
	 * Return the region based off locale.
	 *
	 * @return string
	 */
	getRegion: function() {
		return Core.locale.split('-')[1];
	},

	/**
	 * Conveniently jump to a page.
	 *
	 * @param url
	 * @param base
	 */
	goTo: function(url, base) {
		window.location.href = (base ? Core.baseUrl : '') + url;

		if (window.event)
			window.event.returnValue = false;
	},

	/**
	 * Include a JavaScript file via XHR.
	 *
	 * @param url
	 * @param success
	 * @param cache - defaults to true
	 */
	include: function(url, success, cache) {
		$.ajax({
			url: url,
			dataType: 'script',
			success: success,
			cache: cache !== false
		});
	},

	/**
	 * Checks to see if the argument is a function/callback.
	 *
	 * @param callback
	 * @return boolean
	 */
	isCallback: function(callback) {
		return (callback && typeof callback === 'function');
	},

	/**
	 * Is the browser using IE?
	 *
	 * @param version
	 * @return boolean
	 */
	isIE: function(version) {
		var browser = Core.getBrowser();

		if (version) {
			return (version === browser.version)
		}

		return (browser.name === 'ie');
	},

	/**
	 * Loads either a JavaScript or CSS file, by default deferring the load until after other
	 * content has loaded. The file type is determined by using the file extension.
	 *
	 * @param path
	 * @param deferred - true by default
	 * @param callback
	 */
	load: function(path, deferred, callback) {
		deferred = deferred !== false;

		if (Page.loaded || !deferred) {
			Core.loadDeferred(path, callback);
		} else {
			Core.deferredLoadQueue.push(path);
		}
	},

	/**
	 * Determine which type to load.
	 *
	 * @param path
	 * @param callback
	 */
	loadDeferred: function(path, callback) {
		var queryIndex = path.indexOf("?");
		var extIndex = path.lastIndexOf(".") + 1;
		var ext = path.substring(extIndex, queryIndex === -1 ? path.length : queryIndex);

		switch (ext) {
			case 'js':
				Core.loadDeferredScript(path, callback);
			break;
			case 'css':
				Core.loadDeferredStyle(path);
			break;
		}
	},

	/**
	 * Include JS file.
	 *
	 * @param path
	 * @param callback
	 */
	loadDeferredScript: function(path, callback) {
		$.ajax({
			url: path,
			cache: true,
			global: false,
			dataType: 'script',
			success: callback
		});
	},

	/**
	 * Include CSS file; must be done this way because of IE (of course).
	 *
	 * @param path
	 * @param media
	 */
	loadDeferredStyle: function(path, media) {
		$('head').append('<link rel="stylesheet" href="' + path + '" type="text/css" media="' + (media || "all") + '" />');
	},

	/**
	 * Replace {0}, {1}, etc. with the passed arguments.
	 *
	 * @param str
	 * @return string
	 */
	msg: function(str) {
		for (var i = 1, len = arguments.length; i < len; ++i) {
			str = str.replace("{" + (i - 1) + "}", arguments[i]);
		}

		return str;
	},

	/**
	 * This version can handle multiple occurences of the same token, but is slower due to the use of a RegExp. Only use if needed.
	 *
	 * @param str
	 * @return string
	 */
	msgAll: function(str) {
		for (var i = 1, len = arguments.length; i < len; ++i) {
			str = str.replace(new RegExp("\\{" + (i - 1) + "\\}", "g"), arguments[i]);
		}

		return str;
	},

	/**
	 * Return numeric values only within a string.
	 *
	 * @param string
	 * @return int
	 */
	numeric: function(string) {
		string = string.replace(/[^0-9]/gi, '');

		if (!string || isNaN(string)) {
			string = 0;
		}

		return string;
	},

	/**
	 * Open the link in a new window.
	 *
	 * @param node
	 * @return false
	 */
	open: function(node) {
		if (node.href)
			window.open(node.href);

		return false;
	},

	/**
	 * Helper function for event preventDefault.
	 *
	 * @param e
	 */
	preventDefault: function(e) {
		e.preventDefault();
	},

	/**
	 * Run on page load!
	 */
	processLoadQueue: function() {
		if (Core.deferredLoadQueue.length > 0) {
			for (var i = 0, path; path = Core.deferredLoadQueue[i]; i++) {
				Core.load(path);
			}
		}
	},

	/**
	 * Generate a random number between 0 and up to the argument.
	 *
	 * @param no
	 * @return int
	 */
	randomNumber: function(no) {
		return Math.floor(Math.random() * no);
	},

	/**
	 * Scroll to a specific part of the page.
	 *
	 * @param target
	 * @param duration
	 * @param callback
	 */
	scrollTo: function(target, duration, callback) {
		target = $(target);

		if (target.length !== 1) {
			return;
		}

		var win = $(window),
			winTop = win.scrollTop(),
			winBottom = winTop + win.height(),
			top = target.offset().top;

		top -= 15;

		if (top >= winTop && top <= winBottom) {
			return;
		}

		// $.browser was removed from jQuery in version 1.9
		if (typeof $.browser !== 'undefined') {
			$($.browser.webkit ? 'body' : 'html').animate({
				scrollTop: top
			},
			duration || 350,
			callback || null);
		}
	},

	/**
	 * Scroll to a specific part of the page (enough to make sure it's fully visible).
	 *
	 * @param target
	 * @param duration
	 * @param callback
	 */
	scrollToVisible: function(target, duration, callback) {
		target = $(target);

		if (target.length !== 1) {
			return;
		}

		var win = $(window),
			winTop = win.scrollTop(),
			winBottom = winTop + win.height(),
			top = target.offset().top,
			bottom = top + target.height();

		top -= 15;
		bottom += 15;

		if (top >= winTop && bottom <= winBottom) {
			return;
		}

		// $.browser was removed from jQuery in version 1.9
		if (typeof $.browser !== 'undefined') {
			$($.browser.webkit ? 'body' : 'html').animate({
				scrollTop: (top < winTop ? top : bottom - win.height())
			},
			duration || 350,
			callback || null);
		}
	},

	/**
	 * Helper function for event stopPropagation and preventDefault.
	 *
	 * @param e
	 */
	stopEvent: function(e) {
		e.stop();
	},

	/**
	 * Helper function for event stopPropagation.
	 *
	 * @param e
	 */
	stopPropagation: function(e) {
		e.stopPropagation();
	},

	/**
	 * Trims specific characters off the end of a string.
	 *
	 * @param string
	 * @param c
	 * @return string
	 */
	trimChar: function(string, c) {
		if (string.substr(0, 1) === c)
			string = string.substr(1, (string.length - 1));

		if (string.substr((string.length - 1), string.length) === c)
			string = string.substr(0, (string.length - 1));

		return string;
	},

	/**
	 * Trims specific characters off the right end of a string.
	 *
	 * @param string
	 * @param charlist
	 * @return string
	 */
	trimRight: function(string, charlist) {
		charlist = !charlist ? ' \\s\u00A0' : (charlist + '').replace(/([\[\]\(\)\.\?\/\*\{\}\+\$\^\:])/g, '\\$1');

		return (string + '').replace( new RegExp('[' + charlist + ']+$', 'g') , '');
	},

	/**
	 * Apply global functionality to certain UI elements.
	 *
	 * @param context
	 */
	ui: function(context) {
		context = context || document;

		if (Core.isIE(6)) {
			$(context).find('button.ui-button').hover(
				function() {
					if (!this.disabled || this.className.indexOf('disabled') == -1) {
						$(this).addClass('hover');
					}
				},
				function() {
					$(this).removeClass('hover');
				}
			);
		}

		if (Core.project !== 'bam') {
			$(context).find('button.ui-button').click(function(e) {
				var self = $(this);
				var alt = self.attr('data-text');

				if (typeof alt === 'undefined') {
					alt = "";
				}

				if (this.tagName.toLowerCase() === 'button' && alt !== "") {
					if (self.attr('type') === 'submit') {
						e.preventDefault();
						e.stopPropagation();

						self.find('span span').html(alt);
						self.removeClass('hover')
							.addClass('processing')
							.attr('disabled', 'disabled');

						// Manually submit
						self.parents('form').submit();
					}
				}

				return true;
			});
		}
	},

	/**
	 * Zero-fills a number to the specified length (works on floats and negatives, too).
	 *
	 * @param number
	 * @param width
	 * @param includeDecimal
	 * @return string
	 */
	zeroFill: function(number, width, includeDecimal) {
		if (typeof includeDecimal === 'undefined') {
			includeDecimal = false;
		}

		var result = parseFloat(number),
			negative = false,
			length = width - result.toString().length,
			i = length - 1;

		if (result < 0) {
			result = Math.abs(result);
			negative = true;
			length++;
			i = length - 1;
		}

		if (width > 0) {
			if (result.toString().indexOf('.') > 0) {
				if (!includeDecimal) {
					length += result.toString().split('.')[1].length;
				}

				length++;
				i = length - 1;
			}

			if (i >= 0) {
				do {
					result = '0' + result;
				} while (i--);
			}
		}

		if (negative) {
			return '-' + result;
		}

		return result;
	},

	/**
	 * Fire a Google Analytics event asynchronously.
	 */
	trackEvent: function(eventCategory, eventAction, eventLabel) {
		window._gaq = _gaq || [];
		_gaq.push(['_trackEvent', eventCategory, eventAction, eventLabel]);
	},

	/**
	 * Fire a GA event on click
	 * @param selector jquery element selector
	 * @param eventCategory GA category if data-category not specified, Core.project if neither specified
	 * @param eventAction GA action if data-action not specified, "Click" if neither specified
	 * @param eventLabel GA label if data-label not specified, Core.locale if neither specified
	 */
	bindTrackEvent: function(selector, eventCategory, eventAction, eventLabel) {
		$(selector).on('click.analytics', function() {
			var self = $(this);
			eventCategory = self.data('category') || eventCategory || Core.project;
			eventAction = self.data('action') || eventAction || "Click";
			eventLabel = self.data('label') || eventLabel || Core.locale;
			Core.trackEvent( eventCategory, eventAction, eventLabel );
		});
	},


	/**
	 * Utility for boxes that can be closed permanently.
	 * e.g: New Feature Box, BlizzCon Bar
	 *
	 * @param nodeQuery
	 * @param cookieId
	 * @param options - startDate, endDate, cookieParams, fadeIn, trackingCategory, trackingAction, onShow, onHide
	 */
	showUntilClosed: function(nodeQuery, cookieId, options) {
		options = options || {};

		var node = $(nodeQuery),
			COOKIE_NAME = 'bnet.closed.' + cookieId;

		if (!node.length || !Cookie.isSupported() || Cookie.read(COOKIE_NAME)) {
			return false;
		}

		// Date validation
		var now = new Date();

		if (options.startDate) {
			var startDate = new Date(options.startDate);

			if ((startDate - now) > 0) {
				return false;
			}
		}

		if (options.endDate) {
			var endDate = new Date(options.endDate);

			if ((endDate - now) < 0) {
				return false;
			}
		}

		// Show the node
		if (options.fadeIn) {
			node.fadeIn(options.fadeIn, options.onShow);
		} else {
			node.show();

			if (options.onShow) {
				options.onShow();
			}
		}

		// Click events
		var cookieParams = $.extend({
			path: Core.baseUrl,
			expires: 8760
		}, options.cookieParams || {});

		node.delegate('a', 'click', function() {
			var self = $(this),
				trackingLabel = self.data('label'),
				closeButton = (this.rel === 'close');

			if (closeButton) {
				node.hide();

				if (options.onHide) {
					options.onHide();
				}
			}

			if (closeButton || !options.closeButtonOnly) {
				Cookie.create(COOKIE_NAME, 1, cookieParams);
			}

			if (trackingLabel) {
				Marketing.trackImpression(options.trackingCategory || 'Tracking', options.trackingAction || 'Click', trackingLabel);
			}
		});

		return true;
	}

};

$(function() {
	Core.initialize();
});
/*
	Feedback Form
*/
var Feedback = {
	form: null,

	// map field IDs to the name attributes sent in request
	ID_MAP: {
		'url': 'feedback-page-url',
		'email': 'feedback-email',
		'subject': 'feedback-subject',
		'body': 'feedback-body'
	},

	overlayInstance: null,

	pageErrorMsg: '',
	pageReferring: '',

	feedbackUrl: '',

	initialize: function () {
		// if we're looking at the fallback version of the page, don't do anything.
		if ($('#feedback-page').length) {
			return;
		}

		this.feedbackUrl = '/' + Core.locale + '/feedback/';

		// assign event handlers to form callers/buttons

		var $feedbackSuggestionLinks = $('.feedback-suggestion-open'),
			$feedbackErrorLinks = $('.feedback-error-open'),
			self = this;

		$feedbackSuggestionLinks.each(function () {
			this.onclick = function () {
				self.open('suggestion');
				return false;
			};
		});

		$feedbackErrorLinks.each(function () {
			this.onclick = function () {
				self.open('bug');
				return false;
			};
		});

		this.overlayInstance = Overlay;
	},

	open: function (type) {
		var self = this;

		self.overlayInstance.open(self.feedbackUrl + 'feedback-form.frag', {
			ajax: true,
			className:'feedback-overlay',
			bindClose: false
		});

		$('#overlay').unbind('overlayLoaded');

		// custom event 'overlayLoaded' added to Overlay
		$('#overlay').bind('overlayLoaded', function () {
			var overlayWrapper = $(self.overlayInstance.wrapper);

			self.overlayInstance.position(); // Position is calculated wrong initially, possibly due to ajax not being complete

			// Overlay does not give us an option to set position, so override it here
			overlayWrapper.css('position', 'absolute');

			// make sure the overlay isn't positioned offscreen
			if (parseInt(overlayWrapper.css('top'), 10) < 0) {
				overlayWrapper.css('top', 0);
			}

			self.form = document.getElementById('website-feedback');

			var $headline = $('.feedback-wrapper h2'),
				$introText = $('#feedback-intro-message'),
				submitBtn = document.getElementById('feedback-submit'),
				subjectField = document.getElementById('feedback-subject'),
				pageUrlField = document.getElementById('feedback-page-url'),
				pageUrlSystemField = document.getElementById('page-url-system'),
				$bodyLabel = $('.feedback-body-label #body-label-text'),
				bodyField = document.getElementById('feedback-body'),
				charCount = document.getElementById('feedback-body-char-count'),
				$charCount = $(charCount),
				maxCount = bodyField.getAttribute('maxlength');

			// override the X close button in the overlay to use our cancel method
			$('.overlay-close').unbind('click').bind('click', function (e) {
				e.preventDefault();
				self.cancel();
			});


			if (type === 'suggestion') {
				$headline.html(Feedback.titleWebsiteSuggestion);
				$introText.html(Feedback.introFeedback);
			}
			else {
				$headline.html(Feedback.titleWebsiteFeedback);
				$introText.html(Feedback.introError);
				$bodyLabel.html(Feedback.feedbackError);
			}

			self.form.setAttribute('action', self.feedbackUrl + type);

			// prepopulate Subject field with page error msg if available
			subjectField.value = self.pageErrorMsg;

			// prepopulate Page URL field with referring page URL
			pageUrlField.value = self.pageReferring;
			pageUrlSystemField.value = self.pageReferring;

			// move focus to the overlay
			$(pageUrlField).focus();

			// keep focus in overlay
			$('#blackout').bind('click.feedback', function (e) {
				$(pageUrlField).focus();
			});

			$(pageUrlField).keydown(function (e) {
				if (e.which === 9 && e.shiftKey) {
					e.preventDefault();
					$(cancelBtn).focus();
				}
			});

			submitBtn.onclick = function () {
				if (!self.submit()) {
					return false;
				}
			};

			// textarea character counter
			charCount.parentNode.style.display = 'block';
			charCount.firstChild.nodeValue = maxCount;
			bodyField.onkeyup = function () {
				if (this.value.length > maxCount) {
					$(this).addClass('.feedback-error');
					$charCount.addClass('error');
				}
				else {
					$charCount.removeClass('error');
				}
				$charCount.html(maxCount - this.value.length);
			};
		});
	},

	submit: function () {
		var submitUrl = this.form.getAttribute('action'),
			emailField = document.getElementById('feedback-email'),
			charCount = document.getElementById('feedback-body-char-count'),
			feedbackBody = document.getElementById('feedback-body'),
			//emailAddress = $.trim(emailField.value),
			$introText = $('#feedback-intro-message'),
			self = this;

		// clear error states
		$('.feedback-error').each(function () {
			var $this = $(this);

			$this.removeClass('feedback-error');
			if ($this.attr('id') !== 'feedback-body-char-count') {
			$this.next('.feedback-error-msg').hide();
			}
			$(charCount).removeClass('error');
		});

		if (feedbackBody.value.length > (feedbackBody.hasAttribute('maxlength') ? feedbackBody.getAttribute('maxlength') : 2000)) {
			$(feedbackBody).addClass('feedback-error');
			$(charCount).addClass('error');
		}

		// validate each field with .feedback-required
		var $requiredFields = $('.feedback-required', this.form);

		$requiredFields.each(function () {
			var $el = $(this);
			if (($el.val() === null) || ($.trim($el.val()) === '')) {
				$el.addClass('feedback-error');
				$el.next('.feedback-error-msg').show();
			}
		});

		// return user to form if required fields left empty or any errors
		if ($('.feedback-error').length === 0) {

			var serializedForm = $(self.form).serializeArray();

			if ($.trim(emailField.value) === '') {
				for (var i = 0, iLen = serializedForm.length; i < iLen; i += 1) {
					if (serializedForm[i].name === 'email') {
						serializedForm[i].value = 'no_email_given@blizzard.com';
			}
				}
			}

			$.ajax({
				type: 'POST',
				url: submitUrl,
				data: serializedForm,
				success: function () {
					var successMsg = document.getElementById('feedback-success'),
					closeBtn = document.getElementById('feedback-close');

					self.form.style.display = 'none';
					successMsg.style.display = 'block';
					$introText.hide();

					closeBtn.onclick = function () {
						self.cancel();
					};
				},
				error: function (data) {
					var response;
					try {
						response = JSON.parse(data.responseText);
						if (response) {
					$.each(response.fieldErrors, function (key, val) {
						$('#' + self.ID_MAP[key]).addClass('feedback-error').next('.feedback-error-msg').show();
					});

					return false;
				}
						else {
							throw "Invalid response";
						}
					}
					catch (e) {
						var failMsg = document.getElementById('feedback-fail'),
							failCloseBtn = document.getElementById('feedback-fail-close');

						self.form.style.display = 'none';
						failMsg.style.display = 'block';

						failCloseBtn.onclick = function () {
							self.cancel();
						};
						return false;
					}
				}
			});
			return false;
		}
		else {
		}
	},

	cancel: function () {
		$('.feedback-wrapper').remove();
		$('#blackout').unbind('click.feedback');
		this.overlayInstance.close();
		this.overlayInstance.cache = {};
		return false;
	}
};/**
 * Manipulates objects consisting of key/value pairs to apply filtering on specific content.
 * Converts the params into a query string within the hash tag: #key1=value&key2=value
 */
var Filter = {

	/**
	 * Custom parameters to be added to the fragment/hash.
	 */
	query: {},

	/**
	 * Keyup timers.
	 */
	timers: {},

	/**
	 * Extracts the hash into an object of key value pairs.
	 *
	 * @param callback
	 * @constructor
	 */
	initialize: function(callback) {
		var total = 0;

		if (location.hash) {
			var hash = Core.getHash();

			if (hash !== 'reset') {
				var params = hash.split('&'),
					parts;

				for (var i = 0, length = params.length; i < length; ++i) {
					parts = params[i].split('=');
					Filter.query[parts[0]] = decodeURIComponent(parts[1]) || 'null';
					total++;
				}
			}
		}

		Filter.uiSetup(true);

		if (Core.isCallback(callback)) {
			callback(Filter.query, total);
		}
	},

	/**
	 * Add a param to the query.
	 *
	 * @param key
	 * @param value
	 */
	addParam: function(key, value) {
		if (key) {
			if (!value || value === "") {
				Filter.deleteParam(key);
			} else {
				Filter.query[key] = value;
			}
		}
	},

	/**
	 * Get range min/max data upon filtering.
	 *
	 * @param self
	 * @param value
	 * @return obj
	 */
	appendRangeData: function(self, value) {
		var range = {};

		if (typeof self.data('min') !== 'undefined') {
			range = {
				min: parseInt(value, 10),
				max: parseInt(self.siblings('input[data-max]').val(), 10),
				base: self.data('min'),
				type: 'min'
			};
		} else {
			range = {
				min: parseInt(self.siblings('input[data-min]').val(), 10),
				max: parseInt(value, 10),
				base: self.data('max'),
				type: 'max'
			};
		}

		return range;
	},

	/**
	 * Apply the query params to the hash.
	 */
	applyQuery: function() {
		var hash = [];

		if (Filter.query) {
			for (var key in Filter.query) {
				if (Filter.query[key] !== null && Filter.query.hasOwnProperty(key)) {
					hash.push(key + '=' + encodeURIComponent(Filter.query[key]));
				}
			}
		}

		if (hash.length > 0) {
			location.replace('#' + hash.join('&'));
		} else {
			Filter.reset();
		}
	},

	/**
	 * Bind default filter event handlers to all input fields.
	 *
	 * @param target
	 * @param callback
	 */
	bindInputs: function(target, callback) {
		$(target).find('[data-filter]').each(function() {
			var self = $(this),
				data = Filter.extractData(self);

			if (data.field === 'text' || data.field === 'textarea') {
				self.keyup(function() {
					data.value = self.val();

					if (data.filter === 'range') {
						data.range = Filter.appendRangeData(self, data.value);
					}

					Filter.setTimer(data.name, data, callback);
				});

			} else if (data.field === 'a') {
				self.click(function() {
					data.value = self.data('value');

					callback(data);
				});

			} else {
				self.change(function() {
					var value = (typeof self.data('value') !== 'undefined') ? self.data('value') : '';

					if (data.field === 'checkbox') {
						data.value = self.is(':checked') ? (value || 'true') : '';
					} else {
						data.value = value || self.val();
					}

					callback(data);
				});
			}
		});
	},

	/**
	 * Default filter applying callback.
	 *
	 * @param query
	 * @param total
	 */
	defaultApply: function(query, total) {
		if (total > 0) {
			$.each(query, function(key, value) {
				var input = $("#filter-"+ key);

				if (!input.length) {
					return;
				}

				if (input.is(':checkbox') && value === 'true') {
					input.prop('checked', true);
				} else {
					input.val(value);
				}
			});
		}
	},

	/**
	 * Delete a param.
	 *
	 * @param key
	 */
	deleteParam: function(key) {
		Filter.query[key] = null;
	},

	/**
	 * Extract relevant data attributes info.
	 *
	 * @param el
	 */
	extractData: function(el) {
		var node = $(el),
			nodeName = node.prop('nodeName').toLowerCase();

		return {
			tag: nodeName,
			node: node,
			name: (typeof node.data('name') !== 'undefined') ? node.data('name') : node.attr('id').replace('filter-', ''),
			filter: node.data('filter'),
			column: node.data('column'),
			field: (nodeName === 'input') ? node.attr('type') : nodeName,
			value: ''
		};
	},

	/**
	 * Get a specific param.
	 *
	 * @param key
	 */
	getParam: function(key) {
		return Filter.query[key] || null;
	},

	/**
	 * Reset the class to a default state.
	 */
	reset: function() {
		Filter.query = {};
		Filter.timers = {};
		location.replace('#reset');
	},

	/**
	 * Reset all the input fields in a filter form.
	 *
	 * @param target
	 */
	resetInputs: function(target) {
		if (!target) {
			return;
		}

		$(target).find('input, select, textarea').each(function() {
			var self = $(this),
				value;

			if ((value = self.data('min')) !== 'undefined') {
				self.val(value);
			} else if ((value = self.data('max')) !== 'undefined') {
				self.val(value);
			} else if ((value = self.data('default')) !== 'undefined') {
				self.val(value);
			} else {
				self.val('');
			}

			self.removeClass('active').removeAttr('checked');

			if (this.tagName.toLowerCase() === 'input' && (this.type === 'checkbox' || this.type === 'radio')) {
				this.checked = false;
			}
		});
	},

	/**
	 * Set a timer for a keyup event.
	 *
	 * @param key
	 * @param data
	 * @param callback
	 */
	setTimer: function(key, data, callback) {
		if (Filter.timers[key] !== null) {
			window.clearTimeout(Filter.timers[key]);
			Filter.timers[key] = null;
		}

		Filter.timers[key] = window.setTimeout(function() {
			callback(data);
		}, 350);
	},

	/**
	 * Should resetting apply filter updates.
	 */
	applyReset: false,

	/**
	 * Event for .ui-filter input click.
	 *
	 * @param e
	 */
	uiClick: function(e) {
		var input = $(e.currentTarget || e.target),
			view = input.siblings('.view'),
			reset = input.siblings('.reset');

		if (input.val() !== '') {
			view.hide();
			reset.show();
		} else {
			view.show();
			reset.hide();
		}
	},

	/**
	 * Event for .ui-filter reset.
	 *
	 * @param e
	 */
	uiReset: function(e) {
		var reset = $(e.currentTarget || e.target),
			view = reset.siblings('.view'),
			input = reset.siblings('.input');

		view.show();
		reset.hide();
		input.trigger('reset');

		if (Filter.applyReset) {
			var data = Filter.extractData(input);

			Filter.deleteParam(data.name);
			Filter.applyQuery();
		}
	},

	/**
	 * Setup all the UI input fields.
	 *
	 * @param reset
	 */
	uiSetup: function(reset) {
		var ui = $('.ui-filter');

		if (ui.length) {
			ui.find('.reset').click(Filter.uiReset);

			ui.find('.input').bind({
				keyup: Filter.uiClick,
				focus: Input.activate,
				blue: Input.reset,
				reset: function() {
					$(this).val('').trigger('keyup').trigger('blur');
				}
			});
		}

		Filter.applyReset = reset;
	}

};/**
 * Variables and functions for flash
 */
var Flash = {

    /**
     * Video player for this project
     */
    videoPlayer: '',

    /**
     * The flash base of the videos for this project
     */
    videoBase:   '',

    /**
     * Rating image based on locale
     */
    ratingImage: '',

    /**
     * Express install location
     */
    expressInstall: 'expressInstall.swf',

    /**
     * Required version for Flash player
     */
    requiredVersion: '10.2.154',

    /**
     * Store values populated after load
     */
    initialize: function() {
         //set flash base and rating image
         //Flash.defaultVideoParams.base          = Flash.videoBase;
         Flash.defaultVideoFlashVars.ratingPath = Flash.ratingImage;
         Flash.defaultVideoFlashVars.locale     = Core.locale;
         Flash.defaultVideoFlashVars.dateFormat = Core.shortDateFormat;
    },

    /**
     * Default video params for the video player
     */
    defaultVideoParams: {
         allowFullScreen:   "true",
         bgcolor:           "#000000",
         allowScriptAccess: "always",
         wmode:             "opaque",
         menu:              "false"
    },

    /**
     * Default flash vars for videos
     */
    defaultVideoFlashVars: {
        ratingFadeTime: "1",
        ratingShowTime: "4", //min requirement for ESRB
        autoPlay:       true
    },
    /**
     * Get Flash Error
     * 
     * @returns flash error msgs
     */
    getFlashError: function () {
    	var errorDiv = $("<div id=\"flash-error\" class=\"align-center\" />");
    	errorDiv.append("<h3 class=\"subheader\">" + Msg.ui.flashErrorHeader + "</h3>" + 
        		"<p><a href=\"" + Msg.ui.flashErrorUrl + "\">" + Msg.ui.flashErrorText +"</a></p>");
    
    	return errorDiv;
    }
};

$(function() {
	Flash.initialize();
});/**
 * Used to encode/decode basic numbers into a hash string.
 */
var Hash = {

	/**
	 * Base 64
	 */
	base: 'aZbYcXdWeVfUgThSiRjQkPlOmNnMoLpKqJrIsHtGuFvEwDxCyBzA0123456789+/',

	/**
	 * Delimiter used when grouping multiple batches.
	 */
	delimiter: '!',

	/**
	 * Used to denote an empty character.
	 */
	empty: '.',

	/**
	 * Batch multiple hashes with encode.
	 *
	 * @param data
	 * @return string
	 */
	batch: function(data) {
		var hashes = [];

		for (var i = 0, l = data.length; i < l; i++) {
			hashes.push( Hash.encode(data[i]) );
		}

		return Core.trimRight(hashes.join(Hash.delimiter), Hash.delimiter);
	},

	/**
	 * Encode an array into a hash using the base.
	 *
	 * @param data
	 * @return string
	 */
	encode: function(data, useEmpty) {
		var hash = '',
			base = Hash.base,
			empty = Hash.empty;

		for (var i = 0, l = data.length; i < l; i++) {
			if (data[i] !== null) {
				hash += base.charAt(data[i]);

			} else if (useEmpty) {
				hash += empty;
			}
		}

		return Core.trimRight(hash, empty);
	},

	/**
	 * Decode a hash into an array using the base.
	 *
	 * @param data
	 * @return array
	 */
	decode: function(data) {
		var array = [],
			base = Hash.base,
			empty = Hash.empty;

		for (var i = 0, l = data.length, v; i < l; i++) {
			v = data.charAt(i);
			v = (v === empty) ? null : base.indexOf(v);

			array.push(v);
		}

		return array;
	}

};/**
 * Handles pushing/replacing browser state and falling back to hashbang support for older browsers.
 *
 * @link	https://github.com/balupton/history.js/wiki/Intelligent-State-Handling
 */
var History = {

	/**
	 * History support enabled in the browser.
	 */
	enabled: (window.history.pushState),

	/**
	 * Hashbangs mapping.
	 */
	hashbangs: {},

	/**
	 * Keeps a log of all past custom history events.
	 */
	log: [],

	/**
	 * Custom external callbacks.
	 */
	hashChangeCallback: null,
	popStateCallback: null,

	/**
	 * Bind events to the window. Do not use jQuery as it strips the state property from the event object.
	 */
	initialize: function() {
		window.onhashchange = History.onHashChange;
		window.onpopstate = History.onPopState;
	},

	/**
	 * Lookup an entry in the logs, or return all logs.
	 *
	 * @param index
	 * @return array
	 */
	lookup: function(index) {
		return History.log[index] || History.log;
	},

	/**
	 * Reset the history log.
	 */
	flush: function() {
		History.log = [];
	},

	/**
	 * Is the current hash a hashbang.
	 *
	 * @return boolean
	 */
	isHashbang: function() {
		return (Core.getHash().charAt(0) === '!');
	},

	/**
	 * Push a new state and update the url/hashbang.
	 *
	 * @param state
	 * @param url
	 */
	push: function(state, url) {
		state = History.packageState(state);

		History.log.push([state, url]);

		if (History.enabled) {
			window.history.pushState(state, document.title, url);
		} else {
			History.updateHash(state, url);
		}
	},

	/**
	 * Replace the current state and update the url/hashbang.
	 *
	 * @param state
	 * @param url
	 */
	replace: function(state, url) {
		state = History.packageState(state, true);

		History.log[History.log.length - 1] = [state, url];

		if (History.enabled) {
			window.history.replaceState(state, document.title, url);
		} else {
			History.updateHash(state, url);
		}
	},

	/**
	 * Update the hashbang with the new url.
	 *
	 * @param state
	 * @param url
	 */
	updateHash: function(state, url) {
		if (url.indexOf('#') !== -1) {
			url = url.split('#')[0];
		}

		if (url.charAt(0) !== '/') {
			url = '/' + url;
		}

		url = '!' + url.replace('?', '');

		location.hash = url;
		History.hashbangs[url] = state;
	},

	/**
	 * Package the state object with relevant meta data.
	 *
	 * @param state
	 * @param replacing
	 */
	packageState: function(state, replacing) {
		if (replacing) {
			state.logIndex = History.log.length;
		} else {
			state.logIndex = History.log.length + 1;
		}

		state.replacedState = (replacing === true);
		state.pageTitle = document.title;
		state.currentHash = location.hash;
		state.absoluteUrl = location.href;
		state.isHashbang = !History.enabled;

		return state;
	},

	/**
	 * Trigger the custom hashchange event callback.
	 *
	 * @param e
	 */
	onHashChange: function(e) {
		if (Core.isCallback(History.hashChangeCallback)) {
			var state = History.hashbangs[Core.getHash()] || null;

			History.hashChangeCallback(e, state);
		}
	},

	/**
	 * Trigger the custom popstate event callback.
	 *
	 * @param e
	 */
	onPopState: function(e) {
		if (Core.isCallback(History.popStateCallback)) {
			History.popStateCallback(e);
		}
	}

};

$(function() {
	History.initialize();
});/**
 * Mappings of keyboard key codes for all supported regions.
 *
 * @link http://unixpapa.com/js/key.html
 */
var KeyCode = {

	/**
	 * Convenience codes.
	 */
	backspace: 8,
	enter: 13,
	esc: 27,
	space: 32,
	tab: 9,
	arrowLeft: 37,
	arrowUp: 38,
	arrowRight: 39,
	arrowDown: 40,

	/**
	 * A map of all key codes.
	 *
	 * Supported: en, es, de, ru, ko (no changes), fr
	 */
	map: {
		global: {
			// 0-9 numbers (48-57) and numpad numbers (96-105)
			numbers: [48, 49, 50, 51, 52, 53, 54, 55, 56, 57, 96, 97, 98, 99, 100, 101, 102, 103, 104, 105],

			// A-Z letters
			letters: [65, 66, 67, 68, 69, 70, 71, 72, 73, 74, 75, 76, 77, 78, 79, 80, 81, 82, 83, 84, 85, 86, 87, 88, 89, 90],

			// Backspace, tab, enter, shift, ctrl, alt, caps, esc, num, space, page up, page down, end, home, ins, del
			controls: [8, 9, 13, 16, 17, 18, 20, 27, 33, 32, 34, 35, 36, 45, 46, 144],

			// Function (F keys)
			functions: [112, 113, 114, 115, 116, 117, 118, 119, 120, 121, 122, 123],

			// Left, right, up, down, arrows
			arrows: [37, 38, 39, 40],

			// Windows, Mac specific buttons
			os: [17, 91, 92, 93, 219, 224]
		},
		de: {
			letters: [59, 192, 219, 222]
		},
		es: {
			letters: [59, 192]
		},
		ru: {
			letters: [59, 188, 190, 192, 219, 221, 222]
		},
		fr: {
			letters: [191]
		}
	},

	/**
	 * Get all the arrows codes.
	 *
	 * @param lang
	 * @return array
	 */
	arrows: function(lang) {
		return KeyCode.get('arrows', lang);
	},

	/**
	 * Get all the control codes.
	 *
	 * @param lang
	 * @return array
	 */
	controls: function(lang) {
		return KeyCode.get('controls', lang);
	},

	/**
	 * Get all the functions codes.
	 *
	 * @param lang
	 * @return array
	 */
	functions: function(lang) {
		return KeyCode.get('functions', lang);
	},

	/**
	 * Return a key code map.
	 *
	 * @param type
	 * @param lang
	 * @return mixed
	 */
	get: function(type, lang) {
	    lang = lang || Core.getLanguage();
		var map = [],
			types = [];

		if (typeof type === 'string') {
			types = [type];
		} else {
			types = type;
		}

		for (var i = 0, l = types.length; i < l; ++i) {
			var t = types[i];

			if (!KeyCode.map.global[t]) {
				continue;
			}

			map = map.concat(KeyCode.map.global[t]);

			if (KeyCode.map[lang] && KeyCode.map[lang][t]) {
				map = map.concat(KeyCode.map[lang][t]);
			}
		}

		return map;
	},

	/**
	 * Validates an input to only accept letters and controls.
	 *
	 * @param e
	 * @param lang
	 * @return bool
	 */
	isAlpha: function(e, lang) {
		return ($.inArray(e.which, KeyCode.get(['letters', 'controls'], lang)) >= 0);
	},

	/**
	 * Validates an input to only accept letters, numbers and controls.
	 *
	 * @param e
	 * @param lang
	 * @return bool
	 */
	isAlnum: function(e, lang) {
		return (KeyCode.isAlpha(e, lang) || KeyCode.isNumeric(e, lang));
	},

	/**
	 * Validates an input to only accept numbers and controls.
	 *
	 * @param e
	 * @param lang
	 * @return bool
	 */
	isNumeric: function(e, lang) {
		return ($.inArray(e.which, KeyCode.get(['numbers', 'controls'], lang)) >= 0) && !e.shiftKey;
	},

	/**
	 * Get all the letter codes.
	 *
	 * @param lang
	 * @return array
	 */
	letters: function(lang) {
		return KeyCode.get('letters', lang);
	},

	/**
	 * Get all the number codes.
	 *
	 * @param lang
	 * @return array
	 */
	numbers: function(lang) {
		return KeyCode.get('numbers', lang);
	}

};/**
 * Helper functions for switching language / region.
 */
var Locale = {

    /**
     * Path to the data source.
     */
    dataPath: 'data/i18n.frag',

	/**
	 * Initialize and bind "open menu" links.
	 *
	 * @constructor
	 */
	initialize: function() {
		var path = location.pathname.replace(Core.baseUrl, "");
			path = path + (location.search || '?');

		$('#change-language, #service .service-language a').click(function() {
			return Locale.openMenu('#change-language', encodeURIComponent(path));
		});
	},

    /**

     * Open up the language selection menu at the target location.
     *
     * @param toggler
     * @param path
     */
    openMenu: function(toggler, path) {
        var node = $('#international');
        toggler = $(toggler);
        path = path || '';

        if (node.is(':visible')) {
            node.slideUp();
            toggler.toggleClass('open');

        } else {
            if (node.html() !== "") {
                Locale.display();
                toggler.toggleClass('open');
            } else {
                $.ajax({
                    url: Core.baseUrl + '/' + Locale.dataPath + '?path=' + path,
                    dataType: 'html',
                    success: function(data) {
                        if (data) {
                            node.replaceWith(data);
                            toggler.toggleClass('open');
                            Locale.display();
                        }
                    }
                });
            }
        }

        return false;
    },

    /**
     * Track language events.
	 *
	 * @param eventAction
	 * @param eventLabel
     */
	trackEvent: function(eventAction, eventLabel) {
		try {
			_gaq.push(['_trackEvent', 'Battle.net Language Change Event', eventAction, eventLabel]);
		} catch(e) { }
	},

	/**
	 * Display the international menu.
	 */
	display: function() {
		var node = $('#international');

		node.slideDown('fast', function() {
			$(this).css('display', 'block');
		});

		// Opera doesn't animate on scroll down
		// $.browser was removed from jQuery in version 1.9
		if (typeof $.browser === 'undefined' || !$.browser.opera) {
			$('html, body').animate({
				scrollTop: node.offset().top
			}, 1000);
		}
	}

};

$(function() {
	Locale.initialize();
});
/**
 * Opens a login overlay (or redirects to the login server).
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
	embeddedUrl: "/login/login.frag",

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
		
		//Tracking time spent opening login window
		Login._timeTracker.start();
		
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

		container.append($("<iframe/>", {
			src: url,
			frameborder: 0
		}));

		if (Core.isIE()) {
			$(window).resize(function() {
				var doc = $(document);

				$('#blackout').css({
					width: doc.width(),
					height: doc.height()
				});
			});
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

			location.href = href + delim + 'login=true&cr=true';
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

			if (removeBlackout) {
				Blackout.hide();
			}
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
			
				//Tracking time spent opening login window
				Login._timeTracker.end();
				
				var node = $('#' + Login.CONTAINER_ID),
					embed = $('#' + Login.CONTAINER_ID + ' iframe');

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

		if (typeof addEventListener !== "undefined") {
			addEventListener("message", Login._listener, false);
		} else {
			attachEvent("onmessage", Login._listener); // IE
		}
	},

	_removeListener: function() {
		if (!Login._listener) {
			return;
		}

		if (typeof removeEventListener !== "undefined") {
			removeEventListener("message", Login._listener, false);
		} else {
			detachEvent("onmessage", Login._listener); // IE
		}
	},
	
	/**
	* Tracking the time cost of opening Login page.
	*
	*/
	_timeTracker: {
		startTime: null,
		start: function() {
			this.startTime = new Date().getTime();
		},
		end: function() {
			// Round up to the closest half seconds
			_gaq.push(["_trackEvent", "debug", "login frag load time", "" + Math.round(((new Date().getTime()) - this.startTime)/500) * 500]);
		}
	}
}
/**
 * Handles analytics and event tracking.
 */
var Marketing = {

	/**
	 * Bind ad tracking to an element(s).
	 *
	 * @param query
	 * @param category
	 * @param action
	 */
	bindTracking: function(query, category, action) {
		$(query).click(function() {
			var self = $(this);

			try {
				_gaq.push([
					'_trackEvent',
					self.data('category') || category,
					self.data('action') || action,
					self.data('ad') + ' [' + Core.locale + ']'
				]);
			} catch (e) {}
		});
	},

	/**
	 * Track user activity on the site.
	 *
	 * @param module
	 * @param label
	 */
	trackActivity: function(module, label) {
		try {
			_gaq.push([
				'_trackEvent',
				'Battle.net User Activity',
				module,
				label + ' [' + Core.locale + ']'
			]);
		} catch (e) {}
	},

	/**
	 * Track a loaded Battle.net ad.
	 *
	 * @param id
	 * @param title
	 * @param ref
	 * @param clickEvent
	 */
	trackAd: function(id, title, ref, clickEvent) {
		try {
			ref = ref ? ref + ' - ' : '';

			_gaq.push([
				'_trackEvent',
				'Battle.net Ad Service',
				(clickEvent) ? 'Ad Click-Throughs' : 'Ad Impressions',
				'Ad ' + encodeURIComponent(title.replace(' ', '_')) + ' - ' + ref + Core.locale + ' - ' + id
			]);
		} catch (e) {}
	},

	/**
	 * Track a page impression / view.
	 *
	 * @param category
	 * @param action
	 * @param label
	 */
	trackImpression: function(category, action, label) {
		try {
			_gaq.push([
				'_trackEvent',
				category,
				action,
				label + ' [' + Core.locale + ']'
			]);
		} catch (e) {}
	}

};/**
 * Creates an overlay box (modal) and blacks out the page for focus.
 * Can fetch content from a DOM element or through AJAX.
 */
var Overlay = {

	/**
	 * Cached results from the AJAX responses.
	 */
	cache: {},

	/**
	 * Default configuration.
	 */
	config: {
		ajax: false,
		bindClose: true,
		className: "",
		fadeSpeed: 250,
		blackout: true
	},

	/**
	 * Has the class been initialized?
	 */
	loaded: null,

	/**
	 * DOM object for the overlay.
	 */
	wrapper: null,

	/**
	 * Initialize the class and create the markup.
	 *
	 * @constructor
	 */
	initialize: function() {
		if (Overlay.loaded && Overlay.wrapper)
			return;

		Overlay.wrapper = $('<div/>', {
			id: 'overlay',
			'class': 'ui-overlay'
		}).appendTo('body').hide();

		$('<a/>')
			.addClass('overlay-close')
			.attr('href', 'javascript:;')
			.click(Overlay.close)
			.appendTo(Overlay.wrapper);

		var top = $('<div/>').addClass('overlay-top').appendTo(Overlay.wrapper);
		var bot = $('<div/>').addClass('overlay-bottom').appendTo(top);
		var mid = $('<div/>').addClass('overlay-middle').appendTo(bot);

		Overlay.loaded = true;
	},

	/**
	 * Close the overlay.
	 */
	close: function(speed) {
		speed = !speed ? 10 : (speed || 250);

		$("#blackout").fadeOut(speed);

		Overlay.wrapper.fadeOut(speed, function() {
			Overlay.setContent("");
			Overlay.wrapper.attr('class', 'ui-overlay');

			if (Overlay.wrapper.attr('id') !== 'overlay') {
				Overlay.wrapper.hide();
			}
		});
	},

	/**
	 * Open up an overlay. Fill the content with text, DOM or AJAX.
	 *
	 * @param content
	 * @param config
	 */
	open: function(content, config) {
		Overlay.initialize();
		config = $.extend({}, Overlay.config, config);

		if (config.className) {
			Overlay.wrapper.addClass(config.className);
		}

		if (config.blackout) {
			if (config.bindClose) {
				Blackout.show(null, function() {
					Overlay.close(config.fadeSpeed);
				});
			} else {
				Blackout.show();
			}
		}

		// Content: AJAXs
		if (config.ajax) {

			// Look in cache
			if (Overlay.cache[content]) {
				Overlay.show(Overlay.cache[content]);
				// fire overlayLoaded event (ajaxComplete is nonspecific)
				$('#overlay').trigger('overlayLoaded');
			} else {
				$.ajax({
					type: "GET",
					url: content,
					dataType: "html",
					beforeSend: function() {
						Overlay.reset();
						Overlay.show();
					},
					success: function(data, status) {
						Overlay.cache[content] = data;
						Overlay.setContent(data);
						$('#overlay').trigger('overlayLoaded');
					}
				});
			}

		// Content: DOM
		} else if (content.substr(0, 1) === '#') {
			Overlay.show($(content).html());

		// Content: Text
		} else {
			Overlay.show(content);
		}
	},

	/**
	 * Open up a custom overlay.
	 *
	 * @param element
	 * @param config
	 */
	openCustom: function(element, config) {
		Overlay.wrapper = $(element);

		if (Overlay.wrapper) {
			config = $.extend({}, Overlay.config, config);

			if (config.blackout) {
				if (config.bindClose) {
					Blackout.show(null, function() {
						Overlay.close(config.fadeSpeed);
					});
				} else {
					Blackout.show();
				}
			}

			Overlay.position();
		}
	},

	/**
	 * Position the overlay at specific coodinates.
	 *
	 * @param node
	 */
	position: function(node) {
		node = node || Overlay.wrapper;

		var width = node.outerWidth(false),
			height = node.outerHeight(false),
			x = (Page.dimensions.width / 2) - (width / 2),
			y = (Page.dimensions.height / 2) - (height / 2);

		if (Core.isIE(6)) {
			y = Page.scroll.top + y;
		}

		node.show().css({
			left: x + 'px',
			top: y + 'px',
			position: Core.isIE(6) ? 'absolute': 'fixed'
		});
	},

	/**
	 * Wipe the overlay and display a loading animation.
	 */
	reset: function() {
		Overlay.wrapper.find('.overlay-middle')
			.html("")
			.addClass('overlay-loading');
	},

	/**
	 * Now display the overlay.
	 *
	 * @param content
	 */
	show: function(content) {
		Overlay.setContent(content);
		Overlay.position();
	},

	/**
	 * Set the content of the overlay.
	 *
	 * @param content
	 */
	setContent: function(content) {
		if (content != null) {
			// for empty content, empty the container so we don't have leftovers such as orphan events
			if (content === '') {
				Overlay.wrapper.find('overlay-middle').empty();
			} else {
				Overlay.wrapper.find('.overlay-middle').html(content);
			}
		}
	}

};/**
 * Utility to record window scroll / dimensions.
 */
var Page = {

	/**
	 * Window object.
	 */
	object: null,

	/**
	 * Initialized?
	 */
	loaded: false,

	/**
	 * Window dimensions.
	 */
	dimensions: {
		width: 0,
		height: 0
	},

	/**
	 * Window scroll.
	 */
	scroll: {
		top: 0,
		width: 0
	},

	/**
	 * Initialized and grab window properties.
	 *
	 * @constructor
	 */
	initialize: function() {
		if (Page.loaded) {
			return;
		}

		if (!Page.object) {
			Page.object = $(window);
		}

		Page.object
			.resize(Page.getDimensions)
			.scroll(Page.getScrollValues);

		Page.getScrollValues();
		Page.getDimensions();
		Page.loaded = true;
	},

	/**
	 * Get window scroll values.
	 */
	getScrollValues: function() {
		Page.scroll.top  = Page.object.scrollTop();
		Page.scroll.left = Page.object.scrollLeft();
	},

	/**
	 * Get window dimensions.
	 */
	getDimensions: function() {
		Page.dimensions.width  = Page.object.width();
		Page.dimensions.height = Page.object.height();
	}

};

$(function() {
	Page.initialize();
});/**
 * Gets and displays unread support tickets.
 */
var Tickets = {

	/**
	 * HTML elements.
	 */
	tag: null,
	summary: null,
	fragment: null,
	ul: null,
	doc: null,

	/**
	 * Total number of ticket statuses to show.
	 */
	 total: 3,

	/**
	 * Enable the enhanced support menu.
	 *
	 * @constructor
	 */
	initialize: function() {
	    Tickets.doc = document;
	    var doc = Tickets.doc;
		Tickets.tag = doc.getElementById('support-ticket-count');
		Tickets.summary = doc.getElementById('ticket-summary');
		Tickets.fragment = doc.createDocumentFragment();
		Tickets.ul = doc.createElement('ul');
		Tickets.loadStatus();
	},

	/**
	 * Update the service menu.
	 *
	 * @param json
	 */
	updateSummary: function(json) {
		var doc = Tickets.doc;

		Tickets.fragment = doc.createDocumentFragment();
		Tickets.ul = doc.createElement('ul');
		Tickets.summary.innerHTML = '';
		Tickets.fragment.appendChild(Tickets.ul);

		if (json.length < 1) {
			return;
        }

		for (var i = 0, ticket; ticket = json[i]; i++) {
		    Tickets.createListItem(ticket, i);
		}

		Tickets.summary.appendChild(Tickets.fragment);
	},

	/**
	 * Creates a status summary for a ticket.
	 *
	 * @param ticket A ticket object.
	 * @param index
	 */
	createListItem: function(ticket, index) {
        if (typeof ticket !== 'object') {
            return;
        }

		var doc = Tickets.doc,
		    css = Core.isIE(6) || Core.isIE(7) ? 'className' : 'class',
		    msgSupport = Msg.support,
		    msg = {
				created: msgSupport.ticketNew,
				status: msgSupport.ticketStatus,
				viewAll: msgSupport.ticketAll,
				OPEN: msgSupport.ticketOpen,
				ANSWERED: msgSupport.ticketAnswered,
				RESOLVED: msgSupport.ticketResolved,
				CANCELED: msgSupport.ticketCanceled,
				ARCHIVED: msgSupport.ticketArchived,
				INFO: msgSupport.ticketInfo
			},
			string = '',
			prefix = '',
			suffix = '',
			icon = null,
			li = null,
			a = null,
			span = null,
			br = null,
			datetime = null,
			test = -1;

        if (ticket.status === 'OPEN') {
            string = msg.created.replace('{0}', Core.region.toUpperCase() + ticket.caseId);
        } else {
            string = msg.status.replace('{0}', Core.region.toUpperCase() + ticket.caseId);
        }
        datetime = doc.createElement('span');
        datetime.setAttribute(css, 'ticket-datetime');
        datetime.appendChild(doc.createTextNode(Tickets.localizeDatetime(ticket.lastUpdate)));
        a = doc.createElement('a');
        a.href = Core.secureSupportUrl + 'ticket/thread/' + ticket.caseId;
        icon = doc.createElement('span'),
        icon.setAttribute(css, 'icon-ticket-status');
        a.appendChild(icon);
        test = string.indexOf('{1}');
        if (test > 0) {
            prefix = string.substring(0, test);
            suffix = string.substr(test + 3, string.length);
            span = doc.createElement('span');
            span.setAttribute(css, 'ticket-' + ticket.status.toLowerCase());
            span.appendChild(doc.createTextNode(msg[ticket.status]));
            a.appendChild(doc.createTextNode(prefix));
            a.appendChild(span);
            a.appendChild(doc.createTextNode(suffix));
        } else {
            a.appendChild(doc.createTextNode(string));
        }
        br = doc.createElement('br');
        a.appendChild(br);
        a.appendChild(datetime);
        li = doc.createElement('li');
        if (index === 0) {
            li.setAttribute(css, 'first-ticket');
        }
        li.appendChild(a);
        Tickets.ul.appendChild(li);

		if (index === this.total) {
		    li = doc.createElement('li');
		    li.setAttribute(css, 'view-all-tickets');
		    a = doc.createElement('a');
		    a.href = Core.secureSupportUrl + 'ticket/status';
            a.appendChild(doc.createTextNode(msg['viewAll']));
		    li.appendChild(a);
			Tickets.ul.appendChild(li);
		}

    },

	/**
	 * Update the service menu tag with the total number of tickets.
	 *
	 * @param count
	 */
	updateTotal: function(count) {
		count = (typeof count === 'number') ? count : 0;

		var css = (Core.isIE(6) || Core.isIE(7)) ? 'className' : 'class';

		if (count > 0) {
			Tickets.tag.setAttribute(css, 'open-support-tickets');
			Tickets.tag.innerHTML = count;

		} else {
			Tickets.tag.setAttribute(css, 'no-support-tickets');
			Tickets.tag.innerHTML = '';
		}
	},

	/**
	 * Localize the date and time per the user's time zone and locale.
	 *
	 * @param timestamp
	 */
	localizeDatetime: function(timestamp) {
		var format = Core.dateTimeFormat,
			locale = Core.locale,
			datetime = null;

		datetime = Core.formatDatetime(format, timestamp);

		if (!datetime) {
			return '';
		}

		if (locale === 'en-us' || locale === 'es-mx' || locale === 'zh-cn' || locale === 'zh-tw') {
			datetime = datetime.replace('/0', '/');

			if (datetime.substr(0, 1) === '0') {
				datetime = datetime.substr(1);
			}
		}

		if (locale === 'en-us' || locale === 'es-mx') {
			datetime = datetime.replace(' 0', ' ');
		}

		return datetime;
	},

	/**
	 * Load the ticket information through AJAX.
	 */
	loadStatus: function() {
		if (Tickets.summary !== null) {
			$.ajax({
				timeout: 3000,
				url: Core.secureSupportUrl + 'update/json',
				ifModified: true,
				global: false,
				dataType: 'jsonp',
				jsonpCallback: 'getStatus',
				data: {
					supportToken: supportToken
				},
				success: function(json, status) {
					if ("notmodified" !== status) {
						Tickets.updateTotal(json.total);
						Tickets.updateSummary(json.details, json.total);
					}
				}
			});
		}
	}

};

$(function() {
	Tickets.initialize();
});/**
 * Simple open/hide toggle system.
 */
var Toggle = {

	/**
	 * Node cache.
	 */
	cache: {},

	/**
	 * Custom defined callback function.
	 */
	callback: null,

	/**
	 * Timeout to close the menu automatically.
	 */
	timeout: 800,

	/**
	 * Determines whether or not to persist menu open.
	 */
	keepOpen: false,

	/**
	 * Opens a menu / dropdown element.
	 *
	 * @param triggerNode
	 * @param activeClass
	 * @param targetPath
	 * @param delay
	 */
	open: function(triggerNode, activeClass, targetPath, delay) {
		if (delay) {
			Toggle.timeout = delay;
		}

		//keep menu open
		Toggle.keepOpen = true;

		var key = Toggle.key(targetPath);

		for (var k in Toggle.cache) {
			if (k !== key) {
				Toggle.close(Toggle.cache[k].trigger, Toggle.cache[k].activeClass, Toggle.cache[k].target, 0, true);
			}
		}

		//bind events and cache
		if (!Toggle.cache[key]) {
			//bind events and toggle the class
			$(triggerNode)
				.mouseleave(function() {
					Toggle.keepOpen = false;
					Toggle.close(triggerNode, activeClass, targetPath, Toggle.timeout);
				})
				.mouseenter(function() {
					Toggle.keepOpen = true;
					window.clearTimeout(Toggle.cache[key].timer);
				});

			//bind events and toggle display of the target
			$(targetPath)
				.mouseleave(function() {
					Toggle.keepOpen = false;
					Toggle.close(triggerNode, activeClass, targetPath, Toggle.timeout);
				})
				.mouseenter(function() {
					Toggle.keepOpen = true;
					window.clearTimeout(Toggle.cache[key].timer);
				});

			//cache properties
			Toggle.cache[key] = {
				trigger: triggerNode,
				target: targetPath,
				activeClass: activeClass,
				key: key,
				timer: null
			};
		}

		//toggle class/display
		$(triggerNode).toggleClass(activeClass);
		$(targetPath).toggle();

		window.clearTimeout(Toggle.cache[key].timer);
	},

	/**
	 * Close the menu and clear any cached timers.
	 *
	 * @param triggerNode
	 * @param activeClass
	 * @param targetPath
	 * @param delay
	 * @param force
	 */
	close: function(triggerNode, activeClass, targetPath, delay, force) {
		force = (typeof force === 'boolean') ? force : false;

		var key = Toggle.key(targetPath);

		window.clearTimeout(Toggle.cache[key].timer);

		Toggle.cache[key].timer = setTimeout(function() {
			if (Toggle.keepOpen && !force) {
				return;
			}

			$(targetPath).hide();
			$(triggerNode).removeClass(activeClass);
			Toggle.triggerCallback();
		}, delay);
	},

	/**
	 * Generate the key.
	 *
	 * @param targetPath
	 * @return string
	 */
	key: function(targetPath) {
		return (typeof targetPath === 'string') ? targetPath : '#' + $(targetPath).attr('id');
	},

	/*
	 * Trigger a callback if defined
	 */
	triggerCallback: function() {
		if (Core.isCallback(Toggle.callback))
			Toggle.callback();
	}
};