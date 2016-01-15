var StoreHours = function() {
	var regBtnGroupPrefix = "#bgReg";
	var regOpenPrefix = "#startReg";
	var regClosePrefix = "#endReg";
	var regEditBtnPrefix = "#edtReg";
	var regCloseBtnPrefix = "#cnlReg";
	
	function appendAlert(type, message) {
		$alert = $("#alert-box");
				
		$sAlert =  $("<div class='alert alert-"+type+"'></div>");
		$sAlert.append ("<a href='#' class='close' data-dismiss='alert' aria-label='close'><i class='fa fa-times'></i></a>" + 
            			"<strong>Success!</strong> "+message);
		
		$alert.append($sAlert);
		$sAlert.fadeTo(2000, 500).slideUp(1000, function(){
		    $sAlert.remove();
		});
	}
	
	function regDoneEditing(id)
	{
		$editButton = $(regEditBtnPrefix.concat(id));
		$editButton.addClass('btn-success').removeClass('btn-danger');
		$editButton.html("Edit");
		$(regOpenPrefix.concat(id)).prop("disabled", true);
		$(regClosePrefix.concat(id)).prop("disabled", true);
		$(regCloseBtnPrefix.concat(id)).remove();
	}
	
	function validateHours(open, close) {
		var dateOne = new Date( open.concat(' 1/1/1900'));
		var dateTwo = new Date( close.concat(' 1/1/1900'));
		
		if( dateOne > dateTwo )
		{
			appendAlert('warning', "Invalid Time Range - Opening time must occur before Closing time.");
			return false;
		}
		
		return true;
	}
	
	function resetHours(response)
	{
		$(regOpenPrefix.concat(response['data']['hours']['id'])).val(response['data']['hours']['open']);
		$(regClosePrefix.concat(response['data']['hours']['id'])).val(response['data']['hours']['close']);
	}
	
	function cancelHours(id) {
		regDoneEditing(id);
		Api({
    		api: 1.0,
    		type: 'POST',
			data: { id: id },
    		controller: 'StoreHours',
    		method: 'getHours',
    		callback: resetHours,
    	});
	}
	
	function editHours(row) {
		var buttonGroup = regBtnGroupPrefix.concat(row);
		var open = regOpenPrefix.concat(row);
		var close = regClosePrefix.concat(row);
		$editButton = $(regEditBtnPrefix.concat(row));
		
		if($editButton.hasClass( 'btn-success' ))
    	{
			$editButton.addClass('btn-danger').removeClass('btn-success');
			$editButton.html("Save");
			$(open).prop("disabled", false);
			$(close).prop("disabled", false);
			$(buttonGroup).append('<button id="cnlReg'+row+'" class="btn btn-danger esCancel" value="'+row+'">Cancel</button>');
			$('.esCancel').click(function () {
				cancelHours(row);
			});
    	}
		else
		{
			var opening = $(open).val();
			var closing = $(close).val();
			if(validateHours(opening, closing))
			Api({
        		api: 1.0,
        		type: 'POST',
				data: { id: parseInt(row), open: opening, close: closing },
        		controller: 'StoreHours',
        		method: 'updateRegularHours',
        		callback: upateHours,
        	});
		}
	}
	
	function upateHours(response) {
		var code = response['status_code'];
		if(code != 200)
		{
			appendAlert('danger', "Error - Opening time must occur before Closing time.");
		}
		else
		{
			regDoneEditing(response['data']['id']);
			appendAlert('success', response['details']);
		}
	}
		
	return {
		init: function() {
			$(".timepicker").timepicker({
				showInputs: false
			});

			var now = Date.now();

			$(".holiday-datepicker").datepicker({
				format: 'yyyy-mm-dd',
			    isDisabled: function(date) {
			        return date.valueOf() < now ? true : false;
			    }
			});
			
			$("#newHolidayForm").submit(function ( event ) {
				console.log("submit");
				console.log($("#nHolName").val());
				console.log($("#nHolDate").val());
				console.log($("#nHolOpen").val());
				console.log($("#nHolClose").val());
				console.log($("#nHolClosed").prop('checked'));
				event.preventDefault();
			});
			
			$('.esReg').click(function () {
				editHours($(this).val());
			});
		},
	}
}();