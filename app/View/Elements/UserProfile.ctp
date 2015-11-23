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
<select name="role" id="userRole" class="form-control select2 select2-hidden-accessible" required="required">
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