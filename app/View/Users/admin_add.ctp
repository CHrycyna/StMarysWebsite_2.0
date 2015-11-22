<!-- Content Header (Page header) -->
<section class="content-header">
	<h1>
    	Users
        <small>New User</small>
    </h1>
    <ol class="breadcrumb">
    	<li><a href="/admin"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li><a href="#"> Users</a></li>
        <li class="active">Register a New User</li>
    </ol>
</section>
<!-- Main content -->
<section class="content">    
	<div class="content">
        <div class="row">
            <div class="col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
                <form action="/" id="addForm" class="reg-page" data-toggle="validator" role="form">
                    <div class="reg-header">
                        <h2>Register a new account</h2>
                    </div>
					
					<div class="form-group">
                    	<label>Email Address <span class="color-red">*</span></label>
                    	<input name="email" type="email" id="userEmail" class="form-control margin-bottom-20" placeholder="Email" required>
    					<div class="help-block with-errors"></div>
    				</div>

                    <div class="row">
                        <div class="form-group col-sm-6">
                            <label>Password <span class="color-red">*</span></label>
                            <input name="password" type="password" id="userPassword1" class="form-control margin-bottom-20" data-minlength="6"  placeholder="Password" required>
          					<div class="help-block with-errors"></div>                  	
                        </div>
                        <div class="form-group col-sm-6">
                            <label>Confirm Password <span class="color-red">*</span></label>
                            <input name="password2" type="password" id="userPassword2" class="form-control margin-bottom-20" data-match="#userPassword1" placeholder="Confirm" required>
          					<div class="help-block with-errors"></div>                  	
                        </div>
                    </div>
                    
                    <hr>
                    
                    <div class="row">
						<div class="form-group col-sm-6">
		                    <label>First Name<span class="color-red">*</span></label>
                    		<input name="firstname" type="text" id="userFirstName" class="form-control margin-bottom-20" required>
          					<div class="help-block with-errors"></div>                  	
						</div>
						<div class="form-group col-sm-6">
                    		<label>Last Name<span class="color-red">*</span></label>
                   			<input name="lastname" type="text" id="userLastName"  class="form-control margin-bottom-20" required>
          					<div class="help-block with-errors"></div>                  	
						</div>
					</div>

                    <div class="row">
                    	<div class="col-xs-6">
                            <label>Username<span class="color-red">*</span></label>
                            <input name="username" type="text" id="userUsername" class="form-control margin-bottom-20" disabled>
                        </div>
                        <div class="form-group col-xs-6">
                            <label>Role<span class="color-red">*</span></label>
                            <select name="data[User][role]" id="userRole" class="form-control" required="required">
					    		<option value="">Choose an option</option>
					    	<?php foreach($roles as $role) : 
					    		if(intval($authUser['role_id']) <= intval($role["Role"]["id"])) : ?>
			        			<option value="<?php echo $role["Role"]["id"];?>"><?php echo $role["Role"]["role"];?></option>
								<?php endif; ?>
							<?php endforeach; ?>
							</select>   
          					<div class="help-block with-errors"></div>                  	
                        </div>
                    </div>
                    
                    <hr>
                    
                    <?php var_dump($authUser); ?>

                    <div class="row">
                        <div class="col-lg-6 col-lg-offset-6 text-right">
                            <button class="btn-u" type="submit">Register</button>                        
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    </section>

<?php $this->Html->script('plugins/validator.js', array('inline' => false)); ?>
<?php $this->Html->script('users.js', array('inline' => false)); ?>
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
            	$('#userUsername').val(second);
            }
           
		  }
            		
	      $('#userFirstName').bind('keypress keyup blur', function() {
			    updateUsername();
		  });
	
	      $('#userLastName').bind('keypress keyup blur', function() {
			    updateUsername();
		  });

	      $( '#addForm' ).validator().on('submit', function (e) {
			 updateUsername();
			 if (e.isDefaultPrevented()) {
				console.log('Failed');
			 } else {
				event.preventDefault();
	     		Users.registerForm();	    		
	 		 }
		  });
	   });";

$this->Html->scriptEnd();
?>