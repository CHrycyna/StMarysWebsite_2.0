
<div class="container content">
        <div class="row">
            <div class="col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
                <form action="/" id="addForm" class="reg-page">
                    <div class="reg-header">
                        <h2>Register a new account</h2>
                    </div>

                    <label>Email Address <span class="color-red">*</span></label>
                    <input name="email" type="email" id="userEmail" class="form-control margin-bottom-20">

                    <div class="row">
                        <div class="col-sm-6">
                            <label>Password <span class="color-red">*</span></label>
                            <input name="password" type="password" id="userPassword1" class="form-control margin-bottom-20">
                        </div>
                        <div class="col-sm-6">
                            <label>Confirm Password <span class="color-red">*</span></label>
                            <input name="password2" type="password" id="userPassword2" class="form-control margin-bottom-20">
                        </div>
                    </div>
                    
                    <hr>
                    
                    <div class="row">
						<div class="col-sm-6">
		                    <label>First Name<span class="color-red">*</span></label>
                    		<input name="firstname" type="text" id="userFirstName" class="form-control margin-bottom-20">
						</div>
						<div class="col-sm-6">
                    		<label>Last Name<span class="color-red">*</span></label>
                   			<input name="lastname" type="text" id="userLastName"  class="form-control margin-bottom-20">
						</div>
					</div>

                    <div class="row">
                    	<div class="col-xs-6">
                            <label>Username<span class="color-red">*</span></label>
                            <input name="username" type="text" id="userUsername" class="form-control margin-bottom-20" disabled>
                        </div>
                        <div class="col-xs-6">
                            <label>Role<span class="color-red">*</span></label>
                            <select name="data[User][role]" id="UserRole" class="form-control" required="required">
					    	<?php foreach($roles as $role) : ?>
			        			<option value="<?php echo $role["Role"]["id"];?>"><?php echo $role["Role"]["role"];?></option>
							<?php endforeach; ?>
							</select>                   
                        </div>
                    </div>
                    
                    <hr>

                    <div class="row">
                        <div class="col-lg-6 col-lg-offset-6 text-right">
                            <button class="btn-u" type="submit">Register</button>                        
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

<?php $this->Html->script('users.js', array('inline' => false));?>
<?php $this->Html->scriptStart(array('inline' => false));

echo "
      jQuery(document).ready(function() {
      	  function updateUsername() {
            var first = $('#userFirstName').val().toLowerCase();
            var second = $('#userLastName').val().toLowerCase();
            		
           	if(first.length > 0 && second.length > 0)
       		{
            	$('#userUsername').val(first + '.' + second);
			}
            else if(first.length > 0)
            {
            	$('#userUsername').val(first);
            }
           	else if(second.length > 0)
            {
            	$('#userUsername').val(first);
            }
           
		  }
            		
	      $('#userFirstName').bind('keypress keyup blur', function() {
			    updateUsername();
		  });
	
	      $('#userLastName').bind('keypress keyup blur', function() {
			    updateUsername();
		  });
	                    		
	      $( '#addForm' ).submit(function( event ) {
			// Stop form from submitting normally
			event.preventDefault();
	     	Users.registerForm('#addForm');	    		
		  });
	   });";

$this->Html->scriptEnd();
?>