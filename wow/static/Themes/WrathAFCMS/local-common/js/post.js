var POST = {
	container: null,
	textarea: null,
	toolbar: null,

	commands: [
		{
			type: 'bold',
			tag: 'b',
			open: '<strong>',
			close: '</strong>',
			filter: true
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

	encode: function(string) {
		return string.replace(/&/gi, '&amp;').replace(/</gi, '&lt;').replace(/>/gi, '&gt;');
	},
	
	toHtml: function(content) {
		if (!content)
			content = POST.textarea.val();

		content = POST.encode(content);

		for (var i = 0; i < POST.commands.length; ++i) {
			var data = POST.commands[i];

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

			if (data.callback && POST[data.callback]) {
				content = POST[data.callback](content, data);
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