// Bnet Common JS for Forums / Comments
$(document).ready(function(){
	if (typeof console == "undefined") {
	// override firebug errors TODO Remove console calls
		var console = { log: function() {} };
	}
});

function consoleLog(data){
	if(typeof (console) != 'undefined' && typeof (console.log) != 'undefined')
		console.log(data)
}

var Cms = {

	// The RTE editor instance
	Editor: null,
	
	ajaxErrorInit:function(target){
		if($('#ajax_error').length == 0) $('body').append($('<div id="ajax_error"></div>'))
		$('#ajax_error').ajaxError(function(event, request, settings) {
				//console.log(request)
				$('#ajax_error').html(Msg.cms.requestError+'<br/>' + ('<b>'+request.status+'</b>: '+settings.url)||'')
				Overlay.open('#ajax_error')

				//$(this).text('Error requesting ' + settings.url + ' ' + request.statusText);
			});
	},
	anchorTo:function(target){
		var targetOffset = $("#"+target).offset().top;
		$('html,body').animate({scrollTop: targetOffset}, "fast");
	},
	ignore:function(userId,remove){
		$('#thread .character-options').hide();
		var ignoreList = Cookie.read('bnetUserIgnore')
		ignoreList = (ignoreList != null)?decodeURIComponent(ignoreList).split(','):[];
		//console.log(userId.toString() + " " + ignoreList )
		var arrayLoc = $.inArray(userId.toString(),ignoreList)
		var actionTaken = false
		if(remove) {
			if(arrayLoc > -1) {
								ignoreList.splice(arrayLoc,1)
								Cookie.create('bnetUserIgnore',encodeURIComponent(ignoreList.join(',')),{path:Core.baseUrl, expires: 8760});
								//alert("Removed User from Ignore List");
								actionTaken = true;
			}
			else {	Overlay.open(Msg.cms.ignoreNot);
				 }
		}
		else{
			if (arrayLoc < 0){
					ignoreList.push(userId);
					if(ignoreList.length > 100) ignoreList.shift()
					Cookie.create('bnetUserIgnore',encodeURIComponent(ignoreList.join(',')),{path:Core.baseUrl, expires: 8760});
					//alert('User Ignored')
					actionTaken = true;
			}
			else Overlay.open(Msg.cms.ignoreAlready)
		}
		if(actionTaken) window.location.reload(); // location.href = location.href
	},
	Station: {
		_WOFFSET : 921,
		init: function(){
			$('input.filter').bind('keyup',Cms.Station.forumFilter);
			$.ajax({
				url: Core.baseUrl +'/sidebar/forums',
				type: 'GET',
				dataType: 'html',
				success: function(data) {
					$('#popular-topics-inner').html(data);
				}
			});
		},
		
		forumFilter: function(e){
			var pool = $(this).parents('.child-forums').children('.forums-list'),
				userRealmsOnly = $(this).parents('.child-forums').children('.filter-options > a:first').hasClass('selected');
			
			
			
			if (e.keyCode == KeyCode.esc)
				$(this).val('');
			
			var filterVal = $(this).val().toLowerCase();
			
			pool.children().each(function(){
				var matchText = $.trim($(this).text().toLowerCase())
				//console.log(matchText)
				var filterMatch = matchText.indexOf(filterVal) > -1
				$(this)[(filterMatch)?"removeClass":"addClass"]('filtered')
				if(!userRealmsOnly) $(this).removeClass('pre-filtered')
				
			})
			
			Cms.Station.countHidden($(this).parents('.child-forums'));
			
		},
		
		toggleFilter: function(target,showAll){
			
			var pool = $(target).parents('.child-forums').children('.forums-list');
			
			$(target).addClass('selected').siblings().removeClass('selected')

			if(showAll){
				pool.children('.pre-filtered').removeClass('pre-filtered')
				Cms.Station.countHidden($(target).parents('.child-forums'))
			}
			else 
				pool.children(':not([alt=flagged])').addClass('pre-filtered')
			
		},

		clearFilter: function(target){
			
			var parentRoot = $(target).parents('.child-forums')
			
			var allButton = parentRoot.find('.filter-options a:last')
			
			if(allButton.length > 0) 
				allButton.click();
			else 
				Cms.Station.toggleFilter(target,true)
				
			parentRoot.find('input.filter').val('').trigger('keyup')
						
		},
		
		countHidden: function(target){
		  
			var filtered = target.find('.forum-link:hidden')
			
			if(filtered.length > 1) 
				target.find('.hidden-count').children('.hidden-value').text(filtered.length).parents('.filter-show-all:first').show()

			else 
				target.find('.hidden-count').parents('.filter-show-all:first').hide()
		},
		
		
		btLiteScroll: function(dir) { //Blizz-Tracker Lite Header Animation

			if (typeof locX == 'undefined') {
				origX = locX = parseFloat($('#bt-holder').css('left').replace('px', ''));
			}

			var maxLeft = ($('#bt-holder > div').length) * this._WOFFSET - origX;
			$('#bt-holder').css('width', maxLeft + origX);

			var targX = locX + this._WOFFSET * dir;

			if (targX <= origX && targX > -maxLeft) {
				locX = targX;
				//console.log(this._WOFFSET +"//"+ maxLeft +"//"+ locX )
				$('#bt-holder').stop().animate({'left':locX});
				$('#station-view .bt-left')[targX == origX ? "fadeOut" : "fadeIn"]();
				$('#station-view .bt-right')[targX == this._WOFFSET - maxLeft ? "fadeOut" : "fadeIn"]();
			}
		},
		parentToggle: function(targ, ev) {
			var forumParentToggle = Cookie.read('forumParentToggle')
			forumParentToggle = (forumParentToggle != null)?decodeURIComponent(forumParentToggle).split(','):[];
			var arrayLoc = $.inArray(targ.toString(),forumParentToggle)
			if(arrayLoc > -1) forumParentToggle.splice(arrayLoc,1)
			else forumParentToggle.push(targ.toString())
			Cookie.create('forumParentToggle',encodeURIComponent(forumParentToggle.join(',')),{path:Core.baseUrl+"/forum/", expires: 8760});
			$('#child' + targ).slideToggle();
			$(ev).toggleClass('collapsed').blur();
		}
	},
	Topic: {
		toggleCharacter:function(toggle,ref){
			$.get(Core.baseUrl+"/../preference/character?display="+toggle,
				   function(){
					  	//$.get(Core.baseUrl+"/../nop?reload");
						$('.character-options .gameCharHide')[(toggle)?"show":"hide"]();
						$('.character-options .gameCharShow')[(toggle)?"hide":"show"]();
						$('.userCharacter')[(toggle)?"fadeIn":"fadeOut"]("fast");
						$('.character-options').hide();
				 	});
		},
		postValidate:function(target){
			var err = 0,
				errString = [],
				editorMax = $('#editorMax').attr('rel'),
				subject = $('#subject'),
				editor = $('#post-edit .post-editor'),
				value = BML.textarea.val();

			$('#post-errors').html("");

			if (subject.length > 0 && subject.val().trim() == '') {
				err++;
				errString.push(Msg.cms.validationError);
				subject.css('border', '1px solid red');
			} else {
				subject.css('border', 'none');
			}

			if (value.replace(/<[^>+]>/g,'').trim() == '') {
				err++;

				if (errString[0] != Msg.cms.validationError)
					errString.push(Msg.cms.validationError);

				editor.css('border', '1px solid red');
			} else {
				editor.css('border', 'none');
			}

			if (value.length > editorMax) {
				err++;
				errString.push(Msg.cms.characterExceed.replace('XXXXXX', editorMax));
				editor.css('border', '1px solid red');
			}

			if (err>0) {
				var ul = $('<ul/>').appendTo('#post-errors');

				for (var i = 0; i < errString.length; ++i) {
					$('<li/>').html(errString[i]).appendTo(ul);
			}
				
				return false;
			} else {
				return true;
			}
		},
		vote: function (postId, voteType, val, type) {
			var postURI = Core.baseUrl + ((type == 'comments') ?  "/discussion/comment" : "/forum/topic/post")
					+ '/' + postId + '/' + voteType;
			$('#thread .rate-action').hide();
			$.ajax({ 	type : 'POST',
				   		url : postURI,
					 	data : { voteValue: val, xstoken:xsToken },
						success: function(e) {
							//console.log(e);
							var rateDir = (e.vote > 0)?"up":"down"
							$("#k-" + postId).addClass('voted')
							$("#k-" + postId + ' .rate-btn').parent().removeClass('selected')
							$("#k-" + postId + ' .rate' + rateDir).parent().addClass('selected');
						},
						error: function(request,status,error) {
							if (request.statusText.length === 0) {
								Core.goTo(window.location + '?login');
								return false;
							}
							Overlay.open(request.statusText);
						}
				   });
		},
		report: function(postId,accountName,target) {
			$('#thread .rate-action').hide();
			$('#thread .reporting').removeClass('reporting'); // Remove class if report exists
			$('#'+target).addClass('reporting');

			$('#report-table').show(); //Reset post format
			$('#report-success').hide();
			$('#report-detail').val('');

			$('#report-post').insertAfter($('#'+target))
				.show();
			$('#report-postID').html(postId);
			$('#report-poster').html(accountName);
		},
		reportSubmit: function(type){
			var postId = $('#report-postID').html(),
				postURI = Core.baseUrl + ((type == 'comments') ?  "/discussion/comment" : "/forum/topic/post")
					+ '/' + postId + '/report',
				reason = $.trim($('#report-detail').val());

			if(reason == '' || reason.length > 256){
				if(reason == '')
					Overlay.open(Msg.cms.validationError)
				if(reason.length > 256)
					Overlay.open(Msg.cms.characterExceed.replace('XXXXXX',256))
				$('#report-detail').addClass('response-error')
				return
			}
			$('#report-detail').removeClass('error')

			$.ajax( { 	type: 		'POST',
				   		url:		postURI,
						data:		{	type:	$('#report-reason').val(),
										reason:	reason,
										xstoken:xsToken
									},
						success:	function(e){
										//console.log(e);
										$('.reporting').removeClass('reporting');
										$('#report-table').hide();
										$('#report-success').show();
									},
						error: function(e){
									//console.log(e);
							 	}
				   });
		},
		reportCancel: function() {
			$('.reporting').removeClass('reporting');
			$('#report-post').hide();
		},
		countDownInit:function(target,button) {
			Cms.cdTimeout = setInterval ("Cms.Topic.countDownUpdate('"+target+"','"+button+"')",1000)
			$(button).hide();
		},
		countDownUpdate:function(targ,button){
			var targ = $(targ),
				timeCountDown = $(targ).children('.postTimeCountdown'),
				timeLeft = Number($(timeCountDown).html())
				button = $(button)
				
			if(--timeLeft <= 0) { 
				clearInterval(Cms.cdTimeout) 
				button.show();
				targ.hide();
			}
			else timeCountDown.text(timeLeft)
		},
		voteSticky:function(firstPostId){

			$.ajax( { 	type: 		'POST',
				   		url:		Core.baseUrl + "/forum/topic/post/" + firstPostId + "/report",
						data:		{	type:	'STICKY_REQUEST',
										reason:	' ',
										xstoken:xsToken
									},
						global: false,
						success:	function(e){
										//console.log(e);
										Overlay.open(Msg.cms.stickyRequested);
									},
						error: function(){
										Overlay.open(Msg.cms.stickyHasBeenRequested);
									}
				   });

		},
		topicInit: function(topicId, forumId, page) {
			$('.rate-btn-holder').bind('mouseleave', function() {
					$(this).children('.rate-action').hide();
				})
			
			//Cms.ajaxErrorInit();
			Cms.Topic.readThread(topicId, forumId, page);

			if($.trim($('#post-errors > div').html())!= ''){
				$('#post-errors').hide();
				Overlay.open('#post-errors')

			}
		},
		topicInitIe: function(){
			$('#thread .post').bind('mouseenter',function(){ $(this).addClass('iehover'); })
							  .bind('mouseleave',function(){ $(this).removeClass('iehover'); });
		},
		previewToggle: function(target, type) {

			if(type == 'preview' && $('.post-editor').val().length > $('#editorMax').attr('rel')){
				return false;
			}

			target = $(target);
			target
				.addClass('selected')
				.siblings('.selected').removeClass('selected');

			var preview = $('#post-preview');
			var edit = $('#post-edit');

			if (type == 'preview') {
				var postTitle = '';
				var postContent= '';

				if ($('#subject').length > 0)
					postTitle = '<h3>'+ BML.encode($('#subject').val()) +'</h3><br />';

        if ($('.post-editor').length>0 )
          postContent= BML.toHtml($('.post-editor').val());

				edit.hide();
				preview.html("").html(postTitle+postContent);
				
        preview.show();
				/*BML.preview(edit.find('textarea').val(), preview, function() {
					preview.show();
				});     */
	
			}else {
				preview.hide();
				edit.show();
			}
		},

		cachedQuotes: {},

		quote: function(post_id){
			if (Cms.Topic.cachedQuotes[post_id]) {
				var data = Cms.Topic.cachedQuotes[post_id];
				
				BML.quote(data.detail, post_id);
				return;
			}

			$.ajax({
				dataType: 'json',
				type: 'GET',
				url: '/forum/getpost.php?p='+ post_id,
				success: function(data) {
					Cms.Topic.cachedQuotes[post_id] = data;
					BML.quote(data.detail, post_id);
				}
			})
		},
		
		pollRefresh: function(bool, data) {
			if($('.results').is(':visible')){
				if($('.poll-interior .results td:first-child').outerWidth() > $('.results').width()/2) {
					$('.results').addClass('verbose')
				}
				
				if (bool) {
					$("#poll-container .result-container .result").each(function() {
						if (!$.browser.opera) {
							var targw = $(this).css('width');
							$(this).width(0).animate({width:targw}, "slow");
						}
						});
				} else {
					var targr = $('#poll-container .result-container .result');
					var totalOpt = targr.length;
					var totalVotes = 0;
					for (x in data) {
						totalVotes += data[x];
					}
				}
				
			}
		},
		pollToggle: function(anch, target, pollId) {
			if ($(anch).hasClass('selected') && target == 'vote') {
				// Vote
				Cms.Topic.pollVote(pollId);
			};

			$('#poll-container .' + target).show()
					.siblings('div').hide();

			if (!$(anch).hasClass('selected') && target == 'results') {
				// Animate Results
				Cms.Topic.pollRefresh(true);
			}

			$(anch).addClass('selected').siblings().removeClass('selected');
		},
		pollVote: function(pollId) {
			var voteValue = [];
			$("#poll-container input:checked").each(function() {
				voteValue.push($(this).val());
			});
			if(voteValue.length == 0) { return; }
			$.post( Core.baseUrl + "/forum/topic/poll/" + pollId + "/vote?selection=" + voteValue.join('&selection=')+"&xstoken="+xsToken,
					function(data) {
						//console.log(data);
						window.location.reload();
					   	/*$('#poll-container .v-btn').addClass('voted');
						$('#poll-container .r-btn').click();
						Cms.Topic.pollRefresh(false, data);
						*/
					}
				); //End Post
		},
		readThread:function(id, forumId, page){
			// delete cookie from earlier revision to prevent invalid header size
			Cookie.erase("visitedThread", {
				path: Core.baseUrl + '/forum/' + forumId + '/'
			});
			
			var threadRead = Cookie.read('visitedThread');
			threadRead = (threadRead != null)?decodeURIComponent(threadRead).split(','):[];

			var d = new Date;
			d = d.getTime();

			var changed = false;
				
			for(var x in threadRead) {
				threadRead[x] = threadRead[x].split('//');
				if(threadRead[x][0] == id) { 
					threadRead[x][1] = d; 
					threadRead[x][2] = (!threadRead[x][2] || threadRead[x][2]<page)?page:threadRead[x][2]; 
					changed = true; 
				}
			}

			if (!changed)
				threadRead.push([id,d,page]);

			for (x in threadRead) {
				threadRead[x] = threadRead[x].join('//');
			}

			if (threadRead.length > 80)
				threadRead.shift();

			Cookie.create('visitedThread', encodeURIComponent(threadRead.join(',')), {
				path: Core.baseUrl + '/forum',
				expires: 8760
			});
		},
		deletePost: function(id, notice) {
			if (!confirm(notice))
				return false;

			$.ajax({
				url: Core.baseUrl +'/forum/topic/post/'+ id +'/delete',
				type: 'POST',
				data: {
					xstoken: xsToken
				},
				dataType: 'json',
				success: function(response) {
					if (response.errorMessage) {
						Overlay.open(response.errorMessage);

					} else if (response.status == 'postDeleted') {
						var url = '/forum/topic/'+ response.topicId +'?page='+ (response.page || 1);

						if (response.anchor != 0)
							url += '#'+ response.anchor;
						
						location.href.replace(url);
						location.reload(true);

					} else if (response.status == 'topicDeleted') {
						Core.goTo('/forum/'+ response.forumId +'/', true);
		}
				}
			});

			return true;
		}
	},
	Forum: {
		threadListInit:function(){
			$('.post-title a').bind('click', function(){ $(this).parent().parent().addClass('read'); })
		},
		setView:function(type,target){
			Cookie.create('forumView', type, {path:"/", expires: 8760} );

			$(target).addClass('active')
				.siblings()
				.removeClass('active');
				
			$('#posts').attr('class',type)
			
			$('#posts').html($('#posts').html()) // force IE 6/7 redraw. 
			
		}
	},
	Comments: {
		replyTo: function(target, parent, author) {
			//Cms.anchorTo(target);
			var cId = target,
				target = $("#c-" + target),
				cfr = $('#comment-form-reply'),
				cmtTextarea = $('#comment-ta-reply');

			if (cfr.prev().attr("id") != target.attr("id")) {
				var commentText = "@" + author + ": ";

				cfr.hide().insertAfter(target).show();
					cmtTextarea.val(commentText).focus();
			} else
				
      cfr.toggle();
			$('#replyTo').val(parent);
		},
		validateComment:function(target){
			var ta = $(target).find("textarea")
			$(target).find('.comment-submit').addClass('disabled')[0].disabled = true
			if(ta.val().trim() == ''){
				ta.css('borderColor',"red");
				Overlay.open(Msg.cms.validationError);
				$(target).find('.comment-submit').removeClass('disabled')[0].disabled = false
				return false;
			}
			else return true;
		},
		commentInit: function() {
			$('.rate-btn-holder').bind('mouseleave', function() {
					$(this).children('.rate-action').hide();
				})
			$('.auto-expand').each(function(){
									 var taRef = $('<div class="ta-sizeRef"></div>')
									 						.attr('class',$(this).attr('class'))
															.html($(this).val().replace(/\n/g,'<br/>').replace(/\s{2}/g,' &#160;'))
															.width(($(this).width())*0.98)
															.insertAfter($(this))
									$(this).bind('keyup',function(){
															taRef.html($(this).val().replace(/\n/g,'<br/>').replace(/\s{2}/g,' &#160;'));
															$(this).height(taRef.height())
														})
											.bind('focus',function(){$(taRef).width(($(this).width())*0.98)})
											.height(taRef.height())
									});

			if (Core.isIE(6)) {
				$('#page-comments .comment').bind('mouseenter',function(){ $(this).addClass('iehover'); })
										.bind('mouseleave',function(){ $(this).removeClass('iehover'); });
			}
		},
		ajaxComment: function(button, callback) {
			var form = $(button).parentsUntil('form').parent();

			if (Cms.Comments.validateComment(form) && callback) {
				$.ajax({
					url: form.attr('action'),
					type: 'POST',
					data: form.serialize(),
					dataType: 'json',
					success: callback
				});
		}
		},
		deleteComment: function(id, notice) {
			if (!confirm(notice))
				return;
			
			$.ajax({
				url: Core.baseUrl +'/discussion/comment/'+ id +'/delete',
				type: 'POST',
				data: {
					xstoken: xsToken
				},
				dataType: 'json',
				success: function(response) {
					if (response.success) {
						$('#c-'+ id).fadeOut('fast', function() {
							$(this).remove();
						});
		}
				}
			});
		}
	},
			
	Blog: {
		init : function(){
			$('#blog a.lightbox').click(function(){
				var imgUrl = $(this).attr('href')
				Lightbox.loadImage([ { src:imgUrl } ])
				return false;
			})
		},
		getRelated: function(excludeId) {
			$.get(Core.baseUrl + '/sidebar/articles.frag?id=' + excludeId,
					function(data){
						$('#sidebar-related').show();
						var dataContent = (typeof data == 'string')?data:data.documentElement.innerHTML
						$('#related-news').html(dataContent);
					}
				 );
		}
	}
}