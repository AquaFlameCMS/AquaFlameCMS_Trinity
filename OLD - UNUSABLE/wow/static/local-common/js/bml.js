/**
 * Builds a toolbar that allows basic BBcode styled syntax within a textarea.
 * Supports basic tags: bold, italics, underline, list, quote
 *
 * @copyright   2010, Blizzard Entertainment, Inc
 * @class       Rich Text Editor
 * @example
 */

var BML = {

	/**
     * Nodes for the container, textarea and toolbar.
     */
	container: null,
	textarea: null,
	toolbar: null,

	/**
	 * List of BML button commands.
	 */
	commands: [
		{
			type: 'bold',
			tag: 'b',
			open: '<strong>',
			close: '</strong>',
			filter: true,
			regions: ['us', 'eu', 'sea', 'kr']
		}, {
			type: 'italics',
			tag: 'i',
			open: '<em>',
			close: '</em>',
			filter: true
		}, {
			type: 'underline',
			tag: 'u',
			open: '<span class="underline">',
			close: '</span>',
			filter: true
		}, {
			type: 'list',
			tag: 'ul',
			open: '<ul>',
			close: '</ul>',
			filter: true
		}, {
			type: 'listItem',
			tag: 'li',
			open: '<li>',
			close: '</li>',
			filter: true
		}, {
			type: 'code',
			tag: 'code',
			open: '<code>',
			close: '</code>',
			filter: true
		}, {
			type: 'quote',
			tag: 'quote',
			filter: true,
			pattern: [
				'\\[quote="(.*?)"\\]',
				'\\[quote\\]',
				'\\[\\/quote\\]'
			],
			result: [
				'<blockquote><strong>$1:</strong><br />',
				'<blockquote>',
				'</blockquote>'
			]
		}
	],

	/**
	 * Initialize the objects.
	 *
	 * @param node
	 * @param isCm
	 * @constructor
	 */
	initialize: function(node, isCm) {
		BML.container = $(node);
		BML.textarea = BML.container.find('textarea');

		// Checking character Exceed of textarea
		var editor = $('#post-edit .post-editor'),
			editorMax = $('#editorMax').attr('rel'),
			errorMsgs = $('#post-errors'),
			previewBtn = $('.talkback-controls .preview-btn');
		
		BML.textarea.bind('keyup',function(){
			
			errorMsgs.empty();
			
			if(BML.textarea.val().length > editorMax){				
				var ul = $('<ul/>').appendTo(errorMsgs);
				$('<li/>').html(Msg.cms.characterExceed.replace('XXXXXX',editorMax)).appendTo(ul);
				editor.css('border', '1px solid red');
				previewBtn.addClass('disabled');
			} else {
				editor.css('border', 'none');
				previewBtn.removeClass('disabled');
			}
		});
		
		if (isCm) {
			BML.addCommands([
				{
					type: 'url',
					tag: 'url',
					filter: true,
					prompt: Msg.bml.urlPrompt,
					pattern: [
						'\\[url\\](.*?)\\[\\/url\\]',
						'\\[url="(.*?)"\\](.*?)\\[\\/url\\]'
					],
					result: [
						'<a href="$1">$1</a>',
						'<a href="$1">$2</a>'
					]
				}
			]);
		}

		BML.buildToolbar();
		BML.contextQuotes();
	},

	/**
	 * Add more commands to the parser.
	 *
	 * @param commands
	 */
	addCommands: function(commands) {
		BML.commands = BML.commands.concat(commands);
	},

	/**
	 * Append content to the current textarea.
	 *
	 * @param content
	 */
	append: function(content) {
		var value = BML.textarea.val();

		if (value !== "")
			value += "\n\n";

		BML.textarea.val(value + content);
	},

	/**
	 * Build the toolbar and attach event handlers.
	 */
	buildToolbar: function() {
		BML.toolbar = $('<div/>')
			.addClass('bml-toolbar')
			.html(' ') // IE fix
			.prependTo(BML.container);

		// Loop commands and build toolbar
		$.each(BML.commands, function(key, data) {
			if (data.regions && $.inArray(Core.buildRegion, data.regions) === -1) {
				return true;
			}

			var msg = Msg.bml[data.type] || "";

			$('<button type="button"/>')
				.addClass('bml-'+ data.type)
				.html(msg)
				.bind({
					click: function() {
						BML.insertTag(data);
					},
					mouseover: function() {
						if (msg !== "")
							Tooltip.show(this, msg, { location: 'topCenter' });
					}
				}).appendTo(BML.toolbar);
		});
	},

	/**
	 * Enable context quotes with posts.
	 */
	contextQuotes: function() {
		$(document).click(function() {
			if (BML.selection() === "")
				$('.quote-button').remove();
		});

		$('#thread').delegate('.post-detail', 'mouseup', function(e) {
			var selection = BML.selection();

			// Remove old buttons
			$('.quote-button').remove();

			// Create button and position
			if (selection !== "") {
				var id = $(this).parents('.post').attr('id').replace('post-', "");

				$('<button type="button"/>')
					.html('<span><span>'+ Msg.bml.quote +'</span></span>')
					.addClass('ui-button button2 quote-button')
					.appendTo('body')
					.click(function() {
						BML.quote(selection, id);
						$(this).remove();
						window.location = '#new-post';
					})
					.css({
						top: (e.pageY + 10),
						left: (e.pageX + 10),
						position: 'absolute'
					});
			}
		});
	},

	/**
	 * Encode HTML strings.
	 *
	 * @param string
	 */
	encode: function(string) {
		return string.replace(/&/gi, '&amp;').replace(/</gi, '&lt;').replace(/>/gi, '&gt;');
	},

	/**
	 * Insert a tag around selected text, or the end of the textarea.
	 *
	 * @param data
	 */
	insertTag: function(data) {
		var area = BML.textarea[0],
			value,
			selection,
			tag = data.tag,
			state,
			prompts = ["", ""];

		// Prompt for data?
		if (data.prompt) {
			var answer = prompt(data.prompt);

			if (answer) {
				prompts[0] = answer;
				prompts[1] = '="'+ answer +'"';
			} else {
				return;
			}
		}

		// Self closing tag?
		if (data.selfClose)
			state = '['+ tag + prompts[1] +' /]';
		else
			state = '['+ tag +']'+ prompts[0] +'[/'+ tag +']';

		// Grab selection.
		if (Core.isIE() || $.browser.msie) {
			selection = document.selection.createRange().text;

			if (selection !== "" && !data.selfClose)
				document.selection.createRange().text = '['+ tag + prompts[1] +']'+ selection +'[/'+ tag +']';
			else
				value = BML.textarea.val() +' '+ state;

		} else {
			selection = {
				value:	area.value.substring(area.selectionStart, area.selectionEnd),
				start:	area.selectionStart,
				end:	area.selectionEnd
			};

			if (selection.value !== "" && area.setSelectionRange && !data.selfClose) {
				value = area.value.substring(0, selection.start) +'['+ tag + prompts[1] +']'+
						area.value.substring(selection.start, selection.end) +'[/'+ tag +']'+
						area.value.substring(selection.end, area.value.length)
			} else {
				value = BML.textarea.val() +' '+ state;
			}
		}

		if (value)
			BML.textarea.val(value);
	},

	/**
	 * Preview the current textarea!
	 *
	 * @param content
	 * @param target
	 * @param callback
	 * @return boolean
	 */
	preview: function(content, target, callback) {
		$.ajax({
			dataType: 'json',
			data: {
				post: content,
				xstoken: Cookie.read('xstoken')
			},
			type: 'POST',
			url: Core.baseUrl +'/forum/preview2.php',
			global: false,
			success: function(data, status, xhr) {
				$(target).append(data.detail);

				if (Core.isCallback(callback))
					callback();
			},
			error: function(xhr, status, thrown) {
				if (status == 'parsererror')
					Core.goTo('/account-status', true);

				// Attempt to detect a redirect. Redirect throws no headers, others do.
				else if (status == 'error' && !xhr.getAllResponseHeaders())
					Login.openOrRedirect();
			}
		});
	},

	/**
	 * Quote a post.
	 *
	 * @param content
	 * @param post_id
	 */
	quote: function(content, post_id) {
		var quote = '[quote="'+ post_id +'"]';
			quote += $.trim(content);
			quote += ' [/quote]';

		BML.append(quote);
	},

	/**
	 * Grab the currently selected text on the page.
	 *
	 * @return string
	 */
	selection: function() {
		var selection;

		if (window.getSelection)
			selection = window.getSelection().toString();
		else
			selection = document.selection.createRange().text;

		return selection;
	},

	/**
	 * Transform the code loosely to HTML.
	 *
	 * @param content
	 * @return string
	 */
	toHtml: function(content) {
		if (!content)
			content = BML.textarea.val();

		content = BML.encode(content);

		for (var i = 0; i < BML.commands.length; ++i) {
			var data = BML.commands[i];

			if (data.filter) {
				if (data.pattern && data.result) {
					for (var x = 0; x < data.pattern.length; ++x) {
						content = content.replace(new RegExp(data.pattern[x], 'gi'), data.result[x]);
					}
				} else {
					content = content.replace(new RegExp('\\['+ data.tag +'\\]', 'gi'), data.open);
					content = content.replace(new RegExp('\\[\\/'+ data.tag +'\\]', 'gi'), data.close);
				}
			}

			if (data.callback && BML[data.callback]) {
				content = BML[data.callback](content, data);
			}
		}

		// Cleanup
		content = content.replace(/\n/gi, '<br />');
		content = content.replace(/\r/gi, '<br />');
		content = content.replace(/<ul><br(.*?)>/gim, '<ul>');
		content = content.replace(/<\/li><br(.*?)>/gim, '</li>');

		return content;
	}

};