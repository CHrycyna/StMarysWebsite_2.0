<?php $this->Html->css('/plugins/timepicker/bootstrap-timepicker.min.css', array('inline' => false));?>
<?php $this->Html->css('/plugins/datepicker/datepicker.min.css', array('inline' => false));?>
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
       		<div id="alert-box"></div>
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
                      <th style="width: 150px">Action</th>
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
                      	<div id="bgReg<?php echo $hour['StoreHour']['id']; ?>" class="btn-group">
							<button id="edtReg<?php echo $hour['StoreHour']['id']; ?>" class="btn btn-success esReg" value='<?php echo $hour['StoreHour']['id']; ?>'>Edit</button>
                      	</div>
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
	            	<table class="table table-condensed">
                    <tbody><tr>
                      <th style="width: 150px">Name</th>
                      <th style="width: 125px">Date</th>
                      <th>Opening Time</th>
                      <th>Closing Time</th>
                      <th style="width: 100px">Is Closed?</th>
                      <th style="width: 150px">Action</th>
                    </tr>
                    <?php foreach($sHours as $hour) : ?>
                    <tr>
                      <td>
                      	<input id="nameHol<?php echo $hour['HolidayHour']['id']; ?>" class="form-control" disabled value="<?php echo $hour['HolidayHour']['name']; ?>">
                      </td>
                      <td>
		              	<input id="dateHol<?php echo $hour['HolidayHour']['id']; ?>" disabled class="form-control holiday-datepicker" type="text" datepicker="" data-week-start="1" value="<?php echo $hour['HolidayHour']['date']; ?>">
                      </td>
                      <td>
                      	<div class="bootstrap-timepicker">
                      		<div class="input-group">
                        		<input id="startHol<?php echo $hour['HolidayHour']['id']; ?>" type="text" class="form-control timepicker" disabled value='<?php echo date("g:i a", strtotime($hour['HolidayHour']['open']))?>'>
                        		<div class="input-group-addon">
                          			<i class="fa fa-clock-o"></i>
                        		</div>
                      		</div><!-- /.input group -->
                  		</div>
                      </td>
                      <td>
                      	<div class="bootstrap-timepicker">
                      		<div class="input-group">
                        		<input id="endHol<?php echo $hour['HolidayHour']['id']; ?>" type="text" class="form-control timepicker" disabled value='<?php echo date("g:i a", strtotime($hour['HolidayHour']['close']))?>'>
                        		<div class="input-group-addon">
                          			<i class="fa fa-clock-o"></i>
                        		</div>
                      		</div><!-- /.input group -->
                  		</div>
                      </td>
                      <td>
                      	<div class="checkbox">
	                        <label>
	                         	<input type="checkbox" disabled <?php echo $hour['HolidayHour']['closed'] == 1 ? "checked" : "";?>>
	                        	Closed
	                    	</label>
	                    </div>
                      </td>
                      <td>
                      	<div id="bgHol<?php echo $hour['HolidayHour']['id']; ?>" class="btn-group">
							<button id="edtHol<?php echo $hour['HolidayHour']['id']; ?>" class="btn btn-success esHol" value='<?php echo $hour['HolidayHour']['id']; ?>'>Edit</button>
                      		<button id="delHol<?php echo $hour['HolidayHour']['id']; ?>" class="btn btn-warning deHol" value='<?php echo $hour['HolidayHour']['id']; ?>'>Delete</button>
                      	</div>
                      </td>
                    </tr>
                    <?php endforeach;?>
                  	</tbody>
                  </table>
               	  <button id="addHoliday" class="btn btn-primary" data-toggle="modal" data-target="#addHolidayModal">Add Holiday Hours</button>
            	</div>
	            <!-- /.box-body -->
	        </div>
	        
	        <!-- Modal -->
			<div id="addHolidayModal" class="modal fade" role="dialog">
			  <div class="modal-dialog">
			
			    <!-- Modal content-->
			    <div class="modal-content">
			      <div class="modal-header">
			        <button type="button" class="close" data-dismiss="modal">&times;</button>
			        <h4 class="modal-title">Add New Holiday Hours</h4>
			      </div>
			      <div class="modal-body">
				  	<form id="newHolidayForm" class="form-horizontal">
	                  <div class="box-body">
	                    <div class="form-group">
	                      <label for="nHolName" class="col-sm-3 control-label">Name</label>
	                      <div class="col-sm-9">
	                        <input type="text" class="form-control" id="nHolName" placeholder="Name">
	                      </div>
	                    </div>
	                    <div class="form-group">
	                      <label for="nHolDate" class="col-sm-3 control-label">Date</label>
	                      <div class="col-sm-9">
	                      	<div class="input-group">
	                      	  <input id="nHolDate" class="form-control holiday-datepicker" type="text" datepicker="" data-week-start="1" placeholder="yyyy-mm-dd">
	                      	  <div class="input-group-addon">
                          		<i class="fa fa-calendar"></i>
                        	  </div>
	                      	</div>
	                      </div>
	                    </div>
	                    <div class="form-group">
	                      <label for="nHolOpen" class="col-sm-3 control-label">Opening Time</label>
	                      <div class="col-sm-9">
							<div class="bootstrap-timepicker">
                      		  <div class="input-group">
                        		<input id="nHolOpen" type="text" class="form-control timepicker" value="9:00 AM">
                        		<div class="input-group-addon">
                          			<i class="fa fa-clock-o"></i>
                        		</div>
                      		  </div><!-- /.input group -->
                  			</div>	                      
                  		  </div>
	                    </div>
	                    <div class="form-group">
	                      <label for="nHolClose" class="col-sm-3 control-label">Closing Time</label>
	                      <div class="col-sm-9">
	                        <div class="bootstrap-timepicker">
                      		  <div class="input-group">
                        		<input id="nHolClose" type="text" class="form-control timepicker" value="5:00 PM">
                        		<div class="input-group-addon">
                          			<i class="fa fa-clock-o"></i>
                        		</div>
                      		  </div><!-- /.input group -->
                  			</div>
	                      </div>
	                    </div>
	                    <div class="form-group">
	                    <label for="nHolClosed" class="col-sm-3 control-label">Closed</label>
	                      <div class="col-sm-9">
	                      	<input id="nHolClosed" type="checkbox">
	                      </div>
	                    </div>
	                  </div><!-- /.box-body -->
	                  <div class="modal-footer">
	                    <button type="submit" class="btn btn-primary">Submit</button>
				      	<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				      </div>
	                </form>
			      </div>
			      
			    </div>
			
			  </div>
			</div>
       	</div>
   	</div>
</section>
<?php $this->Html->script('/plugins/timepicker/bootstrap-timepicker.min.js', array('inline' => false));?>
<?php $this->Html->script('/plugins/datepicker/datepicker.min.js', array('inline' => false)); ?>
<?php $this->Html->script('storehours.js', array('inline' => false)); ?>
<?php
$this->Html->scriptStart(array('inline' => false));
echo "jQuery(document).ready(function() { StoreHours.init(); });";
$this->Html->scriptEnd();
?>


