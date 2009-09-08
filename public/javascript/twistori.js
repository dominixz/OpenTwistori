	var $id;
	var $last_id;
	var $tweets_queue = new Array();
	var $request = false;
	function textColorToBackground($element)
	{
		$background_color = $element.css('color');
		$element.wrapInner('<span style="background-color:'+$background_color+'"></span>').css('color','white').addClass("clicked");
		$id = $element.attr('title');
	}
	function backgroundColorToText($element)
	{
		$text_color = $element.children('span:first').css('background-color');
		$text =  $element.children('span:first').text();
		$element.empty().css('color',$text_color).removeClass('clicked').text($text);
	}
	function getTweets()
	{
		$element = $("#word-id-"+$id); 
		if($element.data('tweets').length < 30 && !$request)
		{
			$page = $element.data('page');
			if(!$element.data('nomoreresult'))
			{
				$request = true;
				$.getJSON('tweets/getTwistoriTweets/'+$id+'/'+$page,function($texts){
						$request = false;
						if($texts.length > 0)
						{
							$element.data('tweets',$element.data('tweets').concat($texts));
						}
						
						if($texts.length < 100)
						{
							$element.data('nomoreresult',true);
							$element.data('mustalert',true);
						}//$tweets_queue = $tweets_queue.concat($texts);
				});
				$element.data('page',$page+1);
			}
			
		}
		else if($element.data('nomoreresult') && $element.data('mustalert'))
		{
			alert('no more result');
			$element.data('mustalert',false);
		}
		
	}
	function tweetToElement()
	{
		$element = $("#word-id-"+$id);
		$tweets = $element.data('tweets');
		if($tweets.length > 0)
		{
			$text = "<li>"+$tweets.shift()+"</li>";
			
			$results = $("#tweets");
			$results.append($text);
			if($results.children().length > 0)
				$results.trigger('start');
			
			if($tweets.length < 30 )
            {
                getTweets();
            }
		}
		else
		{
			$("#tweets").trigger('stop');
		}
		
		if($tweets.length == 0 && $element.data('mustalert'))
		{
			alert('this is your last result of this word');
			$element.data('mustalert',false);
		}
	}
	function clearTweetsQueue()
	{
		$tweets_queue = null;
		$tweets_queue = new Array();
	}
	
	$(function(){
		$window_height = $(window).height()-20; // 20 margin padding
		$("#tweets").append("<li style='height:"+$window_height+"px'>&nbsp;</li>");
		$("h2").each(function(){
			$(this).data('tweets',new Array());
			$(this).data('page',1);
		});
		var $tweets = $('#tweets');
		$tweets.serialScroll({
			items:'li',
			force:true,
			duration:1500,
			axis:'y',
			
			lazy:true,// NOTE: it's set to true, meaning you can add/remove/reorder items and the changes are taken into account.
			interval:2000, // yeah! I now added auto-scrolling
			step:1 // scroll 2 news each time
		});
		
		// Init first h2
		$element = $("h2:first");
		textColorToBackground($element);
		// End first init
		$("h2:not(.clicked)").live("click",function(){
			clearTweetsQueue();
			backgroundColorToText($("h2.clicked"));
			textColorToBackground($(this));
			getTweets();
			$("#tweets").trigger('stop');	
		});
		getTweets();
		$("#tweets").trigger('stop');
		setInterval("tweetToElement()",2000);
	});