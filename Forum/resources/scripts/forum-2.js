$(function() {
	var breadcrumbs = $(".breadcrumb");
	var smallest = 597;
	var hidden = false;

	var topicTitle = $(".topic-title");
	var topicStart = $(".topic-start-date");
	var topicReplies = $(".topic-replies");
	var topicViews = $(".topic-views");
	var topicLast = $(".topic-last");


	function reset() {
		topicTitle.css("width", "40%");
		topicStart.css("width", "15%");
		topicReplies.css("width", "10%");
		topicViews.css("width", "10%");
		topicLast.css("width", "25%");
		topicTitle.show();	
		topicStart.show();
		topicReplies.show();
		topicViews.show();
		topicLast.show();
	}

	$("forum-2-table").css("width", (window.innerWidth - 20) + "px");

	if(window.innerWidth > 1000) {
        	reset();
        }
        else if(window.innerWidth > 700) {
                topicViews.hide();
                topicReplies.hide();
                topicViews.show();
                topicTitle.show();
                topicLast.show();
        } else if(window.innerWidth > 700) {
                topicStart.hide();
                topicReplies.hide();
                topicViews.hide();
                topicTitle.show();
                topicLast.show();
        } else {
                topicStart.hide();
                topicReplies.hide();
                topicViews.hide();
                topicTitle.show();
                topicLast.hide();
        }


	if(window.innerWidth < smallest) {
		breadcrumbs.hide();
		hidden = true;
	} else {
		breadcrumbs.show();
		hidden = false;
	}

	$(window).resize(function() {
		if(window.innerWidth < smallest && !hidden) {
			breadcrumbs.hide();
			hidden = true;
		} else if(window.innerWidth >= smallest && hidden) {
			breadcrumbs.show();
			hidden = false;
		}

		$("forum-2-table").css("width", (window.innerWidth - 20) + "px");
		if(window.innerWidth > 1000) {
			reset();
		}
		else if(window.innerWidth > 700) {
			topicViews.hide();
                        topicReplies.hide();
                        topicViews.show();
                        topicTitle.show();
                        topicLast.show();
		} else if(window.innerWidth > 700) {
			topicStart.hide();
                        topicReplies.hide();
                        topicViews.hide();
                        topicTitle.show();
                        topicLast.show();
		} else {
			topicStart.hide();
                        topicReplies.hide();
                        topicViews.hide();
                        topicTitle.show();
                        topicLast.hide();
		}
	});
});
