<!-- Content Header (Page header) -->
<section class="content-header">
	<h1>
    	Users
        <small>View Users</small>
    </h1>
    <ol class="breadcrumb">
    	<li><a href="/admin"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li class="active">View Users</li>
    </ol>
</section>
<!-- Main content -->
<section class="content">
	<div class="table-responsive">
	  <table id="usersTable" class="table">
        <thead>
          <tr>
            <th>Username</th>
            <th>Firstname</th>
            <th>Lastname</th>
            <th>Email</th>
            <th>Role</th>
            <th>Last Login</th>
            <th>Actions</th>
          </tr>
        </thead>
        <tbody>
        </tbody>
      </table>
	</div>
</section>

<?php $this->Html->script('users.js', array('inline' => false));?>
<?php 
$this->Html->scriptStart(array('inline' => false));

echo "jQuery(document).ready(function() {
	Users.viewUsers();
});";

$this->Html->scriptEnd();
?>