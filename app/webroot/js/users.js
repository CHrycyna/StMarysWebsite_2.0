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
		registerForm: function (form) {
			var $form =  $(form);
			console.log("register");
		},
	};
}();