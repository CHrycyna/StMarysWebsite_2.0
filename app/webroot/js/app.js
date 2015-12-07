/*
 * Template Name: Unify - Responsive Bootstrap Template
 * Description: Business, Corporate, Portfolio, E-commerce and Blog Theme.
 * Version: 1.7
 * Author: @htmlstream
 * Website: http://htmlstream.com
*/
var K = function () {
    var a = navigator.userAgent;
    return {
        ie: a.match(/MSIE\s([^;]*)/)
    }
}();

var App = function () {
    //Fixed Header
    function handleHeader() {
         jQuery(window).scroll(function() {
            if (jQuery(window).scrollTop()){
                jQuery(".header-fixed .header-sticky").addClass("header-fixed-shrink");
            }
            else {
                jQuery(".header-fixed .header-sticky").removeClass("header-fixed-shrink");
            }
        });
    }

    //Header Mega Menu
    function handleMegaMenu() {
        jQuery(document).on('click', '.mega-menu .dropdown-menu', function(e) {
            e.stopPropagation();
        })
    }

    //Search Box (Header)
    function handleSearch() {
        jQuery('.search').click(function () {
            if(jQuery('.search-btn').hasClass('fa-search')){
                jQuery('.search-open').fadeIn(500);
                jQuery('.search-btn').removeClass('fa-search');
                jQuery('.search-btn').addClass('fa-times');
            } else {
                jQuery('.search-open').fadeOut(500);
                jQuery('.search-btn').addClass('fa-search');
                jQuery('.search-btn').removeClass('fa-times');
            }   
        }); 
    }

    //Search Box v1 (Header v5)
    function handleSearchV1() {
        jQuery('.header-v5 .search-button').click(function () {
            jQuery('.header-v5 .search-open').slideDown();
        });

        jQuery('.header-v5 .search-close').click(function () {
            jQuery('.header-v5 .search-open').slideUp();
        });

        jQuery(window).scroll(function(){
          if(jQuery(this).scrollTop() > 1) jQuery('.header-v5 .search-open').fadeOut('fast');
        });
    }

    // Search Box v2 (Header v8)
    function handleSearchV2() {
        $(".blog-topbar .search-btn").on("click", function() {
          if (jQuery(".topbar-search-block").hasClass("topbar-search-visible")) {
            jQuery(".topbar-search-block").slideUp();
            jQuery(".topbar-search-block").removeClass("topbar-search-visible");
          } else {
            jQuery(".topbar-search-block").slideDown();
            jQuery(".topbar-search-block").addClass("topbar-search-visible");
          }
        });
        $(".blog-topbar .search-close").on("click", function() {
          jQuery(".topbar-search-block").slideUp();
          jQuery(".topbar-search-block").removeClass("topbar-search-visible");
        });
        jQuery(window).scroll(function() {
          jQuery(".topbar-search-block").slideUp();
          jQuery(".topbar-search-block").removeClass("topbar-search-visible");
        });
    }

    // TopBar (Header v8)
    function handleTopBar() {
        $(".topbar-toggler").on("click", function() {
          if (jQuery(".topbar-toggler").hasClass("topbar-list-visible")) {
            jQuery(".topbar-menu").slideUp();
            jQuery(this).removeClass("topbar-list-visible");
          } else {
            jQuery(".topbar-menu").slideDown();
            jQuery(this).addClass("topbar-list-visible");
          }
        });
    }

    // TopBar SubMenu (Header v8)
    function handleTopBarSubMenu() {
        $(".topbar-list > li").on("click", function(e) {
          if (jQuery(this).children("ul").hasClass("topbar-dropdown")) {
            if (jQuery(this).children("ul").hasClass("topbar-dropdown-visible")) {
              jQuery(this).children(".topbar-dropdown").slideUp();
              jQuery(this).children(".topbar-dropdown").removeClass("topbar-dropdown-visible");
            } else {
              jQuery(this).children(".topbar-dropdown").slideDown();
              jQuery(this).children(".topbar-dropdown").addClass("topbar-dropdown-visible");
            }
          }
          //e.preventDefault();
        });
    }

    //Sidebar Navigation Toggle
    function handleToggle() {
        jQuery('.list-toggle').on('click', function() {
            jQuery(this).toggleClass('active');
        });

        /*
        jQuery('#serviceList').on('shown.bs.collapse'), function() {
            jQuery(".servicedrop").addClass('glyphicon-chevron-up').removeClass('glyphicon-chevron-down');
        }

        jQuery('#serviceList').on('hidden.bs.collapse'), function() {
            jQuery(".servicedrop").addClass('glyphicon-chevron-down').removeClass('glyphicon-chevron-up');
        }
        */
    }

    //Equal Height Columns    
    function handleEqualHeightColumns() {
        var EqualHeightColumns = function () {            
            $(".equal-height-columns").each(function() {
                heights = [];              
                $(".equal-height-column", this).each(function() {
                    $(this).removeAttr("style");
                    heights.push($(this).height()); // write column's heights to the array
                });
                $(".equal-height-column", this).height(Math.max.apply(Math, heights)); //find and set max
            });
        }

        EqualHeightColumns();        
        $(window).resize(function() {            
            EqualHeightColumns();
        });
        $(window).load(function() {
            EqualHeightColumns("img.equal-height-column");
        });
    }    

    //Hover Selector
    function handleHoverSelector() {
        $('.hoverSelector').on('hover', function(e) {        
            $('.hoverSelectorBlock', this).toggleClass('show');
            e.stopPropagation();            
        });
    }    

    //Bootstrap Tooltips and Popovers
    function handleBootstrap() {
        /*Bootstrap Carousel*/
        jQuery('.carousel').carousel({
            interval: 15000,
            pause: 'hover'
        });

        /*Tooltips*/
        jQuery('.tooltips').tooltip();
        jQuery('.tooltips-show').tooltip('show');      
        jQuery('.tooltips-hide').tooltip('hide');       
        jQuery('.tooltips-toggle').tooltip('toggle');       
        jQuery('.tooltips-destroy').tooltip('destroy');       

        /*Popovers*/
        jQuery('.popovers').popover();
        jQuery('.popovers-show').popover('show');
        jQuery('.popovers-hide').popover('hide');
        jQuery('.popovers-toggle').popover('toggle');
        jQuery('.popovers-destroy').popover('destroy');
    }

	
	function link(tweet) {
		return tweet.replace(/\b(((https*\:\/\/)|www\.)[^\"\']+?)(([!?,.\)]+)?(\s|$))/g, function(link, m1, m2, m3, m4) {
			var http = m2.match(/w/) ? 'http://' : '';
			return '<a class="twtr-hyperlink" target="_blank" href="' + http + m1 + '">' + ((m1.length > 25) ? m1.substr(0, 24) + '...' : m1) + '</a>' + m4;
        });
	}
	 
	function at(tweet) {
        return tweet.replace(/\B[@]([a-zA-Z0-9_]{1,20})/g, function(m, username) {
    		return '<a target="_blank" class="twtr-atreply" href="http://twitter.com/intent/user?screen_name=' + username + '">@' + username + '</a>';
        });
	}
	 
	function list(tweet) {
		return tweet.replace(/\B[@]([a-zA-Z0-9_]{1,20}\/\w+)/g, function(m, userlist) {
			return '<a target="_blank" class="twtr-atreply" href="http://twitter.com/' + userlist + '">@' + userlist + '</a>';
	    });
	}
	 
	function hash(tweet) {
		return tweet.replace(/(^|\s+)#(\w+)/gi, function(m, before, hash) {
			return before + '<a target="_blank" class="twtr-hashtag" href="http://twitter.com/search?q=%23' + hash + '">#' + hash + '</a>';
        });
	}
	 
	function clean(tweet) {
		return hash(at(list(link(tweet))));
	}
	
	function timeAgo(tdate) {
		var system_date = new Date(Date.parse(tdate));
	    var user_date = new Date();
	    if (K.ie) {
	        system_date = Date.parse(tdate.replace(/( \+)/, ' UTC$1'))
	    }
	    var diff = Math.floor((user_date - system_date) / 1000);
	    if (diff <= 1) {return "just now";}
	    if (diff < 20) {return diff + " seconds ago";}
	    if (diff < 40) {return "half a minute ago";}
	    if (diff < 60) {return "less than a minute ago";}
	    if (diff <= 90) {return "one minute ago";}
	    if (diff <= 3540) {return Math.round(diff / 60) + " minutes ago";}
	    if (diff <= 5400) {return "1 hour ago";}
	    if (diff <= 86400) {return Math.round(diff / 3600) + " hours ago";}
	    if (diff <= 129600) {return "1 day ago";}
	    if (diff < 604800) {return Math.round(diff / 86400) + " days ago";}
	    if (diff <= 777600) {return "1 week ago";}
	    return "on " + system_date;
    }
    
    function loadStoreHoursResponse(response) {
    	var data = response['data']['store_hours'];
		$storehours = $('.store-hours');

		for (var day of data) {
			$outer = $('<div class="row"></div>');
			
			var dayDiv = document.createElement('div');
			dayDiv.className = 'day col-xs-4';
			dayDiv.innerHTML += day["day"];
			$outer.append(dayDiv);
			
			var hoursDiv = document.createElement('div');
			hoursDiv.className = 'hours col-xs-8';
			
			if(day["closed"])
			{
				hoursDiv.innerHTML += "Closed";
			}
			else
			{
				hoursDiv.innerHTML += day["open"] + " - "+ day["close"];
			}
			if(day["holiday"])
			{
				hoursDiv.innerHTML += " <i class='fa fa-info-circle' data-toggle=\"tooltip\" data-placement=\"right\" title=\""+day["holiday"]+"\"></i>"
			}
			$outer.append(hoursDiv);
			$storehours.append($outer);
		}
		$('[data-toggle="tooltip"]').tooltip();
    }
    
    function loadBlogEntries(response) {
    	var data = response['data'];
		$posts = $('#rPosts');
		var monthNames = [
		                  "January", "February", "March",
		                  "April", "May", "June", "July",
		                  "August", "September", "October",
		                  "November", "December"
		                ];

		for (var post of data) {
			var date = new Date(post['Post']['created']);
			var day = date.getDate();
			var monthIndex = date.getMonth();
			var year = date.getFullYear();
			var postDate = monthNames[monthIndex] + ' ' + day + ", " + year;
			$li = $('<li></li>');
			
			if(post['Post']['post_type_id']) {
	            //<img class="radius-3x" src="assets/img/thumb/01.jpg" alt="">
				$img = $('<img class="radius-3x" src="/img/blog/' + post['Post']['media'] + '">');
				$li.append($img);
			}
			$div = $('<div class="overflow-h"><a href="/posts/view/'+post['Post']['id']+'">'+post['Post']['title']+'</a><small>'+postDate+'</small></div>');
			$li.append($div);
			$posts.append($li);
		}
    }
    
    function loadTweetsResponse(response) {
    	console.log(response);
		$tweets = $('.tweets');
    	var data = response['data'];

    	
		var username = data['username'];
		
		for (var tweet of data['tweets']) {
			$li = $('<li><i class="fa fa-twitter"></i></li>');
			$div = $("<div class=\"overflow-h\"><p><a href=\"#\">@"+username+" </a>"+clean(tweet['text'])+"</p></div>");
			$div.append("<small>"+timeAgo(tweet['date'])+"</small>");
			$li.append($div);
			$tweets.append($li);
		}
    }
    
    function loadTemplateContent() {
    	 Api({
 			api: 1.0,
 			type: 'POST',
 			data: null,
 			controller: 'storehours',
 			method: 'hours',
 			callback: loadStoreHoursResponse,
 		});
    	 Api({
  			api: 1.0,
  			type: 'POST',
  			data: { "nbPosts" : 3 },
  			controller: 'posts',
  			method: 'recentPosts',
  			callback: loadBlogEntries,
  		});
    	 Api({
    		 api: 1.0,
   			 type: 'POST',
   			 data: null,
   			 controller: 'twitter',
   			 method: 'gettweets',
   			 callback: loadTweetsResponse,
    	 });
    }

    return {
        init: function () {
            handleBootstrap();
            handleSearch();
            handleSearchV1();
            handleSearchV2();
            handleTopBar();
            handleTopBarSubMenu();         
            handleToggle();
            handleHeader();
            handleMegaMenu();
            handleHoverSelector();
            handleEqualHeightColumns();
            loadTemplateContent();
        },

        //Counters 
        initCounter: function () {
            jQuery('.counter').counterUp({
                delay: 10,
                time: 1000
            });
        },

        //Parallax Backgrounds
        initParallaxBg: function () {
            jQuery(window).load(function() {
                jQuery('.parallaxBg').parallax("50%", 0.2);
                jQuery('.parallaxBg1').parallax("50%", 0.4);
            });
        },

        //Scroll Bar 
        initScrollBar: function () {
            jQuery('.mCustomScrollbar').mCustomScrollbar({
                theme:"minimal",
                scrollInertia: 200,
                scrollEasing: "linear"
            });
        },

        // Sidebar Menu Dropdown
        initSidebarMenuDropdown: function() {
          function SidebarMenuDropdown() {
            jQuery('.header-v7 .dropdown-toggle').on('click', function() {
              jQuery('.header-v7 .dropdown-menu').stop(true, false).slideUp();
              jQuery('.header-v7 .dropdown').removeClass('open');

              if (jQuery(this).siblings('.dropdown-menu').is(":hidden") == true) {
                jQuery(this).siblings('.dropdown-menu').stop(true, false).slideDown();
                jQuery(this).parents('.dropdown').addClass('open');
              }
            });
          }
          SidebarMenuDropdown();
        },

        //Animate Dropdown
        initAnimateDropdown: function() {
          function MenuMode() {
            jQuery('.dropdown').on('show.bs.dropdown', function() {
              jQuery(this).find('.dropdown-menu').first().stop(true, true).slideDown();
            });
            jQuery('.dropdown').on('hide.bs.dropdown', function() {
              jQuery(this).find('.dropdown-menu').first().stop(true, true).slideUp();
            });
          }

          jQuery(window).resize(function() {
            if (jQuery(window).width() > 768) {
              MenuMode();
            }
          });

          if (jQuery(window).width() > 768) {
            MenuMode();
          }
        },

    };

}();