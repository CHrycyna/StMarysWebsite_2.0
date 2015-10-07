var Api = function () {
	return {
		postAsync: function(version, controller, method, parameters, callback) {
			console.log("Api: " + version); 
			console.log("Controller: " + controller);
			console.log("Method: " + method);
			console.log("Parameters: " + parameters );
			
			if (typeof callback === "function") {
				// Call it, since we have confirmed it is callable​
		        callback("Hello Post");
		    }
		},
		
		getAsync: function(version, controller, method, parameters, callback) {
			console.log("Api: " + version); 
			console.log("Controller: " + controller);
			console.log("Method: " + method);
			console.log("Parameters: " + parameters );
			
			if (typeof callback === "function") {
				// Call it, since we have confirmed it is callable​
		        callback("Hello Get");
		    }
		}
	}
}();