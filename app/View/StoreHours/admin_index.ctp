<?php $this->Html->css('/plugins/timepicker/bootstrap-timepicker.min.css', array('inline' => false));?>
<!-- Content Header (Page header) -->
<section class="content-header">
	<h1>
    	Content Manager
        <small>Store Hours</small>
    </h1>
    <ol class="breadcrumb">
    	<li><a href="/admin"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li>Content Manager</li>
        <li class="active">Store Hours</li>
    </ol>
</section>
<!-- Main content -->
<section class="content">  
	<div class="row">
       	<div class="col-xs-12">
       		<div class="box">
           		<div class="box-header">
		         	<h3 class="box-title">Regular Hours</h3>
		        </div>
            	<!-- /.box-header -->
	            <div class="box-body">
	            <table class="table table-condensed">
                    <tbody><tr>
                      <th style="width: 150px">Weekday</th>
                      <th>Opening Time</th>
                      <th>Closing Time</th>
                      <th style="width: 100px">Action</th>
                    </tr>
                    <?php foreach($hours as $hour) : ?>
                    <tr>
                      <td><?php echo $hour['StoreHour']['day']; ?></td>
                      <td>
                      	<div class="bootstrap-timepicker">
                      		<div class="input-group">
                        		<input id="startReg<?php echo $hour['StoreHour']['id']; ?>" type="text" class="form-control timepicker" disabled value='<?php echo date("g:i a", strtotime($hour['StoreHour']['open']))?>'>
                        		<div class="input-group-addon">
                          			<i class="fa fa-clock-o"></i>
                        		</div>
                      		</div><!-- /.input group -->
                  		</div>
                      </td>
                      <td>
                      	<div class="bootstrap-timepicker">
                      		<div class="input-group">
                        		<input id="endReg<?php echo $hour['StoreHour']['id']; ?>" type="text" class="form-control timepicker" disabled value='<?php echo date("g:i a", strtotime($hour['StoreHour']['close']))?>'>
                        		<div class="input-group-addon">
                          			<i class="fa fa-clock-o"></i>
                        		</div>
                      		</div><!-- /.input group -->
                  		</div>
                      </td>
                      <td>
						<button class="btn btn-block btn-success btn-sm esReg" value='<?php echo $hour['StoreHour']['id']; ?>'>Edit</button>
                      </td>
                    </tr>
                    <?php endforeach;?>
                  	</tbody>
                  </table>
            	</div>
	            <!-- /.box-body -->
	        </div>
	        
	        <div class="box">
           		<div class="box-header">
		         	<h3 class="box-title">Special Hours</h3>
		        </div>
            	<!-- /.box-header -->
	            <div class="box-body">
	            	<div id="gridSpecial"></div>
            	</div>
	            <!-- /.box-body -->
	        </div>
	        
	        	
       	</div>
   	</div>
</section>
<?php $this->Html->script('/plugins/timepicker/bootstrap-timepicker.min.js', array('inline' => false));?>
<?php $this->Html->script('storehours.js'); ?>

<?php
$this->Html->scriptStart(array('inline' => false));
echo "
	function upateHours(response) {
		console.log(response);	
	}
		
	jQuery(document).ready(function() {
	  $('.esReg').click(function() {
		var row = $(this).val();
		var open = \"#startReg\".concat(row);
		var close = \"#endReg\".concat(row);
		
		
		if($(this).hasClass( 'btn-success' ))
    	{
			$(this).addClass('btn-danger').removeClass('btn-success');
			$(this).html(\"Save\");
			$(open).prop(\"disabled\", false);
			$(close).prop(\"disabled\", false);
    	}
		else
		{
			$(this).addClass('btn-success').removeClass('btn-danger');
			$(this).html(\"Edit\");
			$(open).prop(\"disabled\", true);
			$(close).prop(\"disabled\", true);
					
			var data = { id: parseInt(row), open: $(open).val(), close: $(close).val() };
		
			console.log(data);
		
			Api({
        		api: 1.0,
        		type: 'POST',
				data: data,
        		controller: 'StoreHours',
        		method: 'updateRegularHours',
        		callback: upateHours,
        	});
		}
      });
		
	  $(\".timepicker\").timepicker({
    	showInputs: false
	  });
	});";
$this->Html->scriptEnd();
?>


