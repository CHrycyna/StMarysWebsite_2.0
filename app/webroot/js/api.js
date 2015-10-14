var Api = (function (options) {

	console.log(options);
	if(options['type'] == 'post')
		{
			console.log('post');
		}
	
	$.ajax({
		url: '/api/Content/getCarousel',
        type: 'GET',
        dataType: 'json',
        success: function(data, textStatus, xhr) {
        	for(var i=0; i < data.result.length; i++)
    		{
        		var isActive = '';
        		if(i == 0)
        			isActive = 'active';
        		$(CAROUSEL.appendTo).append( CAROUSEL.template
        			.replace('{ACTIVE}', isActive )
        			.replace('{IMG_SRC}', data.result[i].img )
        			.replace('{HEADING}', data.result[i].heading )
        			.replace('{DESCRIPTION}', data.result[i].desc )
                );
    		}
        },
    	error: function(data, textStatus, xhr) {
    		console.log("Failure");
    	}

});