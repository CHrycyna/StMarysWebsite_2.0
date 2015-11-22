var Users = function() {
	function showUsers(response) {		
		for(user of response['data']) {
			$('#usersTable tr:last').after('<tr><td>'+user['User']['username']+'</td>' +
											'<td>'+user['User']['firstname']+'</td>' +
											'<td>'+user['User']['lastname']+'</td>' +
											'<td>'+user['User']['email']+'</td>' +
											'<td>'+user['Role']['role']+'</td>' +
											'<td>'+user['User']['last_login']+'</td>' +
											'<td>' +
												'<div class="btn-group">' + 
													'<button type="button" class="btn btn-default" data-toggle="tooltip" data-placement="top" title="Edit"><i class="fa fa-pencil-square-o"></i></button>' +
													'<button type="button" class="btn btn-default" data-toggle="tooltip" data-placement="top" title="Delete"><i class="fa fa-trash"></i></button>' +
												'</div>' +
											'</td>' +
											'</tr>');
		}		
		$('[data-toggle="tooltip"]').tooltip();
		
	}
	
	function registrationResponse(response) {
		console.log(response);
	}
	
	return {
		viewUsers: function() {
			Api({
				api: 1.0,
				type: 'POST',
				data: null,
				controller: 'users',
				method: 'get',
				callback: showUsers,
			});
		},
		registerForm: function () {
			$email = $("#userEmail");
			$password = $("#userPassword1");
			$first = $("#userFirstName");
			$last = $("#userLastName");
			$username = $("#userUsername");
			$role = $("#userRole");
			
			var jsonEmail = new Object();
			jsonEmail.name = 'email';
			jsonEmail.value = $email.val();
			var jsonPassword = new Object();
			jsonPassword.name = 'password';
			jsonPassword.value = $password.val();
			var jsonFirst = new Object();
			jsonFirst.name = 'first';
			jsonFirst.value = $first.val();
			var jsonLast = new Object();
			jsonLast.name = 'last';
			jsonLast.value = $last.val();
			var jsonUsername = new Object();
			jsonUsername.name = 'username';
			jsonUsername.value = $username.val();
			var jsonRole = new Object();
			jsonRole.name = 'role';
			jsonRole.value = $role.val();
	
			var ArrayArg = new Array();
			ArrayArg.push(jsonEmail);
			ArrayArg.push(jsonPassword);
			ArrayArg.push(jsonFirst);
			ArrayArg.push(jsonLast);
			ArrayArg.push(jsonUsername);
			ArrayArg.push(jsonRole);

		    var data = JSON.parse(JSON.stringify(ArrayArg))
			
		    Api({
				api: 1.0,
				type: 'POST',
				data: data,
				controller: 'users',
				method: 'register',
				callback: registrationResponse,
			});
		},
	};
}();