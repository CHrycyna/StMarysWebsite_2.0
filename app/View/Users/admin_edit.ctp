<!-- Content Header (Page header) -->
<section class="content-header">
	<h1>
    	Users
        <small>Edit User</small>
    </h1>
    <ol class="breadcrumb">
    	<li><a href="/admin"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li><a href="#"> Users</a></li>
        <li class="active">Edit User</li>
    </ol>
</section>
<!-- Main content -->
<section class="content">    
	<div class="content">
        <div class="row">
            <div class="col-md-8 col-md-offset-2 col-sm-8 col-sm-offset-2">
            	<div id="alert-box"></div>
                <form action="/" id="editForm" class="reg-page" data-toggle="validator" role="form">
                    <div class="reg-header">
                        <h2>Register a new account</h2>
                    </div>
									
					<input name="id" type="text" id="userID" hidden="hidden" value="<?php echo $user['User']['id']; ?>">	
					<div class="form-group">
                    	<label>Email Address <span class="color-red">*</span></label>
                    	<input name="email" type="email" id="userEmail" class="form-control margin-bottom-20" placeholder="Email" value="<?php echo $user['User']['email']; ?>" required>
    					<div class="help-block with-errors"></div>
    				</div>
                                        
                    <div class="row">
						<div class="form-group col-sm-6">
		                    <label>First Name<span class="color-red">*</span></label>
                    		<input name="firstname" type="text" id="userFirstName" class="form-control margin-bottom-20" value="<?php echo $user['User']['firstname']; ?>" required>
          					<div class="help-block with-errors"></div>                  	
						</div>
						<div class="form-group col-sm-6">
                    		<label>Last Name<span class="color-red">*</span></label>
                   			<input name="lastname" type="text" id="userLastName"  class="form-control margin-bottom-20" value="<?php echo $user['User']['lastname']; ?>" required>
          					<div class="help-block with-errors"></div>                  	
						</div>
					</div>

                    <div class="row">
                    	<div class="col-xs-6">
                            <label>Username<span class="color-red">*</span></label>
                            <input name="username" type="text" id="userUsername" class="form-control margin-bottom-20" value="<?php echo $user['User']['username']; ?>" disabled>
                        </div>
                        <div class="form-group col-xs-6">
                            <label>Role<span class="color-red">*</span></label>
                            <?php //if(intval($user['User']['role_id']) > intval($authUser['role_id'])); ?>
                           	<select name="role" id="userRole" class="form-control select2 select2-hidden-accessible" <?php if(intval($authUser['role_id'] === 0) || $authUser['username'] === $user['User']['username']) { echo 'disabled '; }?>required>
					    		<option value="">Choose an option</option>
					    		<?php foreach($roles as $role) : 
					    		if(intval($role["Role"]["id"]) >= intval($authUser['role_id'])) : ?>
			        			<option value="<?php echo $role["Role"]["id"];?>" <?php if(intval($user['User']['role_id']) === intval($role["Role"]["id"])) { echo "selected='selected'"; } ?>><?php echo $role["Role"]["role"];?></option>
								<?php endif; ?>
								<?php endforeach; ?>
							</select>
          					<div class="help-block with-errors"></div>                  	
                        </div>
                    </div>
                                     
                    <div class="row">
                        <div class="col-lg-6 col-lg-offset-6 text-right">
                            <button class="btn-u" type="submit">Save Changes</button>                        
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

	      $( '#editForm' ).validator().on('submit', function (e) {
			 updateUsername();
			 if (!e.isDefaultPrevented()) {
				event.preventDefault();
	     		Users.editForm();	    		
	 		 }
		  });
	   });";

$this->Html->scriptEnd();
?>