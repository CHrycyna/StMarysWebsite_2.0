<<<<<<< HEAD
<div class="users form">
<?php echo $this->Flash->render('auth'); ?>
<?php echo $this->Form->create('User'); ?>
    <fieldset>
        <legend>
            <?php echo __('Please enter your username and password'); ?>
        </legend>
        <?php echo $this->Form->input('username');
        echo $this->Form->input('password');
    ?>
    </fieldset>
<?php echo $this->Form->end(__('Login')); ?>
</div>
=======
<?php $this->Html->css('pages/page_log_reg_v2.css', array('inline' => false));?>

<div class="container">
	<div class="reg-block">
		<div class="reg-block-header">
			<h2>Sign In</h2>
		</div>		
		<form action="/admin/login" id="Login" method="post" accept-charset="utf-8">
			<div class="input-group margin-bottom-20">
	            <span class="input-group-addon"><i class="fa fa-user"></i></span>
	            <input name="data[User][username]" type="text" class="form-control" placeholder="Username">
	        </div>
	        <div class="input-group margin-bottom-20">
	            <span class="input-group-addon"><i class="fa fa-lock"></i></span>
	            <input name="data[User][password]" type="password" class="form-control" placeholder="Password">
	        </div>
	        <div class="row">
	            <div class="col-md-10 col-md-offset-1">
					<?php echo $this->Form->button('Submit Form', array('type' => 'submit', 'class' => 'btn-u btn-block'));?>
	            </div>
	        </div>
		</form>
	</div>
</div>
>>>>>>> 7e51a4d8b80b5bc7b900991470ed95452f014efe
