var Api = (function (options) {
	var url = "/api/1.0/" + options['controller'] + '/' + options['method'];
	
	$.ajax({
		url: url,
        type: options['type'],
        data: options['data'],
        dataType: 'json',
        success: function(data, textStatus, xhr) {
        	if (typeof options['callback'] === "function") {
        		options['callback'](data);
 		    }
        },
    	error: function(data, textStatus, xhr) {
    		console.log("Failure");
    		console.log(data);
    	}
	});

});