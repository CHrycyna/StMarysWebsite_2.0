var Blog = function () {
	function indexMasonry(response) {
		if(response['success'] == 1)
		{
			var monthNames = [
			                  "January", "February", "March",
			                  "April", "May", "June", "July",
			                  "August", "September", "October",
			                  "November", "December"
			                ];

			var $grid = $('#grid');
			var maxBody = 350;
			
			var elems = [];
			for(post of response['data'])
			{			
				var date = new Date(post['Post']['created']);
				var day = date.getDate();
				var monthIndex = date.getMonth();
				var year = date.getFullYear();
				
				var body = post['Post']['body'];
				if(body.length > maxBody)
				{
					body = body.substring(0,maxBody-3) + "..."; 
				}
							
				var img = "";
				if(post["Post"]["media"] != null) {
					img = "<div class='blog-img'> \
							<img class='img-responsive full-width' src='/img/blog/" + post["Post"]["media"] +"' alt=''> \
	            		   </div>";
				}
										
				var template = "<div class='grid-boxes-caption'> \
									" + img + "\
	        						<h3><a href='/posts/view/"+post["Post"]["id"]+"'>"+post["Post"]["title"]+"</a></h3> \
	           						<ul class='list-inline grid-boxes-news'> \
										<li><i class='fa fa-calendar'></i> " + monthNames[monthIndex] + " " + day + ", " + year + "</li> \
										<li><i class='fa fa-pencil'></i> <a href='/posts/author/"+post["User"]["username"]+"'>"+post["User"]["username"]+"</a></li> \
									</ul> \
									<p>"+body+"</p> \
								</div>";
					
				var outerDiv = document.createElement('div');
				outerDiv.id = "post_"+post['Post']['id'];
				outerDiv.className = 'grid-boxes-in ';
				outerDiv.innerHTML = template;
				
				elems.push(outerDiv);
			}
			
			var $elems = $(elems);
			
			$grid.append( $elems ).masonry( 'appended', $elems );
		}
	}

	function randomTags(response) {
		var $randomTags = $("#randomTags");
		
		for(tag of response['data'])
		{
			var outer = document.createElement('li');
			outer.innerHTML = "<a href='/posts/tag/"+tag['Tag']['tag']+"'>"+tag['Tag']['tag']+"</a>";
			$randomTags.append(outer);
		}
	}

	function trendingPosts(response) {
		var $trending = $('#trendingPosts');
		var monthNames = [
		                  "January", "February", "March",
		                  "April", "May", "June", "July",
		                  "August", "September", "October",
		                  "November", "December"
		                ];
		
		for(post of response['data'])
		{
			var date = new Date(post['Post']['created']);
			var day = date.getDate();
			var monthIndex = date.getMonth();
			var year = date.getFullYear();
			var template = "<h3><a href='/posts/view/"+post["Post"]["id"]+"'>"+post["Post"]["title"]+"</a></h3>" + 
	                       "<small>"+ monthNames[monthIndex] + " " + day + ", " + year+" / <a href=''>Art,</a> <a href='#'>Lifestyles</a></small>";
		    var outer = document.createElement('li');
			outer.innerHTML = template;
			
			$trending.append(outer);
		}
	}

	function recentImages(response) {	
		var $photostream = $('#photostream');
			
		for(post of response['data'])
		{		
			
			var template = "<a href='/img/blog/"+post['Post']['media']+"' rel='gallery' class='fancybox img-hover-v2' title='Image "+post['Post']['id'] +"'> \
					<span><img class='img-responsive' src='/img/blog/"+ post['Post']['media'] +"' alt=''></span> \
					</a>";
			
			var outer = document.createElement('li');
			outer.innerHTML = template;
			
			$photostream.append(outer);
		}
	}
	
	return {
		template: function () {
			Api({
				api: 1.0,
				type: 'POST',
				data: { nbImages: 9},
				controller: 'posts',
				method: 'recentImages',
				callback: recentImages,
			});
			Api({
				api: 1.0,
				type: 'POST',
				data: { nbPosts: 3 },
				controller: 'posts',
				method: 'trendingPosts',
				callback: trendingPosts
			});
			Api({
				api: 1.0,
				type: 'POST',
				data: { nbTags: 10 },
				controller: 'posts',
				method: 'randomTags',
				callback: randomTags
			});
        },
        
        init: function() {
        	Api({
        		api: 1.0,
        		type: 'POST',
        		controller: 'posts',
        		method: 'get',
        		callback: indexMasonry,
        	});
        }
	}
}();

